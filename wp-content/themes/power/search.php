<?php
get_header(); ?>

<section class="search-result" style="margin: 130px 0 20px ;">
	<div class="container">
		<h4 style="margin: 0 auto;text-align:center;">
			<?php
			$allsearch = new WP_Query("s=$s&showposts=0");
			$countsearch = $allsearch->found_posts;
			printf(esc_html__('Tìm thấy %s kết quả với từ khóa: %s', 'specia'), $countsearch, get_search_query()); ?>
		</h4>
	</div>
</section>
<div class="clearfix"></div>
<section class="page-wrapper">
	<div class="container">
		<div class="list">
			<?php
			if (have_posts()) :
				/* Start the Loop */
				while (have_posts()) : the_post();
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part('template-parts/content', 'search');

				endwhile;
				the_posts_navigation();
			else :
				get_template_part('template-parts/content', 'none');
			endif; ?>
		</div>
	</div>
</section>
<?php
get_footer();
?>