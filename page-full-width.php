<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>
			
        <div id="content" class="row clearfix">
                <div id="main" class="twelve columns clearfix" role="main">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                                <header>
                                        <h1><?php the_title(); ?></h1>
                                </header> <!-- end article header -->
                                <section class="post_content">
                                        <?php the_content(); ?>
                                </section> <!-- end article section -->
                                <footer>
                                        <p class="clearfix"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>
                                </footer> <!-- end article footer -->
                        </article> <!-- end article -->
                        <?php endwhile; ?>	
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
<?php get_footer(); ?>