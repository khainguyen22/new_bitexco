<?php



/**

 * Template Name: Thông Báo Mời Thầu

 */

?>

<?php get_header() ?>

<!-- Banner -->

<?php

$banner = get_field('tender_notice_banner', 'option');

$navigation = '';

if (isset($banner)) {

	$navigation = $banner['navigation'];
}





?>

<div class="tender_notice">

	<!-- Banner -->

	<section class="banner tender-notice-banner" style='background-image:url("<?php echo $banner['image']; ?>")'>

		<div class="container">

			<div class="content">

				<h3><?php echo isset($banner['banner_title']) ? $banner['banner_title'] : ""; ?></h3>

				<p class="size-text-16"><?php echo isset($banner['banner_description']) ? $banner['banner_description'] : ""; ?></p>

			</div>

			<div class="navigation">

				<?php if (isset($navigation)) : ?>

					<ul>

						<?php foreach ($navigation as $key => $value) : ?>

							<li class="nav<?php echo $key == 0 ? ' active' : '' ?>" data-number="<?php echo $key ?>"><?php echo paint_if_exist($value['label']) ?></li>

						<?php endforeach; ?>

					</ul>

				<?php endif; ?>

			</div>

		</div>

	</section>

	<!-- End Banner -->



	<!-- Filter -->

	<section class="filter-form tender-notice tender active" data-number="0">

		<div class="container">

			<div class="form-filter">

				<div class="filter-item form-filter-search d-flex">

					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">

						<circle cx="11" cy="11" r="8" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>

						<path d="M16.5 16.958L21.5 21.958" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>

					</svg>

					<input type="text" placeholder="Tìm kiếm">

				</div>

				<?php

				$tax_name = get_taxonomy('type')->label;

				$terms = get_terms(array(

					'taxonomy' => 'type',

					'hide_empty' => false,

				));

				?>

				<div class="filter-item form-filter-type">

					<?php if (isset($tax_name)) : ?>
						<span class="item-default"><?php echo paint_if_exist($tax_name) ?></span>
					<?php endif ?>
					<ul>

						<?php if (isset($tax_name)) : ?>

							<li class="item active first"><?php echo paint_if_exist($tax_name) ?></li>

						<?php endif ?>

						<?php foreach ($terms as $key => $value) : ?>

							<li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>

						<?php endforeach; ?>

					</ul>

					<svg class="dropdown-icon" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">

						<path d="M5.75 9L11.9691 14.3306C12.4184 14.7158 13.0816 14.7158 13.5309 14.3306L19.75 9" stroke="#434449" stroke-width="1.5" stroke-linecap="round" />

					</svg>

				</div>

				<?php

				$tax_name = get_taxonomy('field')->label;

				$terms = get_terms(array(

					'taxonomy' => 'field',

					'hide_empty' => false,

				));

				?>

				<div class="filter-item form-filter-field">
					<?php if (isset($tax_name)) : ?>
						<span class="item-default"><?php echo paint_if_exist($tax_name) ?></span>
					<?php endif ?>
					<ul>

						<?php if (isset($tax_name)) : ?>

							<li class="item active first"><?php echo paint_if_exist($tax_name) ?></li>

						<?php endif ?>

						<?php foreach ($terms as $key => $value) : ?>

							<li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>

						<?php endforeach; ?>

					</ul>

					<svg class="dropdown-icon" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">

						<path d="M5.75 9L11.9691 14.3306C12.4184 14.7158 13.0816 14.7158 13.5309 14.3306L19.75 9" stroke="#434449" stroke-width="1.5" stroke-linecap="round" />

					</svg>

				</div>

				<div class="filter-item form-filter-date-start">

					<input placeholder="Thời gian" value="Thời gian" class="textbox-n" type="text" onclick="(this.type='date')" id="date">

					<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">

						<path d="M21.25 6C21.25 4.34315 19.9069 3 18.25 3L6.25 3C4.59315 3 3.25 4.34314 3.25 6L3.25 18C3.25 19.6569 4.59314 21 6.25 21L18.25 21C19.9069 21 21.25 19.6569 21.25 18L21.25 6Z" stroke="#2B3F6C" stroke-width="1.5" />

						<path d="M21.25 8L3.25 8" stroke="#2B3F6C" stroke-width="1.5" stroke-linejoin="round" />

						<path d="M7.75 1.5L7.75 4.5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M16.75 1.5L16.75 4.5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M17.75 12L16.75 12" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M12.75 12L11.75 12" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M7.75 12L6.75 12" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M17.75 16L16.75 16" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M12.75 16L11.75 16" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M7.75 16L6.75 16" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

					</svg>

				</div>

				<div class="filter-btn button-submit">

					<button class="btn btn-search btn-submit"><?php _e("Tìm Kiếm", POWER) ?></button>

				</div>

				<div class="filter-btn button-reset">

					<button class="btn btn-reset"><?php _e("Đặt lại", POWER) ?></button>

				</div>

			</div>

		</div>

	</section>

	<!-- End  Filter -->



	<!-- List -->

	<?php

	$paged = 1;

	$args = [

		'post_type' => 'tender_notice',

		'posts_per_page' => 8,

		'paged' =>  $paged,

	];



	$query = new WP_Query($args);

	// Pagination

	$pagination = paginate_links(array(

		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),

		'total'        => $query->max_num_pages,

		'current'      => max($paged, get_query_var('paged')),

		'format'       => '?paged=%#%',

		'show_all'     => true,

		'type'         => 'plain',

		'end_size'     => 1,

		'mid_size'     => $paged,

		'prev_next'    => true,

		'prev_text'    => sprintf('<i></i> %1$s', __('

								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

										<path d="M15 5L9.66939 11.2191C9.2842 11.6684 9.2842 12.3316 9.66939 12.7809L15 19" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>

								</svg>

								<span data-paged=' . $paged . '>Trước</span>

				', POWER)),

		'next_text'    => sprintf('%1$s <i></i>', __('<span data-paged=' . $paged . '>Sau</span>

						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

								<path d="M9 19L14.3306 12.7809C14.7158 12.3316 14.7158 11.6684 14.3306 11.2191L9 5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>

						</svg>

				', POWER)),

		'add_args'     => false,

		'add_fragment' => '',

	));

	?>

	<section class="infomation-list tender tender-infor <?php echo $_GET['result'] == 'true' ? '' : 'active' ?>" data-number="0" id="infor">

		<div class="container">

			<div class="list">

				<?php if ($query->have_posts()) : ?>

					<?php while ($query->have_posts()) : $query->the_post(); ?>

						<div class="item" data-post-ID="<?php echo get_the_ID() ?>">

							<div class="d-flex justify-content-between head">

								<a href="<?php the_permalink() ?>">
									<h6 class="title"><?php echo paint_if_exist(get_the_title(get_the_ID())) ?></h6>
								</a>

								<?php foreach (get_the_terms(get_the_ID(), 'status') as $key => $value) : ?>

									<span class="status status-info status-<?php echo paint_if_exist($value->slug) ?>"><?php echo paint_if_exist($value->name) ?></span>

								<?php endforeach; ?>

							</div>

							<div class="content">

								<span class="tag">

									<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">

										<g clip-path="url(#clip0_12327_38237)">

											<path d="M18.75 10.8712H16.875V7.74617C16.8779 7.59995 16.8295 7.45733 16.7382 7.34313C16.6468 7.22893 16.5183 7.15039 16.375 7.12117L3.875 4.62117C3.78421 4.60328 3.69058 4.60577 3.60087 4.62847C3.51116 4.65117 3.42761 4.6935 3.35625 4.75242C3.28291 4.8119 3.224 4.88723 3.18395 4.97275C3.14389 5.05826 3.12374 5.15174 3.125 5.24617V10.8712H1.25C1.08424 10.8712 0.925268 10.937 0.808058 11.0542C0.690848 11.1714 0.625 11.3304 0.625 11.4962V22.7462C0.625 22.9119 0.690848 23.0709 0.808058 23.1881C0.925268 23.3053 1.08424 23.3712 1.25 23.3712H18.75C18.9158 23.3712 19.0747 23.3053 19.1919 23.1881C19.3092 23.0709 19.375 22.9119 19.375 22.7462V11.4962C19.375 11.3304 19.3092 11.1714 19.1919 11.0542C19.0747 10.937 18.9158 10.8712 18.75 10.8712ZM1.875 12.1212H3.125V22.1212H1.875V12.1212ZM4.375 11.4962V6.00867L15.625 8.25867V22.1212H12.5V18.3712C12.5 18.2054 12.4342 18.0464 12.3169 17.9292C12.1997 17.812 12.0408 17.7462 11.875 17.7462H8.125C7.95924 17.7462 7.80027 17.812 7.68306 17.9292C7.56585 18.0464 7.5 18.2054 7.5 18.3712V22.1212H4.375V11.4962ZM8.75 22.1212V18.9962H11.25V22.1212H8.75ZM18.125 22.1212H16.875V12.1212H18.125V22.1212Z" fill="#7E8189" />

											<path d="M6.5625 12.125H9.0625C9.22826 12.125 9.38723 12.0592 9.50444 11.9419C9.62165 11.8247 9.6875 11.6658 9.6875 11.5V9C9.6875 8.83424 9.62165 8.67527 9.50444 8.55806C9.38723 8.44085 9.22826 8.375 9.0625 8.375H6.5625C6.39674 8.375 6.23777 8.44085 6.12056 8.55806C6.00335 8.67527 5.9375 8.83424 5.9375 9V11.5C5.9375 11.6658 6.00335 11.8247 6.12056 11.9419C6.23777 12.0592 6.39674 12.125 6.5625 12.125ZM7.1875 9.625H8.4375V10.875H7.1875V9.625Z" fill="#7E8189" />

											<path d="M9.0625 16.5C9.22826 16.5 9.38723 16.4342 9.50444 16.3169C9.62165 16.1997 9.6875 16.0408 9.6875 15.875V13.375C9.6875 13.2092 9.62165 13.0503 9.50444 12.9331C9.38723 12.8158 9.22826 12.75 9.0625 12.75H6.5625C6.39674 12.75 6.23777 12.8158 6.12056 12.9331C6.00335 13.0503 5.9375 13.2092 5.9375 13.375V15.875C5.9375 16.0408 6.00335 16.1997 6.12056 16.3169C6.23777 16.4342 6.39674 16.5 6.5625 16.5H9.0625ZM7.1875 14H8.4375V15.25H7.1875V14Z" fill="#7E8189" />

											<path d="M10.9375 12.125H13.4375C13.6033 12.125 13.7622 12.0592 13.8794 11.9419C13.9967 11.8247 14.0625 11.6658 14.0625 11.5V9C14.0625 8.83424 13.9967 8.67527 13.8794 8.55806C13.7622 8.44085 13.6033 8.375 13.4375 8.375H10.9375C10.7717 8.375 10.6128 8.44085 10.4956 8.55806C10.3783 8.67527 10.3125 8.83424 10.3125 9V11.5C10.3125 11.6658 10.3783 11.8247 10.4956 11.9419C10.6128 12.0592 10.7717 12.125 10.9375 12.125ZM11.5625 9.625H12.8125V10.875H11.5625V9.625Z" fill="#7E8189" />

											<path d="M10.9375 16.5H13.4375C13.6033 16.5 13.7622 16.4342 13.8794 16.3169C13.9967 16.1997 14.0625 16.0408 14.0625 15.875V13.375C14.0625 13.2092 13.9967 13.0503 13.8794 12.9331C13.7622 12.8158 13.6033 12.75 13.4375 12.75H10.9375C10.7717 12.75 10.6128 12.8158 10.4956 12.9331C10.3783 13.0503 10.3125 13.2092 10.3125 13.375V15.875C10.3125 16.0408 10.3783 16.1997 10.4956 16.3169C10.6128 16.4342 10.7717 16.5 10.9375 16.5ZM11.5625 14H12.8125V15.25H11.5625V14Z" fill="#7E8189" />

										</g>

										<defs>

											<clipPath id="clip0_12327_38237">

												<rect width="20" height="20" fill="white" transform="translate(0 4)" />

											</clipPath>

										</defs>

									</svg>

									<span class="item-child">

										<strong><?php _e('Bên mời thầu:', POWER) ?></strong>

										<span><?php echo paint_if_exist(get_field('bid_solicitor', get_the_ID())) ?></span>

									</span>

								</span>

								<span class="tag">

									<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">

										<path d="M2.5 9C2.5 7.61929 3.61929 6.5 5 6.5H15C16.3807 6.5 17.5 7.61929 17.5 9V19C17.5 20.3807 16.3807 21.5 15 21.5H5C3.61929 21.5 2.5 20.3807 2.5 19V9Z" stroke="#7E8189" stroke-width="1.5" />

										<path d="M2.5 10.6667H17.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round" />

										<path d="M13.75 5.25L13.75 7.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

										<path d="M6.25001 5.25L6.25001 7.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

										<path d="M5.41666 14.0052H6.24999" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

										<path d="M9.58331 14.0052H10.4166" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

										<path d="M13.75 14.0052H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

										<path d="M5.41666 17.3411H6.24999" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

										<path d="M9.58331 17.3411H10.4166" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

										<path d="M13.75 17.3411H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

									</svg>

									<span class="item-child">

										<strong><?php _e('Phát hành:', POWER) ?></strong>

										<span><?php echo paint_if_exist('Từ ' . date("d/m/Y", strtotime(get_field('release', get_the_ID())))) ?> <?php echo paint_if_exist(' Đến ' . date("d/m/Y", strtotime(get_field('release_end', get_the_ID())))) ?>

										</span></span>

								</span>

								<span class="tag">

									<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">

										<path d="M1.66669 11.3594C1.66669 10.2548 2.56212 9.35938 3.66669 9.35938H16.3334C17.4379 9.35938 18.3334 10.2548 18.3334 11.3594V12.157C18.3334 13.0402 17.754 13.8189 16.908 14.0727L11.1494 15.8002C10.3997 16.0252 9.60039 16.0252 8.85063 15.8002L3.09199 14.0727C2.24602 13.8189 1.66669 13.0402 1.66669 12.157V11.3594Z" stroke="#7E8189" stroke-width="1.5" />

										<path d="M10 13.6395L10 12.2109" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

										<path d="M2.36118 13.6406L2.36118 17.4977C2.36118 19.7069 4.15204 21.4977 6.36118 21.4977H13.639C15.8481 21.4977 17.639 19.7069 17.639 17.4977V13.6406" stroke="#7E8189" stroke-width="1.5" />

										<path d="M12.7778 9.35713V8.5C12.7778 7.39543 11.8824 6.5 10.7778 6.5H9.22223C8.11766 6.5 7.22223 7.39543 7.22223 8.5L7.22223 9.35713" stroke="#7E8189" stroke-width="1.5" />

									</svg>

									<span class="item-child">

										<strong><?php _e('Lĩnh vực:', POWER) ?></strong>

										<?php foreach (get_the_terms(get_the_ID(), 'field') as $key => $value) : ?>

											<span><?php echo paint_if_exist($value->name) ?></span>

										<?php endforeach; ?>

									</span>

								</span>

							</div>

						</div>

					<?php endwhile; ?>

				<?php endif;

				wp_reset_postdata(); ?>

			</div>

			<div class="pagination">

				<?php echo $pagination; ?>

			</div>

		</div>

	</section>

	<!-- End List -->



	<!-- Filter Contractor Celection Result -->

	<section class="filter-form contractor-celection-results-form tender" data-number="1">

		<div class="container">

			<div class="form-filter">

				<div class="filter-item form-filter-search d-flex">

					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">

						<circle cx="11" cy="11" r="8" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>

						<path d="M16.5 16.958L21.5 21.958" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>

					</svg>

					<input type="text" placeholder="Tìm kiếm">

				</div>

				<?php

				$tax_name = get_taxonomy('type')->label;

				$terms = get_terms(array(

					'taxonomy' => 'type',

					'hide_empty' => false,

				));

				?>

				<div class="filter-item form-filter-type">

					<?php if (isset($tax_name)) : ?>
						<span class="item-default"><?php echo paint_if_exist($tax_name) ?></span>
					<?php endif ?>
					<ul>

						<?php if (isset($tax_name)) : ?>

							<li class="item active first"><?php echo paint_if_exist($tax_name) ?></li>

						<?php endif ?>

						<?php foreach ($terms as $key => $value) : ?>

							<li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>

						<?php endforeach; ?>

					</ul>

					<svg class="dropdown-icon" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">

						<path d="M5.75 9L11.9691 14.3306C12.4184 14.7158 13.0816 14.7158 13.5309 14.3306L19.75 9" stroke="#434449" stroke-width="1.5" stroke-linecap="round" />

					</svg>

				</div>

				<?php

				$tax_name = get_taxonomy('field')->label;

				$terms = get_terms(array(

					'taxonomy' => 'field',

					'hide_empty' => false,

				));

				?>

				<div class="filter-item form-filter-field">

					<?php if (isset($tax_name)) : ?>
						<span class="item-default"><?php echo paint_if_exist($tax_name) ?></span>
					<?php endif ?>
					<ul>

						<?php if (isset($tax_name)) : ?>

							<li class="item active first"><?php echo paint_if_exist($tax_name) ?></li>

						<?php endif ?>

						<?php foreach ($terms as $key => $value) : ?>

							<li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>

						<?php endforeach; ?>

					</ul>

					<svg class="dropdown-icon" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">

						<path d="M5.75 9L11.9691 14.3306C12.4184 14.7158 13.0816 14.7158 13.5309 14.3306L19.75 9" stroke="#434449" stroke-width="1.5" stroke-linecap="round" />

					</svg>

				</div>

				<div class="filter-item form-filter-date-start">

					<input placeholder="Thời gian" class="textbox-n" type="text" onclick="(this.type='date')" id="date">

					<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">

						<path d="M21.25 6C21.25 4.34315 19.9069 3 18.25 3L6.25 3C4.59315 3 3.25 4.34314 3.25 6L3.25 18C3.25 19.6569 4.59314 21 6.25 21L18.25 21C19.9069 21 21.25 19.6569 21.25 18L21.25 6Z" stroke="#2B3F6C" stroke-width="1.5" />

						<path d="M21.25 8L3.25 8" stroke="#2B3F6C" stroke-width="1.5" stroke-linejoin="round" />

						<path d="M7.75 1.5L7.75 4.5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M16.75 1.5L16.75 4.5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M17.75 12L16.75 12" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M12.75 12L11.75 12" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M7.75 12L6.75 12" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M17.75 16L16.75 16" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M12.75 16L11.75 16" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

						<path d="M7.75 16L6.75 16" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

					</svg>

				</div>

				<div class="filter-btn button-submit">

					<button class="btn btn-search btn-submit"><?php _e("Tìm Kiếm", POWER) ?></button>

				</div>

				<div class="filter-btn button-reset">

					<button class="btn btn-reset"><?php _e("Đặt lại", POWER) ?></button>

				</div>

			</div>

		</div>

	</section>

	<!-- End  Filter -->



	<!-- Contractor Celection Results List  -->



	<?php

	$paged = 1;

	$args = [

		'post_type' => 'selection_results',

		'posts_per_page' => 8,

		'paged' =>  $paged,

	];



	$query = new WP_Query($args);

	// Pagination

	$pagination = paginate_links(array(

		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),

		'total'        => $query->max_num_pages,

		'current'      => max($paged, get_query_var('paged')),

		'format'       => '?paged=%#%',

		'show_all'     => true,

		'type'         => 'plain',

		'end_size'     => 1,

		'mid_size'     => $paged,

		'prev_next'    => true,

		'prev_text'    => sprintf('<i></i> %1$s', __('

								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

										<path d="M15 5L9.66939 11.2191C9.2842 11.6684 9.2842 12.3316 9.66939 12.7809L15 19" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>

								</svg>

								<span data-paged=' . $paged . '>Trước</span>

				', POWER)),

		'next_text'    => sprintf('%1$s <i></i>', __('<span data-paged=' . $paged . '>Sau</span>

						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

								<path d="M9 19L14.3306 12.7809C14.7158 12.3316 14.7158 11.6684 14.3306 11.2191L9 5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>

						</svg>

				', POWER)),

		'add_args'     => false,

		'add_fragment' => '',

	));





	?>

	<section class="infomation-list contractor-celection-results-list tender <?php echo $_GET['result'] == 'true' ? 'active' : '' ?>" data-number="1" id="result">

		<div class="container">

			<div class="list">

				<?php if ($query->have_posts()) : ?>

					<?php while ($query->have_posts()) : $query->the_post(); ?>

						<div class="item" data-post-ID="<?php echo get_the_ID() ?>">

							<div class="item-date">

								<?php

								$date = get_field('bid_winning_date', get_the_ID(), false);

								$y = substr($date, 0, 4); //Year

								$m = substr($date, 4, 2); //Month

								$d = substr($date, 6, 2); //date

								?>

								<span class="day"><?php echo paint_if_exist($d) ?></span>

								<span class="month-year"><?php echo paint_if_exist($m) . "/" . paint_if_exist($y) ?></span>

							</div>

							<div class="item-data">

								<div class="d-flex justify-content-between head">

									<a href="<?php the_permalink() ?>">
										<h6 class="title"><?php echo paint_if_exist(get_the_title(get_the_ID())) ?></h6>
									</a>

								</div>

								<div class="content">

									<span class="tag">

										<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">

											<g clip-path="url(#clip0_12327_38237)">

												<path d="M18.75 10.8712H16.875V7.74617C16.8779 7.59995 16.8295 7.45733 16.7382 7.34313C16.6468 7.22893 16.5183 7.15039 16.375 7.12117L3.875 4.62117C3.78421 4.60328 3.69058 4.60577 3.60087 4.62847C3.51116 4.65117 3.42761 4.6935 3.35625 4.75242C3.28291 4.8119 3.224 4.88723 3.18395 4.97275C3.14389 5.05826 3.12374 5.15174 3.125 5.24617V10.8712H1.25C1.08424 10.8712 0.925268 10.937 0.808058 11.0542C0.690848 11.1714 0.625 11.3304 0.625 11.4962V22.7462C0.625 22.9119 0.690848 23.0709 0.808058 23.1881C0.925268 23.3053 1.08424 23.3712 1.25 23.3712H18.75C18.9158 23.3712 19.0747 23.3053 19.1919 23.1881C19.3092 23.0709 19.375 22.9119 19.375 22.7462V11.4962C19.375 11.3304 19.3092 11.1714 19.1919 11.0542C19.0747 10.937 18.9158 10.8712 18.75 10.8712ZM1.875 12.1212H3.125V22.1212H1.875V12.1212ZM4.375 11.4962V6.00867L15.625 8.25867V22.1212H12.5V18.3712C12.5 18.2054 12.4342 18.0464 12.3169 17.9292C12.1997 17.812 12.0408 17.7462 11.875 17.7462H8.125C7.95924 17.7462 7.80027 17.812 7.68306 17.9292C7.56585 18.0464 7.5 18.2054 7.5 18.3712V22.1212H4.375V11.4962ZM8.75 22.1212V18.9962H11.25V22.1212H8.75ZM18.125 22.1212H16.875V12.1212H18.125V22.1212Z" fill="#7E8189" />

												<path d="M6.5625 12.125H9.0625C9.22826 12.125 9.38723 12.0592 9.50444 11.9419C9.62165 11.8247 9.6875 11.6658 9.6875 11.5V9C9.6875 8.83424 9.62165 8.67527 9.50444 8.55806C9.38723 8.44085 9.22826 8.375 9.0625 8.375H6.5625C6.39674 8.375 6.23777 8.44085 6.12056 8.55806C6.00335 8.67527 5.9375 8.83424 5.9375 9V11.5C5.9375 11.6658 6.00335 11.8247 6.12056 11.9419C6.23777 12.0592 6.39674 12.125 6.5625 12.125ZM7.1875 9.625H8.4375V10.875H7.1875V9.625Z" fill="#7E8189" />

												<path d="M9.0625 16.5C9.22826 16.5 9.38723 16.4342 9.50444 16.3169C9.62165 16.1997 9.6875 16.0408 9.6875 15.875V13.375C9.6875 13.2092 9.62165 13.0503 9.50444 12.9331C9.38723 12.8158 9.22826 12.75 9.0625 12.75H6.5625C6.39674 12.75 6.23777 12.8158 6.12056 12.9331C6.00335 13.0503 5.9375 13.2092 5.9375 13.375V15.875C5.9375 16.0408 6.00335 16.1997 6.12056 16.3169C6.23777 16.4342 6.39674 16.5 6.5625 16.5H9.0625ZM7.1875 14H8.4375V15.25H7.1875V14Z" fill="#7E8189" />

												<path d="M10.9375 12.125H13.4375C13.6033 12.125 13.7622 12.0592 13.8794 11.9419C13.9967 11.8247 14.0625 11.6658 14.0625 11.5V9C14.0625 8.83424 13.9967 8.67527 13.8794 8.55806C13.7622 8.44085 13.6033 8.375 13.4375 8.375H10.9375C10.7717 8.375 10.6128 8.44085 10.4956 8.55806C10.3783 8.67527 10.3125 8.83424 10.3125 9V11.5C10.3125 11.6658 10.3783 11.8247 10.4956 11.9419C10.6128 12.0592 10.7717 12.125 10.9375 12.125ZM11.5625 9.625H12.8125V10.875H11.5625V9.625Z" fill="#7E8189" />

												<path d="M10.9375 16.5H13.4375C13.6033 16.5 13.7622 16.4342 13.8794 16.3169C13.9967 16.1997 14.0625 16.0408 14.0625 15.875V13.375C14.0625 13.2092 13.9967 13.0503 13.8794 12.9331C13.7622 12.8158 13.6033 12.75 13.4375 12.75H10.9375C10.7717 12.75 10.6128 12.8158 10.4956 12.9331C10.3783 13.0503 10.3125 13.2092 10.3125 13.375V15.875C10.3125 16.0408 10.3783 16.1997 10.4956 16.3169C10.6128 16.4342 10.7717 16.5 10.9375 16.5ZM11.5625 14H12.8125V15.25H11.5625V14Z" fill="#7E8189" />

											</g>

											<defs>

												<clipPath id="clip0_12327_38237">

													<rect width="20" height="20" fill="white" transform="translate(0 4)" />

												</clipPath>

											</defs>

										</svg>

										<span class="item-child">

											<strong><?php _e('Đơn vị trúng thầu:', POWER) ?></strong>

											<span><?php echo paint_if_exist(get_field('winning_bidders', get_the_ID())) ?></span>

										</span>

									</span>

									<span class="tag winning-bid-price-tag">

										<svg width="20" height="25" viewBox="0 0 20 25" fill="none" xmlns="http://www.w3.org/2000/svg">

											<g clip-path="url(#clip0_12594_38964)">

												<path d="M10 4.5C8.02219 4.5 6.08879 5.08649 4.4443 6.1853C2.79981 7.28412 1.51809 8.8459 0.761209 10.6732C0.00433283 12.5004 -0.1937 14.5111 0.192152 16.4509C0.578004 18.3907 1.53041 20.1725 2.92894 21.5711C4.32746 22.9696 6.10929 23.922 8.0491 24.3078C9.98891 24.6937 11.9996 24.4957 13.8268 23.7388C15.6541 22.9819 17.2159 21.7002 18.3147 20.0557C19.4135 18.4112 20 16.4778 20 14.5C19.9972 11.8487 18.9427 9.30681 17.0679 7.43206C15.1932 5.55731 12.6513 4.50284 10 4.5ZM10 23.0714C8.30473 23.0714 6.64754 22.5687 5.23797 21.6269C3.82841 20.685 2.72979 19.3464 2.08104 17.7801C1.43229 16.2139 1.26254 14.4905 1.59327 12.8278C1.924 11.1651 2.74035 9.63782 3.93909 8.43908C5.13782 7.24035 6.66511 6.424 8.3278 6.09327C9.99049 5.76254 11.7139 5.93228 13.2801 6.58103C14.8464 7.22978 16.185 8.3284 17.1269 9.73797C18.0687 11.1475 18.5714 12.8047 18.5714 14.5C18.569 16.7725 17.6651 18.9513 16.0582 20.5582C14.4513 22.1651 12.2725 23.069 10 23.0714Z" fill="#7E8189" />

												<path d="M11.7858 13.7846H10.7144V11.6417H12.8572C13.0467 11.6417 13.2283 11.5665 13.3623 11.4325C13.4962 11.2986 13.5715 11.1169 13.5715 10.9275C13.5715 10.738 13.4962 10.5563 13.3623 10.4224C13.2283 10.2884 13.0467 10.2132 12.8572 10.2132H10.7144V8.7846C10.7144 8.59516 10.6391 8.41348 10.5051 8.27952C10.3712 8.14557 10.1895 8.07031 10.0001 8.07031C9.81063 8.07031 9.62895 8.14557 9.49499 8.27952C9.36104 8.41348 9.28578 8.59516 9.28578 8.7846V10.2132H8.21435C7.55131 10.2132 6.91543 10.4766 6.44659 10.9454C5.97775 11.4142 5.71436 12.0501 5.71436 12.7132C5.71436 13.3762 5.97775 14.0121 6.44659 14.4809C6.91543 14.9498 7.55131 15.2132 8.21435 15.2132H9.28578V17.356H7.14293C6.95349 17.356 6.77181 17.4313 6.63785 17.5652C6.5039 17.6992 6.42864 17.8809 6.42864 18.0703C6.42864 18.2598 6.5039 18.4414 6.63785 18.5754C6.77181 18.7093 6.95349 18.7846 7.14293 18.7846H9.28578V20.2132C9.28578 20.4026 9.36104 20.5843 9.49499 20.7182C9.62895 20.8522 9.81063 20.9275 10.0001 20.9275C10.1895 20.9275 10.3712 20.8522 10.5051 20.7182C10.6391 20.5843 10.7144 20.4026 10.7144 20.2132V18.7846H11.7858C12.4488 18.7846 13.0847 18.5212 13.5535 18.0524C14.0224 17.5835 14.2858 16.9476 14.2858 16.2846C14.2858 15.6216 14.0224 14.9857 13.5535 14.5168C13.0847 14.048 12.4488 13.7846 11.7858 13.7846ZM9.28578 13.7846H8.21435C7.93019 13.7846 7.65767 13.6717 7.45674 13.4708C7.25581 13.2699 7.14293 12.9973 7.14293 12.7132C7.14293 12.429 7.25581 12.1565 7.45674 11.9556C7.65767 11.7546 7.93019 11.6417 8.21435 11.6417H9.28578V13.7846ZM11.7858 17.356H10.7144V15.2132H11.7858C12.0699 15.2132 12.3425 15.3261 12.5434 15.527C12.7443 15.7279 12.8572 16.0004 12.8572 16.2846C12.8572 16.5688 12.7443 16.8413 12.5434 17.0422C12.3425 17.2431 12.0699 17.356 11.7858 17.356Z" fill="#7E8189" />

											</g>

											<defs>

												<clipPath id="clip0_12594_38964">

													<rect width="20" height="20" fill="white" transform="translate(0 4.5)" />

												</clipPath>

											</defs>

										</svg>

										<span class="item-child winning-bid-price">

											<strong><?php _e('Giá trúng thầu:', POWER) ?></strong>

											<span class="price"><?php echo paint_if_exist(number_format(get_field('winning_bid_price', get_the_ID()), 0, ",", ".") . " VND") ?>

											</span></span>

									</span>

									<span class="tag">

										<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">

											<path d="M1.66669 11.3594C1.66669 10.2548 2.56212 9.35938 3.66669 9.35938H16.3334C17.4379 9.35938 18.3334 10.2548 18.3334 11.3594V12.157C18.3334 13.0402 17.754 13.8189 16.908 14.0727L11.1494 15.8002C10.3997 16.0252 9.60039 16.0252 8.85063 15.8002L3.09199 14.0727C2.24602 13.8189 1.66669 13.0402 1.66669 12.157V11.3594Z" stroke="#7E8189" stroke-width="1.5" />

											<path d="M10 13.6395L10 12.2109" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

											<path d="M2.36118 13.6406L2.36118 17.4977C2.36118 19.7069 4.15204 21.4977 6.36118 21.4977H13.639C15.8481 21.4977 17.639 19.7069 17.639 17.4977V13.6406" stroke="#7E8189" stroke-width="1.5" />

											<path d="M12.7778 9.35713V8.5C12.7778 7.39543 11.8824 6.5 10.7778 6.5H9.22223C8.11766 6.5 7.22223 7.39543 7.22223 8.5L7.22223 9.35713" stroke="#7E8189" stroke-width="1.5" />

										</svg>

										<span class="item-child">

											<strong><?php _e('Lĩnh vực:', POWER) ?></strong>

											<?php foreach (get_the_terms(get_the_ID(), 'field') as $key => $value) : ?>

												<span><?php echo paint_if_exist($value->name) ?></span>

											<?php endforeach; ?>

										</span>

									</span>

								</div>

							</div>

						</div>

					<?php endwhile; ?>

				<?php endif;

				wp_reset_postdata(); ?>

			</div>

			<div class="pagination">

				<?php echo $pagination; ?>

			</div>

		</div>

	</section>



	<!-- End Contractor Celection Results List  -->



	<!-- Other Section -->

	<?php

	$other_info = get_field('tender_notice_other_information', 'option');

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

	<!-- End Other Section -->

</div>

<?php get_footer() ?>