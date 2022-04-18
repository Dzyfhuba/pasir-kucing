@extends('layouts.app')
@section('content')
    <div id="service" class="container">
        <h1 class="title">
            Layanan
        </h1>
        <h4>Kami Menyediakan</h4>
        <div class="row">
            @foreach ($services as $key => $service)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card p-3" data-aos="fade in">
                        <div class="icon">
                            {{ $key + 1 }}
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">{{ $service->name }}</h4>
                            <p class="card-text">{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
