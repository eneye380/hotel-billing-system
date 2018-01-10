
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Hotel Billing System</title>

    <!-- Bootstrap core CSS -->
    <!-- Custom styles for this template -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
	<!-- Custom styles for this template-->
	
    <link href="css/cover.css" rel="stylesheet">
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <header class="masthead clearfix">
            @include('visitor-layout.header')
          </header>

          <main role="main" class="inner cover">
            @yield('content')
          </main>

          @include('visitor-layout.footer')

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('js/app.js')}}"></script>
  </body>
</html>
