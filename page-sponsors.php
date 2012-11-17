<?php
/*
 * Template name: Sponsors
 */

?>
<?php get_header(); ?>
                <div class="row">
                    <div class="twelve columns clearfix">
                        <div class="row">
                            <div class="twelve columns panel single-issue-summary up50">
                                <div class="row">
                                    <div class="eight columns issue-summary">
                                        <p>
                                            <?php echo the_content(); ?>
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
        <div class="row container">
            <div class="twelve columns">
                <div class="row">
                    <div class="twelve columns">
                        <a href="<?php the_permalink();?>">
                            <h4>Sponsors - <?php echo $post->post_title ?></h4>
                        </a>
                        <hr /> 
                    </div>
                </div>
                <div class="row">
                    <div class="twelve columns">
                        <ul class="block-grid two-up">
                            <?php 
                                $args = array('post_type' => 'sponsor', 'post_per_page' => 10);
                                $loop = new WP_Query( $args );
                                if ($loop->have_posts()){
                                    while ($loop->have_posts()){
                                        $loop->the_post();
                                        $sponsor_url = get_post_meta( $post->ID, 'sponsor_url', true );
                             ?>
                            <li>
                                <div class="featured-image article-image-link">
                                    <a href="<?php echo $sponsor_url;?>">
                                        <?php $attr = array( 'title' => '', 'class' => 'issue-featured' ); the_post_thumbnail( 'wpf-featured', $attr ); ?>
                                        <div class="featured-image-description">
                                            <p><?php echo get_featured_image_description();?></p>
                                            <img class="article-icon" src="<?php echo get_template_directory_uri(); ?>/images/article-icon.png" />
                                        </div>
                                    </a>
                                    <a href="<?php echo $sponsor_url; ?>" class="hover-over-article">
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
                            </li>
                            <?php 
                                    } //Endwhile
                                } //EndIf
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>