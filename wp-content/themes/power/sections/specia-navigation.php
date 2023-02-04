<?php global $c5_options;?>
<header role="banner">
	<nav class='navbar navbar-default sticky-nav' role='navigation'>
		<div class="container">
			<div class="header-navbar-mobile">
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php specia_logo();?>
				</a>
				<?php $description = get_bloginfo( 'description');
					if ($description) : ?>
						<h1 class="site-description"><?php echo esc_html($description); ?></h1>
				<?php endif; ?>
				<a id="showmenu">
					<span class="hamburger hamburger--collapse">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
				</a>
				<!-- /End Contact Info -->
				<div class="header-search-wrap">
				    <button type="button" data-toggle="dropdown" class="btn dropdown-toggle"><img src="<?php bloginfo('template_directory');?>/images/ic-search.png" alt=""></button>
				    <div class="dropdown-search dropdown-menu">
				      <?php echo do_shortcode('[wcas-search-form]'); ?>
				    </div>
				</div>
				<div class="shopping_cart">
				    <button type="button" data-toggle="dropdown" class="btn dropdown-toggle">
					   <p class="cart-contents" title="<?php _e( 'Giỏ hàng ' ); ?>">
						<span><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span>
						<img class="icon-carts" src="<?php bloginfo('template_directory');?>/images/iccart.png" alt="">
						</p>
					</button>
				    <div class="woocommerce-minicart dropdown-menu">
				      <?php echo woocommerce_mini_cart(); ?>
				    </div>
				</div>
			</div>
			<!-- Mobile Display -->
			<div class="row navbar-header hidden-xs">
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php specia_logo();?>
					</a>
					<?php $description = get_bloginfo( 'description');
						if ($description) : ?>
							<h1 class="site-description"><?php echo esc_html($description); ?></h1>
					<?php endif; ?>
					<a id="showmenu">
						<span class="hamburger hamburger--collapse">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</span>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="formsearch-header">
						<?php echo do_shortcode('[wcas-search-form]'); ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
					<div class="shopping_cart">
					    <button type="button" data-toggle="dropdown" class="btn dropdown-toggle">
						   <p class="cart-contents" title="<?php _e( 'Giỏ hàng ' ); ?>">
							<span><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count ), WC()->cart->cart_contents_count ); ?></span>
							<img class="icon-carts" src="<?php bloginfo('template_directory');?>/images/iccart.png" alt="">
							</p>
						</button>
					    <div class="woocommerce-minicart dropdown-menu">
					      <?php echo woocommerce_mini_cart(); ?>
					    </div>
					</div>
				 <!-- Start Contact Info -->
					<ul class="header-contact">
						<?php if($c5_options['opt-header-hotline']) { ?> 
							<li class="header-hotline">
								<div class="inner-contact-header">
									<i class="fab fa-whatsapp"></i>	
									<a href="tel:<?php echo $c5_options['opt-header-hotline']; ?>">Hottline<span><?php echo $c5_options['opt-header-hotline']; ?></span></a>
								</div>
							</li>
						<?php } ?>
					</ul>
					<!-- /End Contact Info -->

			    </div>
			<!-- Menu Toggle -->
			</div>
		</div>
		<!-- Menu Toggle -->
		<div class="collapse navbar-collapse" id="navbar_primary">
			<div class="container">
			<?php 
				wp_nav_menu( 
					array(  
						'theme_location' => 'primary_menu',
						'container'  => '',
						'menu_class' => 'nav navbar-nav',
						'fallback_cb' => 'specia_fallback_page_menu',
						'walker' => new specia_nav_walker()
						 ) 
					);
			?>
			</div>
		</div>
	</nav>
<div id="mobilenav">
    <div class="mobilenav__inner">
        <div class="toplg">
			<div class="logo-mobilenav">
		        <?php specia_logo();?>
			</div>
            <h3><?php echo __( 'MENU', 'shtheme' )?></h3>
        </div>
        <?php 
        wp_nav_menu( array(
            'theme_location'    => 'primary_menu', 
            'menu_id'           => 'menu-main', 
            'menu_class'        => 'mobile-menu',
        ) );
        ?>
        <a class="menu_close"><i class="fas fa-angle-left"></i></a>
    </div>
</div>
</header>
<div class="clearfix"></div>