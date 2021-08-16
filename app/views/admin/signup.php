<?php
require_once "admin_header.php";  
require_once "login_signup_top.php"; 
?>

<form class="login-form signupForm" action="<?php echo APP_URI ?>/signup/create" method="post" style="margin-top:30px;">
<input type="hidden" name="crfToken" value="<?php echo $crfToken; ?>">
<div class="login-wrap">
<p class="login-img"><i class="icon_lock_alt"></i></p> 

<div class='alert alert-info infoMsg'>Please fill the required fields.</div>   
<div class='alert alert-danger errorMsg' style="display: none;"></div>

<label>Firstname</label>
<div class="input-group">
  <span class="input-group-addon"><i class="icon_profile"></i></span>
  <input type="text" class="form-control"  name="firstname" placeholder="Firstname" autofocus >
</div>

<label>Lastname</label>
<div class="input-group">
  <span class="input-group-addon"><i class="icon_profile"></i></span>
  <input type="text" class="form-control"  name="lastname" placeholder="Lastname" autofocus >
</div>

<label>Email <span class="emailMSg" style="font-weight: bold;"></span></label>
<div class="input-group">
  <span class="input-group-addon"><i class="icon_profile"></i></span>
  <input type="text" class="form-control check_email"  name="email" placeholder="Email" autofocus >
</div>

<label>Password</label>
<div class="input-group">
  <span class="input-group-addon">
    <i style="cursor: pointer; float: right; margin-top: 10px; z-index: 2; background-image: url(<?php echo APP_URI ?>/assets/images/show-password.png); background-size: 20px; background-repeat: no-repeat; width: 20px; height: 20px;" onclick="showPassword()"></i></span>
    <input type="password" class="form-control" name="admin_password" placeholder="Password" id="password" >
  </div>

<input type="hidden" name="submit_login">
<button class="btn btn-primary btn-lg btn-block Button1" type="submit" name="submit_login">Signup</button>
<button class="btn btn-primary btn-lg btn-block Button2" type="button" style="display: none;">Signing you up....</button>
<div class="SubmitLoader" style="margin-top:-38px;  margin-right:10px; display: none; float: right;"></div>
<label class="checkbox">
<br>
<span class="pull-left"> <a href="<?php echo APP_URI ?>/admin">Already Signup</a></span>
</label>
</div>
</form>

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

$(document).ready(function(){
  $(".check_email").on("blur", function(){
    var getEmail = $(".check_email").val();
  
    $.ajax({
      url:'<?php echo APP_URI ?>/signup/emailAvailable',
      method:"POST",
      data:"email="+getEmail,
      dataType: "text",
      success:function(data){
        $(".emailMSg").show();
        $(".emailMSg").html(data);
        if(data == "Email address is available"){
          $(".emailMSg").html("Email address is available");
          $(".emailMSg").css("color", "#28a745");
        }
        else{
            $(".emailMSg").css("color", "red");
        }
        
      }

    });
  })
})

$(document).ready(function(e){
$(".signupForm").on("submit", (function(e){
  
  $.ajaxSetup({
    headers:{
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    }
  });

 

e.preventDefault();
$(".SubmitLoader").show();
$(".Button1").hide();
$(".Button2").show();
$.ajax({
url:'<?php echo APP_URI ?>/signup/create',
method: 'POST',
data: new FormData(this),
contentType: false,
processData: false,
success: function(data){
$(".SubmitLoader").hide();
$(".Button1").show();
$(".Button2").hide();
if(data == "Account Created Successfully. Wait for admin to approve your account"){
$(".infoMsg").show();
$(".errorMsg").hide();
$(".infoMsg").html(data);
$(".emailMSg").hide();
$(".signupForm")[0].reset();
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
<?php require_once "login_signup_bottom.php" ?>