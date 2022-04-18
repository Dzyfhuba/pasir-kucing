@extends('layouts.app')
@section('content')
    <div class="container" id="show">
        <h1 class="title">{{ $product->name }}</h1>
        <p class="content">
            {{ $product->description }}
        </p>
    </div>
    @include('home.contact')
@endsection
