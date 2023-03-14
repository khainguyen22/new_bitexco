<?php
// Tender information render
function tender_notice_render($query, $paged = 1)
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
			<div class="item" data-post-ID="<?php echo get_the_ID() ?>">
				<div class="d-flex justify-content-between head">
					<h6 class="title"><?php echo paint_if_exist(get_the_title(get_the_ID())) ?></h6>
					<?php
									$status = get_field('releasing_status', get_the_ID());
								?>
								<a href="<?php echo '' . get_site_url() . '/' . $status->taxonomy . '/' .  $status->slug . ''; ?>"><span class="status status-info status-<?php echo  $status->slug ?>"><?php echo $status->name; ?></span></a>
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
	<?php else : ?>
		<div class="no-item-found w-100">
			<div class="content text-center">
				<div class="icon">
					<svg width="50" height="42" viewBox="0 0 50 42" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M45.3438 4.98438H6.375C4.87334 4.98438 3.65625 6.20147 3.65625 7.70312V13.1406H45.3438V4.98438Z" fill="#D1D5DB" />
						<path d="M45.3438 3.45508C45.3438 1.95342 44.1267 0.736328 42.625 0.736328C38.7925 0.736328 31.8832 0.736328 28.4159 0.736328C27.1154 0.736328 25.9137 1.43323 25.2685 2.56242C24.1982 4.43655 22.6875 7.08008 22.6875 7.08008H45.3438V3.45508Z" fill="#D1D5DB" />
						<path d="M3.65625 7.53125H45.3438V9.21959H3.65625V7.53125Z" fill="#D1D5DB" />
						<path d="M48.3967 12.763C48.5408 11.7245 48.2282 10.6741 47.5403 9.88386C46.8516 9.0927 45.8547 8.63867 44.8062 8.63867C35.566 8.63867 13.4354 8.63867 4.1953 8.63867C3.14676 8.63867 2.14989 9.0927 1.46114 9.88386C0.773296 10.6741 0.460639 11.7245 0.604733 12.763C1.52367 19.3786 3.30717 32.2184 4.12914 38.138C4.37836 39.9297 5.90992 41.2637 7.7197 41.2637H41.2818C43.0915 41.2637 44.6231 39.9297 44.8723 38.138C45.6943 32.2184 47.4778 19.3786 48.3967 12.763Z" fill="#D1D5DB" />
						<path d="M0.909233 14.9561C0.977202 14.2012 1.27989 13.4799 1.78648 12.898C2.47433 12.1078 3.4712 11.6538 4.51973 11.6538H44.4817C45.5303 11.6538 46.5271 12.1078 47.215 12.898C47.7216 13.4799 48.0243 14.2012 48.0922 14.9561L48.3967 12.763C48.5408 11.7245 48.2282 10.6741 47.5403 9.88386C46.8516 9.0927 45.8547 8.63867 44.8062 8.63867C35.566 8.63867 13.4354 8.63867 4.1953 8.63867C3.14676 8.63867 2.14989 9.0927 1.46114 9.88386C0.773296 10.6741 0.460639 11.7245 0.604733 12.763L0.909233 14.9561Z" fill="#F6F8FC" />
						<path d="M20.4238 32.2246C20.4238 31.2241 19.6127 30.4121 18.6113 30.4121C16.6004 30.4121 13.3732 30.4121 11.3613 30.4121C10.3608 30.4121 9.54883 31.2241 9.54883 32.2246V34.0371C9.54883 35.0385 10.3608 35.8496 11.3613 35.8496H18.6113C19.6127 35.8496 20.4238 35.0385 20.4238 34.0371C20.4238 33.4544 20.4238 32.8082 20.4238 32.2246Z" fill="#434449" />
						<path d="M34.0176 15.2002C28.7659 15.2002 24.502 19.4641 24.502 24.7158C24.502 29.9675 28.7659 34.2314 34.0176 34.2314C39.2693 34.2314 43.5332 29.9675 43.5332 24.7158C43.5332 19.4641 39.2693 15.2002 34.0176 15.2002ZM34.0176 17.9189C37.7685 17.9189 40.8145 20.9648 40.8145 24.7158C40.8145 28.4668 37.7685 31.5127 34.0176 31.5127C30.2666 31.5127 27.2207 28.4668 27.2207 24.7158C27.2207 20.9648 30.2666 17.9189 34.0176 17.9189Z" fill="#434449" />
						<path d="M38.9738 31.2866L47.4273 39.7401C47.9584 40.2711 48.8193 40.2711 49.3503 39.7401C49.8805 39.2099 49.8805 38.3481 49.3503 37.8179L40.8968 29.3644C40.3658 28.8343 39.5049 28.8343 38.9738 29.3644C38.4436 29.8946 38.4436 30.7564 38.9738 31.2866Z" fill="#434449" />
					</svg>
				</div>
				<p><?php _e('Không tìm thấy kết quả') ?></p>
			</div>
		</div>
<?php endif;
	wp_reset_postdata();
	$tender_notice_list = ob_get_contents();
	ob_end_clean();
	return $tender_notice_list . "|" . $pagination;
}
