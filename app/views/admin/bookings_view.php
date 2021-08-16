
<!--==========START OF Bookings ===============-->
<div id="booking" class="tab-pane">
<section class="panel">
<?php

if(!empty($booking_counter)){
?>

<header class="panel-heading" style="padding-top: 10px; padding-bottom: 20px;">
List of Bookings
<div class="approval_btn">
<input type="submit" name="" value="Delete" class="inputBtn" data-toggle="modal" data-target="#booking_delete"/>
</div>
<div class="approval_btn">
<input type="submit" name="" value="Completed" class="inputBtn" data-toggle="modal" data-target="#booking_completed_Modal" />
</div>


<!--======= START MODAL FOR APPROVING MULTIPLE BOOKING ======-->
  <div class="modal fade" id="booking_completed_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content" style="background-color: #fff;">
        <div class="modal-header" style="background-color: #fff;">
           <h3 class="modal-title" id="exampleModalLabel" style="float: left;">Booking Completed</h3>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <br>  <br>
        </div>
        <div class="modal-body">

<div class="hide_booking_download">
<p class="booking_result1" style="font-weight: bold; font-size: 16px; text-align: center;">
  Are you sure you want to perform ths action?
</p>

<br>
<p style="text-align: center;"> 

<input type="submit" value="Approve" class="download booking_completed_all"/>
<input type="button" value="Cancel" class="download closeBtn" data-dismiss="modal" aria-label="Close"/>
</p>
</div>

</div>
<div class="modal-footer"><br></div>
</div>
</div>
</div>

<!--======= START MODAL FOR APPROVING MULTIPLE BOOKING ======-->

<!--=== START MODAL FOR DELETING MULTIPLE BOOKING =========-->
  <div class="modal fade" id="booking_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content" style="background-color: #fff;">
        <div class="modal-header" style="background-color: #fff;">
          <h3 class="modal-title" id="exampleModalLabel" style="float: left;">
            Booking Delete
          </h3>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <br>  <br>
        </div>
        <div class="modal-body">

<div class="hide_booking_download">
<p class="booking_result2" style="font-weight: bold; font-size: 16px; text-align: center;">
  Are you sure you want to perform ths action?
</p>

<br>
<p style="text-align: center;"> 
<input type="submit" value="Delete" class="download booking_delete_all"/>
<input type="button" value="Cancel" class="download closeBtn" data-dismiss="modal" aria-label="Close"/>
</p>
</div>

</div>
<div class="modal-footer"><br></div>
</div>
</div>
</div>

 <!--=== START MODAL FOR DELETING MULTIPLE BOOKING =========-->

</header>

<table class="table table-bordered table-advance">
 <tbody class="booking_content">
<tr>
<th>Select All<br><input type="checkbox" id="booking_select_all"></th>

<th> Fullname</th>
<th> Phone Number</th>
<th> Email</th>
<th> Type of Booking</th>
<th> Booking Date</th>
<th> State</th>
<th> LCDA</th>
<th> Date Created</th>
<th> Decision</th>
</tr>
<!-- page end-->
</tbody>
</table>

<?php
}
?>

<script type="text/javascript">
$(document).ready(function(){
$("#booking_select_all").on('click', function(){
if(this.checked){
$(".booking_checkboxes").each(function(){
this.checked = true;
$(".booking_highlightall").css("background-color", "#1a2732");
$(".booking_highlightall").css("color", "#fff");
});
}
else{
$(".booking_checkboxes").each(function(){
  this.checked = false;
  $(".booking_highlightall").css("background-color", "transparent");
$(".booking_highlightall").css("color", "#888");
});
}
});
});


  var bookingMax = false;
  var bookingstart = 0;
  var bookinglimit = 6;

$(document).ready(function(e){
  $(".booking_Request").on('submit', (function(e){
   e.preventDefault();
   $(".bookingLoader").show();
    bookingData();
    }));
    });
  
  $(document).ready(function(){
    bookingData();
    });
  
  function bookingData(){
    if(bookingMax)
      return;
    
  $.ajax({

  url:'<?php echo  APP_URI ?>/bookingdisplay/fetch_booking',
    method: "POST",
    dataType: "text",
    data:{
      bookingData:1,
      bookingstart: bookingstart,
      bookinglimit: bookinglimit
    },
    success: function(response){
      if(response == "bookingMax" || response == 0){
        bookingMax = true;
        $(".booking_Request").hide();
      }
      else{
          $(".bookingLoader").hide();
         $(".booking_content").append(response);
          bookingstart += bookinglimit;
    }
    }
    });
    }

</script>
<hr style="height: 2px; background-color: #aaa;"> 

<?php

if($booking_counter == 0){
echo<<<_END
<h2 style="text-align: center;">No Account Opening Request Yet</h2>
_END;
}
elseif($booking_counter > 6){
echo<<<_END
<form action="admin_control" method="post" class="booking_Request" style="width:250px; margin:40px auto;">
<input type="hidden" name="" value="Follow" style="display:none;"/>
 <div style="text-align:center; cursor:pointer; border-radius:20px; border:1px solid #17a2b8;" >
<input type="submit" name="" value="Load More" style="font-weight: bold; height: 40px; border:none; background-color: transparent; cursor: pointer;"/>
</div>
<div class="SubmitLoader bookingLoader" style="margin-top:-38px; float:right; margin-right:10px; display: none;"></div>
</form>
_END;
}

?>
</section>
<!-- page end-->
</div>
<!--============ END OF BOOKING ================-->
