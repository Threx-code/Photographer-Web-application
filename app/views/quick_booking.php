<?php
require_once "modalform_css.php";
?>
<!--======== START MODAL FOR BOOKING MODAL  ========================-->

<div class="modal fade modalMainBackground" id="bookings" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-header" style="border: none;">
    <h1 class="applicationTitle" >Quick Booking</h1>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true" class="topCloseBtn">×</span>
    </button>
  </div>
  <div class="changeDialog card shadow" role="document" style="border: none;">
    <div class="">
      <div class="modal-header">
        <h3 class="modal-title">Fill the required fields</h3>
        <br>
        <br>
      </div>
      <div class="float-shapes"></div>
    <p class="alert alert-info shadow bookingMSg backendFeedbackinfo reset"></p>
    <p class="alert alert-danger shadow bookingErrorMSg backendFeedbackinfo reset" style="display: none;"></p>

    <div class="modal-body formContainer">
<form action="" class=" bookingForm allFormReset" method="post">

<input type="hidden" name="crfToken" value="<?php echo $crfToken;?>">

<div class=" d-flex  inputDiv">
  <label>Fullname<span style="color: red;">*</span></label>
  <input type="text" class="shadow form-control inputHeight" name="fullname">
</div>

<div class=" d-flex  inputDiv">
  <label>Phone NO<span style="color: red;">*</span></label>
  <input type="text" class="shadow form-control inputHeight check_phone" name="phoneNumber">
</div>

<div class=" d-flex  inputDiv">
  <label>Email<span style="color: red;">*</span></label>
<input type="text" class="shadow form-control inputHeight" name="email_address">
</div>

<div class=" d-flex  inputDiv">
  <label>Booking Type<span style="color: red;">*</span></label>
  <select class="shadow form-control inputHeight browser-default custom-select showOthers" name="book_type">
    <option></option>
    <option value="Birthday">Birthday</option>
    <option value="Wedding">Wedding</option>
    <option value="Outdoor-Session">Outdoor-Session</option>
    <option value="Indoor-Session">Indoor-Session</option>
    <option value="Others">Others</option>
  </select>
</div>

<script type="text/javascript">
$(document).ready(function(){
$(".showOthers").change(function(){
if($(this).val() == 'Others'){
$(".otherOption").show();
}
else{
$(".otherOption").hide();
$(".otherValue").val('');
}
});
});
</script>

<div class="otherOption" style="display: none;">
  <div class=" d-flex  inputDiv">
    <label>Other Booking</label>
    <input type="text" class="shadow form-control inputHeight otherValue" name="other_book">
  </div>
</div>


<div class=" d-flex  inputDiv">
  <label>Date<span style="color: red;">*</span></label>
  <input type="text" class="shadow form-control inputHeight" name="date">
</div>

<div class=" d-flex  inputDiv">
  <label>State<span style="color: red;">*</span></label>
  <select class="shadow form-control inputHeight browser-default custom-select selectstate" name="state">
    <option></option>
    <?php foreach($states as $state): 
        $state = $state['states'];
      ?>

      <option value="<?php echo $state; ?>"><?php echo $state; ?></option>
      <?php 
    endforeach;
    ?>
  </select>
</div>


<div class=" d-flex  inputDiv">
  <label>Local Govt<span style="color: red;">*</span></label>
  <select class="shadow form-control inputHeight browser-default custom-select getLcda" name="lcda_name">
    <option></option>
  </select>
</div>

<br>
<div class='SubmitbuttonDiv booking1 shadow inputDiv'>
  <input type="hidden" name="post_book">
  <input type="submit" value="Request Account" name="post_book"  class="btnSubmit closeBtn"/>
</div>
<div class='SubmitbuttonDiv booking2 shadow inputDiv' style="display: none;">
  <input type="button" value="Booking processing..." class="btnSubmit closeBtn"/>
</div>
<div class="SubmitLoader bookingLoader" style="margin-top:-38px; float:right; margin-right:10px; display: none;">
</div>
</form>
</div>
<p class="alert alert-info shadow bookingMSg backendFeedbackinfo reset"></p>
<p class="alert alert-danger shadow bookingErrorMSg backendFeedbackinfo reset" style="display: none;"></p>

<div class="modal-footer"><br>
 <span class="modal-dialog"></span>
 <div class="closeModalButtonDown">
  <input type="button" name="" value="Cancel" class="btnDownClose closeBtn formReset" data-dismiss="modal" aria-label="Close"/>
</div>
</div>
</div>
</div>
</div>



<script type="text/javascript">
$(document).ready(function(){
$(".selectstate").change(function(){
var getState = $(".selectstate").val();

$.ajaxSetup({
  headers:{
    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")
  }
});


$.ajax({
url:'<?php echo APP_URI ?>/home/getLcda',
type:"POST",
data:"state="+getState,
dataType:"text",
success:function(data){
$(".getLcda").html(data);
}
}); 
});
})


$(document).ready(function(e){
$(".bookingForm").on("submit", (function(e){
e.preventDefault();
$(".bookingLoader").show();
$(".booking1").hide();
$(".booking2").show();

$.ajaxSetup({
  headers:{
    "X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")
  }
});

$.ajax({
url:"<?php echo  APP_URI?>/booking/create",
method:"POST",
data: new FormData(this),
contentType: false,
processData: false,
success:function(data){
$(".booking1").show();
$(".booking2").hide();
$(".bookingLoader").hide();

if(data == "Booking Request Submitted Successfully"){
  $('.bookingMSg').show();
  $('.bookingErrorMSg').hide();
  $('.bookingMSg').html(data);
  $(".bookingForm")[0].reset();
}
else{
  $('.bookingMSg').hide();
  $('.bookingErrorMSg').show();
  $('.bookingErrorMSg').html(data);
}
}
});
}));
})

</script>


<!--=============== END MODAL FOR BOOKING MODAL =================-->
