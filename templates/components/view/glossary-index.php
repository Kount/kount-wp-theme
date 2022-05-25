<?php
$args = array('post_type' => 'glossary', 'posts_per_page' => -1, 'order_by' => 'post_title', 'order' => 'asc');
$letters = array();
$glossary_terms = get_posts($args);
$definition_list = "";
foreach($glossary_terms as $glossary_term) {
  $first_letter = strtoupper($glossary_term->post_name[0]);
  if(!in_array($first_letter, $letters)) {
    $letters[] = $first_letter;
  }
}
?>

<section class="glossary-filter bg-light border-bottom<?php if(is_single()){ print ' border-top'; }?>">
  <div class="container row">
    <div class="input-wrapper col-md-3 pr-md-4 border-md-right pb-3 pb-md-0">
      <label for="search-glossary" class="pb-1">Search for Glossary Terms</label>
      <input type="text" id="search-glossary" name="search_glossary" placeholder="Start typing..." />
    </div>
    <div class="col-md-9 pl-md-3">
      <div class="ml-0 ml-md-1 pb-1">Or Find By Index</div>
      <ul class="text-center letters" id="letters">
        <?php
        foreach($letters as $letter):
          ?>
          <li<?php if($letter == 'A'): print ' class="active"'; endif;?>><a href="#" class="letter-link" data-letter="<?php print $letter;?>"><?php print $letter;?></a></li>
        <?php
        endforeach;
        ?>
      </ul>
    </div>
  </div>
</section>

<section class="glossary-index-wrapper">
  <div class="container">
    <dl id="definition-list"></dl>
    <div class="ajax-loader text-center py-5" id="ajax-loader" style="display: none;"><img src="/wp-content/themes/kount/templates/dist/images/ajax-loader.gif" alt="Loading..." width="25"></div>

  </div>
</section>

<?php
//@include(THEME_DIR . "/templates/components/ajax/glossary-ajax.php");
?>
