<?php include 'common/variables.php' ?>
<section class="scroll-nav bg-light-gray">
  <div class="outer-wrap">
    <div class="container">

      <div class="row m-0">
        <div class="col-12">
          <div class="navigation" role="navigation">
            <button>
              <span>
                            <?php foreach ($items as $item):
                              echo $item['text'];
                              break;
                            endforeach; ?>
                            </span></button>
            <div class="scroll-wrap">
              <ul>
                <?php if (have_rows('items')) :
                  we_print_scroll($items);
                endif; ?>
              </ul>
              <?php we_print_button($button); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>