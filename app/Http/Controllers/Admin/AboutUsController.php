<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        // reverse order of certificates
        // string to array
        $aboutus->certificates = explode(',', $aboutus->certificates);
        $aboutus->certificates = array_reverse($aboutus->certificates);
        // dd($aboutus->certificates);
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
        $aboutus = AboutUs::first();
        $certname = "";
        if ($request->has('certificate')) {
            $certname = $request->certificate;
            $prevcert = $aboutus->certificates;
            // $prevcert + $certname
            $aboutus->certificates = $prevcert . ',' . $certname;
            // remove first comma if exists
            $aboutus->certificates = ltrim($aboutus->certificates, ',');
            // store $request->file('certFile') to storage_path('app/public/certificates') with $certname
            $request->file('certFile')->storeAs('public/certificates', $certname);
        } else {
            // get first aboutus
            // update $aboutus
            $aboutus->update($request->all());
        }
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
        $aboutus = AboutUs::first();
        if ($request->has('certificate')) {
            $certname = $request->certificate;
            $prevcert = $aboutus->certificates;
            // remove $request->prevCert from $prevcert
            $prevcert = str_replace($request->prevCert . ',', '', $prevcert);
            $aboutus->certificates = $prevcert . ',' . $certname;
            if ($request->hasFile('certFile')) {
                // store $request->file('certFile') to storage_path('app/public/certificates') with $certname
                $request->file('certFile')->storeAs('public/certificates', $certname);
            }
        } else {
            // get first aboutus
            // update $aboutus
            $aboutus->update($request->all());
        }
        $aboutus->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($cert)
    {
        $aboutus = AboutUs::first();
        // remove $cert from $aboutus->certificates
        $prevcert = $aboutus->certificates;
        $prevcert = str_replace($cert . ',', '', $prevcert);
        $aboutus->certificates = $prevcert;
        // remove $cert from storage_path('app/public/certificates')
        $certpath = storage_path('app/public/certificates/' . $cert);
        unlink($certpath);
        $aboutus->save();
        return response()->json([
            'cert' => $cert,
            'certificates' => $aboutus->certificates,
        ]);
    }
}
