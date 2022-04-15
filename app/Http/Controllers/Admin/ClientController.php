<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\ClientCate;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->join('client_cates', 'clients.clientcate_id', '=', 'client_cates.id')->select('clients.*', 'client_cates.name as clientcate_name', 'client_cates.id as clientcate_id')->get();
        $clientcates = ClientCate::orderBy('id', 'desc')->get();
        return view('admin.client', compact('clients', 'clientcates'));
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
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        // store logo
        $logo = $request->file('logo');
        $logo_name = $request->name;
        $logo_name = str_replace(' ', '_', $logo_name);
        $logo_name = strtolower($logo_name);
        $logo_name = $logo_name . '.' . $logo->getClientOriginalExtension();
        $logo->storeAs('public/clients', $logo_name);
        // store data
        Client::create([
            'clientcate_id' => $request->clientcate_id,
            'name' => $request->name,
            'logo' => $logo_name,
        ]);
        return redirect()->route('admin.client.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id)
    {
        $client = Client::find($id);
        // update logo
        $logo_name = $client->logo;
        if ($request->hasFile('logo')) {
            // store logo
            $logo = $request->file('logo');
            $logo_name = $request->name . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('/storage/clients'), $logo_name);
        }
        $client->update([
            'clientcate_id' => $request->clientcate_id,
            'name' => $request->name,
            'logo' => $logo_name
        ]);
        $client->save();
        return redirect()->route('admin.client.index')->with('success', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        // delete logo
        $logo_name = $client->logo;
        Storage::delete('public/clients/' . $logo_name);
        $client->delete();
        return redirect()->route('admin.client.index')->with('success', 'Client deleted successfully');
    }
}
