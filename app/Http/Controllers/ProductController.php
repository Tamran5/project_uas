<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class ProductController extends Controller
{
    /**
     * Tampilkan daftar produk.
     */
    public function index(Request $request)
    {
        $products = Products::with('category:id,name')  // Ambil hanya id dan name kategori
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%')
                    ->orWhere('description', 'like', '%' . $request->q . '%');
            })
            ->paginate(10);

        return view('dashboard.products.index', [
            'products' => $products,
            'q' => $request->q
        ]);
    }


    /**
     * Tampilkan form tambah produk.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * Simpan produk baru.
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with([
                'errors' => $validator->errors(),
                'errorMessage' => 'Validasi gagal. Harap lengkapi data dengan benar.'
            ]);
        }

        Products::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index')->with('successMessage', 'Produk berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit produk.
     */
    public function edit(string $id)
    {
        $product = Products::findOrFail($id);
        $categories = Categories::all();

        return view('dashboard.products.edit', [
            'product' => $product,
            'categories' => $categories
        ]);
    }

    /**
     * Update produk.
     */
    public function update(Request $request, string $id)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->with([
                'errors' => $validator->errors(),
                'errorMessage' => 'Validasi gagal. Harap lengkapi data dengan benar.'
            ]);
        }

        $product = Products::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
        ]);

        return redirect()->route('products.index')->with('successMessage', 'Produk berhasil diperbarui.');
    }

    /**
     * Hapus produk.
     */
    public function destroy(string $id)
    {
        $product = Products::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('successMessage', 'Produk berhasil dihapus.');
    }
}
