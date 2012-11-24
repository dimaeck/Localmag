<?php
/*
 *  Template name: About
 *
 */
?>
<?php get_header(); ?>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="row about-header">
                    <div class="three columns">
                        <a href="<?php the_permalink();?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/multiple_covers.png" alt="magazine stack"/>
                        </a>
                        <br />
                    </div>
                    <div class="nine columns">
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
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>			
<div class="row">
    <div class="twelve columns">
        <div class="row container about-container spacer">
            <div class="twelve columns">
                <div class="row">
                    <div class="three columns">
                        <h3> CONTACT US </h3>
                        <hr class="black" />
                        <ul class="block-grid one-up black-hover">
                            <li>
                                <h5>
                                    General
                                </h5>
                                <a class="mini-text" href="mailto:hello@localmag.us">hello@localmag.us</a>
                            </li>
                            <li>
                                <h5>
                                    Editorial / Content
                                </h5>
                                <a class="mini-text" href="mailto:dan@localmag.us">dan@localmag.us</a>
                                <br />
                                <a class="mini-text" href="mailto:allison@localmag.us">allison@localmag.us</a>
                                <br />
                                <a class="mini-text" href="mailto:samantha@localmag.us">samantha@localmag.us</a>
                            </li>
                            <li>
                                <h5>
                                    Artwork / Multimedia
                                </h5>
                                <a class="mini-text" href="mailto:amanda@localmag.us">amanda@localmag.us</a>
                            </li>
                            <li>
                                <h5>
                                    Partnerships / Advertising
                                </h5>
                                <a class="mini-text" href="mailto:diana@localmag.us">diana@localmag.us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="offset-by-half eight columns end">
                        <h3> THE LOCAL TEAM </h3>
                        <hr class="black" />
                        <ul class="block-grid three-up black-hover team">
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/team/dan_webster.jpg" alt="Dan Webster"/>
                                <h5>Dan Webster</h5>
                                <span class="sub-title">EDITOR-IN-CHIEF</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/team/diana_ecker.jpg" alt="Diana Ecker"/>
                                <h5>Diana Ecker</h5>
                                <span class="sub-title">ART & DEVELOPMENT DIRECTOR</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/team/amanda_hakanson-stacy.jpg" alt="Amanda Hakanson-Stacy"/>
                                <h5>Amanda Hakanson-Stacy</h5>
                                <span class="sub-title">CREATIVE DIRECTOR</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/team/allison_davis.jpg" alt="Allison Davis"/>
                                <h5>Allison P. Davis</h5>
                                <span class="sub-title">COPYWRITER</span>
                            </li>
                            <li>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/team/samantha_moore.jpg" alt="Samantha Moore"/>
                                <h5>Samantha Moore</h5>
                                <span class="sub-title">MANAGING EDITOR</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row spacer">
                    <div class="twelve columns">
                        <h4 class="no-margin">LOCALMAG ON INSTAGRAM</h4>
                        <hr/>
                    </div>
                </div>
                <div class="row">
                    <div class="twelve columns clearfix">
                        <iframe src="http://widget.stagram.com/in/localmag/?s=235&w=4&h=2&b=0&bg=FFFFFF&p=5" allowtransparency="true" scrolling="no" style="border:none;overflow:hidden;width:960px; height: 480px" ></iframe> <!-- Webstagram - web.stagram.com -->
                    </div>
                </div>
                <div class="row spacer">
                    <div class="twelve columns">
                        <h4 class="no-margin">LOCALMAG KICKSTARTER VIDEO</h4>
                        <hr/>
                    </div>
                </div>
                <div class="row">
                    <div class="twelve columns clearfix">
                        <div class="row">
                            <center>
                                <iframe src="http://player.vimeo.com/video/44765900?title=0&amp;byline=0&amp;portrait=0" width="700" height="393"></iframe>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>