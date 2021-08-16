<?php
use Controller\Controller as Controller;
use Controller\Validator as Validator;
class PostedImage extends Controller{

	use Validator; 




/*DELETING SINGLE BOOKING*/
	public function removePost(){
		if(isset($_SESSION['admin_email'])){
		$this->model("PostedImagesModel");
		if(isset($_POST['delete'])){
			$this->sanitizeString($_POST['delete']);
			$id = $this->sanitizeString($_POST['id']);
			if(PostedImagesModel::where('id', $id)->delete()){
				echo "Posted Image Deleted";
			}
		}
	}

	}
/*DELETING SINGLE BOOKING*/



	public function fetchimages(){
		$this->model("PostedImagesModel");
		if(isset($_SESSION['admin_email'])){
		if(isset($_POST['getDatapost'])){
	$getDatapost = $this->sanitizeString($_POST['getDatapost']);
	$start = $this->sanitizeString($_POST['poststart']);
	$limit = $this->sanitizeString($_POST['postlimit']);
	
	$data = PostedImagesModel::orderby('id', 'desc')->offset($start)->limit($limit)->get();

foreach ($data as  $value):
$id = $value->id;	
$url = APP_URI;
$value->images = str_replace('../public', '', $value->images);

$value->image_title = stripslashes($value->image_title);
$value->description=html_entity_decode($value->description);
$value->description = stripslashes($value->description);

if(strlen($value->description) > 100){
	$value->description = substr($value->description, 0, 100);
}

echo<<<_END

<div class="item web col-md-4 blog_main_container div$id">
<div class="blogContainer">
<div class="imageDiv item-wrap" style="background-image:url($url/$value->images);"></div> 
<div class="blog-content-body" style="margin-top:-10px; margin:0px 10px;">
<hr>
<span class="mr-2">$value->created_at</span>
<img src="$url/assets/images/garbage1.png" width="12" height="17" style="float:right; cursor:pointer" data-toggle="modal" data-target="#$id"/>
<h2>$value->image_title</h2>
<p>$value->description</p>
</div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$(".remove$id").on('submit', (function(e){
e.preventDefault();
$.ajax({
 url:"$url/postedimage/removePost",
method: "POST",
data: new FormData(this),
contentType: false,
processData: false,
success:function(data){
$(".remove$id")[0].reset();
$(".div$id").fadeOut();
$(".closebtn$id").click();
}
});
}));
});
</script>

<!-- START OF MESSAGE WRITER MODAL-->
  <div class="modal fade" id="$id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-color:#fff;">
        <div class="modal-header" style="background-color:#fff;">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
           <h5 class="modal-title" id="exampleModalLabel">Delete Modal </h5>
        </div>
        <div class="modal-body">

          <p class="deleteMessage$id" style="text-align:center; font-size:16px; color:#555;">Are you Sure you want to delete this Post?</p>
        </div>

<div class="modal-footer">
<form action="" method="post" class="remove$id btn btn-secondary">
<input type="hidden" name="delete"/>
<input type="hidden" name="id" value="$id" />
<input type="submit" name="delete" value="Delete" class="btn btn-danger" id="delete$id"/>
</form>
          <button class="btn btn-secondary closebtn$id" type="button" data-dismiss="modal" >Close</button>
        </div>
      </div>
    </div>
  </div>

 <!-- END OF MESSAGE WRITER MODAL-->
_END;

endforeach;
}
		
}
}


}
?>