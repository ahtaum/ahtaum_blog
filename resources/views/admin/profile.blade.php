@extends('layout.mainLayoutAdmin')

@section('title', 'My Profile')
@section('content')
<section id="my-profile" class="container">
    <div class="row text-light my-5 p-3 p-lg-0">

        @if($message = Session::get('success_update_user'))
            <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                <p>{{ $message }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card text-center">
            <div class="card-body">
              <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Your Avatar" class="img-fluid w-25 rounded-circle mb-3">

              <div class="my-3">
                  <h4 class="card-title">{{ Auth::user()->username }}</h4>
                  <p class="card-text fw-bolder">{{ Auth::user()->email }}</p>
              </div>

              <a href="{{ url('admin/editProfile/' . Auth::user()->id) }}" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>

    </div>
</section>
@endsection

@push('styles')
<style>

    #my-profile .card {
        background: rgb(41, 40, 40);
        border-radius: 10px;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        transition: all ease 0.5s;
    }
    #my-profile .card img {
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
<script type="module">
    console.log(`Profile Page`)
</script>
@endpush