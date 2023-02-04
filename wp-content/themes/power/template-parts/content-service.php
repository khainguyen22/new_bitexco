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
?> <div class="col-lg-4 col-sm-6 col-12">
                        <div class="box_service_page">
                            <div class="bsp_img">
                               <?php the_post_thumbnail("medium",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
                            </div>
                            <div class="bsp_content">
                                <h3><a href="<?php the_permalink() ;?>"><?php the_title() ;?></a></h3>
                                <p><?php the_excerpt_max_charlength(140);?></p>
                            </div>
                        </div>
                    </div>