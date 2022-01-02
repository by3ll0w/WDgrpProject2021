<!doctype html>
<html lang="en">

<head>



  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  


  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS --> 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>




 

  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <title>The Noodle Stop</title>
</head>

<body>
  <div id=app>
    <nav class="navbar navbar-expand shadow-sm">

      <div class="container">

        <a href="#" class="navbar-brand">The Noodle Stop </a>



        <ul class="nav navbar-nav navbar-right">
          @guest
          @if (Route::has('login'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @endif

          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
          @endif
          @else
          <li class="nav-item">
            <a type="button" class="btn btn-success" href="{{route('viewCart')}}">
              My Cart <span class="badge bg-danger"></span>
</a>
          </li>
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
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


      </div>
    </nav>
  </div>



  @yield('content')
</body>
</ht