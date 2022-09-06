@extends('layout.app')
@section('title', 'Artticles')

@section('title-banner', 'Articles')
@section('content-banner', 'Just Articles')
@section('image-banner', asset('images/img2.jpg'))

@section('content')
<section id="row-1" class="text-light">
    <div class="container">

        <form action="{{ url('/search') }}" method="get" class="my-5">
            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Cari Data Blog" name="title">
            </div>
        </form>

        <h1 class="mb-lg-5 mb-3">Hallo Lurrd</h1>

        @foreach ($data as $dataAr)
            <div class="row mb-5">
                <div class="col-lg col-md order-md-first order-lg-first order-last">
                    <div class="my-3">
                        <h3>{{ $dataAr->title_articles }}</h3>
                        <p class="text-muted">{{ $dataAr->user->username }}, {{ $dataAr->created_at->format('d M Y - H:i:s') }}</p>
                    </div>
                    
                    <p>{{ strip_tags(Illuminate\Support\Str::limit($dataAr->content_articles, 500)) }}</p>
                    <a href="{{ url('article/' . $dataAr->slug) }}">Baca</a>
                </div>
                
                <div class="col-lg col-md order-md-last order-lg-last order-first">
                    <img src="{{ asset('storage/' . $dataAr->image_articles) }}" alt="img1.jpg" class="img-fluid mt-md-5">
                </div>
            </div>
        @endforeach

        <div class="my-5" id="pagin-content">
            {!! $data->links() !!}
        </div>

    </div>
</section>
@endsection

@push('styles')
<style>
    form .form-control, input[type="text"]:focus {
        box-shadow: none;
        outline: 0 none;
        background: none;
        color: #fff;
        border: none;
        border-radius: 0%;
        border-bottom: 2px solid rgb(171, 170, 170);
    }

    #pagin-content .page-link {
        background: none;
        border: none;
    }
    #pagin-content .page-link:hover {
        background: white;
        color: #000;
    }

    .pagination {
        justify-content: center;
    }

    #row-1 p {
        text-align: justify;
    }
    #row-1 a {
        text-decoration: none;
        color: #fff;
        border-bottom: 1px solid #fff;
    }
    
    #row-1 img {
        object-fit: cover;
    }

    @media (max-width: 576px) {}

    @media (min-width: 720px) {}

    @media (min-width: 992px) {}

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {}

</style>
@endpush