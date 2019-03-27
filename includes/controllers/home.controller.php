<?php

/* This controller renders the home page */

class HomeController{

	public function handleRequest(){
		
		// Select all the categories:
		$content = Goal::getAll();

    if(empty($goals)){
      throw new Exception("There is no such data!");
    }

    render('home',array(
      'title'			=> '',
      'goals'	=> $content,
      'dates'		=> ''
    ));
  }
}

?>