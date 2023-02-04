<?php
get_header();?>
<!-- Blog & Sidebar Section -->
  <section class="list_news_page">
            <div class="container">
                <div class="row">		
		<?php if( have_posts() ): ?>
		
			<?php while( have_posts() ): the_post(); ?>
			
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
		
			<?php endwhile; ?>
			
			<div class="paginations">
			<?php						
			// Previous/next page navigation.
			the_posts_pagination( array(
			'prev_text' => '<i class="fa fa-angle-double-left"></i>',
			'next_text' => '<i class="fa fa-angle-double-right"></i>',
			) ); ?>
			</div>
			
		<?php else: ?>
			
			<?php get_template_part('template-parts/content','none'); ?>
			
		<?php endif; ?>
	</div>
	  </div>
</section>
<!-- End of Blog & Sidebar Section -->
 
<div class="clearfix"></div>

<?php get_footer(); ?>
