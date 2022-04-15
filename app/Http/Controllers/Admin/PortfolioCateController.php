<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioCateRequest;
use App\Http\Requests\UpdatePortfolioCateRequest;
use App\Models\PortfolioCate;

class PortfolioCateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolioCates = PortfolioCate::orderBy('id', 'desc')->get();
        return view('admin.portfoliocate', compact('portfolioCates'));
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
     * @param  \App\Http\Requests\StorePortfolioCateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfolioCateRequest $request)
    {
        PortfolioCate::create($request->all());
        return redirect()->route('admin.portfoliocate.index')->with('success', 'Portfolio Cate created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PortfolioCate  $portfolioCate
     * @return \Illuminate\Http\Response
     */
    public function show(PortfolioCate $portfolioCate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PortfolioCate  $portfolioCate
     * @return \Illuminate\Http\Response
     */
    public function edit(PortfolioCate $portfolioCate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePortfolioCateRequest  $request
     * @param  \App\Models\PortfolioCate  $portfolioCate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioCateRequest $request, $id)
    {
        $portfolioCate = PortfolioCate::findOrFail($id);
        $portfolioCate->update($request->all());
        return redirect()->route('admin.portfoliocate.index')->with('success', 'Portfolio Cate updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PortfolioCate  $portfolioCate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolioCate = PortfolioCate::findOrFail($id);
        $portfolioCate->delete();
        return redirect()->route('admin.portfoliocate.index')->with('success', 'Portfolio Cate deleted successfully.');
    }
}
