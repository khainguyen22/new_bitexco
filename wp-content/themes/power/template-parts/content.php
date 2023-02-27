<?php

/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package specia
 */

?>
<?php
$hide_show_blog_meta = get_theme_mod('hide_show_blog_meta', 'on');
?>
<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
<div class="custom-post d-flex ">
    <div class="image">
        <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>">
    </div>
    <div class="content ">
        <?php if (get_the_tag_list()) : ?><span class="tag tag-name"><span class="text"><?php echo get_the_tag_list('', ', ') ?></span> </span><?php endif; ?>
        <h6> <a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h6>
        <?php if (get_the_excerpt()) : ?><p class="size-text-16"><?php the_excerpt_max_charlength(140); ?></p><?php endif; ?>
        <?php if (get_the_date()) : ?> <span class="tag tag-calender">
                <span class="text size-text-14"><?php echo get_the_date() ?></span>
            </span>
        <?php endif; ?>
    </div>
</div>