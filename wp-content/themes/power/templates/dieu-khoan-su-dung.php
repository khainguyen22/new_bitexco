<?php

/**
 * Template Name: Điều Khoản Sử Dụng
 */
?>
<?php get_header() ?>

<!--  Banner -->
<?php
$banner = get_field('terms_of_use_banner', 'option');
?>
<section class="banner terms not_navigation" style='background-image:url("<?php echo $banner['image']; ?>")'>
	<div class="container">
		<div class="content">
			<?php if ($banner['banner_title']) : ?><h3><?php echo  $banner['banner_title']; ?></h3><?php endif; ?>
			<?php if ($banner['banner_description']) : ?><p class="size-text-16"><?php echo  $banner['banner_description']; ?></p><?php endif; ?>
		</div>
	</div>
</section>
<!-- End  Banner -->

<!-- Privacy Policy -->
<?php
$terms_of_use = get_field('terms_of_use', 'option');
?>
<section class="term-content-box">
	<div class="container">
		<?php if ($terms_of_use['title']) : ?>
			<h5>
				<?php echo paint_if_exist($terms_of_use['title']) ?>
			</h5>
		<?php endif; ?>
		<span class="divider"></span>
		<?php if ($terms_of_use['text']) : ?>
			<div class="terms-content">
				<div>
					<?php echo paint_if_exist($terms_of_use['text']) ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>

<!-- End Privacy Policy -->

<!-- Other Information -->
<?php
$other_info = get_field('terms_of_use_other_information', 'option');
?>
<?php if ($other_info) : ?>
	<section class="other-information">
		<div class="other-container ">
			<div class="other-content hover-zoom">
				<?php foreach ($other_info as $value) : ?>
					<a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<!-- End other information -->
<?php get_footer() ?>