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

  /**
   * Get Financial summary assets
   * @param $data
   *
   * @return number
   */
  public function getAssets($data) {
    $balance_sheet = $data[ 'results' ][ 'current_financials' ][ 'balance_sheet' ];
    $balance = [];
    $asset = 0;
    $liability = 0;
    if (!empty($balance_sheet)) {
      foreach ($balance_sheet as $balance_item) {
        if ($balance_item['category'] == "Assets") {
          $asset += $balance_item['value'];
        }
        else {
          $liability += $balance_item['value'];
        }
      }
    }
    $balance[ 'assets' ] = $asset;
    $balance[ 'liabilities' ] = $liability;
    return $balance;
  }

  /**
   * Get achievability from results and set it to corresponding goal
   * @param $data
   *
   * @return array
   */
  public function setAchievability($goals, $results) {
    $fullGoals = [];
    if (!empty($results) && !empty($goals)) {
      foreach ($goals as $index => $goal_item) {
        if (!empty($goal_item)) {
          foreach ($goal_item as $key => $item) {
            foreach ($results as $resultItem) {
              if ($item[ 'id' ] == $resultItem[ 'id' ]) {
                $item[ 'achievability' ] = $resultItem[ 'achievability' ];
                $goal_item[ $key ] = $item;
              }
            }
          }
          $fullGoals[ $index ] = $goal_item;
        }
      }
    }
    return $fullGoals;
  }

  /**
   *
   * @param $data
   *
   * @return array
   */
  public function getImmediateAction($data) {
    $actions = [];
    $actions_w = [];
    $actions_d = [];
    $immediateActions = [];
    $invesAllocation = $data[ 'results' ][ 'guidance' ][ 'capital_allocation' ];
    foreach ($invesAllocation as $investItem) {
      switch ($investItem[ 'action_name' ]) {
        case "Withdraw":
          $actions_w[ 'withdraw' ] += round($investItem[ 'annual_value' ]);
          $actions_w[ 'withdraw_name' ] = ($investItem[ 'object_name' ]);
          $immediateActions['withdraw'][] = $actions_w;
          break;
        case "Deposit" :
          $actions_d[ 'deposit' ] += round($investItem[ 'annual_value' ]);
          $actions_d[ 'deposit_name' ] = ($investItem[ 'object_name' ]);
          $immediateActions['deposit'][] = $actions_d;
          break;
        default:
          $actions[ 'save' ] += round($investItem[ 'annual_value' ]);
          $actions[ 'save_name' ] = ($investItem[ 'object_name' ]);
          $immediateActions['save'][] = $actions;
          break;
      }
    }
    return $immediateActions;
  }


  public function getExpenses($data) {
    $incomes = $data[ 'results' ][ 'current_financials' ][ 'income_statement' ];
    $expenses = 0;
    if (!empty($incomes)) {
      foreach ($incomes as $incomeItem) {
        $expenses += $incomeItem[ 'current_month_value' ];
      }
    }
    return round($expenses)/ count($incomes);
  }

  /**
   * @param $data
   *
   * @return array
   */
  public function getAppropriateRisks($data) {
    $risks = $data[ 'results' ][ 'guidance' ][ 'investment_allocation' ];
    $apprRisks = [];
    $riskIt = [];
    if (!empty($risks)) {
      foreach ($risks as $riskItem) {
        $riskIt[ 'name' ] = $riskItem[ 'object_name' ];
        $riskIt[ 'value' ] = round($riskItem[ 'value' ] * 100);
        $apprRisks[] = $riskIt;
      }
    }
    return $apprRisks;
  }


  public function renderData($data) {
    $this->goals = $this->modifyGoalsList($data[ 'avatar' ][ 'goals' ]);
    $page_content = [];

    $page_content[ 'person_name' ] = $this->getPersonName($data[ 'avatar' ]);
    $page_content[ 'year_grid' ] = $this->getGridYears($this->goals,$this->getPersonAge($data[ 'avatar' ]));
    $page_content[ 'priority' ] = $this->getPriorityList();

    $page_content[ 'goals_list' ] = $this->setAchievability($this->goals, $data[ 'results' ][ 'goal_results' ]);
    $page_content[ 'person_age' ] = $this->getPersonAge($data[ 'avatar' ]);
    $page_content[ 'wellness' ] = [
      'wellness_score' => $this->content[ 'results' ][ 'avatar_results' ][ 'wellness_score' ],
      'wellness_state' => generateColor($this->content[ 'results' ][ 'avatar_results' ][ 'wellness_state' ])
    ];
    $page_content[ 'balance' ] = $this->getAssets($data);
    $page_content[ 'expenses' ] = $this->getExpenses($data);
    $page_content[ 'risks' ] = $this->getAppropriateRisks($data);
    $page_content[ 'with_draw' ] = $this->getImmediateAction($data);

    return $page_content;
  }

//  public function specifyDate($array) {
//    $year = [];
//    if (!empty($array)) {
//      foreach ($array as $key => $value) {
//        switch ($value) {
//          case 'age':
//            $year_one = date("Y") + $value[ 'age' ];
//            break;
//        }
//        $year = $year_one;
//      }
//    }
//
//  }

  public function getGridYears($goals, $person_age) {
    $years = [];
    foreach ($goals as $key => $goal_item) {
      $it = $goals[ $key ];
      if (!empty($it)) {
        if (is_array($it[ 0 ])) {
          foreach ($it as $item) {
            if (array_key_exists('age', $item)) {
              $years[] = (string) (date('Y', strtotime($person_age)) + $item[ 'age' ]);
            }
            if (array_key_exists('start_date', $item)) {
              $dt = new DateTime($item[ 'start_date' ]);
              $years[] = $dt->format('Y');
            }
            if (array_key_exists('target_date', $item)) {
              $dt = new DateTime($item[ 'target_date' ]);
              $years[] = $dt->format('Y');
            }
          }
        }
        else {
          if (array_key_exists('start_date', $it)) {
            $dt = new DateTime($it[ 'start_date' ]);
            $years[] = $dt->format('Y');
          }
        }
      }
    }
    $result = array_unique($years);
    return custom_sort($result);
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