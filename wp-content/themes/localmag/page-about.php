<?php
/*
 *  Template name: About
 *
 */
?>
<?php get_header(); ?>
<div class="row">
    <div class="twelve columns">
        <div class="row">
            <div class="twelve columns">
                <div class="row">
                    <div class="twelve columns panel">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <div class="row container about-header">
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
                    </div>
                </div>
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
                                <div class="team-image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/dan_webster.jpg" alt="Dan Webster"/>


                                    <div class="hover-over-article">
                                        <div class="row">
                                            <div class="twelve columns">
                                                <h6 style="text-align: center;">EDITOR-IN-CHIEF</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="twelve columns">
                                                <hr class="thinner"/>
                                                <p>
                                                    <?php
                                                        $user = get_user_by('login', 'dan webster');
                                                        $user_data = get_userdata($user->ID);
                                                        echo $user_data->user_description;
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5>Dan Webster</h5>
                                <span class="sub-title">EDITOR-IN-CHIEF</span>
                            </li>
                            <li>
                                <div class="team-image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/diana_ecker.jpg" alt="Diana Ecker"/>
                                    <div class="hover-over-article">
                                        <div class="row">
                                            <div class="twelve columns">
                                                <h6 style="text-align: center;">ART & DEVELOPMENT DIRECTOR</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="twelve columns">
                                                <hr class="thinner"/>
                                                <p>
                                                    <?php
                                                        $user = get_user_by('login', 'diana@localmag.org');
                                                        $user_data = get_userdata($user->ID);
                                                        echo $user_data->user_description;
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <h5>Diana Ecker</h5>
                                <span class="sub-title">ART & DEVELOPMENT DIRECTOR</span>
                            </li>
                            <li>
                                <div class="team-image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/amanda_hakanson-stacy.jpg" alt="Amanda Hakanson-Stacy"/>
                                    <div class="hover-over-article">
                                        <div class="row">
                                            <div class="twelve columns">
                                                <h6 style="text-align: center;">CREATIVE DIRECTOR</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="twelve columns">
                                                <hr class="thinner"/>
                                                <p>
                                                    <?php
                                                        $user = get_user_by('login', 'amanda hakanson-stacy');
                                                        $user_data = get_userdata($user->ID);
                                                        echo $user_data->user_description;
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Amanda Hakanson-Stacy</h5>
                                    <span class="sub-title">CREATIVE DIRECTOR</span>
                                </div>
                            </li>
                            <li>
                                <div class="team-image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/allison_davis.jpg" alt="Allison Davis"/>
                                    <div class="hover-over-article">
                                        <div class="row">
                                            <div class="twelve columns">
                                                <h6 style="text-align: center;">EDITOR</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="twelve columns">
                                                <hr class="thinner"/>
                                                <p>
                                                    <?php
                                                        $user = get_user_by('login', 'allison davis');
                                                        $user_data = get_userdata($user->ID);
                                                        echo $user_data->user_description;
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Allison P. Davis</h5>
                                    <span class="sub-title">EDITOR</span>
                                </div>

                            </li>
                            <li>
                                <div class="team-image">
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/samantha_moore.jpg" alt="Samantha Moore"/>
                                    <div class="hover-over-article">
                                        <div class="row">
                                            <div class="twelve columns">
                                                <h6 style="text-align: center;">MANAGING EDITOR</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="twelve columns">
                                                <hr class="thinner"/>
                                                <p>
                                                    <?php
                                                        $user = get_user_by('login', 'sam moore');
                                                        $user_data = get_userdata($user->ID);
                                                        echo $user_data->user_description;
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Samantha Moore</h5>
                                    <span class="sub-title">MANAGING EDITOR</span>
                                </div>
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
                        <h4 class="no-margin">KICKSTARTER VIDEO</h4>
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