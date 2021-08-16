<?php
use Controller\Controller as Controller;
use Controller\Validator as Validator;
class Adminapprove extends Controller{

	use Validator; 
	public function index(){}

/*ACTIVATING SINGLE ADMIN*/
	public function approveSingle(){
		if(isset($_SESSION['admin_email'])){
		$this->model("AdminApproveModel");
		if(isset($_POST['admin_approved'])){
			$this->sanitizeString($_POST['admin_approved']);
			$id = $this->sanitizeString($_POST['id']);
			AdminApproveModel::where('id', $id)->update(['priority'=>'Activated']);
		}
	}

	}
/*ACTIVATING SINGLE ADMIN*/


/*DECLINING SINGLE ADMIN*/
	public function declineSingle(){
		if(isset($_SESSION['admin_email'])){
		$this->model("AdminApproveModel");
		if(isset($_POST['admin_decline'])){
			$this->sanitizeString($_POST['admin_decline']);
			$id = $this->sanitizeString($_POST['id']);
			AdminApproveModel::where('id', $id)->delete();
		}
	}

	}
/*DECLINING SINGLE ADMIN*/



/*ACTIVATING MULTIPLE  ADMIN*/
		public function approveMultiple(){
			if(isset($_SESSION['admin_email'])){
			$this->model("AdminApproveModel");
			if(isset($_POST['admin_approve_all'])){
			$approve_all = $this->sanitizeString($_POST['admin_approve_all']);
			$id = $this->sanitizeString($_POST['id']);
			$check_all = $this->sanitizeString($_POST['admin_check_all']);
			if(!empty($check_all)){
				AdminApproveModel::where('id', $id)->update(['priority'=>'Activated']);
			}
		}
	}
	}
/*ACTIVATING MULTIPLE  ADMIN*/


/*DECLINING MULTIPLE  ADMIN*/
	public function declineMultiple(){
		if(isset($_SESSION['admin_email'])){
			$this->model("AdminApproveModel");
			if(isset($_POST['admin_decline_all'])){
			$approve_all = $this->sanitizeString($_POST['admin_decline_all']);
			$id = $this->sanitizeString($_POST['id']);
			$check_all = $this->sanitizeString($_POST['admin_check_all']);
			if(!empty($check_all)){
				AdminApproveModel::where('id', $id)->delete();
			}
		}
	}
	}
/*DECLINING MULTIPLE  ADMIN*/
		


	public function fetchAdmin(){
		$this->model("AdminApproveModel");
		if(isset($_SESSION['admin_email'])){
			if(isset($_POST['adminData'])){
				$this->sanitizeString($_POST['adminData']);
				$start = $this->sanitizeString($_POST['adminstart']);
				$limit = $this->sanitizeString($_POST['adminlimit']);

				$data = AdminApproveModel::orderby('id', 'desc')->offset($start)->limit($limit)->get();

foreach ($data as  $value):
$id = $value->id;	
$url = APP_URI;
			
echo<<<_END

<tr class="admin_option$id admin_highlightall">
<td class="admin_verifyRequest$id" > 
<form action="" method="post" name="this_admin$id" class="admin_verifyAll$id" style="width:100px;">
<input type="hidden" name="id" style="display:none;" class="get$id"/>
<input type="hidden" name="admin_approve_all" style="display:none;"/>
<input type="button" name="admin_approve_all" style="display:none;" class="admin_approve_all$id" formaction="$url/adminapprove/approveMultiple"/>



<input type="hidden" name="admin_decline_all" style="display:none;"/>
<input type="button" name="admin_decline_all" style="display:none;" class="admin_declineAll$id" formaction="$url/adminapprove/declineMultiple"/>

<input type="checkbox" name="admin_check_all" class="admin_select$id admin_checkboxes" style="width:30px; height:20px; padding:20px;" value="$id"/>
</form>

</td>
<td>$value->firstname</td>
<td>$value->lastname</td>
<td>$value->email</td>
<td>$value->priority</td>
<td>$value->created_at</td>
<td style="background-color:#1a2732;">

<div class="top-nav $id" style="width:100px;">
<ul class="nav pull-right top-menu">    
<li class="dropdown">

<a data-toggle="dropdown" class="dropdown-toggle $id" href="#" >
<span style="margin-left:-30px; font-size:13px; color:#fff; font-weight:bold;" class="adminChanger$id">
_END;
if(!empty($value->priority)){
	echo $value->priority;
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
_END;
if(empty($value->priority)){
echo<<<_END
<li class="eborder-top">
<form action="" method="post" class="admin_approved$id optionMenuContainer">
<input type="hidden" name="id" style="display:none;" class="get$id"/>
<input type="hidden" name="admin_approved" value="Approve" />
<input type="submit" name="admin_approved" value="Approve" class="optionMenu" id="approved$id"/>
</form>
</li>
_END;
}

echo<<<_END

<li class="eborder-top">
<form action="" method="post" class="admin_decline$id optionMenuContainer">
<input type="hidden" name="id" style="display:none;" class="get$id"/>
<input type="hidden" name="admin_decline" value="Delete" />
<input type="submit" name="admin_decline" value="Delete" class="optionMenu" id="decline$id"/>

</form>
</li>
</ul>
</li>
</ul>
</div>
</td>


</tr>

<script type="text/javascript">

/*this allows single click approval for multiple admin request*/

$(document).ready(function(){
$(".admin_verifiy_all").click(function(){
if($(".admin_select$id").prop('checked') == true){
$(".admin_approve_all$id").click();
$(".closeBtn").click();
}
else{
	$(".admin_resulting1").html("Please select at least one admin request");
}
})

/*this allows a single click for declining multiple admin request*/

$(".admin_decline_all").click(function(){
if($(".admin_select$id").prop('checked') == true){
$(".admin_declineAll$id").click();
$(".closeBtn").click();
}
else{
	$(".admin_resulting2").html("Please select at least one admin request");
}
})

/*this allows each box to be checked*/

$(".admin_select$id").click(function(){
if($(this).prop('checked') == true){
$(".admin_option$id").css("background-color", "#1a2732");
$(".admin_option$id").css("color", "#fff");
}
else if($(this).prop('checked') == false){
$(".admin_option$id").css("background-color", "transparent");
$(".admin_option$id").css("color", "#888");
}
})
});



/*this allows approval and declining of multiple admin request at once*/

$(document).ready(function(e){
$(".admin_approve_all$id, .admin_declineAll$id").click(function(){
$(".get$id").val($id);
$.ajax({
url:$(this).attr('formaction'),
method: "POST",
data: $(".admin_verifyAll$id").serialize(),
success:function(data){
$(".admin_verifyAll$id")[0].reset();
$(".admin_option$id").fadeOut();

}
});
});
})


/*this toggles on and off the select all option*/

$(document).ready(function(){
$('.admin_checkboxes').on('click', function(){
if($('.admin_checkboxes:checked').length == $('.admin_checkboxes').length){
$("#admin_select_all").prop('checked', true); 
}
else{
  $('#admin_select_all').prop('checked', false); 
}
});
});
$(document).ready(function(){
$(".admin_approved$id").on('submit', (function(e){
e.preventDefault();

$(".get$id").val($id);
$.ajax({
 url:"$url/adminapprove/approveSingle",
method: "POST",
data: new FormData(this),
contentType: false,
processData: false,
success:function(data){
$(".admin_approved$id")[0].reset();
$(".adminChanger$id").html("Activated");
}
});
}));
});


$(document).ready(function(){
$(".admin_decline$id").on('submit', (function(e){
e.preventDefault();
$(".get$id").val($id);
$.ajax({
url:"$url/adminapprove/declineSingle",
method: "POST",
data: new FormData(this),
contentType: false,
processData: false,
success:function(data){
$(".admin_decline$id")[0].reset();
$(".admin_option$id").fadeOut();
}
});
}));
});
</script>



_END;

endforeach;
		}
	}
	else{
		$this->destroySession();
		header("location: ".APP_URI."/admin");
	}
}
		

			

			
			

							
		
		
}

?>