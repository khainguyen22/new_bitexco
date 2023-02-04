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
	$hide_show_blog_meta = get_theme_mod('hide_show_blog_meta','on'); 
?>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 colums-posts">
    <div class="box-posts">
    <div class="img-posts">
        <a href="<?php the_permalink() ;?>"> 
            <?php the_post_thumbnail("medium",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
        </a>
        <div class="ovrly"></div>
        <div class="details-posts">
            <a href="<?php the_permalink() ;?>">Xem chi tiết</a>
        </div>
    </div>
    <div class="info-posts">
        <a class="name-posts" href="<?php the_permalink() ;?>"><?php the_title() ;?></a>
        <p class="excerpt-posts"><?php the_excerpt_max_charlength(140);?></p>
        <p class="readmore-posts"><a href="<?php the_permalink() ;?>">Xem chi tiết <i class="fas fa-arrow-right"></i></a></p>
    </div>
    </div>
</div>