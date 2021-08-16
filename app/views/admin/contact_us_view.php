
<!--====================START OF GETTING CONTACT US ====================-->
<div id="contactUs" class="tab-pane">
<div class="panel-group m-bot20">
  <div class="contactus_content row"></div>
 <script type="text/javascript">
  var contactUsMax = false;
  var contactUsstart = 0;
  var contactUslimit = 6;

$(document).ready(function(e){
  $(".contactUsGet").on('submit', (function(e){
   e.preventDefault();
   $(".contactusLoader").show();
    getcontactUs();
    }));
    });
  
  $(document).ready(function(){
    getcontactUs();
    });
  
  function getcontactUs(){
    if(contactUsMax)
      return;
    
  $.ajax({
     url:'<?php echo APP_URI ?>/contact/fetchContact',
    method: "POST",
    dataType: "text",
    data:{
      getcontactUs:1,
      contactUsstart: contactUsstart,
      contactUslimit: contactUslimit
    },
    success: function(response){
      if(response == "contactUsMax" || response == 0){
        contactUsMax = true;
        $(".contactUsGet").hide();
      }
      else{
          $(".contactusLoader").hide();
         $(".contactus_content").append(response);
          contactUsstart += contactUslimit;
    }
    }
    });
    }

</script>

<?php

if($contact_counter == 0){
echo<<<_END
<h2 style="text-align: center;">No Contact Message(s) Yet</h2>
_END;
}
elseif($contact_counter > 6){
echo<<<_END

<form action="admin_control.php" method="post" class="contactUsGet" style="width:250px; margin:40px auto;">
<input type="hidden" name="" value="Follow" style="display:none;"/>
 <div style="text-align:center; cursor:pointer; border-radius:20px; border:1px solid #17a2b8;" >
<input type="submit" name="" value="Load More" style="font-weight: bold; height: 40px; border:none; background-color: transparent; cursor: pointer;"/>
</div>

<div class="SubmitLoader contactusLoader" style="margin-top:-38px; float:right; margin-right:10px; display: none;"></div>
</form>
_END;
}
?>

</div>
</div>
<!--================= END OF GETTING CONTACT US ===========================-->

