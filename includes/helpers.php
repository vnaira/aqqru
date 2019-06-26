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
      if ( $key == 'target_date') {
        $dt = new DateTime($item);
        $period[] = $dt->format('Y');
      }
    }
  }
  return min($period);
}

/**
 * Calculate array of ages from goal year, ...
 * @param $goal
 * @param $person  date of birth
 *
 * @return array of years
 */
function defineAges($goal, $person) {
  $ages = [];
  if (!empty($goal)) {
    for($i=0; $i<5; $i++){
//      for($j=0; $i<5; $i++) {
        foreach ($goal[ $i ] as $key => $item) {
          if ($key == 'Age') {
            $ages[] = $item;
          }
          if ($key == 'StartDate' || $key == 'TargetDate') {
            $dt = new DateTime($item);
            $ages[] = $dt->format('Y') - date('Y', strtotime($person));
          }
//        }
      }
    }
  }
  return $ages;
}
/**
 * Generate color value with RGB values
 * @param $wellnessState
 *
 * @return array
 */
function generateColor($wellnessState) {

  $red = [231.0, 78.0, 78.0];
  $yellow = [255.0, 185.0, 0.0];
  $green = [78.0, 211.0, 177.0];

  if (!empty($wellnessState)) {
    $currentRed = $wellnessState[ 0 ] * $red[ 0 ] + $wellnessState[ 1 ] * $yellow[ 0 ] + $wellnessState[ 2 ] * $green[ 0 ];
    $currentGreen = $wellnessState[ 0 ] * $red[ 1 ] + $wellnessState[ 1 ] * $yellow[ 1 ] + $wellnessState[ 2 ] * $green[ 1 ];
    $currentBlue = $wellnessState[ 0 ] * $red[ 2 ] + $wellnessState[ 1 ] * $yellow[ 2 ] + $wellnessState[ 2 ] * $green[ 2 ];
  }

  return '(' . $currentRed . ',' . $currentGreen . ',' . $currentBlue . ')';

}

/**
 * Convert from rgb to hex
 * @param $G
 * @param $B
 *
 * @return string
 */
function fromRGB($rgb)
{
  $rgbarr = explode(",",$rgb,3);
  $hex = substr(sprintf("#%02x%02x%02x", $rgbarr[0], $rgbarr[1], $rgbarr[2]), 1);

  return  $hex;
}
/**
 * Count round thausand to a K style
 * @param $number
 */
function numberFormatK($number) {

  $k = 1000;
  $suf = '';
  if ($number > $k) {
    $echoxcount = round($number / $k);
    $suf = 'K';
  }
  else {
    if ($number == $k) {
      $echoxcount = 1;
      $suf = 'K';
    }
    else {
      $echoxcount = $number;
    }
  }
  return '$'.$echoxcount.$suf;
}
?>