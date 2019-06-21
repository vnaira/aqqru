<?php

/* This controller renders the home page */

class HomeController {

  private $content;
  private $goals = [];
  private $html = "";

  private $page_content = [];

  public function __construct() {
    $this->content = Goal::getAll();
  }

  public function handleRequest() {
    $this->page_content = $this->renderData($this->content);

    if (empty($this->content)) {
      throw new Exception("There is no such data!");
    }
//
//    $this->html .= "
//    <div class=\"col-md-12 p-top-10\">
//        <p>
//            <strong>". $this->page_content[ 'person_name' ]."</strong>
//            <strong>". date("M Y")."</strong>
//        </p>
//    </div>
//    <div class=\"col-md-12 green-text-area m-top-20\">
//        <p style=\"font-size: 30px;color:red\">We believe in financial goal planning built for all of us.</p>
//        <p><strong>But this guide’s just for you.</strong></p>
//    </div>
//    </div>
//    <section id=\"includes\" class=\"\">
//
//        <div class=\"container padd-section m-top-300\">
//            <div class=\"col-md-12\">
//                <p><strong>This report includes: </strong></p>
//            </div>
//            <div class=\"row\">
//                <div class=\"col-md-12\">
//                    <div class=\"col-md-1\">
//                        <img src=\"assets/img/recommend.PNG\" alt=\"img\"
//                             class=\"img-responsive center-block\">
//                    </div>
//                    <div class=\"col-md-11\">
//                        <div class=\"row\">
//                            <p><strong>Recommendations </strong>for immediate
//                                action</p>
//                        </div>
//                    </div>
//                </div>
//                <div class=\"col-md-12\">
//                    <div class=\"col-md-1\">
//                        <img src=\"assets/img/tips.PNG\" alt=\"img\"
//                             class=\"img-responsive center-block\">
//                    </div>
//                    <div class=\"col-md-11\">
//                        <div class=\"row\">
//                            <p><strong>Tips </strong> to improve your finances
//                            </p>
//                        </div>
//                    </div>
//                </div>
//                <div class=\"col-md-12\">
//                    <div class=\"col-md-1\">
//                        <img src=\"assets/img/scenario.png\" alt=\"img\"
//                             class=\"img-responsive center-block\">
//                    </div>
//                    <div class=\"col-md-11\">
//                        <div class=\"row\">
//                            <p><strong>Scenarios </strong> that can impact your
//                                goals and expectations</p>
//                        </div>
//                    </div>
//                </div>
//            </div>
//        </div>
//    </section>
//
//    <!--==========================
//          Welcome section
//        ============================-->
//    <section id=\"welcome\" class=\"page-break\">
//        <div class=\"container padd-section\">
//            <div class=\"col-md-12 border-bottom-grey\">
//                <h1>Welcome to your </h1>
//                <h1 class=\"m-bot-20\">Financial Planning Guide </h1>
//            </div>
//            <div class=\"col-md-12 border-bottom-grey green-text-area\">
//                <p class=\"p-top-20\">An all-in-one roadmap to financial wellness.</p>
//            </div>
//            <div class=\"col-md-12 m-top-20\">
//                <div class=\"row\">
//                    <p><strong>This guide is designed to do two things:</strong></p>
//                    <div class=\"row m-top-20\">
//                        <div class=\"col-md-1\">
//                            <img src=\"assets/img/arrow-green.png\" alt=\"\">
//                        </div>
//                        <div class=\"col-md-11\">
//                            <h3>Summarize your finances as they stand right now. </h3>
//                            <p>(Your net worth, monthly cash flow, etc.)</p>
//                        </div>
//                    </div>
//                    <div class=\"row m-top-20\">
//                        <div class=\"col-md-1\">
//                            <img src=\"assets/img/arrow-green.png\" alt=\"\">
//                        </div>
//                        <div class=\"col-md-11\">
//                            <h3>Help you reach your goals.</h3>
//                            <p>(Major purchases, long term savings, etc.)</p>
//                        </div>
//                    </div>
//                    <div class=\"row\">
//                        <p class=\"col-md-7 m-top-20\">
//                            <strong>We'll start by giving you a clear and honest picture of your current financial situation: what’s working, and what could be working better. Then, we’ll lay out the goals you told us about. We’ll let you know if you’re on track to reach them. Finally, we’ll give you simple, step-by-step instructions to get you closer to the things you care about—whatever they are.</strong>
//                        </p>
//                        <p class=\"m-top-20 col-md-12 green-text\">
//                            Let's get started!
//                        </p>
//                    </div>
//                </div>
//            </div>
//            <div class=\"col-md-12 m-top-300\">
//                <p class=\"text-right\"><strong>Page 2</strong></p>
//            </div>
//        </div>
//    </section>
//
//    <!--==========================
//          Financial overview
//        ============================-->
//    <section id=\"fin-overview\" class=\"page-break\">
//
//        <div class=\"container\">
//            <div class=\"row-title col-md-12 m-top-40\">
//                <h2>Financial Overview</h2>
//            </div>
//            <div class=\"col-md-12 light-grey-bg p-top-20 p-bot-20\">
//                <div class=\"col-md-12\">
//                    <p class=\"p-top-20\"><strong>First things first.</strong>Here’s
//                        a quick look at your finances. We’ll get more in-depth
//                        later.</p>
//                </div>
//            </div>
//            <div class=\"col-md-12 m-top-40\">
//                <h3 class=\"text-center m-bot-20\">Your Financial Wellness
//                    Score:</h3>
//                <p class=\"text-center grey-text\">This number shows you how
//                    likely you are to achieve all your goals </p>
//                <p class=\"text-center grey-text\">(on a scale from 1 to 100. A
//                    higher number means a better score).</p>
//
//                <div class=\"clearfix\">
//                    <div class=\"col-md-4 col-md-push-4 m-top-40 p-left6\">
//                        <div class=\"c100 big p".$this->page_content[ 'wellness' ][ 'wellness_score' ].
//                       " color_" . $this->page_content[ 'wellness' ][ 'wellness_state_name' ]."\"
//                             style=\"border:1px solid ".$this->page_content[ 'wellness' ][ 'wellness_state' ]."\">
//                            <span style=\"color:".$this->page_content[ 'wellness' ][ 'wellness_state' ]."\">".$this->page_content[ 'wellness' ][ 'wellness_score' ]."</span>
//                            <div class=\"slice\">
//                                <div class=\"bar\"
//                                     style=\"border: 0.08em solid". $this->page_content[ 'wellness' ][ 'wellness_state' ]."\"></div>
//                                <div class=\"fill\"></div>
//                            </div>
//                        </div>
//                    </div>
//                </div>
//                <div class=\"col-md-12\">
//                    <div class=\"col-md-4 col-md-push-4 m-top-20 text-center\">
//                        <p class=\"green-text no-m-bottom font18\">Wow!</p>
//                        <p class=\"green-text no-m-bottom font18\">Nice number you
//                            got there.</p>
//                        <p class=\"green-text font18\">We’ll help you keep it
//                            up.</p>
//                    </div>
//                </div>
//                <div class=\"col-md-12 m-top-40\">
//                    <h3 class=\"text-center\">Financial Summary: </h3>
//
//                    <div class=\"col-md-12 light-grey-bg p-bot-10 m-top-20\">
//                        <div class=\"col-md-6 text-right\">
//                            <div class=\"col-md-4 col-md-offset-2\">
//                                <p class=\"big-line m-top-10\">
//                                    <strong>What I own:</strong>
//                                </p>
//                            </div></div></div></div></div></div></section>";
//
//    echo $this->html;

    render('home', [
      'title' => 'Financial Planning Guide',
      'content' => $this->page_content,
      'dates' => '',
    ]);
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
          $actionId = $this->getPayOfDebits($investItem[ 'object_id' ]);
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
      'wellness_state' => 'rgb'.generateColor($this->content[ 'results' ][ 'avatar_results' ][ 'wellness_state' ]),
      'wellness_state_name' => fromRGB(generateColor($this->content[ 'results' ][ 'avatar_results' ][ 'wellness_state' ]))
    ];
    $page_content[ 'balance' ] = $this->getAssets($data);
    $page_content[ 'expenses' ] = $this->getExpenses($data);
    $page_content[ 'risks' ] = $this->getAppropriateRisks($data);
    $page_content[ 'with_draw' ] = $this->getImmediateAction($data);
    $page_content['networth']= $this->getNetWorth($data);
    $page_content['cashflow']= $this->getCashFlow($data);

    return $page_content;
  }

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

  /**
   * Get Net Worth values
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
    $cahsData = $data[ 'results' ][ 'current_financials' ][ 'balance_sheet' ];
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