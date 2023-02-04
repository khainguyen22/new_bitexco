<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="header-single_product">
		<section class="product_details">
            <div class="container">
				<div class="col-lg-4 col-md-6 col-12">
		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		?>
	
				</div>
		<div class="col-lg-5 col-md-6 col-12">		
		 <div class="bg_inner details_product_content">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
				</div>
				<div class="col-lg-3 col-md-12 col-12">
                    <div class="right_details_product">
                        <div class="title_right_details_pro">
                            <h3>Sản phẩm mới nhất</h3>
                        </div>
                        <div class="list_pro_small_right">
							<?php  
								$args = array(
									'post_type'      => 'product',
									'posts_per_page' => 4,
								);

								$loop = new WP_Query( $args );

								while ( $loop->have_posts() ) : $loop->the_post();
									global $product;
							       ?>
							    <div class="item_lpsr">
                                <div class="img_item_lpsr">
                                      <?php the_post_thumbnail("medium",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
                                </div>
                                <div class="content_item_lpsr">
                                    <h3><a href="<?php the_permalink() ;?>"><?php the_title() ;?></a></h3>
                                    <p>Giá: <span><?php global $product;echo $product->get_price_html(); ?></span></p>
                                </div>
                            </div>
							<?php
									
								endwhile;

								wp_reset_query();
							?>                       
                    
                        </div>
                    </div>
                </div>
	</div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
