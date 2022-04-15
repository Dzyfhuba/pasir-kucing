<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientCateRequest;
use App\Http\Requests\UpdateClientCateRequest;
use App\Models\ClientCate;

class ClientCateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientCate = ClientCate::orderBy('id', 'desc')->get();
        return view('admin.clientcate', [
            'clientCates' => $clientCate,
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
     * @param  \App\Http\Requests\StoreClientCateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientCateRequest $request)
    {
        ClientCate::create($request->all());
        return redirect()->route('admin.clientcate.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClientCate  $clientCate
     * @return \Illuminate\Http\Response
     */
    public function show(ClientCate $clientCate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClientCate  $clientCate
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientCate $clientCate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientCateRequest  $request
     * @param  \App\Models\ClientCate  $clientCate
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientCateRequest $request, $id)
    {
        $clientCate = ClientCate::find($id);
        $clientCate->update($request->all());
        return redirect()->route('admin.clientcate.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClientCate  $clientCate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientCate = ClientCate::find($id);
        $clientCate->delete();

        return redirect()->route('admin.clientcate.index')->with('success', 'Data berhasil dihapus');
    }
}
