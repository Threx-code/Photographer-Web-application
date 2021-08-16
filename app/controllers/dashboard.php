<?php
use Controller\Controller as Controller;
use Controller\Validator as Validator;
class Dashboard extends Controller{

	use Validator; 
	public function index(){
		if(isset($_SESSION['admin_email'])){

			$crfToken  = $this->crfToken();

			$this->model("BookingModel");
			$this->model("PostedImagesModel");
			$this->model("AdminModel");
			$this->model("ContactModel");

			$booking_counter 		= BookingModel::count();
			$posted_image_counter 	= PostedImagesModel::count();
			$admin_counter 			= AdminModel::count();
			$contact_counter 		= ContactModel::count();

			$_SESSION['firstname'];
			$_SESSION['lastname'];
			$_SESSION['admin_email'];
			$_SESSION['image'];
			$_SESSION['priority'];
			$_SESSION['id'];	

			return $this->view("admin/dashboard", compact('booking_counter', 'posted_image_counter', 'admin_counter', 'contact_counter', 'crfToken'));
			

							
		}
		else{
			$this->destroySession();
			header("location: ".APP_URI."/admin");
		}
		
	}



	public function upload(){
		if(isset($_SESSION['admin_email'])){
			$this->model("AdminModel");
			if(isset($_FILES['profilepic']['name']) && isset($_POST['upload_image'])){
				/*the following values must be set for the image method to work
				1. create a variable to hold the type values of the image
				2. create a folder where you would like to save the image
				3. creave a variable to hold the temporary name of the image
				4.set the desire file size for the image
				5. png images have special algorithm set the value for the png
				6. enter a name value for the image such as profile picture

				*/


				$data['imageType'] = $_FILES['profilepic']['type'];
				$data['imageURL'] = "../public/assets/images/profile_image/".$_SESSION['admin_email'].".jpg";
				$data['tempName'] = $_FILES['profilepic']['tmp_name'];
				$data['imageSize'] = 400;
				$pngSize = 1000;
				$errorMessage = "Profile Image";
				/*the following values must be set for the image method to work*/

				$upload_image = $this->sanitizeString($_POST['upload_image']);
				if($this->checkToken($_POST['crfToken'])){
					if($this->imageValidation($data['imageType'], $data['imageURL'], $data['tempName'], $data['imageSize'], $pngSize, $errorMessage)){
						if(AdminModel::where('email', $_SESSION['admin_email'])->update(['profile_image'=>$data['imageURL']])){

							$_SESSION['image'] = $data['imageURL'];
							echo "Image Successfully Uploaded";
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


	public function getEmail(){
		$this->model('AdminModel');
		if(isset($_POST['admin_old_email'])){
			if($this->emailExpression($_POST['admin_old_email'], "Email")){
				if(AdminModel::where('email', $_POST['admin_old_email'])->count()){
					echo "Email is valid";
				}
				else{
					echo "Invalid Old email address";
				}
			}
		}
	}



	public function emailAvailable(){
		$this->model('AdminModel');
		if(isset($_POST['new_email'])){
			if($this->emailExpression($_POST['new_email'], "Email")){
				if($_SESSION['admin_email'] != $_POST['new_email']){
					if(AdminModel::where('email', $_POST['new_email'])->count()){
						echo "Email address already taken";
					}
					else{
						echo "New email address is available";
					}
				}
				else{
					echo "You can not have same Old and New email address";
				}
			}
		}
	}





	public function updateEmail(){
		if(isset($_SESSION['admin_email'])){
			$this->model('AdminModel');
			/*this check if admin new email is avaialable*/
			if(isset($_POST['send_email'])){
				$this->sanitizeString($_POST['send_email']);
				if($this->checkToken($_POST['crfToken'])){
					if($this->emailExpression($_POST['admin_old_email'], "Old Email")){
						if($this->variableAreEqual($_POST['admin_old_email'], $_SESSION['admin_email'], "Sorry this is not your Old Email address")){
							if($this->emailExpression($_POST['new_email'], "New Email")){
								if($this->variableNotEqual($_POST['admin_old_email'], $_POST['new_email'], "Sorry you can not have same Old and New Email")){
									if(!AdminModel::where('email', $_POST['new_email'])->count()){
										if($this->emailExpression($_POST['confirm_email'], "Confirm Email")){
											if($this->variableAreEqual($_POST['new_email'], $_POST['confirm_email'], "Sorry New and Confirm Emails are not the same")){
												if(AdminModel::where('email', $_SESSION['admin_email'])->update(['email'=>$_POST['new_email']])){
													echo $_SESSION['admin_email'] = $_POST['new_email'];
												}
											}
										}
									}else{
										echo "Sorry New Email Address already taken";
									}
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


	public function updatePassword(){
		if(isset($_SESSION['admin_email'])){
			$this->model('AdminModel');
			if(isset($_POST['send_password'])){
				$this->sanitizeString($_POST['send_password']);
				$this->sanitizeString($_POST['confirm_password']);

				if($this->checkToken($_POST['crfToken'])){
					if($this->isEmpty($_POST['old_password'], "old password")){
						
						/*selecting the old password and verifying that it matches before updating*/
						$getDetails = AdminModel::where('email', $_SESSION['admin_email'])->get();
						$details = json_decode($getDetails);
						
						if(!empty($details)){
							foreach ($getDetails as $detail):
								/*old passwordverification*/
								if(password_verify($_POST['old_password'], $detail->password)){
									if($this->passwordSanitize($_POST['new_password'], "New Password")){
										if($this->variableNotEqual($_POST['old_password'], $_POST['new_password'], "Sorry you can not have same Old and New password")){
											if($this->variableAreEqual($_POST['new_password'], $_POST['confirm_password'], "Your New & Confirm Password are not the same")){

														/*hashing the password before updating*/
														$_POST['new_password'] = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

												if(AdminModel::where('email', $_SESSION['admin_email'])->update(['password'=>$_POST['new_password']])){
													echo "Password Successfully Updated";
												}
											}
										}
									}
								}
								else{
									echo "Sorry invalid Old Password";
								}
							endforeach;
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