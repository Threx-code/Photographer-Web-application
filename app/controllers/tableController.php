<?php
use Controller\Controller;

class TableController extends Controller{
	
	public function index(){
		$this->model("Table");
		$this->view('database/tables');
	}
}

?>