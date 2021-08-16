
<!--==========START OF ADMIN LIST ===============-->
<div id="approveAdmin" class="tab-pane">
<section class="panel">
<?php

if(!empty($admin_counter)){
?>

<header class="panel-heading" style="padding-top: 10px; padding-bottom: 20px;">
List of Admins
<div class="approval_btn">
<input type="submit" name="" value="Delete" class="inputBtn" data-toggle="modal" data-target="#adminDeleteModal"/>
</div>
<div class="approval_btn">
<input type="submit" value="Approve" class="inputBtn" data-toggle="modal" data-target="#adminApproveModal" />
</div>


<!--=== START MODAL FOR APPROVING MULTIPLE ADMIN ======-->
  <div class="modal fade" id="adminApproveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content" style="background-color: #fff;">
        <div class="modal-header" style="background-color: #fff;">
           <h3 class="modal-title" id="exampleModalLabel" style="float: left;">Admin Approval</h3>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <br>  <br>
        </div>
        <div class="modal-body">

<div class="hide_food_download">
<p class="admin_resulting1" style="font-weight: bold; font-size: 16px; text-align: center;">Are you sure you want to perform ths action?</p>

<br>
<p style="text-align: center;"> 

<input type="submit" value="Approve" class="download admin_verifiy_all"/>
<input type="button" value="Cancel" class="download closeBtn" data-dismiss="modal" aria-label="Close"/>
</p>
</div>

</div>
<div class="modal-footer"><br></div>
</div>
</div>
</div>

 <!--===== END MODAL FOR MULTIPLE ADMIN APPROVAL =========-->

 <!--=== START MODAL FOR MULTIPLE ADMIN DECLINE =========-->
  <div class="modal fade" id="adminDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" >
      <div class="modal-content" style="background-color: #fff;">
        <div class="modal-header" style="background-color: #fff;">
           <h3 class="modal-title" id="exampleModalLabel" style="float: left;">Admin Delete</h3>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <br>  <br>
        </div>
        <div class="modal-body">

<div class="hide_food_download">
<p class="admin_resulting2" style="font-weight: bold; font-size: 16px; text-align: center;">Are you sure you want to perform ths action?</p>

<br>
<p style="text-align: center;"> 
<input type="submit" value="Delete" class="download admin_decline_all"/>
<input type="button" value="Cancel" class="download closeBtn" data-dismiss="modal" aria-label="Close"/>
</p>
</div>

</div>
<div class="modal-footer"><br></div>
</div>
</div>
</div>

 <!--===== END MODAL FOR MULTIPLE ADMIN DECLINE ==============-->

</header>

<table class="table table-bordered table-advance">
 <tbody class="admin_content">
<tr>
<th>Select All<br><input type="checkbox" id="admin_select_all"></th>
<th> Surname</th>
<th> Firstname</th>
<th> Email Address</th>
<th> Activation</th>
<th> Created Date & Time</th>
<th> Admin Status</th>
</tr>
<!-- page end-->
</tbody>
</table>

<?php
}
?>

<script type="text/javascript">
$(document).ready(function(){
$("#admin_select_all").on('click', function(){
if(this.checked){
$(".admin_checkboxes").each(function(){
this.checked = true;
$(".admin_highlightall").css("background-color", "#1a2732");
$(".admin_highlightall").css("color", "#fff");
});
}
else{
$(".admin_checkboxes").each(function(){
  this.checked = false;
  $(".admin_highlightall").css("background-color", "transparent");
$(".admin_highlightall").css("color", "#888");
});
}
});
});


  var adminMax = false;
  var adminstart = 0;
  var adminlimit = 6;

$(document).ready(function(e){
  $(".admin_Request").on('submit', (function(e){
   e.preventDefault();
   $(".adminLoader").show();
    adminData();
    }));
    });
  
  $(document).ready(function(){
    adminData();
    });
  
  function adminData(){
    if(adminMax)
      return;
    
  $.ajax({

  url:'<?php echo  APP_URI ?>/adminapprove/fetchAdmin',
    method: "POST",
    dataType: "text",
    data:{
      adminData:1,
      adminstart: adminstart,
      adminlimit: adminlimit
    },
    success: function(response){
      if(response == "adminMax" || response == 0){
        adminMax = true;
        $(".admin_Request").hide();
      }
      else{
          $(".adminLoader").hide();
         $(".admin_content").append(response);
          adminstart += adminlimit;
    }
    }
    });
    }

</script>
<hr style="height: 2px; background-color: #aaa;"> 

<?php

if($admin_counter == 0){
echo<<<_END
<h2 style="text-align: center;">No Admin Request Yet</h2>
_END;
}
elseif($admin_counter > 6){
echo<<<_END
<form action="admin_control" method="post" class="admin_Request" style="width:250px; margin:40px auto;">
<input type="hidden" name="" value="Follow" style="display:none;"/>
 <div style="text-align:center; cursor:pointer; border-radius:20px; border:1px solid #17a2b8;" >
<input type="submit" name="" value="Load More" style="font-weight: bold; height: 40px; border:none; background-color: transparent; cursor: pointer;"/>
</div>
<div class="SubmitLoader adminLoader" style="margin-top:-38px; float:right; margin-right:10px; display: none;"></div>
</form>
_END;
}

?>
</section>
<!-- page end-->
</div>
<!--============ END OF GETTING ACCOUNT OPENING APPLICATION REQUEST ================-->
