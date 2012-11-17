<?php
/*
 * Template name: First Place
 */

?>

<?php get_header(); ?>

                <div class="row">
                    <div class="twelve columns panel homepage-summary">
                        <div class="row">
                            <div class="seven columns">
                                <p class="byline"> <span class="bold-italic">Local: A Quarterly of People and Places </span> <br /> commits to penning the overlooked America, bringing you the neglected narrative of this country. </p>
                            </div>
                            <div class="offset-by-one one-and-half columns mobile-hide">
                                <a href="<?php echo site_url('/shop');?>" >
                                    <img class="magazine-stack" src="<?php echo get_template_directory_uri() ?>/images/magazine-stack.png" />
                                </a>
                            </div>
                            <div class="two columns end mini-text-wrapper">
                                <h5> <strong> Issue No. 1 </strong> </h5>
                                <span class="mini-text"> <i>Jersey Shore, PA</i> </span>
                            </div>
                        </div>
                    </div>
                </div>
<?php 
    /* Do something special since this is the first issue */
    global $post;
    $mypostid = 6;
    $post = get_post($mypostid, OBJECT);
?>
                <!-- <div class="row">
                    <div class="twelve columns clearfix">
                        <div class="row">
                            <div class="twelve columns panel single-issue-summary">
                                <div class="row">
                                    <div class="five columns">
                                        <?php $attr = array( 'title' => '' ); the_post_thumbnail( 'wpf-featured', $attr ); ?>
                                    </div>
                                    <div class="seven columns issue-summary">
                                        <p>
                                            <?php echo the_content(); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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
                            <h4>Stories - <?php echo $post->post_title ?></h4>
                        </a>
                        <ul class="block-grid-size">
                            <li>
                                <a href="javascript:;" class="smaller-tiles"> Smaller </a>
                            </li>
                            <li>
                                <a href="javascript:;" class="larger-tiles"> Larger </a>
                            </li>
                        </ul>
                        <hr /> 
                    </div>
                </div>
                <div class="row">
                    <div class="twelve columns">
                                                
                        <ul class="adjustable-grid block-grid two-up">
                            <?php 
                                $args = array('post_type' => 'issue', 'post_parent' => 6, 'post_per_page' => 10);
                                $loop = new WP_Query( $args );
                                if ($loop->have_posts()){
                                    while ($loop->have_posts()){
                                        $loop->the_post();
                             ?>
                            <li>
                                <div class="row">
                                    <div class="twelve columns article-image-link">
                                        
                                        <div class="featured-image">
                                            <a href="<?php the_permalink();?>">
                                                <?php $attr = array( 'title' => '', 'class' => 'issue-featured' ); the_post_thumbnail( 'wpf-featured', $attr ); ?>
                                            </a>
                                            <div class="featured-image-description">
                                                <p><?php echo get_featured_image_description();?></p>
                                                <img class="article-icon" src="<?php echo get_template_directory_uri(); ?>/images/article-icon.png" />
                                            </div>
                                            <div class="hover-over-article">
                                                <div class="hover-over-wrapper">
                                                    <div class="row">
                                                        <div class="twelve columns">
                                                            <h5> <?php the_title(); ?> </h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="twelve columns">
                                                            <h6><time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_time('F jS, Y'); ?></time></h6>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="twelve columns">
                                                            <hr />
                                                            <p> 
                                                                <?php the_excerpt();?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <!-- <a href="<?php the_permalink(); ?>" class="hover-over-article"> -->
                                        
                                        <!-- </a> -->
                                    </div>
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