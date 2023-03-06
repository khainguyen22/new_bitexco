<?php
function render_vacancies($query, $paged = 1)

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

		<?php while ($query->have_posts()) : $query->the_post(); ?>

			<div class="item d-flex justify-content-between <?php echo get_field("amount") > 0 ? "" : "disable"; ?>">

				<div class="info d-flex info-position">

					<div>

						<p class="label ">Vị trí tuyển dụng</p>

						<p class="desc"><?php echo the_title(); ?></p>

					</div>

					<div class="hot <?php echo get_field("vi_tri_hot") != 1 ? 'deactive' : 'active'; ?>">

						<img src="https://power.dtts.com.vn/wp-content/uploads/2022/12/hot.png" alt="hot">

					</div>

				</div>

				<div class="d-flex wrap-info">

					<?php if (get_field("address")) : ?>

						<div class="info  info-address">

							<p class="label ">Địa điểm</p>

							<?php foreach (get_the_terms(get_the_ID(), 'vacancies_location') as $key => $value) : ?>

								<p class="desc"> <?php echo paint_if_exist($value->name) ?></p>

							<?php endforeach; ?>

						</div>

					<?php endif; ?>

					<div class="d-flex wrap">

						<div class="info">

							<p class="label ">Số lượng</p>

							<p class="desc"><?php echo get_field("amount") ?></p>

						</div>

						<?php if (get_field("deadline")) : ?>

							<div class="info">

								<p class="label ">Hạn nộp hồ sơ</p>

								<p class="desc"><?php echo get_field("deadline"); ?></p>

							</div>

						<?php endif; ?>

						<?php if (getPostViews(get_the_ID())) : ?>

							<div class="info">

								<p class="label ">Lượt xem</p>

								<p class="desc"><?php echo getPostViews(get_the_ID()) ?></p>

							</div>

						<?php endif; ?>

					</div>

				</div>

				<div class="info wrap-btn">

					<a href="<?php echo the_permalink(); ?>" class="btn btn-detail btn-detail-icon">

						Xem chi tiết

						<svg width="16" height="10" viewBox="0 0 16 10" fill="#DAA622" xmlns="http://www.w3.org/2000/svg">

							<path d="M11.1297 8.66927L14.1482 5.65078C14.5062 5.2928 14.5062 4.7124 14.1482 4.35442L11.1297 1.33594M13.8797 5.0026L1.04639 5.00261" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round" />

						</svg>

					</a>

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