<section class= "simple-content">
  <div class= "container">
    <div class="content-wrap wow fadeInUp">
<!--      <p>-->
<!--        You may have heard that a cache of 770 million email addresses and passwords was discovered recently on a popular hacking site.-->
<!--        “The Guardian” reported on the discovery of the largest collection of breached data published to date in their January 17 article.-->
<!--        Discovered by security researcher Troy Hunt, who runs the Have I Been Pwned breach-notification service, the collection is a compilation-->
<!--        of data breaches from thousands of different sources. In the article, Troy says, “In total, there are 1,160,253,228 unique combinations of-->
<!--        email addresses and passwords, and . . . 21,222,975 unique passwords.”-->
<!--      </p>-->
<!--      <p>-->
<!--        We don’t want to feed fear by building on a consumer identity apocalypse narrative, but it does raise an important point: Account takeover-->
<!--        protection is complex, and more than ever, essential.-->
<!--       </p>-->
<!--      <p>-->
<!--        Loyalty programs that ask users to log in with personal details are a powerful means for companies to engage customers and welcome them back,-->
<!--        again and again. However, it only takes one fraudulent “incident” to ruin that hard-won trust.-->
<!--      </p>-->
<!--      <div class="img-box">-->
<!--        <img src="/wp-content/uploads/2019/02/Account_Takeover.jpg" alt="image">-->
<!--      </div>-->
        <?php
        $content = apply_filters('the_content', $post->post_content);
        ?>
        <?php print $content; ?>
    </div>
  </div>
</section>