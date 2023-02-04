<?php
get_header();?>
 <div class="container">
	<section class="page-wrapper">
		<?php if( have_posts()) :  the_post();?>
		<h2 class="title-section"><span><?php the_title();?></span></h2>					
			<div class="entry-content">
				<!--Blog Detail-->
				<?php the_content(); ?>
			</div>
		<?php endif;?>  
	</section>
</div>
<?php get_footer(); ?>

