<?php
use Controller\Controller;
use Controller\Validator as Validator;
class Home extends Controller{
	use Validator;
	public function index(){
		$crfToken  = $this->crfToken();
		$this->model("StateModel");
		$states = StateModel::select('states')->distinct()->orderby('states', 'asc')->get();
		$this->view('index', compact('states', 'crfToken'));
	}


	public function getLcda(){
		$this->model("StateModel");
		if(isset($_POST['state'])){
			$_POST['state'] = $this->sanitizeString($_POST['state']);
			$lcdas = StateModel::select('lcda')->where('states', $_POST['state'])->orderby('lcda', 'asc')->get();
			foreach ($lcdas as $lcda):
					$lcda = $lcda['lcda'];
				echo "<option>$lcda</option>";
			endforeach;
		}	
	}
}

?>