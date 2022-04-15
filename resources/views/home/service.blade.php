<section id="service">
    <h1 id="title">
        Layanan Kami
    </h1>
    <div id="list">
        @foreach ($services as $service)
            <div class="item">
                <div class="wrapper">
                    <h1 class="title">{{ $service->name }}</h1>
                    <p class="description">
                        {{ $service->description }}
                    </p>
                    <a href="#" class="btn btn-color rounded-pill">Cari Tahu Lebih</a>
                </div>
            </div>
        @endforeach
    </div>
</section>
