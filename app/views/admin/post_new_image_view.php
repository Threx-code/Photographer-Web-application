<!--=================== START OF POSTING NEW IMAGE  ====================-->
<div id="uploadImage" class="tab-pane">
  <section class="panel">
    <div class="card itemvalidationcontainer" style="border:1px solid cyan;">
      <div class="modal-body">
        <form action="<?php echo APP_URI ?>/dashboard" method="post" role="form" class="postNewImage" enctype="multipart/form-data">
          <input type="hidden" name="crfToken" value="<?php echo $crfToken;?>">
          <div class="col-12">
            <h2 style="text-align: center;">Post new Image</h2>
          </div>
          <div id="preview2">
            <img src="<?php echo APP_URI?>/assets/images/upload.png" title="Click to select image"  class="new-image imageShower" style=" cursor: pointer;" />
          </div>
          <span class="remove_image" style="display: none; float: right; font-size: 20px; font-weight: bold; cursor: pointer;">Remove</span>
          <label></label><br>
          <div class='alert alert-info image-infoMsg' style="margin-top: 10px;">Click on the image</div>
          <div class='alert alert-danger image-errorMsg' style="display: none;"></div>
          <div class="form-group">
            <input type="file" id="inputFile" name="inputFile" style="display: none;">
          </div>
          <div class="form-group">
                   <label>Image Title</label>
                <input type="text" class="form-control inputHeight" name="image_title" placeholder="Image Title"/>
                <div class="validation"></div>
              </div>
              <div class="form-group">
                   <label>Image decription</label>
                   <textarea class="form-control" placeholder="Enter Image Description" rows="5" cols="5" style="min-width: 100%; max-width: 100%; min-height: 200px; max-height: 200px;" name="description"></textarea>
                
                <div class="validation"></div>
              </div>
          <div class="Cvheader-button apply-to-job imgButton1" style="text-align:center; cursor:pointer; border-radius:20px; border:1px solid #17a2b8;" > 
            <input type="hidden" name="post_image" style="display:none;"/>
            <input type="submit" name="post_image" value="Post Image" class="applyonKabakah-button" style="font-weight: bold; height: 40px; border:none; background-color: transparent;"/>
          </div>
          <div class="Cvheader-button apply-to-job imgButton2" style="text-align:center; cursor:pointer; border-radius:20px; border:1px solid #17a2b8; display: none;" >
            <input type="button" value="Uploading profile Image..." class="applyonKabakah-button" style="font-weight: bold; height: 40px; border:none; background-color: transparent;"/>
          </div>
          <div class="SubmitLoader emailLoader" style="margin-top:-38px; float:right; margin-right:10px; display: none;"></div>
        </form>

  <script type="text/javascript">
    $(document).ready(function(){
      $(".new-image").on("click", function(){
        $("#inputFile").click();
      })
 

    
       $(".remove_image").on("click", function(){
        $("#inputFile").val('');
        $(".imageShower").attr('src', '<?php echo APP_URI ?>/assets/images/upload.png');
        $(".remove_image").hide();
        $(".image-infoMsg").html("Click on the image");
        $(".imageShower").css('width', "auto");
       })
    




   
  $(".postNewImage").on('submit', (function(e){
    e.preventDefault();
    $(".loaderContainer").hide();
    $(".loaderContainer").show();
    $(".imgButton1").hide();
    $(".imgButton2").show();

  $.ajax({
    url:'<?php echo APP_URI ?>/image/create',
    method: "POST",
    data: new FormData(this),
    contentType: false,
    processData: false,
    success:function(data){
      $(".loaderContainer").hide();
      $(".imgButton1").show();
      $(".imgButton2").hide();
      if(data == "Image Successfully Posted"){
        $(".postNewImage")[0].reset();
        $(".image-infoMsg").show();
        $(".image-infoMsg").html(data);
        $(".remove_image").hide();
        $(".image-errorMsg").hide();
         $(".imageShower").attr('src', '<?php echo APP_URI ?>/assets/images/upload.png');
         $(".imageShower").css('width', "auto");
 
      }else{
        $(".image-infoMsg").hide();
        $(".image-errorMsg").show();
        $(".image-errorMsg").html(data);
      }  
    }
  });
  }));

  //FUNCTION TO PREVIEW THE IMAGE FIRST

  $(function(){
    $("#inputFile").change(function(){
      var file=this.files[0];
      var imagefile=file.type;
      var match= ["image/jpg", "image/png", "image/jpeg", "image/gif", "image/tif"];
      if(!((imagefile==match[0]) ||
         (imagefile==match[1]) ||
         (imagefile==match[2]) ||
         (imagefile==match[3]) ||
         (imagefile==match[4]))){
        $(".imageShower").attr('src', '<?php echo APP_URI ?>/assets/images/upload.png');
           $(".image-errorMsg").show();
           $(".remove_image").hide();
           $(".image-infoMsg").hide();
           $(".image-errorMsg").html("please select valid image");
          return false;
      }
      else{
        var reader = new FileReader();
        reader.onload = imgIsLoaded;
        reader.readAsDataURL(this.files[0]);
        $(".remove_image").show();
        $(".image-infoMsg").show();
        $(".image-infoMsg").html("image is valid");
        $(".image-errorMsg").hide();
      }
    });
    });


    
    function imgIsLoaded(e){
    $("#inputFile").css("color", "#2C3449;");
    $("#preview2").css("display", "block");
    $(".imageShower").css('height', "auto");
    $(".imageShower").css('width', "100%");
    $(".imageShower").attr('src', e.target.result);
    
    }
    });
  </script>
</div>
</div>
<hr style="height: 2px; background-color: #aaa;"> 

</section>
<!-- page end-->
</div>
<!--=================== START OF POSTING NEW IMAGE  ====================-->