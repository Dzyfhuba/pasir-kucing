@extends('admin.layouts.app')
@section('content')
    <form action="{{ route('admin.about-us.store', collect(Request::segments())->last()) }}">
        @if (Request::is('admin/aboutus/history'))
            @include('admin.about-us.history')
        @elseif (Request::is('admin/aboutus/vision'))
            @include('admin.about-us.vision')
        @elseif (Request::is('admin/aboutus/mission'))
            @include('admin.about-us.mission')
        @endif
        <button type="submit" class="btn btn-color">Submit</button>
    </form>

    @if (Request::is('admin/aboutus/certificate'))
        @include('admin.about-us.certificate')
    @endif
@endsection
