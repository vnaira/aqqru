<?php

/* This controller renders the home page */

class HomeController {

  private $content;
  private $goals = [];

  private $page_content = [];

  public function __construct() {
    $this->content = Goal::getAll();
  }

  public function getPersonName($data) {
    if (!empty($data)) {
      return $data[ 'profile' ][ 'persons' ][ 0 ][ 'name' ];
    }
  }

  public function getPersonAge($data){
    if (!empty($data)) {
      return $data[ 'profile' ][ 'persons' ][ 0 ][ 'birthdate' ];
    }
  }

  public function modifyGoalsList($data) {
    if (!empty($data[ 'emergency_funds' ])) {
      $data[ 'emergency_funds' ][0][ 'start_date' ] = date("Y-m-d H:i:s");
      $data[ 'emergency_funds' ][0][ 'priority' ] = 'High';
    }
    return $data;
  }

  public function renderData($data) {
    $this->goals = $this->modifyGoalsList($data[ 'avatar' ][ 'goals' ]);
    $page_content = [];
    $page_content[ 'person_name' ] = $this->getPersonName($data[ 'avatar' ]);
    $page_content[ 'year_grid' ] = $this->getGridYears($this->goals,$this->getPersonAge($data[ 'avatar' ]));
    $page_content[ 'priority' ] = $this->getPriorityList();
    $page_content[ 'goals_list' ] = $this->modifyGoalsList($this->goals);
    $page_content[ 'person_age' ] = $this->getPersonAge($data[ 'avatar' ]);

    return $page_content;
  }

  public function specifyDate($array) {
    $year = [];
    if (!empty($array)) {
      foreach ($array as $key => $value) {
        switch ($value) {
          case 'age':
            $year_one = date("Y") + $value[ 'age' ];
            break;
        }
        $year = $year_one;
      }
    }

  }

  public function getGridYears($goals, $person_age) {
    $years = [];
    foreach ($goals as $key => $item) {
      $it = $goals[ $key ];
      if (!empty($it)) {
        if (is_array($it[0])) {
        foreach ($it as $item) {
            if (array_key_exists('age', $item)) {
              $years[] = (string) (date('Y', strtotime($person_age)) + $item[ 'age' ]);
            }
            if (array_key_exists('start_date', $item)) {
              $dt = new DateTime($item[ 'start_date' ]);
              $years[] = $dt->format('Y');
            }
            if (array_key_exists('end_date', $item)) {
              $dt = new DateTime($item[ 'end_date' ]);
              $years[] = $dt->format('Y');
            }
            if (array_key_exists('target_date', $item)) {
              $dt = new DateTime($item[ 'target_date' ]);
              $years[] = $dt->format('Y');
            }
          }}
          else {
//            if($key == "emergency_funds"){
//              $dt = new DateTime($it[ 'start_date' ]);
//              $years[] = $dt->format('Y');
//            }
//            if (array_key_exists('months', $it)) {
//              $datetime = new \DateTime();
//              $datetime->modify('+' . $it[ 'months' ] . ' months');
//              $years[] = $datetime->format('Y');
//            }
            if (array_key_exists('start_date', $it)) {
              $dt = new DateTime($it[ 'start_date' ]);
              $years[] = $dt->format('Y');
            }
          }
        }
      }
    return custom_sort($years);
  }

  public function getPriorityList() {
    return ['High', 'Medium', 'Low'];
  }


  public function handleRequest() {

    $this->page_content = $this->renderData($this->content);

    if (empty($this->content)) {
      throw new Exception("There is no such data!");
    }

    render('home', [
      'title' => 'Financial Planning Guide',
      'content' => $this->page_content,
      'dates' => '',
    ]);
  }
}

?>