
<body>
  <!-- container section start -->
  <section id="container" class="">

<?php
/*it holds the logo, search input, profile picture*/
require_once "adminheader.php";
/*it holds the admin pages side menu*/
require_once "sidemenu.php";

?>
<!--main content start-->
<section id="main-content">
<section class="wrapper">
<?php
/*it holds the dashboard overviews such as the download and upload buttons*/
require_once "dashboard_overview.php";
/*it holds the middle boxes for counter*/
require_once "adminpagesmiddleboxes.php";
?>

       

<!-- page start-->
<div class="row">
<div class="col-lg-12">
<section class="panel" style="overflow-x: scroll; overflow-y: hidden;">
<br>