<div class="jumbotron p-3 text-light" style="background-image: url(@yield('image-banner'))">
    <div class="content-banner text-center">
        <h1 class="display-3 fw-bolder">@yield("title-banner")</h1>
        <p class="lead">@yield('content-banner')</p>
    </div>
</div>

<style>

    .jumbotron {
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        height: 70vh;
    }
    .jumbotron .content-banner {
        margin-top: 50px;
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