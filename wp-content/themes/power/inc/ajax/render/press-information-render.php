<?php
function press_information_render($query, $paged = '1') {
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
			<div class="shareholder-item" data-postID="<?php echo get_the_ID() ?>">
					<div class="shareholder-title">
							<div class="name-and-time">
									<h6><a href="<?php the_permalink()?>"><?php _e(get_the_title(get_the_ID()), POWER) ?></a></h6>

							</div>
							<div class="name-and-time">

									<div class="download">
											<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path d="M1.66797 2.4974C1.66797 2.03716 2.04106 1.66406 2.5013 1.66406H9.16797C9.38898 1.66406 9.60094 1.75186 9.75722 1.90814L18.0906 10.2415C18.416 10.5669 18.416 11.0945 18.0906 11.42L11.4239 18.0867C11.0985 18.4121 10.5708 18.4121 10.2454 18.0867L1.91205 9.75332C1.75577 9.59704 1.66797 9.38508 1.66797 9.16406V2.4974ZM3.33464 3.33073V8.81888L10.8346 16.3189L16.3228 10.8307L8.82279 3.33073H3.33464Z" fill="#7E8189" />
													<path d="M7.5013 6.2474C7.5013 6.93775 6.94166 7.4974 6.2513 7.4974C5.56095 7.4974 5.0013 6.93775 5.0013 6.2474C5.0013 5.55704 5.56095 4.9974 6.2513 4.9974C6.94166 4.9974 7.5013 5.55704 7.5013 6.2474Z" fill="#7E8189" />
											</svg>
											<?php
											foreach (get_the_terms(get_the_ID(), 'type') as $key => $value) { ?>
													<span><?php _e($value->name) ?></span>
											<?php }
											?>
									</div>
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
											<span class="text"><a href="#"><?php _e(paint_if_exist(date("d/m/Y", strtotime(get_the_date()))), POWER) ?></a></span>
									</div>
							</div>


							<div class="download">
									<a href="<?php echo paint_if_exist(get_field('press_information_file', get_the_ID())) ?>" download> <span><?php _e('Tải xuống', POWER) ?></span></a>
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
	$press_information = ob_get_contents();
	ob_end_clean();
	return $press_information . "|" . $pagination;
}