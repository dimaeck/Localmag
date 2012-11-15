<?php
/*
 * Template name: Places
 */

?>
<?php get_header(); ?>
                <div class="row">
                    <div class="twelve columns panel homepage-summary">
                        <div class="row">
                            <div class="seven columns">
                                <p class="byline"> <span class="bold-italic">Local: A Quarterly of People and Places </span> <br /> commits to penning the overlooked America, bringing you the neglected narrative of this country. </p>
                            </div>
                            <div class="offset-by-one one-and-half columns mobile-hide">
                                <a href="<?php echo site_url('/shop');?>" >
                                    <img class="magazine-stack" src="<?php echo get_template_directory_uri() ?>/images/magazine-stack.png" />
                                </a>
                            </div>
                            <div class="two columns end mini-text-wrapper">
                                <h5> <strong> Issue No. 1 </strong> </h5>
                                <span class="mini-text"> <i>Jersey Shore, PA</i> </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="twelve columns">
        <div class="row container">
            <div class="twelve columns">
                <h5 class="places-header"> PLACES </h5>
            </div>
            <?php 
                $args = array('post_type' => 'issue', 'post_parent' => 0, 'post_per_page' => 10);
                $loop = new WP_Query( $args );
                if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); 
            ?>
            <div class="twelve columns white-panel">
                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix row post_summary places'); ?> role="article">
                    <div class="twelve columns">
                        <div class="row">	
                            <div class="six columns">
                                <header>
                                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"></a>						
                                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                    <hr />
                                </header>
                                <section class="post_content clearfix">
                                    <?php the_excerpt('Read more &raquo;'); ?>
                                </section> <!-- end article section -->
                            </div>
                    <div class="six columns float-right">
                        <?php if ( has_post_thumbnail() ){ ?>
                            <div class="featured-image">
                                    <a href="<?php the_permalink();?>" /><?php $attr = array( 'title' => '', 'class' => 'places-image' ); the_post_thumbnail( 'wpf-featured', $attr ); ?> </a>
                                    <div class="featured-image-description">
                                        <p> <?php echo get_featured_image_description(); ?></p>
                                        <img class="article-icon" src="<?php echo get_template_directory_uri(); ?>/images/article-icon.png" />
                                    </div>
                            </div>
                        <?php } else{ ?>
                            <div class="no-featured-image">
                                <div class="no-featured-image-description">
                                    <p></p>
                                </div>
                            </div>
                        <?php } //end else ?>
                    </div>

                </div>
                <div class="row">
                    <div class="six columns">
                        <footer>
                            <a href="<?php the_permalink(); ?>" class="button">View All Stories</a>
                        </footer> <!-- end article footer -->
                    </div>
                </div>
                </article> <!-- end article -->
            </div>

			<?php comments_template(); ?>
			
			<?php endwhile; ?>	
			
			<?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
				
				<?php page_navi(); // use the page navi function ?>
				
			<?php } else { // if it is disabled, display regular wp prev & next links ?>
				<nav class="wp-prev-next">
					<ul class="clearfix">
						<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
						<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
					</ul>
				</nav>
			<?php } ?>		
			
			<?php else : ?>
			
			<article id="post-not-found">
			    <header>
			    	<h1>Not Found</h1>
			    </header>
			    <section class="post_content">
			    	<p>Sorry, but the requested resource was not found on this site.</p>
			    </section>
			    <footer>
			    </footer>
			</article>
			
			<?php endif; ?>            	
		</div>
        
	</div>
</div>
<?php get_footer(); ?>

