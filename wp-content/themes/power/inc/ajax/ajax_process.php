<?php
if (!function_exists('ajax_script_process')) {
	function ajax_script_process()
	{
		wp_enqueue_script('ajax-script', get_template_directory_uri() . '/inc/ajax/ajax_process.js', array('jquery'), false, false);
		wp_localize_script('ajax-script', 'ajaxObject1', array('ajaxurl' => admin_url('admin-ajax.php')));
	};
	add_action('wp_enqueue_scripts', 'ajax_script_process');
}
function not_result()
{
	echo '<div class="no-item-found">
		<h3>Không có thông tin nào được tìm thấy, vui lòng thử lại</h3>
	</div>';
}
// Start Filter & Pagination news
function query_action_news($paged)
{
	$slug = $_POST['data_slug'];
	$name = $_POST['data_name'];
	$company = $_POST['data_company'];
	$type = $_POST['data_type'];
	$date = $_POST['data_date'];
	header("Content-Type: text/html");
	$tax_query = array(
		'relation' => 'AND',
	);
	if (isset($type) && $type != "") {
		$tax_query[] = array(
			'taxonomy' => 'post_type_news',
			'field' => 'slug',
			'terms' => $type,
			'compare' => 'LIKE',
			'operator' => 'IN'
		);
	}
	if (isset($company) && $company != "") {
		$tax_query[] = array(
			'taxonomy' => 'post_company_news',
			'field' => 'slug',
			'terms' => $company,
			'compare' => 'LIKE',
			'operator' => 'IN'
		);
	}
	$args = [
		'paged' => $paged,
		'post_type' => 'post',
		'category_name' =>  $slug,
		"s" =>   $name,
		'tax_query' => $tax_query,
	];
	$query = new WP_Query($args);
	echo render_action_news($query, $paged);
	die;
}
function post_filter_action_news()
{
	$paged = '1';
	query_action_news($paged);
}
add_action('wp_ajax_nopriv_post_filter_action_news', 'post_filter_action_news');
add_action('wp_ajax_post_filter_action_news', 'post_filter_action_news');
function post_nav_action_news()
{
	$paged = $_POST['paged'];
	query_action_news($paged);
}
add_action('wp_ajax_nopriv_post_nav_action_news', 'post_nav_action_news');
add_action('wp_ajax_post_nav_action_news', 'post_nav_action_news');

function render_action_news($query, $paged = 1)
{
	$pagination = paginate_links(array(
		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
		'total'        => 5,
		'current'      => max($paged, get_query_var('paged')),
		'format'       => '?paged=%#%',
		'show_all'     => true,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 1, 
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
				<div class="image">
					<img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>">
				</div>
				<div class="content ">
					<?php if (get_the_tag_list()) : ?><span class="tag tag-name"><span class="text"><?php echo get_the_tag_list('', ', ') ?></span> </span><?php endif; ?>
					<h6> <a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h6>
					<?php if (get_the_excerpt()) : ?><p class="size-text-16"><?php echo get_the_excerpt() ?></p><?php endif; ?>
					<?php if (get_the_date()) : ?> <span class="tag tag-calender">
							<span class="text size-text-14"><?php echo get_the_date() ?></span>
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
// End Filter & Pagination news


// Start Filter & Pagination library image
function post_filter_action_library_images()
{
	$name = $_POST['data_name'];
	$paged = '1';
	header("Content-Type: text/html");
	$args = array(
		'suppress_filters' => true,
		'posts_per_page' => 2,
		'paged' => '1',
		'post_type' => 'library',
		'tax_query' => [
			[
				'taxonomy' => 'type_library',
				'field' => 'slug',
				'terms' => 'images'
			]
		],
		"s" =>   $name
	);

	$query = new WP_Query($args);

	echo render_library_images($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_post_filter_action_library_images', 'post_filter_action_library_images');
add_action('wp_ajax_post_filter_action_library_images', 'post_filter_action_library_images');

function post_nav_action_library_images()
{
	$paged = $_POST['paged'];
	$name = $_POST['data_name'];
	$args = [
		'post_type' => 'library',
		'posts_per_page' => 2,
		'tax_query' => [
			[
				'taxonomy' => 'type_library',
				'field' => 'slug',
				'terms' => 'images'
			]
		],
		'paged' => $paged,
		's' => $name
	];
	$query = new WP_Query($args);
	echo render_library_images($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_post_nav_action_library_images', 'post_nav_action_library_images');
add_action('wp_ajax_post_nav_action_library_images', 'post_nav_action_library_images');
function render_library_images($query, $paged = 1)
{
	$pagination = paginate_links(array(
		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
		'total'        => 5,
		'current'      => max($paged, get_query_var('paged')),
		'format'       => '?paged=%#%',
		'show_all'     => true,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 1, 
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
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
			$images = get_field('image') ?>
			<div class="row wrap-content <?php echo ($key = 2 % 2 != 0) ? "flex-row-reverse" : "" ?>">
				<div class="col-12 col-md-6 slider">
					<div class="vrmedia-gallery">
						<ul class="gallery">
							<?php if ($images['gallery']) : ?>
								<?php foreach ($images['gallery'] as $key => $value) : ?>
									<li data-fancybox="gallery" data-src="<?php echo $value ?>" data-thumb="<?php echo $value ?>" data-src="<?php echo $value ?>">
										<img src="<?php echo $value ?>">
									</li>
								<?php endforeach; ?>
							<?php endif; ?>
						</ul>
					</div>
				</div>
				<div class="col-12 col-md-6 content">
					<span class="text-underline">ALBUM1</span>
					<h5 class="title"> <a href="<?php the_permalink() ?>"><?php echo the_title() ?></a></h5>
					<div class="information">
						<div class="info-item type">
							<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip0_2168_93872)">
									<path d="M9.33166 4.35879L5.20091 9.84914C4.61236 10.6314 5.17134 11.7512 6.15037 11.7512H7.89363L7.17627 14.3935C6.92019 15.3367 8.15544 15.9427 8.74519 15.1645L12.7965 9.81775C13.3895 9.03602 12.8312 7.91214 11.8498 7.91214H10.1396L10.9386 5.16306C11.2214 4.1906 9.94148 3.54833 9.33166 4.35879ZM11.8499 8.96686C11.961 8.96686 12.0232 9.09209 11.9562 9.18037C11.9562 9.18044 11.9561 9.18054 11.956 9.18061L8.41598 13.8526L9.09214 11.362C9.18313 11.0268 8.93028 10.6965 8.58322 10.6965H6.15037C6.03974 10.6965 5.97712 10.5717 6.04367 10.4832L9.71061 5.60933L8.93074 8.29232C8.88444 8.45161 8.9158 8.62342 9.0154 8.7561C9.11499 8.88874 9.27123 8.96683 9.43713 8.96683H11.8499V8.96686Z" fill="#7E8189" />
									<path d="M2.69743 15.1182C3.9548 16.5947 5.69443 17.587 7.59582 17.9121C7.88245 17.9612 8.15537 17.7687 8.20452 17.4812C8.2536 17.1942 8.0607 16.9217 7.77364 16.8726C4.30056 16.2786 1.77979 13.2856 1.77979 9.75586C1.77979 6.63061 3.75609 3.9265 6.61968 2.93541L6.43082 3.27062C6.28787 3.52438 6.37766 3.84596 6.63142 3.9889C6.88525 4.13192 7.20679 4.04199 7.34973 3.78833L8.14419 2.37818C8.28461 2.12889 8.19928 1.81392 7.95716 1.66778L6.57123 0.831729C6.3218 0.681331 5.99773 0.761452 5.84729 1.01089C5.69686 1.26025 5.77705 1.58435 6.02641 1.73482L6.33456 1.92073C4.93246 2.39857 3.67049 3.2509 2.69743 4.39355C1.42555 5.88713 0.725098 7.79147 0.725098 9.75586C0.725098 11.7203 1.42555 13.6246 2.69743 15.1182Z" fill="#7E8189" />
									<path d="M10.4046 1.59942C10.1176 1.55035 9.84504 1.74325 9.79596 2.03033C9.74688 2.31739 9.93978 2.58992 10.2269 2.63899C13.6999 3.23296 16.2207 6.22595 16.2207 9.75571C16.2207 12.881 14.2444 15.5851 11.3808 16.5762L11.5697 16.2409C11.7126 15.9872 11.6228 15.6656 11.3691 15.5226C11.1153 15.3797 10.7938 15.4694 10.6508 15.7232L9.85629 17.1334C9.71626 17.3819 9.8 17.6968 10.0433 17.8438L11.4292 18.6798C11.6788 18.8303 12.0028 18.7499 12.1531 18.5007C12.3036 18.2513 12.2234 17.9272 11.974 17.7767L11.6658 17.5908C13.068 17.113 14.33 16.2607 15.303 15.118C16.5749 13.6244 17.2753 11.72 17.2753 9.75567C17.2753 7.79132 16.5749 5.88694 15.303 4.39336C14.0457 2.91683 12.306 1.92458 10.4046 1.59942Z" fill="#7E8189" />
								</g>
								<defs>
									<clipPath id="clip0_2168_93872">
										<rect width="18" height="18" fill="white" transform="translate(0 0.755859)" />
									</clipPath>
								</defs>
							</svg>
							<span class="text">
								<strong>Loại hình:</strong>
								<span><?php echo  paint_if_exist($images['type']) ?></span>
							</span>
						</div>
						<div class="info-item taking-picture-day">
							<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M2.25 5.25586C2.25 4.01322 3.25736 3.00586 4.5 3.00586H13.5C14.7426 3.00586 15.75 4.01322 15.75 5.25586V14.2559C15.75 15.4985 14.7426 16.5059 13.5 16.5059H4.5C3.25736 16.5059 2.25 15.4985 2.25 14.2559V5.25586Z" stroke="#7E8189" stroke-width="1.5" />
								<path d="M2.25 6.75586H15.75" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round" />
								<path d="M12.375 1.88086L12.375 4.13086" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M5.625 1.88086L5.625 4.13086" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M4.875 9.75586H5.625" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M8.625 9.75586H9.375" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M12.375 9.75586H13.125" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M4.875 12.7559H5.625" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M8.625 12.7559H9.375" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M12.375 12.7559H13.125" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
							</svg>

							<span class="text">
								<strong>Ngày chụp:</strong>
								<span><?php echo  paint_if_exist($images['date']) ?></span>
							</span>
						</div>
						<div class="info-item location">
							<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15.1312 8.03125C15.1312 12.4021 10.1587 16.9563 8.91558 16.9563C7.67245 16.9563 2.69995 12.4021 2.69995 8.03125C2.69995 4.51044 5.48278 1.65625 8.91558 1.65625C12.3484 1.65625 15.1312 4.51044 15.1312 8.03125Z" stroke="#7E8189" stroke-width="1.5" />
								<ellipse rx="2.39062" ry="2.39063" transform="matrix(-1 0 0 1 8.91553 7.87109)" stroke="#7E8189" stroke-width="1.5" />
							</svg>

							<span class="text">
								<strong>Vị trí:</strong>
								<span><?php echo  paint_if_exist($images['address']) ?></span>
							</span>
						</div>
						<div class="info-item number-of-pictures">
							<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1.5 6.00586C1.5 3.93479 3.17893 2.25586 5.25 2.25586H12.75C14.8211 2.25586 16.5 3.93479 16.5 6.00586V13.5059C16.5 15.5769 14.8211 17.2559 12.75 17.2559H5.25C3.17893 17.2559 1.5 15.5769 1.5 13.5059V6.00586Z" stroke="#7E8189" stroke-width="1.5" />
								<path d="M1.875 13.8809L3.25919 12.8921C3.97521 12.3807 4.95603 12.4619 5.57822 13.0841L5.90147 13.4073C6.3701 13.876 7.1299 13.876 7.59853 13.4073L10.8377 10.1682C11.496 9.5099 12.5476 9.4622 13.2628 10.0582L16.5 12.7559" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" />
								<circle r="1.5" transform="matrix(-1 0 0 1 6 6.75586)" stroke="#7E8189" stroke-width="1.5" />
							</svg>

							<span class="text">
								<strong>Số ảnh:</strong>
								<span><?php echo  paint_if_exist($images['count_image']) ?></span>
							</span>
						</div>
					</div>

					<div class="desc">
						<p><?php echo  paint_if_exist(get_the_content(get_the_ID())) ?></p>
					</div>
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
// End Filter & Pagination library image

// Start Filter & Pagination library video
function post_filter_action_library_video()
{
	$name = $_POST['data_name'];
	$paged = '1';
	header("Content-Type: text/html");
	$args = array(
		'suppress_filters' => true,
		'posts_per_page' => 2,
		'paged' => '1',
		'tax_query' => [
			[
				'taxonomy' => 'type_library',
				'field' => 'slug',
				'terms' => 'video'
			]
		],
		'post_type' => 'library',
		"s" =>   $name
	);

	$query = new WP_Query($args);

	echo render_library_video($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_post_filter_action_library_video', 'post_filter_action_library_video');
add_action('wp_ajax_post_filter_action_library_video', 'post_filter_action_library_video');

function post_nav_action_library_video()
{
	$paged = $_POST['paged'];
	$name = $_POST['data_name'];
	$args = [
		'post_type' => 'library',
		'posts_per_page' => 2,
		'paged' => $paged,
		'tax_query' => [
			[
				'taxonomy' => 'type_library',
				'field' => 'slug',
				'terms' => 'video'
			]
		],
		's' => $name
	];
	$query = new WP_Query($args);
	echo render_library_video($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_post_nav_action_library_video', 'post_nav_action_library_video');
add_action('wp_ajax_post_nav_action_library_video', 'post_nav_action_library_video');
function render_library_video($query, $paged = 1)
{
	$pagination = paginate_links(array(
		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
		'total'        => 5,
		'current'      => max($paged, get_query_var('paged')),
		'format'       => '?paged=%#%',
		'show_all'     => true,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 1, 
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
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
			$videos = get_field('video') ?>
			<a class="video-item-link link-" href="<?php echo paint_if_exist($videos['link']) ?>">
				<div class="video-item video-item-">
					<div class="background-overlay" style="background-image: url(<?php echo paint_if_exist($featured_img_url) ?>);"></div>
					<div class="video-badge">
						<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect opacity="0.7" x="3.19995" y="3.19922" width="25.6" height="25.6" rx="2" fill="#0D0D0E" />
							<path d="M22.3831 13.685C22.25 13.3119 21.8962 13.0625 21.5 13.0625H18.1112L16.8812 9.67937C16.7462 9.30937 16.3943 9.0625 16 9.0625C15.6056 9.0625 15.2537 9.30937 15.1187 9.67937L13.8887 13.0625H10.5C10.1037 13.0625 9.74997 13.3119 9.61685 13.685C9.48372 14.0581 9.59935 14.4744 9.90622 14.7256L12.5093 16.8556L11.1187 20.6794C10.9825 21.0556 11.0993 21.4769 11.41 21.7288C11.7212 21.9806 12.1575 22.0069 12.4968 21.795L16 19.6056L19.5031 21.795C19.6556 21.8906 19.8281 21.9375 20 21.9375C20.21 21.9375 20.4187 21.8669 20.59 21.7288C20.9006 21.4769 21.0175 21.0556 20.8812 20.6794L19.4906 16.8556L22.0937 14.7256C22.4006 14.4744 22.5162 14.0581 22.3831 13.685Z" fill="#DAA622" />
						</svg>
					</div>
					<div class="video-button">
						<svg width="27" height="32" viewBox="0 0 27 32" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path opacity="0.6" d="M25.784 17.7206C27.0912 16.9459 27.0912 15.0541 25.784 14.2794L3.01961 0.789396C1.6864 -0.000651062 2.78839e-07 0.960267 4.99279e-07 2.50998L4.33707e-06 29.49C4.55751e-06 31.0397 1.68641 32.0007 3.01961 31.2106L25.784 17.7206Z" fill="white" />
						</svg>
					</div>
					<div class="video-text">
						<h2><?php echo paint_if_exist(get_the_title(get_the_ID())) ?></h2>
						<p class="desc"><?php echo  paint_if_exist(get_the_content(get_the_ID())) ?></p>
						<div class="tag">
							<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M2.25 2.25V7.40925L10.125 15.2843L15.2843 10.125L7.40925 2.25H2.25ZM1.125 2.25C1.125 1.95163 1.24353 1.66548 1.4545 1.4545C1.66548 1.24353 1.95163 1.125 2.25 1.125H7.40925C7.70759 1.12506 7.9937 1.24363 8.20463 1.45463L16.0796 9.32963C16.2905 9.5406 16.409 9.82669 16.409 10.125C16.409 10.4233 16.2905 10.7094 16.0796 10.9204L10.9204 16.0796C10.7094 16.2905 10.4233 16.409 10.125 16.409C9.82669 16.409 9.5406 16.2905 9.32963 16.0796L1.45463 8.20463C1.24363 7.9937 1.12506 7.70759 1.125 7.40925V2.25Z" fill="white" />
								<path fill-rule="evenodd" clip-rule="evenodd" d="M5.0625 5.625C5.21168 5.625 5.35476 5.56574 5.46025 5.46025C5.56574 5.35476 5.625 5.21168 5.625 5.0625C5.625 4.91332 5.56574 4.77024 5.46025 4.66475C5.35476 4.55926 5.21168 4.5 5.0625 4.5C4.91332 4.5 4.77024 4.55926 4.66475 4.66475C4.55926 4.77024 4.5 4.91332 4.5 5.0625C4.5 5.21168 4.55926 5.35476 4.66475 5.46025C4.77024 5.56574 4.91332 5.625 5.0625 5.625ZM5.0625 6.75C5.51005 6.75 5.93928 6.57221 6.25574 6.25574C6.57221 5.93928 6.75 5.51005 6.75 5.0625C6.75 4.61495 6.57221 4.18572 6.25574 3.86926C5.93928 3.55279 5.51005 3.375 5.0625 3.375C4.61495 3.375 4.18572 3.55279 3.86926 3.86926C3.55279 4.18572 3.375 4.61495 3.375 5.0625C3.375 5.51005 3.55279 5.93928 3.86926 6.25574C4.18572 6.57221 4.61495 6.75 5.0625 6.75Z" fill="white" />
							</svg>
							<p>Thuỷ điện</p>

						</div>
					</div>
					<iframe class="main-video" width="420" height="345" src="<?php echo paint_if_exist($videos['link']) ?>" frameborder="0">
					</iframe>
				</div>
			</a>
		<?php endwhile; ?>
	<?php else :
		not_result();
	endif;
	wp_reset_postdata();
	$shareholder_info = ob_get_contents();
	ob_end_clean();
	return $shareholder_info . "|" . $pagination;
}
// End Filter & Pagination library image

// Start Filter & Pagination conpany member
function query_action_company_member($paged)
{
	$name = $_POST['data_name'];
	$location = $_POST['data_location'];
	$tax_query = array(
		'relation' => 'AND',
	);
	if (isset($location) && $location != "") {
		$tax_query[] = array(
			'taxonomy' => 'location_company_member',
			'field' => 'slug',
			'terms' => $location,
			'compare' => 'LIKE',
			'operator' => 'IN'
		);
	}
	$args = [
		'post_type' => 'company-member',
		'paged' => $paged,
		's' => $name,
		'exact' => false,
		'sentence' => true,
		'tax_query' => $tax_query,
	];
	$query = new WP_Query($args);
	echo render_company_member($query, $paged);
	die;
}
function post_filter_action_company_member()
{
	$paged = '1';
	query_action_company_member($paged);
}
add_action('wp_ajax_nopriv_post_filter_action_company_member', 'post_filter_action_company_member');
add_action('wp_ajax_post_filter_action_company_member', 'post_filter_action_company_member');

function post_nav_action_company_member()
{
	$paged = $_POST['data_paged'];
	query_action_company_member($paged);
}
add_action('wp_ajax_nopriv_post_nav_action_company_member', 'post_nav_action_company_member');
add_action('wp_ajax_post_nav_action_company_member', 'post_nav_action_company_member');
function render_company_member($query, $paged = 1)
{
	$pagination = paginate_links(array(
		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
		'total'        => 5,
		'current'      => max($paged, get_query_var('paged')),
		'format'       => '?paged=%#%',
		'show_all'     => true,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 1, 
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
			<div class="filter-item">
				<div class="filter-image  hover-zoom hover-zoom-img">
					<a href="<?php the_permalink() ?>">
						<img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>">
					</a>
				</div>
				<div class="item-content">
					<div class="content-title">
						<h6> <a href="<?php the_permalink() ?>"><?php echo the_title() ?></a></h6>
					</div>
					<div class="filter-location item d-flex">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M16.8125 8.08333C16.8125 12.9398 11.2875 18 9.90625 18C8.525 18 3 12.9398 3 8.08333C3 4.17132 6.09203 1 9.90625 1C13.7205 1 16.8125 4.17132 16.8125 8.08333Z" stroke="#7E8189" stroke-width="1.5" />
							<circle r="2.65625" transform="matrix(-1 0 0 1 9.90625 7.90625)" stroke="#7E8189" stroke-width="1.5" />
						</svg>
						<?php if (get_the_terms(get_the_ID(), 'location_company_member')) : ?>
							<?php foreach (get_the_terms(get_the_ID(), 'location_company_member') as $key => $value) : ?>
								<p> <?php echo paint_if_exist($value->name) ?> </p>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
					<div class="filter-phone item d-flex">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M15.885 16.8486C14.2564 18.4772 10.0857 16.9469 6.56939 13.4306C3.0531 9.91432 1.52283 5.74356 3.15142 4.11496L4.22373 3.04265C4.964 2.30238 6.18379 2.32195 6.9482 3.08636L8.6091 4.74727C9.37352 5.51168 9.39308 6.73147 8.65281 7.47174L8.42249 7.70206C8.02281 8.10174 7.98371 8.74651 8.35509 9.19656C8.71331 9.63066 9.0995 10.063 9.51823 10.4818C9.93696 10.9005 10.3693 11.2867 10.8034 11.6449C11.2535 12.0163 11.8983 11.9772 12.2979 11.5775L12.5283 11.3472C13.2685 10.6069 14.4883 10.6265 15.2527 11.3909L16.9136 13.0518C17.6781 13.8162 17.6976 15.036 16.9573 15.7763L15.885 16.8486Z" stroke="#7E8189" stroke-width="1.5" />
						</svg>
						<?php if (get_field("phone")) : ?><p><a href="tel:+<?php echo get_field("phone"); ?>"><?php echo get_field("phone"); ?></a></p><?php endif; ?>
					</div>
					<div class="filter-wattage item d-flex">
						<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M17.3327 17.9531H0.666016C0.324349 17.9531 0.0410156 17.6698 0.0410156 17.3281C0.0410156 16.9865 0.324349 16.7031 0.666016 16.7031H17.3327C17.6743 16.7031 17.9577 16.9865 17.9577 17.3281C17.9577 17.6698 17.6743 17.9531 17.3327 17.9531Z" fill="#7E8189" />
							<path d="M10.875 17.9557H7.125C6.78333 17.9557 6.5 17.6724 6.5 17.3307V2.33073C6.5 0.897396 7.29167 0.0390625 8.625 0.0390625H9.375C10.7083 0.0390625 11.5 0.897396 11.5 2.33073V17.3307C11.5 17.6724 11.2167 17.9557 10.875 17.9557ZM7.75 16.7057H10.25V2.33073C10.25 1.3724 9.8 1.28906 9.375 1.28906H8.625C8.2 1.28906 7.75 1.3724 7.75 2.33073V16.7057Z" fill="#7E8189" />
							<path d="M4.83333 17.9557H1.5C1.15833 17.9557 0.875 17.6724 0.875 17.3307V7.33073C0.875 5.8974 1.60833 5.03906 2.83333 5.03906H3.5C4.725 5.03906 5.45833 5.8974 5.45833 7.33073V17.3307C5.45833 17.6724 5.175 17.9557 4.83333 17.9557ZM2.125 16.7057H4.20833V7.33073C4.20833 6.28906 3.75 6.28906 3.5 6.28906H2.83333C2.58333 6.28906 2.125 6.28906 2.125 7.33073V16.7057Z" fill="#7E8189" />
							<path d="M16.4993 17.9531H13.166C12.8243 17.9531 12.541 17.6698 12.541 17.3281V11.4948C12.541 10.0615 13.2743 9.20312 14.4993 9.20312H15.166C16.391 9.20312 17.1243 10.0615 17.1243 11.4948V17.3281C17.1243 17.6698 16.841 17.9531 16.4993 17.9531ZM13.791 16.7031H15.8743V11.4948C15.8743 10.4531 15.416 10.4531 15.166 10.4531H14.4993C14.2493 10.4531 13.791 10.4531 13.791 11.4948V16.7031Z" fill="#7E8189" />
						</svg>
						<?php if (get_field("wattage")) : ?> <p><?php echo get_field("wattage"); ?></p><?php endif; ?>
					</div>
					<div class="filter-factory item d-flex">
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
						<?php if (get_field("factory")) : ?><p><?php echo get_field("factory"); ?> nhà máy</p><?php endif; ?>
					</div>
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
// End Filter & Pagination company member

// Start Filter & Pagination projects
function query_action_projects($paged)
{
	$the_slug = $_POST['the_slug'];
	$name = $_POST['data_name'];
	$location = $_POST['data_location'];
	$type = $_POST['data_type'];
	$company = $_POST['data_company'];
	$tax_query = array(
		'relation' => 'AND',
		array(
			'taxonomy' =>  'type_projects',
			'field' => 'slug',
			'terms' =>  $the_slug,
		),
	);

	if (isset($location) && $location != "") {
		$tax_query[] = array(
			'taxonomy' => 'project_location',
			'field' => 'slug',
			'terms' => $location,
			'compare' => 'LIKE',
			'operator' => 'IN'
		);
	}

	if (isset($type) && $type != "") {
		$tax_query[] = array(
			'taxonomy' => 'project_type',
			'field' => 'slug',
			'terms' => $type,
			'compare' => 'LIKE',
			'operator' => 'IN'
		);
	}

	if (isset($company) && $company != "") {
		$tax_query[] = array(
			'taxonomy' => 'project_company',
			'field' => 'slug',
			'terms' => $company,
			'compare' => 'LIKE',
			'operator' => 'IN'
		);
	}
	$args = [
		'post_type' => 'projects',
		'paged' => $paged,
		's' => $name,
		'exact' => false,
		'sentence' => true,
		'tax_query' => $tax_query,
	];
	$query = new WP_Query($args);
	echo render_projects($query, $paged);
	die;
}
function post_filter_action_projects()
{
	$paged = '1';
	query_action_projects($paged);
}
add_action('wp_ajax_nopriv_post_filter_action_projects', 'post_filter_action_projects');
add_action('wp_ajax_post_filter_action_projects', 'post_filter_action_projects');

function post_nav_action_projects()
{
	$paged = $_POST['data_paged'];
	query_action_projects($paged);
}
add_action('wp_ajax_nopriv_post_nav_action_projects', 'post_nav_action_projects');
add_action('wp_ajax_post_nav_action_projects', 'post_nav_action_projects');


function query_action_projects_list($paged)
{
	$name = $_POST['data_name'];
	$location = $_POST['data_location'];
	$type = $_POST['data_type'];
	$company = $_POST['data_company'];
	$tax_query = array(
		'relation' => 'AND',
	);

	if (isset($location) && $location != "") {
		$tax_query[] = array(
			'taxonomy' => 'project_location',
			'field' => 'slug',
			'terms' => $location,
			'compare' => 'LIKE',
			'operator' => 'IN'
		);
	}

	if (isset($type) && $type != "") {
		$tax_query[] = array(
			'taxonomy' => 'project_type',
			'field' => 'slug',
			'terms' => $type,
			'compare' => 'LIKE',
			'operator' => 'IN'
		);
	}

	if (isset($company) && $company != "") {
		$tax_query[] = array(
			'taxonomy' => 'project_company',
			'field' => 'slug',
			'terms' => $company,
			'compare' => 'LIKE',
			'operator' => 'IN'
		);
	}
	$args = [
		'post_type' => 'projects',
		'paged' => $paged,
		's' => $name,
		'exact' => false,
		'sentence' => true,
		'tax_query' => $tax_query,
	];
	$query = new WP_Query($args);
	echo render_projects($query, $paged);
	die;
}
function post_filter_action_projects_list()
{
	$paged = '1';
	query_action_projects_list($paged);
}
add_action('wp_ajax_nopriv_post_filter_action_projects_list', 'post_filter_action_projects_list');
add_action('wp_ajax_post_filter_action_projects_list', 'post_filter_action_projects_list');

function post_nav_action_projects_list()
{
	$paged = $_POST['data_paged'];
	query_action_projects_list($paged);
}
add_action('wp_ajax_nopriv_post_nav_action_projects_list', 'post_nav_action_projects_list');
add_action('wp_ajax_post_nav_action_projects_list', 'post_nav_action_projects_list');

function render_projects($query, $paged = 1)
{
	$pagination = paginate_links(array(
		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
		'total'        => 5,
		'current'      => max($paged, get_query_var('paged')),
		'format'       => '?paged=%#%',
		'show_all'     => true,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 1, 
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
			<div class="filter-item">
				<div class="filter-image hover-zoom-img">
					<a href="<?php the_permalink() ?>">
						<img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>">
					</a>
				</div>
				<div class="item-content">
					<div class="content-title">
						<h6> <a href="<?php the_permalink() ?>"><?php echo the_title() ?></a></h6>
						<?php if (get_field("icon")) : ?><img class="icon" src="<?php echo get_field("icon"); ?>" alt="icon"><?php endif; ?>
					</div>
					<?php if (get_field("company")) : ?>
						<div class="filter-company">
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
							<div>
								<?php foreach (get_the_terms(get_the_ID(), 'project_company') as $key => $value) : ?>
									<p><?php echo paint_if_exist($value->name) ?></p>
								<?php endforeach; ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if (get_field("date")) : ?>
						<div class="content-time">
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
							<p><?php echo get_field("date"); ?></p>
						</div>
					<?php endif; ?>

					<div class="content-location">
						<svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
							<path d="M16.8125 8.08333C16.8125 10.3393 15.5177 12.7061 13.9926 14.5435C13.2367 15.4542 12.4427 16.2122 11.7624 16.7378C11.4217 17.001 11.1178 17.1996 10.8682 17.3298C10.6021 17.4687 10.4538 17.5 10.4062 17.5V18.5C10.704 18.5 11.0305 18.3732 11.3309 18.2163C11.6479 18.0509 12.0022 17.8162 12.3738 17.5291C13.1179 16.9542 13.964 16.1436 14.7621 15.1822C16.3448 13.2754 17.8125 10.6839 17.8125 8.08333H16.8125ZM10.4062 17.5C10.3587 17.5 10.2104 17.4687 9.94428 17.3298C9.69473 17.1996 9.39081 17.001 9.05013 16.7378C8.36981 16.2122 7.57577 15.4542 6.81989 14.5435C5.2948 12.7061 4 10.3393 4 8.08333H3C3 10.6839 4.4677 13.2754 6.05042 15.1822C6.84845 16.1436 7.69464 16.9542 8.43873 17.5291C8.81026 17.8162 9.1646 18.0509 9.48157 18.2163C9.78202 18.3732 10.1085 18.5 10.4062 18.5V17.5ZM4 8.08333C4 4.43545 6.88003 1.5 10.4062 1.5V0.5C6.30403 0.5 3 3.90718 3 8.08333H4ZM10.4062 1.5C13.9325 1.5 16.8125 4.43545 16.8125 8.08333H17.8125C17.8125 3.90718 14.5085 0.5 10.4062 0.5V1.5Z" fill="#7E8189"></path>
							<circle r="2.65625" transform="matrix(-1 0 0 1 10.4062 7.90625)" stroke="#7E8189"></circle>
						</svg>
						<div>
							<?php foreach (get_the_terms(get_the_ID(), 'project_location') as $key => $value) : ?>
								<p> <?php echo paint_if_exist($value->name) ?> </p>
							<?php endforeach; ?>
						</div>
					</div>
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
// End Filter & Pagination projects




// Start Filter & Pagination vacancies
function query_action_vacancies($paged)
{
	$name = $_POST['data_name'];
	$location = $_POST['data_location'];
	header("Content-Type: text/html");
	$tax_query = array(
		'relation' => 'AND',
	);
	if (isset($location) && $location != "") {
		$tax_query[] = array(
			'taxonomy' => 'vacancies_location',
			'field' => 'slug',
			'terms' => $location,
			'compare' => 'LIKE',
			'operator' => 'IN'
		);
	}
	$args = array(
		'suppress_filters' => true,
		'post_type' => 'vacancies',
		"s" =>   $name,
		'tax_query' => $tax_query,
	);

	$query = new WP_Query($args);

	echo render_vacancies($query, $paged);
	die;
}
function post_filter_action_vacancies()
{
	$paged = '1';
	query_action_vacancies($paged);
}
add_action('wp_ajax_nopriv_post_filter_action_vacancies', 'post_filter_action_vacancies');
add_action('wp_ajax_post_filter_action_vacancies', 'post_filter_action_vacancies');

function post_nav_action_vacancies()
{
	$paged = $_POST['data_paged'];
	query_action_vacancies($paged);
}
add_action('wp_ajax_nopriv_post_nav_action_vacancies', 'post_nav_action_vacancies');
add_action('wp_ajax_post_nav_action_vacancies', 'post_nav_action_vacancies');
function render_vacancies($query, $paged = 1)
{
	$pagination = paginate_links(array(
		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
		'total'        => 5,
		'current'      => max($paged, get_query_var('paged')),
		'format'       => '?paged=%#%',
		'show_all'     => true,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 1, 
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
// End Filter & Pagination vacancies



// Start Filter & Pagination social_security
function post_filter_action_social_security()
{
	$paged = $_POST['paged'];
	$slug = (isset($_POST['data_slug'])) ? $_POST['data_slug'] : '';
	$name = (isset($_POST['data_name'])) ? $_POST['data_name'] : '';
	$location = (isset($_POST['data_location'])) ? $_POST['data_location'] : '';
	$company = (isset($_POST['data_company'])) ? $_POST['data_company'] : '';
	$type = (isset($_POST['data_type'])) ? $_POST['data_type'] : '';
	$date = (isset($_POST['data_date'])) ? $_POST['data_date'] : '';
	$day = date_format($date, "d");
	$month = date_format($date, "m");
	$year = date_format($date, "Y");
	header("Content-Type: text/html");
	$args = array(
		'suppress_filters' => true,
		'paged' => '1',
		'post_type' => 'social_security',
		'category_name' =>  $slug,
		"s" =>   $name,
	);

	$query = new WP_Query($args);
	echo render_action_social_security($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_post_filter_action_social_security', 'post_filter_action_social_security');
add_action('wp_ajax_post_filter_action_social_security', 'post_filter_action_social_security');
function post_nav_action_social_security()
{
	$slug = (isset($_POST['data_slug'])) ? $_POST['data_slug'] : '';
	$paged = $_POST['paged'];
	$name = (isset($_POST['data_name'])) ? $_POST['data_name'] : '';
	$location = (isset($_POST['data_location'])) ? $_POST['data_location'] : '';
	$company = (isset($_POST['data_company'])) ? $_POST['data_company'] : '';
	$type = (isset($_POST['data_type'])) ? $_POST['data_type'] : '';
	$date = (isset($_POST['data_date'])) ? $_POST['data_date'] : '';
	$args = [
		'post_type' => 'social_security',
		'paged' => $paged,
		"s" =>   $name,
	];
	$query = new WP_Query($args);

	echo render_action_social_security($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_post_nav_action_social_security', 'post_nav_action_social_security');
add_action('wp_ajax_post_nav_action_social_security', 'post_nav_action_social_security');

function render_action_social_security($query, $paged = 1)
{
	$pagination = paginate_links(array(
		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
		'total'        => 5,
		'current'      => max($paged, get_query_var('paged')),
		'format'       => '?paged=%#%',
		'show_all'     => true,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 1, 
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
				<img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>" class="img-banner">
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
// End Filter & Pagination social_security



// Start Filter & Pagination events
function post_filter_action_events()
{
	$paged = $_POST['paged'];
	$name = (isset($_POST['data_name'])) ? $_POST['data_name'] : '';
	header("Content-Type: text/html");
	$args = array(
		'suppress_filters' => true,
		'paged' => '1',
		'post_type' => 'events',
	);

	$query = new WP_Query($args);
	echo render_action_events($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_post_filter_action_events', 'post_filter_action_events');
add_action('wp_ajax_post_filter_action_events', 'post_filter_action_events');
function post_nav_action_events()
{
	$paged = $_POST['paged'];
	$name = (isset($_POST['data_name'])) ? $_POST['data_name'] : '';
	$args = [
		'post_type' => 'events',
	];
	$query = new WP_Query($args);

	echo render_action_events($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_post_nav_action_events', 'post_nav_action_events');
add_action('wp_ajax_post_nav_action_events', 'post_nav_action_events');

function render_action_events($query, $paged = 1)
{
	$pagination = paginate_links(array(
		'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
		'total'        => 5,
		'current'      => max($paged, get_query_var('paged')),
		'format'       => '?paged=%#%',
		'show_all'     => true,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 1, 
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