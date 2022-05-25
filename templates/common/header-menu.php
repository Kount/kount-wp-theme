<?php
$show_demo_request_form = get_field('show_demo_request_form', get_the_ID());
?>
<header class="k-19<?php if($show_demo_request_form):?> hide-nav<?php endif;?>">
<!--    <div class="header-search-section">-->
<!--        <div id="top-searchbar">-->
<!--          --><?php //print // do_shortcode('[yext_searchbar]'); ?>
<!--        </div>-->
<!--    </div>-->
    <div class="top-nav desktop">
        <div class="container wide">
            <ul>
                <li>Sales <a href="tel:18669192167" class="link">1.866.919.2167</a></li>
                <li><a href="/pricing" class="link">Pricing</a></li>
                <li><a href="/about" class="link">About us</a></li>
                <li><a href="https://portal.kount.net" class="link">Log in</a></li>
            </ul>
        </div>
    </div>
    <nav>
        <div class="container wide">
            <div class="logo">
                <a href="/">
                  <?php if(!is_front_page()):?><span class="sr-only">Home</span><?php endif; ?>
                    <img class="no-lazyload" src="/wp-content/themes/kount/templates/dist/images/logo.svg" width="132" height="43" alt="eCommerce Fraud Protection">
                </a>
            </div>

            <div class="secondary-nav">
                <ul class="resp-search">
                    <li class="btn-wrap">
                        <!--              <a class="btn-orange" href="https://go.kount.com/Identity-Trust-Global-Network-Demo-Request.html"-->
                        <!--                 data-text="Request a Demo"><span>Request a Demo</span></a>-->
                        <a class="btn-orange toggle-demo-form" href="#"
                           data-text="Request a demo" data-event-action="Request a Demo Top Nav (Desktop)"><span>Request a demo</span></a>
                    </li>
                </ul>
                <div class="search-icon d-lg-none">
                    <a href="/quick-search/" id="toggle-resp-searchbar"><img class="no-lazyload" width="25" height="26" src="/wp-content/themes/kount/templates/dist/images/search-icon.svg" alt="Search Icon"></a>
                </div>
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="nav-wrap">
                <div class="search-icon d-none d-lg-block">
                    <div class="search-icon-wrapper pr-2 py-1">
<!--                        <a href="#" ><img class="no-lazyload d-none close-search" width="20" height="20" src="/wp-content/themes/kount/templates/dist/images/svg/close-icon.svg" alt="Close search"><img class="no-lazyload" width="25" height="26" src="/wp-content/themes/kount/templates/dist/images/search-icon.svg" alt="Search Icon"></a>-->
                        <a href="/quick-search/" id="toggle-searchbar"><img class="no-lazyload" width="25" height="26" src="/wp-content/themes/kount/templates/dist/images/search-icon.svg" alt="Search Icon"></a>
                    </div>
                </div>
                <div class="main-nav">
                    <ul>
                        <li class="inner-nav" id="products">
                            <a href="/products" class="link">Products</a>
                            <div class="sub-menu" style="opacity: 0; visibility: hidden;">
                                <div class="inner-wrap">
                                    <a href="/products" class="overview"><strong>Products Overview</strong></a>
                                    <div class="pt-lg-3">
                                        <ul>
                                            <li>
                                                <a href="/products/kount-command/">
                                                    <span><strong>Kount Command</strong><sup>TM</sup> | Digital Fraud Prevention</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/products/kount-control/">
                                                    <span><strong>Kount Control</strong><sup>TM</sup> | Adaptive Authentication & MFA</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/products/kount-central/">
                                                    <span><strong>Kount Central</strong><sup>TM</sup> | Solutions for Payment Providers</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/products/dispute-and-chargeback-management/">
                                                    <span><strong>Dispute and Chargeback Management</strong></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/products/data-on-demand/">
                                                    <span><strong>Data on Demand</strong></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/products/chargeback-guarantee-services/">
                                                    <span><strong>Professional Services</strong><sup>TM</sup></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="inner-nav" id="solutions">
                            <a href="/solutions" class="link">Solutions</a>
                            <div class="sub-menu" style="opacity: 0; visibility: hidden;">
                                <div class="inner-wrap row">
                                    <a class="col-12 overview" href="/solutions/"><strong>Solutions Overview</strong></a>
                                    <div class="col-lg-6 pr-lg-3 pt-lg-3 left-col">
                                        <ul>
                                            <li>
                                                <a href="/solutions/identify-digital-fraud/" class="with-icon">
                                                    <img src="https://kount.com/wp-content/uploads/2022/03/Identify.svg" alt="" width="16" height="16" /><span><strong>Identify | Understand your customer</strong></span>
                                                </a>
                                                <ul>
                                                    <li>
                                                        <a href="/solutions/account-takeover-fraud-protection/">
                                                            <span>Account Takeover Protection</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/solutions/digital-identity-solutions/">
                                                            <span>Digital Identity Verification</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="/solutions/assess-fraud-solutions/" class="with-icon">
                                                    <img src="https://kount.com/wp-content/uploads/2022/03/Assess.svg" alt="" width="16" height="16" /><span><strong>Assess | Prevent digital fraud</strong></span>
                                                </a>
                                                <ul>
                                                    <li>
                                                        <a href="/solutions/bot-detection/">
                                                            <span>Bot Detection</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/solutions/chargeback-protection/">
                                                            <span>Chargebacks</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="/solutions/friendly-fraud/">
                                                            <span>Friendly Fraud</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 pl-lg-3 pt-lg-3 right-col">
                                        <ul>
                                            <li class="pb-lg-4">
                                                <a href="/solutions/engage-fraud-solutions/" class="with-icon">
                                                    <img src="https://kount.com/wp-content/uploads/2022/03/Engage.svg" alt="" width="16" height="16" /><span><strong>Engage | Improve customer experience</strong></span>
                                                </a>
                                            </li>
                                            <li class="pb-lg-4">
                                                <a href="/solutions/grow-digital-commerce-solutions/" class="with-icon">
                                                    <img src="https://kount.com/wp-content/uploads/2022/03/Grow.svg" alt="" width="16" height="16" /><span><strong>Grow | Expand revenue opportunities</strong></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/solutions/comply-regulation-services/" class="with-icon">
                                                    <img src="https://kount.com/wp-content/uploads/2022/03/Check.svg" alt="" width="16" height="16" /><span><strong>Comply</strong></span>
                                                </a>
                                                <ul>
                                                    <li>
                                                        <a href="/solutions/psd2-regulation/">
                                                            <span>PSD2</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
<!--                                        <ul>-->
<!--                                            <li>-->
<!--                                                <a href="/solutions/account-takeover-fraud-protection/">-->
<!--                                                    <span><strong>Account Takeover Protection</strong></span>-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                            <li>-->
<!--                                                <a href="/solutions/chargeback-protection/">-->
<!--                                                    <span><strong>Chargeback Protection</strong></span>-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                            <li>-->
<!--                                                <a href="/solutions/friendly-fraud/">-->
<!--                                                    <span><strong>Friendly Fraud Protection</strong></span>-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                            <li>-->
<!--                                                <a href="/solutions/egift-card-fraud-prevention/">-->
<!--                                                    <span><strong>E-Gift Card Fraud Protection</strong></span>-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                            <li>-->
<!--                                                <a href="/solutions/psd2-regulation/">-->
<!--                                                    <span><strong>PSD2: Liability Shift Protection</strong></span>-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                            <li>-->
<!--                                                <a href="/solutions/chargeback-guarantee/">-->
<!--                                                    <span><strong>Chargeback Guarantee</strong></span>-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                        </ul>-->
                                    </div>
                                </div>
                                <!--                  <p class="my-0 more-use-cases text-center bg-dark"><a href="/fraud-prevention-solutions" class="pt-3 pb-2 text-white"><small>See More <img src="/wp-content/themes/kount/templates/dist/images/svg/right-white-arrow.svg" width="6" height="26" class="ml-2" /></small></a></p>-->
                            </div>
                        </li>
                        <li>
                            <a href="/customers" class="link">
                                <span>Customers</span>
                            </a>
                        </li>
                        <li class="inner-nav" id="partners">
                            <a href="/partners" class="link">Partners</a>
                            <div class="sub-menu" style="opacity: 0; visibility: hidden;">
                                <div class="inner-wrap">
                                    <a href="/partners" class="overview"><strong>Partner Program Overview</strong></a>
                                    <div class="pt-lg-3">
                                        <ul>
                                            <li>
                                                <a href="/partners/channel-partners/">
                                                    <span><strong>Become a Partner</strong></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://partners.kount.com/">
                                                    <span><strong>Partner Portal - Login</strong></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="inner-nav" id="resources">
                            <a href="/resources" class="link">Resources</a>
                            <div class="sub-menu" style="opacity: 0; visibility: hidden;">
                                <div class="inner-wrap">
                                    <a href="/resources" class="overview"><strong>All Resources</strong></a>
                                    <div class="pt-lg-3">
                                        <ul>
                                            <li>
                                                <a href="/blog/">
                                                    <span><strong>Blog</strong></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/resources/case-studies/">
                                                    <span><strong>Case Studies</strong></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/resources/downloads/">
                                                    <span><strong>Reports</strong></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/events/">
                                                    <span><strong>Events</strong></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/resources/webinars/">
                                                    <span><strong>Webinars</strong></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/resources/videos/">
                                                    <span><strong>Videos</strong></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="resp-top-nav">
                            <ul>
                                <li>Sales <a href="tel:18669192167">1.866.919.2167</a></li>
                                <li><a href="/pricing" class="link">Pricing</a></li>
                                <li><a href="/about/" class="link">About Us</a></li>
                                <li><a href="https://portal.kount.net" class="link">Log In</a></li>
                            </ul>
                        </li>
                        <li class="btn-wrap">
                            <!--                <a class="btn-orange" href="https://go.kount.com/Identity-Trust-Global-Network-Demo-Request.html"-->
                            <!--                   data-text="Request a Demo"><span>Request a Demo</span></a>-->
                            <a class="btn-orange toggle-demo-form" href="#"
                               data-text="Request a demo" data-event-action="Request a Demo Top Nav (Mobile)"><span>Request a demo</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
