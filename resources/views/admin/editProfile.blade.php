@extends('layout.mainLayoutAdmin')

@section('title', 'Edit Post')
@section('content')
<section id="editUser" class="container mt-5">
    <div class="container">
        <div class="row text-light">
            <h1>Edit Profile</h1>
            
            <form action="{{ url('admin/edit/user/' . Auth::user()->id) }}" method="post" id="formInput" class="my-5" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Your Name" name="username" value="{{ old('username', Auth::user()->username) }}" />
                  
                    @if ($errors->has('username'))
                        <div class="form-text error-list text-danger fw-bolder">{{ $errors->first('username') }}</div>
                    @else
                        <div class="form-text">Jangan Gunakan <span class="fw-bolder">koma, hastag, dan karakter lainya</span></div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Your Avatar</label>
                    <input class="form-control" type="file" name="avatar" />

                    @if ($errors->has('avatar'))
                        <div class="form-text error-list text-danger fw-bolder">{{ $errors->first('avatar') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="title" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Your New Password" name="password" />
                  
                    @if ($errors->has('password'))
                        <div class="form-text error-list text-danger fw-bolder">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirm" placeholder="Password Confirm" />
                    @if ($errors->has('password_confirm'))
                        <div class="form-text error-list text-danger fw-bolder">{{ $errors->first('password_confirm') }}</div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url('admin/profile') }}"class="btn btn-danger">Kembali</a>
            </form>
    
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>

    #editUser .card {
        background: rgb(41, 40, 40);
        border-radius: 10px;
        border: none;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }
    #editUser .content-profile img {
        border-radius: 50%;
        border: none;
    }

    #formInput textarea {
        height: 300px;
    }

    @media (max-width: 576px) {}

    @media (min-width: 720px) {}

    @media (min-width: 992px) {}

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {}

</style>
@endpush