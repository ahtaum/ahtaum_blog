{{-- Mobile Views --}}
<nav class="navbar navbar-expand-lg d-block d-lg-none" id="menu-header">
    <div class="container d-flex">

        <a class="navbar-brand fs-5 flex-grow-1" href="{{ url('/admin/mainAdmin') }}"><i class="bi bi-moon-stars"></i></a>
    
        <div class="avatar-list mb-1">
          <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profil Anda" class="mt-3">
          <p class="mt-3 px-2 text-light float-end">{{ Auth::user()->username }}</p>
        </div>
    
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex flex-column">
            <li class="nav-item">
              <a class="nav-link active fs-5" aria-current="page" href="{{ url('/admin/main') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5" href="{{ url('admin/post') }}">Post</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-5" href="#">Profile</a>
            </li>
            <li class="nav-item d-lg-none d-block d-md-block">
              <a class="nav-link fs-5 login" href="{{ url('/logout') }}">Logout</a>
            </li>
          </ul>
        </div>

  </div>
</nav>
  
  {{-- Dekstop Views --}}
  <nav class="navbar navbar-expand-lg sidenav d-lg-block d-md-none d-none">
    <div class="container">
  
      <div class="collapse navbar-collapse">
        <div class="navbar-nav d-flex flex-column text-center">
          <a class="mb-3 navbar-brand" href="{{ url('admin/main') }}"><i class="bi bi-moon-stars"></i></a>
          <a class="nav-link" href="{{ url('admin/main') }}"><i class="bi bi-house"></i> Home</a>
          <a class="nav-link" href="{{ url('admin/post') }}"><i class="bi bi-gear"></i> Post</a>
          
          <div class="mt-5 profile-admin-list">
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profil Anda" class="rounded-circle img-fluid mt-3 w-50">
            <h4 class="mt-4 fw-bolder text-light">{{ Auth::user()->username }}</h4>
  
            <a class="nav-link mt-4" href="{{ url('admin/profile') }}"><i class="bi bi-person"></i> Profile</a>

            <form action="{{ url('/logout') }}" method="POST">
              @csrf
              @method('post')
              <button class="nav-link mx-3 btn btn-outline-danger mt-2" type="submit"><i class="bi bi-box-arrow-left"></i> Logout</button>
            </form>

          </div>
        </div>
      </div>
  
    </div>
  </nav>
  
  <style>
  
      .sidenav {
        overflow-y: hidden;
        height: 100%;
        width: 150px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        padding-bottom: 300px;
      }
      .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 20px;
        color: #818181;
        display: block;
      }
      .sidenav img {
        object-fit: cover;
      }
  
      .profile-admin-list {
        border-top: 1px solid rgb(143, 137, 137);
      }
  
      #menu-header .avatar-list img {
        width: 30px;
        object-fit: cover;
      }
      #menu-header .navbar-toggler {
        padding-right: 0;
      }

      #menu-header .nav-link {
        color: white;
        background: none;
        font-weight: lighter;
      }
      #menu-header .nav-link:hover {
        color: #111;
        background: white;
      }
  
      .nav-item {
        margin-right: 15px;
      }
      .login {
        margin-right: 0px;
      }
      .login .nav-link:hover {
        font-weight: bolder;
        transition: all ease 0.3s;
        color: rgb(102, 99, 99);
      }
  
      .nav-link, i {
        color: white;
        background: none;
        font-weight: lighter;
      }
      .nav-link:hover {
        color: white;
        border-right: 5px solid white;
      }
  
      .scrolled {
        background: rgba(0, 0, 0, 0.697);
        transition: background-color 200ms linear;
      }
  
      .navbar-toggler:focus {
        box-shadow: none;
      }
  
      .bi.bi-list {
        color: white;
      }
  
      .navbar-collapse {
        background: rgba(82, 81, 81, 0.5);
      }
      .navbar-collapse .nav-item {
        margin-left: 10px;
      }
  
      @media (max-width: 576px) {}
  
      @media (min-width: 720px) {}
  
      @media (min-width: 992px) {
        .navbar-collapse {
          background: none;
        }
        .navbar-collapse .nav-item {
          margin-left: 0px;
        }
      }
  
      @media (min-width: 1200px) {}
  
      @media (min-width: 1400px) {}
  
  </style>
  
  <script>
    $('.navbar-toggler-icon').addClass('bi bi-list');
  
    $(function () {
      $(document).scroll(function () {
        var $nav = $("#menu-header");
        $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
      });
    });
  </script>  