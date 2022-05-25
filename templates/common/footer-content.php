<footer class="k-19">
  <div class="container">
    <div class="content-wrapper">
        <div class="col third-block">
            <?php
            if($post->post_title != 'Money 20/20 Sunday Summit'):
            // if ( !is_single() && 'post' != get_post_type() && basename(get_permalink()) != 'blog' && basename(get_permalink()) != 'channel-partners') : ?>
            <ul>
                <li class="main-link pl-md-2">Subscribe to blog</li>
            </ul>
            <!--        <p><small>No sales. No spam. Just a weekly roundup of fraud-fighting news and resources from Kount.</small></p>-->
            <p class="pt-3"><?php print do_shortcode('[button link="https://go.kount.com/blog-subscription.html"]Subscribe now[/button]');?></p>
            <!--        --><?php //if(!is_front_page()): ?>
            <!--        <div class="form-wrapper">-->
            <!--          <iframe width="100%" height="100" src="/wp-content/themes/kount/external/pages/blog-subscribe-form.php" style="border: 0; overflow: hidden;"></iframe>-->
            <!--        </div>-->
            <!--        --><?php //endif; ?>
            <?php
            endif; ?>
        </div>
        <div class="col second-block">
        <p class="pb-2"><strong>Quick Links</strong></p>
        <ul class="about-link">
          <li><a href="/about/contact/">Contact Us</a></li>
          <li><a href="https://portal.kount.net">Login</a></li>
          <li><a href="https://support.kount.com/">Support Center</a> </li>
          <li><a href="/pricing">Pricing</a></li>
          <li><a href="https://support.kount.com/hc/en-us/sections/360008901712-Integration">Developers</a></li>
        </ul>
        <ul class="resource-link">
          <li><a href="/about/news-room/">In the News</a></li>
          <li><a href="/about/press/">Pressroom</a></li>
          <li><a href="/glossary-of-fraud-terms/">Glossary</a></li>
          <li><a href="/about/careers/">Careers</a></li>
        </ul>
      </div>
        <div class="col first-block">
            <div class="logo-box">
                <a href="/"><img class="lazyload" width="132" height="43" data-src="/wp-content/themes/kount/templates/dist/images/logo.svg" alt="kount logo"></a>
            </div>
            <p>&copy; <?php echo date('Y'); ?>, Equifax Inc., Atlanta, Georgia. All Rights Reserved.</p>
            <ul class="term-link">
                <li><a href="/legal/terms-of-use">Terms of Use</a></li>
                <li><a href="/legal/compliance">Compliance</a></li>
                <li><a href="/legal/privacy-policy">Privacy Policy</a></li>
                <li><a href="/legal/privacy">Privacy</a></li>
                <li><a href="/sitemap_index.xml">Site Map</a></li>
            </ul>

            <ul class="social-link">
                <li><a href="https://twitter.com/kountinc"><span class="sr-only">Twitter</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.23" height="12.377" viewBox="0 0 15.23 12.377">
                            <title>Twitter</title>
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #2f3640
                                    }
                                </style>
                            </defs>
                            <path id="Twitter"
                                  d="M18.8 11.791a6.217 6.217 0 0 1-1.795.492 3.13 3.13 0 0 0 1.374-1.729 6.255 6.255 0 0 1-1.984.759 3.127 3.127 0 0 0-5.324 2.85A8.872 8.872 0 0 1 4.634 10.9a3.129 3.129 0 0 0 .966 4.17 3.116 3.116 0 0 1-1.415-.391v.04a3.127 3.127 0 0 0 2.507 3.064 3.142 3.142 0 0 1-.823.109 3.1 3.1 0 0 1-.588-.056A3.128 3.128 0 0 0 8.2 20.005 6.305 6.305 0 0 1 3.574 21.3a8.886 8.886 0 0 0 13.68-7.486q0-.2-.009-.4a6.329 6.329 0 0 0 1.555-1.623z"
                                  class="cls-1" transform="translate(-3.574 -10.326)"/>
                        </svg>
                    </a></li>
                <li><a href="https://www.facebook.com/kountinc"><span class="sr-only">Facebook</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="6.94" height="14.936" viewBox="0 0 6.94 14.936">
                            <title>Facebook</title>
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #2f3640
                                    }
                                </style>
                            </defs>
                            <path id="Facebook"
                                  d="M24.922 10.932h-2.363v-1.55a.631.631 0 0 1 .658-.718h1.668V6.1l-2.3-.009a2.909 2.909 0 0 0-3.13 3.13v1.706h-1.473v2.637h1.475v7.462h3.1v-7.457h2.093z"
                                  class="cls-1" transform="translate(-17.982 -6.096)"/>
                        </svg>
                    </a></li>
                <li><a href="https://www.instagram.com/kountinc/"><span class="sr-only">Instagram</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15.334" height="15.334" viewBox="0 0 15.334 15.334">
                            <title>Instagram</title>
                            <defs>
                                <style>
                                    .cls-1 {
                                        fill: #2f3640
                                    }
                                </style>
                            </defs>
                            <path id="Instagram"
                                  d="M1424.514-634.665a4.513 4.513 0 0 1-3.215-1.206 4.449 4.449 0 0 1-1.3-3.308v-6.338a4.235 4.235 0 0 1 4.483-4.483h6.369a4.4 4.4 0 0 1 3.246 1.267 4.432 4.432 0 0 1 1.237 3.215v6.369a4.425 4.425 0 0 1-1.268 3.277 4.565 4.565 0 0 1-3.246 1.206zm-2.257-13.109a3.081 3.081 0 0 0-.835 2.257v6.338a3.106 3.106 0 0 0 .835 2.288 3.2 3.2 0 0 0 2.257.8h6.307a3.2 3.2 0 0 0 2.257-.8 3.021 3.021 0 0 0 .9-2.257v-6.369a3.189 3.189 0 0 0-.835-2.226 3.082 3.082 0 0 0-2.257-.835h-6.369a3.144 3.144 0 0 0-2.26.804zm1.453 5.41a3.965 3.965 0 0 1 3.957-3.957 3.985 3.985 0 0 1 3.957 3.957 3.965 3.965 0 0 1-3.957 3.957 3.945 3.945 0 0 1-3.957-3.957zm1.422 0a2.547 2.547 0 0 0 2.535 2.535 2.547 2.547 0 0 0 2.535-2.535 2.547 2.547 0 0 0-2.535-2.535 2.547 2.547 0 0 0-2.535 2.535zm5.751-4.05a.9.9 0 0 1 .9-.9.9.9 0 0 1 .9.9.9.9 0 0 1-.9.9.9.9 0 0 1-.9-.9z"
                                  class="cls-1" transform="translate(-1420 650)"/>
                        </svg>
                    </a></li>
                <li><a href="https://www.linkedin.com/company/kount"><span class="sr-only">LinkedIn</span>
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="16px" height="16px" viewBox="0 0 430.117 430.117"
                             style="enable-background:new 0 0 430.117 430.117;"
                             xml:space="preserve">
                <title>LinkedIn</title>
                            <g>
                                <path id="LinkedIn" d="M430.117,261.543V420.56h-92.188V272.193c0-37.271-13.334-62.707-46.703-62.707
		c-25.473,0-40.632,17.142-47.301,33.724c-2.432,5.928-3.058,14.179-3.058,22.477V420.56h-92.219c0,0,1.242-251.285,0-277.32h92.21
		v39.309c-0.187,0.294-0.43,0.611-0.606,0.896h0.606v-0.896c12.251-18.869,34.13-45.824,83.102-45.824
		C384.633,136.724,430.117,176.361,430.117,261.543z M52.183,9.558C20.635,9.558,0,30.251,0,57.463
		c0,26.619,20.038,47.94,50.959,47.94h0.616c32.159,0,52.159-21.317,52.159-47.94C103.128,30.251,83.734,9.558,52.183,9.558z
		 M5.477,420.56h92.184v-277.32H5.477V420.56z" fill="2f3640"/>
                            </g>

</svg>
                    </a></li>
                <li><a href="https://www.youtube.com/user/KountInc"><span class="sr-only">YouTube</span>
                        <svg version="1.1" id="Capa_2" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 512 512" height="20px"
                             width="20px" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                <title>YouTube</title>
                            <g>
                                <g>
                                    <path d="M490.24,113.92c-13.888-24.704-28.96-29.248-59.648-30.976C399.936,80.864,322.848,80,256.064,80
			c-66.912,0-144.032,0.864-174.656,2.912c-30.624,1.76-45.728,6.272-59.744,31.008C7.36,138.592,0,181.088,0,255.904
			C0,255.968,0,256,0,256c0,0.064,0,0.096,0,0.096v0.064c0,74.496,7.36,117.312,21.664,141.728
			c14.016,24.704,29.088,29.184,59.712,31.264C112.032,430.944,189.152,432,256.064,432c66.784,0,143.872-1.056,174.56-2.816
			c30.688-2.08,45.76-6.56,59.648-31.264C504.704,373.504,512,330.688,512,256.192c0,0,0-0.096,0-0.16c0,0,0-0.064,0-0.096
			C512,181.088,504.704,138.592,490.24,113.92z M192,352V160l160,96L192,352z" fill="#2f3640"/>
                                </g>
                            </g>
</svg>

                    </a></li>
            </ul>
        </div>

    </div>
  </div>
<!--  <div class="mobile">-->
<!--    <ul class="term-link">-->
<!--      <li><a href="/legal/terms-of-use">Terms of Use</a></li>-->
<!--      <li><a href="/legal/compliance">Compliance</a></li>-->
<!--      <li><a href="/legal/privacy-policy">Privacy Policy</a></li>-->
<!--      <li><a href="/legal/privacy">Privacy</a></li>-->
<!--      <li><a href="/site-map">Site Map</a></li>-->
<!--    </ul>-->
<!--    <p>&copy; --><?php //echo date('Y'); ?><!--, Equifax Inc., Atlanta, Georgia. All Rights Reserved.</p>-->
<!--  </div>-->
</footer>

<div class="we-video-overlay">
  <div class="video-overlay">
    <div class="v-middle-inner">
      <div class="v-middle">
        <div class="video-container">
          <iframe title="Video Overlay iframe" width="800" height="600" src="about:blank" style="border:0;"></iframe>
          <div class="close-video">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>