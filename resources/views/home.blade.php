@extends('layout.app')
@section('title', 'Home')

@section('title-banner', 'Home')
@section('content-banner', 'Ahh Finaly Home')
@section('image-banner', asset('images/img4.jpg'))

@section('content')
<section id="row-1" class="text-light">
    <div class="container">
        <div class="row">
            <div class="my-5">
                <h1 class="text-center mb-5">Random Artikel</h1>
    
                <div class="owl-carousel owl-theme my-lg-5 my-md-4 mt-lg-0 my-0 mt-3" id="list-row1">
                    
                    @foreach ($data->take(5) as $dataCaraousel)
                        <div class="item">
                            <img src="{{ asset('storage/' . $dataCaraousel->image_articles) }}" class="img-fluid" alt="Image Articles">

                            <div class="text-image text-center">
                                <h5 class="fw-bolder">{{ $dataCaraousel->title_articles }}</h5>
                                <p>{{ strip_tags(Illuminate\Support\Str::limit($dataCaraousel->content_articles, 30)) }}</p>
                                <a href="{{ url('article/' . $dataCaraousel->slug) }}" class="stretched-link"></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

<section id="row-2" class="text-light">
    <div class="container">
        <div class="my-5">

            <h1 class="text-center mb-5">Newest Articles</h1>
            
            @php
                $i = 1;
            @endphp
            @foreach ($data->take(2) as $dataArHiglight)
            @php
                $i++;
            @endphp

            @if ($i % 2 == 0)
                <div class="row p-lg-5 p-0 p-md-4 mb-4">
                    <div class="col-lg col-md order-md-first order-lg-first order-last">
                        <div class="mt-5 mt-0 mt-md-0 px-lg-5 px-0 order-lg-first order-last">
                            <h3>{{ $dataArHiglight->title_articles }}</h3>
                            <p>{{ strip_tags(Illuminate\Support\Str::limit($dataArHiglight->content_articles, 200)) }}</p>
                            <a href="{{ url('article/' . $dataArHiglight->slug) }}">Baca</a>
                        </div>
                    </div>
                    <div class="col-lg col-md order-md-last order-lg-last order-first">
                        <img src="{{ asset('storage/' . $dataArHiglight->image_articles) }}" alt="img1.jpg" class="img-fluid mb-lg-0 mb-2">
                    </div>
                </div>
            @else
                <div class="row p-lg-5 p-0 p-md-4 mb-4">
                    <div class="col-lg col-md order-lg-last order-md-last order-last">
                        <div class="mt-lg-5 mt-0 mt-md-0 px-lg-5 px-0 order-first order-lg-last">
                            <h3>{{ $dataArHiglight->title_articles }}</h3>
                            <p>{{ strip_tags(Illuminate\Support\Str::limit($dataArHiglight->content_articles, 200)) }}</p>
                            <a href="{{ url('article/' . $dataArHiglight->slug) }}">Baca</a>
                        </div>
                    </div>
                    <div class="col-lg col-md order-lg-first order-md-first order-first">
                        <img src="{{ asset('storage/' . $dataArHiglight->image_articles) }}" alt="img1.jpg" class="img-fluid mb-lg-0 mb-2">
                    </div>
                </div>
            @endif
            @endforeach

        </div>

    </div>
</section>
@endsection

@push('styles')
<style>

    #row-1 {
        background: rgb(50, 50, 50);
    }

    #row-1 .owl-carousel .item {
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    #row-1 .owl-carousel .item img {
        height: 300px;
        object-fit: cover;
        filter: brightness(30%);
    }
    #row-1 .owl-carousel .item .text-image {
        padding: 0px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
    #row-1 .owl-carousel .item .text-image:hover {
        border-bottom: 1px solid #fff;
        transition: all ease 0.5s;
    }

    #row-2 p {
        text-align: justify;
    }
    #row-2 a {
        text-decoration: none;
        color: #fff;
        border-bottom: 1px solid #fff;
    }
    #row-2 .row:hover {
        box-shadow: rgb(50, 50, 50) 0px 2px 8px 0px;
    }

    @media (max-width: 576px) {}

    @media (min-width: 720px) {}

    @media (min-width: 992px) {}

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {}

</style>
@endpush

@push('scripts')
<script>
        
    $('#list-row1').owlCarousel({
        lazyLoad: true,
        autoplay:true,
        loop:true,
        margin:20,
        nav:false,
        stagePadding: 50,
        center:true,
        responsive:{
            320:{
                items:1,
                margin:10
            },
            720:{
                items:3,
                margin:10,
                stagePadding: 10
            },
            1000:{
                items:3
            }
        }
    })

</script>
@endpush