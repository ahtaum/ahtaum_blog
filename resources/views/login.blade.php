@extends('layout.loginLayout')
@section('title-login', 'Sign In')

@section('content-login')
<section class="container-fluid">
    <div id="login-pages" class="row text-light">
        <div class="col-lg col-md order-lg-first order-md-first order-last">
            <div class="list-content-login px-lg-5 px-md-5">
                <h2 class="mb-lg-5"><i class="bi bi-moon-stars"></i> Ahtaum Blog</h2>
                <p class="display-4">Belum Punya Akun?</p>
                <p>Selamat Datang Di Ahtaum Blog, Silahkan login menggunakan Akun Blog atau menggunakan Akun Github, jika belum terdaftar Silahkan Registrasi.</p>
                <a href="{{ url('/') }}" class="login-back"><i class="bi bi-arrow-left-circle"></i></a>
            </div>
        </div>
        
        <div class="col-lg col-md order-lg-last order-md-last order-first">
            <div class="list-form-login px-lg-5">
                <h2 class="mb-lg-5 mb-4">Sign In</h2>
                <form action="{{ url('authenticate') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username..." value="{{ old('username') }}">
                        @if ($errors->has('username'))
                            <div class="form-text error-list text-danger fw-bolder">{{ $errors->first('username') }}</div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password..." value="{{ old('password') }}">
                        @if ($errors->has('password'))
                            <div class="form-text error-list text-danger fw-bolder">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="mt-5 button-form">
                        <button class="btn p-3" type="submit">Sign In</button>
                        <a href="{{ url('/registrasi') }}" id="register" class="btn p-3">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
@endsection

@push('styles')
<style>
    #login-pages .col-lg:nth-child(1) .list-content-login {
        margin-top: 50px;
        text-align: justify;
    }
    #login-pages .col-lg:nth-child(1) .list-content-login i {
        font-size: 30px;
    }

    #login-pages .col-lg:nth-child(2) {
        background: rgba(255, 255, 255, 0.07);
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        border: none;
        text-align: justify;
        height: 35rem;
    }
    #login-pages .col-lg:nth-child(2) .list-form-login {
        margin-top: 100px;
    }

    .button-form button:nth-child(1) {
        background: rgb(147, 20, 20);
        color: white;
        width: 49%;
        border: none;
        font-weight: lighter;
        transition: all ease 0.3s;
    }

    #login-pages #register {
        text-decoration: none;
        color: white;
        background: rgb(73, 41, 149);
        color: white;
        width: 49%;
        border: none;
        font-weight: lighter;
        transition: all ease 0.3s;
    }

    .login-back {
        color: white;
        transition: all ease 0.5s;
    }
    .login-back:hover {
        color: rgb(231, 34, 34);
        transition: all ease 0.5s;
    }

    @media (max-width: 576px) {}

    @media (min-width: 720px) {
        #login-pages .col-lg:nth-child(2) {
            height: 45rem;
        }
    }

    @media (min-width: 992px) {
        #login-pages .col-lg:nth-child(1) .list-content-login {
            margin-top: 100px;
        }

        #login-pages .col-lg:nth-child(2) {
            height: 40rem;
        }

        .button-form button:nth-child(1) {
            background: rgb(147, 20, 20);
            color: white;
            width: 250px;
            border: none;
            font-weight: lighter;
            transition: all ease 0.3s;
        }
        .button-form button:nth-child(1):hover {
            font-weight: bolder;
            transition: all ease 0.3s;
        }

        #login-pages #register {
            text-decoration: none;
            color: white;
            background: rgb(73, 41, 149);
            color: white;
            width: 250px;
            border: none;
            font-weight: lighter;
            transition: all ease 0.3s;
        }
        #login-pages #register:hover {
            font-weight: bolder;
            transition: all ease 0.3s;
        }
    }

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {}

</style>
@endpush