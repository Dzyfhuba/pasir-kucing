@extends('admin.layouts.app')
@section('content')
    <table class="table table-striped table-bordered table-inverse table-responsive">
        <thead class="thead-default">
            <tr>
                <th>ID</th>
                <th>Record</th>
                <th>Recorded At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($offers as $key => $offer)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $offer->record }}</td>
                    <td>{{ $offer->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
