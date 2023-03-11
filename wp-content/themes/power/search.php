<?php
get_header(); ?>

<div class="search-page">
<div class="container">
	<section class="search-result">
		<div class="container">
			<h4  class="title">
				<?php
				$allsearch = new WP_Query("s=$s&showposts=0");
				$countsearch = $allsearch->found_posts;
				printf(esc_html__('Tìm thấy %s kết quả với từ khóa: %s', 'specia'), $countsearch, get_search_query()); ?>
			</h4>
			<form action="https://www.google.com/search" class="search_by_gg" method="get" target="_blank">
				<input type="hidden" name="q" placeholder="Search" value="<?php echo $s ?>">
				<button type="submit"><?php _e('Bạn muốn tìm kiếm bằng google không ?') ?></button>
			</form>
		</div>
	</section>
	<div class="clearfix"></div>
	<section class="page-wrapper search-result-main">
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
</div>
</div>
<?php
get_footer();
?>