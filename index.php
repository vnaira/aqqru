<?php

require_once "includes/main.php";

try {
if(empty($_GET)){
		$c = new HomeController();
	}
	else throw new Exception('Wrong page!');
	$c->handleRequest();
}
catch(Exception $e) {
	render('error',array('message'=>$e->getMessage()));
}

?>