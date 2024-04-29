<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title', @env('APP_NAME'))</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('Cvassets/css/styles.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">Clarence Taylor</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{asset('Cvassets/assets/img/profile.jpg')}}" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger
                        {{(request()->routeis('cv.index'))? 'active' : ''}}" href="{{route('cv.index')}}">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger
                        {{(request()->routeis('cv.Experience'))? 'active' : ''}}" href="{{route('cv.Experience')}}">Experience</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger
                        {{(request()->routeis('cv.Education'))? 'active' : ''}}" href="{{route('cv.Education')}}">Education</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger
                        {{(request()->routeis('cv.Skills'))? 'active' : ''}}" href="{{route('cv.Skills')}}">Skills</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger
                        {{(request()->routeis('cv.Interests'))? 'active' : ''}}" href="{{route('cv.Interests')}}">Interests</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger
                        {{(request()->routeis('cv.Awards'))? 'active' : ''}}" href="{{route('cv.Awards')}}">Awards</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
        @yield('content')
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('Cvassets/js/scripts.js')}}"></script>
    </body>
</html>
