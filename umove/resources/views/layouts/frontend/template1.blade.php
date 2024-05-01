
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-3WJT86K51R"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-3WJT86K51R');
        </script>
        <meta charset="UTF-8">
        <title> @yield('title')  </title>
        @yield('meta')
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="author" content="janansoft limited" />
        <meta name="robots" content="all, index, follow" />
        <meta name="revisit-after" content="1 days" />
        <meta name="rating" content="general" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <!-- <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" > -->
        
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/bootstrap.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/magnific-popup.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/jquery.selectBox.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/dropzone.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/rangeslider.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/animate.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/leaflet.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/slick.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/slick-theme.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/map.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/jquery.mCustomScrollbar.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/font-awesome.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/flaticon.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/owl.carousel.min.css') }}">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/jslider.css') }}" >
        

        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">
        <link type="text/css" rel="stylesheet" href="{{ asset('/frontend/templates/css/style.css?'.time()) }}">
        <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('/frontend/templates/css/default.css') }}">
        @yield('css')
  
    </head>

    <body id="top" >
        <div class="page_loader"></div>
        @yield('content')
        <!-- Full Page Search -->
        <div id="full-page-search">
            <button type="button" class="close">×</button>
            <form method="GET" autocomplete="off">
                <input id="text_search" mozactionhint="go" type="search" placeholder="Type" />
                <button type="button" onclick="searchText()" class="btn btn-sm btn-color">Search</button>
            </form>
        </div>
        @include('frontend.template1.elements.footer')
            
        <script src="{{ asset('/frontend/templates/js/jquery-2.2.0.min.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/popper.min.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/jquery.selectBox.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/rangeslider.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/jquery.filterizr.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/wow.min.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/backstretch.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/jquery.countdown.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/jquery.scrollUp.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/particles.min.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/typed.min.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/dropzone.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/jquery.mb.YTPlayer.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/leaflet.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/leaflet-providers.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/leaflet.markercluster.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/slick.min.js') }}"></script>
        
        <script src="{{ asset('/frontend/templates/js/maps.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/ie-emulation-modes-warning.js') }}"></script>
        <script  src="{{ asset('/frontend/templates/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/jshashtable-2.1_src.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/jquery.numberformatter-1.2.3.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/tmpl.js') }}"></script>
        
        <script src="{{ asset('/frontend/templates/js/jquery.dependClass-0.1.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/draggable-0.1.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/jquery.slider.js') }}"></script>
        <script src="{{ asset('/frontend/templates/js/jquery.turkish_currency.min.js') }}"></script>
        <!-- Custom JS Script -->
        <script  src="{{ asset('/frontend/templates/js/app.js') }}"></script>
        <script  src="{{ asset('/frontend/templates/js/home.js') }}"></script>
        @yield('script')
    </body>
</html>
