<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        $aboutus = AboutUs::first();
        $contact = Contact::first();
        return view('home', compact('services', 'aboutus', 'contact'));
    }
}
