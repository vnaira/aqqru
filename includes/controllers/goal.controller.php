<?php

/* This controller renders the goals list */

class GoalController{

	public function handleRequest(){
		$goals = Goal::getAll();
		
		if(empty($goals)){
			throw new Exception("There is no such data!");
		}

    // Fetch all the categories:
//    $categories = Category::find();
		
		// Fetch all the products in this category:
//		$products = Product::find(array('category'=>$_GET['category']));
		
		// $categories and $products are both arrays with objects
		
		render('goal',array(
			'title'			=> '',
			'goals'	=> $goals,
			'dates'		=> ''
		));		
	}
}


?>