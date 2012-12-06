<div class="row">
    <div class="nine columns">
        <ul class="block-grid seven-up social-icon hide-on-print" style="float: left; list-style: none;">
            <li>
                <a href="https://twitter.com/share?url=<?php urlencode(the_permalink()); ?>" target="_blank">
                    <i class="foundicon-twitter social-icon"></i>                                                    
                </a>
            </li>

            <li>
                <a href="<?php echo get_permalink() . 'rss/';?>" target="_blank">
                    <i class="foundicon-rss social-icon"></i>                                                    
                </a>
            </li>
            <li>
                <a href="http://www.instapaper.com/hello2?url=<?php urlencode(the_permalink());?>&title=<?php urlencode(the_title());?>&description=<?php urlencode(the_excerpt());?>" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/instapaper-29.png" style="vertical-align: text-top;" />
                </a>
            </li>
            <li>
                <a href="javascript:window.print();" target="_blank">
                    <!-- <img src="<?php echo get_template_directory_uri(); ?>/images/icons/noun_project_1313_paper.svg" style="width: 29px; height: 29px;" /> -->
                    <svg style="margin-top: 5px;" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="29px" height="29px" viewBox="-3.093 -7.272 82.069 100" enable-background="new -3.093 -7.272 82.069 100" xml:space="preserve">
                        <path fill="#222" d="M52.008-7.272l26.969,27.63v72.37H-3.093v-100H52.008z M8.75,80.885h58.389V24.304H45.921V4.568H8.75V80.885z
                             M16.809,42.231h41.776v-4.605H16.809V42.231z M16.809,55.392h41.776v-4.605H16.809V55.392z M16.809,68.548h41.776v-4.604H16.809
                            V68.548z">
                        </path>
                    </svg>
                </a>
            </li>

            <li style="margin-top: 10px;">
                <div class="fb-like" data-href="<?php the_permalink();?>" data-send="false" data-layout="button_count" data-width="25" data-show-faces="false" data-action="like"></div>
            </li>
        </ul>
        <hr class="black"/>
    </div>
</div>