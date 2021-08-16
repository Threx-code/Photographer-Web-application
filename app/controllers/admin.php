<?php
use Controller\Controller;
use Controller\Validator as Validator;
class Admin extends Controller{

use Validator;

	public function index(){
		if(isset($_SESSION['admin_email'])) $this->destroySession();
		$crfToken  = $this->crfToken();
		$this->view('admin/login', compact('crfToken'));
	}

	public function authenticate(){
		$this->model('AdminModel');

		if(isset($_POST['submit_login'])){
			$data['submit_login'] = $this->sanitizeString($_POST['submit_login']);
			$data['admin_email'] = $this->sanitizeString($_POST['admin_email']);
			$data['admin_password'] = $this->sanitizeString($_POST['admin_password']);
			if($this->checkToken($_POST['crfToken'])){
				if($data['admin_email'] = $this->isEmpty($data['admin_email'], "Email")){
					if($data['admin_password'] = $this->isEmpty($data['admin_password'], "Password")){
						$getDetails = AdminModel::where('email', $data['admin_email'])->get();
						$details = json_decode($getDetails);

						if(!empty($details)){
							foreach ($getDetails as $detail):
								if(password_verify($data['admin_password'], $detail->password)){
									echo "Admin Authenticated";

									$_SESSION['firstname'] = $detail->firstname;
									$_SESSION['lastname'] = $detail->lastname;
									$_SESSION['admin_email'] = $detail->email;
									$_SESSION['image'] = $detail->profile_image;
									$_SESSION['priority'] = $detail->priority;
									$_SESSION['id'] = $detail->id;
									return $getDetails;
								}
								else{
									echo "Sorry invalid Login details";
								}
							endforeach;
						}
						else{
							echo "Sorry invalid Login details";
						}
					}
				}
			}
		}
	}


}

?>