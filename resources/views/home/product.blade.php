<section id="product">
    <h1 id="title">
        Produk Siap Jual
    </h1>
    <div id="list">
        @for ($i = 0; $i < 20; $i++)
            <div class="wrapper">
                <div class="card">
                    <img src="{{ asset('storage/decoration/smudge_lord.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-color">Go somewhere</a>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</section>
