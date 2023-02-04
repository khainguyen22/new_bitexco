<?php

if (!function_exists('ajax_script')) {
	function ajax_script(){
		wp_enqueue_script('navigation-ajax-script', get_template_directory_uri() . '/inc/ajax/general_ajax_process.js', array('jquery'), false, false);
		wp_localize_script('navigation-ajax-script', 'ajaxObject', array('ajaxurl' => admin_url('admin-ajax.php')) );
	};
	add_action('wp_enqueue_scripts', 'ajax_script');
}

// Navigation Action
function navigation_post_ajax() {
	$paged = $_POST['paged'];

	$args = [
		'post_type'=> 'shareholders',
		'posts_per_page' => 8,
		'paged' => $paged,
		's' => $_POST['inputValue'],
		'exact' => false,                       
    'sentence' => true,
	];
	$query = new WP_Query($args);

	echo render($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_navigation_post_ajax', 'navigation_post_ajax');
add_action('wp_ajax_navigation_post_ajax', 'navigation_post_ajax');

// Search Action
function post_search_ajax() {
	$args = [
		'post_type'=> 'shareholders',
		'posts_per_page' => 8,
		'paged' => 1,
		's' => $_POST['inputValue'],
		'exact' => false,                       
    'sentence' => true, 
	];
	$query = new WP_Query($args);

	$max_num_pages = $query->max_num_pages;

	echo render($query);
	die;
	
}
add_action('wp_ajax_nopriv_post_search_ajax', 'post_search_ajax');
add_action('wp_ajax_post_search_ajax', 'post_search_ajax');

function render($query, $paged = 1) {
	$pagination = paginate_links( array(
		'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
		'total'        => $query->max_num_pages,
		'current'      => max($paged, get_query_var( 'paged' ) ),
		'format'       => '?paged=%#%',
		'show_all'     => false,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 0,
		'prev_next'    => true,
		'prev_text'    => sprintf( '<i></i> %1$s', __( '
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15 5L9.66939 11.2191C9.2842 11.6684 9.2842 12.3316 9.66939 12.7809L15 19" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
						</svg>
						<span>Trước</span>

		', POWER ) ),
		'next_text'    => sprintf( '%1$s <i></i>', __( '
		<span>Sau</span>

				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M9 19L14.3306 12.7809C14.7158 12.3316 14.7158 11.6684 14.3306 11.2191L9 5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
				</svg>
		', POWER ) ),
		'add_args'     => false,
		'add_fragment' => '',
	) );

	ob_start();

	if ($query->have_posts()) : ?>
		<?php while($query->have_posts()) : $query->the_post(); ?>
				<div class="shareholder-item" data-postID="<?php echo get_the_ID()?>">
						<div class="icon">
								<svg width="67" height="67" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
										<rect width="67" height="67" rx="2" fill="#F6F8FC"></rect>
										<g clip-path="url(#clip0_8856_37877)">
												<path d="M24.3333 17.5C23.5049 17.5 22.8333 18.1716 22.8333 19V24.1667H19C18.1716 24.1667 17.5 24.8382 17.5 25.6667V34.6667C17.5 35.4951 18.1716 36.1667 19 36.1667H22.8333V48C22.8333 48.8284 23.5049 49.5 24.3333 49.5H40.6716C41.202 49.5 41.7107 49.2893 42.0858 48.9142L48.9142 42.0858C49.2893 41.7107 49.5 41.202 49.5 40.6716V19C49.5 18.1716 48.8284 17.5 48 17.5H24.3333ZM18.8333 34.8333V25.5H38.8333V34.8333H18.8333ZM41.5 47.6147V41.5H47.6147L41.5 47.6147ZM48.1667 40.1667H41.6667C40.8382 40.1667 40.1667 40.8382 40.1667 41.6667V48.1667H24.1667V36.1667H40.1667V24.1667H24.1667V18.8333H48.1667V40.1667Z" fill="#7E8189"></path>
												<path d="M25.0707 28.4043C25.0173 28.199 24.9293 28.0163 24.8067 27.8563C24.684 27.6963 24.524 27.567 24.3227 27.4683C24.1213 27.3696 23.876 27.3203 23.5827 27.3203H21.5667V33.0323H22.7187V30.7523H23.3347C23.6067 30.7523 23.8547 30.715 24.0787 30.647C24.3027 30.579 24.4933 30.4736 24.6507 30.335C24.808 30.1976 24.9307 30.019 25.0187 29.8003C25.1067 29.5816 25.1507 29.3256 25.1507 29.0323C25.1507 28.819 25.1227 28.6083 25.0707 28.4043ZM23.7867 29.6976C23.6467 29.8363 23.46 29.907 23.2307 29.907H22.7187V28.1696H23.1987C23.4867 28.1696 23.692 28.2456 23.8147 28.3936C23.9373 28.543 23.9987 28.7616 23.9987 29.0496C23.9987 29.343 23.928 29.559 23.7867 29.6976Z" fill="#7E8189"></path>
												<path d="M30.28 28.9536C30.232 28.611 30.1414 28.3203 30.004 28.0776C29.868 27.8336 29.6774 27.6483 29.432 27.5176C29.1854 27.387 28.864 27.3203 28.4627 27.3203H26.5747V33.0323H28.3934C28.7774 33.0323 29.0947 32.9736 29.3454 32.8563C29.596 32.739 29.796 32.5616 29.9454 32.3203C30.0947 32.0803 30.2 31.7736 30.2614 31.4043C30.3227 31.0336 30.352 30.5976 30.352 30.0963C30.352 29.6763 30.328 29.295 30.28 28.9536ZM29.1627 31.1056C29.14 31.3683 29.092 31.579 29.0187 31.739C28.9467 31.899 28.8494 32.0136 28.7267 32.083C28.604 32.1523 28.4414 32.187 28.2387 32.187H27.7267V28.1696H28.2134C28.432 28.1696 28.6067 28.2123 28.7374 28.295C28.8694 28.3763 28.9667 28.499 29.0347 28.6616C29.1014 28.8243 29.1454 29.0283 29.1667 29.2736C29.1867 29.5203 29.1987 29.8056 29.1987 30.131C29.1987 30.5203 29.1867 30.8456 29.1627 31.1056Z" fill="#7E8189"></path>
												<path d="M35.1026 28.2643V27.3203H31.9106V33.0323H33.0626V30.5523H34.9826V29.6083H33.0626V28.2643H35.1026Z" fill="#7E8189"></path>
										</g>
										<defs>
												<clipPath id="clip0_8856_37877">
														<rect width="32" height="32" fill="white" transform="translate(17.5 17.5)"></rect>
												</clipPath>
										</defs>
								</svg>

						</div>
						<div class="shareholder-title">
						<div class="name-and-time">
								<h6><?php _e(get_the_title(get_the_ID()), POWER)?></h6>
								<div class="calender">
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M2.5 5C2.5 3.61929 3.61929 2.5 5 2.5H15C16.3807 2.5 17.5 3.61929 17.5 5V15C17.5 16.3807 16.3807 17.5 15 17.5H5C3.61929 17.5 2.5 16.3807 2.5 15V5Z" stroke="#7E8189" stroke-width="1.5"></path>
												<path d="M2.5 6.66667H17.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round"></path>
												<path d="M13.75 1.25L13.75 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M6.24998 1.25L6.24998 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M5.41669 10.0052H6.25002" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M9.58337 10.0052H10.4167" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M13.75 10.0052H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M5.41669 13.3411H6.25002" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M9.58337 13.3411H10.4167" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
												<path d="M13.75 13.3411H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
										</svg>
										<span class="text"><a href="#"><?php _e(paint_if_exist(get_field('date', get_the_ID())), POWER)?></a></span>
								</div>
						</div>
						<div class="download">
							 <a href="<?php echo paint_if_exist(get_field('file', get_the_ID()))?>" download> <span><?php _e('Tải xuống', POWER)?></span></a>
								<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7.06476 14.4005L10.0832 17.419C10.4412 17.777 11.0216 17.777 11.3796 17.419L14.3981 14.4005M10.7314 17.1505L10.7314 4.31719" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"></path>
								</svg>
						</div>
						</div>
				</div>
			<?php  endwhile; ?>

		<?php else :?>
			<div class="no-item-found">
				<h3><?php _e("Không có thông tin nào được tìm thấy, vui lòng thử lại", POWER)?></h3>
			</div>
		<?php endif;wp_reset_postdata();
	$shareholder_info = ob_get_contents();
	ob_end_clean();
	return $shareholder_info . "|" . $pagination;
}

// Navigation Action on Finace Report Page
function navigation_post_report_ajax() {
	$paged = $_POST['paged'];
	$year = $_POST['year'];

	$args = [
		'post_type'=> 'finance_report',
		'posts_per_page' => 8,
		'paged' => $paged,
		's' => $_POST['inputValue'],
		'exact' => false,                       
    'sentence' => true,
		'tax_query' => [
			[
					'taxonomy' => 'years',
					'field'=> 'slug',
					'terms' => $year
			]
		]
	];
	$query = new WP_Query($args);

	echo render($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_navigation_post_report_ajax', 'navigation_post_report_ajax');
add_action('wp_ajax_navigation_post_report_ajax', 'navigation_post_report_ajax');

// Category Filter Action
function finance_report_ajax() {
	$year = $_POST['year'];

	$args = [
		'post_type'=> 'finance_report',
		'posts_per_page' => 8,
		'paged' => 1,
		's' => $_POST['inputValue'],
		'exact' => false,                       
    'sentence' => true,
		'tax_query' => [
			[
					'taxonomy' => 'years',
					'field'=> 'slug',
					'terms' => $year
			]
		]
	];
	$query = new WP_Query($args);

	echo render($query);
	die;
}
add_action('wp_ajax_nopriv_finance_report_ajax', 'finance_report_ajax');
add_action('wp_ajax_finance_report_ajax', 'finance_report_ajax');

// Type Filter Action
function shareholder_report_ajax() {
	$type = $_POST['type'];

	$args = [
		'post_type'=> 'shareholder_report',
		'posts_per_page' => 8,
		'paged' => 1,
		'tax_query' => [
			[
					'taxonomy' => 'shareholder_doc_cat',
					'field'=> 'slug',
					'terms' => $type
			]
		]
	];
	$query = new WP_Query($args);

	echo render($query);
	die;
}
add_action('wp_ajax_nopriv_shareholder_report_ajax', 'shareholder_report_ajax');
add_action('wp_ajax_shareholder_report_ajax', 'shareholder_report_ajax');

// Navigation Action
function shareholder_report_nav_action() {
	$paged = $_POST['paged'];

	$args = [
		'post_type'=> 'shareholder_report',
		'posts_per_page' => 8,
		'paged' => $paged,
		's' => $_POST['inputValue'],
		'exact' => false,                       
    'sentence' => true,
	];
	$query = new WP_Query($args);

	echo render($query, $paged );
	die;
}
add_action('wp_ajax_nopriv_shareholder_report_nav_action', 'shareholder_report_nav_action');
add_action('wp_ajax_shareholder_report_nav_action', 'shareholder_report_nav_action');

// Navigation Action on Finace Report Page
function annual_report_nav_ajax() {
	$paged = $_POST['paged'];

	$args = [
		'post_type'=> 'annual_report',
		'posts_per_page' => 6,
		'paged' => $paged,
	];
	$query = new WP_Query($args);

	$pagination = paginate_links( array(
		'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
		'total'        => $query->max_num_pages,
		'current'      => max($paged, get_query_var( 'paged' ) ),
		'format'       => '?paged=%#%',
		'show_all'     => false,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 1,
		'prev_next'    => true,
		'prev_text'    => sprintf( '<i></i> %1$s', __( '
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15 5L9.66939 11.2191C9.2842 11.6684 9.2842 12.3316 9.66939 12.7809L15 19" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
						</svg>
						<span data-paged='.$paged.'>Trước</span>
		', POWER ) ),
		'next_text'    => sprintf( '%1$s <i></i>', __( '<span data-paged='.$paged.'>Sau</span>
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M9 19L14.3306 12.7809C14.7158 12.3316 14.7158 11.6684 14.3306 11.2191L9 5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
				</svg>
		', POWER ) ),
		'add_args'     => false,
		'add_fragment' => '',
	) );

	ob_start();

	if ($query->have_posts()) : while ($query->have_posts(  )) : $query->the_post();?>
		<div class="annual-report-item" style="background: url(<?php echo the_post_thumbnail_url()?>)" data-postID="<?php echo get_the_ID()?>">
				<div class="item-content">
				<h6><?php  _e(get_the_title(get_the_ID()), POWER)?></h6>
						<div class="download">
								<a href="<?php echo paint_if_exist(get_field('file', get_the_ID()))?>" download> <span><?php _e('Tải xuống', POWER)?></span></a>
								<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M7.06476 14.4005L10.0832 17.419C10.4412 17.777 11.0216 17.777 11.3796 17.419L14.3981 14.4005M10.7314 17.1505L10.7314 4.31719" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"></path>
								</svg>
						</div>
				</div>
		</div>
	<?php 
	endwhile;
	endif; 
	wp_reset_postdata();
	$content = ob_get_contents();
	ob_end_clean();
	echo $content . "|" . $pagination;
	die;
}
add_action('wp_ajax_nopriv_annual_report_nav_ajax', 'annual_report_nav_ajax');
add_action('wp_ajax_annual_report_nav_ajax', 'annual_report_nav_ajax');

// Tender Informations
function tender_pag_action() {
	$paged = $_POST['paged'];
	$type = $_POST['type'];
	$field = $_POST['field'];
	$date = strtotime('Y-m-d', $_POST['dataDate']);
	// echo $date . $_POST['dataDate'];
	// die;
	$args = [
		'post_type'=> 'tender_notice',
		'posts_per_page' => 8,
		'paged' => $paged,
		's' => $_POST['inputValue'],
		'exact' => false,                       
    'sentence' => true,
		'tax_query' => [
			[
				'taxonomy' => 'type',
				'field'=> 'slug',
				'terms' => $_POST['type']
			],
			[
				'taxonomy' => 'field',
				'field'=> 'slug',
				'terms' => $_POST['field']
			],
		],
		// 'meta_query' => [
		// 	'relation' => 'AND',
		// 	[
		// 		'key' => 'release',
		// 		'value' => $date,
		// 		'type' => 'CHAR',
		// 		'compare' => '<='
		// 	],
		// 	[
		// 		'key' => 'release_end',
		// 		'value' => $date,
		// 		'type' => 'CHAR',
		// 		'compare' => '>='
		// 	]
		// ],
	
	];
	$query = new WP_Query($args);
	echo tender_notice_render($query, $paged);
	die;
}
add_action('wp_ajax_nopriv_tender_pag_action', 'tender_pag_action');
add_action('wp_ajax_tender_pag_action', 'tender_pag_action');

function tender_notice_render($query, $paged = 1) {
	$pagination = paginate_links( array(
		'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
		'total'        => $query->max_num_pages,
		'current'      => max($paged, get_query_var( 'paged' ) ),
		'format'       => '?paged=%#%',
		'show_all'     => false,
		'type'         => 'plain',
		'end_size'     => 1,
		'mid_size'     => 0,
		'prev_next'    => true,
		'prev_text'    => sprintf( '<i></i> %1$s', __( '
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M15 5L9.66939 11.2191C9.2842 11.6684 9.2842 12.3316 9.66939 12.7809L15 19" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
						</svg>
						<span>Trước</span>

		', POWER ) ),
		'next_text'    => sprintf( '%1$s <i></i>', __( '
		<span>Sau</span>

				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M9 19L14.3306 12.7809C14.7158 12.3316 14.7158 11.6684 14.3306 11.2191L9 5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
				</svg>
		', POWER ) ),
		'add_args'     => false,
		'add_fragment' => '',
	) );

	ob_start();

	if ($query->have_posts()) : ?>
	<?php while($query->have_posts()) : $query->the_post(); ?>
		<div class="item" data-post-ID="<?php echo get_the_ID()?>">
				<div class="d-flex justify-content-between head">
						<h6 class="title"><?php echo paint_if_exist(get_the_title(get_the_ID()))?></h6>
							<?php foreach (get_the_terms( get_the_ID(), 'status') as $key => $value) : ?>
								<span class="status status-info status-<?php echo paint_if_exist($value->slug)?>"><?php echo paint_if_exist($value->name)?></span>
							<?php endforeach; ?>
				</div>
				<div class="content">
						<span class="tag">
							<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip0_12327_38237)">
								<path d="M18.75 10.8712H16.875V7.74617C16.8779 7.59995 16.8295 7.45733 16.7382 7.34313C16.6468 7.22893 16.5183 7.15039 16.375 7.12117L3.875 4.62117C3.78421 4.60328 3.69058 4.60577 3.60087 4.62847C3.51116 4.65117 3.42761 4.6935 3.35625 4.75242C3.28291 4.8119 3.224 4.88723 3.18395 4.97275C3.14389 5.05826 3.12374 5.15174 3.125 5.24617V10.8712H1.25C1.08424 10.8712 0.925268 10.937 0.808058 11.0542C0.690848 11.1714 0.625 11.3304 0.625 11.4962V22.7462C0.625 22.9119 0.690848 23.0709 0.808058 23.1881C0.925268 23.3053 1.08424 23.3712 1.25 23.3712H18.75C18.9158 23.3712 19.0747 23.3053 19.1919 23.1881C19.3092 23.0709 19.375 22.9119 19.375 22.7462V11.4962C19.375 11.3304 19.3092 11.1714 19.1919 11.0542C19.0747 10.937 18.9158 10.8712 18.75 10.8712ZM1.875 12.1212H3.125V22.1212H1.875V12.1212ZM4.375 11.4962V6.00867L15.625 8.25867V22.1212H12.5V18.3712C12.5 18.2054 12.4342 18.0464 12.3169 17.9292C12.1997 17.812 12.0408 17.7462 11.875 17.7462H8.125C7.95924 17.7462 7.80027 17.812 7.68306 17.9292C7.56585 18.0464 7.5 18.2054 7.5 18.3712V22.1212H4.375V11.4962ZM8.75 22.1212V18.9962H11.25V22.1212H8.75ZM18.125 22.1212H16.875V12.1212H18.125V22.1212Z" fill="#7E8189"/>
								<path d="M6.5625 12.125H9.0625C9.22826 12.125 9.38723 12.0592 9.50444 11.9419C9.62165 11.8247 9.6875 11.6658 9.6875 11.5V9C9.6875 8.83424 9.62165 8.67527 9.50444 8.55806C9.38723 8.44085 9.22826 8.375 9.0625 8.375H6.5625C6.39674 8.375 6.23777 8.44085 6.12056 8.55806C6.00335 8.67527 5.9375 8.83424 5.9375 9V11.5C5.9375 11.6658 6.00335 11.8247 6.12056 11.9419C6.23777 12.0592 6.39674 12.125 6.5625 12.125ZM7.1875 9.625H8.4375V10.875H7.1875V9.625Z" fill="#7E8189"/>
								<path d="M9.0625 16.5C9.22826 16.5 9.38723 16.4342 9.50444 16.3169C9.62165 16.1997 9.6875 16.0408 9.6875 15.875V13.375C9.6875 13.2092 9.62165 13.0503 9.50444 12.9331C9.38723 12.8158 9.22826 12.75 9.0625 12.75H6.5625C6.39674 12.75 6.23777 12.8158 6.12056 12.9331C6.00335 13.0503 5.9375 13.2092 5.9375 13.375V15.875C5.9375 16.0408 6.00335 16.1997 6.12056 16.3169C6.23777 16.4342 6.39674 16.5 6.5625 16.5H9.0625ZM7.1875 14H8.4375V15.25H7.1875V14Z" fill="#7E8189"/>
								<path d="M10.9375 12.125H13.4375C13.6033 12.125 13.7622 12.0592 13.8794 11.9419C13.9967 11.8247 14.0625 11.6658 14.0625 11.5V9C14.0625 8.83424 13.9967 8.67527 13.8794 8.55806C13.7622 8.44085 13.6033 8.375 13.4375 8.375H10.9375C10.7717 8.375 10.6128 8.44085 10.4956 8.55806C10.3783 8.67527 10.3125 8.83424 10.3125 9V11.5C10.3125 11.6658 10.3783 11.8247 10.4956 11.9419C10.6128 12.0592 10.7717 12.125 10.9375 12.125ZM11.5625 9.625H12.8125V10.875H11.5625V9.625Z" fill="#7E8189"/>
								<path d="M10.9375 16.5H13.4375C13.6033 16.5 13.7622 16.4342 13.8794 16.3169C13.9967 16.1997 14.0625 16.0408 14.0625 15.875V13.375C14.0625 13.2092 13.9967 13.0503 13.8794 12.9331C13.7622 12.8158 13.6033 12.75 13.4375 12.75H10.9375C10.7717 12.75 10.6128 12.8158 10.4956 12.9331C10.3783 13.0503 10.3125 13.2092 10.3125 13.375V15.875C10.3125 16.0408 10.3783 16.1997 10.4956 16.3169C10.6128 16.4342 10.7717 16.5 10.9375 16.5ZM11.5625 14H12.8125V15.25H11.5625V14Z" fill="#7E8189"/>
								</g>
								<defs>
								<clipPath id="clip0_12327_38237">
								<rect width="20" height="20" fill="white" transform="translate(0 4)"/>
								</clipPath>
								</defs>
							</svg>
							<span class="item-child">
								<strong><?php _e('Bên mời thầu:', POWER)?></strong> 
								<span><?php echo paint_if_exist(get_field('bid_solicitor', get_the_ID()))?></span>
							</span>
						</span>
						<span class="tag">
							<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M2.5 9C2.5 7.61929 3.61929 6.5 5 6.5H15C16.3807 6.5 17.5 7.61929 17.5 9V19C17.5 20.3807 16.3807 21.5 15 21.5H5C3.61929 21.5 2.5 20.3807 2.5 19V9Z" stroke="#7E8189" stroke-width="1.5"/>
								<path d="M2.5 10.6667H17.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round"/>
								<path d="M13.75 5.25L13.75 7.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M6.25001 5.25L6.25001 7.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M5.41666 14.0052H6.24999" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M9.58331 14.0052H10.4166" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M13.75 14.0052H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M5.41666 17.3411H6.24999" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M9.58331 17.3411H10.4166" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M13.75 17.3411H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
							<span class="item-child">
								<strong><?php _e('Phát hành:', POWER)?></strong> 
								<span><?php echo paint_if_exist('Từ '.get_field('release', get_the_ID()))?> <?php echo paint_if_exist(' Đến '.get_field('release_end', get_the_ID()))?>
							</span></span>
						</span>
						<span class="tag">
							<svg width="20" height="24" viewBox="0 0 20 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M1.66669 11.3594C1.66669 10.2548 2.56212 9.35938 3.66669 9.35938H16.3334C17.4379 9.35938 18.3334 10.2548 18.3334 11.3594V12.157C18.3334 13.0402 17.754 13.8189 16.908 14.0727L11.1494 15.8002C10.3997 16.0252 9.60039 16.0252 8.85063 15.8002L3.09199 14.0727C2.24602 13.8189 1.66669 13.0402 1.66669 12.157V11.3594Z" stroke="#7E8189" stroke-width="1.5"/>
								<path d="M10 13.6395L10 12.2109" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M2.36118 13.6406L2.36118 17.4977C2.36118 19.7069 4.15204 21.4977 6.36118 21.4977H13.639C15.8481 21.4977 17.639 19.7069 17.639 17.4977V13.6406" stroke="#7E8189" stroke-width="1.5"/>
								<path d="M12.7778 9.35713V8.5C12.7778 7.39543 11.8824 6.5 10.7778 6.5H9.22223C8.11766 6.5 7.22223 7.39543 7.22223 8.5L7.22223 9.35713" stroke="#7E8189" stroke-width="1.5"/>
							</svg>
							<span class="item-child">
								<strong><?php _e('Lĩnh vực:', POWER)?></strong> 
								<?php foreach (get_the_terms( get_the_ID(), 'type') as $key => $value) : ?>
									<span><?php echo paint_if_exist($value->name)?></span>
								<?php endforeach; ?>
							</span>
						</span>
				</div>
		</div>
	<?php  endwhile; ?>
	<?php else :?>
		<div class="no-item-found">
			<h3><?php _e("Không có thông tin nào được tìm thấy, vui lòng thử lại", POWER)?></h3>
		</div>
	<?php endif;wp_reset_postdata();
	$tender_notice_list = ob_get_contents();
	ob_end_clean();
	return $tender_notice_list . "|" . $pagination;
}

// Action Reset
function tender_notice_reset_action() {
	$args = [
		'post_type'=> 'tender_notice',
		'posts_per_page' => 8,
		'paged' =>  1,
	];

	$query = new WP_Query($args);

	echo tender_notice_render($query, 1);
	die;
}
add_action('wp_ajax_nopriv_tender_notice_reset_action', 'tender_notice_reset_action');
add_action('wp_ajax_tender_notice_reset_action', 'tender_notice_reset_action');

// End Tender Informations