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
                        <div class="form  d-flex form-filter">
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
                                    <?php if (isset($tax_vacancies_location)) : ?>
                                        <span class="item-default"><?php echo paint_if_exist($tax_vacancies_location) ?></span>
                                    <?php endif ?>
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
                                <button class="btn btn-search btn-submit"><?php _e('Tìm kiếm') ?></button>
                            </div>
                            <div class="button-reset">
                                <button class="btn btn-reset"><?php _e('Đặt lại') ?></button>
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
                                                <p class="label "><?php _e('Vị trí tuyển dụng') ?></p>
                                                <p class="desc"><?php echo the_title(); ?></p>
                                            </div>
                                            <div class="hot <?php echo get_field("vi_tri_hot") != 1 ? 'deactive' : 'active'; ?>">
                                                <img src="https://power.dtts.com.vn/wp-content/uploads/2022/12/hot.png" alt="hot">
                                            </div>
                                        </div>
                                        <div class="d-flex wrap-info">
                                            <?php if (get_field("address")) : ?>
                                                <div class="info  info-address">
                                                    <p class="label "><?php _e('Địa điểm') ?></p>
                                                    <?php foreach (get_the_terms(get_the_ID(), 'vacancies_location') as $key => $value) : ?>
                                                        <p class="desc"> <?php echo paint_if_exist($value->name) ?></p>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="d-flex wrap">
                                                <div class="info">
                                                    <p class="label "><?php _e('Số lượng') ?></p>
                                                    <p class="desc"><?php echo get_field("amount") ?></p>
                                                </div>
                                                <?php if (get_field("deadline")) : ?>
                                                    <div class="info">
                                                        <p class="label "><?php _e('Hạn nộp hồ sơ') ?></p>
                                                        <p class="desc"><?php echo get_field("deadline"); ?></p>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (getPostViews(get_the_ID())) : ?>
                                                    <div class="info">
                                                        <p class="label "><?php _e('Lượt xem') ?></p> 
                                                        <p class="desc"><?php echo getPostViews(get_the_ID()) ?></p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="info wrap-btn">
                                            <a href="<?php echo the_permalink(); ?>" class="btn btn-detail btn-detail-icon">
                                                <?php _e('Xem chi tiết') ?>
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
                            <button type="button" data-toggle="modal" data-target="#popup_ung_tuyen" class="btn btn_success btn btn-search text-uppercase"> <?php _e('Gửi hồ sơ'); ?></button>
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
        <!-- Modal -->
        <div class="modal fade" id="popup_ung_tuyen" tabindex="-1" role="dialog" aria-labelledby="popup_ung_tuyen_title" aria-hidden="true" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle "><?php _e('Đơn tự ứng tuyển') ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.00056 14.9994L15 1" stroke="#434449" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M1.00055 1.00056L15 15" stroke="#434449" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo do_shortcode('[contact-form-7 id="3281" title="Popup hồ sơ ứng tuyển"]'); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal  successfully -->
        <div class="modal fade" id="popup_ung_tuyen_successfully" tabindex="-1" role="dialog" aria-labelledby="popup_ung_tuyen_successfully_title" aria-hidden="true" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.00056 14.9994L15 1" stroke="#434449" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1.00055 1.00056L15 15" stroke="#434449" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="modal-body text-center">
                        <div class="icon">
                            <svg width="71" height="70" viewBox="0 0 71 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="0.5" width="70" height="70" rx="35" fill="#DAA622" />
                                <path d="M37.549 46.1597H25.2115C21.854 46.1597 19.1253 43.4284 19.1253 40.0722V28.6097C19.1253 25.2534 21.8553 22.5222 25.2115 22.5222H44.4615C47.8253 22.5222 50.5615 25.2534 50.5615 28.6097V33.1472C50.5615 33.7684 51.0653 34.2722 51.6865 34.2722C52.3078 34.2722 52.8115 33.7684 52.8115 33.1472V28.6097C52.8115 24.0122 49.0653 20.2734 44.4603 20.2734H25.2115C20.614 20.2734 16.874 24.0134 16.874 28.6097V40.0722C16.874 44.6697 20.614 48.4097 25.2115 48.4097H37.549C38.1703 48.4097 38.674 47.9059 38.674 47.2847C38.674 46.6634 38.1703 46.1597 37.549 46.1597Z" fill="white" />
                                <path d="M45.8449 27.9041L35.5311 32.0229C35.0874 32.2016 34.5936 32.2016 34.1499 32.0229L23.8374 27.9041C23.2624 27.6754 22.6061 27.9541 22.3749 28.5316C22.1436 29.1091 22.4249 29.7629 23.0024 29.9941L33.3149 34.1129C33.8074 34.3091 34.3249 34.4079 34.8411 34.4079C35.3574 34.4079 35.8749 34.3091 36.3674 34.1129L46.6811 29.9941C47.2574 29.7629 47.5399 29.1091 47.3086 28.5316C47.0774 27.9541 46.4199 27.6766 45.8449 27.9041Z" fill="white" />
                                <path d="M46.8719 35.2188C42.8732 35.2188 39.6182 38.4725 39.6182 42.4713C39.6182 46.47 42.8732 49.7238 46.8719 49.7238C50.8707 49.7238 54.1257 46.47 54.1257 42.4713C54.1257 38.4725 50.8707 35.2188 46.8719 35.2188ZM46.8719 47.4738C44.1132 47.4738 41.8694 45.23 41.8694 42.4713C41.8694 39.7125 44.1132 37.4687 46.8719 37.4687C49.6307 37.4687 51.8744 39.7125 51.8744 42.4713C51.8744 45.23 49.6307 47.4738 46.8719 47.4738Z" fill="white" />
                                <path d="M48.2489 40.5536L46.1439 42.2486L45.6714 41.6473C45.2877 41.1573 44.5814 41.0723 44.0914 41.4561C43.6027 41.8398 43.5177 42.5461 43.9014 43.0348L45.0764 44.5336C45.2614 44.7698 45.5339 44.9236 45.8327 44.9573C45.8752 44.9623 45.9177 44.9648 45.9614 44.9648C46.2164 44.9648 46.4652 44.8786 46.6664 44.7161L49.6589 42.3061C50.1427 41.9161 50.2189 41.2086 49.8302 40.7236C49.4427 40.2423 48.7339 40.1623 48.2489 40.5536Z" fill="white" />
                            </svg>
                        </div>
                        <h6><?php _e('Hồ sơ của bạn đã được gửi đi thành công!') ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    get_footer();
    ?>