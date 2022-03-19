<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->simplePaginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:2000',
            'image_item.*' => 'required|mimes:jpg,png,jpeg|max:2000',

        ]);
        DB::transaction(function () use ($request) {
            $name_file = null;
            if ($request->hasFile(('image'))) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $name_file = time() . rand(99, 999) . '.' . $extension;
                $request->file('image')->move('images/uploads/', $name_file);
            }
            $product = Product::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $name_file
            ]);

            $items = $request->file('image_item');

            if ($items && count($items) > 0) {
                foreach ($items as $item) {
                    $extension = $item->getClientOriginalExtension();
                    $name_item = time() . rand(99, 999) . '.' . $extension;
                    $item->move('images/uploads/', $name_item);

                    $product->items()->create([
                        'image' => $name_item
                    ]);
                }
            }
        });
        return redirect()->route('products.index')->with('success', 'Data Produk berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:2000',


        ]);
        DB::transaction(function () use ($request, $product) {
            $name_file = $request->hasFile('image') ? null : $request->old_image;
            if ($request->hasFile(('image'))) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $name_file = time() . rand(99, 999) . '.' . $extension;
                $request->file('image')->move('images/uploads/', $name_file);
                unlink('images/uploads/' . $request->old_image);
            }
            $product->update(
                [
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'image' => $name_file
                ]
            );
        });
        return redirect()->route('products.index')->with('success', 'Data Produk berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        DB::transaction(function () use ($product) {

            foreach ($product->items as $item) {
                unlink('images/uploads/' . $item->image);
            }
            unlink('images/uploads/' . $product->image);
            $product->items()->delete();
            $product->delete();
        });
        return redirect()->route('products.index')->with('success', 'Data Produk berhasil dihapus');
    }

    public function main_index()
    {
        $products = Product::latest()->get();

        return view('main.products.index', compact('products'));
    }

    public function main_show(Product $product)
    {
        return view('main.products.show', compact('product'));
    }
}
