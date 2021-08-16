<?php
use Controller\Controller as Controller;
use Controller\Validator as Validator;
class Contact extends Controller{

	use Validator; 
	public function index(){
		
	}

	public function create(){
		$this->model("ContactModel");

		if(isset($_POST['submit_contact'])){
			$this->sanitizeString($_POST['submit_contact']);
			if($this->checkToken($_POST['crfToken'])){
				if($this->allNameChecker($_POST['fullname'], "Fullname")){
					if($this->phoneChecker($_POST['phoneNumber'], "Phone Number")){
						if($this->emailExpression($_POST['email'], "Email")){
							if($this->textArea($_POST['message'])){
								if(ContactModel::create([
									'fullname'=> $_POST['fullname'],
									'phone_number'=> $_POST['phoneNumber'],
									'email'=> $_POST['email'],
									'message'=> $_POST['message']
								])){
									echo "Your message has been sent Successfully";
								}
							}
						}
					}
				}
			}
		}
	}


	


	/*DECLINING CONTACT US MESSAGE*/
	public function removeContact(){
			$this->model("ContactModel");

		if(isset($_SESSION['admin_email'])){
			if(isset($_POST['delete'])){
				$this->sanitizeString($_POST['delete']);
				$id = $this->sanitizeString($_POST['id']);
				ContactModel::where('id', $id)->delete();
			}
		}
	}
	/*DECLINING CONTACT US MESSAGE*/






	public function fetchContact(){
		$this->model("ContactModel");
		if(isset($_SESSION['admin_email'])){

			if(isset($_POST['getcontactUs'])){
				$this->sanitizeString($_POST['getcontactUs']);
				$start = $this->sanitizeString($_POST['contactUsstart']);
				$limit = $this->sanitizeString($_POST['contactUslimit']);

				$data = ContactModel::orderby('id', 'desc')->offset($start)->limit($limit)->get();

foreach ($data as $value):
		$id =$value->id;
		$value->message = html_entity_decode($value->message);


	
		$url = APP_URI;





echo<<<_END
 <div class="panel panel-default div$id">
<div class="panel-heading">
<h4 class="panel-title">
<a class="accordion-toggle sender_name" data-toggle="collapse" data-parent="#accordion" href="#writermsg$id">
$value->fullname
</a>
<img src="$url/assets/images/garbage1.png" width="12" height="17" style="float:right; cursor:pointer; margin-top:10px;" data-toggle="modal" data-target="#contact$id"/>
</h4>
</div>
<div id="writermsg$id" class="panel-collapse collapse">
<div class="panel-body">

<span class="headings">Phone Number:</span> $value->phone_number &nbsp; &nbsp; 
<span class="headings">Email:</span> $value->email &nbsp; &nbsp;
<span class="headings">Time:</span> $value->created_at
<br><br>
$value->message.
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$(".remove$id").on('submit', (function(e){
e.preventDefault();
$.ajax({
 url:"$url/contact/removeContact",
method: "POST",
data: new FormData(this),
contentType: false,
processData: false,
success:function(data){
$(".remove$id")[0].reset();
$(".div$id").fadeOut();
$(".closeDelete$id").click();
}
});
}));
});

</script>


<!-- START OF DELETE MESSAGE MODAL-->
  <div class="modal fade" id="contact$id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color:#fff;">
        <div class="modal-header" style="background-color:#fff;">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
           <h5 class="modal-title" id="exampleModalLabel">Delete Modal </h5>
        </div>
        <div class="modal-body">

          <p style="text-align:center; font-size:16px; color:#555;">Are you Sure you want to delete this Message?</p>
        </div>

<div class="modal-footer">
<form action="" method="post" class="remove$id btn btn-secondary">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="delete" value="Delete" />
<input type="submit" name="delete" value="Delete" class="btn btn-danger" id="delete$id"/>
</form>
          <button class="btn btn-secondary closeDelete$id" type="button" data-dismiss="modal" >Close</button>
        </div>
      </div>
    </div>
  </div>

 <!-- END OF DELETE MESSAGE MODAL-->

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