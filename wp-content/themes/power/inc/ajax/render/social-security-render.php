<?php

function render_action_social_security($query, $paged = 1)

{

	$pagination = paginate_links(array(

		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),

		'total'        => $query->max_num_pages,

		'current'      => max($paged, get_query_var('paged')),

		'format'       => '?paged=%#%',

		'show_all'     => false,

		'type'         => 'plain',

		'end_size'     => 1,

		'mid_size'     => 3,

		'prev_next'    => true,

		'prev_text'    => sprintf('<i></i> %1$s', __('

						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

								<path d="M15 5L9.66939 11.2191C9.2842 11.6684 9.2842 12.3316 9.66939 12.7809L15 19" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>

						</svg>

						<span>Trước</span>



		', POWER)),

		'next_text'    => sprintf('%1$s <i></i>', __('

		<span>Sau</span>

				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

						<path d="M9 19L14.3306 12.7809C14.7158 12.3316 14.7158 11.6684 14.3306 11.2191L9 5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>

				</svg>

		', POWER)),

		'add_args'     => false,

		'add_fragment' => '',







	));

	ob_start();

	if ($query->have_posts()) : ?>

		<?php while ($query->have_posts()) : $query->the_post();

			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>

			<div class="custom-post d-flex ">
				<a href="<?php echo get_the_permalink() ?>">
					<img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>" class="img-banner">
				</a>
				<div class="content ">

					<h6> <a href="<?php echo get_the_permalink() ?>"><?php echo paint_if_exist(the_title()) ?></a></h6>

					<p class="size-text-16"><?php echo paint_if_exist(get_field('excerpt')) ?></p>

					<?php if (get_the_date()) : ?>

						<span class="tag tag-calender">

							<?php if (get_the_date()) : ?><span class="text size-text-14"><?php echo get_the_date() ?></span><?php endif; ?>

						</span>

					<?php endif; ?>

				</div>

			</div>

		<?php endwhile; ?>

	<?php else :

		not_result();

	endif;

	wp_reset_postdata();

	$shareholder_info = ob_get_contents();

	ob_end_clean();

	return $shareholder_info . "|" . $pagination;
}