<section class="statistics<?php if(is_front_page()) { echo ' homepage';}?>">
  <div class="container wide">
    <div class="column-wrapper d-flex justify-content-center flex-wrap">
      <?php
      $circleStats = get_sub_field('circle_stats');
      if(count($circleStats) > 0):
        foreach($circleStats as $stat):
      ?>
        <div class="col wow fadeIn">
          <div class="progress">
            <div class="v-middle-inner">
              <div class="v-middle">
                <div class="value" style="color: #<?php print $stat['color'];?>"><?php print $stat['big_number'];?></div>
                <p><?php print $stat['text_underneath'];?></p>
              </div>
            </div>
          </div>
        </div>
      <?php
          endforeach;
      else:
      ?>
      <div class="col-two">
        <div class="col circle-one wow fadeInUp">
          <div class="progress ">
            <svg>
              <circle class="outer" cx="90" cy="100" r="95" transform="rotate(-90, 95, 95)"></circle>
            </svg>
            <div class="v-middle-inner">
              <div class="v-middle">
                <div class="value"><span class="counter">6,500</span>+
                </div>
                <p>Customers</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col circle-two wow fadeInUp">
          <div class="progress">
            <svg>
              <circle class="outer" cx="90" cy="100" r="95" transform="rotate(-90, 95, 95)"></circle>
            </svg>
            <div class="v-middle-inner">
              <div class="v-middle">
                <div class="value"><span class="counter">180</span>
                </div>
                <p>Countries</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col circle-three wow fadeInUp">
          <div class="progress">
            <svg>
              <circle class="outer" cx="90" cy="100" r="95" transform="rotate(-90, 95, 95)"></circle>
            </svg>
            <div class="v-middle-inner">
              <div class="v-middle">
                <div class="value"><span class="counter">0.3</span>s
                </div>
                <p>Decision Time</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col circle-four wow fadeInUp">
          <div class="progress">
            <svg>
              <circle class="outer" cx="90" cy="100" r="95" transform="rotate(-90, 95, 95)"></circle>
            </svg>
            <div class="v-middle-inner">
              <div class="v-middle">
                <div class="value">$<span class="counter">125</span>B+</div>
                <p>Processed<br>Annually</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-two">
        <div class="content">
        <h2>Proof In Numbers</h2>
      </div>
      </div>
      <?php
      endif;
      ?>
    </div>
  </div>
  <div class="side-pattern wow fadeInLeftTop">
    <img src="<?php print REFRESH_DIR ?>/templates/dist/images/svg/side-pattern.svg" alt="side pattern">
  </div>
</section>