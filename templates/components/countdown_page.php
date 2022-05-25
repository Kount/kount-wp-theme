<?php
$content = get_sub_field('content');
$countdown_shortcode = get_sub_field('countdown_shortcode');
$image_id = get_sub_field('image');
$marketo_form_id = get_sub_field('marketo_form_id');
?>
<div class="countdown-page-wrapper">
  <section class="countdown-content">
    <div class="container">
      <div class="content-wrapper">
        <h1 class="text-center pt-2 pb-3 wow fadeIn"><?php echo $title;?> <?php echo $content;?>
        </h1>
        <div class="circle-content wow fadeIn" data-wow-delay="0.4s">
          <h2 class="text-center pb-4 wow fadeIn launch-date">March 17, 2020</h2>
          <?php echo do_shortcode($countdown_shortcode);?>
        </div>
      </div>
    </div>
  </section>
  <?php
  if($countdown_shortcode != '') {
    ?>
  <section class="form-wrapper">
    <div id="get-updates" class="wow fadeIn" data-wow-delay="0.4s">
      <script src="//app-sj27.marketo.com/js/forms2/js/forms2.min.js"></script>
      <form id="mktoForm_<?php echo $marketo_form_id;?>"></form>
      <script>MktoForms2.loadForm("//app-sj27.marketo.com","106-ANF-483",<?php echo $marketo_form_id;?>, function(form){
          form.onSuccess(function(values,followUpUrl){
            var message="<p class='h6 text-center'><strong>Thanks. We'll keep you posted.</strong></p>";
            jQuery("#get-updates").html(message);
            return false;
          })
        });
      </script>
    </div>
  </section>
<?php
}
?>
</div>

