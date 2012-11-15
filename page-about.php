<?php
/*
 *  Template name: About
 *
 */
?>
<?php get_header(); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                    <header>
                            <h1 class="about-header"><?php the_title(); ?></h1>
                    </header> <!-- end article header -->
                    <section class="post_content">
                            <?php the_content(); ?>
                    </section> <!-- end article section -->
                    <footer>
                            <p class="clearfix"><?php the_tags('<span class="tags">Tags: ', ', ', '</span>'); ?></p>
                    </footer> <!-- end article footer -->
            </article> <!-- end article -->
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>			
<div class="row">
    <div class="twelve columns">
        <div class="row container">
            <div class="twelve columns clearfix">
                <div class="row">
                    <center>
                        <iframe src="http://player.vimeo.com/video/44765900?title=0&amp;byline=0&amp;portrait=0" frameborder="0" width="700" height="393"></iframe>
                    </center>
                </div>
                <div class="row">
                    <div class="twelve columns center">
                        <div class="row">
                            <p style="text-align: center;">Drop us a line.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="push-two four columns">
                        <p style="text-align: center;"><strong>General</strong></p>
                        <p style="text-align: center;">hello@localmag.us</p>
                    </div>
                    <div class="offset-by-two four columns end">
                        <p style="text-align: center;"><strong>Editorial/Content</strong></p>
                        <p style="text-align: center;">dan@localmag.us</p>
                        <p style="text-align: center;">allison@localmag.us</p>
                        <p style="text-align: center;">samantha@localmag.us</p>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="push-two four columns">
                        <p style="text-align: center;"><strong>Artwork/Multimedia</strong></p>
                        <p style="text-align: center;">amanda@localmag.us</p>
                    </div>
                    <div class="offset-by-two four columns end">
                        <p style="text-align: center;">
                            <strong>Partnerships/Advertising</strong> 
                        </p>
                        <p style="text-align: center;">
                            diana@localmag.us
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>