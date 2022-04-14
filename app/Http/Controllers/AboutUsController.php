<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAboutUsRequest;
use App\Http\Requests\UpdateAboutUsRequest;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sub)
    {
        $aboutus = AboutUs::first();
        return view('admin.about-us.index', [
            'aboutus' => $aboutus,
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
     * @param  \App\Http\Requests\StoreAboutUsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store($sub, StoreAboutUsRequest $request)
    {
        // get first aboutus
        $aboutus = AboutUs::first();
        // update $aboutus
        $aboutus->update($request->all());
        $aboutus->save();
        return redirect()->route('admin.about-us', $sub);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAboutUsRequest  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutUsRequest $request, AboutUs $aboutUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}
