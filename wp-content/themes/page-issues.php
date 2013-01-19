<?php get_header(); ?>
        <div class="row">
            <div id="content">
		<div id="main" class="twelve columns clearfix" role="main">
                    <div class="row">
                        <div class="twelve columns panel up50">
                            <div class="row">
                                <div class="four columns" style="background: #888;">
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                    <br />
                                </div>
                                <div class="eight columns issue-summary">
                                    <p>
                                    <?php
                                        echo $post->post_excerpt;
                                    ?>
                                    </p>                                           
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="twelve columns">
                            <h4>Stories - <?php echo $post->post_title ?></h4>
                            <hr /> 
                        </div>
                    </div>
                    <?php 
                        $args = array('post_type' => 'issue', 'post_parent' => $post->ID, 'post_per_page' => 10);
                        $loop = new WP_Query( $args );
                        $counter = 0;
                        echo '<div class="row">';
                        if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); 
                            if ( has_post_thumbnail() ){
                                if ( $counter%2 == 0 && $counter !== 0){
                     ?>
                                <div class="row">
                                <?php } ?>
                        <div class="six columns">
                                    <div class="featured-image">
                                        <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail( 'wpf-featured' ); ?> </a>
                                            <div class="featured-image-description">
                                                <p> <?php echo get_featured_image_description();?></p>
                                                <img class="article-icon" src="/localmag2/wp-content/themes/wp-foundation/images/article-icon.png" />
                                            </div>
                                    </div>
                         </div>
                         <?php 
                                $counter++;
                                } //end of if ?>
                    <?php
                        if ( $counter%2 == 0 ){
                    ?>
                            </div>
                            <br />
                    <?php   
                            } 
                    ?>

					<?php 
                        endwhile; 
                    ?>	
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
			</div> <!-- end #content -->
        </div>
        </div>

        </div> <!-- End Container -->
<?php get_footer(); ?>
