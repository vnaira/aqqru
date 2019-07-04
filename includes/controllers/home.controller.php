<?php

/* This controller renders the home page */

class HomeController {

  private $content;

  private $goals = [];

  private $messageObject = [];

  private $personAge;

  private $page_content = [];

  public function __construct() {
    $this->messageObject = Goal::getAll();
    $this->content = $this->messageObject[ 'fullAvatar' ];
    $this->personAge = $this->getPersonAge($this->content);
  }

  public function renderData($data) {
    $this->goals = $this->modifyGoalsList($data[ 'goals' ]);
    $page_content = [];

    $page_content[ 'person_name' ] = $this->getPersonName($data);
    $page_content[ 'year_grid' ] = $this->getGridYears($this->goals, $this->getPersonAge($data));
    $page_content[ 'priority' ] = $this->getPriorityList();

    $page_content[ 'goals_list' ] = $this->setAchievability($this->goals, $data[ 'results' ][ 'goal_results' ]);
    $page_content[ 'person_age' ] = $this->getPersonAge($data);
    $page_content[ 'wellness' ] = [
      'wellness_score' => $this->content[ 'results' ][ 'avatar_results' ][ 'wellness_score' ],
      'wellness_state' => 'rgb' . generateColor($this->content[ 'results' ][ 'avatar_results' ][ 'wellness_state' ]),
      'wellness_state_name' => fromRGB(generateColor($this->content[ 'results' ][ 'avatar_results' ][ 'wellness_state' ])),
    ];
    $page_content[ 'balance' ] = $this->getAssets($data);
    $page_content[ 'expenses' ] = $this->getExpenses($data);
    $page_content[ 'risks' ] = $this->getAppropriateRisks($data);
    $page_content[ 'with_draw' ] = $this->getImmediateAction($data);
    $page_content[ 'networth' ] = $this->getNetWorth($data);
    $page_content[ 'cashflow' ] = $this->getCashFlow($data);

    //    new in page content scenarioes and tradeoffs
    $page_content[ 'scenarioes1' ] = $this->getScenarios($this->messageObject[ 'fullAvatar' ], $this->messageObject[ 'scenarioes' ][ 'Scenario1' ][ 'goal_results' ]);
    $page_content[ 'scenarioes2' ] = $this->getScenarios($this->messageObject[ 'fullAvatar' ], $this->messageObject[ 'scenarioes' ][ 'Scenario2' ][ 'goal_results' ]);
    $page_content[ 'tradeoffs1' ] = $this->getTradeOffsContent($this->messageObject[ 'goalsForTradeoffs' ][ 'GoalsForTradeOff1' ], $this->messageObject[ 'tradeoffs' ][ 'TradeOff1' ]);
    $page_content[ 'tradeoffs2' ] = $this->getTradeOffsContent($this->messageObject[ 'goalsForTradeoffs' ][ 'GoalsForTradeOff2' ], $this->messageObject[ 'tradeoffs' ][ 'TradeOff2' ]);

    return $page_content;
  }

  public function getPersonName($data) {
    if (!empty($data)) {
      return $data[ 'profile' ][ 'persons' ][ 0 ][ 'name' ];
    }
  }

  public function getPersonAge($data) {
    if (!empty($data)) {
      return $data[ 'profile' ][ 'persons' ][ 0 ][ 'birthdate' ];
    }
  }

  public function modifyGoalsList($data) {
    if (!empty($data[ 'emergency_funds' ])) {
      $data[ 'emergency_funds' ][ 0 ][ 'start_date' ] = date("Y-m-d H:i:s");
      $data[ 'emergency_funds' ][ 0 ][ 'priority' ] = '1';
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
        if ($balance_item[ 'category' ] == "Assets") {
          $asset += $balance_item[ 'value' ];
        }
        else {
          $liability += $balance_item[ 'value' ];
        }
      }
    }
    $balance[ 'assets' ] = $asset;
    $balance[ 'liabilities' ] = $liability;
    return $balance;
  }

  /**
   * Get achievability from results and set it to corresponding goal
   *
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
              if ($item[ 'id' ] == $resultItem[ 'goal_id' ]) {
                $item[ 'achievability' ] = $resultItem[ 'achievability' ];
                $item [ 'state' ] = 'rgb' . generateColor($resultItem[ 'state' ]);
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
    $capitalAllocation = false;
    $invesAllocation = $data[ 'results' ][ 'guidence' ][ 'capital_allocation' ];
    if(is_array($invesAllocation)) {
      $capitalAllocation = true;
      foreach ($invesAllocation as $investItem) {
        switch ($investItem[ 'action_name' ]) {
          case "Withdraw":
            $actions_w[ 'withdraw' ] += round($investItem[ 'annual_value' ]);
            $actions_w[ 'withdraw_name' ] = ($investItem[ 'object_name' ]);
            $immediateActions[ 'withdraw' ][] = $actions_w;
            break;
          case "Deposit" :
            $actionId = $this->getPayOfDebits($investItem[ 'object_id' ]);
            if ($actionId) {
              $actions_d[ 'deposit' ] += round($investItem[ 'annual_value' ]);
              $actions_d[ 'deposit_name' ] = ($investItem[ 'object_name' ]);
              $immediateActions[ 'deposit' ][] = $actions_d;
            }
            else {
              $actions[ 'save' ] += round($investItem[ 'annual_value' ]);
              $actions[ 'save_name' ] = ($investItem[ 'object_name' ]);
              $immediateActions[ 'save' ][] = $actions;
            }
            break;
          default:
            break;
        }
      }
      $immediateActions['allocationObjectExist'] = $capitalAllocation;
    }
    return $immediateActions;
  }


  public function getPayOfDebits($id) {

    $lifeObject = $this->content[ 'life_objects' ];
    if (!empty($lifeObject)) {
      foreach ($lifeObject as $key => $lifeItem) {
        if (is_array($lifeItem)) {
          foreach ($lifeItem as $item) {
            if ($id == $item[ 'id' ] && ($key == 'student_loans' ||
                $key == 'personal_loans' ||
                $key == 'credit_cards')) {
              return TRUE;
            }
          }
        }
      }
    }
    return FALSE;
  }


  public function getExpenses($data) {
    $incomes = $data[ 'results' ][ 'current_financials' ][ 'income_statement' ];
    $expenses = 0;
    $res = 0;
    if (!empty($incomes)) {
      foreach ($incomes as $incomeItem) {
        $expenses += $incomeItem[ 'current_month_value' ];
      }
    }
    if(count($incomes)!= 0){
      $res =  round($expenses) / count($incomes);
    }
    return $res;
  }

  /**
   * @param $data
   *
   * @return array
   */
  public function getAppropriateRisks($data) {
    $risks = [];
    $risks = $data[ 'results' ][ 'guidence' ][ 'investment_allocation' ];
    $apprRisks = [];
    $riskIt = [];
    if (!empty($risks)) {
      foreach ($risks as $riskItem) {
        $riskIt[ 'name' ] = $this->getGoalNameById($riskItem['object_id'],$data['life_objects']);
        $riskIt[ 'value' ] = round($riskItem[ 'value' ] * 100);
        $apprRisks[] = $riskIt;
      }
    }
    return $apprRisks;
  }

  /**
   * get goal name by gola id
   * @param $id
   * @return string name
   */
  public function getGoalNameById($id, $goals) {
    $lifeObject = "";
    if (is_array($goals)) {
      foreach ($goals as $dataItem) {
        if (is_array($dataItem)) {
          foreach ($dataItem as $item) {
            if ($id == $item[ 'id' ]) {
              $lifeObject = $item[ 'name' ];
            }
          }
        }
      }
    }
    return $lifeObject;
  }

  public function getGridYears($goals, $person_age) {
    $years = [];
    if(is_array($goals)){
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
    }
    $result = array_unique($years);
    return custom_sort($result);
  }

  public function getPriorityList() {
    return ['1', '2', '3'];
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
   *
   * @param $data
   *
   * @return array
   */
  public function getCashFlow($data) {
    $netWorth = [];
    $worthData = $data[ 'results' ][ 'current_financials' ][ 'income_statement' ];
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
          $cFlowIncomeMonth += $worthItem[ 'current_month_value' ];
          $cFlowIncomeAnnual += $worthItem[ 'annual_value' ];
        }
        if ($worthItem[ 'category' ] == 'Expense') {
          $netWorth[ 'expense' ][] = $worthItem;
          $cFlowexpenseMonth += $worthItem[ 'current_month_value' ];
          $cFlowexpenseAnnual += $worthItem[ 'annual_value' ];
        }
        if ($worthItem[ 'category' ] == 'Tax') {
          $netWorth[ 'tax' ][] = $worthItem;
          $cFlowTaxMonth += $worthItem[ 'current_month_value' ];
          $cFlowTaxAnnual += $worthItem[ 'annual_value' ];
        }
      }
      $netWorth[ 'income' ][ 'monthly' ] = round($cFlowIncomeMonth);
      $netWorth[ 'income' ][ 'annual' ] = round($cFlowIncomeAnnual);
      $netWorth[ 'expense' ][ 'monthly' ] = round($cFlowexpenseMonth);
      $netWorth[ 'expense' ][ 'annual' ] = round($cFlowexpenseAnnual);
      $netWorth[ 'tax' ][ 'monthly' ] = round($cFlowTaxMonth);
      $netWorth[ 'tax' ][ 'annual' ] = round($cFlowTaxAnnual);
      return $netWorth;
    }
    return NULL;
  }

  public function getNetWorth($data) {
    $cashFlow = [];
    $cahsData = $data[ 'results' ][ 'current_financials' ][ 'balance_sheet' ];
    if (!empty($cahsData)) {
      $netWorthValue = 0;
      $netWorthLiquid = 0;
      $netWorthLValue = 0;
      $netWorthLiLiquid = 0;
      foreach ($cahsData as $worthItem) {
        if ($worthItem[ 'category' ] == 'Assets') {
          $cashFlow[ 'assets' ][] = $worthItem;
          $netWorthValue += $worthItem[ 'value' ];
          $netWorthLiquid += $worthItem[ 'liquid_value' ];
        }
        if ($worthItem[ 'category' ] == 'Liabilities') {
          $cashFlow[ 'liability' ][] = $worthItem;
          $netWorthLValue += $worthItem[ 'value' ];
          $netWorthLiLiquid += $worthItem[ 'liquid_value' ];
        }
      }
      $cashFlow[ 'assets' ][ 'monthly' ] = round($netWorthValue);
      $cashFlow[ 'assets' ][ 'annual' ] = round($netWorthLiquid);
      $cashFlow[ 'liability' ][ 'monthly' ] = round($netWorthLValue);
      $cashFlow[ 'liability' ][ 'annual' ] = round($netWorthLiLiquid);
      return $cashFlow;
    }
    return NULL;
  }

  /**
   * Calculate scenarios array
   * @param $data
   */
  public function getScenarios($fullAvatar, $scenario) {
    $goals = $fullAvatar[ 'goals' ];
    $results = $fullAvatar[ 'results' ][ 'goal_results' ];
    $fullScenario = [];
    $fullScenarioAll = [];
    if(is_array($scenario)) {
      foreach ($scenario as $scenarioItem) {
        $id = $scenarioItem[ 'goal_id' ];
        $new_achievability = $scenarioItem[ 'achievability' ];
        if(is_array($results)) {
        foreach ($results as $resultItem) {
          if ($resultItem[ 'goal_id' ] == $id) {
            $old_achievability = $resultItem[ 'achievability' ];
            $fullScenario[ 'old_achievability' ] = $old_achievability;
            $fullScenario[ 'new_achievability' ] = $new_achievability;
            $fullScenario[ 'old_state' ] = generateColor($resultItem[ 'state' ]);
            $fullScenario[ 'new_state' ] = generateColor($scenarioItem[ 'state' ]);
          }
        }}
        foreach ($goals as $goalItem) {
          foreach ($goalItem as $it) {
            if ($it[ 'id' ] == $id) {
              $fullScenario[ 'name' ] = $it[ 'name' ];
            }
          }
        }
        $fullScenarioAll[] = $fullScenario;
      }
    }
    return $fullScenarioAll;
  }

  /**
   * Calculate tradeoffs array
   * @param $data
   */
  public function getTradeOffsContent($goalsForTradeOff, $trageOffs) {
    $tradeoffcontent = [];
    $id = $goalsForTradeOff[ 0 ][ 0 ][ 'id' ];
    for ($i = 0; $i < 3; $i++) {
      $tradeoffcontent[ $i ][ 'amount' ] = $goalsForTradeOff[ $i ][ 0 ][ 'Amount' ];
      $tradeoffcontent[ $i ][ 'ages' ] = defineAges($goalsForTradeOff[ $i ], $this->personAge);
      $tradeoffcontent[ $i ][ 'state' ] = $this->getAmountAgeMatrix($trageOffs[ $i ], $id, $goalsForTradeOff[ $i ][ 0 ][ 'Amount' ]);
    }
    return $tradeoffcontent;
  }


  public function getAmountAgeMatrix($tradeOff, $id, $amount) {
    $state = [];
    if (is_array($tradeOff)) {
      foreach ($tradeOff as $troffit) {
        if (is_array($troffit[ 'goal_results' ])) {
          foreach ($troffit[ 'goal_results' ] as $item) {
            if ($id == $item[ 'goal_id' ]) {
              $state[] = generateColor($item[ 'state' ]);
            }
          }
        }
      }
    }
    return $state;
  }
}

?>