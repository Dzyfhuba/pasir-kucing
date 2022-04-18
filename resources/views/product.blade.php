@extends('layouts.app')
@section('content')
    <div id="product" class="container">
        <h1 class="title">
            Produk
        </h1>
        <h4>Kami Menyediakan</h4>
        <div class="row">
            @foreach ($products as $key => $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div id="product{{ $product->id }}" class="card p-3" data-aos="fade in"
                        data-background="{{ asset('storage/products/' . $product->cover) }}">
                        <div class="icon">
                            {{ $key + 1 }}
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $product->name }}</h4>
                            <p class="card-text">{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
