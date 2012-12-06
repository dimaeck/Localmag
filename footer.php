        <footer role="contentinfo" class="hide-on-print clearfix">
            <div class="row">
                <div id="footer-content" class="twelve columns">
                    <div class="row container footer-row">
                        <div class="three columns mobile-four">
                            <div class="row">
                                <div class="twelve columns">
                                    <h6>&nbsp;</h6>
                                    <hr />
                                    <p>
                                        Local: A Quarterly of People and Places commits to penning the overlooked America, bringing you the neglected narrative of this country.
                                    </p>
                                    <?php
                                        $page = get_page_by_title( 'About/Contact Us' );
                                        $pageId = $page->ID;
                                    ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="twelve columns">
                                    <a href="<?php echo get_permalink($pageId);?>">Learn More</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="twelve columns" style="float: left; margin-top: 75px;">

                                    <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.en_US">
                                        <img alt="Creative Commons License" style="border-width:0;" src="http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png" />
                                    </a>
                                        <br />
                                        This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.en_US">Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License</a>
                                </div>
                            </div>
                        </div>
                        <div class="one-and-half columns mobile-two">
                            <h6>Shop</h6>
                            <hr />
                                <?php
                                    $page = get_page_by_title( 'Shop' );
                                    $pageId = $page->ID;
                                    
                                    $query = new WP_Query( array( 'post_type' => 'issue', 'post_parent' => 0 ) );

                                    while( $query->have_posts() ) : $query->the_post(); 
                                        $id = $query->post->ID;
                                ?>
                                <a href="<?php echo get_permalink($pageId);?>">Issue No. <?php echo get_post_meta($id, 'issue_number', true); ?></a>
                                <?php    
                                    endwhile;
                                ?>
                        </div>
                        <div class="two columns mobile-two">
                            <h6>Follow Us</h6>	
                            <hr />
                            <?php localmag_footer_links(); ?>
                        </div>
                        <div class="three columns mobile-two">
                            <h6>Twitter</h6>
                            <hr />
                            <div id="twitter-feed">
                                
                            </div>
                        </div>
                        <div class="two-and-half columns end mobile-two">
                            <div id="mailing-list">
                                <h6> Mailing List </h6>
                                <hr />
                                <p> Sign up to join our mailing list and receive e-mail updates from the team at Local Mag. </p>
                                <br />
                                <br />
                                <form id="subscribe-form" method="post" action="https://tinyletter.com/localmag">
                                    <label for="email">Magic awaits your in-box.<br /><br /></label>
                                        <div class="email-group">
                                            <input type="email" id="email" name="email" value="">
                                            <br />
                                            <button class="button" type="submit">Subscribe</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--[if lt IE 7 ]>
                        <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
                        <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
                <![endif]-->
                <!--$('#article-image-gallery').orbit();-->
                <script type="text/javascript">
                    $(window).load(function() {
                        $('#article-image-gallery').orbit();
                    });
                </script>
                <?php wp_footer(); // js scripts are inserted using this function ?>
                <script type="text/javascript">
                    var _gaq = _gaq || [];
                    _gaq.push(['_setAccount', 'UA-36852527-1']); 
                    _gaq.push(['_setDomainName', 'localmag.us']);
                    _gaq.push(['_setAllowLinker', true]);
                    _gaq.push(['_trackPageview']);

                    (function() {
                      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                    })();
                 </script>
            </div>
        </footer>
    </body>
</html>