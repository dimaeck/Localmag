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
                                    <div class="twelve columns issue-summary">
                                        <p>
                                            <?php echo $post->post_content; ?>
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
                        <a href="<?php the_permalink();?>" class="no-hover">
                            <h4><?php echo $post->post_title; ?></h4>
                        </a>
                        <hr /> 
                    </div>
                </div>
                <div class="row">
                    <div class="twelve columns">
                        <ul class="block-grid three-up">
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
<!--                                         <div class="featured-image-description">
                                            <p><?php echo get_featured_image_description();?></p>
                                        </div> -->
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