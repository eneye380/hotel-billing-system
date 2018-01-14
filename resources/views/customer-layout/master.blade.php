
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=" CarPark Booking System">
    <meta name="author" content="Abdulmumin - 08051185104">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Hotel Billing System</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>

  <body>
    @include('customer-layout.top-menu')
    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 d-none d-sm-block bg-light sidebar">
          @include('customer-layout.side-menu')
        </nav>

        <main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          @yield('content')

        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
  </body>
</html>
