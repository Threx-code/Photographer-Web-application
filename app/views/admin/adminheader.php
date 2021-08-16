<header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="<?php echo APP_URI?>/dashboard" class="logo">Sarah.Studios</a>


      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form formSearch" action="<?php echo APP_URI?>/dashboard" method="post">
              <input class="form-control" placeholder="Search" type="text" name="search">
              <label for="searchButton">
              <img src="<?php echo APP_URI?>/assets/images/search-grey.png" width="25" height="25" style="margin-right:10px; margin-top:0px; cursor: pointer;">
              </label>
               <input type="hidden" name="searchSubmit">
              <input type="submit" name="searchSubmit" style="display: none;" id="searchButton">


              <div class="SubmitLoader searchLoader" style="margin-top:-2px; float:right; margin-right:10px; display: none;"></div>
            </form> 
          </li>
        </ul>
        <!--  search form end -->
      </div>

     <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
         
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">


<span class="profile-ava">
<?php
if(!empty($_SESSION['image'])){
  $_SESSION['image'] = str_replace("../public", '', $_SESSION['image']);
  $img =  APP_URI.$_SESSION['image'];
echo<<<_END
<img alt="" src="$img" width="40" height="40" class="profileImage">
_END;

}
else{
  $img= APP_URI."/assets/images/no_image.png"; 
echo<<<_END
 <img alt=""  src="$img" width="40" height="40" class="profileImage">
_END;

}
?>

</span>
<span class="username">
<?php
echo $_SESSION['firstname']." ".$_SESSION['lastname'];
?>
</span>
<b class="caret"></b>
</a>
<ul class="dropdown-menu extended logout">
  <div class="log-arrow-up"></div>
  <li class="eborder-top">
    <a href="<?php echo APP_URI?>/dashboard">
      <i class="icon_profile"></i> My Profile
    </a>
  </li>
  <li class="eborder-top">
    <a href="<?php echo APP_URI ?>/admin">
      <i class="icon_key"></i>Logout
    </a>
  </li>
</ul>
</li>
<!-- user login dropdown end -->
</ul>
<!-- notificatoin dropdown end-->
</div>
</header>
<!--header end-->

