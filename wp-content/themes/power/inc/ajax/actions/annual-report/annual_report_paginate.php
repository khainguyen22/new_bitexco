<?php

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
		'mid_size'     => 3,
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