<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Chrome, Firefox OS and Opera mobile address bar theming -->
    <meta name="theme-color" content="#000000">
    <!-- Windows Phone mobile address bar theming -->
    <meta name="msapplication-navbutton-color" content="#000000">
    <!-- iOS Safari mobile address bar theming -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#000000">

    <!-- SEO -->
    <meta name="description" content="Halfmoon is a responsive front-end framework that is great for building dashboards and tools. Built-in dark mode, full customizability using CSS variables (around 1,500 variables), optional JavaScript library (no jQuery), Bootstrap like classes, and cross-browser compatibility (including IE11).">
    <meta name="author" content="Halfmoon">
    <meta name="keywords" content="Halfmoon, HTML, CSS, JavaScript, CSS Framework, dark mode, dark-mode, darkmode, dark theme, dark-theme, darktheme, Bootstrap, Foundation, Bulma, dashboard, UI, UI framework, user interface, design, design system">

    <!-- Open graph -->
    <meta property="og:type" content="article">
    <meta property="og:url" content="https://www.gethalfmoon.com/page-sections-demo/?sidebar-type=overlayed-sm-and-down&amp;show-alert=yes">
    <meta property="og:title" content="Front-end framework with a built-in dark mode and full customizability using CSS variables; great for building dashboards and tools">
    <meta property="og:description" content="Halfmoon is a responsive front-end framework that is great for building dashboards and tools. Built-in dark mode, full customizability using CSS variables (around 1,500 variables), optional JavaScript library (no jQuery), Bootstrap like classes, and cross-browser compatibility (including IE11).">
    <meta property="og:image" content="https://res.cloudinary.com/halfmoon-ui/image/upload/v1599770364/halfmoon-og-image-1.1.0_uofgby.png">
    <meta name="twitter:card" content="summary_large_image">

    <meta property="fb:app_id" content="2560228000973437">
    <meta name="twitter:site" content="@halfmoonui">

    <!-- Fav and Title -->
    <link rel="icon" href="{{url('')}}/images/favicon-32x32.png">
    <title>Laramin 7 | @yield('title')</title>

    <!-- Halfmoon -->
    <link href="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/css/halfmoon.min.css" rel="stylesheet" />
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
    <!-- Roboto font (Used when Apple system fonts are not available) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Documentation styles -->
    <!-- <link href="/static/site/css/documentation-styles-4.css" rel="stylesheet"> -->
    <style>
        .custom-checkbox {
            margin-top: 3px;
            margin-bottom: 3px;
        }
    </style>
    @yield('headerScripts')
</head>

<body class=" with-custom-webkit-scrollbars with-custom-css-scrollbars" >

    <!-- Page wrapper start -->
    <div id="app">
        
        <!-- Navbar start -->
        <nav class="navbar">
            <a href="#" class="navbar-brand ml-10 ml-sm-20">
                <img src="{{url('')}}/images/favicon-32x32.png" alt="fake-logo">
                <span class="d-none d-sm-flex">BaazarKita Admin</span>
            </a>
            <div class="navbar-content ml-auto">
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                <button class="btn btn-action mr-5" type="button" onclick="halfmoon.toggleDarkMode()">
                    <i class="fa fa-moon-o" aria-hidden="true"></i>
                    <span class="sr-only">Toggle dark mode</span>
                </button>
            </div>

        </nav>
        <!-- Navbar end -->

        <!-- Content wrapper start -->
        <main class="py-4">
            @yield('content')
        </main>
        <!-- Content wrapper end -->

    </div>
    <!-- Page wrapper end -->
    <!-- jQuery 3.5.1 -->
    <script src="{{url('')}}/plugins/jQuery-3.5.1/jquery.min.js"></script>

    <!-- Halfmoon JS -->
    <script src="https://cdn.jsdelivr.net/npm/halfmoon@1.1.1/js/halfmoon.min.js"></script>
    <script type="text/javascript">
        // Toasts a default alert
        function toastAlert() {
            var alertContent = "This is a default alert with <a href='#' class='alert-link'>a link</a> being toasted.";
            // Built-in function
            halfmoon.initStickyAlert({
                content: alertContent,
                title: "Toast!",
                alertType: "alert-success"
            })
        }

        // Toggles the parent's dark mode (if this page is loaded in an iFrame) 
        function parentToggleDarkmode() {
            window.parent.toggleDarkModeFromChild();
        }

        // Override the dark mode toggle function to call the parent's one
        // Again, this is for the case where the page is loaded in an iFrame
        if (window !== window.parent) {
            halfmoon.toggleDarkMode = parentToggleDarkmode;
        }

        $(document).ready(function() {
            @if(Session('error'))
            halfmoon.initStickyAlert({
                content: "{{Session('error')}}",
                title: "Error",
                alertType: "alert-danger",
                timeShown: 10000
            });
            @endif
            @if(Session('success'))
            halfmoon.initStickyAlert({
                content: "{{Session('success')}}",
                title: "Hooray",
                alertType: "alert-success"
            });
            @endif
        });
    </script>
    @yield('footerScripts')
</body>

</html>