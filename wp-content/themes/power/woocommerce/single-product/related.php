<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


if ( $related_products ) : ?>
<!-- Your like facebook button code -->
<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
<!-- fb-comments. -->
<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="100%" data-numposts="5"></div>
<section class="product_other">
            <div class="container">
                <div class="row">
                    <div class="title_module_main">
                        <h2>
                            <a href="#" title="Danh mục sản phẩm">
                                Các sản phẩm khác
                            </a>
                        </h2>
                    </div>
                </div>
                <div class="row">
						<?php foreach ( $related_products as $related_product ) : ?>

				<?php
				 	$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					?>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="box_product">
                            <a href="<?php the_permalink() ;?>">
                                <div class="product-thumbnail">
                                    <?php the_post_thumbnail("medium",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
                                </div>
                                <h3 class="product-name">
                                    <?php the_title() ;?>
                                </h3>
                                <div class="product-item-price price-box">
                                    <strong>
                                        <span><?php global $product;echo $product->get_price_html(); ?></span>
                                    </strong>
                                </div>
                            </a>
                        </div>
                    </div>
                   <?php endforeach; ?>
                </div>
            </div>
        </section>
	<?php
endif;

wp_reset_postdata();
