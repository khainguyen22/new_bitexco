<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php global $c5_options;?>
	<meta property="fb:app_id" content="<?php echo $c5_options['opt-id-appfb'];?>"/>
	<meta property="fb:admins" content="<?php echo $c5_options['opt-id-adminfb'];?>"/>
	<?php echo $c5_options['opt-textarea-header'];?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	 <header class="header-site">
	<?php if(is_front_page()){ ?>
	      <section class="top_header">
	<?php } else { ?>
			    <section class="top_header top_header_page">
	<?php }?>
        
            <div class="container">
                <div class="row">
                    <div class="top_header_content">
                        <div class="col-lg-3 col-md-12 col-xs-12">
                            <div class="wp-menu-mobile">
                                <div id="trigger-mobile">
                                   <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="logo_page">
                                <a href="/"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/logo_FL.png"></a>
                            </div>
                            <div class="list_language language_mobie">
                                <div class="btn_drop_language"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/vi.png">VIE <i class="fas fa-caret-down"></i></div>
                                <div class="drop_language">
                                    <div class="item_list_drop_language"><a href="#"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/en.png">ENG</a></div>
                                    <div class="item_list_drop_language"><a href="#"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/vi.png">JAP</a></div>
                                    <div class="item_list_drop_language"><a href="#"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/en.png">CHI</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-xs-12">
                            <div class="top-bar-right">
                                <ul>
                                    <li>
                                        <div class="box_top_right_bar">
                                            <div class="top-bar-right-icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div class="top-bar-right-text">
                                                <b>Địa chỉ</b>
                                                <p>266 Đội Cấn - Ba Đình - Hà Nội</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="box_top_right_bar">
                                            <div class="top-bar-right-icon">
                                                <i class="far fa-clock"></i>
                                            </div>
                                            <div class="top-bar-right-text">
                                                <b>Giờ mở cửa cửa</b>
                                                <p>Từ 8h - 20h ( Tất cả các ngày )</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="box_top_right_bar">
                                            <div class="top-bar-right-icon">
                                                <i class="fas fa-phone-alt"></i>
                                            </div>
                                            <div class="top-bar-right-text">
                                                <b>Hotline</b>
                                                <p>+1-458-362-1258</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="list_language">
                                            <div class="btn_drop_language"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/vi.png">VIE <i class="fas fa-caret-down"></i></div>
                                            <div class="drop_language">
                                                <div class="item_list_drop_language"><a href="#"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/en.png">ENG</a></div>
                                                <div class="item_list_drop_language"><a href="#"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/vi.png">JAP</a></div>
                                                <div class="item_list_drop_language"><a href="#"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2022/06/en.png">CHI</a></div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end top header -->
		<?php if(is_front_page()){ ?>
	       <section class="menu_and_logo_page">
	<?php } else { ?>
			   <section class="menu_and_logo_page menu_and_logo_page_child">
	<?php }?>  
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9">
                        <div class="list_menu_page">
							<?php 
							wp_nav_menu( 
								array(  
									'theme_location' => 'primary_menu',
									'container'  => '',
									'menu_class' => '',
									'fallback_cb' => 'specia_fallback_page_menu',
									'walker' => new specia_nav_walker()
									 ) 
								);
						?>                           
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-3 col-xs-12">
                        <div class="right_menu">
                            <div class="cart_btn shopping_cart ">
								     <a href="cart.html" data-toggle="dropdown" class="btn-cart dropdown-toggle"><i class="fas fa-shopping-bag"></i><span><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span></a>									
									<div class="woocommerce-minicart dropdown-menu">
									  <?php echo woocommerce_mini_cart(); ?>
									</div>

                            </div>
                            <div class="search_btn">
                                <button><i class="fas fa-search"></i></button>
                            </div>
                            <div class="btn_quote">
                                <a href="#sec_quote">Nhận báo giá</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_search">				
                <div class="container">
                    <div class="col-md-11">
                        <?php echo do_shortcode('[wcas-search-form]'); ?>
                    </div>
                    <div class="col-md-1">
                        <button class="btn_close_search"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
        </section>
        <!-- end slider -->
    </header>	
	<?php if(is_front_page()){ ?>
	      <main class="main_page">
	<?php } else { ?>
			<main class="main_page_child">  
			<?php get_template_part('sections/specia','breadcrumb'); ?>
	<?php }?>