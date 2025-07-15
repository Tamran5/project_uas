<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Categories;
use App\Models\Product;

class HomepageController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $product = Product::all();

        return view('web.homepage', [
            'categories' => $categories,
            'products' => $product,
            'title' => 'Homepage'
        ]);
    }



    public function products(Request $request)
    {
        $title = "Products";

        $categories = Categories::all();

        $selectedCategory = null;
        $productsQuery = Product::query();



        if ($request->has('category') && $request->category != '') {
            $selectedCategory = Categories::whereRaw('LOWER(name) = ?', [strtolower($request->category)])->first();
            if ($selectedCategory) {
                $productsQuery->where('product_category_id', $selectedCategory->id);
            } else {
                $productsQuery->whereRaw('0=1'); // slug tidak valid
            }
        }


        $products = $productsQuery->get();

        if ($request->ajax()) {
            return response()->json([
                'products' => $products->map(function ($product) {
                    return [
                        'id' => $product->id,
                        'name' => $product->name,
                        'price' => $product->price,
                        'image' => asset('storage/' . $product->image_url),
                    ];
                }),
                'category_name' => $selectedCategory ? $selectedCategory->name : 'All Products',
                'count' => $products->count(),
            ]);
        }

        return view('web.products', [
            'categories' => $categories,
            'products' => $products,
            'title' => $title,
            'selectedCategory' => $selectedCategory,
        ]);
    }


    public function product($slug)
    {
        $product = Product::find($slug);

        return view('web.product', [
            'slug' => $slug,

        ]);
    }
    public function show($name)
    {
        $product = Product::whereRaw('LOWER(name) = ?', [strtolower($name)])
            ->with('category')
            ->firstOrFail();

        $relatedProducts = Product::where('product_category_id', $product->product_category_id)
            ->where('id', '!=', $product->id)
            ->inRandomOrder()
            ->take(8)
            ->get();

        return view('web.detailproducts', compact('product', 'relatedProducts'));
    }







    public function categories()
    {
        return view('web.categories', [
            'title' => 'Categories'
        ]);
    }
    public function detail()
    {
        return view('web.detailproducts', [
            'title' => 'Detail'
        ]);
    }

    public function category($slug)
    {
        $category = Categories::find($slug);

        return view('web.category_by_slug', [
            'slug' => $slug,
            'category' => $category
        ]);
    }

    public function cart()
    {
        return view('web.cart', [
            'title' => 'Cart'
        ]);
    }

    public function checkout()
    {
        return view('web.checkout', [
            'title' => 'Checkout'
        ]);
    }
}
