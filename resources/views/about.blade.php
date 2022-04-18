@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="vision">
            <h1 class="title">Visi</h1>
            <div class="content">
                <div class="text">
                    <p>{{ __($aboutus->vision) }}</p>
                </div>
                <div class="preview">
                    <img src="https://collaborativeconsulting.biz/wp-content/uploads/2016/03/bold-vision-article.jpg"
                        alt="vision">
                </div>
            </div>
        </div>
        <div id="mission">
            <h1 class="title">Misi</h1>
            <div class="content">
                <div class="text">
                    <p>{{ __($aboutus->mission) }}</p>
                </div>
                <div class="preview">
                    <img src="https://images.squarespace-cdn.com/content/v1/5aa555ddb27e397a4cef66dc/1520861767777-5SOLFPCC22CYS9LJH3R7/ke17ZwdGBToddI8pDm48kLkXF2pIyv_F2eUT9F60jBl7gQa3H78H3Y0txjaiv_0fDoOvxcdMmMKkDsyUqMSsMWxHk725yiiHCCLfrh8O1z4YTzHvnKhyp6Da-NYroOW3ZGjoBKy3azqku80C789l0iyqMbMesKd95J-X4EagrgU9L3Sa3U8cogeb0tjXbfawd0urKshkc5MgdBeJmALQKw/shutterstock_434504776.jpg"
                        alt="mission">
                </div>
            </div>
        </div>
    </div>
    <div class="div" id="about">
        <h1 class="title">
            Pasir Kucing
        </h1>
        <p class="description">
            {{ $aboutus->history }}
        </p>
    </div>
    @include('home.contact')
@endsection
