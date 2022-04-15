<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::orderBy('id', 'desc')->get();
        return view('admin.service', [
            'service' => $service
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
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        // store cover
        $cover = $request->file('cover');
        $cover_name = time() . '.' . $cover->getClientOriginalExtension();
        $cover->move(public_path('/storage/services'), $cover_name);

        $service = Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'cover' => $cover_name
        ]);
        return redirect()->route('admin.service.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        // update cover
        $cover_name = $service->cover;
        if ($request->hasFile('cover')) {
            // store cover
            $cover = $request->file('cover');
            $cover_name = time() . '.' . $cover->getClientOriginalExtension();
            $cover->move(public_path('/storage/services'), $cover_name);
        }
        // dd($request, $request->name, $request->description, $request->cover);
        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'cover' => $cover_name
        ]);
        $service->save();
        return redirect()->route('admin.service.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $service = Service::find($id);
        $service->delete();
        // remove cover file
        Storage::delete('public/services/' . $service->cover);
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}
