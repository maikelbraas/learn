<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
        @yield('head')
        @show
</head>
<body>
   <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="{{ URL::route('home') }}">Project name</a>
        </div>
          <ul class="nav navbar-nav">
            <li><a href="{{ URL::route('home') }}">Home</a></li>
            <li><a href="{{ URL::route('getProject') }}">Projects</a></li>
            @if(Auth::check())
            <li><a href="{{ URL::route('getBlog') }}">Blog</a></li>
            @endif
            @if(Auth::check() && Auth::user()->isAdmin())
            <li><a href="{{ URL::route('getNewpage') }}">Create Page</a></li>
            @endif
          </ul>
          <span class="navbar-text">
            @if(Session::has('success'))
                <span class="alert alert-success">{{ Session::get('success') }}</span>
            @elseif(Session::has('fail'))
                <span class="alert alert-danger">{{ Session::get('fail') }}</span>
            @endif
            </span>
          <ul class="nav navbar-nav navbar-right">
            @if(!Auth::check())
                <li><a href="{{ URL::route('getLogin')  }}">Login</a></li>
                <li><a href="{{ URL::route('getCreate')  }}">Register</a></li>
            @else
                <li><a href="{{ URL::route('getLogout')  }}">Logout</a></li>
            @endif
          </ul>
      </div>
    </div>
    
    <div class='container'>
    @yield('content')
    </div>
</body>
</html>
