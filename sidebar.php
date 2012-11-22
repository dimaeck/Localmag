<div class="sidebar three columns">
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
    		<h6>
    			<a href=""><b>SUBSCRIBE</b></a>
    		</h6>
    		<a href="<?php the_permalink();?>" />
                <img src="<?php echo get_template_directory_uri(); ?>/images/multiple_covers.png"/>
            </a>

    		<?php
                global $post;
                $post = get_page_by_title('subscribe', OBJECT, 'page');
                echo the_content();
            ?>
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