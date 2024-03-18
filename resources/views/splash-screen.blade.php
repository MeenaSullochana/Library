<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('presentation/favicons/favicon-apple-touch-icon.png')}} ">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('presentation/favicons/favicon-favicon-32x32.png')}} ">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('presentation/favicons/favicon-favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('presentation/images/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('presentation/images/favicon/safari-pinned-tab.svg')}}">
    <link rel="shortcut icon" href="{{ asset('presentation/favicons/favicon-favicon.ico"')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="{{ asset('presentation/images/favicon/browserconfig.xml"') }}">
    <meta name="theme-color" content="#ffffff">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&amp;family=Ubuntu:wght@400;500&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Digital Library - DPL</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('presentation/css/css-style.css') }}">
  </head>
  <body>
    <div class="curtain-cover">
      <div class="leftcurtain"><img src="{{ asset('presentation/images/images-frontcurtain.jpg') }}"></div>
      <div class="rightcurtain"><img src="{{ asset('presentation/images/images-frontcurtain.jpg') }}"></div>
      <a class="rope" href="#">
        <img src="{{ asset('presentation/images/images-rope.png')}}">
      </a>
    </div>
    <section class="home-section">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 posrel">
            <div class="screen">
              <img src="{{ asset('presentation/images/images-web.png')}}" class="img-fluid" alt="" title="">
            </div>
          </div>
          <div class="col-md-6 posrel">
            <div class="logo text-center">
              <img src="{{ asset('/images/Tamilnadu.png')}}" class="img-fluid" alt="" title="">
              <h1>பள்ளிக் கல்வி துறை</h1>
              <h1>பொது நூலக இயக்ககம்</h1>
              <h1>Transparent Book Procurement Portal</h1>
              <h3>&#2980;&#3007;&#2993;&#2965;&#3021;&#2965;&#2986;&#3021;&#2986;&#2975;&#3009;&#2990;&#3021;  &#2984;&#3006;&#2995;&#3021;  ( 11-03-2024 )</h3>
              <a href="/" class="btn btn-primary btn-lg">&#2997;&#2994;&#3016;&#2980;&#3021;&#2980;&#2995;&#2980;&#3021;&#2980;&#3016; &#2980;&#3018;&#2975;&#2969;&#3021;&#2965;&#2997;&#3009;&#2990;&#3021;</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <script src="{{ asset('presentation/js/1.11.3-jquery.min.js') }}"></script>
    <script src="{{ asset('presentation/js/js-bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('presentation/js/1.4.1-jquery.easing.min.js') }}"></script>

    <script type="text/javascript">
      $(document).ready(function() {

        $curtainopen = false;

        $(".rope").click(function(){
          $(this).blur();
          $(".rope").hide();
          if ($curtainopen == false){
            $(this).stop().animate({top: '0px' }, {queue:false, duration:350, easing:'easeOutBounce'});
            $(".leftcurtain").stop().animate({width:'60px'}, 2000 );
            $(".rightcurtain").stop().animate({width:'60px'},2000 );
            $curtainopen = true;
          }else{
            $(this).stop().animate({top: '-40px' }, {queue:false, duration:350, easing:'easeOutBounce'});
            $(".leftcurtain").stop().animate({width:'50%'}, 2000 );
            $(".rightcurtain").stop().animate({width:'51%'}, 2000 );
            $curtainopen = false;
          }
          return false;
        });

      });
    </script>

  </body>
</html>

