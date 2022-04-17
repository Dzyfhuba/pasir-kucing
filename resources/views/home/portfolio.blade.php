<div class="" id="portfolio">
    <h1 class="title">
        Portfolio Kami
    </h1>
    <ul class="nav nav-tabs justify-content-center porto-tabs">
        @foreach ($portfolioCates as $key => $portfolioCate)
            @if ($key == 0)
                <li class="nav-item">
                    <a class="nav-link active" role="button" data-target="all">All</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" role="button"
                    data-target="{{ Str::slug($portfolioCate->name) }}">{{ $portfolioCate->name }}</a>
            </li>
        @endforeach
    </ul>
    <div id="all" class="list">
        @foreach ($portfolios as $portfolio)
            @foreach ($portfolio->images as $key => $image)
                @if ($key < 2)
                    <div class="wrapper">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{ $image }}" class="card-img-top" alt="{{ $portfolio->name }}">
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
    @foreach ($portfolioCates as $portfolioCate)
        <div id="{{ Str::slug($portfolioCate->name) }}" class="list" style="display: none">
            {{ Str::slug($portfolioCate->name), $portfolioCate->id }}
            @foreach ($portfolios as $portfolio)
                @if ($portfolio->category->id == $portfolioCate->id)
                    @foreach ($portfolio->images as $key => $image)
                        @if ($key < 2)
                            <div class="wrapper">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img src="{{ $image }}" class="card-img-top"
                                            alt="{{ $portfolio->name }}">
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
    @endforeach

</div>
