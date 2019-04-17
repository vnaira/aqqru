<?php render('_header', ['title' => $title]) ?>
    <div class="col-md-12 p-top-10">
        <p>
            <strong><?php echo $content[ 'person_name' ]; ?></strong>
            <strong><?php echo date("M Y"); ?></strong>
        </p>
    </div>
<div class="col-md-12 green-text-area">
<p>We believe in financial goal planning built for all of us.</p>
<p><strong>But this guide’s just for you.</strong></p>
</div>
    </div>
    <section id="includes" class="">

        <div class="container padd-section m-top-300">
            <div class="col-md-12">
                <p><strong>This report includes: </strong></p>
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
    </section>

    <!--==========================
          Welcome section
        ============================-->
    <section id="welcome" class="page-break">
        <div class="container padd-section">
            <div class="col-md-12 border-bottom-grey">
                <h1>Welcome to your </h1>
                <h1 class="m-bot-20">Financial Planning Guide </h1>
            </div>
            <div class="col-md-12 border-bottom-grey green-text-area">
                <p class="p-top-20">Hey there! We made something for you.</p>
            </div>
            <div class="col-md-12 m-top-20">
                <div class="row">
                    <p>This is your Financial Planning Guide. It’s here to do
                        two things:</p>
                    <div class="row m-top-20">
                        <div class="col-md-1">
                            <img src="assets/img/arrow-green.png" alt="">
                        </div>
                        <div class="col-md-11">
                            <h3>Show you where you’re at.</h3>
                            <p>(Your net worth, your monthly cash flow. All that
                                good stuff.)</p>
                        </div>
                    </div>
                    <div class="row m-top-20">
                        <div class="col-md-1">
                            <img src="assets/img/arrow-green.png" alt="">
                        </div>
                        <div class="col-md-11">
                            <h3>Get you where you want to be.</h3>
                            <p>(Your goals and aspirations. What really matters.)</p>
                        </div>
                    </div>
                    <div class="row">
                    <p class="col-md-6 m-top-20">
                        We’ll start by giving you a clear and honest picture of your current financial situation: what’s working, and what could be working better. Then, we’ll lay out the goals you told us about. We’ll let you know if you’re on track to reach them. Finally, we’ll give you simple, step-by-step instructions to get you closer to the things you care about—whatever they are.
                    </p>
                    <p class="m-top-20 col-md-12 green-text">
                        Sound good? Great. Let’s get started.
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--==========================
          Financial overview
        ============================-->
    <section id="fin-overview" class="page-break">

        <div class="container">
            <div class="row-title col-md-12">
                <h2>Financial Overview</h2>
            </div>
            <div class="col-md-12 light-grey-bg p-top-20 p-bot-20">
                <div class="col-md-12">
                    <p class="p-top-20"><strong>First things first.</strong>Here’s
                        a quick look at your finances. We’ll get more in-depth
                        later.</p>
                </div>
            </div>
            <div class="col-md-12 m-top-40">
                <h4 class="text-center m-bot-20">Your Financial Wellness
                    Score:</h4>
                <p class="text-center grey-text">This number shows you how
                    likely you are to achieve all your goals </p>
                <p class="text-center grey-text">(on a scale from 1 to 100. A
                    higher number means a better score).</p>

                <div class="clearfix">
                    <div class="col-md-4 col-md-push-4 m-top-40 p-left6">
                        <style>
                            .c100:after { border: 1px solid <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?> }
                        </style>
                        <div class="c100 big p<?php echo $content[ 'wellness' ][ 'wellness_score' ];
                        echo ' color_' . $content[ 'wellness' ][ 'wellness_state_name' ]; ?>"
                             style="border:1px solid <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?>">
                            <span style="color:<?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?> "><?php echo $content[ 'wellness' ][ 'wellness_score' ]; ?></span>
                            <div class="slice">
                                <div class="bar"
                                     style="border: 0.08em solid <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?>"></div>
                                <div class="fill"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-4 col-md-push-4 m-top-20 text-center">
                        <p class="green-text no-m-bottom font18">Wow!</p>
                        <p class="green-text no-m-bottom font18">Nice number you
                            got there.</p>
                        <p class="green-text font18">We’ll help you keep it
                            up.</p>
                    </div>
                </div>
                <div class="col-md-12 m-top-90">
                    <h4 class="text-center">Financial Summary: </h4>

                    <div class="col-md-12 light-grey-bg p-bot-10 m-top-20">
                        <div class="col-md-6 text-right">
                            <div class="col-md-3 col-md-offset-3">
                                <p class="big-line m-top-10">
                            <strong>What I own:</strong>
                                </p>
                            </div>
                            <div class="col-md-4 m-top-10">
                                <p class="big-line">
                            <span style="color: <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?>">
                            <?php echo ($content[ 'balance' ][ 'assets' ] > 0) ? '+ $' . number_format($content[ 'balance' ][ 'assets' ]) : '- $' . number_format($content[ 'balance' ][ 'assets' ]); ?>
                            </span>
                                </p>
                            </div>
                            <div class="col-md-2 m-top-10">
                            <img src="assets/img/arrow-<?php echo ($content[ 'balance' ][ 'assets' ] > 0) ? 'green' : 'red' ;?>.png" alt="" class="img-responsive pull-right">
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 5px">
                            <p class="no-m-bottom">Your assets (like cash and savings) </p>
                            <p class="no-m-bottom">are what you own. </p>
                        </div>
                    </div>

                    <div class="col-md-12 light-grey-bg p-bot-10 m-top-20">
                        <div class="col-md-6 text-right">
                            <div class="col-md-3 col-md-offset-3">
                                <p class="big-line m-top-10">
                                    <strong>What I own:</strong>
                                </p>
                            </div>
                            <div class="col-md-4 m-top-10">
                                <p class="big-line">
                            <span style="color: <?php echo ($content[ 'balance' ][ 'liabilities' ] < 0) ? 'red' : ''; ?>">
                             <?php echo ($content[ 'balance' ][ 'liabilities' ] > 0) ? '+ $' . number_format($content[ 'balance' ][ 'liabilities' ]) : '- $' . number_format((-1) * $content[ 'balance' ][ 'liabilities' ]); ?>
                            </span>
                                </p>
                            </div>
                            <div class="col-md-2 m-top-10">
                                <img src="assets/img/arrow-<?php echo ($content[ 'balance' ][ 'liabilities' ] > 0) ? 'green' : 'red' ;?>.png" alt="" class="img-responsive pull-right">
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 5px">
                            <p class="no-m-bottom">Your liabilities (mortgage, student</p>
                            <p class="no-m-bottom">loans) are what you owe.</p>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="col-md-4">
                            <hr style="background: #F9F9FB; width: 100%; height: 2px; margin: 10px 0;">
                        </div>
                    </div>

                    <div class="col-md-12 light-grey-bg p-bot-10">
                        <div class="col-md-6 text-right">
                            <div class="col-md-3 col-md-offset-3">
                                <p class="big-line m-top-10">
                                    <strong>Net Worth:</strong>
                                </p>
                            </div>
                            <div class="col-md-4 m-top-10">
                                <p class="big-line">
                            <span style="color: <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?>">
                            <?php echo '+ $' . number_format(($content[ 'balance' ][ 'assets' ] + $content[ 'balance' ][ 'liabilities' ])); ?>
                            </span>
                                </p>
                            </div>
                            <div class="col-md-2 m-top-10">
                                <img src="assets/img/arrow-<?php echo ($content[ 'balance' ][ 'assets' ] > 0) ? 'green' : 'red' ;?>.png" alt="" class="img-responsive pull-right">
                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 5px">
                            <p class="no-m-bottom">We find your net worth by subtracting</p>
                            <p class="no-m-bottom">what you owe from what you own.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <p class="text-center grey-text m-top-40 ">Voilà!</p>
        </div>
    </section>



        <!--==========================
          Goals Summary
        ============================-->
    <section id="goal-summary" class="page-break">

    <div class="container">
    <div class="row-title col-md-12">
        <h2>Financial Overview</h2>
    </div>
    <div class="col-md-12 light-grey-bg p-top-20 p-bot-20">
        <div class="col-md-12">
            <p class="p-top-20"><strong>Here’s the important stuff: your goals. </strong></p>
            <p>We talked about which ones matter most to you. Based on that info, we made you this guide. Your goals are color-coded based on priority (high, medium, or low). Priority is also indicated along the side. And your timeline is at the bottom.</p>
        <p>
            For each goal, you’ll see a dollar amount, a slider, and a percentage. The dollar amount represents the total amount of money you’ll need to reach that goal. The slider and the percentage tell you how likely you are to achieve it. Remember: this is all based on your current financial situation. We can help make those percentages higher!
        </p>
        </div>
    </div>
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
                              <?php $is_single = TRUE; ?>
                                <td class="<?php echo $pr_item . "-" . $grid_item; ?>">
                                  <?php foreach ($content[ 'goals_list' ] as $key => $goal_item) {

                                    foreach ($goal_item as $value) {
                                      $period = defineYear($value, $content[ 'person_age' ]);

                                      if ($period == $grid_item && $value[ 'priority' ] == $pr_item) { ?>
                                          <!-- goal item-->
                                          <div class="goal-item tipContainer drag"
                                               id="<?php echo $value[ 'name' ]; ?>"
                                               style="margin-top: <?php echo (!$is_single) ? '45px' : ''; ?>">
                                              <div class="tipContent">
                                                  <div class="goal-icon col-md-5">

                                                      <img src="<?php echo $value[ 'image_url' ] != NULL ? $value[ 'image_url' ] : 'assets/img/' . $key . '.png' ?>"
                                                           alt="">
                                                      <div class="goal-name">
                                                          <strong><?php echo $value[ 'name' ]; ?></strong>
                                                      </div>
                                                  </div>
                                                  <div class="goal-price col-md-7 text-right">
                                                      <strong><?php echo $value[ 'amount' ] ? numberFormatK($value[ 'amount' ]) : ''; ?></strong>
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
                                                        <?php echo (isset($value[ 'achievability' ])) ? $value[ 'achievability' ] . '% Likelihood' : ''; ?>
                                                      </strong>
                                                  </div>
                                              </div>
                                          </div>
                                          <!--end of goal item-->
                                        <?php $is_single = FALSE; ?>
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
                                      <div class="col-md-12">
                                          <strong><?php echo $grid_item; ?></strong>
                                      </div>
                                  </td>
                              <?php } ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container m-top-20">
            <div class="col-md-12">
            <strong><i class="fa fa-question-circle"></i> Likelihood
                Scores</strong>
            </div>
            <p class="text-muted col-md-7">These are based on WTI Technology and predict
                how likely you are to
                achieve your goals at specific milestones throughout your
                life</p>
            <p class="col-md-5 text-right">
                <strong>Page 5</strong>
            </p>
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
                <p>Let’s get to work! Here are some steps you can take right now to get you closer to meeting your goals.</p>
            </div>
            <div class="col-md-12 grey-bordered">

                <div class="col-md-6">
                    <h4 class="green-title">Transfer Funds</h4>
                    <p>Each month, we’ll recommend that you transfer funds between your accounts to keep your money working for you.</p>
                    <p class="m-top-40"><strong>For <?php echo date("F")?>, we recommend:</strong></p>
                    <div class="grey-bg col-md-11 m-top-40">
                        <div class="step col-md-3">1</div>
                        <div class="col-md-9 sub-title-2 m-bot-20">
                            <h4 class="">WITHDRAW FUNDS</h4>
                        </div>
                      <?php foreach ($content[ 'with_draw' ][ 'withdraw' ] as $draw_item) { ?>
                          <div class="col-md-3">
                              <div class="row">

                                  <strong><?php echo '$' . number_format($draw_item[ 'withdraw' ]); ?></strong>
                              </div>
                          </div>
                          <div class="col-md-9 sub-title-2">
                              <div class="row">
                                  <strong><?php echo $draw_item[ 'withdraw_name' ]; ?></strong>
                                  <p>(annual amount: $10k)</p>
                              </div>
                          </div>
                      <?php } ?>

                    </div>
                    <div class="col-md-1 m-top-20 padd-container">
                        <img src="assets/img/arrow-right.PNG" alt=""
                             class="center-block">
                    </div>

                </div>
                <div class="col-md-6">

                    <div class="grey-bg col-md-11 m-top-90">
                        <div class="step col-md-3">2</div>
                        <div class="col-md-9 sub-title-2 m-bot-20">
                            <h4 class="">PAYOFF DEBT</h4>
                        </div>
                      <?php if (!empty($content[ 'with_draw' ][ 'deposit' ])) { ?>
                        <?php foreach ($content[ 'deposit' ] as $depositItem) { ?>
                              <div class="col-md-3">
                                  <div class="row">
                                      <strong><?php echo $depositItem[ 'deposit' ]; ?></strong>
                                  </div>
                              </div>
                              <div class="col-md-9 sub-title-2">
                                  <div class="row">
                                      <p>
                                          <strong><?php echo $depositItem[ 'deposit_name' ]; ?></strong>
                                          <span>ending 0078</span></p>
                                  </div>
                              </div>
                        <?php }
                      }
                      else { ?>
                          <div class="col-md-3">
                              <div class="row">

                              </div>
                          </div>
                          <div class="col-md-9 sub-title-2">
                              <div class="row">
                                  <p>Well done!
                                  </p>
                                  <p>No deposits necessary.</p>
                              </div>
                          </div>
                      <?php } ?>
                    </div>


                    <div class="grey-bg col-md-11 m-top-20">
                        <div class="step col-md-3">3</div>
                        <div class="col-md-9 sub-title-2 m-bot-20">
                            <h4 class="">SAVE AND INVEST</h4>
                        </div>
                      <?php if (!empty($content[ 'with_draw' ][ 'save' ])) { ?>
                        <?php foreach ($content[ 'with_draw' ][ 'save' ] as $saveItem) { ?>
                              <div class="col-md-3">
                                  <div class="row">
                                      <strong><?php echo '$' . number_format($saveItem[ 'save' ]); ?></strong>
                                  </div>
                              </div>
                              <div class="col-md-9 sub-title-2">
                                  <div class="row">
                                      <p>
                                          <strong><?php echo $saveItem[ 'save_name' ]; ?></strong>
                                          <span>(annual amount: $10k)</span></p>
                                  </div>
                              </div>
                        <?php }
                      } else { ?>

                          <div class="col-md-3">
                              <div class="row">

                              </div>
                          </div>
                          <div class="col-md-9 sub-title-2">
                              <div class="row">
                                  <p>Well done!</p>
                                  <p>No invests necessary.</p>
                              </div>
                          </div>
                      <?php } ?>
                    </div>
                </div>
                    <div class="col-md-12 m-top-60">
                    <div class="col-md-6">
                        <strong><i class="fa fa-question-circle"></i> Why don’t
                            these numbers balance?</strong>
                        <p class="text-muted">We have excluded income and
                            spending from this
                            equation as these are not actionable suggestions</p>
                    </div>
                    <div class="col-md-6">
                        <strong><i class="fa fa-question-circle"></i> Will this really make a difference?</strong>
                        <p class="text-muted">Yes! These numbers may look small, but compounding is a powerful tool.</p>
                    </div>
                    </div>

            </div>
        </div>
        <div class="container m-top-40">
            <div class="half-block">
                <div class="col-md-12">
                    <h4 class="green-title">Trim Everyday Expenses</h4>
                    <p>We’ll help you keep an eye on your spending.
                    </p>
                    <div class="col-md-6">
                        <div class="row">
                            <h4 class="sub-title-2">MAINTAIN</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-9 pinked-bg">
                            <?php if(!empty($content[ 'expenses' ])){?>
                            <strong><?php echo '$' . $content[ 'expenses' ] . '/month'; ?></strong>
                            <p>
                                Discretionary
                                Expenses
                            </p>
                            <?php } else {?>
                                <p>
                                    Nice! Keep it up.
                                </p>
  <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="middle-block">
                <div class="col-md-12"></div>
            </div>
            <div class="half-block">
                <div class="col-md-12">
                    <h4 class="green-title">Make Smart Investments</h4>
                    <p>Adjust your accounts to balance long term growth and conservative income-generating assets.</p>
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
                  <?php foreach ($content[ 'risks' ] as $riskItem) { ?>
                      <div class="col-md-6">
                          <div class="row">
                              <strong>
                                <?php echo $riskItem[ 'name' ]; ?>
                              </strong>
                              <p>
                                  <small>Name of Account</small>
                              </p>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="row risk-values">
                              <div style="width: <?php echo $riskItem[ 'value' ] . '%' ?>; background: #A074CC; height: 10px; border-radius: 5px; float: left"></div>
                              <div style="width: <?php echo (100 - $riskItem[ 'value' ]) . '%' ?>; background: #CB81B2; height: 10px; border-radius: 5px; float: left"></div>
                          </div>
                      </div>
                  <?php } ?>

                </div>
            </div>
            <div class="col-md-12 m-top-40">
                <p class="text-right"><strong>Page 5</strong></p>
            </div>
        </div>
    </section>

    <!--==========================
      Tips
    ============================-->
    <section id="tips" class="page-break">
        <div class="container">
            <div class="col-md-10 padd-container">
                <div class="section-title">
                    <h3 class="text-left"><span><img src="assets/img/tips.PNG"
                                                     alt="" class=""></span>
                        Tips to improve your finances
                    </h3>
                </div>
                <div class="col-md-12">
                    <p class="sub-title-3 m-bot-20">Consider Alternatives:
                        <strong>
                            Changing your goals</strong> as life unfolds
                    </p>
                    <p>By considering alternative scenarios, you may make it
                        more
                        likely that you can reach the goals most
                        important to
                        you. These examples compare the likelihood for meeting
                        each
                        of your goals with a new prediction if you
                        decide
                        to change your goals accordingly.</p>
                </div>
            </div>
            <div class="col-md-2 light-grey-bg">
                <div class="col-md-11 text-center m-top-40">
                <p>Your Financial Wellness Score:</p>
                </div>
                <div class="">
                    <div class="m-top-40 p-left6">
                        <style>
                            .c100:after { border: 1px solid <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?> }
                        </style>
                        <div class="c100 p<?php echo $content[ 'wellness' ][ 'wellness_score' ];
                        echo ' color_' . $content[ 'wellness' ][ 'wellness_state_name' ]; ?>"
                             style="border:1px solid <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?>">
                            <span style="color:<?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?> "><?php echo $content[ 'wellness' ][ 'wellness_score' ]; ?></span>
                            <div class="slice">
                                <div class="bar"
                                     style="border: 0.08em solid <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?>"></div>
                                <div class="fill"></div>
                            </div>
                        </div>
                    </div>
                </div>
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
            <div class="col-md-12 m-top-40">
                <p class="text-right"><strong>Page 6</strong></p>
            </div>
        </div>
    </section>

    <!--==========================
      Tips to improve
    ============================-->
    <section id="tip" class="page-break">
        <div class="container">
            <div class="col-md-10 padd-container">
                <div class="section-title">
                    <h3 class="text-left"><span><img src="assets/img/tips.PNG"
                                                     alt="" class=""></span>
                        Tips to improve your finances
                    </h3>
                </div>
                <div class="col-md-12">
                    <p class="sub-title-3 m-bot-20 font18">Other Potential <strong>
                            Tradeoffs :</strong> More ways to get there
                    </p>
                    <p>Your goals make a good team. And adjusting your expectations can help them work together. Let’s look at how your ability to meet all your goals can change when you’re flexible about some of them.
                </div>
            </div>
            <div class="col-md-2 light-grey-bg">
                <div class="col-md-11 text-center m-top-40">
                    <p>Your Financial Wellness Score:</p>
                </div>
                <div class="">
                    <div class="m-top-40 p-left6">
                        <style>
                            .c100:after { border: 1px solid <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?> }
                        </style>
                        <div class="c100 p<?php echo $content[ 'wellness' ][ 'wellness_score' ];
                        echo ' color_' . $content[ 'wellness' ][ 'wellness_state_name' ]; ?>"
                             style="border:1px solid <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?>">
                            <span style="color:<?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?> "><?php echo $content[ 'wellness' ][ 'wellness_score' ]; ?></span>
                            <div class="slice">
                                <div class="bar"
                                     style="border: 0.08em solid <?php echo $content[ 'wellness' ][ 'wellness_state' ]; ?>"></div>
                                <div class="fill"></div>
                            </div>
                        </div>
                    </div>
                </div>
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
            <div class="col-md-12 m-top-40">
                <p class="text-right"><strong>Page 7</strong></p>
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
                    <p class="sub-title-3 m-bot-20 font18">"What if"? The effects of
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
            <div class="col-md-12 m-top-40">
                <p class="text-right"><strong>Page 8</strong></p>
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
            <div class="col-md-12 m-top-40">
                <p class="text-right"><strong>Page 9</strong></p>
            </div>
        </div>
    </section>

    <!--==========================
         Financial Summary
       ============================-->
    <section id="fin-summary" class="page-break">
        <div class="container padd-container ">
            <div class="section-title">
                <div class="col-md-12 m-top-40">
                    <div class="row">
                        <h1 id="header-title" class="border-bottom-grey"
                            style="border-color: #000">Finally, your Financial
                            Summary</h1>
                        <div class="light-grey-bg p-20">
                            <p><strong>We’re almost done!</strong> But before we
                                go, let’s take a closer look at your current
                                financial situation.</p>
                            <p>
                                We put this all together based on the info you
                                gave us. Check out your net worth and your
                                monthly cash flow. These numbers will give you a
                                good idea of where you’re doing well and where
                                you might want to improve.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 m-top-20">
                <div class="row">
                    <div class="pull-left grey-bordered-custom ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="green-bg-title">
                                <h2 class="col-md-12">Net Worth</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12">
                                <p class="col-md-12 p-top-10">
                                    Your Net Worth is the difference between
                                    yourassets (what you own) and liabilities
                                    (what you owe).
                                </p>
                                <h4 class="col-md-12 table-name">Assets</h4>
                                    <div class="col-md-12">
                                <table class="table-responsive" width="100%">
                                    <tr>
                                        <td></td>
                                        <td>Value</td>
                                        <td>Liquid Value</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Cash</strong></td>
                                        <td>$5,000</td>
                                        <td>$5,000</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Education</strong></td>
                                        <td>$5</td>
                                        <td>$0</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Investments</strong></td>
                                        <td>$5,000</td>
                                        <td>$5,000</td>
                                    </tr>
                                    <tr>
                                        <td><strong>TOTAL</strong></td>
                                        <td><strong style="color:#4FD3B1">$1,185,001</strong></td>
                                        <td><strong style="color:#4FD3B1">$1,185,001</strong></td>

                                    </tr>
                                </table>
                                    </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right grey-bordered-custom ">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="green-bg-title">
                                    <h2 class="col-md-12">Cash Flow</h2>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <p class="col-md-12 p-top-10">
                                        Your Net Worth is the difference between
                                        yourassets (what you own) and liabilities
                                        (what you owe).
                                    </p>
                                    <h4 class="col-md-12">Assets</h4>
                                    <div class="col-md-12">
                                        <table class="table-responsive" width="100%">
                                            <tr>
                                                <td></td>
                                                <td>Value</td>
                                                <td>Liquid Value</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Cash</strong></td>
                                                <td>$5,000</td>
                                                <td>$5,000</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Education</strong></td>
                                                <td>$5</td>
                                                <td>$0</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Investments</strong></td>
                                                <td>$5,000</td>
                                                <td>$5,000</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 m-top-40">
                    <p class="text-right"><strong>Page 10</strong></p>
                </div>
            </div>
    </section>


<?php render('_footer') ?>