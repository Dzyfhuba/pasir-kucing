@extends('layouts.app')
@section('content')
    <form action="{{ route('offer.store') }}" class="container" id="offer" method="post">
        @csrf
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 justify-content-around">
            <div class="col">
                <h5>Layanan Yang Anda Butuhkan</h5>
                @foreach ($services as $service)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $service->name }}"
                            id="service{{ $service->id }}" name="service[]">
                        <label class="form-check-label" for="service{{ $service->id }}">
                            {{ $service->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <div class="col">
                <h5>Produk Yang Anda Butuhkan</h5>
                @foreach ($products as $product)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ $product->name }}"
                            id="product{{ $product->id }}" name="product[]">
                        <label class="form-check-label" for="product{{ $product->id }}">
                            {{ $product->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col">
            <h5>Berapa Budget Total Untuk Layanan Ini</h5>
            <label for="minprice" class="form-label">Harga Minimal <span></span></label>
            <input type="range" min="50000" max="1000000" class="form-range" id="minprice" name="minprice"
                list="range" />
            <label for="maxprice" class="form-label">Harga Maksimal <span></span></label>
            <input type="range" min="50000" max="1000000" class="form-range" id="maxprice" name="maxprice"
                list="range" />
            <datalist id="range">
                @for ($i = 50000; $i <= 1000000; $i += 10000)
                    <option value="{{ $i }}">
                @endfor
            </datalist>
        </div>
        {{-- input name, phone --}}
        <div class="row mb-3">
            <div class="col">
                <label for="name" class="form-label">Nama <span></span></label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda" required>
            </div>
            <div class="col">
                <label for="phone" class="form-label">Nomor Telepon <span></span></label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Nomor Telepon Anda" required>
            </div>
        </div>
        {{-- input address, city, province, zipcode --}}
        <div class="row mb-3">
            <div class="col">
                <label for="address" class="form-label">Alamat <span></span></label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Alamat Anda" required>
            </div>
            <div class="col">
                <label for="city" class="form-label">Kota <span></span></label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Kota Anda" required>
            </div>
            <div class="col">
                <label for="province" class="form-label">Provinsi <span></span></label>
                <input type="text" class="form-control" id="province" name="province" placeholder="Provinsi Anda"
                    required>
            </div>
            <div class="col">
                <label for="zipcode" class="form-label">Kode Pos <span></span></label>
                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Kode Pos Anda" required>
            </div>
        </div>
        {{-- submit --}}
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-color w-100">Kirim</button>
            </div>
        </div>
    </form>
    @include('home.contact')
@endsection
