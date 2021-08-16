<?php
require_once "admin_header.php";  
require_once "login_signup_top.php"; 
?>

<form class="login-form loginForm" action="<?php echo APP_URI ?>" method="post" style="margin-top:30px;">
<input type="hidden" name="crfToken" value="<?php echo $crfToken ?>">
<div class="login-wrap">
<p class="login-img"><i class="icon_lock_alt"></i></p> 

<div class='alert alert-info infoMsg'>Please login to access the control panel.</div>   
<div class='alert alert-danger errorMsg' style="display: none;"></div> 
<label>Email</label>
<div class="input-group">
<span class="input-group-addon"><i class="icon_profile"></i></span>
<input type="text" class="form-control" name="admin_email" placeholder="Email" autofocus>
</div>

<label>Password</label>
<div class="input-group">
          <span class="input-group-addon">
            <i style="cursor: pointer; float: right; margin-top: 10px; z-index: 2; background-image: url(<?php echo  APP_URI?>/assets/images/show-password.png); background-size: 20px; background-repeat: no-repeat; width: 20px; height: 20px;" onclick="showPassword()"></i></span>
          <input type="password" class="form-control" name="admin_password" placeholder="Password" id="password">
         
          <script type="text/javascript">

              function showPassword(){
                var show = document.getElementById("password");
                if(show.type ==='password'){
                  show.type = 'text'
                }
                else{
                  show.type = 'password'
                }
              }

              $(document).ready(function(e){
                $(".loginForm").on("submit", (function(e){
                  e.preventDefault();
                  $(".SubmitLoader").show();
                  $(".Button1").hide();
                  $(".Button2").show();

                  $.ajaxSetup({
                    headers:{
                      "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  $.ajax({
                    url:'<?php echo APP_URI?>/admin/authenticate',
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(data){
                      $(".SubmitLoader").hide();
                      $(".Button1").show();
                      $(".Button2").hide();
                      if(data == "Admin Authenticated"){
                        $(".infoMsg").show();
                        $(".errorMsg").hide();
                        window.location.href ="dashboard";
                      }
                      else{
                        $(".infoMsg").hide();
                        $(".errorMsg").show();
                        $(".errorMsg").html(data);
                      }
                      
                    }

                  });
                }));
              }) 
            </script>
        </div>
        <input type="hidden" name="submit_login">
        <button class="btn btn-primary btn-lg btn-block Button1" type="submit" name="submit_login">Login</button>
        <button class="btn btn-primary btn-lg btn-block Button2" type="button" style="display: none;">Logging you in....</button>
        <div class="SubmitLoader" style="margin-top:-38px;  margin-right:10px; display: none; float: right;"></div>
         <label class="checkbox">
                <br>
                <span class="pull-left"> <a href="<?php echo APP_URI ?>/signup"> Signup</a></span>
            </label>
      </div>
    </form>
<?php require_once "login_signup_bottom.php" ?>