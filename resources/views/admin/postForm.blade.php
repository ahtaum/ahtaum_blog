@extends('layout.mainLayoutAdmin')

@section('title', 'Admin Home')
@section('content')
<section id="userProfile" class="container mt-5">
    <div class="container">
        <div class="row text-light">
    
            <h1>Post Form</h1>

            @if($message = Session::get('success_post'))
                <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                    <p>{{ $message }}</p>
                    <a href="{{ url('/admin/main') }}">Kembali</a>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
    
            <form action="{{ url('/create') }}" method="post" id="formInput" class="my-5" enctype="multipart/form-data">

                @csrf
                @method('post')

                <div class="mb-3">
                    <label for="title" class="form-label">Title Article</label>
                    <input type="text" class="form-control" placeholder="Title Article" name="title_articles" value="{{ old('title_articles') }}" />
                  
                    @if ($errors->has('title_articles'))
                        <div class="form-text error-list text-danger fw-bolder">{{ $errors->first('title_articles') }}</div>
                    @else
                        <div class="form-text">Jangan Gunakan <span class="fw-bolder">koma, hastag, dan karakter lainya</span></div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" name="image_articles" />

                    @if ($errors->has('image_articles'))
                        <div class="form-text error-list text-danger fw-bolder">{{ $errors->first('image_articles') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="content_articles" class="form-label">Content</label>
                    <input id="content_articles" type="hidden" name="content_articles">
                    <trix-editor input="content_articles" class="form-control" placeholder="Your Content"></trix-editor>

                    @if ($errors->has('content_articles'))
                        <div class="form-text error-list text-danger fw-bolder">{{ $errors->first('content_articles') }}</div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>

    #userProfile .card {
        background: rgb(41, 40, 40);
        border-radius: 10px;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
    #userProfile .content-profile img {
        border-radius: 50%;
        border: none;
    }

    #formInput textarea {
        height: 300px;
    }

    .trix-button-group {
        background: white;
        color: black;
    }
    .trix-button:hover {
        background: rgb(176, 170, 170);
    }

    @media (max-width: 576px) {}

    @media (min-width: 720px) {}

    @media (min-width: 992px) {}

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {}

</style>
@endpush