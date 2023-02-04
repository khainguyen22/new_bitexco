<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version    1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $product;
the_title( '<h1 class="title-product" itemprop="name">', '</h1>' );
?>
<div class="group-status">
	<span class="first_status"><span class="a_name">Thương hiệu:</span> <span class="status_name">
		Đang cập nhật
		</span>
		<span class="hidden-xs">&nbsp;&nbsp;|&nbsp;&nbsp;</span>
	</span>
	<span class="inventory_quantity"><span class="a_name">Tình trạng:</span> <span class="status_name availabel">
		Còn hàng
		</span></span>
</div>