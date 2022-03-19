<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sosmed = Sosmed::latest()->get();
        return view('admin.sosmed.index', compact('sosmed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sosmed.create');
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
            'icon' => 'required',
            'url' => 'required',
        ]);
        Sosmed::create($request->all());
        return redirect()->route('sosmed.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sosmed  $sosmed
     * @return \Illuminate\Http\Response
     */
    public function show(Sosmed $sosmed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sosmed  $sosmed
     * @return \Illuminate\Http\Response
     */
    public function edit(Sosmed $sosmed)
    {
        return view('admin.sosmed.edit', compact('sosmed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sosmed  $sosmed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sosmed $sosmed)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'url' => 'required',
        ]);
        $sosmed->update($request->all());
        return redirect()->route('sosmed.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sosmed  $sosmed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sosmed $sosmed)
    {
        $sosmed->delete();
        return redirect()->route('sosmed.index')->with('success', 'Data berhasil dihapus');
    }
}
