<?php
function render($query, $paged = 1) {
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