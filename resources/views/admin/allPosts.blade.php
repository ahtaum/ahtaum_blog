@extends('layout.mainLayoutAdmin')

@section('title', 'All Posts')
@section('content')
<section class="container text-light" id="all-posts">

    <div class="row">

        <h1 class="text-center my-4">All Posts</h1>

        @foreach ($data->articles_pages as $all)    
        <div class="col-lg-4 col-md-4 mb-3">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $all->image_articles) }}" class="card-img-top img-fluid" alt="Article Image">
                <div class="card-body">
                    <div class="mb-3">
                        <h3 class="card-title">{{ $all->title_articles }}</h3>
                        <p class="card-subtitle fw-lighter">{{ $all->user->username }}</p>
                    </div>

                    <div class="mb-3">
                        <p class="card-text">{{ strip_tags(Illuminate\Support\Str::limit($all->content_articles, 300)) }}</p>
                        <a href="{{ url('admin/view/' . $all->slug) }}">See More</a>
                    </div>

                    <p><small class="text-muted">{{ $all->created_at->format('d M Y - H:i:s') }}</small></p>
                </div>
            </div>
        </div>
        @endforeach

        {{-- <div class="my-5" id="pagin-content">
            {!! $data->links() !!}
        </div> --}}

    </div>

</section>
@endsection

@push('styles')
<style>

    #all-posts .card .card-text {
        text-align: justify;
    }
    #all-posts .card {
        background: rgb(41, 40, 40);
        border-radius: 10px;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        transition: all ease 0.5s;
    }
    #all-posts .card img {
        height: 200px;
        object-fit: cover;
    }

    #pagin-content .page-link {
        background: none;
        border: none;
    }
    #pagin-content .page-link:hover {
        background: white;
        color: #000;
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
    console.log(`All Posts Page`)
</script>
@endpush