<?php

/**
Template Name: Danh sách tuyển dụng  
 **/
$banner = get_field('banner_danh_sach_tuyen_dung', 'option');
$send_profile = get_field('send_profile', 'option');
$other_info = get_field('other_info_danh_sach_tuyen_dung', 'option');

$args = array(
    'post_type'    => 'vacancies',
    'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
    'post_status' => 'publish',

);

$filter_args = array(
    'post_type'    => 'vacancies',
    'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
    'post_status' => 'publish',
    'posts_per_page' => 999999,
);

$filter = new WP_Query($filter_args);
$the_query_post = new WP_Query($args);
get_header();
?>
<div class="danh-sach-tuyen-dung">
    <section class="banner not_navigation" style='background-image:url("<?php echo $banner['background']; ?>")'>
        <div class="container">
            <div class="content">
                <?php if ($banner['title']) : ?><h3><?php echo $banner['title']; ?></h3> <?php endif; ?>
                <?php if ($banner['title']) : ?> <p><?php echo $banner['description']; ?></p> <?php endif; ?>
            </div>
        </div>
    </section>
    <div class="main ">
        <section class="filter-post-section">
            <div class="filter-post-container ">
                <div class="form-filter container">
                    <div class="form  d-flex">
                        <div class="form-filter-search d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <circle cx="11" cy="11" r="8" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16.5 16.958L21.5 21.958" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <input type="text" placeholder="Tìm kiếm" class="search">
                        </div>
                        <?php if ($filter->have_posts()) : ?>
                            <div class="form-filter-field filter-item">
                                <?php $tax_vacancies_location = get_taxonomy('vacancies_location')->label;
                                $terms = get_terms(array(
                                    'taxonomy' => 'vacancies_location',
                                    'hide_empty' => false,
                                ));
                                ?>
                                <ul>
                                    <?php if (isset($tax_vacancies_location)) : ?>
                                        <li class="item active default"><?php echo paint_if_exist($tax_vacancies_location) ?></li>
                                    <?php endif ?>
                                    <?php foreach ($terms as $key => $value) : ?>
                                        <li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="button-submit">
                            <button class="btn btn-search btn-submit">Tìm kiếm</button>
                        </div>
                        <div class="button-reset">
                            <button class="btn btn-reset">Đặt lại</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <div class="content">
            <div class="container">
                <section class="infomation-list active">
                    <div class="list ">
                        <?php if ($the_query_post->have_posts()) : ?>
                            <?php while ($the_query_post->have_posts()) : $the_query_post->the_post(); ?>
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
                                    <?php if (get_field("address")) : ?>
                                        <div class="info  info-address">
                                            <p class="label ">Địa điểm</p>
                                            <?php foreach (get_the_terms(get_the_ID(), 'vacancies_location') as $key => $value) : ?>
                                                <p class="desc"> <?php echo paint_if_exist($value->name) ?></p>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="d-flex wrap-info">
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
                                    <div class="info">
                                        <a href="<?php echo the_permalink(); ?>" class="btn btn-detail btn-detail-icon">
                                            Xem chi tiết
                                            <svg width="16" height="10" viewBox="0 0 16 10" fill="#DAA622" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.1297 8.66927L14.1482 5.65078C14.5062 5.2928 14.5062 4.7124 14.1482 4.35442L11.1297 1.33594M13.8797 5.0026L1.04639 5.00261" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </section>
                <section>
                    <div class="custom-pagination">
                        <nav aria-label="Page navigation example m-auto" class="pagination justify-content-center custom-pagination my-2">
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
                </section>
            </div>
        </div>
        <section class="gui-ho-so container-fluid">
            <div class="row">
                <div class="col-12 col-md-6 col-left">
                    <div class="content">
                        <?php if ($send_profile['title']) : ?> <h4><?php echo $send_profile['title'];  ?></h4> <?php endif; ?>
                        <?php if ($send_profile['description']) : ?> <p><?php echo $send_profile['description']; ?></p> <?php endif; ?>
                        <?php if ($send_profile['link'] || $send_profile['buton']) : ?>
                            <a href="<?php echo $send_profile['link']; ?>" class="btn btn-search text-uppercase">
                                <?php echo $send_profile['button']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6  col-right">
                    <img src="<?php echo $send_profile['image']; ?>" alt="<?php echo $send_profile['title']; ?>">
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
</div>
<?php
get_footer();
?>