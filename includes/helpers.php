<?php

/* These are helper functions */

function render($template,$vars = array()){
	
	// This function takes the name of a template and
	// a list of variables, and renders it.
	
	// This will create variables from the array:
	extract($vars);
	
	// It can also take an array of objects
	// instead of a template name.
	if(is_array($template)){
		
		// If an array was passed, it will loop
		// through it, and include a partial view
		foreach($template as $k){
			
			// This will create a local variable
			// with the name of the object's class
			
			$cl = strtolower(get_class($k));
			$$cl = $k;
			
			include "views/_$cl.php";
		}
		
	}
	else {
		include "views/$template.php";
	}
}

// Helper function for title formatting:
function formatTitle($title = ''){
	if($title){
		$title.= ' | ';
	}
	
	$title .= $GLOBALS['defaultTitle'];
	
	return $title;
}

/**
 * Sort array asceding
 * @param $array
 * @return mixed
 */
function custom_sort( $numbers )
{
  $sorted = [];
  sort($numbers);

  $arrlength = count($numbers);
  for($x = 0; $x < $arrlength; $x++) {
    $sorted[] = $numbers[$x];
  }
  return $sorted;
}

/**
 * Calculate period of goal execute
 * @param $goal
 *
 * @return array of years
 */
function defineYear($goal, $person) {
  $period = [];
  if (!empty($goal)) {
    foreach ($goal as $key=> $item) {
      if ( $key == 'age'){
        $period[] = (string) (date('Y', strtotime($person)) + $item);
      }
      if ($key == 'start_date') {
        $dt = new DateTime($item);
        $period[] = $dt->format('Y');
      }
      if ($key == 'end_date') {
        $dt = new DateTime($item);
        $period[] = $dt->format('Y');
      }
      if ( $key == 'target_date') {
        $dt = new DateTime($item);
        $period[] = $dt->format('Y');
      }
      if ( $key == 'months') {
        $datetime = new \DateTime();
        $datetime->modify('+' . $item . ' months');
        $period[] = $datetime->format('Y');
      }
    }
  }
  return min($period);
}

function getPriority($goals){
  if (!empty($goal)) {
    foreach ($goal as $item) {

    }
  }
}

?>