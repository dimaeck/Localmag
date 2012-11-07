<?php
/*
 *  Template name: Shop
 *
 */
?>
<?php get_header(); ?>
        <div id="content" class="row">
            <div id="main" class="twelve columns clearfix" role="main">
                <?php 
                    $args = array('post_type' => 'issue', 'post_parent' => 0, 'post_per_page' => 10);
                    $loop = new WP_Query( $args );
                    $counter = 0;
                    if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); 
                ?>
                <div class="row">
                    <div class="eight columns panel">
                        <div class="row">
                            <div class="six columns">
                                <header>
                                    <h5 class="shop-issue-header"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo "Order Issue " . get_post_meta($post->ID, 'issue_number', true); ?></a></h5>
                                    <h3 class="shop-issue-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                                </header>
                            </div>
                            <div class="six columns">
                                <header>
                                    
                                    <h5 class="shop-issue-header"> <a href=""> Four Issues </a></h5>
                                    <h3 class="shop-issue-title">
                                        <!--<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>-->
                                        <a href="" >One Year Subscription</a>
                                    </h3>
                                    <br />
                                </header>
                            </div>
                        </div>
                        <div class="row">
                            <div class="twelve columns">
                                <hr class="thin-hr"/>
                                <br />
                            </div>
                        </div>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix row'); ?> role="article">
                                <div class="twelve columns">
                                    <div class="row">
                                        <div class="six columns">
                                            <div class="row">
                                                <div class="ten columns centered">
                                                <?php if ( has_post_thumbnail() ){ ?>
                                                    <div class="featured-image">
                                                        <a href="<?php the_permalink();?>" />
                                                            <?php                                                         
                                                                if( class_exists( 'kdMultipleFeaturedImages' ) ) {
                                                                    $attr = array('class' => 'shadow shop-image');
                                                                    kd_mfi_the_featured_image( 'issue-cover', 'issue', 'localmag-issue', NULL, $attr );
                                                                }else{
                                                                    the_post_thumbnail( 'wpf-featured' );
                                                                }

                                                            ?> 

                                                        </a>
                                                        <div class="issue-number">
                                                            <h1>
                                                                <?php 
                                                                    global $post;
                                                                    $issue_number = get_post_meta( $post->ID, 'issue_number', true );
                                                                    echo $issue_number;
                                                                ?> 
                                                            </h1>
                                                        </div>
                                                    </div>
                                                <br />
                                                
                                                <?php } else{ ?>
                                                    <div class="no-featured-image">
                                                        <div class="no-featured-image-description">
                                                            <p></p>
                                                        </div>
                                                    </div>
                                                <?php } //end else ?>
                                            </div>
                                        </div>
                                    </div>
                                <div class="six columns">
                                    <div class="row">
                                        <div class="twelve columns">
                                            <div class="row">
                                                <div class="ten columns centered">
                                                        <div class="featured-image">
                                                            <a href="<?php the_permalink();?>" />
                                                                <img src="<?php echo get_template_directory_uri(); ?>/images/multiple_covers.png"/>
                                                            </a>
                                                        </div>
                                                    <br />
                                                </div>
                                            </div>
<!--                                        <form id="early-subscribe" method="post" action="https://tinyletter.com/localmag">
                                            <label for="early-subscribe-email"> 
                                                Available Late Fall, 2012. <br /><br />
                                                Subscribe here to be first on the list for preorder. 
                                            </label>
                                            <div class="email-group">
                                                <input type="email" id="early-subscribe-email" name="email" value="">
                                                <br>
                                                <button class="button" type="submit">Subscribe</button>
                                            </div>
                                        </form>-->
                                                
                                        </div>                                            
                                    </div>
                                
                                </div>
                                </div>
                                <div class="row">
                                    <div class="twelve columns">
                                        <div class="row">
                                            <div class="six columns">
                                                <div class="row">
                                                    <div class="six columns centered">
                                                        <h3 style="text-align:center;">$7</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="six columns centered">
                                                        <?php echo print_wp_cart_button_for_product('Issue' . $issue_number, 7); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="six columns">
                                                <div class="row">
                                                    <div class="six columns centered">
                                                        <h3 style="text-align:center;">$25</h3>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="six columns centered">
                                                        <?php echo print_wp_cart_button_for_product('Subscription_2012', 25); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article> <!-- end article -->            
                        </div>
                <?php 
                    if ( $counter==0 ){
                        $page = get_page_by_title( 'Subscribe' );
                        
                ?>

                            <div class="four columns end">
<!--                                <h2>Subscribe</h2>
                                <hr class="black-hr" />
                                <p>
                                    <?php echo $page->post_content; ?>
                                </p>-->
                                <?php 
                                    $args = array('classname' => 'widget_wp_paypal_shopping_cart', 'description' => __("Display WP Ultra Simple Paypal Shopping Cart.", "WUSPSC") );
                                    show_wp_paypal_shopping_cart_widget($args); 
                                ?>
<!--                                    <div id="slidingTopWrap">
                                            <div id="slidingTopContent">
                                                    <div id="basketWrap">
                                                            <div id="basketTitleWrap">Your Cart</div>
                                                            <div id="basketItemsWrap">
                                                                    <ul>
                                                                            <li>&nbsp;</li>
                                                                    </ul>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div id="slidingTopFooter">
                                                    <div id="slidingTopFooterLeft"><a href="no-js.htm" id="slidingTopTrigger" onclick="return false;">Show Cart</a></div>
                                            </div>
                                    </div>                                -->
                        </div>
                <?php
                    }

                    if ( $counter==1 ){
                ?>
                        <div class="offset-by-half three columns end">
                            <?php 
                                $args = array('classname' => 'widget_wp_paypal_shopping_cart', 'description' => __("Display WP Ultra Simple Paypal Shopping Cart.", "WUSPSC") );
                                show_wp_paypal_shopping_cart_widget($args); 
                            ?>
                        </div>
                    <?php
                        }
                        $counter++;
                    ?>
                </div>
              <br />
                <?php endwhile; ?>
                <?php endif; ?>
            </div><!-- end #main -->
        </div> <!-- end #content -->
    </div> <!-- end of outer twelve columns -->
</div> <!-- End Container -->
<?php get_footer(); ?>