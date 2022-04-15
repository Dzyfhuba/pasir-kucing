<section id="product">
    <h1 id="title">
        Produk Siap Jual
    </h1>
    <div id="list">
        @foreach ($products as $product)
            <div class="wrapper">
                <div class="card">
                    <img src="{{ asset('storage/products/' . $product->cover) }}" class="card-img-top"
                        alt="{{ $product->name }}">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        {{-- <p class="card-text">{{ $product->description }}</p> --}}
                        <a href="#" class="btn btn-color">Lebih Lanjut</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
