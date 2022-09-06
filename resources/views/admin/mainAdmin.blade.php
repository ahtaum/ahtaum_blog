@extends('layout.mainLayoutAdmin')

@section('title', 'Admin Home')
@section('content')
<section id="mainAdmin" class="container my-lg-5 my-2 p-lg-0 p-md-0 p-3">

    {{-- Row-1 --}}
    <div class="row text-light" id="row-1">
        <div class="col-lg-8 col-md-8">
            <div class="card h-100" id="home-title-admin">
                <div class="card-body">
                    <h1 class="mb-3">Selamat Datang Admin</h1>
                    <p class="fs-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Molestiae facere ad optio accusantium deleniti reprehenderit odit modi distinctio deserunt ex!</p>
                    <hr class="mt-4">
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 mt-3 mt-lg-0 mt-md-0">
            <div class="card h-100" id="total-content">
                <div class="card-body text-center">
                    
                    <div class="total-content">
                        <h3>Total Articles</h3>
                        <h1 class="display-3 my-3">{{ count($dataContent->articles_pages) }}</h1>
                    </div>

                    <div class="my-3">
                        <a href="{{ url('/admin/postForm') }}" class="btn btn-outline-light"><i class="bi bi-plus-lg"></i> New Post</a>
                        <a href="{{ url('/admin/post') }}" class="btn btn-outline-success mx-3 mt-lg-0 mt-md-3"><i class="bi bi-gear"></i> Post</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Row-2 --}}
    <div class="row text-light my-3" id="row-2">
        <h1 class="my-3">Articles</h1>
        @foreach ($dataContent->articles_pages as $data)    
            <div class="col-lg-6 col-md-6 mb-lg-0 mb-3">
                <div class="card mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/' . $data->image_articles) }}" class="card-img-top img-fluid" alt="Article Image">
                        </div>

                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <h3 class="card-title mx-1">{{ $data->title_articles }}</h3>
                                    <form action="{{ url('/admin/delete/' . $data->slug) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger delete-confirm" type="submit" data-articles="{{ $data->title_articles }}"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>

                                <p class="card-text">{{ strip_tags(Illuminate\Support\Str::limit($data->content_articles, 300)) }}</p>
                                <a href="{{ url('admin/view/' . $data->slug) }}">See More</a>
                                <a href="{{ url('admin/edit-form/' . $data->slug) }}" class="mx-3">Edit</i></a>
                                <p class="card-text"><small class="text-muted">{{ $data->created_at->format('d M Y - H:i:s') }}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Row-3 --}}
    <div class="row text-light my-5" id="row-3">
        <div class="card h-100 my-4" id="home-api-quote">
            <div class="card-body">
                <div class="owl-carousel owl-theme">
                    @foreach (array_slice($dataApiQuotes, rand(0, 100), rand(101, 200)) as $dataApi) 
                    <div class="item p-2 text-center">
                        <p class="fs-3 text-api">" {{ $dataApi->text }} "</p>
                        <p class="fs-3 fw-lighter">{{ $dataApi->author ? $dataApi->author : "Uknown" }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</section>
@endsection

@push('styles')
<style>
    
    #mainAdmin .text-api {
        font-family: 'Anton', sans-serif;
    }

    #mainAdmin #row-1 #home-title-admin {
        background: rgb(41, 40, 40);
        border-radius: 10px;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
    #mainAdmin #row-1 #home-title-admin hr {
        color: #ff4800;
        font-weight: bolder;
    }

    #mainAdmin #row-1 #total-content {
        background: rgb(41, 40, 40);
        border-radius: 10px;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    #mainAdmin #row-2 .card {
        background: rgb(41, 40, 40);
        border-radius: 10px;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        transition: all ease 0.5s;
    }
    #mainAdmin #row-2 .card:hover, img {
        background: #111;
        transition: all ease 0.5s;
        filter: brightness(80%);
        color: #fff;
        box-shadow: rgba(99, 99, 101, 0.15) 0px 48px 100px 0px;
    }
    #mainAdmin #row-2 .card img {
        object-fit: cover;
        height: 290px;
        filter: brightness(100%);
    }

    #mainAdmin #row-3 #home-api-quote {
        background: rgb(41, 40, 40);
        border-radius: 10px;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    @media (max-width: 576px) {}

    @media (min-width: 720px) {
        #mainAdmin #row-2 .card img {
            height: 410px;
        }
    }

    @media (min-width: 992px) {
        #mainAdmin #row-2 .card img {
            height: 290px;
        }
    }

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {}

</style>
@endpush

@push('scripts')
<script type="module">

    $('.delete-confirm').click(function(event) {
        let form = $(this).closest("form")
        let articles = $(this).data("articles")
        event.preventDefault()

        Swal.fire({
          title: `Are you sure you want to delete ${name}?`,
          text: "If you delete this, it will be gone forever.",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
                form.submit();
            }
        })
    });

    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            autoplay:true,
            center: true,
            lazyLoad:true,
            loop: true,
            margin: 10,
            nav: false,
            responsiveClass:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    })

</script>
@endpush