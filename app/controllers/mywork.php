<?php
use Controller\Controller;
use Controller\Validator as Validator;
class Mywork extends Controller{
	use Validator;



	public function loadMyWork(){
		$this->model("PostedImagesModel");
	
			if(isset($_POST['getData'])){
				$this->sanitizeString($_POST['getData']);
				$start = $this->sanitizeString($_POST['start']);
				$limit = $this->sanitizeString($_POST['limit']);
	
				$data = PostedImagesModel::orderby('id', 'desc')->offset($start)->limit($limit)->get();
				$url = APP_URI;
echo<<<_END

 <div id="posts" class="row no-gutter">
<div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" $url/images/img_1.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" $url/images/img_1.jpg">
            </a>
          </div>
          

          <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" $url/images/img_4.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" $url/images/img_4.jpg">
            </a>
          </div>

        

          <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" $url/images/img_6.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" $url/images/img_6.jpg">
            </a>
          </div>

         

        

          <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" $url/images/img_3.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" $url/images/img_3.jpg">
            </a>
          </div>

          <div class="item brand col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" $url/images/img_4.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" $url/images/img_4.jpg">
            </a>
          </div>

          <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" $url/images/img_5.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" $url/images/img_5.jpg">
            </a>
          </div>

          <div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href=" $url/images/img_6.jpg" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src=" $url/images/img_6.jpg">
            </a>
          </div>
_END;

foreach ($data as  $value):
$id = $value->id;	
$url = APP_URI;
$value->images = str_replace('../public', '', $value->images);


echo<<<_END
<div class="item design col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
  <a href="$url/$value->images" class="item-wrap" data-fancybox="gal">
    <span class="icon-search2"></span>
    <img class="img-fluid" src="$url/$value->images">
  </a>
</div>

_END;

endforeach;

echo<<<_END
        
</div>

_END;
}

}

}


?>

