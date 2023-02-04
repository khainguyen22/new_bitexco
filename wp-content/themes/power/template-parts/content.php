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
   <div class="col-lg-3 col-md-6 col-12">
                        <div class="box_news">
                            <div class="img_news">
                                 <?php the_post_thumbnail("medium",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
                                <div class="time_post">
                                   <?php the_time('d/m/Y') ?>
                                </div>
                            </div>
                            <div class="content_news">
                                <h4><a href="<?php the_permalink() ;?>" title="<?php the_title() ;?>"><?php the_title() ;?></a></h4>
                                <p><?php the_excerpt_max_charlength(140);?></p>
                            </div>
                        </div>
                    </div>