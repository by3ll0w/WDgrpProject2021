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
      
          <li class="nav-item">
            <a class="nav-link" href="{{ route('viewTopping') }}">{{ __('Toppings') }}</a>
          </li>
    
          <li class="nav-item">
            <a class="nav-link" href="{{ route('viewNoodleType') }}">{{ __('Noodle Types') }}</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="">{{ __('View Orders') }}</a>
          </li>

        </ul>


      </div>
    </nav>
  </div>



  @yield('content')
</body>
</ht