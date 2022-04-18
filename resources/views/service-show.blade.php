@extends('layouts.app')
@section('content')
    <div class="container" id="show">
        <h1 class="title">{{ $service->name }}</h1>
        <p class="content">
            {{ $service->description }}
        </p>
    </div>
    @include('home.contact')
@endsection
