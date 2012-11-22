<footer role="contentinfo" class="clearfix">
    <div class="row">
        <div id="footer-content" class="twelve columns">
            <div class="row container footer-row">
                <div class="three columns">
                    <h6>&nbsp;</h6>
                    <hr />
                    <p>
                        Local: A Quarterly of People and Places commits to penning the overlooked America, bringing you the neglected narrative of this country.
                    </p>
                    <?php
                        $page = get_page_by_title( 'About & Contact' );
                        $pageId = $page->ID;
                    ?>
                    <a href="<?php echo get_permalink($pageId);?>">Learn More</a>
                </div>
                <div class="one-and-half columns">
                    <h6>Shop</h6>
                    <hr />
                        <?php
                            $query = new WP_Query( array( 'post_type' => 'issue', 'post_parent' => 0 ) );

                            while( $query->have_posts() ) : $query->the_post(); 
                                $id = $query->post->ID;
                        ?>
                        <a href="<?php echo get_permalink(61); ?>">Issue No. <?php echo get_post_meta($id, 'issue_number', true); ?></a>
                        <?php    
                            endwhile;
                        ?>
                </div>
                <div class="two columns">
                    <h6>Follow Us</h6>	
                    <hr />
                    <?php localmag_footer_links(); ?>
                </div>
                <div class="three columns">
                    <h6>Twitter</h6>
                    <hr />
                    <div id="twitter-feed">
                        
                    </div>
                </div>
                <div class="two-and-half columns end">
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
    </footer> <!-- end footer -->		
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
            _gaq.push(['_setAccount', 'UA-32779107-1']);
            _gaq.push(['_setDomainName', 'localmag.us']);
            _gaq.push(['_setAllowLinker', true]);
            _gaq.push(['_trackPageview']);

            (function() {
              var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
              ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
              var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
         </script>
        <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
        <script type="text/javascript">stLight.options({publisher: "a42ff0ff-f29f-4adc-aaab-79e02702726f"});</script>
    </body>
</html>