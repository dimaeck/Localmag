<?php
/*
Template Name: Right Sidebar Page
*/
?>

<?php get_header(); ?>
<div class="row">
    <div class="twelve columns">
        <div class="row">
            <div class="twelve columns">
				<div class="row">
                    <div class="twelve columns clearfix">
                        <div class="row">
                            <div class="twelve columns panel single-issue-summary up50">
                                <div class="row container">
                                    <div class="twelve columns issue-summary">
                                        <p>
                                            <?php echo get_post_meta($post->ID, 'custom_tagline', true); ?>
                                        </p>                                           
                                    </div>
                                </div>
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
	<div id="content" class="row container clearfix">
		<div id="main" class="nine columns clearfix" role="main">
			<div class="row">
				<div class="twelve columns">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header>
							
							<h1><?php the_title(); ?></h1>
						
						</header> <!-- end article header -->
					
						<section class="post_content">
							<?php the_content(); ?>
					
						</section> <!-- end article section -->
						
						<footer>
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php else : ?>
			
					<?php endif; ?>
				</div>
			</div>
		</div> <!-- end #main -->
	<br />
	<?php get_sidebar(); // sidebar 1 ?>

	</div> <!-- end #content -->
</div>
</div>

<?php get_footer(); ?>