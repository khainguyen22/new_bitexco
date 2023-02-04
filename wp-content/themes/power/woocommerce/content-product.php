<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;
global $args;
// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?><li class="item_pro_page_child">
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
                                               <?php global $product;echo $product->get_price_html(); ?>
                                            </strong>
                                        </div>
                                    </a>
                                </div>
</li>