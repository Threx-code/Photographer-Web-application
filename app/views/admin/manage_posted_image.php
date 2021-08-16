
<!--==========START OF MANAGING POSTED iMAGES ===============-->
<div id="postedImages" class="tab-pane">
    <div id="posts" class="row no-gutter">
  <div class="posted_image"></div>
</div>
<?php

if(!empty($posted_image_counter)){
?> 

<script type="text/javascript">
  var postMax = false;
  var poststart = 0;
  var postlimit = 6;

  $(document).ready(function(){
    getDatapost();

    

    $(".posted_image_more").on('submit', (function(e){
     e.preventDefault();
      getDatapost();
      $(".posted_imageLoader").show();
      }));

  
    function getDatapost(){
      if(postMax)
        return;

      $.ajax({
        url:'<?php echo APP_URI ?>/postedimage/fetchimages',
        method: "POST",
        dataType: "text",
        data:{
          getDatapost:1,
          poststart: poststart,
          postlimit: postlimit
        },
        success: function(response){
          if(response == "postMax" || response == 0){
            postMax = true;
            $(".posted_image_more").hide();
            $(".posted_imageLoader").hide();
          }
          else{
            $(".posted_imageLoader").hide();
            $(".posted_image").append(response);
            poststart += postlimit;
          }
        }
      });
    }
  })
</script>
<hr style="height: 2px; background-color: #aaa;"> 

<?php
}
if($posted_image_counter == 0){
echo<<<_END
<h2 style="text-align: center;">No Image(s) Posted Yet</h2>
_END;
}
elseif($posted_image_counter > 6){
echo<<<_END
<form action="admin_control" method="post" class="posted_image_more" style="width:250px; margin:40px auto;">
<input type="hidden" name="" value="Follow" style="display:none;"/>
 <div style="text-align:center; cursor:pointer; border-radius:20px; border:1px solid #17a2b8;" >
<input type="submit" name="" value="Load More" style="font-weight: bold; height: 40px; border:none; background-color: transparent; cursor: pointer;"/>
</div>
<div class="SubmitLoader posted_imageLoader" style="margin-top:-38px; float:right; margin-right:10px; display: none;"></div>
</form>
_END;
}

?>
<!-- page end-->
</div>
<!--============ END OF MANAGING POSTED iMAGES ================-->
