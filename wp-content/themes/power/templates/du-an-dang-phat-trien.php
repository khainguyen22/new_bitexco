<?php

/**
Template Name: Danh mục dự án - Dự án đang phát triển
 **/
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";
$request_uri = "$_SERVER[REDIRECT_URL]";
$banner = get_field('banner_danh_muc_du_an', 'option');
$other_info = get_field('other_info_danh_muc_du_an', 'option');
$navigation = '';
if ($banner) {
	$navigation = $banner['navigation'];
}
$du_an_dang_phat_trien = get_field('du_an_dang_phat_trien', 'option');

// filter
$the_slug = 'du-an-dang-phat-trien';
$name = isset($_GET['name']) && $_GET['name'] ? $_GET['name'] : "";
$location =  isset($_GET['location']) && $_GET['location'] ? $_GET['location'] : "";
$company =  isset($_GET['company']) && $_GET['company'] ? $_GET['company'] : "";
$args = array(
	'post_type' => 'projects',
	'tax_query' => array(
		array(
			'taxonomy' =>  'type_projects',
			'field'    => 'slug',
			'terms'    => $the_slug,
		),
	),
	'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
	'post_status' => 'publish',
);

$filter = array(
	'post_type'    => 'projects',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'tax_query' => array(
		array(
			'taxonomy' =>  'type_projects',
			'field'    => 'slug',
			'terms'    => $the_slug,
		),
	),
);

$filter = new WP_Query($filter);
$the_query_post = new WP_Query($args);
get_header();
?>

<div class="du-an-dang-phat-trien du-an">
	<input type="hidden" name="the_slug" class="the_slug" value="<?php echo $the_slug ?>">
	<section class="banner list" style='background-image:url("<?php echo $banner['background']; ?>")'>
		<div class="container">
			<div class="content">
				<?php if ($banner['title']) : ?><h3><?php echo  $banner['title']; ?></h3><?php endif; ?>
				<?php if ($banner['description']) : ?><p><?php echo  $banner['description']; ?></p><?php endif; ?>
			</div>
			<?php if ($navigation) : ?>
				<div class="navigation">
					<ul>
						<?php foreach ($navigation as $key => $value) : ?>
							<li class="<?php echo strlen(strstr($value['link'], $request_uri)) > 0 ? 'active' : '' ?>"> <a href="<?php echo $value['link']; ?>"><?php echo _e($value['label']); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
		</div>
	</section>
	<section class="du-an-head">
		<div class="container">
			<div class="content">
				<?php if ($du_an_dang_phat_trien['title']) : ?><h3 class="justify-content-center"><?php echo $du_an_dang_phat_trien['title']; ?></h3><?php endif; ?>
				<?php if ($du_an_dang_phat_trien['description']) : ?><p><?php echo $du_an_dang_phat_trien['description']; ?></p><?php endif; ?>
			</div>
		</div>
	</section>
	<section class="filter-post-section">
		<div class="filter-post-container form-filter">
			<div class="small-form-filter">
				<div class="form">
					<div class="form-filter-search d-flex">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<circle cx="11" cy="11" r="8" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
							<path d="M16.5 16.958L21.5 21.958" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
						</svg>
						<input type="text" placeholder="Tìm kiếm" name="name" class="search">
					</div>
					<div class="form-filter-type filter-item">
						<?php
						$tax_project_type = get_taxonomy('project_type')->label;
						$terms = get_terms(array(
							'taxonomy' => 'project_type',
							'hide_empty' => false,
							'orderby' => 'date',
							'order' => 'DESC',
						));
						?>
						<?php if (isset($tax_project_type)) : ?>
							<span class="item-default"><?php echo paint_if_exist($tax_project_type) ?></span>
						<?php endif ?>
						<ul>
							<?php if (isset($tax_project_type)) : ?>
								<li class="item active default first"><?php echo paint_if_exist($tax_project_type) ?></li>
							<?php endif ?>
							<?php foreach ($terms as $key => $value) : ?>
								<li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="form-filter-area filter-item">
						<?php
						$tax_project_location = get_taxonomy('project_location')->label;
						$terms = get_terms(array(
							'taxonomy' => 'project_location',
							'hide_empty' => false,
							'orderby' => 'date',
							'order' => 'DESC',
						));
						?>
						<?php if (isset($tax_project_location)) : ?>
							<span class="item-default"><?php echo paint_if_exist($tax_project_location) ?></span>
						<?php endif ?>
						<ul>
							<?php if (isset($tax_project_location)) : ?>
								<li class="item active default first"><?php echo paint_if_exist($tax_project_location) ?></li>
							<?php endif ?>
							<?php foreach ($terms as $key => $value) : ?>
								<li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="form-filter-company filter-item">
						<?php
						$tax_project_company = get_taxonomy('project_company')->label;
						$terms = get_terms(array(
							'taxonomy' => 'project_company',
							'hide_empty' => false,
							'orderby' => 'date',
							'order' => 'DESC',
						));
						?>
						<?php if (isset($tax_project_company)) : ?>
							<span class="item-default"><?php echo paint_if_exist($tax_project_company) ?></span>
						<?php endif ?>

						<ul>
							<?php if (isset($tax_project_company)) : ?>
								<li class="item active default first"><?php echo paint_if_exist($tax_project_company) ?></li>
							<?php endif ?>
							<?php foreach ($terms as $key => $value) : ?>
								<li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
					<div class="button-submit">
						<button type="submit" class="btn btn-search btn-submit">Tìm kiếm</button>
					</div>
					<div class="button-reset">
						<button class="btn btn-search btn-reset">Đặt lại</button>
					</div>
				</div>
			</div>
			<div class="filter-content">
				<?php if ($the_query_post->have_posts()) : ?>
					<?php while ($the_query_post->have_posts()) : $the_query_post->the_post();
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
						<div class="filter-item">
							<a href="<?php the_permalink() ?>">
								<div class="filter-image hover-zoom-img">
									<img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>">
								</div>
							</a>
							<div class="item-content">
								<div class="content-title">
									<h6> <a href="<?php the_permalink() ?>"><?php echo the_title() ?></a></h6>
									<?php if (get_field("icon")) : ?><img class="icon" src="<?php echo get_field("icon"); ?>" alt="icon"><?php endif; ?>
								</div>
								<?php if (get_field("company")) : ?>
									<div class="filter-company">
										<div class="icon_svg">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
												<g clip-path="url(#clip0_2090_243581)">
													<path d="M18.75 6.87507H16.875V3.75007C16.8779 3.60386 16.8295 3.46124 16.7382 3.34704C16.6468 3.23284 16.5183 3.15429 16.375 3.12507L3.875 0.625072C3.78421 0.607182 3.69058 0.609676 3.60087 0.632374C3.51116 0.655072 3.42761 0.697407 3.35625 0.756322C3.28291 0.815806 3.224 0.891135 3.18395 0.976652C3.14389 1.06217 3.12374 1.15565 3.125 1.25007V6.87507H1.25C1.08424 6.87507 0.925268 6.94092 0.808058 7.05813C0.690848 7.17534 0.625 7.33431 0.625 7.50007V18.7501C0.625 18.9158 0.690848 19.0748 0.808058 19.192C0.925268 19.3092 1.08424 19.3751 1.25 19.3751H18.75C18.9158 19.3751 19.0747 19.3092 19.1919 19.192C19.3092 19.0748 19.375 18.9158 19.375 18.7501V7.50007C19.375 7.33431 19.3092 7.17534 19.1919 7.05813C19.0747 6.94092 18.9158 6.87507 18.75 6.87507ZM1.875 8.12507H3.125V18.1251H1.875V8.12507ZM4.375 7.50007V2.01257L15.625 4.26257V18.1251H12.5V14.3751C12.5 14.2093 12.4342 14.0503 12.3169 13.9331C12.1997 13.8159 12.0408 13.7501 11.875 13.7501H8.125C7.95924 13.7501 7.80027 13.8159 7.68306 13.9331C7.56585 14.0503 7.5 14.2093 7.5 14.3751V18.1251H4.375V7.50007ZM8.75 18.1251V15.0001H11.25V18.1251H8.75ZM18.125 18.1251H16.875V8.12507H18.125V18.1251Z" fill="#7E8189"></path>
													<path d="M6.5625 8.125H9.0625C9.22826 8.125 9.38723 8.05915 9.50444 7.94194C9.62165 7.82473 9.6875 7.66576 9.6875 7.5V5C9.6875 4.83424 9.62165 4.67527 9.50444 4.55806C9.38723 4.44085 9.22826 4.375 9.0625 4.375H6.5625C6.39674 4.375 6.23777 4.44085 6.12056 4.55806C6.00335 4.67527 5.9375 4.83424 5.9375 5V7.5C5.9375 7.66576 6.00335 7.82473 6.12056 7.94194C6.23777 8.05915 6.39674 8.125 6.5625 8.125ZM7.1875 5.625H8.4375V6.875H7.1875V5.625Z" fill="#7E8189"></path>
													<path d="M9.0625 12.5C9.22826 12.5 9.38723 12.4342 9.50444 12.3169C9.62165 12.1997 9.6875 12.0408 9.6875 11.875V9.375C9.6875 9.20924 9.62165 9.05027 9.50444 8.93306C9.38723 8.81585 9.22826 8.75 9.0625 8.75H6.5625C6.39674 8.75 6.23777 8.81585 6.12056 8.93306C6.00335 9.05027 5.9375 9.20924 5.9375 9.375V11.875C5.9375 12.0408 6.00335 12.1997 6.12056 12.3169C6.23777 12.4342 6.39674 12.5 6.5625 12.5H9.0625ZM7.1875 10H8.4375V11.25H7.1875V10Z" fill="#7E8189"></path>
													<path d="M10.9375 8.125H13.4375C13.6033 8.125 13.7622 8.05915 13.8794 7.94194C13.9967 7.82473 14.0625 7.66576 14.0625 7.5V5C14.0625 4.83424 13.9967 4.67527 13.8794 4.55806C13.7622 4.44085 13.6033 4.375 13.4375 4.375H10.9375C10.7717 4.375 10.6128 4.44085 10.4956 4.55806C10.3783 4.67527 10.3125 4.83424 10.3125 5V7.5C10.3125 7.66576 10.3783 7.82473 10.4956 7.94194C10.6128 8.05915 10.7717 8.125 10.9375 8.125ZM11.5625 5.625H12.8125V6.875H11.5625V5.625Z" fill="#7E8189"></path>
													<path d="M10.9375 12.5H13.4375C13.6033 12.5 13.7622 12.4342 13.8794 12.3169C13.9967 12.1997 14.0625 12.0408 14.0625 11.875V9.375C14.0625 9.20924 13.9967 9.05027 13.8794 8.93306C13.7622 8.81585 13.6033 8.75 13.4375 8.75H10.9375C10.7717 8.75 10.6128 8.81585 10.4956 8.93306C10.3783 9.05027 10.3125 9.20924 10.3125 9.375V11.875C10.3125 12.0408 10.3783 12.1997 10.4956 12.3169C10.6128 12.4342 10.7717 12.5 10.9375 12.5ZM11.5625 10H12.8125V11.25H11.5625V10Z" fill="#7E8189"></path>
												</g>
												<defs>
													<clipPath id="clip0_2090_243581">
														<rect width="20" height="20" fill="white"></rect>
													</clipPath>
												</defs>
											</svg>
										</div>
										<div>
											<?php foreach (get_the_terms(get_the_ID(), 'project_company') as $key => $value) : ?>
												<p><?php echo paint_if_exist($value->name) ?></p>
											<?php endforeach; ?>
										</div>
									</div>
								<?php endif; ?>
								<?php if (get_field("date")) : ?>
									<div class="content-time">
										<div class="icon_svg">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
												<path d="M2.5 5C2.5 3.61929 3.61929 2.5 5 2.5H15C16.3807 2.5 17.5 3.61929 17.5 5V15C17.5 16.3807 16.3807 17.5 15 17.5H5C3.61929 17.5 2.5 16.3807 2.5 15V5Z" stroke="#7E8189" stroke-width="1.5"></path>
												<path d="M2.5 6.66667H17.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round"></path>
												<path d="M13.7502 1.25L13.7502 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M6.25016 1.25L6.25016 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M5.4165 9.99935H6.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M9.58301 9.99935H10.4163" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M13.75 9.99935H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M5.4165 13.3324H6.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M9.58301 13.3324H10.4163" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M13.75 13.3324H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
											</svg>
										</div>
										<p><?php echo get_field("date"); ?></p>
									</div>
								<?php endif; ?>
								<?php if (get_field('address', get_the_ID())) : ?>
									<div class="content-location">
										<div class="icon_svg">
											<svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
												<path d="M16.8125 8.08333C16.8125 10.3393 15.5177 12.7061 13.9926 14.5435C13.2367 15.4542 12.4427 16.2122 11.7624 16.7378C11.4217 17.001 11.1178 17.1996 10.8682 17.3298C10.6021 17.4687 10.4538 17.5 10.4062 17.5V18.5C10.704 18.5 11.0305 18.3732 11.3309 18.2163C11.6479 18.0509 12.0022 17.8162 12.3738 17.5291C13.1179 16.9542 13.964 16.1436 14.7621 15.1822C16.3448 13.2754 17.8125 10.6839 17.8125 8.08333H16.8125ZM10.4062 17.5C10.3587 17.5 10.2104 17.4687 9.94428 17.3298C9.69473 17.1996 9.39081 17.001 9.05013 16.7378C8.36981 16.2122 7.57577 15.4542 6.81989 14.5435C5.2948 12.7061 4 10.3393 4 8.08333H3C3 10.6839 4.4677 13.2754 6.05042 15.1822C6.84845 16.1436 7.69464 16.9542 8.43873 17.5291C8.81026 17.8162 9.1646 18.0509 9.48157 18.2163C9.78202 18.3732 10.1085 18.5 10.4062 18.5V17.5ZM4 8.08333C4 4.43545 6.88003 1.5 10.4062 1.5V0.5C6.30403 0.5 3 3.90718 3 8.08333H4ZM10.4062 1.5C13.9325 1.5 16.8125 4.43545 16.8125 8.08333H17.8125C17.8125 3.90718 14.5085 0.5 10.4062 0.5V1.5Z" fill="#7E8189"></path>
												<circle r="2.65625" transform="matrix(-1 0 0 1 10.4062 7.90625)" stroke="#7E8189"></circle>
											</svg>
										</div>
										<div>
											<a href="<?php echo get_field('map_link', get_the_ID()) ?>" target="_blank">
												<p><?php echo get_field('address', get_the_ID()) ?></p>
											</a>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile; ?>
				<?php else :
					get_template_part('template-parts/project-none');

				endif; ?>
			</div>
			<div class="filter-navigation">
				<nav aria-label="Page navigation example m-auto" class="pagination justify-content-center custom-pagination">
					<?php
					global $wp_query;
					$custom_query = '';
					if ($custom_query) $main_query = $custom_query;
					else $main_query = $wp_query;
					$paged = ($paged) ? $paged : get_query_var('paged');
					$big = 999999999;
					$total = isset($main_query->max_num_pages) ? $main_query->max_num_pages : '';
					if ($total > 1) echo '<ul class="pagination justify-content-center custom-pagination">';
					echo paginate_links(array(
						'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
						'format' => '?paged=%#%',
						'current' => max(1, $paged),
						'show_all'     => false,

						'total' => $the_query_post->max_num_pages,
						'mid_size' => '3',
						'prev_text'    => __('<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 5L9.66939 11.2191C9.2842 11.6684 9.2842 12.3316 9.66939 12.7809L15 19" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                    <span>Trước</span>', 'Bitexco'),
						'next_text'    => __('<span>Sau</span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 19L14.3306 12.7809C14.7158 12.3316 14.7158 11.6684 14.3306 11.2191L9 5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>', 'Bitexco'),
					));
					if ($total > 1) echo '</ul>';
					?>
				</nav>
			</div>

		</div>
	</section>
	<?php if ($other_info) : ?>
		<section class="other-information">
			<div class="other-container">
				<div class="other-content hover-zoom">
					<?php foreach ($other_info as $value) : ?>
						<a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
					<?php endforeach; ?>

				</div>
			</div>
		</section>
	<?php endif; ?>
</div>

<?php
get_footer();
?>