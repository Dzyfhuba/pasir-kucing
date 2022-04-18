@extends('layouts.app')
@section('content')
    <section id="client" class="container">
        <h1>
            Klien dan Partner
        </h1>
        @foreach ($client_cate as $cate)
            <div class="row">
                <h1>{{ $cate->name }}</h1>
                @foreach ($clients as $key => $client)
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <div id="client{{ $client->id }}" class="card p-3" data-aos="fade in"
                            data-background="{{ asset('storage/clients/' . $client->logo) }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $client->name }}</h4>
                                <p class="card-text">{{ $client->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </section>
    @include('home.contact')
@endsection
