@extends('layout.app')
@section('title', 'Articles')

@section('title-banner', $data->title_articles)
@section('content-banner', $data->user->username)
@section('image-banner', asset('storage/' . $data->image_articles))

@section('content')
<section id="row-1" class="text-light">
    <div class="container">

        <div class="row my-5">

            <div class="col-lg-12">
                <div class="mb-5">
                    <h1>{{ $data->title_articles }}</h1>
                    <p class="text-muted">{{ $data->user->username }}, {{ $data->created_at->format('d M Y - H:i:s') }}</p>
                </div>

                <p class="fs-4">{!! $data->content_articles !!}</p>
            </div>

        </div>

        <div class="row my-5">
            <h1 class="mb-5 fw-bolder">More Articles</h1>

            @foreach ($dataOthers->take(3) as $dataOther)    
                <div class="col-lg-4 col-md-4">
                    <div class="card mb-3">
                        <img src="{{ asset('storage/' . $dataOther->image_articles) }}" alt="Image Articles" class="img-fluid">
                        <div class="card-body">
                            <h5 class="card-title">{{ $dataOther->title_articles }}</h5>
                            <h6 class="card-subtitle mb-3 text-muted">{{ $dataOther->user->username }}, {{ $dataOther->created_at->format('d M Y - H:i:s') }}</h6>
        
                            <p class="card-text limit-text">{{ strip_tags(Illuminate\Support\Str::limit($dataOther->content_articles, 300)) }}</p>
                            <a href="{{ url('article/' . $dataOther->slug) }}">Buka</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
@endsection

@push('styles')
<style>

    #row-1 p {
        text-align: justify;
    }
    #row-1 .card {
        background: rgb(50, 50, 50);
    }
    #row-1 .card p {
        text-align: justify;
    }
    #row-1 .card a {
        color: #fff;
        text-decoration: none;
        border-bottom: 1px solid #fff;
    }

    #row-1 .card img {
        height: 300px;
        object-fit: cover;
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
        
    // Limit Text
    for (let n = 0; n < $('.limit-text').length; n++) {
        var para = $('.limit-text')[n];
        var text = para.innerHTML;
        para.innerHTML = "";
        var words = text.split(" ");
        for (i = 0; i < 30; i++) {
            para.innerHTML += words[i] === undefined ? '' : words[i] + " ";
        }
        para.innerHTML += "...";
    }

</script>
@endpush