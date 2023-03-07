<?php



/**

 * Template Name: Thông tin hữu ích

 **/

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

$args_image = array(

    'post_type' => 'library',

    'tax_query' => array(

        array(

            'taxonomy' =>  'type_library',

            'field'    => 'slug',

            'terms'    => $the_slug_image,

        ),

    ),

    'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),

    'post_status' => 'any',

    'posts_per_page' => 3,

    's' => $s,

);

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

$other_info = get_field('other_library', 'option');



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
                    <div role="tabpanel" class="tab-pane active" id="useful-infomation">

                        <section class="infomation-useful">

                            <div class="container">

                                <div class="image-version" style="display: block">

                                    <div class="world-electric-field-magazine-tab tab">

                                        <div class="power-production-tab-title tab-title d-flex">

                                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" style="visibility: visible">

                                                <path d="M8.8 13.8L11.3172 11.0891C11.7128 10.6631 12.3872 10.6631 12.7828 11.0891L15.3 13.8M2 12.5C2 6.97715 6.47715 2.5 12 2.5C17.5228 2.5 22 6.97715 22 12.5C22 18.0228 17.5228 22.5 12 22.5C6.47715 22.5 2 18.0228 2 12.5Z" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round"></path>

                                            </svg>

                                            <h2><?php _e('Tạp chí ngành điện thế giới') ?></h2>

                                        </div>

                                        <div class="world-electric-field-magazine item-box d-flex">

                                            <?php

                                            $magazines = get_field('world_electric_field_magazine', 'option');

                                            ?>

                                            <?php foreach ($magazines as $key => $magazine) : ?>

                                                <a href="<?php echo $magazine['url'] ?>" class="item electric" style="background-image: url(<?php echo $magazine['image'] ?>)">

                                                    <span class="world-electric-title"><?php _e($magazine['title']) ?></span>

                                                </a>

                                            <?php endforeach; ?>

                                        </div>

                                    </div>

                                    <div class="power-production-tab tab">

                                        <div class="power-production-tab-title tab-title d-flex">

                                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" style="visibility: visible">

                                                <path d="M8.8 13.8L11.3172 11.0891C11.7128 10.6631 12.3872 10.6631 12.7828 11.0891L15.3 13.8M2 12.5C2 6.97715 6.47715 2.5 12 2.5C17.5228 2.5 22 6.97715 22 12.5C22 18.0228 17.5228 22.5 12 22.5C6.47715 22.5 2 18.0228 2 12.5Z" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round"></path>

                                            </svg>

                                            <h2><?php _e('Website công ty điện lực thế giới') ?></h2>

                                        </div>

                                        <div class="world-electric-companies item-box d-flex">

                                            <?php

                                            $companies = get_field('world_electric_companies', 'option');

                                            ?>

                                            <?php foreach ($companies as $key => $company) : ?>

                                                <div class="item company">

                                                    <a href="<?php echo $company['url'] ?>" class="company-item" style="background-image: url(<?php echo $company['logo'] ?>)"></a>

                                                    <a href="<?php echo $company['url'] ?>" class="item company-item-title" style="background-image: url()"><?php echo $company['title'] ?></a>

                                                </div>

                                            <?php endforeach; ?>

                                        </div>

                                    </div>

                                </div>

                                <div class="sitemap-content text-version" style="display: none">

                                    <div class="power-production-tab tab">

                                        <div class="power-production-tab-title tab-title d-flex">

                                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" style="visibility: visible">

                                                <path d="M8.8 13.8L11.3172 11.0891C11.7128 10.6631 12.3872 10.6631 12.7828 11.0891L15.3 13.8M2 12.5C2 6.97715 6.47715 2.5 12 2.5C17.5228 2.5 22 6.97715 22 12.5C22 18.0228 17.5228 22.5 12 22.5C6.47715 22.5 2 18.0228 2 12.5Z" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round"></path>

                                            </svg>

                                            <h2><?php _e('Tạp chí ngành điện thế giới') ?></h2>

                                        </div>

                                        <div class="item-box">

                                            <?php foreach ($companies as $key => $company) : ?>

                                                <div class="text-version-item">

                                                    <a class="size-text-14" href="<?php echo $company['url'] ?>"><?php _e($company['title']) ?></a>

                                                </div>

                                            <?php endforeach; ?>

                                        </div>

                                    </div>

                                    <div class="power-production-tab tab">

                                        <div class="power-production-tab-title tab-title d-flex">

                                            <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" style="visibility: visible">

                                                <path d="M8.8 13.8L11.3172 11.0891C11.7128 10.6631 12.3872 10.6631 12.7828 11.0891L15.3 13.8M2 12.5C2 6.97715 6.47715 2.5 12 2.5C17.5228 2.5 22 6.97715 22 12.5C22 18.0228 17.5228 22.5 12 22.5C6.47715 22.5 2 18.0228 2 12.5Z" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round"></path>

                                            </svg>

                                            <h2><?php _e('Website công ty điện lực thế giới') ?></h2>

                                        </div>

                                        <div class="item-box">

                                            <?php foreach ($magazines as $key => $magazine) : ?>

                                                <div class="text-version-item">

                                                    <a class="size-text-14" href="<?php echo $magazine['url'] ?>"><?php _e($magazine['title']) ?></a>

                                                </div>

                                            <?php endforeach; ?>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>

                    </div>

                </div>

            </div>

        </section>

    </div>

    <?php if ($other_info) : ?>
				<!-- Other information -->
				<?php include(get_stylesheet_directory(  ) . '/templates/thu-vien-other-section.php');?>
    <?php endif; ?>

</div>

<?php

get_footer();

?>