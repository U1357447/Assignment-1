<!DOCTYPE html>
<html lang="en" class="html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MaxThreads') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="/js/app.js"></script>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="body">
    <div class="web" id="app">
        <nav class="navbar navbar-default navbar-static-top" style="margin-bottom:0px !important;">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'MaxThreads') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <div class="header">
            <div class="container">
                <div class="col-md-12 header-text">
                    <h1>{{config('app.name', 'MaxThreads')}}! Your Simple Message Board Site.</h1>
                    <p>Create, Read, Reply, Enjoy!</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(Session::has('successfulalert'))
                        <div class="alert alert-success" role="alert">
                            <p>{{Session::get('successfulalert')}}</p>
                        </div>
                    @endif
                    @if(Session::has('dangeralert'))
                        <div class="alert alert-danger" role="alert">
                            <p>{{Session::get('dangeralert')}}</p>
                        </div>
                    @endif
                    @yield('addform')
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            @yield('panelheader')
                        </div>
                        <div class="panel-body">
                            @yield('panelbody')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <div class="col-md-12 footer-text">
                    <p>University of Huddersfield</p>
                    <p>Advanced Web Programming | Assignment 1 | Software Engineering</p>
                    <p>© Max Jordan - U1357447</p>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>
