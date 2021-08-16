
<!--=================== START OF OF SETTINGS  ====================-->
<div id="settings" class="tab-pane">
<section class="panel">

<div class="itemvalidationcontainer">
<form action="<?php echo APP_URI ?>/dashboard" method="post" role="form" class="changeEmail">
<input type="hidden" name="crfToken" value="<?php echo $crfToken;?>">
<div class="col-12">
 <h2 style="text-align: center;">Change Your Email</h2>
</div>

<div class='alert alert-info email_infoMsg' style="display: none;"></div>   
<div class='alert alert-danger email_errorMsg' style="display: none;"></div>

<div class="form-group">
<label>Old Email</label>

<input type="text" class="form-control inputHeight old_email" name="admin_old_email" id="email" placeholder="Your Old Email" data-rule="email" data-msg="Please enter a valid email" value="<?php echo $_SESSION['admin_email'] ?>" />

              
<div class="validation"></div>
</div>
<div class="form-group">
<label>New Email <span class="emailMSg2"></span></label>
<input type="email" class="form-control inputHeight new_email" name="new_email" id="email" placeholder="Your New Email" data-rule="email" data-msg="Please enter a valid email" />
<div class="validation"></div>
</div>

<div class="form-group">
<label>Confirm Email</label>
<input type="email" class="form-control inputHeight" name="confirm_email" id="email" placeholder="Confirm Your New Email" data-rule="email" data-msg="Please enter a valid email" />
<div class="validation"></div>
</div>



             
<div class="Cvheader-button apply-to-job Button1" style="text-align:center; cursor:pointer; border-radius:20px; border:1px solid #17a2b8;" > 
<input type="hidden" name="send_email" style="display:none;"/>

<input type="submit" name="send_email" value="Update email" class="applyonKabakah-button" style="font-weight: bold; height: 40px; border:none; background-color: transparent;"/>
</div>

<div class="Cvheader-button apply-to-job Button2" style="text-align:center; cursor:pointer; border-radius:20px; border:1px solid #17a2b8; display: none;" > 
<input type="button" value="Updating your email..." class="applyonKabakah-button" style="font-weight: bold; height: 40px; border:none; background-color: transparent;"/>
</div>

<div class="SubmitLoader emailLoader" style="margin-top:-38px; float:right; margin-right:10px; display: none;"></div>

</form>
<script type="text/javascript">

$(document).ready(function(){
$(".old_email").on( "blur", function(){
var getEmail = $(".old_email").val();
$(".pass_infoMsg").hide();
$(".pass_errorMsg").hide();

$.ajaxSetup({
  headers:{
    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")
  }
});

$.ajax({
url:'<?php echo APP_URI ?>/dashboard/getEmail',
type:"POST",
data:"admin_old_email="+getEmail,
 dataType:"text",
success:function(data){
if(data == "Email is valid"){
$(".email_infoMsg").show();
$(".email_infoMsg").html(data);
$(".email_errorMsg").hide();
}
else{
$(".email_errorMsg").show();
$(".email_errorMsg").html(data);
$(".email_infoMsg").hide();
}
}
}); 
});
});


$(document).ready(function(){
$(".new_email").on( "blur", function(){
var getEmail2 = $(".new_email").val();
$(".pass_infoMsg").hide();
$(".pass_errorMsg").hide();

$.ajaxSetup({
  headers:{
    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")
  }
});

$.ajax({
url:'<?php echo APP_URI ?>/dashboard/emailAvailable',
type:"POST",
data:"new_email="+getEmail2,
 dataType:"text",
success:function(data){
if(data == "New email address is available"){
$(".email_infoMsg").show();
$(".email_infoMsg").html(data);
$(".email_errorMsg").hide();
}
else{
$(".email_errorMsg").show();
$(".email_errorMsg").html(data);
$(".email_infoMsg").hide();
}
}
}); 
});
})


$(document).ready(function(e){
$(".changeEmail").on('submit', (function(e){
e.preventDefault();
$(".emailLoader").show();
$(".Button1").hide();
$(".Button2").show();
$(".pass_infoMsg").hide();
$(".pass_errorMsg").hide();

$.ajaxSetup({
  headers:{
    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")
  }
});
                      
$.ajax({
url:'<?php echo APP_URI ?>/dashboard/updateEmail',
method: "POST",
data: new FormData(this),
contentType: false,
processData: false,
success:function(data){
$(".Button1").show();
$(".Button2").hide();
$(".emailLoader").hide();
if(data == $(".new_email").val()){
$(".changeEmail")[0].reset();
$(".email_infoMsg").show();
$(".email_infoMsg").html("Email Updated Successfully");
$(".old_email").val(data);
$(".email_errorMsg").hide();

}
else{
$(".email_errorMsg").show();
$(".email_errorMsg").html(data);
$(".email_infoMsg").hide();
}
}
});
}));
})
</script>



<form action="<?php echo APP_URI ?>/dashboard" method="post" role="form" class="changePassword" style="margin-top: 50px;">
<input type="hidden" name="crfToken" value="<?php echo $crfToken;?>">
 <h2 style="text-align: center;">Change Your Password</h2>

 <div class='alert alert-info pass_infoMsg' style="display: none;"></div>   
<div class='alert alert-danger pass_errorMsg' style="display: none;"></div>

                <div class="form-group">
                   <label>Old Password</label>
                <input type="password" class="form-control inputHeight" name="old_password" placeholder="Your Old Password" id="password"/>
                <span><i class="passwordeye" onclick="showPassword()"></i></span>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                 <label>New Password</label>
                <input type="password" class="form-control inputHeight" name="new_password" placeholder="Your New Password" id="password2"/>
                <span><i class="passwordeye" onclick="showPassword2()"></i></span>
                <div class="validation"></div>
              </div>

               <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control inputHeight" name="confirm_password" placeholder="Confirm Your New Password" id="password3"/>
                <span><i class="passwordeye" onclick="showPassword3()"></i></span>
                <div class="validation"></div>
              </div>
             
<div class="Cvheader-button apply-to-job pass_button1" style="text-align:center; cursor:pointer; border-radius:20px; border:1px solid #17a2b8;" > 
<input type="hidden" name="send_password" style="display:none;"/>
<input type="submit" name="send_password" value="Update password" class="applyonKabakah-button" style="font-weight: bold; height: 40px; border:none; background-color: transparent;"/>
</div>


<div class="Cvheader-button apply-to-job pass_button2" style="text-align:center; cursor:pointer; border-radius:20px; border:1px solid #17a2b8; display: none;" > 
<input type="button" value="Updating your password..." class="applyonKabakah-button" style="font-weight: bold; height: 40px; border:none; background-color: transparent;"/>
</div>

<div class="SubmitLoader passwordLoader" style="margin-top:-38px; float:right; margin-right:10px; display: none;"></div>

</form>
<script type="text/javascript">

$(document).ready(function(e){
$(".changePassword").on('submit', (function(e){
e.preventDefault();
$(".passwordLoader").show();
$(".email_infoMsg").hide();
$(".email_errorMsg").hide();
$(".pass_button1").hide();
$(".pass_button2").show();
                     
$.ajax({
url:'<?php echo APP_URI ?>/dashboard/updatePassword',
method: "POST",
data: new FormData(this),
contentType: false,
processData: false,
success:function(data){
$(".passwordLoader").hide();
$(".pass_button1").show();
$(".pass_button2").hide();
if(data == "Password Successfully Updated"){
$(".changePassword")[0].reset();
$(".pass_infoMsg").show();
$(".pass_infoMsg").html(data);
$(".pass_errorMsg").hide();

}
else{
$(".pass_errorMsg").show();
$(".pass_errorMsg").html(data);
$(".pass_infoMsg").hide();
}
}
});
}));
})

function showPassword(){
var show = document.getElementById("password");
if(show.type ==='password'){
show.type = 'text'
}
else{
show.type = 'password'
}
}


function showPassword2(){
var show2 = document.getElementById("password2");
if(show2.type ==='password'){
show2.type = 'text'
}
else{
show2.type = 'password'
}
}


function showPassword3(){
var show3 = document.getElementById("password3");
if(show3.type ==='password'){
show3.type = 'text'
}
else{
show3.type = 'password'
}
}
</script>


<style type="text/css">
.passwordeye{
cursor: pointer; 
float: right; 
margin-top: -25px; 
z-index: 2; 
background-image: url(<?php echo APP_URI ?>/assets/images/show-password.png); 
background-size: 20px; 
background-repeat: no-repeat; 
width: 20px; 
height: 20px;
position: relative;
margin-right: 10px;
}

.inputHeight{
  height: 40px;
}
</style>

</div>


</section>
<!-- page end-->
</div>
<!--================= END OF SETTINGS =============-->