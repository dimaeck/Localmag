<?php get_header(); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="twelve columns">
        <div class="row container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix localmag-article'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                    <div class="twelve columns">
                        <div class="row">
                            <div class="twelve columns">
                                <div class="row">
                                    <div class="seven columns">
                                        <header>
                                            <h1 class="single-title" itemprop="headline">
                                                <?php 
                                                    the_title(); 
                                                    if( has_post_format('gallery') )
                                                        echo " Photo Gallery";
                                                ?>
                                            </h1>
                                            <p class="meta"><?php echo strtoupper( get_the_title($post->post_parent) );?> -- Written by <?php the_author();?> </p>
                                        </header>

                                    </div>
                                    <div class="two columns end">
                                    </div>
                                </div>
                                <?php get_template_part('article-social-links');?>
                            </div>
                        </div>                            
                        <div class="row">
                            <div class="nine columns">
                                <?php if ( has_post_thumbnail() && !has_post_format('gallery') ){ ?>
                                    <div class="featured-image">
                                        <?php the_post_thumbnail( 'wpbs-featured' ); ?>
                                    </div>
                                <?php } ?>
                                <section class="post_content clearfix" itemprop="articleBody">
                                        <?php the_content(); ?>
                                </section>
                                <hr class="black"/>
                                <?php get_template_part('nav-single-article');?>
                            </div>
                            <?php get_sidebar(); ?>
                        </div>
                    </div>
                </article> <!-- end article -->
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>