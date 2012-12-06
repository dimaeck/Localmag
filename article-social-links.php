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
                    <i class="foundicon-youtube social-icon"></i>
                </a>
            </li>

            <li style="margin-top: 10px;">
                <div class="fb-like" data-href="<?php the_permalink();?>" data-send="false" data-layout="button_count" data-width="25" data-show-faces="false" data-action="like"></div>
            </li>
        </ul>
        <hr class="black"/>
    </div>
</div>