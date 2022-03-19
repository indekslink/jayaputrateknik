<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        return response()->json($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        return response()->json($item);
    }
    public function api_delete($id)
    {
        $item = Item::whereId($id)->firstOrFail();
        unlink('images/uploads/' . $item->image);
        $item->delete();
        return response()->json([
            'msg' => 'Item berhasil di hapus'
        ]);
    }
    public function api_update_or_create(Request $request, $id)
    {
        $item = Item::firstOrNew(['id' => $id]);
        $msg = 'Item berhasil ditambahkan';

        $file = $request->file('image');
        $name = time() . rand(99, 999) . '.' . $file->getClientOriginalExtension();
        if ($item && $id != 'null') {
            $msg = "Item berhasil diubah";
            unlink('images/uploads/' . $item->image);
        }
        $file->move('images/uploads/', $name);
        $item->product_id = $request->product_id;
        $item->image = $name;
        $item->save();

        return response()->json([
            'id' => $item->id,
            'msg' => $msg
        ]);
    }
}
