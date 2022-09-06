@extends('layout.app')
@section('title', 'Search Result')

@section('content')
<section id="search-data" class="my-5 container text-light">

    <h1>Result <span class="fw-bolder"> " {{ $searchKey }}"</span></h1>
    @if(count($result) > 0)
        @foreach ($result as $data)    
            <div class="row">
                <div class="card my-3">
                    <div class="card-body">
                        <div class="mb-3">
                            <h2>{{ $data->title_articles }}</h2>
                            <p>{{ $data->user->username }}</p>
                        </div>

                        <p class="my-3">{{ strip_tags(Illuminate\Support\Str::limit($data->content_articles, 30)) }}</p>

                        <a href="{{ url('article/' . $data->slug) }}">See more</a>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="row">
            <div class="card my-3">
                <div class="card-body">
                    <h1>Not Found</h1>
                </div>
            </div>
        </div>
    @endif

</section>
@endsection

@push('styles')
<style>

    .jumbotron {
        display: none;
    }

    #search-data {
        margin-top: 90px !important;
    }
    #search-data .card {
        background: rgb(41, 40, 40);
        border-radius: 10px;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    @media (max-width: 576px) {}

    @media (min-width: 720px) {}

    @media (min-width: 992px) {}

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {}

</style>
@endpush