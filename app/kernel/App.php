<?php
namespace Kernel;

require_once "../app/controllers/Sanitizer.php";

class App{

	protected $controller = "home";
	protected $method = "index";
	protected $param = [];

	public function __construct(){
		$url = $this->parseUrl();


		if(!empty($url[0])){
			if(file_exists("../app/controllers/". $url[0]. ".php")){
				$this->controller = $url[0];
				unset($url[0]);
			}

			
		}

		require_once "../app/controllers/".$this->controller. ".php";
			$this->controller = new $this->controller;

		if(!empty($url[1])){
			if(method_exists($this->controller, $url[1])){
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		$this->param = $url ? array_values($url) : [];

		call_user_func_array([$this->controller, $this->method], $this->param);
	}


	public function parseUrl(){
		if(isset($_GET['url'])){
			$realUrl = $_GET['url'];

			return explode("/", filter_var(rtrim($realUrl, "/"), FILTER_SANITIZE_URL));
		}
	}
}



?>