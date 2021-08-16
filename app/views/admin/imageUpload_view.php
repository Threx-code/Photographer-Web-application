<!--=================== START OF PROFILE IMAGE UPLOADING  ====================-->
<div id="profileImage" class="tab-pane">
  <section class="panel">
    <div class="itemvalidationcontainer" style="border:1px solid cyan;">
      <div class="modal-body">
        <form action="<?php echo APP_URI ?>/dashboard" method="post" role="form" class="profile_Image" enctype="multipart/form-data">
          <input type="hidden" name="crfToken" value="<?php echo $crfToken;?>">
          <div class="col-12">
            <h2 style="text-align: center;">Upload Profile Image</h2>
          </div>
          <div id="Image_preview2">
            <img src="<?php echo APP_URI?>/assets/images/no_image.png" title="Click to select image"  class="profileBackground profileImageShower" style="cursor: pointer;" />
          </div>
          <span class="removeImage" style="display: none; float: right; font-size: 20px; font-weight: bold; cursor: pointer;">Remove</span>
          <label></label><br>
          <div class='alert alert-info image_infoMsg' style="margin-top: 10px;">Click on the image</div>
          <div class='alert alert-danger image_errorMsg' style="display: none;"></div>
          <div class="form-group">
            <input type="file" id="exampleInputFile" name="profilepic" style="display: none;">
          </div>
          <div class="Cvheader-button apply-to-job imgButton1" style="text-align:center; cursor:pointer; border-radius:20px; border:1px solid #17a2b8;" > 
            <input type="hidden" name="upload_image" style="display:none;"/>
            <input type="submit" name="upload_image" value="Upload" class="applyonKabakah-button" style="font-weight: bold; height: 40px; border:none; background-color: transparent;"/>
          </div>
          <div class="Cvheader-button apply-to-job imgButton2" style="text-align:center; cursor:pointer; border-radius:20px; border:1px solid #17a2b8; display: none;" >
            <input type="button" value="Uploading profile Image..." class="applyonKabakah-button" style="font-weight: bold; height: 40px; border:none; background-color: transparent;"/>
          </div>
          <div class="SubmitLoader emailLoader" style="margin-top:-38px; float:right; margin-right:10px; display: none;"></div>
        </form>

  <script type="text/javascript">
    $(document).ready(function(){
      $(".profileBackground").on("click", function(){
        $("#exampleInputFile").click();
      })
    })

    $(document).ready(function(){
       $(".removeImage").on("click", function(){
        $("#exampleInputFile").val('');
        $(".profileImageShower").attr('src', '<?php echo APP_URI ?>/assets/images/no_image.png');
        $(".removeImage").hide();
        $(".image_infoMsg").html("Click on the image");
       })
    })



    $(document).ready(function(e){
   $(".loaderContainer").hide();
  $(".profile_Image").on('submit', (function(e){
    e.preventDefault();
    $(".loaderContainer").show();
    $(".imgButton1").hide();
    $(".imgButton2").show();

  $.ajax({
    url:'<?php echo  APP_URI ?>/dashboard/upload',
    method: "POST",
    data: new FormData(this),
    contentType: false,
    processData: false,
    success:function(data){
      $(".loaderContainer").hide();
      $(".imgButton1").show();
      $(".imgButton2").hide();
      if(data == "Image Successfully Uploaded"){
        $(".profile_Image")[0].reset();
        $(".image_infoMsg").show();
        $(".image_infoMsg").html(data);
        $(".removeImage").hide();
        $(".image_errorMsg").hide();
         $(".profileImageShower").attr('src', '<?php echo APP_URI ?>/assets/images/no_image.png');
 
      }else{
        $(".image_infoMsg").hide();
        $(".image_errorMsg").show();
        $(".image_errorMsg").html(data);
      }  
    }
  });
  }));

  //FUNCTION TO PREVIEW THE IMAGE FIRST

  $(function(){
    $("#exampleInputFile").change(function(){
      var file=this.files[0];
      var imagefile=file.type;
      var match= ["image/jpg", "image/png", "image/jpeg", "image/gif", "image/tif"];
      if(!((imagefile==match[0]) ||
         (imagefile==match[1]) ||
         (imagefile==match[2]) ||
         (imagefile==match[3]) ||
         (imagefile==match[4]))){
        $(".profileImageShower").attr('src', '<?php echo APP_URI ?>/assets/images/no_image.png');
           $(".image_errorMsg").show();
           $(".removeImage").hide();
           $(".image_infoMsg").hide();
           $(".image_errorMsg").html("please select valid image");
          return false;
      }
      else{
        var reader = new FileReader();
        reader.onload = imgIsLoaded;
        reader.readAsDataURL(this.files[0]);
        $(".removeImage").show();
        $(".image_infoMsg").show();
        $(".image_infoMsg").html("image is valid");
        $(".image_errorMsg").hide();
      }
    });
    });


    
    function imgIsLoaded(e){
    $("#exampleInputFile").css("color", "#2C3449;");
    $("#Image_preview2").css("display", "block");
    $(".profileImageShower").css('height', "auto");
    $(".profileImageShower").attr('src', e.target.result);
    
    }
    });
  </script>
</div>
</div>
</section>
<!-- page end-->
</div>
<!--================= END OF  PROFILE IMAGE UPLOADING =============-->