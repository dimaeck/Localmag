<?php get_header(); ?>
    <div class="row">
        <div id="content">
            <div id="main" class="twelve columns clearfix" role="main">
                <div class="row">
                    <div class="twelve columns panel">
                        <div class="row">
                            <div class="six columns offset-by-one">
                                <p class="byline"> <span class="bold-italic">Local: A Quarterly of People and Places </span> commits to penning the overlooked America, bringing you the neglected narrative of this country. </p>
                            </div>
                            <div class="two columns">
                                <img class="magazine-stack" src="<?php echo get_template_directory_uri(); ?>/images/magazine-stack.png" />    
                            </div>
                            <div class="two columns end">
                                <div id="mini-text-wrapper">
                                    <h6> <strong> Issue No. 1 </strong> </h6>
                                    <br />
                                    <span class="mini-text"> <i>Jersey Shore, PA</i> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="twelve columns">
                        <h5> Places </h5>
                    </div>
                </div> 
                <?php 
                    $args = array('post_type' => 'issue', 'post_parent' => 0, 'post_per_page' => 10);
                    $loop = new WP_Query( $args );
                    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); 
                ?>
                <div class="row">
                    <div class="twelve columns white-panel">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix row'); ?> role="article">
                        <div class="twelve columns">
                            <div class="row">	
                                <div class="six columns">
                                    <header>
                                                                    <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"></a>

                                                                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                                            <hr />
                                    </header>
                                </div>
                                <div class="six columns float-right">
                                <?php if ( has_post_thumbnail() ){ ?>
                                    <div class="featured-image">
                                            <?php the_post_thumbnail( 'wpf-featured' ); ?>
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
                                <div class="row">
                                    <div class="six columns">
                                        <section class="post_content clearfix">
                                            <?php the_excerpt('Read more &raquo;'); ?>
                                        </section> <!-- end article section -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="six columns">
                                    <footer>
                                        <a href="#" class="button">View All Stories</a>
                                    </footer> <!-- end article footer -->
                                </div>
                            </div>
                        </article> <!-- end article -->
                    </div>
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
		            	
				</div> <!-- end #main -->
    
				<?php //get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->
        </div>
        </div>

        </div> <!-- End Container -->
<?php get_footer(); ?>
