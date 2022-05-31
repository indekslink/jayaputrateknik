<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PDO;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $galleries = Gallery::orderBy('created_at', 'DESC')->get()->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->format('d-m-Y');
        });
        // dd($galleries);
        // $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function main_index()
    {
        // $galleries = Gallery::latest()->get();
        $galleries = Gallery::orderBy('created_at', 'DESC')->get()->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->format('d-M-Y');
        });

        return view('main.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validate = Validator::make($request->all(), [
            'item' => 'mimes:jpg,png,jpeg,mp4',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'msg' => $validate->errors()
            ]);
        }


        $names = [];

        // $request->file('image')->getClientOriginalExtension()
        foreach ($request->file('items') as $key => $img) {
            $name = time() . rand(99, 999) . '.' . $img->getClientOriginalExtension();
            $img->move('images/uploads/gallery/', $name);
            $names[$key]['item'] = $name;
            $names[$key]['created_at'] = Carbon::now();
        }

        $data = DB::table('galleries')->insert($names);

        return response()->json([
            'status' => 'success',
            'msg' => 'Item berhasil ditambahkan',
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gallery = Gallery::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteAll(Request $request)
    {
        $items = Gallery::whereIn('id', $request->id)->get();
        foreach ($items as $item) {
            unlink('images/uploads/gallery/' . $item->item);
            $item->delete();
        }


        return response()->json([
            'status' => 'success',
            'msg' => 'Data item berhasil di hapus'
        ]);
    }
}
