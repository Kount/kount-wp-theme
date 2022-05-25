<?php
$sectionEmbed = get_sub_field('section_display', get_the_ID());
if($sectionEmbed != '') {
    @include(THEME_DIR . "/templates/components/options/" . $sectionEmbed . ".php");
}
//@include(THEME_DIR . "/templates/components/options/featured_resources.php");
//@include(THEME_DIR . "/templates/components/options/interactive_analyst_logos.php");