<?php
/**
 * Template Name: Thư viện video
 */

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";

$banner = get_field('banner_library', 'option');

$navigation = '';

if ($banner) {

    $navigation = $banner['main_navigation'];
}

$the_slug_image = 'images';

$the_slug_video = 'video';

if (isset($_GET['image'])) {
    $s = $_GET['image'];
}


$args_video = array(

    'post_type' => 'library',



    'tax_query' => array(

        array(

            'taxonomy' =>  'type_library',

            'field'    => 'slug',

            'terms'    => $the_slug_video,

        ),

    ),

    'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),

    'post_status' => 'publish',

    'posts_per_page' => 6,

    

);


if (isset($_GET['param']) && $_GET['param'] != '') {
    echo $_GET['param'];
    die;
}

$the_query_post_image = new WP_Query($args_image);

$the_query_post_video = new WP_Query($args_video);

$useful_infomation = get_field('infomation_library', 'option');

get_header();

?>

<div class="thu-vien-hinh-anh thu-vien-video">
		<!-- Banner Section -->
		<?php include(get_stylesheet_directory(  ) . '/templates/thu-vien-banner-section.php'); ?>


    <div class="main">

        <section class="row fillter">

            <div class="container">

                 <div class="form-filter image">

                    <form action="<?php echo get_site_url(  ).'/thu-vien/?'?>" class="d-flex justify-content-between flex-wrap">

                        <div class="form-filter-search">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                                <circle cx="11" cy="11" r="8" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                                <path d="M16.5 16.957L21.5 21.957" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                            </svg>

                            <input type="text" name="image" class="form-control search" placeholder="Tìm kiếm">

                        </div>

                        <div class="button-submit">

                            <button class="btn btn-search btn-submit image active">Tìm kiếm</button>

                        </div>

                        <div class="button-reset">

                            <button class="btn btn-reset">Đặt lại</button>

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


                    <div role="tabpanel" class="tab-pane active" id="video">

                        <section class="video-list">

                            <div class="video-container">

                                <div class="video-content">

                                    <?php if ($the_query_post_video->have_posts()) : ?>

                                        <?php while ($the_query_post_video->have_posts()) : $the_query_post_video->the_post();

                                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large');

                                            $videos = get_field('video') ?>

                                            <a class="video-item-link link-<?php echo $key ?>" href="<?php echo paint_if_exist($videos['link']) ?>">

                                                <div class="video-item video-item-<?php echo $key ?>">

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

                                    <?php endif; ?>

                                </div>

                            </div>

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



                                    'total' => $the_query_post_video->max_num_pages,

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

$other_info = get_field('video_other_section', 'option');
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