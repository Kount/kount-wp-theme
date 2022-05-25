<style>
  .list-of-pages li {
    font-size: 1em;
    line-height: 1.4;
    margin-bottom: 5px;
  }
  .list-of-pages a {
    color: blue !important;
  }
  .list-of-pages .dev:after {
    content: ' (Development in progress)';
    color: orangered;
  }
  .list-of-pages .qa-in-prorgress-by-dev-team:after {
    content: ' (QA in prorgress by Dev Team)';
    color: green;
  }
  .list-of-pages .responsive-qa-ready-for-naro:after {
    content: ' (Responsive QA ready for Naro)';
    color: orange;
  }
  .list-of-pages .waiting:after {
    content: ' (Waiting for content)';
    color: #a4d234;
  }
  .list-of-pages .qa-in-progress:after {
    content: ' (QA in progress)';
    color: orange;
  }
  .list-of-pages .ready:after {
    content: ' (Html is done. Waiting for content)';
    color: #05A5D1;
  }
  .list-of-pages .page-delivered:after {
    content: ' (Page delivered)';
    color: green;
  }
  .list-of-pages .page-done:after {
    content: ' (Page Done)';
    color: #00d600;
  }
  .list-of-pages .waiting-for-final-design:after {
    content: ' (Waiting for final design)';
    color: #6f6d80;
  }
  .list-of-pages .content-entry-in-progress:after {
    content: ' (Content entry in progress)';
    color: #6f6d80;
  }
</style>
<section class="list-of-pages">
  <div class="container">
    <!--
    /*
     * Classes:
     *  dev - Development in progress
     *  qa-in-prorgress-by-dev-team - QA in prorgress by Dev Team
     *  responsive-qa-ready-for-naro - Responsive QA ready for Naro
     *  page-done - Page Done
     *  content-entry-in-progress - Content entry in progress
     *  waiting - Waiting for content
     *  waiting-for-final-design - Waiting for final design
     *  qa-in-progress - QA in progress
     *  ready - Html is done. Waiting for content
     */
    -->

    <h4>Template links</h4>
    <ol>
      <?php foreach ($items['pages'] as $page):?>
          <li class="<?php print $page['class']; ?>">
            <a href="/templates/index.php?page=<?php print $page['file']; ?>"><?php print $page['name']; ?></a>
          </li>
      <?php endforeach;?>
    </ol>


  </div>
</section>
