<?php
namespace App;
require_once "../vendor/autoload.php";
require_once "database.php";
use Kernel\Error as Error;
use Controller\Sanitizer as Sanitizer;
$error = new Error;

session_start();
Sanitizer::sameSessionId();

?>