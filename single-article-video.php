<?php get_header(); ?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="twelve columns">
        <div class="row container">
            <div class="push-two eight columns">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
                        <header>
                            <h1 class="single-title" itemprop="headline">
                                <?php 
                                    the_title(); 
                                    if( has_post_format('gallery') )
                                        echo " Photo Gallery";
                                ?>
                            </h1>
                            <p class="meta"><?php echo strtoupper( get_the_title($post->post_parent) );?> -- Written by <?php the_author();?> </p>
                            <hr class="black-hr"/>
                            <?php if ( has_post_thumbnail() && !has_post_format('gallery') ){ ?>
                                <div class="featured-image shop-image shadow">
                                    <?php the_post_thumbnail( 'wpbs-featured' ); ?>
                                </div>
                            <?php } ?>
                        </header>
                        <section class="post_content clearfix" itemprop="articleBody">
                                <?php the_content(); ?>
                        </section>
                        <footer>
                                <?php the_tags('<p class="tags"><span class="tags-title">Tags:</span> ', ' ', '</p>'); ?>
                        </footer>
                    </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            <hr />
            <?php get_template_part('nav', 'single', 'article'); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>