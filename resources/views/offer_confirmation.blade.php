@extends('layouts.app')
@section('content')
    <div class="container-md">
        <table class="table table-responsive-md table-striped table-bordered">
            <tbody>
                @foreach ($col1 as $key => $c1)
                    <tr>
                        <td>{{ $c1 }}</td>
                        <td>{{ $col2[$key] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="https://api.whatsapp.com/send" method="get">
            <input type="hidden" name="phone" value="{{ $contact->phone }}">
            <textarea name="text" id="text" hidden>{{ $record }}</textarea>
            <button type="submit" class="btn btn-color" formtarget="_blank">Konfirmasi</button>
        </form>
    </div>
    @include('home.contact')
@endsection
