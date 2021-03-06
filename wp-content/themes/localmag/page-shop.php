<?php
/*
 *  Template name: Shop
 *
 */
?>
<?php get_header(); ?>
<div class="row">
    <div class="twelve columns">
        <div class="row">
            <div class="twelve columns">
                <div class="row">
                    <div class="twelve columns panel homepage-summary">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <div class="row container shop-header">
                                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
                                    <header>
                                            <!-- <h1 class="about-header"><?php the_title(); ?></h1> -->
                                    </header>                                
                                    <section class="post_content">
                                            <br />
                                            <?php the_content(); ?>
                                            <br />
                                    </section>
                                </article>
                                <!-- <div class="twelve columns"></div> -->
                            </div>
                        <?php endwhile; ?>
                        <?php endif; ?>


                        <!-- <div class="row">
                            <div class="eight columns">
                                <p class="byline"> <span class="bold">Our quarterly print edition chronicles one town per issue with over 90 pages of features, infographics and photo spreads.</span></p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br />
<div class="row">
    <div class="twelve columns">
        <div class="row container spacer">
            <?php //if( is_user_logged_in() ){ ?>
            <div class="twelve columns clearfix">
                <div class="row">
                    <div class="nine columns">
                        <ul class="block-grid two-up">
                            <li>
                                <div class="row">
                                    <div class="twelve columns">
                                        <div class="row">
                                            <div class="ten columns">
                                                    <div class="featured-image">
                                                        <a href="<?php the_permalink();?>" />
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/subscription_photo.jpg" style="height:300px;" alt="magazine stack"/>
                                                        </a>
                                                    </div>
                                                    <hr />
                                                    <header>
                                                        <h5 class="shop-issue-header"> 
                                                            <a href="">Four Issues - $25</a>
                                                        </h5>
                                                        <h3 class="shop-issue-title">
                                                            <a href="" class="no-hover">One Year Subscription</a>
                                                        </h3>
                                                    </header>
                                                    <?php echo print_wp_cart_button_for_product('Subscription_2012', 25); ?>
                                                <br />
                                            </div>
                                        </div>      
                                    </div>                                            
                                </div>
                            </li>
                            <?php 
                                $args = array('post_type' => 'story', 
                                                'meta_query' => array( array( 'key' => 'is_issue', 'value' => 'true', 'compare' => '=', 'type' => 'CHAR')),
                                                'post_per_page' => 10);
                                $loop = new WP_Query( $args );
                                $counter = 0;
                                if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); 
                            ?>
                                <li>
                                    <?php if ( has_post_thumbnail() ){ ?>
                                        <div class="featured-image">
                                            <a href="<?php the_permalink();?>" />
                                                <?php                                                         
                                                    if( class_exists( 'kdMultipleFeaturedImages' ) ) {
                                                        $attr = array('class' => 'shadow shop-image');
                                                        kd_mfi_the_featured_image( 'issue-cover', 'story', 'localmag-issue', NULL, $attr );
                                                    }else{
                                                        the_post_thumbnail( 'wpf-featured' );
                                                    }
                                                ?> 
                                            </a>
                                            <div class="issue-number">
                                                <h1>
                                                    <?php 
                                                        global $post;
                                                        $issue_number = get_post_meta( $post->ID, 'shop_issue_number', true );
                                                        echo $issue_number;
                                                    ?> 
                                                </h1>
                                            </div>
                                        </div>
                                        <hr />
                                        <header>
                                            <h5 class="shop-issue-header"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo "Order Issue " . get_post_meta($post->ID, 'issue_number', true); ?> - $7</a></h5>
                                            <h3 class="shop-issue-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="no-hover"><?php the_title(); ?></a></h3>
                                        </header>
                                        <?php echo print_wp_cart_button_for_product('Issue' . $issue_number, 7); ?>
                                    <?php } else{ ?>
                                        <div class="no-featured-image">
                                            <div class="no-featured-image-description">
                                                <p></p>
                                            </div>
                                        </div>
                                    <?php } //end else ?>
                                </li>
                            <?php endwhile; ?>
                            <?php endif; ?>
                    </ul>
                </div>    
                <?php 
                    $page = get_page_by_title( 'Subscribe' );
                ?>
                    <div class="three columns end">
                        <!-- <h2 style="margin-top:0;">Subscribe</h2>
                        <hr class="black-hr" />
                        <p>
                            <?php //echo $page->post_content; ?>
                        </p>
                        <br />
                        <form id="early-subscribe" method="post" action="https://tinyletter.com/localmag">
                            <label for="early-subscribe-email"> 
                                Available Late Fall, 2012. <br /><br />
                                Subscribe here to be first on the list for preorder. 
                            </label>
                            <div class="email-group">
                                <input type="email" id="early-subscribe-email" name="email" value="">
                                <br>
                                <button class="button" type="submit">Subscribe</button>
                            </div>
                        </form> -->
                        <?php 
                            $args = array('classname' => 'widget_wp_paypal_shopping_cart', 'description' => __("Display WP Ultra Simple Paypal Shopping Cart.", "WUSPSC") );
                            show_wp_paypal_shopping_cart_widget($args); 
                        ?>
                    </div>
                </div>
                <br />

                <?php //}else{ ?>
<!--                 <br />
                <br />
                <br />
                <br />
                <div class="row">
                    <div class="four columns centered">
                        <form id="early-subscribe" method="post" action="https://tinyletter.com/localmag">
                            <label for="early-subscribe-email"> 
                                Available Late Fall, 2012. <br /><br />
                                Subscribe here to be first on the list for preorder. 
                            </label>
                            <div class="email-group">
                                <input type="email" id="early-subscribe-email" name="email" value="">
                                <br>
                                <button class="button" type="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div> -->

            <?php //} ?>
    </div>
</div>
<?php get_footer(); ?>