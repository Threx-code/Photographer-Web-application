<?php
use Controller\Controller;
use Controller\Validator as Validator;

class Signup extends Controller{

/*creating a trait*/
	use Validator;
	
	public function index(){
		if(isset($_SESSION['admin_email'])) $this->destroySession();
		$crfToken  = $this->crfToken();
		$this->view('admin/signup', compact('crfToken'));
	}



	public function create(){
		$this->model("SignupModel");
		if(isset($_POST['submit_login'])){
			$data = array();
			$data['submit_login'] = $this->sanitizeString($_POST['submit_login']);
			if($this->checkToken($_POST['crfToken'])){
				if($data['fname'] = $this->allNameChecker($_POST['firstname'], "Firstname")){
					if($data['lname'] = $this->allNameChecker($_POST['lastname'], "Lastname")){
						if($data['email'] = $this->emailExpression($_POST['email'], "Email")){
							if(!SignupModel::where("email", $_POST['email'])->count()){
								if($data['pass'] = $this->passwordSanitize($_POST['admin_password'], "Password")){
									if(SignupModel::create([
										'firstname'=>$data['fname'],
										'lastname'=>$data['lname'],
										'email'=>$data['email'],
										'password'=>password_hash($data['pass'], PASSWORD_DEFAULT),
										])){
										echo "Account Created Successfully. Wait for admin to approve your account";
									}
								}
							}
							else{
								echo "Email already taken";
							}
						}
					}
				}
			}
		}
	}


	public function emailAvailable(){
		$this->model('SignupModel');
		if(isset($_POST['email'])){
			if($this->emailExpression($_POST['email'], "Email")){
				if(SignupModel::where('email', $_POST['email'])->count()){
					echo "Email address already taken";
				}
			}
		}
	}





}

?>