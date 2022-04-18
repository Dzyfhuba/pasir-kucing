<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Client;
use App\Models\Portfolio;
use App\Models\PortfolioCate;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get portfolio multiple join
        $portfolios = Portfolio::with('category', 'client')->orderBy('id', 'desc')->get();

        // get category portfolio id and name
        $categories = PortfolioCate::select('id', 'name')->get();

        // get client id and name
        $clients = Client::select('id', 'name')->get();
        return view('admin.portfolio', [
            'portfolios' => $portfolios,
            'categories' => $categories,
            'clients' => $clients,
        ]);
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
     * @param  \App\Http\Requests\StorePortfolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfolioRequest $request)
    {
        // split string images to array to json
        $images = explode(',', $request->images);
        $request->merge(['images' => json_encode($images)]);

        // get category and client from request
        $category = $request->category;
        $client = $request->client;

        // remove category and client from request
        $request->offsetUnset('category');
        $request->offsetUnset('client');

        // add category and client as id to request
        $request->merge(['category_id' => $category]);
        $request->merge(['client_id' => $client]);

        // replace 'width="" height=""' width="100%" heigth="auto" for request video
        $request->merge(['video' => str_replace('width="" height=""', 'width="100%" heigth="auto"', $request->video)]);
        // store
        Portfolio::create($request->all());
        return redirect()->route('admin.portfolio.index')->with('success', 'Create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePortfolioRequest  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        // split string images to array to json
        $images = explode(',', $request->images);
        $request->merge(['images' => json_encode($images)]);

        // get category and client from request
        $category = $request->category;
        $client = $request->client;

        // remove category and client from request
        $request->offsetUnset('category');
        $request->offsetUnset('client');

        // add category and client as id to request
        $request->merge(['category_id' => $category]);
        $request->merge(['client_id' => $client]);
        // update
        $portfolio->update($request->all());
        $portfolio->save();
        return redirect()->route('admin.portfolio.index')->with('success', 'Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        // delete
        $portfolio->delete();
        // redirect
        return redirect()->route('admin.portfolio.index');
    }
}
