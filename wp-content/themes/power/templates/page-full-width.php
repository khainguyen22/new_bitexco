<?php
/**
Template Name: Page Fullwidth
**/
get_header();
get_template_part('sections/specia','breadcrumb'); ?>

<section class="page-wrapper">
	<div class="container">
					
		<div class="row">		
			<div class="col-md-12 col-sm-12" >
				<div class="site-content">
					<?php the_post(); the_content(); ?>
				</div>
				
				<?php comments_template( '', true ); // show comments ?>	
			</div><!-- /.col -->
						
		</div><!-- /.row -->
		
	</div><!-- /.container -->
</section>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>

