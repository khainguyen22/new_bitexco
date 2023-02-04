<?php 
if ( ! is_active_sidebar( 'sidebar-primary' ) ) {
	return;
}
?>
<?php global $c5_options;?>
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 content-sidebar">
	<div class="sidebar" role="complementary">
		<div id="CategoryBar">
			<h3 class="title-categorybar">Danh mục bài viết</h3>
			<?php 
			wp_nav_menu( array(
			    'theme_location'    => 'category_menu', 
			    'menu_id'           => 'menucate-main', 
			    'menu_class'        => 'category-menu',
			) );
			?>
		</div>
		<div class="infor-contact-sidebar">
			<h3 class="tit-infor-contact">THÔNG TIN LIÊN HỆ</h3>
			<p><i class="fa fa-map-marker-alt"></i><strong>Địa chỉ:</strong>
				<span><?php echo $c5_options['opt-sidebar-address'];?></span></p>
			<p><i class="fab fa-whatsapp"></i><strong>Điện thoại:</strong>
			<span><?php echo $c5_options['opt-sidebar-hotline'];?></span></p>
			<p><i class="fa fa-envelope"></i><strong>Email:</strong>
			<span><?php echo $c5_options['opt-sidebar-email'];?></span></p>
			<h3 class="tit-hotline-sidebar">TƯ VẤN TRỰC TUYẾN</h3>
			<ul class="list-hotline-sidebar">
				<li>
					<a href="http://zalo.me/<?php echo $c5_options['opt-sidebar-zalo_1'];?>"><?php echo $c5_options['opt-sidebar-zalo_1'];?></a>
				</li>
				<li>
					<a href="http://zalo.me/<?php echo $c5_options['opt-sidebar-zalo_2'];?>"><?php echo $c5_options['opt-sidebar-zalo_2'];?></a>
				</li>
				<li>
					<a href="http://zalo.me/<?php echo $c5_options['opt-sidebar-zalo_3'];?>"><?php echo $c5_options['opt-sidebar-zalo_3'];?></a>
				</li>
				<li>
					<a href="http://zalo.me/<?php echo $c5_options['opt-sidebar-zalo_4'];?>"><?php echo $c5_options['opt-sidebar-zalo_4'];?></a>
				</li>
				<li>
					<a href="http://zalo.me/<?php echo $c5_options['opt-sidebar-zalo_5'];?>"><?php echo $c5_options['opt-sidebar-zalo_5'];?></a>
				</li>
				<li>
					<a href="http://zalo.me/<?php echo $c5_options['opt-sidebar-zalo_6'];?>"><?php echo $c5_options['opt-sidebar-zalo_6'];?></a>
				</li>
			</ul>
		</div>
		<?php dynamic_sidebar('sidebar-primary'); ?>
	</div><!-- #secondary -->
</div>
