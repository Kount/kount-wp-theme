<?php

///if (strlen($post->post_content)) {
if (get_post_type() == 'post') {
  get_template_part('templates/components/single-page/blog-detail');
} elseif (get_post_type() == 'news') {
  get_template_part('templates/components/single-page/news-detail');
} elseif (get_post_type() == 'video') {
  get_template_part('templates/components/single-page/video-detail');
} elseif (get_post_type() == 'ebook') {
  get_template_part('templates/components/single-page/ebook-detail');
} elseif (get_post_type() == 'casestudy') {
  get_template_part('templates/components/single-page/case-study-detail');
} elseif (get_post_type() == 'industryreport') {
  get_template_part('templates/components/single-page/industry-report-detail');
} elseif (get_post_type() == 'kountreport') {
  get_template_part('templates/components/single-page/kount-report-detail');
} elseif (get_post_type() == 'vendorreport') {
  get_template_part('templates/components/single-page/vendor-report-detail');
} elseif (get_post_type() == 'whitepaper') {
  get_template_part('templates/components/single-page/whitepaper-detail');
} elseif (get_post_type() == 'webinar') {
  get_template_part('templates/components/single-page/webinar-detail');
} elseif (get_post_type() == 'events') {
  get_template_part('templates/components/single-page/event-detail');
}elseif (get_post_type() == 'career') {
  get_template_part('templates/components/single-page/career-detail');
}elseif (get_post_type() == 'management') {
  get_template_part('templates/components/single-page/management-detail');
}elseif (get_post_type() == 'board') {
  get_template_part('templates/components/single-page/board-detail');
}elseif (get_post_type() == 'glossary') {
  get_template_part('templates/components/single-page/glossary-detail');
}


//}

$field = 'components';

while (have_rows($field)) {
  the_row();

  $layout = get_row_layout();
  error_log('$layout = ' . $layout);

  // If the layout is a view
  if (in_array($layout, ['view'])) {
    $view = get_sub_field('view');
    error_log('$view = ' . $view);
    @include(THEME_DIR . "/templates/components/view/$view.php");
  } elseif (in_array($layout, ['reference'])) {
    $reference = get_sub_field('reference');
    @include(THEME_DIR . "/templates/components/reference/$reference.php");
  } elseif (in_array($layout, ['tbd'])) {
    $tbd = get_sub_field('tbd');
    @include(THEME_DIR . "/templates/components/tbd/$tbd.php");
  }
  @include(THEME_DIR . "/templates/components/common/variables.php");
  @include(THEME_DIR . "/templates/components/$layout.php");
}
?>