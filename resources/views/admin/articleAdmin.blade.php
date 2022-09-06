@extends('layout.mainLayoutAdmin')

@section('title', 'Admin Home')
@section('content')
<section id="article-admin-home" class="container text-light">
    <div class="jumbotron p-3 my-5">
        <div class="content-banner text-center">
            <h1 class="display-3 fw-bolder">{{ $data->title_articles }}</h1>
        </div>
    </div>

    <div class="row">
        <p class="content-article-admin fs-5">{{ strip_tags($data->content_articles) }}</p>
    </div>

    <a href="{{ URL::previous() }}" class="btn btn-danger mb-4">Kembali</a>
</section>
@endsection

@push('styles')
<style>

    .jumbotron {
        background-image: linear-gradient(rgba(60, 56, 56, 0.5), rgba(35, 33, 33, 0.5)), url({{ asset('storage/' . $data->image_articles) }});
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height: 70vh;
    }
    .jumbotron .content-banner {
        margin-top: 50px;
    }

    .content-article-admin {
        text-align: justify;
    }

    @media (max-width: 576px) {}

    @media (min-width: 720px) {}

    @media (min-width: 992px) {
        .jumbotron .content-banner {
            margin-top: 120px;
        }
    }

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {}

</style>
@endpush

@push('scripts')
<script type="module">

    // document.getElementById('coba').addEventListener('click', function() {
    //     Swal.fire('Any fool can use a computer')
    // });

    $("#coba").click(function() {
        Swal.fire('Any fool can use a computer')
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