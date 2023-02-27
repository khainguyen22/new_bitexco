<?php

/**
Template Name: Sự kiện     
 **/
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";
$events = get_field('events', 'option');
$banner = $events['banner'];
$navigation = $banner['navigation'];
$other_info = $events['other_info'];
$args = array(
    'post_type'   => 'events',
    'post_status' => 'publish',
    'paged' => 1,
);
$post_of_outstanding = array(
    'post_type'   => 'events',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'meta_query' => array(
        array(
            'key' => 'outstanding',
            'value' => '1',
            'compare' => 'LIKE'
        ),

    ),
);
$args_filter = array(
    'post_type'   => 'events',
    'post_status' => 'publish',
    'posts_per_page' =>  -1,
);
$filter = new WP_Query($args_filter);
$the_query_post_outstanding = new WP_Query($post_of_outstanding);
$query = new WP_Query($args);
get_header();
?>
<div class="su-kien">
    <section class="banner list" style='background-image:url("<?php echo $banner['background']; ?>")'>
        <div class="container">
            <div class="content">
                <?php if ($banner['title']) : ?> <h3><?php echo $banner['title'] ?></h3> <?php endif; ?>
                <?php if ($banner['description']) : ?> <p><?php echo $banner['description']; ?></p> <?php endif; ?>
            </div>
            <?php if ($navigation) : ?>
                <div class="navigation">
                    <ul>
                        <?php foreach ($navigation as $key => $value) : ?>
                            <li class="<?php echo $actual_link == $value['link'] ? 'active' : '' ?>"> <a href="<?php echo $value['link']; ?>"><?php echo paint_if_exist($value['label']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <div class="tin-noi-bat-section">
        <div class="content-container" style='background-image:url("<?php echo get_stylesheet_directory_uri(); ?>/access/images/Frame.png")'>
            <div class="container">
                <div class="head">
                    <span class="line-headding"></span>
                    <h5>Sự kiện nổi bật</h5>
                </div>
                <div class="news-post">
                    <div class="tin-noi-bat">
                        <?php if ($the_query_post_outstanding->have_posts()) : ?>
                            <?php while ($the_query_post_outstanding->have_posts()) : $the_query_post_outstanding->the_post();
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                                <div class="item">
                                    <div class="image">
                                        <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>" class="img-banner">
                                    </div>
                                    <div class="content">
                                        <div class="category">
                                            <?php
                                            $category = get_the_terms(get_the_ID(), 'type_events');
                                            if ($category) : ?>
                                                <div class="d-flex category-tag">
                                                    <?php foreach ($category as $cat) : ?>
                                                        <span class="text"><?php echo $cat->name; ?></span>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php else : ?>
                                                <div class="d-flex category-tag">
                                                    <span class="text">Sự kiện</span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="info">
                                            <h5> <a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h5>
                                            <p class="size-text-16"><?php echo get_the_excerpt() ?></p>
                                            <?php if (get_field('date')) : ?>
                                                <div class="date d-flex">
                                                    <div class="icon">
                                                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1.5 5C1.5 3.61929 2.61929 2.5 4 2.5H14C15.3807 2.5 16.5 3.61929 16.5 5V15C16.5 16.3807 15.3807 17.5 14 17.5H4C2.61929 17.5 1.5 16.3807 1.5 15V5Z" stroke="white" stroke-width="1.5" />
                                                            <path d="M1.5 6.66667H16.5" stroke="white" stroke-width="1.5" stroke-linejoin="round" />
                                                            <path d="M12.75 1.25L12.75 3.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M5.25 1.25L5.25 3.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M4.41667 10.0052H5.25001" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M8.58334 10.0052H9.41668" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M12.75 10.0052H13.5833" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M4.41667 13.3411H5.25001" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M8.58334 13.3411H9.41668" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            <path d="M12.75 13.3411H13.5833" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </div>
                                                    <span class="text size-text-16"> Từ <?php echo get_field('date'); ?></span>
                                                </div>
                                            <?php endif; ?>

                                            <?php if (get_field('type') == 1) : ?>
                                                <?php if (get_field('location')) : ?>
                                                    <div class="type d-flex">
                                                        <div class="icon">
                                                            <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M14.8125 8.08333C14.8125 12.9398 9.2875 18 7.90625 18C6.525 18 1 12.9398 1 8.08333C1 4.17132 4.09203 1 7.90625 1C11.7205 1 14.8125 4.17132 14.8125 8.08333Z" stroke="#ffffff" stroke-width="1.5" />
                                                                <circle r="2.65625" transform="matrix(-1 0 0 1 7.90625 7.90625)" stroke="#ffffff" stroke-width="1.5" />
                                                            </svg>
                                                        </div>
                                                        <?php foreach (get_the_terms(get_the_ID(), 'type_events_location') as $key => $value) : ?>
                                                            <span class="text size-text-16"> <?php echo paint_if_exist($value->name) ?></span>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <?php if (get_field('online')) : ?>
                                                    <div class="type d-flex">
                                                        <div class="icon">
                                                            <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M1 13.6H19M2.8 2.8C2.8 2.32261 2.98964 1.86477 3.32721 1.52721C3.66477 1.18964 4.12261 1 4.6 1H15.4C15.8774 1 16.3352 1.18964 16.6728 1.52721C17.0104 1.86477 17.2 2.32261 17.2 2.8V10.9H2.8V2.8Z" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                            </svg>
                                                        </div>
                                                        <a class="text size-text-16" href="<?php echo get_field('online'); ?>" target="_blank">Online</a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($query) : ?>
        <section class="filter-post-section">

            <div data-include="small-filter-post" class="filter-post-container">
                <div class="head">
                    <h5>Tất cả sự kiện</h5>
                </div>
                <div class="small-form-filter">
                    <div class="form">
                        <div class="form-filter-search d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <circle cx="11" cy="11" r="8" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                                <path d="M16.5 16.958L21.5 21.958" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                            <input type="text" placeholder="Tìm kiếm" name="name" class="search">
                        </div>
                        <div class="form-filter-type form-filter-status filter-item">
                            <?php
                            $tax_events_status = get_taxonomy('type_events_status')->label;
                            $terms = get_terms(array(
                                'taxonomy' => 'type_events_status',
                                'hide_empty' => false,
                            ));
                            ?>
                            <?php if (isset($tax_events_status)) : ?>
                                <span class="item-default"><?php echo paint_if_exist($tax_events_status) ?></span>
                            <?php endif ?>
                            <ul>
                                <?php if (isset($tax_events_status)) : ?>
                                    <li class="item active default first"><?php echo paint_if_exist($tax_events_status) ?></li>
                                <?php endif ?>
                                <?php foreach ($terms as $key => $value) : ?>
                                    <li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="form-filter-area form-filter-location filter-item">
                            <?php
                            $tax_events_location = get_taxonomy('type_events_location')->label;
                            $terms = get_terms(array(
                                'taxonomy' => 'type_events_location',
                                'hide_empty' => false,
                            ));
                            ?>
                            <?php if (isset($tax_events_location)) : ?>
                                <span class="item-default"><?php echo paint_if_exist($tax_events_location) ?></span>
                            <?php endif ?>
                            <ul>
                                <?php if (isset($tax_events_location)) : ?>
                                    <li class="item active default first"><?php echo paint_if_exist($tax_events_location) ?></li>
                                <?php endif ?>
                                <?php foreach ($terms as $key => $value) : ?>
                                    <li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="form-filter-company form-filter-formality filter-item">
                            <?php
                            $tax_events_formality = get_taxonomy('type_events_formality')->label;
                            $terms = get_terms(array(
                                'taxonomy' => 'type_events_formality',
                                'hide_empty' => false,
                            ));
                            ?>
                            <?php if (isset($tax_events_formality)) : ?>
                                <span class="item-default"><?php echo paint_if_exist($tax_events_formality) ?></span>
                            <?php endif ?>
                            <ul>
                                <?php if (isset($tax_events_formality)) : ?>
                                    <li class="item active default first"><?php echo paint_if_exist($tax_events_formality) ?></li>
                                <?php endif ?>
                                <?php foreach ($terms as $key => $value) : ?>
                                    <li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="button-submit">
                            <button type="submit" class="btn btn-search btn-submit">Tìm kiếm</button>
                        </div>
                        <div class="button-reset">
                            <button class="btn btn-search btn-reset">Đặt lại</button>
                        </div>
                    </div>
                </div>
                <div class="filter-content">
                    <?php if ($query->have_posts()) : ?>
                        <?php while ($query->have_posts()) : $query->the_post();
                            $category = get_the_terms(get_the_ID(), 'type_events');
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                            <div class="filter-item">
                                <div class="filter-image hover-zoom-img">
                                    <a href="<?php the_permalink() ?>">
                                        <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>">
                                    </a>
                                </div>
                                <div class="item-content">
                                    <?php if ($category) : ?>
                                        <div class="d-flex category-tag">
                                            <?php foreach ($category as $cat) : ?>
                                                <span class="text"><?php echo $cat->name; ?></span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php else : ?>
                                        <div class="d-flex category-tag">
                                            <span class="text">Sự kiện</span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content-title">
                                        <h6> <a href="<?php the_permalink() ?>"><?php echo the_title() ?></a></h6>
                                    </div>
                                    <?php if (get_field('date')) : ?>
                                        <div class="date d-flex">
                                            <div class="icon">
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.5 5C1.5 3.61929 2.61929 2.5 4 2.5H14C15.3807 2.5 16.5 3.61929 16.5 5V15C16.5 16.3807 15.3807 17.5 14 17.5H4C2.61929 17.5 1.5 16.3807 1.5 15V5Z" stroke="#7E8189" stroke-width="1.5" />
                                                    <path d="M1.5 6.66667H16.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round" />
                                                    <path d="M12.7502 1.25L12.7502 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.25016 1.25L5.25016 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M4.4165 9.9974H5.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.58301 9.9974H9.41634" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12.75 9.9974H13.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M4.4165 13.3294H5.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.58301 13.3294H9.41634" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12.75 13.3294H13.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                            <span class="text size-text-16"> <?php echo get_field('date'); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (get_field('type') == 1) : ?>
                                        <?php if (get_field('location')) : ?>
                                            <div class="type d-flex">
                                                <div class="icon">
                                                    <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M14.8125 8.08333C14.8125 12.9398 9.2875 18 7.90625 18C6.525 18 1 12.9398 1 8.08333C1 4.17132 4.09203 1 7.90625 1C11.7205 1 14.8125 4.17132 14.8125 8.08333Z" stroke="#7E8189" stroke-width="1.5" />
                                                        <circle r="2.65625" transform="matrix(-1 0 0 1 7.90625 7.90625)" stroke="#7E8189" stroke-width="1.5" />
                                                    </svg>
                                                </div>
                                                <?php foreach (get_the_terms(get_the_ID(), 'type_events_location') as $key => $value) : ?>
                                                    <span class="text size-text-16"> <?php echo paint_if_exist($value->name) ?></span>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <?php if (get_field('online')) : ?>
                                            <div class="type d-flex">
                                                <div class="icon">
                                                    <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 13.6H19M2.8 2.8C2.8 2.32261 2.98964 1.86477 3.32721 1.52721C3.66477 1.18964 4.12261 1 4.6 1H15.4C15.8774 1 16.3352 1.18964 16.6728 1.52721C17.0104 1.86477 17.2 2.32261 17.2 2.8V10.9H2.8V2.8Z" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                                <a class="text size-text-16" href="<?php echo get_field('online'); ?>" target="_blank">Online</a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="filter-navigation">
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
                            'total' => $query->max_num_pages,
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
    <?php endif; ?>
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
<?php
get_footer();
?>