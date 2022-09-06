@extends('layout.app')
@section('title', 'About')

@section('title-banner', 'About')
@section('content-banner', 'Adalah Ghweh yg Bhuat inI')
@section('image-banner', asset('images/img3.jpg'))

@section('content')
<section id="row-1" class="text-light">
    <div class="container">

        <div class="row my-5">
            <div class="col-lg-6 col-md order-md-first order-lg-first order-last">

                <h1 class="mb-3">Tentang</h1>
                <p>Web ini adalah blog untuk mencurahkan pikiran dan isi hati saya sebelum saya mati</p>

                <div class="sosicial-icon">
                    <a href="https://github.com/ahtaum">
                        <i class="bi bi-github fs-3"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/judith-herlambang-218b89204/">
                        <i class="bi bi-linkedin fs-3 px-4"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-6 col-md order-md-last order-lg-last order-first">
                <img src="{{ asset('images/img1.jpg') }}" alt="img1.jpg" class="img-fluid mb-lg-0 mb-4">
            </div>
        </div>

    </div>
</section>

<section id="row-2" class="text-light">
    <div class="container-fluid">
        <div class="row my-5">
            <div class="col-lg-6 col-md px-lg-5 px-md-4 order-md-first order-lg-first order-last">
                
                <form action="">
                    <h2 class="mb-3">Contact Me</h2>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                      </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <button type="button" class="btn btn-outline-light">Light</button>
                </form>
            </div>

            <div class="col-lg-6 col-md order-md-last order-lg-last order-first">
                <div class="info-contact mt-lg-5 mt-0 px-4 py-5 h-75">
                    <h3 class="mb-4">Contact Info</h3>

                    <p class="fs-5"><i class="bi bi-envelope px-1"></i> aditalmahdi@gmail.com</p>
                    <p class="fs-5 mb-5 mb-lg-0"><i class="bi bi-building px-1"></i> Cirebon, West Java <span class="fw-bolder">Indonesia</span></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>

    #row-1 p {
        text-align: justify;
    }
    #row-1 a {
        text-decoration: none;
    }

    #row-2 .info-contact {
        background: rgb(50, 50, 50);
    }

    #row-2 form .form-control {
        background: rgb(50, 50, 50);
        box-shadow: none;
        color: #fff;
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
        
    console.log(`asdhniu`)

</script>
@endpush