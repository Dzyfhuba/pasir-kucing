<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Client;
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
        $n_client = Client::count();
        $n_project = Portfolio::count();

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
        return view('home', compact('services', 'aboutus', 'contact', 'products', 'portfolios', 'portfolioCates', 'n_client', 'n_project'));
    }

    public function offer()
    {
        return view('offer');
    }

    public function about()
    {
        $aboutus = AboutUs::first();
        $contact = Contact::first();
        return view('about', compact('aboutus', 'contact'));
    }

    public function contact()
    {
        $contact = Contact::first();
        return view('contact', compact('contact'));
    }

    public function service()
    {
        $services = Service::orderBy('id', 'desc')->get();
        $contact = Contact::first();
        return view('service', compact('services', 'contact'));
    }

    public function product()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $contact = Contact::first();
        return view('product', compact('products', 'contact'));
    }

    public function portfolio()
    {
        $portfolios = Portfolio::orderBy('id', 'desc')->get();
        $portfolioCates = PortfolioCate::all();
        $contact = Contact::first();
        return view('portfolio', compact('portfolios', 'portfolioCates', 'contact'));
    }

    public function portfolio_detail($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolioCates = PortfolioCate::all();
        $contact = Contact::first();
        return view('portfolio_detail', compact('portfolio', 'portfolioCates', 'contact'));
    }

    public function portfolio_cate($id)
    {
        $portfolioCates = PortfolioCate::all();
        $portfolios = Portfolio::where('cate_id', $id)->orderBy('id', 'desc')->get();
        $contact = Contact::first();
        return view('portfolio', compact('portfolios', 'portfolioCates', 'contact'));
    }

    public function client()
    {
        $n_client = Client::count();
        $clients = Client::orderBy('id', 'desc')->get();
        $contact = Contact::first();
        return view('client', compact('clients', 'n_client', 'contact'));
    }
}
