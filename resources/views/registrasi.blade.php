@extends('layout.loginLayout')
@section('title-login', 'Sign Up')

@section('content-login')
<section class="container" id="form-registrasi">
    <div class="row">

        <div class="col-lg-7 mx-auto">
            <div class="card my-5">
                <div class="card-body">
                    <h1 class="text-center">Sign Up</h1>

                    @if($message = Session::get('success_post'))
                        <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                            <p>{{ $message }} <a href="{{ url('/login') }}">Login</a></p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ url('/register') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" />
                            @if ($errors->has('email'))
                                <div class="form-text error-list text-danger fw-bolder">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" />
                            @if ($errors->has('username'))
                                <div class="form-text error-list text-danger fw-bolder">{{ $errors->first('username') }}</div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" />
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

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Your Avatar</label>
                            <input class="form-control" type="file" name="avatar" />
                            @if ($errors->has('avatar'))
                                <div class="form-text error-list text-danger fw-bolder">{{ $errors->first('avatar') }}</div>
                            @endif
                        </div>

                        <div class="mt-5 button-form text-center">
                            <button class="btn btn-primary text-nowrap" type="submit">Sign Up</button>
                            <a class="btn btn-danger mx-2 text-nowrap" href="{{ url('/login') }}">Go Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection

@push('styles')
<style>

    #form-registrasi .card {
        background: rgba(255, 255, 255, 0.07);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        border: none;
        color: white;
    }
    #form-registrasi .button-form .btn {
        width: 100px;
    }

    @media (max-width: 576px) {}

    @media (min-width: 720px) {}

    @media (min-width: 992px) {}

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {}

</style>
@endpush