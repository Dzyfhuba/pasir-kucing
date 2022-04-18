@extends('layouts.app')
@section('content')
    @include('home.portfolio')
    <div id="portfolio">
        <div id="all" class="list">
            @foreach ($portfolios as $portfolio)
                <div class="wrapper">
                    {!! $portfolio->video !!}
                </div>
            @endforeach
        </div>
    </div>
@endsection
