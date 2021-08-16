<?php
use Controller\Controller as Controller;
use Controller\Validator as Validator;
class BookingDisplay extends Controller{

	use Validator; 

/*COMPLETING SINGLE BOOKING*/
	public function approveSingle(){
		if(isset($_SESSION['admin_email'])){
		$this->model("BookingModel");
		if(isset($_POST['booking_approved'])){
			$this->sanitizeString($_POST['booking_approved']);
			$id = $this->sanitizeString($_POST['id']);
			BookingModel::where('id', $id)->update(['decision'=>'Completed']);
		}
	}

	}
/*COMPLETING SINGLE BOOKING*/




/*DELETING SINGLE BOOKING*/
	public function declineSingle(){
		if(isset($_SESSION['admin_email'])){
		$this->model("BookingModel");
		if(isset($_POST['booking_delete'])){
			$this->sanitizeString($_POST['booking_delete']);
			$id = $this->sanitizeString($_POST['id']);
			BookingModel::where('id', $id)->delete();
		}
	}

	}
/*DELETING SINGLE BOOKING*/




/*COMPLETING MULTIPLE  BOOKING*/
		public function approveMultiple(){
			if(isset($_SESSION['admin_email'])){
			$this->model("BookingModel");
			if(isset($_POST['booking_approve_all'])){
			$approve_all = $this->sanitizeString($_POST['booking_approve_all']);
			$id = $this->sanitizeString($_POST['id']);
			$check_all = $this->sanitizeString($_POST['booking_check_all']);
			if(!empty($check_all)){
				BookingModel::where('id', $id)->update(['decision'=>'Completed']);
			}
		}
	}
	}
/*COMPLETING MULTIPLE  BOOKING*/


/*DELETING MULTIPLE  BOOKING*/
	public function declineMultiple(){
		if(isset($_SESSION['admin_email'])){
			$this->model("BookingModel");
			if(isset($_POST['booking_delete_all'])){
			$approve_all = $this->sanitizeString($_POST['booking_delete_all']);
			$id = $this->sanitizeString($_POST['id']);
			$check_all = $this->sanitizeString($_POST['booking_check_all']);
			if(!empty($check_all)){
				BookingModel::where('id', $id)->delete();
			}
		}
	}
	}
/*DELETING MULTIPLE  BOOKING*/











	public function fetch_booking(){
		$this->model("BookingModel");

		if(isset($_POST['bookingData'])){
	$bookingData = $this->sanitizeString($_POST['bookingData']);
	$data = array();
	$start = $this->sanitizeString($_POST['bookingstart']);
	$limit = $this->sanitizeString($_POST['bookinglimit']);
	
	$data = BookingModel::orderby('id', 'desc')->offset($start)->limit($limit)->get();

foreach ($data as  $value):
$id = $value->id;	
$url = APP_URI;

echo<<<_END

<tr class="booking_option$id booking_highlightall">


<td class="booking_verifyRequest$id" > 
<form action="" method="post" name="this_loan$id" class="booking_verifyAll$id" style="width:100px;">

<input type="hidden" name="booking_approve_all" style="display:none;"/>
<input type="button" name="booking_approve_all" style="display:none;" class="booking_approve_all$id" formaction="$url/bookingdisplay/approveMultiple"/>

<input type="hidden" name="booking_delete_all" style="display:none;"/>
<input type="button" name="booking_delete_all" style="display:none;" class="booking_deleteAll$id" formaction="$url/bookingdisplay/declineMultiple"/>

<input type="hidden" name="id" style="display:none;" value="$id"/>
<input type="checkbox" name="booking_check_all" class="booking_select$id booking_checkboxes" style="width:30px; height:20px; padding:20px;" value="$id"/>
</form>
</td>
<td>$value->fullname</td>
<td>$value->phone_number</td>
<td>$value->booking_email</td>
<td>$value->type_of_booking</td>
<td>$value->booking_date</td>
<td>$value->state</td>
<td>$value->lcda</td>
<td>$value->created_at</td>
<td style="background-color:#1a2732;">

<div class="top-nav $id" style="width:70px;">
<ul class="nav pull-right top-menu">    
<li class="dropdown">

<a data-toggle="dropdown" class="dropdown-toggle $id" href="#" >
<span style="margin-left:-40px; font-size:13px; color:#fff; font-weight:bold;">
_END;

if(!empty($value->decision)){
echo $value->decision;	
}
else{
	echo "Option";
}

echo<<<_END
<i class="caret"></i>
</span>
</a>

<ul class="dropdown-menu extended">
<div class="log-arrow-up"></div>
<li class="eborder-top">
<form action="" method="post" class="booking_approved$id optionMenuContainer">
<input type="hidden" name="id" style="display:none;" value="$id"/>
<input type="hidden" name="booking_approved" value="Completed" />
<input type="submit" name="booking_approved" value="Completed" class="optionMenu" id="approved$id"/>

</form>
</li>
_END;

if(empty($value->decision)){
echo<<<_END
<li class="eborder-top">
<form action="" method="post" class="booking_delete$id optionMenuContainer">
<input type="hidden" name="id" style="display:none;" value="$id"/>
<input type="hidden" name="booking_delete" value="Delete" />
<input type="submit" name="booking_delete" value="Delete" class="optionMenu" id="decline$id"/>
</form>
</li>
_END;
}
echo<<<_END
</ul>
</li>
</ul>
</div>
</td>
</tr>

<script type="text/javascript">

$(document).ready(function(){
$(".booking_completed_all").click(function(){
if($(".booking_select$id").prop('checked') == true){
$(".booking_approve_all$id").click();
$(".closeBtn").click();
}
else{
	$(".booking_result1").html("Please select at least one booking request");
}
})


$(".booking_delete_all").click(function(){
if($(".booking_select$id").prop('checked') == true){
$(".booking_deleteAll$id").click();
$(".closeBtn").click();
}
else{
	$(".booking_result2").html("Please select at least one booking request");
}
})

/*this allows each box to be checked*/

$(".booking_select$id").click(function(){
if($(this).prop('checked') == true){
$(".booking_option$id").css("background-color", "#1a2732");
$(".booking_option$id").css("color", "#fff");
}
else if($(this).prop('checked') == false){
$(".booking_option$id").css("background-color", "transparent");
$(".booking_option$id").css("color", "#888");
}
})
});




$(document).ready(function(e){
$(".booking_approve_all$id, .booking_deleteAll$id").click(function(){
$.ajax({
url:$(this).attr('formaction'),
method: "POST",
data: $(".booking_verifyAll$id").serialize(),
success:function(data){
$(".booking_verifyAll$id")[0].reset();
$(".booking_option$id").fadeOut();

}
});
});
})


/*this toggles on and off the select all option*/

$(document).ready(function(){
$('.booking_checkboxes').on('click', function(){
if($('.booking_checkboxes:checked').length == $('.booking_checkboxes').length){
$("#booking_select_all").prop('checked', true); 
}
else{
  $('#booking_select_all').prop('checked', false); 
}
});
});



$(document).ready(function(){
$(".booking_approved$id").on('submit', (function(e){
e.preventDefault();
$.ajax({
 url:"$url/bookingdisplay/approveSingle",
method: "POST",
data: new FormData(this),
contentType: false,
processData: false,
success:function(data){
$(".booking_approved$id")[0].reset();
$(".booking_option$id").fadeOut();
}
});
}));
});


$(document).ready(function(){
$(".booking_delete$id").on('submit', (function(e){
e.preventDefault();
$.ajax({
 url:"$url/bookingdisplay/declineSingle",
method: "POST",
data: new FormData(this),
contentType: false,
processData: false,
success:function(data){
$(".booking_delete$id")[0].reset();
$(".booking_option$id").fadeOut();
}
});
}));
});
</script>

_END;
endforeach;
}
		
}



}
?>