
<!--================= START OF TRANSACTION VALIDATION =================-->
<div id="checkBooking" class="tab-pane">
<section class="panel">
<h2 style="text-align: center;">Bookings Verification</h2>

<div class="itemvalidationcontainer">
<div class='alert alert-info trans_infoMsg' style="margin-top: 10px;">Enter Customer's phone number or booking code to verify booking</div>   
<div class='alert alert-danger trans_errorMsg' style="display: none;"></div>
</div>

<!--======== START OF SHOWING SUCCESSFUL TRANSACTION DETAILS =================-->
<div class="activatedUserDetails" style="display: none;">
  <button class="anotheractivationButton">New Search</button>
  <br>
  <br>
  <br>
  <div class="Content_details"></div>
</div>
<!--========= END OF SHOWING SUCCESSFUL TRANSACTION DETAILS  =================-->

<div class="itemvalidationcontainer">
<form action="" method="post" role="form" class="activateItem">
<input type="hidden" name="crfToken" value="<?php echo $crfToken;?>">

<div class="form-group">
<label>Enter Phone Number</label>
<input type="text" class="form-control" name="phone"  placeholder="Enter Phone Number" data-rule="email" data-msg="Please enter phone number" style="height: 40px; border-radius: 0px;"/>
<div class="validation"></div>
</div>
            
<div class="Cvheader-button submitBtn transButton1"> 
<input type="hidden" name="submit_info" style="display:none;"/>
<input type="submit" name="submit_info" value="Search" class="inputBbutton"/>
</div>

<div class="Cvheader-button submitBtn transButton2" style="display: none;" > 
<input type="button" value="Fetching Booking details..." class="inputBbutton" />
</div>

<div class="SubmitLoader activationLoader" style="margin-top:-38px; float:right; margin-right:10px; display: none;"></div>
</form>

</div>

 <script type="text/javascript">
$(document).ready(function(e){
$(".activateItem").on('submit', (function(e){
e.preventDefault();
$(".activationLoader").show();
$(".transButton1").hide();
$(".transButton2").show();
                     
$.ajax({
url:'<?php echo APP_URI ?>/booking/checkBooking',
method: "POST",
data: new FormData(this),
contentType: false,
processData: false,
success:function(data){
$(".activationLoader").hide();
$(".transButton1").show();
$(".transButton2").hide();

if(data == "Please phone number should look like 08012345678"|| data == "Invalid phone number" || data == "Please enter phone number" || data == "Sorry there's no booking attached to this"){
$(".trans_errorMsg").show();
$(".trans_errorMsg").html(data);
$(".trans_infoMsg").hide();
}
else{
$(".activateItem")[0].reset();
$(".activateItem").hide();
$(".activatedUserDetails").show();
$(".Content_details").html(data);

$(".trans_errorMsg").hide();
$(".trans_infoMsg").show();
$(".trans_infoMsg").html('Activation Successful');
}
}
});
}));
})


$(document).ready(function(e){
$(".anotheractivationButton").click(function(){
$(".trans_infoMsg").html('Enter Customer\'s phone number or booking code to verify booking');
$(".activatedUserDetails").hide();
$(".activateItem").show();
});
})

</script>            
</section>
</div>
<!--================= END OF ITEMS VALIDATION  ========================-->