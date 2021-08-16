<?php
use Controller\Controller as Controller;
use Controller\Validator as Validator;
class Image extends Controller{

	use Validator; 
	public function index(){}
		


	public function create(){
		if(isset($_SESSION['admin_email'])){
			$this->model("PostedImagesModel");
			if(isset($_FILES['inputFile']['name']) && isset($_POST['post_image'])){
				/*the following values must be set for the image method to work
				1. create a variable to hold the type values of the image
				2. create a folder where you would like to save the image
				3. creave a variable to hold the temporary name of the image
				4.set the desire file size for the image
				5. png images have special algorithm set the value for the png
				6. enter a name value for the image such as profile picture

				*/

				/*storing the name of the image with a random byte*/
				$imageName = random_bytes(32);
				$imageName = substr($imageName, 0, 4);
				$imageName = hash("ripemd128", $imageName);

				$data['imageType'] = $_FILES['inputFile']['type'];
				$data['imageURL'] = "../public/assets/images/data_folder/".$imageName.".jpg";
				$data['tempName'] = $_FILES['inputFile']['tmp_name'];
				$data['imageSize'] = 1000;
				$pngSize = 1000;
				$errorMessage = "Image";
				/*the following values must be set for the image method to work*/


				$post_image = $this->sanitizeString($_POST['post_image']);
				if($this->checkToken($_POST['crfToken'])){
					if($this->imageValidation($data['imageType'], $data['imageURL'], $data['tempName'], $data['imageSize'], $pngSize, $errorMessage)){
						if($this->allNameChecker($_POST['image_title'], "Title")){
							if($this->textArea($_POST['description'])){
								if(PostedImagesModel::create([
									"images"=>$data['imageURL'],
									"image_title"=>$_POST['image_title'],
									"description"=>$_POST['description']
								])){
									echo "Image Successfully Posted";
								}
							}
						}
					}
				}
			}
		}
		else{
			$this->destroySession();
			header("location: ".APP_URI."/admin");
		}
	}






}

?>