<?php

/**
 * Template Name: Site Map
 */
?>
<?php get_header() ?>
<div class="site-map">
	<!-- Site Map Banner -->
	<?php
	$banner = get_field('site_map_banner', 'option');
	?>

	<section class="banner site-map-banner not_navigation" style='background-image:url("<?php echo $banner['image']; ?>")'>
		<div class="container">
			<div class="content">
				<h3><?php echo isset($banner['banner_title']) ? $banner['banner_title'] : ""; ?></h3>
				<p class="size-text-16"><?php echo isset($banner['banner_description']) ? $banner['banner_description'] : ""; ?></p>
			</div>
		</div>
	</section>
	<!-- End Site Map Banner -->

	<!-- Site Map Content -->

	<?php
	$site_map = get_field('site_map', 'option');
	?>

	<section class="site-map-content-section">
		<div class="site-map-container">
			<div class="sitemap-content">
				<?php foreach ($site_map as $key => $value) : ?>
					<div class="power-production-tab tab">
						<div class="power-production-tab-title tab-title">
							<?php if ($key == 0) : ?>
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2.5 10.9384C2.5 9.71422 3.06058 8.55744 4.02142 7.79888L9.52142 3.45677C10.9747 2.30948 13.0253 2.30948 14.4786 3.45677L19.9786 7.79888C20.9394 8.55744 21.5 9.71422 21.5 10.9384V17.5C21.5 19.7091 19.7091 21.5 17.5 21.5H16C15.4477 21.5 15 21.0523 15 20.5V17.5C15 16.3954 14.1046 15.5 13 15.5H11C9.89543 15.5 9 16.3954 9 17.5V20.5C9 21.0523 8.55228 21.5 8 21.5H6.5C4.29086 21.5 2.5 19.7091 2.5 17.5L2.5 10.9384Z" stroke="#434449" stroke-width="1.5" />
								</svg>
							<?php else : ?>
								<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" style="visibility: <?php echo isset($value['sub']) && $value['sub'] != '' ? 'visible' : 'hidden' ?>">
									<path d="M8.8 13.8L11.3172 11.0891C11.7128 10.6631 12.3872 10.6631 12.7828 11.0891L15.3 13.8M2 12.5C2 6.97715 6.47715 2.5 12 2.5C17.5228 2.5 22 6.97715 22 12.5C22 18.0228 17.5228 22.5 12 22.5C6.47715 22.5 2 18.0228 2 12.5Z" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" />
								</svg>
							<?php endif; ?>
							<h2><a href="<?php echo paint_if_exist($value['title_url']) ?>"><?php echo paint_if_exist($value['title']) ?></a></h2>
						</div>
						<?php if (isset($value['sub']) && $value['sub'] != '') : ?>
							<div class="power-production-tab-content flexed-tab">
								<?php foreach ($value['sub'] as $key => $value) : ?>
									<div class="hydro-electric">
										<h3><a href="<?php echo paint_if_exist($value['sub_title_url']) ?>"><?php echo paint_if_exist($value['sub_title']) ?></a></h3>
										<?php if (isset($value['sub_child']) && $value['sub_child'] != '') : ?>
											<ul>
												<?php foreach ($value['sub_child'] as $key => $value) : ?>
													<li><a href="<?php echo paint_if_exist($value['sub_child_url']) ?>"><?php echo paint_if_exist($value['sub_child_title']) ?></a></li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- End Site Map Content -->

	<!-- Other Information -->
	<?php
	$other_info = get_field('site_map_other_information', 'option');
	?>
	<section class="other-information">
		<div class="other-container ">
			<div class="other-content hover-zoom">
				<?php if ($other_info) : ?>
					<?php foreach ($other_info as $value) : ?>
						<a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- End other information -->
</div>
<?php get_footer() ?>