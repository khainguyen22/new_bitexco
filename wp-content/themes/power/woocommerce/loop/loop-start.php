<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

        <section class="main_product">
            <div class="container">
                <div class="row">
                    <button class="btn_filter_mobie"><i class="fas fa-filter"></i></button>
                    <div class="lmp_filter_toggle"></div>
                    <div class="col-lg-3">
                        <div class="left_main_pro">
                            <div class="lmp_category">
                                <h3 class="title_left_main_pro">Danh mục sản phẩm</h3>
                                <div class="list_menu_category">
                                    <ul>
                                        <li><a href="#">Sàn gỗ tự nhiên</a></li>
                                        <li><a href="#">Cửa gỗ tự nhiên</a></li>
                                        <li><a href="#">Ốp trần gỗ tự nhiên</a></li>
                                        <li><a href="#">Bậc cầu thang</a></li>
                                        <li><a href="#">Sản phẩm khác</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lmp_filter">
                                <h3 class="title_left_main_pro">Bộ lọc</h3>
                                <div class="box_filter_pro">
                                    <div class="box_filter_pro_start">
                                        <h4>Tìm theo mức giá</h4>
                                        <ul class="listform_filter">
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Dưới 1.000.000đ
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>1.000.000đ - 2.000.000đ
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>2.000.000đ - 3.000.000đ
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>3.000.000đ - 4.000.000đ
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>4.000.000đ - 5.000.000đ
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Trên 5.000.000đ
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="box_filter_pro_start">
                                        <h4>Chất liệu</h4>
                                        <ul class="listform_filter">
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Gỗ tự nhiên
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Gỗ dán
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Gỗ ván dăm
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Gỗ ép
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Gỗ MDF
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>HDF
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="box_filter_pro_start">
                                        <h4>Màu sắc</h4>
                                        <ul class="listform_filter">
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Nâu
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Đen
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Xám
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Vàng
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Đỏ
                                                </label>
                                                <label>
                                                    <input type="checkbox" name="checkbox"> 
                                                    <span></span>Cam
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                    <div class="col-lg-9">
                        <div class="categories_icon_page_child">
                            <ul>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/parquet.png">
                                        <span>Sàn gỗ tự nhiên</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/stairs.png">
                                        <span>Cầu thang gỗ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/roof.png">
                                        <span>Ốp trần</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/door.png">
                                        <span>Cửa gỗ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img src="<?php echo get_stylesheet_directory_uri();?>/images/stack-of-square-papers.png">
                                        <span>Sản phẩm khác</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- end -->
                        <div cla1ss="sort_product">
                            <div class="title_big_pro">
                                <h2>Tất cả các sản phẩm</h2>
                            </div>
                            <div class="sortPagiBar">
                                <div class="sort-cate-left">
                                    <h3>Xếp theo:</h3>
                                    <ul>
                                        <li class="btn-quick-sort default active">
                                            <a href="#" title="Mặc định"><i></i>Mặc định</a>
                                        </li>
                                        <li class="btn-quick-sort alpha-asc">
                                            <a href="#" title="Tên A-Z"><i></i>Tên A-Z</a>
                                        </li>
                                        <li class="btn-quick-sort alpha-desc">
                                            <a href="#" title="Tên Z-A"><i></i>Tên Z-A</a>
                                        </li>
                                        <li class="btn-quick-sort position-desc">
                                            <a href="#" title="Hàng mới"><i></i>Hàng mới</a>
                                        </li>
                                        <li class="btn-quick-sort price-asc">
                                            <a href="#" title="Giá thấp đến cao"><i></i>Giá thấp đến cao</a>
                                        </li>
                                        <li class="btn-quick-sort price-desc">
                                            <a href="#" title="Giá cao xuống thấp"><i></i>Giá cao xuống thấp</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- end -->
                        </div>
                        <!-- end -->
                        <ul class="list_pro_page_child">
