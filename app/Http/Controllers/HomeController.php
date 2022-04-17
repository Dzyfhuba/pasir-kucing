<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\PortfolioCate;
use App\Models\Product;
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
        $services = Service::orderBy('id', 'desc')->limit(5)->get();
        $aboutus = AboutUs::first();
        $contact = Contact::first();
        $products = Product::orderBy('id', 'desc')->limit(5)->get();
        $portfolios = Portfolio::orderBy('id', 'desc')->get();
        $portfolioCates = PortfolioCate::all();

        // $portfolio images to array
        $portfolioImages = [];
        foreach ($portfolios as $portfolio) {
            $portfolioImages[$portfolio->id] = json_decode($portfolio->images);
            // clean the space in string
            $portfolioImages[$portfolio->id] = str_replace(' ', '', $portfolioImages[$portfolio->id]);
            // clean empty string
            $portfolioImages[$portfolio->id] = array_filter($portfolioImages[$portfolio->id]);
        }
        // merge it to portfolio
        $portfolios = $portfolios->map(function ($portfolio) use ($portfolioImages) {
            $portfolio->images = $portfolioImages[$portfolio->id];
            return $portfolio;
        });
        return view('home', compact('services', 'aboutus', 'contact', 'products', 'portfolios', 'portfolioCates'));
    }
}
