<!doctype html>
<html lang="en">

  <head>
     <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
   <meta name="description" content="">
   <meta name="description" content="">
   <meta name="csrf-token" content="<?php echo $crfToken; ?>">
   <link rel="icon" href="<?php echo $favicon; ?>">
   <title>Sarah Studios</title>

    <link href="https://fonts.googleapis.com/css?family=Muli:400,700|Hepta+Slab:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo(APP_URI) ?>/fonts/icomoon/style.css">

    <link rel="stylesheet" href="<?php echo(APP_URI) ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo(APP_URI) ?>/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo(APP_URI) ?>/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo(APP_URI) ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo(APP_URI) ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo(APP_URI) ?>/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="<?php echo(APP_URI) ?>/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="<?php echo(APP_URI) ?>/css/style.css">

    <script type="text/javascript" src="<?php echo(APP_URI) ?>/assets/scripts/jquery-3.2.1.min.js"></script>

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="index.html" class="font-weight-bold">Sarah.Studios</a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active showHome">
                    <a href="#Home" class="nav-link">Home</a>
                  </li>
                  <li class="showEvent">
                    <a href="#Event" class="nav-link">Event</a>
                  </li>
                  <li class="showContact">
                    <a href="#Contact" class="nav-link">Contact</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>










<script type="text/javascript">
  $(document).ready(function(){
    showHomePage();

    $(".showHome").click(function(){
       showHomePage();
    });

    $(".showEvent").click(function(){
       showEventPage();
    });

    $(".showContact").click(function(){
       showContactPage();
    });

    function showHomePage(){
      $(".homepage").show();
      $(".eventpage, .contactpage").hide();
      $(".showHome").addClass("active");
      $(".showEvent, .showContact").removeClass("active");
    }

    function showEventPage(){
      $(".eventpage").show();
      $(".homepage, .contactpage").hide();
      $(".showEvent").addClass("active");
      $(".showHome, .showContact").removeClass("active");
    }

    function showContactPage(){
      $(".contactpage").show();
      $(".eventpage, .homepage").hide();
      $(".showContact").addClass("active");
      $(".showEvent, .showHome").removeClass("active");
    }
  });
</script>

    