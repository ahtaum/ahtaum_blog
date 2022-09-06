@extends('layout.mainLayoutAdmin')

@section('title', 'Admin Home')
@section('content')
<section class="container" id="posts">

    <div class="row" id="options">

        <h1 class="text-center my-lg-5 my-md-5 my-3 text-light">Posts Your Halu</h1>

        <div class="col-lg-4 col-md-4">
            <div class="card mb-3">
                <div class="card-body d-flex flex-column text-center">
                    <h5 class="card-title">All Posts</h5>
                    <i class="bi bi-book fs-1 my-2"></i>
                    <a href="{{ url('admin/all/posts') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="card mb-3">
                <div class="card-body d-flex flex-column text-center">
                    <h5 class="card-title">Create Post</h5>
                    <i class="bi bi-plus fs-1 my-2"></i>
                    <a href="{{ url('admin/postForm') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="card mb-3">
                <div class="card-body d-flex flex-column text-center">
                    <h5 class="card-title">Log</h5>
                    <i class="bi bi-gear fs-1 my-2"></i>
                    <a href="#" class="stretched-link"></a>
                </div>
            </div>
        </div>

    </div>

    <div class="row" id="last-update">
        <h1 class="mt-5 text-light">Last Update</h1>
        <div class="col-lg">
            @foreach ($data->articles_pages->take(3) as $lastUpdate)
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $lastUpdate->image_articles) }}" class="card-img-top img-fluid" alt="Article Image">
                        </div>

                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title mx-1">{{ $lastUpdate->title_articles }}</h3>
                                <p class="card-text">{{ strip_tags(Illuminate\Support\Str::limit($lastUpdate->content_articles, 300)) }}</p>
                                <a href="{{ url('admin/view/' . $lastUpdate->slug) }}">See More</a>
                                <p class="card-text"><small class="text-muted">{{ $lastUpdate->created_at->format('d M Y - H:i:s') }}</small></p>
                            </div>
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

    #posts .card {
        color: white;
        background: rgb(41, 40, 40);
        border-radius: 10px;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        transition: all ease 0.5s;
    }
    #posts .card:hover {
        color: rgb(222, 217, 217);
        transition: all ease 0.5s;
    }
    #posts .card .stretched-link {
        border-bottom: 1px solid #fff;
        opacity: 0;
        transition: all ease 0.5s;
    }
    #posts .card .stretched-link:hover {
        border-bottom: 1px solid #fff;
        opacity: 1;
        transition: all ease 0.5s;
    }

    #posts .card img {
        height: 200px;
        object-fit: cover;
    }

    /* #last-update .card {
        max-height: 300px;
    } */

    #last-update .card:hover {
        background: #111;
        transition: all ease 0.5s;
        filter: brightness(80%);
        color: #fff;
        box-shadow: rgba(99, 99, 101, 0.15) 0px 48px 100px 0px;
    }

    @media (max-width: 576px) {}

    @media (min-width: 720px) {}

    @media (min-width: 992px) {}

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {}

</style>
@endpush

@push('scripts')
<script type="module">
    console.log(`Posts Page`)
</script>
@endpush