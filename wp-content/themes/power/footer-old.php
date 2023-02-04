<?php global $c5_options;?>
<!--======================================
    Footer Section
========================================-->
</main>   
<footer id="footer_dashboard">
        <div class="bg_ft_page">
            <div class="fd_topfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-sm-8 col-md-4">
                            <h3>Nội thất Flatinor</h3>
                            <p>Với kinh nghiệm hơn 10 năm trong ngành nội thất, Flatinor tự hào là cung cấp những mẫu sản phẩm nội thất tốt nhất Việt Nam..</p>
                             <p><i class="fa fa-map-marker" aria-hidden="true"></i> 266 Đội Cấn - Ba Đình - Hà Nội</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i> 1900 6825</p>
                            <p><i class="fa fa-envelope" aria-hidden="true"></i> support@ecomos.vn</p>
                            <div class="ketnoi">
                                <ul class="list_socical">
                                    <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fab fa-skype" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-8 col-lg-8">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-6 pd_0_mobie">
                                    <h3>Về chúng tôi</h3>
                                    <ul>
                                        <li><a class="ef" href="#" title="Trang chủ">Về chúng tôi</a></li>
                                        <li><a class="ef" href="#" title="Giới thiệu">Lịch sử hình thành</a></li>
                                        <li><a class="ef" href="" title="Sản phẩm">Sứ mệnh tầm nhìn</a></li>
                                        <li><a class="ef" href="" title="Tin tức">Công nghệ</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6 pd_0_mobie">
                                    <h3>Sản phẩm</h3>
                                    <ul>
                                        <li><a class="ef" href="#" title="Trang chủ">Sàn gỗ</a></li>
                                        <li><a class="ef" href="#" title="Giới thiệu">Cửa gỗ</a></li>
                                        <li><a class="ef" href="#" title="Sản phẩm">Ốp, bậc cầu thang</a></li>
                                        <li><a class="ef" href="#" title="Tin tức">Nội thất thông minh</a></li>
                                        <li><a class="ef" href="#" title="Liên hệ">Khác</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6 pd_0_mobie">
                                    <h3>Hướng dẫn</h3>
                                    <ul>
                                        <li><a class="ef" href="#" title="Trang chủ">Sản xuất theo yêu cầu</a></li>
                                        <li><a class="ef" href="#" title="Giới thiệu">Cho thuê thiết bị</a></li>
                                        <li><a class="ef" href="#" title="Sản phẩm">Tư vấn thiết bị</a></li>
                                        <li><a class="ef" href="#" title="Tin tức">Kiến thức</a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-12 col-6 payment pd_0_mobie">
                                    <h3>THANH TOÁN</h3>
                                    <ul>
                                        <li><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/image_payment_3.jpg"></li>
                                        <li><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/image_payment_2.jpg"></li>
                                        <li><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/image_payment_3 (1).jpg"></li>
                                        <li><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/image_payment_4.jpg"></li>
                                        <li><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/image_payment_5.jpg"></li>
                                    </ul>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12 dkift pd_0_mobie">
                                    <h3>ĐĂNG KÝ NHẬN TIN KHUYẾN MẠI</h3>
                                    <div class="input_dki">
                                        <input type="text" name="" placeholder="Đăng kí nhận tin">
                                        <button>Đăng kí</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end -->
            <div class="fd_bottomfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            © Bản quyền thuộc về Ecomos
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="back-to-top">
        <a href="javascript:;">
            <i class="fa fa-chevron-up" aria-hidden="true"></i>
        </a>
    </div>
    <!-- menu mobile -->
    <div class="menu_toggle"></div>
    <div class="mobile-main-menu">
        <div class="search_mobie">
            <input type="text" name="" placeholder="Tìm kiếm...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="la-scroll-fix-infor-user">
            <div class="la-nav-menu-items">
				<?php 
							wp_nav_menu( 
								array(  
									'theme_location' => 'primary_menu',
									'container'  => '',
									'menu_class' => 'la-nav-list-items ul-b',
									'fallback_cb' => 'specia_fallback_page_menu',
									'walker' => new specia_nav_walker()
									 ) 
								);
						?>  
            </div>
        </div>
        
    </div>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/library.js" id="library-js"></script>
<?php wp_footer(); ?>
</body>
</html>
