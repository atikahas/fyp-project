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
    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
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

<body class=" with-custom-webkit-scrollbars with-custom-css-scrollbars" data-dm-shortcut-enabled="true" data-sidebar-shortcut-enabled="true">

    <!-- Page wrapper start -->
    <div id="page-wrapper" class="page-wrapper with-navbar with-sidebar " data-sidebar-type="overlayed-sm-and-down">

        <!-- Sticky alerts -->
        <div class="sticky-alerts"></div>

        <!-- Navbar start -->
        <nav class="navbar">
            <div class="navbar-content">
                <button id="toggle-sidebar-btn" class="btn btn-action" type="button" onclick="halfmoon.toggleSidebar()">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
            </div>
            <a href="#" class="navbar-brand ml-10 ml-sm-20">
                <img src="{{url('')}}/images/favicon-32x32.png" alt="fake-logo">
                <span class="d-none d-sm-flex">BaazarKita Admin</span>
            </a>
            <div class="navbar-content ml-auto">
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
                <button class="btn btn-action mr-5" type="button" onclick="halfmoon.toggleDarkMode()">
                    <i class="fa fa-moon-o" aria-hidden="true"></i>
                    <span class="sr-only">Toggle dark mode</span>
                </button>
            </div>

        </nav>
        <!-- Navbar end -->

        <!-- Sidebar overlay -->
        <div class="sidebar-overlay" onclick="halfmoon.toggleSidebar()"></div>

        <!-- Sidebar start -->
        <div class="sidebar">
            <div class="sidebar-menu">
                <a href="{{url('')}}" class="sidebar-link sidebar-link-with-icon">
                    <span class="sidebar-icon">
                        <i class="fa fa-tv" aria-hidden="true"></i>
                    </span>
                    Main App
                </a>
                <br />

                <h5 class="sidebar-title">Permission Management</h5>
                <div class="sidebar-divider"></div>
                <a href="{{url('admin/permissions')}}" class="sidebar-link sidebar-link-with-icon @yield('permissions_list')">
                    <span class="sidebar-icon">
                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                    </span>
                    Permissions List
                </a>
                <a href="{{url('admin/permissions/add')}}" class="sidebar-link sidebar-link-with-icon @yield('permissions_add')">
                    <span class="sidebar-icon">
                        <i class="fa fa-code-fork" aria-hidden="true"></i>
                    </span>
                    Add New Permission
                </a>
                <br />

                <h5 class="sidebar-title">Role Management</h5>
                <div class="sidebar-divider"></div>
                <a href="{{url('admin/roles')}}" class="sidebar-link sidebar-link-with-icon @yield('roles_list')">
                    <span class="sidebar-icon">
                        <i class="fa fa-sitemap" aria-hidden="true"></i>
                    </span>
                    Roles
                </a>
                <a href="{{url('admin/roles/add')}}" class="sidebar-link sidebar-link-with-icon @yield('roles_add')">
                    <span class="sidebar-icon">
                        <i class="fa fa-code-fork" aria-hidden="true"></i>
                    </span>
                    Add New Role
                </a>
                <br />
                <h5 class="sidebar-title">Meta</h5>
                <div class="sidebar-divider"></div>
                <a href="{{url('admin/meta')}}" class="sidebar-link sidebar-link-with-icon @yield('metas_list')">
                    <span class="sidebar-icon">
                        <i class="fa fa-cube" aria-hidden="true"></i>
                    </span>
                    List Meta
                </a>
                <a href="{{url('admin/meta/add')}}" class="sidebar-link sidebar-link-with-icon @yield('metas_add')">
                    <span class="sidebar-icon">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </span>
                    Add New Meta
                </a>
                <br/>
                <h5 class="sidebar-title">Meta Data</h5>
                <a href="{{url('admin/metadata')}}" class="sidebar-link sidebar-link-with-icon @yield('metadata_list')">
                    <span class="sidebar-icon">
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                    </span>
                    List Meta Data
                </a>
                <a href="{{url('admin/metadata/add')}}" class="sidebar-link sidebar-link-with-icon @yield('metadata_add')">
                    <span class="sidebar-icon">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </span>
                    Add New Meta Data
                </a>
                <br/>
                <h5 class="sidebar-title">Users</h5>
                <a href="{{url('admin/users')}}" class="sidebar-link sidebar-link-with-icon @yield('users_list')">
                    <span class="sidebar-icon">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </span>
                    List User
                </a>
                <a href="{{url('admin/users/add')}}" class="sidebar-link sidebar-link-with-icon @yield('users_add')">
                    <span class="sidebar-icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </span>
                    Add New User
                </a>
            </div>
        </div>
        <!-- Sidebar end -->

        <!-- Content wrapper start -->
        <div class="content-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
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