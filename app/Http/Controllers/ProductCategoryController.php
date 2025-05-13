<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Categories::query()
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%')
                      ->orWhere('description', 'like', '%' . $request->q . '%');
            })
            ->paginate(10);

        return view('dashboard.categories.index', [
            'categories' => $categories,
            'q' => $request->q
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
         * Cek validasi input
         */
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required'
        ]);

        /**
         * Jika validasi gagal,
         * maka redirect kembali dengan pesan error
         */
        if ($validator->fails()) {
            return redirect()->back()->with(
                [
                    'errors' => $validator->errors(),
                    'errorMessage' => 'Validasi Error, Silahkan lengkapi data terlebih dahulu'
                ]
            );
        }

        $category = new Categories;
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect()->route('categories.index')->with
                (
                [
                    'successMessage' => 'Data Berhasil Disimpan'
                ]
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Categories::find($id);
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Categories::find($id);

        return view('dashboard.categories.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /**
         * Cek validasi input
         */
        $validator = \Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required'
        ]);

        /**
         * Jika validasi gagal,
         * maka redirect kembali dengan pesan error
         */
        if ($validator->fails()) {
            return redirect()->back()->with(
                [
                    'errors' => $validator->errors(),
                    'errorMessage' => 'Validasi Error, Silahkan lengkapi data terlebih dahulu'
                ]
            );
        }

        $category = Categories::find($id);
        $category->name = $request->name;
        $category->description = $request->description;

        $category->save();

        return redirect()->route('products.index')->with(
                [
                    'successMessage' => 'Data Berhasil Disimpan'
                ]
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Categories::find($id);

        $category->delete();

        return redirect()->back()
            ->with(
                [
                    'successMessage' => 'Data Berhasil Dihapus'
                ]
            );
    }
}
