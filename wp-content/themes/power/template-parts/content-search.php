<?php

/**

 * Template part for displaying results in search pages.

 *

 * @link https://codex.wordpress.org/Template_Hierarchy

 *

 * @package specia

 */

$hide_show_blog_meta = get_theme_mod('hide_show_blog_meta', 'on');

?>
<div class="custom-post d-flex ">
    <div class="image">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail("full", array("title" => get_the_title(), "alt" => get_the_title())); ?>
        </a>
    </div>
    <div class="content ">
        <?php if (get_the_tag_list()) : ?><span class="tag tag-name"><span class="text"><?php echo get_the_tag_list('', ', ') ?></span> </span><?php endif; ?>
        <h6> <a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h6>
        <?php if (get_the_excerpt()) : ?><p class="size-text-16"><?php the_excerpt_max_charlength(140); ?></p><?php endif; ?>
        <?php if (get_the_date()) : ?>
            <span class="tag tag-calender">
                <span class="text size-text-14"><?php echo get_the_date() ?></span>
            </span>
        <?php endif; ?>
    </div>
</div>