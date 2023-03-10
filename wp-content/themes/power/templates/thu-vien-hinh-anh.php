<?php
/**
 * Template Name: Thư viện hình ảnh
 */
 
 $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";
 
 $home = home_url( add_query_arg( $_GET, '' ) );

 $banner = get_field('banner_library', 'option');
 
 $navigation = '';
 
 if ($banner) {
 
		 $navigation = $banner['main_navigation'];
 }
 
 $the_slug_image = 'images';
 
 if (isset($_GET['image'])) {
		 $s = $_GET['image'];
		 
 }

 if (isset($_GET['slug'])) {
	$slug = $_GET['slug'];
	$hydroelectric_plant_name = array(
 
		'taxonomy' =>  'hydroelectric_plant_name',

		'field'    => 'slug',

		'terms'    => $slug,

	);
}

 $args_image = array(
 
		 'post_type' => 'library',
 
		 'tax_query' => array(
				'relation' => 'AND',
				 array(
 
						 'taxonomy' =>  'type_library',
 
						 'field'    => 'slug',
 
						 'terms'    => $the_slug_image,
 
				 ),
				 $hydroelectric_plant_name
 
		 ),
 
		 'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
 
		 'post_status' => 'publish',
 
		 'posts_per_page' => 3,
 
		 's' => $s,
 
 );
 
 $the_query_post_image = new WP_Query($args_image);
 
 
 get_header();
 
 ?>
 
 <div class="thu-vien-hinh-anh thu-vien-hin">
			<!-- Banner Section -->
			<?php include(get_stylesheet_directory(  ) . '/templates/thu-vien-banner-section.php'); ?>

		 	<div class="main">
 
				 <section class="row fillter">
 
						 <div class="container">
 
									<div class="form-filter image">
 
										 <form action="<?php echo get_site_url(  ).'/thu-vien/hinh-anh/?'?>" class="d-flex justify-content-between flex-wrap">
 
												 <div class="form-filter-search">
 
														 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
 
																 <circle cx="11" cy="11" r="8" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
 
																 <path d="M16.5 16.957L21.5 21.957" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
 
														 </svg>
 
														 <input type="text" name="image" class="form-control search" placeholder="Tìm kiếm">
 
												 </div>
 
												 <div class="button-submit">
 
														 <button class="btn btn-search btn-submit image active"><?php _e('Tìm kiếm')?></button>
 
												 </div>
 
												 <div class="button-reset">
 
														 <button class="btn btn-reset"><?php _e('Đặt lại')?></button>
 
												 </div>
 
										 </form>
 
								 </div>
 
						 </div>
 
				 </section>
 
				 <section class="group-tabs">
 
						 <div class="container">

 								<!-- Navigation -->
								<?php include(get_stylesheet_directory(  ) . '/templates/thu-vien-dieu-huong.php')?>
 
								 <div class="tab-content">
 
										 <div role="tabpanel" class="tab-pane active" id="images">
												 <section class="images-library">
 
														 <?php if ($the_query_post_image->have_posts()) : ?>
 
																 <?php $count = 0; ?>
 
																 <?php while ($the_query_post_image->have_posts()) : $the_query_post_image->the_post();
 
																		 $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
 
																		 $images = get_field('image') ?>
 
																		 <div class="wrap-content <?php echo $count % 2 != 0 ? "flex-row-reverse" : "" ?>" data-post-id="<?php echo get_the_ID()?>">
 
																				 <div class="slider">
 
																						 <div class="vrmedia-gallery">
 
																								 <!-- START UNITE GALLERY LITE 1.7.56 -->
																								 <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(  ) . '/access/js/unite-gallery.min.js'?>"></script>
																								 <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(  ) . '/access/js/unite-gallery-default-theme.js'?>"></script>
																									<div id="hydroelectric-plant-<?php echo $count?>">
																											<?php foreach ($images['gallery'] as $key => $value) : ?>
																												<img src="<?php echo $value; ?>" alt="<?php echo "Image ". $key?>" data-image="<?php echo $value;?>">
																											<?php endforeach;?>
																									</div>
																								 <svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
 
																										 <rect opacity="0.7" x="2.6167" y="3.35938" width="20.9328" height="20.8282" rx="2" fill="#0D0D0E" />
 
																										 <path d="M18.3023 11.8898C18.1934 11.5862 17.9042 11.3833 17.5802 11.3833H14.8092L13.8035 8.6308C13.6931 8.32976 13.4054 8.12891 13.0829 8.12891C12.7604 8.12891 12.4727 8.32976 12.3623 8.6308L11.3565 11.3833H8.58561C8.2616 11.3833 7.97234 11.5862 7.86349 11.8898C7.75463 12.1934 7.84918 12.532 8.1001 12.7364L10.2286 14.4694L9.09155 17.5804C8.98014 17.8865 9.07571 18.2293 9.3297 18.4342C9.58421 18.6391 9.94092 18.6605 10.2184 18.4881L13.0829 16.7068L15.9473 18.4881C16.072 18.5659 16.2131 18.604 16.3536 18.604C16.5253 18.604 16.696 18.5466 16.8361 18.4342C17.0901 18.2293 17.1856 17.8865 17.0742 17.5804L15.9371 14.4694L18.0657 12.7364C18.3166 12.532 18.4111 12.1934 18.3023 11.8898Z" fill="#DAA622" />
 
																								 </svg>
																								 <script type="text/javascript">
																									window.onload = function (e) {
																										if (typeof ugCheckForErrors == "undefined") {
																											document.getElementById("hydroelectric-plant-<?php echo $count ?>").innerHTML =
																												"<span style='color:red'>Unite Gallery Error - gallery js and css files not included in the footer. Please make sure that wp_footer() function is added to your theme.</span>";
																										} else {
																											ugCheckForErrors("hydroelectric-plant-<?php echo $count ?>", "jquery");
																										}
																									};

																									

																									jQuery("#hydroelectric-plant-<?php echo $count?>").unitegallery({
  full_width: true,
  gallery_width: "900",
  gallery_height: "323",
  gallery_theme_info: "Default Theme",
  enable_category_tabs: false,
  gallery_min_width: "600",
  gallery_min_height: "323",
  gallery_skin: "default",
  gallery_images_preload_type: "minimal",
  gallery_autoplay: true,
  gallery_play_interval: "5000",
  gallery_pause_on_mouseover: true,
  gallery_mousewheel_role: "none",
  gallery_control_keyboard: true,
  gallery_carousel: true,
  gallery_preserve_ratio: true,
  gallery_shuffle: false,

	// Thumb
  thumb_width: "60",
  thumb_height: "35",

	// Slider
  slider_controls_always_on: true,

	slider_progress_indicator_type: "bar",
	slider_progress_indicator_align_hor: "center",
	slider_progress_indicator_align_vert: "bottom",
	slider_progress_indicator_offset_hor: "16",
	slider_progress_indicator_offset_vert: "0",
	slider_progressbar_color: "#DAA622",
	slider_progressbar_opacity: "0.8",
	slider_progressbar_line_width: "4",
	slider_progresspie_color1: "#b5b5b5",
	slider_progresspie_color2: "#e5e5e5",
	slider_progresspie_stroke_width: "6",
	slider_progresspie_width: "30",
	slider_progresspie_height: "30",

	theme_enable_fullscreen_button: true,	//show, hide the theme fullscreen button. The position in the theme is constant
	theme_enable_play_button: true,			//show, hide the theme play button. The position in the theme is constant
	theme_enable_hidepanel_button: true,	//show, hide the hidepanel button
	theme_enable_text_panel: false,			//enable the panel text panel. 
	
	theme_text_padding_left: 20,			//left padding of the text in the textpanel
	theme_text_padding_right: 5,			//right paddin of the text in the textpanel
	theme_text_align: "left",				//left, center, right -   the align of the text in the textpanel
	theme_text_type: "title",				//title, description - text that will be shown on the text panel, title or description
	
	theme_hide_panel_under_width: 480		//hide panel under certain browser width, if null, don't hide		
});

																								 </script>
 
																						 </div>
 
																				 </div>
 
																				 <div class="content">
																						<div class="hydroelectric-plant-name">
																								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
																										<path d="M1.66797 2.4974C1.66797 2.03716 2.04106 1.66406 2.5013 1.66406H9.16797C9.38898 1.66406 9.60094 1.75186 9.75722 1.90814L18.0906 10.2415C18.416 10.5669 18.416 11.0945 18.0906 11.42L11.4239 18.0867C11.0985 18.4121 10.5708 18.4121 10.2454 18.0867L1.91205 9.75332C1.75577 9.59704 1.66797 9.38508 1.66797 9.16406V2.4974ZM3.33464 3.33073V8.81888L10.8346 16.3189L16.3228 10.8307L8.82279 3.33073H3.33464Z" fill="#7E8189" />
																										<path d="M7.5013 6.2474C7.5013 6.93775 6.94166 7.4974 6.2513 7.4974C5.56095 7.4974 5.0013 6.93775 5.0013 6.2474C5.0013 5.55704 5.56095 4.9974 6.2513 4.9974C6.94166 4.9974 7.5013 5.55704 7.5013 6.2474Z" fill="#7E8189" />
																								</svg>
																								<?php
																								foreach (get_the_terms(get_the_ID(), 'hydroelectric_plant_name') as $key => $value) : ?>
																										<a href="<?php echo get_site_url() . '/thu-vien/hinh-anh/?slug=' . $value->slug?>"><span><?php _e($value->name) ?></span></a>
																								<?php endforeach;
																								?>
																						</div>
 
																						 <span class="text-underline"><?php _e('ALBUM ' . ($count + 1))?></span>
 
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
 
																												 <strong><?php _e('Loại hình: ')?></strong>
 
																												 <span><?php echo  paint_if_exist($images['type']->name) ?></span>
 
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
 
																												 <strong><?php _e('Ngày chụp: ')?></strong>
 
																												 <span><?php echo  paint_if_exist($images['date']) ?></span>
 
																										 </span>
 
																								 </div>
 
																								 <div class="info-item location">
 
																										 <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
 
																												 <path d="M15.1312 8.03125C15.1312 12.4021 10.1587 16.9563 8.91558 16.9563C7.67245 16.9563 2.69995 12.4021 2.69995 8.03125C2.69995 4.51044 5.48278 1.65625 8.91558 1.65625C12.3484 1.65625 15.1312 4.51044 15.1312 8.03125Z" stroke="#7E8189" stroke-width="1.5" />
 
																												 <ellipse rx="2.39062" ry="2.39063" transform="matrix(-1 0 0 1 8.91553 7.87109)" stroke="#7E8189" stroke-width="1.5" />
 
																										 </svg>
 
 
 
																										 <span class="text">
 
																												 <strong><?php _e('Vị trí: ')?></strong>
 
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
 
																												 <strong><?php _e('Số ảnh: ')?></strong>
 
																												 <span><?php echo  paint_if_exist($images['count_image']) ?></span>
 
																										 </span>
 
																								 </div>
 
																						 </div>
 
																						 <div class="desc">
 
																								 <p><?php echo paint_if_exist(get_the_content(get_the_ID())) ?></p>
 
																						 </div>
 
																				 </div>
 
																		 </div>
 
																		 <?php $count++; ?>
 
																 <?php endwhile; ?>
															<?php else:?>
																<?php not_result()?>
														 <?php endif; ?>
 
												 </section>
												 <section>

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



				'total' => $the_query_post_image->max_num_pages,

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

</section>
										 </div>
								 </div>
 
						 </div>
 
				 </section>
 
		 </div>
 
		 <?php 

			$other_info = get_field('images_other_section', 'option');
		 	if ($other_info) : 
		 
		 ?>
				<!-- Other information -->
				<div role="tabpanel" class="tab-pane active" id="images">
						<section class="other-information">

								<div class="other-container ">

										<div class="other-content hover-zoom">

												<?php foreach ($other_info as $value) : ?>

														<a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>

												<?php endforeach; ?>

										</div>

								</div>

						</section>
				</div>
		 <?php endif; ?>
 
 </div>
 
 <?php
 
 get_footer();
 
 ?>