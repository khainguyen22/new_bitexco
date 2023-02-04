<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );
		echo '<div class="pro-details-quality"> <span class="label-quan">Số lượng</span>';
		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);
		echo '</div>';
		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>
		<div class="call-and-payment">
			<div class="hotline_products">
				Gọi điện để được tư vấn: 
				<a href="tel:1900.9090" title="1900.9090">
					1900.9090
				</a>
			</div>
		</div>
		<div class="woocommerce-flex-btn">
			<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button"><span>Thêm vào giỏ hàng</span></button>
		</div>
		<div class="module_service_details">
                            <div class="wrap_module_service">
                                <div class="item_service">
                                    <div class="wrap_item_service">
                                        <div class="img_service">
                                            <img src="<?php echo get_stylesheet_directory_uri();?>/images/po1.png" alt="">
                                        </div>
                                        <div class="content_service">
                                            <p>Giao hàng miễn phí</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item_service">
                                    <div class="wrap_item_service">
                                        <div class="img_service">
                                            <img src="<?php echo get_stylesheet_directory_uri();?>/images/po2.png" alt="">
                                        </div>
                                        <div class="content_service">
                                            <p>Quà tặng hấp dẫn</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item_service">
                                    <div class="wrap_item_service">
                                        <div class="img_service">
                                            <img src="<?php echo get_stylesheet_directory_uri();?>/images/po3.png" alt="">
                                        </div>
                                        <div class="content_service">
                                            <p>Bảo hành toàn quốc</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item_service">
                                    <div class="wrap_item_service">
                                        <div class="img_service">
                                            <img src="<?php echo get_stylesheet_directory_uri();?>/images/po4.png" alt="">
                                        </div>
                                        <div class="content_service">
                                            <p>Tư vấn 24/7</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
