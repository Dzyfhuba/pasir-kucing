@extends('admin.layouts.app')
@section('content')
    <form action="{{ route('admin.contact.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label for="kota" class="col-sm-2 col-form-label">Kota</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="city" name="city" value="{{ $contact->city }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="address" class="col-sm-2 col-form-label">address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" name="address" value="{{ $contact->address }}"
                    required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="phone" class="col-sm-2 col-form-label">phone</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $contact->phone }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="twitter" class="col-sm-2 col-form-label">twitter</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $contact->twitter }}"
                    required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="facebook" class="col-sm-2 col-form-label">facebook</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $contact->facebook }}"
                    required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="instagram" class="col-sm-2 col-form-label">instagram</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="instagram" name="instagram"
                    value="{{ $contact->instagram }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="youtube" class="col-sm-2 col-form-label">youtube</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="youtube" name="youtube" value="{{ $contact->youtube }}"
                    required>
            </div>
        </div>
        <button type="submit" class="btn btn-color">Simpan</button>
    </form>
@endsection
