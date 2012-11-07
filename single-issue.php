<?php get_header(); ?>
            <div id="content" class="row">
		<div id="main" class="twelve columns clearfix" role="main">
                    <div class="row">
                        <div class="twelve columns panel up50">
                            <div class="row">
                                <div class="four columns">
                                    <?php $attr = array( 'title' => '' ); the_post_thumbnail( 'wpf-featured', $attr ); ?>
                                </div>
                                <div class="eight columns issue-summary">
                                    <p>
                                        <?php echo the_content(); ?>
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
                            <div class="featured-image article-image-link">
                                <a href="<?php the_permalink();?>">
                                    <?php $attr = array( 'title' => '', 'class' => 'issue-featured' ); the_post_thumbnail( 'wpf-featured', $attr ); ?>
                                    <div class="featured-image-description">
                                        <p><?php echo get_featured_image_description();?></p>
                                        <img class="article-icon" src="<?php echo get_template_directory_uri(); ?>/images/article-icon.png" />
                                    </div>
                                </a>
                                <a href="<?php the_permalink(); ?>" class="hover-over-article">
                                    <div class="row">
                                        <div class="twelve columns">
                                            <h5> <?php the_title(); ?> </h5>
                                            <h6><time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time></h6>
                                            <hr />
                                            <p> 
                                                <?php the_excerpt();?>
                                            </p>                                                            
                                        </div>
                                    </div>
                                </a>
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
					    	<p>Sorry, but there are no articles for this Issue yet. We're working really hard to get them up here though, so please check back later.</p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>	            	
            </div> <!-- end #main -->
        </div> <!-- end #content -->
    </div>
</div>
</div>
<?php get_footer(); ?>
