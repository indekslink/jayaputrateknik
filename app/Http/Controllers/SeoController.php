<?php

namespace App\Http\Controllers;

use App\Models\SEO;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $SEO = SEO::latest()->get();
        return view('admin.SEO.index', compact('SEO'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.SEO.create');
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
        ]);
        SEO::create($request->all());
        return redirect()->route('seo.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SEO  $SEO
     * @return \Illuminate\Http\Response
     */
    public function show(SEO $seo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SEO  $SEO
     * @return \Illuminate\Http\Response
     */
    public function edit(SEO $seo)
    {
        return view('admin.SEO.edit', compact('seo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SEO  $SEO
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SEO $seo)
    {
        $request->validate([
            'name' => 'required',

        ]);
        $seo->update($request->all());
        return redirect()->route('seo.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SEO  $SEO
     * @return \Illuminate\Http\Response
     */
    public function destroy(SEO $seo)
    {
        $seo->delete();
        return redirect()->route('seo.index')->with('success', 'Data berhasil dihapus');
    }
}
