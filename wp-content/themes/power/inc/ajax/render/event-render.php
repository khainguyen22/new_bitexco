<?php

function render_action_events($query, $paged = 1)

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

			$category = get_the_terms(get_the_ID(), 'type_events');

			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>

			<div class="filter-item">

				<div class="filter-image hover-zoom-img">

					<a href="<?php the_permalink() ?>">

						<img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>">

					</a>

				</div>

				<div class="item-content">

					<?php if ($category) : ?>

						<div class="d-flex category-tag">

							<?php foreach ($category as $cat) : ?>

								<span class="text"><?php echo $cat->name; ?></span>

							<?php endforeach; ?>

						</div>

					<?php else : ?>

						<div class="d-flex category-tag">

							<span class="text">Sự kiện</span>

						</div>

					<?php endif; ?>

					<div class="content-title">

						<h6> <a href="<?php the_permalink() ?>"><?php echo the_title() ?></a></h6>

					</div>

					<?php if (get_field('date')) : ?>

						<div class="date d-flex">

							<div class="icon">

								<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">

									<path d="M1.5 5C1.5 3.61929 2.61929 2.5 4 2.5H14C15.3807 2.5 16.5 3.61929 16.5 5V15C16.5 16.3807 15.3807 17.5 14 17.5H4C2.61929 17.5 1.5 16.3807 1.5 15V5Z" stroke="#7E8189" stroke-width="1.5" />

									<path d="M1.5 6.66667H16.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round" />

									<path d="M12.7502 1.25L12.7502 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

									<path d="M5.25016 1.25L5.25016 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

									<path d="M4.4165 9.9974H5.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

									<path d="M8.58301 9.9974H9.41634" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

									<path d="M12.75 9.9974H13.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

									<path d="M4.4165 13.3294H5.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

									<path d="M8.58301 13.3294H9.41634" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

									<path d="M12.75 13.3294H13.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

								</svg>

							</div>

							<span class="text size-text-16"> <?php echo get_field('date'); ?></span>

						</div>

					<?php endif; ?>

					<?php if (get_field('type') == 1) : ?>

						<?php if (get_field('location')) : ?>

							<div class="type d-flex">

								<div class="icon">

									<svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">

										<path d="M14.8125 8.08333C14.8125 12.9398 9.2875 18 7.90625 18C6.525 18 1 12.9398 1 8.08333C1 4.17132 4.09203 1 7.90625 1C11.7205 1 14.8125 4.17132 14.8125 8.08333Z" stroke="#7E8189" stroke-width="1.5" />

										<circle r="2.65625" transform="matrix(-1 0 0 1 7.90625 7.90625)" stroke="#7E8189" stroke-width="1.5" />

									</svg>

								</div>

								<?php foreach (get_the_terms(get_the_ID(), 'type_events_location') as $key => $value) : ?>

									<span class="text size-text-16"> <?php echo paint_if_exist($value->name) ?></span>

								<?php endforeach; ?>

							</div>

						<?php endif; ?>

					<?php else : ?>

						<?php if (get_field('online')) : ?>

							<div class="type d-flex">

								<div class="icon">

									<svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">

										<path d="M1 13.6H19M2.8 2.8C2.8 2.32261 2.98964 1.86477 3.32721 1.52721C3.66477 1.18964 4.12261 1 4.6 1H15.4C15.8774 1 16.3352 1.18964 16.6728 1.52721C17.0104 1.86477 17.2 2.32261 17.2 2.8V10.9H2.8V2.8Z" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

									</svg>

								</div>

								<a class="text size-text-16" href="<?php echo get_field('online'); ?>" target="_blank">Online</a>

							</div>

						<?php endif; ?>

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

// End Filter & Pagination events