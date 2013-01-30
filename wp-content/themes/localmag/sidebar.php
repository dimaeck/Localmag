<div class="sidebar three columns hide-on-print">
	<div class="row">
		<div class="twelve columns">
			<h6 class="no-margin">
				<a href="<?php bloginfo('rss2_url'); ?>"> <b>RSS FEED</b></a>
			</h6>
		</div>
	</div>
	<hr class="black thinner" />
	<div class="row">
		<div class="twelve columns">
            <h6><b>FOLLOW US</b></h6>	
            <?php localmag_sidebar_links(); ?>
        </div>
    </div>
    <hr class="black thinner" />
    <div class="row">
    	<div class="twelve columns">
    		<div class="row">
                <h6>
        			<a href=""><b>SUBSCRIBE</b></a>
        		</h6>
            </div>
            <div class="row">
                <div class="six columns mobile-four">    
                    <?php
                        $args = array('post_type' => 'issue', 'post_parent' => 0, 'post_per_page' => 10);
                        $loop = new WP_Query( $args );
                        $counter = 0;
                        if ($loop->have_posts() && $counter == 0) : while ($loop->have_posts()) : $loop->the_post(); 
                    ?>
                            <a href="<?php the_permalink();?>" />
                                <?php                                                         
                                    if( class_exists( 'kdMultipleFeaturedImages' ) ) {
                                        $attr = array('class' => 'shadow shop-image');
                                        kd_mfi_the_featured_image( 'issue-cover', 'issue', 'localmag-issue', NULL, $attr );
                                        $counter++;
                                    }else{
                                        the_post_thumbnail( 'wpf-featured' );
                                        $counter++;
                                    }
                                ?> 
                            </a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                </div>
                <div class="six columns mobile-four">
            		<span>
                        <?php
                            $post = get_page_by_title('subscribe', OBJECT, 'page');
                            echo $post->post_content;
                        ?>
                    </span>
                </div>
            </div>
    	</div>
    </div>
    <hr class="black thinner" />
    <div class="row">
    	<div class="twelve columns">
    		<h6><b>TWITTER</b></h6>
            <div id="sidebar-twitter"></div>
        </div>
    </div>
</div>