<?php render('_header', ['title' => $title]) ?>
    <div class="col-md-12 p-top-10">
        <p>
            <span><?php echo $content[ 'person_name' ]; ?></span>
            <span><?php echo date("M Y"); ?></span>
        </p>
    </div>
    </div>
    <section id="includes" class="">

        <div class="container padd-section">
            <div class="col-md-12">
                <p>This report includes: </p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-1">
                        <img src="assets/img/recommend.PNG" alt="img"
                             class="img-responsive center-block">
                    </div>
                    <div class="col-md-11">
                        <div class="row">
                            <p><strong>Recommendations </strong>for immediate
                                action</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-1">
                        <img src="assets/img/tips.PNG" alt="img"
                             class="img-responsive center-block">
                    </div>
                    <div class="col-md-11">
                        <div class="row">
                            <p><strong>Tips </strong> to improve your finances
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-1">
                        <img src="assets/img/scenario.PNG" alt="img"
                             class="img-responsive center-block">
                    </div>
                    <div class="col-md-11">
                        <div class="row">
                            <p><strong>Scenarios </strong> that can impact your
                                goals and expectations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row-title col-md-12">
                <h3>Financial Overview</h3>
            </div>
            <div class="col-md-12 grey-bordered m-top-20">
                <div class="col-md-6 text-center right-border">
                    <p class="text-center">Your Financial Wellness Score:</p>
                    <p class="big-text"
                       style="color: <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?>">
                      <?php echo $content[ 'wellness' ][ 'wellness_score' ]; ?></p>
                    <p class="text-center col-md-12 text-muted no-pad-bottom">
                        Overall indicator of the likelihood
                        of achieving all your goals</p>
                </div>
                <div class="col-md-6 text-center">
                    <p class="text-center">Financial Summary: </p>
                    <p class="col-md-6">Assets</p>
                    <p class="col-md-6" style="color: <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?>">
                      <?php echo ($content[ 'balance' ][ 'assets' ] > 0) ? '+ $' . number_format($content[ 'balance' ][ 'assets' ]) : '- $' . number_format($content[ 'balance' ][ 'assets' ]); ?>
                    </p>
                    <p class="col-md-6">Liabilities</p>
                    <p class="col-md-6 border-bottom-grey"
                       style="color: <?php echo ($content[ 'balance' ][ 'liabilities' ] < 0)? 'red' : ''; ?>">
                      <?php echo ($content[ 'balance' ][ 'liabilities' ] > 0) ? '+ $' . number_format($content[ 'balance' ][ 'liabilities' ]) : '- $' . number_format((-1)*$content[ 'balance' ][ 'liabilities' ]); ?></p>
                    <p class="col-md-6">Net Worth:</p>
                    <p class="col-md-6"><?php echo '+ $'. number_format(($content[ 'balance' ][ 'assets' ] + $content[ 'balance' ][ 'liabilities' ])); ?></p>

                </div>
            </div>
        </div>

        <!--==========================
          Goals Summary
        ============================-->
        <div class="container">
            <p class="text-center m-top-20">Goals Summary</p>
        </div>
        <div class="container">
            <div class="col-md-1">
                <div class="row">
                    <table>
                        <tr>
                            <td rowspan="3">
                                <div class="row">
                                    <div class="rotate-text">
                                        <strong>PRIORITY</strong></div>
                                </div>
                            </td>
                            <td class="left-side-title">
                                <p class="rotate-text high-text">HIGH</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="left-side-title">
                                <p class="rotate-text mid-text">MEDIUM</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="left-side-title">
                                <p class="rotate-text low-text">LOW</p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-11">

                <div class="table-responsive grey-table" id="drag1">
                    <table class="table goals-table">
                      <?php foreach ($content[ 'priority' ] as $pr_item) { ?>
                          <tr>
                            <?php foreach ($content[ 'year_grid' ] as $grid_item) { ?>
                                <?php  $is_single = true; ?>
                                <td class="<?php echo $pr_item . "-" . $grid_item; ?>">
                                  <?php foreach ($content[ 'goals_list' ] as $key => $goal_item) {

                                      foreach ($goal_item as $value) {
                                        $period = defineYear($value, $content[ 'person_age' ]);

                                        if ($period == $grid_item && $value[ 'priority' ] == $pr_item) { ?>
                                            <!-- goal item-->
                                            <div class="goal-item tipContainer drag"
                                                 id="<?php echo $value[ 'name' ]; ?>" style="margin-top: <?php echo (!$is_single)? '45px' : '';?>">
                                                <div class="tipContent">
                                                    <div class="goal-icon col-md-5">

                                                        <img src="<?php echo $value[ 'image_url' ] != NULL ? $value[ 'image_url' ] : 'assets/img/'.$key.'.png' ?>"
                                                             alt="">
                                                        <div class="goal-name">
                                                            <strong><?php echo $value[ 'name' ]; ?></strong>
                                                        </div>
                                                    </div>
                                                    <div class="goal-price col-md-7 text-right">
                                                        <strong><?php echo $value['amount'] ? numberFormatK($value['amount']) : '';?></strong>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="status-line text-left"
                                                                 style="padding-left: 20%">
                                                                <img src="assets/img/more-big.png"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 likelihood">
                                                        <strong>
                                                          <?php echo (isset($value[ 'achievability' ])) ? $value[ 'achievability' ] . '% Likelihood' : '' ;?>
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end of goal item-->
                                          <?php $is_single = FALSE;?>
                                        <?php }
                                      }
                                  } ?>

                                </td>
                            <?php } ?>
                              <td></td>
                          </tr>
                      <?php } ?>
                    </table>
                </div>
                <div class="col-md-12">
                    <div class="grid-container2">
                        <table width="90%">
                            <tr>
                              <?php foreach ($content[ 'year_grid' ] as $grid_item) { ?>
                                  <td class="text-right">
                                      <div class="col-md-12"><?php echo $grid_item; ?></div>
                                  </td>
                              <?php } ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container m-top-20">
            <strong><i class="fa fa-question-circle"></i> Likelihood
                Scores</strong>
            <p class="text-muted">These are based on WTI Technology and predict
                how likely you are to
                achieve your goals at specific milestones throughout your
                life</p>
        </div>
    </section>

    <!--==========================
      Recommendations
    ============================-->
    <section id="recommend" class="page-break">
        <div class="container padd-container">
            <div class="section-title">
                <h3 class="text-left"><span><img src="assets/img/recommend.PNG"
                                                 alt="" class=""></span>Recommendations
                    for
                    immediate action: <?php echo date("M Y"); ?></h3>
            </div>
            <div class="col-md-12">
                <p>Take these steps now to increase the likelihood to meet your
                    financial goals and secure a brighter
                    future.</p>
            </div>
            <div class="col-md-12 grey-bordered">
                <h4 class="green-title">Transfer Funds</h4>
                <p>Each month, we’ll recommend that you transfer funds between
                    your accounts to keep your assets
                    working as effectively as possible. For December, we
                    recommend:</p>
                <div class="col-md-6">
                    <div class="grey-bg col-md-11 m-top-90">
                        <div class="step col-md-3">1</div>
                        <div class="col-md-9 sub-title-2 m-bot-20">
                            <h4 class="">WITHDRAW FUNDS</h4>
                        </div>
                        <?php foreach ($content['with_draw']['withdraw'] as $draw_item){?>
                        <div class="col-md-3">
                            <div class="row">

                                <strong><?php echo '$'.number_format($draw_item['withdraw']);?></strong></div>
                        </div>
                        <div class="col-md-9 sub-title-2">
                            <div class="row">
                                <strong><?php echo $draw_item['withdraw_name'];?></strong>
                                <p>(annual amount: $10k)</p>
                            </div>
                        </div>
  <?php }?>
<!--                        <div class="col-md-3">-->
<!--                            <div class="row">-->
<!--                                <strong>$1,000</strong>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-md-9 sub-title-2">-->
<!--                            <div class="row">-->
<!--                                <strong>Charles Schwab </strong>-->
<!--                                <p>(annual amount: $10k)</p>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                    <div class="com-md-1 m-top-90 padd-container">
                        <img src="assets/img/arrow-right.PNG" alt=""
                             class="center-block">
                    </div>
                    <div class="col-md-12 m-top-60">
                        <strong><i class="fa fa-question-circle"></i> Why don’t
                            these numbers balance?</strong>
                        <p class="text-muted">We have excluded income and
                            spending from this
                            equation as these are not actionable suggestions</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="grey-bg col-md-11">
                        <div class="step col-md-3">2</div>
                        <div class="col-md-9 sub-title-2 m-bot-20">
                            <h4 class="">PAYOFF DEBT</h4>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <strong>$1,000</strong>
                            </div>
                        </div>
                        <div class="col-md-9 sub-title-2">
                            <div class="row">
                                <p><strong>Visa CC</strong>
                                    <span>ending 0078</span></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <strong>$500</strong>
                            </div>
                        </div>
                        <div class="col-md-9 sub-title-2">
                            <div class="row">
                                <p><strong>Mastercard CC</strong> <span>ending 0098</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <strong>$500</strong>
                            </div>
                        </div>
                        <div class="col-md-9 sub-title-2">
                            <div class="row">
                                <p><strong>Discover CC</strong> <span>ending 2214</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="grey-bg col-md-11 m-top-20">
                        <div class="step col-md-3">3</div>
                        <div class="col-md-9 sub-title-2 m-bot-20">
                            <h4 class="">DEPOSIT FUNDS</h4>
                        </div>
                        <div class="col-md-3">
                            <div class="row">

                                <strong>$1,000</strong></div>
                        </div>
                        <div class="col-md-9 sub-title-2">
                            <div class="row">
                                <p><strong>SEP IRA</strong>
                                    <span>(annual amount: $10k)</span></p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="row">
                                <strong>$1,000</strong>
                            </div>
                        </div>
                        <div class="col-md-9 sub-title-2">
                            <div class="row">
                                <p><strong>Fidelity 401(k)</strong>
                                    <span> (annually: $1.5k)</span></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="container m-top-40">
            <div class="half-block">
                <div class="col-md-12">
                    <h4 class="green-title">Trim Everyday Expenses</h4>
                    <p>A small reduction in expenses greatly improves
                        your chances to reach your goals.
                    </p>
                    <div class="col-md-6">
                        <div class="row">
                            <h4 class="sub-title-2">REDUCE</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-9 pinked-bg">
                            <strong><?php echo '$'.$content['expenses'].'/month';?></strong>
                            <p>
                                Discretionary
                                Expenses
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="middle-block">
                <div class="col-md-12"></div>
            </div>
            <div class="half-block">
                <div class="col-md-12">
                    <h4 class="green-title">Take Appropriate Risk</h4>
                    <p>Depending on your goals, age, and market
                        conditions, we suggest adjusting your accounts
                        to balance long term growth and conservative
                        income-generating assets.</p>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <div class="row">
                                <strong>
                                    <small>INCOME</small>
                                </strong>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row text-right">
                                <strong class="">
                                    <small>GROWTH</small>
                                </strong>
                            </div>
                        </div>
                    </div>
                    <?php foreach ($content['risks'] as $riskItem){?>
                    <div class="col-md-6">
                        <div class="row">
                            <strong>
                                <?php echo $riskItem['name'];?>
                            </strong>
                            <p>
                                <small>Name of Account</small>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row risk-values">
                            <div style="width: <?php echo $riskItem['value'].'%'?>; background: #A074CC; height: 10px; border-radius: 5px; float: left"></div>
                            <div style="width: <?php echo (100 - $riskItem['value']).'%'?>; background: #CB81B2; height: 10px; border-radius: 5px; float: left"></div>
                        </div>
                    </div>
                      <?php }?>

                </div>
            </div>
        </div>
    </section>

    <!--==========================
      Tips
    ============================-->
    <section id="tips" class="page-break">
        <div class="container padd-container">
            <div class="section-title">
                <h3 class="text-left"><span><img src="assets/img/tips.PNG"
                                                 alt="" class=""></span>
                    Tips to improve your finances
                </h3>
            </div>
            <div class="col-md-12">
                <p class="sub-title-3 m-bot-20">Consider Alternatives: <strong>
                        Changing your goals</strong> as life unfolds
                </p>
                <p>By considering alternative scenarios, you may make it more
                    likely that you can reach the goals most
                    important to
                    you. These examples compare the likelihood for meeting each
                    of your goals with a new prediction if you
                    decide
                    to change your goals accordingly.</p>
            </div>
            <div class="col-md-12 grey-bordered m-top-20">
                <h4 class="green-title"><strong style="color:#000">Alternative
                        1: </strong>Buy house with cash instead of
                    financing</h4>
                <div class="row grey-title">
                    <div class="col-md-4 text-center">
                        <h4>YOUR GOALS</h4>
                    </div>
                    <div class="col-md-8 text-center">
                        <h4>CHANGE IN LIKELIHOOD</h4>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Retire in 2042</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 57%;">
                                <img src="assets/img/yelloq.png" alt="">
                            <img src="assets/img/grow-down-small.png" alt="">
                            <img src="assets/img/more.png" alt=""></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Send 2 daughers to college</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 57%;">
                            <img src="assets/img/more.png" alt=""></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="text-muted">Little Change</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Buy a new house</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 20%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1"><p
                                    class="green-text">More Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Buy a new car</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 20%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Start a business</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 20%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Join Aurora Country Club
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 37%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Fund cancer research initiative
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 77%;">
                               <img src="assets/img/more.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="text-muted">Little Change</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Buy airplane</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 27%;">
                            <img src="assets/img/more.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="text-muted">Little Change</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grey-bordered m-top-20">
                <h4 class="green-title"><strong style="color:#000">Alternative
                        2: </strong>Rent a home instead of buying one
                </h4>
                <div class="row grey-title">
                    <div class="col-md-4 text-center">
                        <h4>YOUR GOALS</h4>
                    </div>
                    <div class="col-md-8 text-center">
                        <h4>CHANGE IN LIKELIHOOD</h4>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Retire in 2042</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 57%;">
                                <img src="assets/img/yelloq.png" alt="">
                            <img src="assets/img/grow-down-small.png" alt="">
                            <img src="assets/img/more.png" alt=""></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Send 2 daughers to college</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 57%;">
                            <img src="assets/img/more.png" alt=""></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="text-muted">Little Change</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Buy a new house</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 20%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="green-text">More Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Buy a new car</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 20%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Start a business</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 20%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Join Aurora Country Club
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 37%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Fund cancer research initiative
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 77%;">
                                <img src="assets/img/yelloq.png" alt="">
                            <img src="assets/img/grow-down-small.png" alt="">
                            <img src="assets/img/more.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Buy airplane</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 27%;">
                             <img src="assets/img/yelloq.png" alt="">
                            <img src="assets/img/grow-down-small.png" alt="">
                            <img src="assets/img/more.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 m-top-20">
                <div class="row">
                    <p>
                        <small><span class="red-text">Less Likely:</span>Smaller
                            chance you’ll meet all your goals
                        </small>
                    </p>
                    <p>
                        <small><span class="text-muted">Little Change:</span>About
                            the same likelihood you’ll meet all your
                            goals
                        </small>
                    </p>
                    <p>
                        <small><span class="green-text">More Likely:</span>
                            Higher chance you’ll meet all your goals
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
      Tips to improve
    ============================-->
    <section id="tip" class="page-break">
        <div class="container padd-container">
            <div class="section-title">
                <h3 class="text-left"><span><img src="assets/img/tips.PNG"
                                                 alt="" class=""></span>
                    Tips to improve your finances
                </h3>
            </div>
            <div class="col-md-12">
                <p class="sub-title-3 m-bot-20">Other Potential <strong>
                        Tradeoffs :</strong> More paths to a brighter
                    future
                </p>
                <p>Adjusting your expectations for some goals may make it more
                    or less likely that you’ll achieve all of
                    your goals.
                    Consider tradeoffs such as these:</p>
            </div>
            <div class="col-md-12 grey-bordered m-top-20 no-pad-bottom">
                <h4 class="green-title"><strong style="color:#000">Tradeoff
                        1: </strong> Retire later and/or contribute less
                    to cancer research</h4>
                <div class="row">
                    <div class="col-md-12 grey-line"></div>
                </div>
                <div class="table-responsive">
                    <table class="table trade-table" border="0">
                        <tr>
                            <td></td>
                            <td colspan="5" class="text-center text-muted">
                                Retirement Age
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">Monthly
                                Contribution
                            </td>
                            <td> 56</td>
                            <td> 58</td>
                            <td> 60</td>
                            <td> 62</td>
                            <td> 64</td>
                        </tr>
                        <tr>
                            <td>$1,000
                            </td>
                            <td><img src="assets/img/red-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/red-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/orange-circle.png" alt="">
                            </td>
                            <td><img src="assets/img/yellow-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/green-circle.PNG" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>$600
                            </td>
                            <td><img src="assets/img/red-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/orange-circle.png" alt="">
                            </td>
                            <td><img src="assets/img/yellow-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/green-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/green-circle.PNG" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>$200
                            </td>
                            <td><img src="assets/img/red-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/orange-circle.png" alt="">
                            </td>
                            <td><img src="assets/img/yellow-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/green-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/green-circle.PNG" alt="">
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="row light-grey-bg">
                    <div class="col-md-12">
                        <p>
                            <small><img src="assets/img/red-circle.PNG" alt=""
                                        width="12"
                                        class="stat-desc"><span>Less Likely</span>
                                you’ll meet all your goals
                            </small>
                        </p>
                        <p>
                            <small><img src="assets/img/yellow-circle.PNG"
                                        alt="" width="12"
                                        class="stat-desc"><span>Same Likelihood</span>
                                you’ll meet all your goals
                            </small>
                        </p>
                        <p>
                            <small><img src="assets/img/green-circle.PNG" alt=""
                                        width="12"
                                        class="stat-desc"><span>More Likely</span>
                                you’ll meet all your goals
                            </small>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grey-bordered m-top-20 no-pad-bottom">
                <h4 class="green-title"><strong style="color:#000">Tradeoff
                        2: </strong> Retire later and/or invest less in
                    your business</h4>
                <div class="row">
                    <div class="col-md-12 grey-line"></div>
                </div>
                <div class="table-responsive">
                    <table class="table trade-table" border="0">
                        <tr>
                            <td></td>
                            <td colspan="5" class="text-center text-muted">
                                Retirement Age
                            </td>
                        </tr>
                        <tr>
                            <td class="text-muted">Cost to start your
                                own business
                            </td>
                            <td>56</td>
                            <td>58</td>
                            <td>60</td>
                            <td>62</td>
                            <td>64</td>
                        </tr>
                        <tr>
                            <td>$76,000
                            </td>
                            <td><img src="assets/img/red-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/red-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/orange-circle.png" alt="">
                            </td>
                            <td><img src="assets/img/yellow-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/green-circle.PNG" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>$66,00
                            </td>
                            <td><img src="assets/img/red-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/orange-circle.png" alt="">
                            </td>
                            <td><img src="assets/img/yellow-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/green-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/green-circle.PNG" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>$56,000
                            </td>
                            <td><img src="assets/img/red-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/orange-circle.png" alt="">
                            </td>
                            <td><img src="assets/img/yellow-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/green-circle.PNG" alt="">
                            </td>
                            <td><img src="assets/img/green-circle.PNG" alt="">
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="row light-grey-bg">
                    <div class="col-md-12">
                        <p>
                            <small><img src="assets/img/red-circle.PNG" alt=""
                                        width="12"
                                        class="stat-desc"><span>Less Likely</span>
                                you’ll meet all your goals
                            </small>
                        </p>
                        <p>
                            <small><img src="assets/img/yellow-circle.PNG"
                                        alt="" width="12"
                                        class="stat-desc"><span>Same Likelihood</span>
                                you’ll meet all your goals
                            </small>
                        </p>
                        <p>
                            <small><img src="assets/img/green-circle.PNG" alt=""
                                        width="12"
                                        class="stat-desc"><span>More Likely</span>
                                you’ll meet all your goals
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
      Scenario Section
    ============================-->

    <section id="scenario" class="page-break">
        <div class="container padd-container">
            <div class="section-title">
                <h3 class="text-left"><span><img src="assets/img/scenario.PNG"
                                                 alt="" class=""></span>
                    Scenarios that can impact your goals and expectations
                </h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="sub-title-3 m-bot-20">“What if”? The effects of
                        <strong> unpredictable change</strong></p>
                    <p>Changes in the overall economy, increasing volatility in
                        financial markets, and disruptions in your
                        own life can
                        change the likelihood of meeting your financial goals.
                        These examples scenarios show how external
                        and
                        unexpected events like these could impact these
                        goals.</p>
                    <p>
                        Note: These scenarios are only examples,
                        <strong><i>not</i></strong> predictions of specific
                        events.

                    </p>
                </div>
            </div>
            <div class="col-md-12 grey-bordered m-top-20">
                <h4 class="green-title"><strong style="color:#000">Scenario
                        1: </strong> S&P 500 Index drops 10% in the next
                    12 months</h4>
                <div class="row grey-title">
                    <div class="col-md-4 text-center">
                        <h4>YOUR GOALS</h4>
                    </div>
                    <div class="col-md-8 text-center">
                        <h4>CHANGE IN LIKELIHOOD</h4>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Retire in 2042</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 57%;">
                                <img src="assets/img/yelloq.png" alt="">
                            <img src="assets/img/grow-down-small.png" alt="">
                            <img src="assets/img/more.png" alt=""></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Send 2 daughers to college</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 57%;">
                            <img src="assets/img/more.png" alt=""></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="text-muted">Little Change</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Buy a new house</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 20%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1"><p
                                    class="green-text">More Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Buy a new car</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 20%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Start a business</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 20%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Join Aurora Country Club
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 37%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Fund cancer research initiative
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 77%;">
                               <img src="assets/img/more.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Buy airplane</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 27%;">
                            <img src="assets/img/more.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 m-top-20">
                <div class="row">
                    <p>
                        <small><span class="red-text">Less Likely:</span>Smaller
                            chance you’ll meet all your goals
                        </small>
                    </p>
                    <p>
                        <small><span class="text-muted">Little Change:</span>About
                            the same likelihood you’ll meet all your
                            goals
                        </small>
                    </p>
                    <p>
                        <small><span class="green-text">More Likely:</span>
                            Higher chance you’ll meet all your goals
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
      Scenarios
    ============================-->
    <section id="scenarios" class="page-break">
        <div class="container padd-container ">
            <div class="section-title">
                <h3 class="text-left"><span><img src="assets/img/scenario.PNG"
                                                 alt="" class=""></span>
                    Scenarios that can impact your goals and expectations
                </h3>
            </div>
            <div class="col-md-12 grey-bordered m-top-20">
                <h4 class="green-title"><strong style="color:#000">Scenario
                        2: </strong>10 year US Treasury Bond rate raises
                    by 3% in 12 months
                </h4>
                <div class="row grey-title">
                    <div class="col-md-4 text-center">
                        <h4>YOUR GOALS</h4>
                    </div>
                    <div class="col-md-8 text-center">
                        <h4>CHANGE IN LIKELIHOOD</h4>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Retire in 2042</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 57%;">
                                <img src="assets/img/yelloq.png" alt="">
                            <img src="assets/img/grow-down-small.png" alt="">
                            <img src="assets/img/more.png" alt=""></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Send 2 daughers to college</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 57%;">
                            <img src="assets/img/more.png" alt=""></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="text-muted">Little Change</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Buy a new house</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 20%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1"><p
                                    class="green-text">More Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Buy a new car</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 20%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Start a business</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 20%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Join Aurora Country Club
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 37%;">
                                <img src="assets/img/redq.png" alt="">
                            <img src="assets/img/grow-up-small.png" alt="">
                            <img src="assets/img/yelloq.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Fund cancer research initiative
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 77%;">
                               <img src="assets/img/more.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 goal-row">
                    <div class="row">
                        <div class="col-md-4 right-border">
                            <p>Buy airplane</p>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-10 scale-line col-md-push-1">
                            <span class="status-image"
                                  style="margin-left: 27%;">
                            <img src="assets/img/more.png" alt="">
                            </span>
                            </div>
                        </div>
                        <div class="col-md-4 col-md-push-1">
                            <p class="red-text">Less Likely</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 m-top-20">
                <div class="row">
                    <p>
                        <small><span class="red-text">Less Likely:</span>Smaller
                            chance you’ll meet all your goals
                        </small>
                    </p>
                    <p>
                        <small><span class="text-muted">Little Change:</span>About
                            the same likelihood you’ll meet all your
                            goals
                        </small>
                    </p>
                    <p>
                        <small><span class="green-text">More Likely:</span>
                            Higher chance you’ll meet all your goals
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </section>


<?php render('_footer') ?>