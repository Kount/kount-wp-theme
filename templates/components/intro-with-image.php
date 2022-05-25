<section class="intro-with-image" id="architecture">
    <div class="pattern wow fadeInLeft pattern-left">
        <img src="/wp-content/themes/kount/templates/dist/images/blue-pentagon.png" alt="" role="presentation">
    </div>
    <div class="container">
        <div class="intro-block wow fadeInUp">
            <?php
            $intro = get_sub_field('intro_block');
            foreach ($intro as $intro):
                ?>
                <div class="intro-block">
                    <?php if ($intro['title']): ?><h2><?php print $intro['title']; ?></h2><?php endif; ?>
                    <?php if ($intro['body']): ?><?php print $intro['body']; ?><?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>