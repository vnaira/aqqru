<?php

/* This controller renders the home page */

class HomeController {

  private $content;
  private $goals = [];
  private $messageObject = [];
  private $tradeoffs = [];
  private $scenarioes = [];

  private $page_content = [];

  public function __construct() {
    $this->messageObject = Goal::getAll();
    $this->content = $this->messageObject['fullAvatar'];
    $this->tradeoffs = $this->messageObject['tradeoffs'];
    $this->scenarioes = $this->messageObject['scenarioes'];
  }

  public function renderData($data) {
    $this->goals = $this->modifyGoalsList($data[ 'goals' ]);
    $page_content = [];

    $page_content[ 'person_name' ] = $this->getPersonName($data);
    $page_content[ 'year_grid' ] = $this->getGridYears($this->goals,$this->getPersonAge($data));
    $page_content[ 'priority' ] = $this->getPriorityList();

    $page_content[ 'goals_list' ] = $this->setAchievability($this->goals, $data[ 'results' ][ 'goal_results' ]);
    $page_content[ 'person_age' ] = $this->getPersonAge($data);
    $page_content[ 'wellness' ] = [
      'wellness_score' => $this->content['results'][ 'avatar_results' ][ 'wellness_score' ],
      'wellness_state' => 'rgb'.generateColor($this->content['results'][ 'avatar_results' ][ 'wellness_state' ]),
      'wellness_state_name' => fromRGB(generateColor($this->content['results'][ 'avatar_results' ][ 'wellness_state' ]))
    ];
    $page_content[ 'balance' ] = $this->getAssets($data);
    $page_content[ 'expenses' ] = $this->getExpenses($data);
    $page_content[ 'risks' ] = $this->getAppropriateRisks($data);
    $page_content[ 'with_draw' ] = $this->getImmediateAction($data);
    $page_content['networth']= $this->getNetWorth($data);
    $page_content['cashflow']= $this->getCashFlow($data);

//    new in page content scenarioes and tradeoffs
    $page_content['tradeoffs']= $this->tradeoffs;
    $page_content['scenarioes']= $this->scenarioes;

    return $page_content;
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
    $balance_sheet = $data['results'][ 'current_financials' ][ 'balance_sheet' ];
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
                $item ['state'] = 'rgb'.generateColor($resultItem[ 'state' ]);
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
    $invesAllocation = $data['results'][ 'guidence' ][ 'capital_allocation' ];
    foreach ($invesAllocation as $investItem) {
      switch ($investItem[ 'action_name' ]) {
        case "Withdraw":
          $actions_w[ 'withdraw' ] += round($investItem[ 'annual_value' ]);
          $actions_w[ 'withdraw_name' ] = ($investItem[ 'object_name' ]);
          $immediateActions['withdraw'][] = $actions_w;
          break;
        case "Deposit" :
          $actionId = $this->getPayOfDebits($investItem[ 'object_id' ]);
//          $actions_d[ 'deposit' ] = $investItem[ 'object_id' ];
          if($actionId){
            $actions_d[ 'deposit' ] += round($investItem[ 'annual_value' ]);
            $actions_d[ 'deposit_name' ] = ($investItem[ 'object_name' ]);
            $immediateActions['deposit'][] = $actions_d;
          }else {
            $actions[ 'save' ] += round($investItem[ 'annual_value' ]);
            $actions[ 'save_name' ] = ($investItem[ 'object_name' ]);
            $immediateActions['save'][] = $actions;
          }
          break;
        default:
          break;
      }
    }
    return $immediateActions;
  }


  public function getPayOfDebits($id) {

    $lifeObject = $this->content[ 'avatar' ][ 'life_objects' ];
    if (!empty($lifeObject)) {
      foreach ($lifeObject as $key => $lifeItem) {
        if (!empty($lifeItem)) {
          foreach ($lifeItem as $item) {
            if ($id == $item[ 'id' ] && ($key == 'student_loans' || $key == 'personal_loans' || $key == 'credit_cards')) {
              return TRUE;
            }
          }
        }

      }
    }
    return FALSE;
  }


  public function getExpenses($data) {
    $incomes = $data['results'][ 'current_financials' ][ 'income_statement' ];
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
    $risks = [];
    $risks = $data['results'][ 'guidence' ][ 'investment_allocation' ];
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

  public function getGridYears($goals, $person_age) {
    $years = [];
    foreach ($goals as $key => $goal_item) {
      $it = $goals[ $key ];
      if (!empty($it)) {
        if (is_array($it)) {
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
    ob_start();
    render('home', [
      'title' => 'Financial Planning Guide',
      'content' => $this->page_content,
      'dates' => '',
    ]);
    $output = ob_get_contents();
    ob_end_clean();
    echo $output;
  }

  /**
   * Get Net Worth values
   * @param $data
   *
   * @return array
   */
  public function getCashFlow($data) {
    $netWorth = [];
    $worthData = $data['results'][ 'current_financials' ][ 'income_statement' ];
    if (!empty($worthData)) {
      $cFlowIncomeMonth = 0;
      $cFlowIncomeAnnual = 0;
      $cFlowexpenseMonth = 0;
      $cFlowexpenseAnnual = 0;
      $cFlowTaxMonth = 0;
      $cFlowTaxAnnual = 0;
      foreach ($worthData as $worthItem) {
        if ($worthItem[ 'category' ] == 'Income') {
          $netWorth[ 'income' ][] = $worthItem;
          $cFlowIncomeMonth += $worthItem['current_month_value'];
          $cFlowIncomeAnnual += $worthItem['annual_value'];
        }
        if ($worthItem[ 'category' ] == 'Expense') {
          $netWorth[ 'expense' ][] = $worthItem;
          $cFlowexpenseMonth += $worthItem['current_month_value'];
          $cFlowexpenseAnnual += $worthItem['annual_value'];
        }
        if ($worthItem[ 'category' ] == 'Tax') {
          $netWorth[ 'tax' ][] = $worthItem;
          $cFlowTaxMonth += $worthItem['current_month_value'];
          $cFlowTaxAnnual += $worthItem['annual_value'];
        }
      }
      $netWorth[ 'income' ]['monthly'] = round($cFlowIncomeMonth);
      $netWorth[ 'income' ]['annual'] = round($cFlowIncomeAnnual);
      $netWorth[ 'expense' ]['monthly'] = round($cFlowexpenseMonth);
      $netWorth[ 'expense' ]['annual'] = round($cFlowexpenseAnnual);
      $netWorth[ 'tax' ]['monthly'] = round($cFlowTaxMonth);
      $netWorth[ 'tax' ]['annual'] = round($cFlowTaxAnnual);
      return $netWorth;
    }
    return null;
  }

  public function getNetWorth($data){
    $cashFlow = [];
    $cahsData = $data['results'][ 'current_financials' ][ 'balance_sheet' ];
    if (!empty($cahsData)) {
      $netWorthValue = 0;
      $netWorthLiquid = 0;
      $netWorthLValue = 0;
      $netWorthLiLiquid = 0;
      foreach ($cahsData as $worthItem) {
        if ($worthItem[ 'category' ] == 'Assets') {
          $cashFlow[ 'assets' ][] = $worthItem;
          $netWorthValue += $worthItem['value'];
          $netWorthLiquid += $worthItem['liquid_value'];
        }
        if ($worthItem[ 'category' ] == 'Liabilities') {
          $cashFlow[ 'liability' ][] = $worthItem;
          $netWorthLValue += $worthItem['value'];
          $netWorthLiLiquid += $worthItem['liquid_value'];
        }
      }
      $cashFlow[ 'assets' ]['monthly'] = round($netWorthValue);
      $cashFlow[ 'assets' ]['annual'] = round($netWorthLiquid);
      $cashFlow[ 'liability' ]['monthly'] = round($netWorthLValue);
      $cashFlow[ 'liability' ]['annual'] = round($netWorthLiLiquid);
      return $cashFlow;
    }
    return null;
  }
}

?>