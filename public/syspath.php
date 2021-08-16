<?php

define('APP_PATH', dirname(__FILE__));
define('APP_FOLDER', dirname($_SERVER['SCRIPT_NAME']));

/* development url*/
define('APP_URI', remove_unwanted_slashes('http://'.$_SERVER['SERVER_NAME'].APP_FOLDER));
/*development url*/

/*production url
define('APP_URI',remove_unwanted_slashes('https://'.$_SERVER['SERVER_NAME'].APP_FOLDER)); 
production url*/




function remove_unwanted_slashes($dirty_path){
	return preg_replace('~(?<!:)//~', '/', $dirty_path);
}

?>