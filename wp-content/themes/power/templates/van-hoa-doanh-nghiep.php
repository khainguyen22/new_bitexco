<?php

/**
Template Name: Tin tức thủy điện - Văn hóa doanh nghiệp
 **/
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";
$banner = get_field('banner_news', 'option');
$other_info = get_field('other_info_news', 'option');
$main_navigation = $banner['main_navigation'];
$other_navigation = $banner['other_navigation'];
$the_slug = "van-hoa-doanh-nghiep";
$args = array(
    'post_type'   => 'post',
    'paged' => 1,
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $the_slug
        ]
    ]
);
$post_of_outstanding = array(
    'post_type'   => 'post',
    'posts_per_page' => 1,
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $the_slug
        ]
    ],
    'meta_query' => array(
        array(
            'key' => 'outstanding',
            'value' => '1',
            'compare' => 'LIKE'
        ),
    ),
);
$post_of_outstanding_null = array(
    'post_type'   => 'post',
    'posts_per_page' => 1,
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $the_slug
        ]
    ],
);
$post_of_news = array(
    'post_type'   => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $the_slug
        ]
    ]
);
$filter = array(
    'post_type'    => 'post',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'slug',
            'terms' => $the_slug
        ]
    ],
);

$filter = new WP_Query($filter);
$the_query_post_outstanding = new WP_Query($post_of_outstanding);
$the_query_post_outstanding_null = new WP_Query($post_of_outstanding_null);
$the_query_post_news = new WP_Query($post_of_news);
$the_query_post = new WP_Query($args);
get_header();
?>
<input type="hidden" name="the_slug" class="the_slug" value="<?php echo $the_slug;  ?>">
<div class="tin-tuc-thuy-dien tin-tuc">
    <?php if ($banner) : ?>
        <section class="banner list" style='background-image:url("<?php echo $banner['background']; ?>")'>
            <div class="container">
                <div class="content">
                    <?php if ($banner['title']) : ?><h3><?php echo paint_if_exist($banner['title']) ?></h3> <?php endif; ?>
                    <?php if ($banner['description']) : ?> <p><?php echo paint_if_exist($banner['description']); ?></p> <?php endif; ?>
                </div>
                <?php if ($main_navigation) : ?>
                    <div class="navigation">
                        <ul>
                            <?php foreach ($main_navigation as $key => $value) : ?>
                                <li class="<?php echo ($key == 0) ? 'active' : '' ?>"> <a href="<?php echo $value['link']; ?>"><?php echo paint_if_exist($value['label']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($filter || $the_query_post_outstanding || $the_query_post_news || $the_query_post) : ?>
        <div class="content-container">
            <div class="container">
                <div class="news-post">
                    <div class="row">
                        <div class="col-12 col-lg-6 tin-noi-bat animate_underline  ">
                            <h6>Tin nổi bật</h6>
                            <?php if ($the_query_post_outstanding->have_posts()) : ?>
                                <?php while ($the_query_post_outstanding->have_posts()) : $the_query_post_outstanding->the_post();
                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                                    <a href="<?php echo get_the_permalink() ?>">
                                        <div class="image">
                                            <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>" class="img-banner">
                                        </div>
                                    </a>
                                    <div class="content">
                                        <span class="tag tag-name"><span class="text"><?php echo get_the_tag_list('', ', ') ?></span> </span>
                                        <h5> <a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h5>
                                        <p class="size-text-16"><?php echo get_the_excerpt() ?></p>
                                        <span class="tag tag-calender">
                                            <span class="text size-text-14"><?php echo get_the_date() ?></span>
                                        </span>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <?php while ($the_query_post_outstanding_null->have_posts()) : $the_query_post_outstanding_null->the_post();
                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                                    <a href="<?php echo get_the_permalink() ?>">
                                        <div class="image">
                                            <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>" class="img-banner">
                                        </div>
                                    </a>
                                    <div class="content">
                                        <span class="tag tag-name"><span class="text"><?php echo get_the_tag_list('', ', ') ?></span> </span>
                                        <h5> <a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h5>
                                        <p class="size-text-16"><?php echo get_the_excerpt() ?></p>
                                        <span class="tag tag-calender">
                                            <span class="text size-text-14"><?php echo get_the_date() ?></span>
                                        </span>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-12 col-lg-6 tin-moi-nhat-wrap">
                            <h6 class="title">Tin mới nhất</h6>
                            <div class="row tin-moi-nhat">
                                <?php if ($the_query_post_news->have_posts()) : ?>
                                    <?php while ($the_query_post_news->have_posts()) : $the_query_post_news->the_post();
                                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                                        <div class="col-12 d-flex tin-moi-nhat-item ">
                                            <div class="image">
                                                <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>" class="img-banner">
                                            </div>
                                            <div class="content">
                                                <span class="tag tag-calender">
                                                    <span class="text  size-text-14"><?php echo get_the_date() ?></span>
                                                </span>
                                                <h6><a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h6>
                                                <span class="tag tag-name"><span class="text"><?php echo get_the_tag_list('', ', ') ?></span>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($other_navigation) : ?>
                    <div class="navigation">
                        <ul class="d-flex">
                            <?php foreach ($other_navigation as $key => $value) : ?>
                                <li class="<?php echo $actual_link == $value['link'] ? 'active' : '' ?>"> <a href="<?php echo $value['link']; ?>"><?php echo paint_if_exist($value['label']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($the_query_post->have_posts()) : ?>
        <section class="lists-post">
            <div class="container">
                <div class="row fillter">
                    <div class="form-filter ">
                        <div class="form d-flex justify-content-between">
                            <div class="form-filter-search d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <circle cx="11" cy="11" r="8" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle>
                                    <path d="M16.5 16.958L21.5 21.958" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <input type="text" class="search" placeholder="Tìm kiếm">
                            </div>
                            <?php if ($filter->have_posts()) : ?>
                                <div class="form-filter-company filter-item form-filter-field">
                                    <?php $tax_post_company_news = get_taxonomy('post_company_news')->label;
                                    $terms = get_terms(array(
                                        'taxonomy' => 'post_company_news',
                                        'hide_empty' => false,
                                    ));
                                    ?>
                                    <?php if (isset($tax_post_company_news)) : ?>
                                        <span class="item-default"><?php echo paint_if_exist($tax_post_company_news) ?></span>
                                    <?php endif ?>
                                    <ul>
                                        <?php if (isset($tax_post_company_news)) : ?>
                                            <li class="item active default first"><?php echo paint_if_exist($tax_post_company_news) ?></li>
                                        <?php endif ?>
                                        <?php foreach ($terms as $key => $value) : ?>
                                            <li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <?php if ($filter->have_posts()) : ?>
                                <div class="form-filter-type filter-item">
                                    <?php $tax_post_type_news = get_taxonomy('post_type_news')->label;
                                    $terms = get_terms(array(
                                        'taxonomy' => 'post_type_news',
                                        'hide_empty' => false,
                                    ));
                                    ?>
                                    <?php if (isset($tax_post_type_news)) : ?>
                                        <span class="item-default"><?php echo paint_if_exist($tax_post_type_news) ?></span>
                                    <?php endif ?>
                                    <ul>
                                        <?php if (isset($tax_post_type_news)) : ?>
                                            <li class="item active default first"><?php echo paint_if_exist($tax_post_type_news) ?></li>
                                        <?php endif ?>
                                        <?php foreach ($terms as $key => $value) : ?>
                                            <li class="item" data-value="<?php echo $value->slug ?>"><?php echo paint_if_exist($value->name) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <div class="form-filter-date d-flex">
                                <input placeholder="Thời gian" name="date" class="textbox-n" type="text" onclick="(this.type='date')" id="date">
                                <svg width="20" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 6C1 4.34315 2.34315 3 4 3H16C17.6569 3 19 4.34315 19 6V18C19 19.6569 17.6569 21 16 21H4C2.34315 21 1 19.6569 1 18V6Z" stroke="#2B3F6C" stroke-width="1.5" />
                                    <path d="M1 8H19" stroke="#2B3F6C" stroke-width="1.5" stroke-linejoin="round" />
                                    <path d="M14.5 1.5L14.5 4.5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M5.5 1.5L5.5 4.5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.5 12H5.5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.5 12H10.5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M14.5 12H15.5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M4.5 16H5.5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M9.5 16H10.5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M14.5 16H15.5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="button-submit">
                                <button class="btn btn-search btn-submit btn-submit-news">Tìm kiếm</button>
                            </div>
                            <div class="button-reset">
                                <button class="btn btn-reset">Đặt lại</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="list">

                    <?php while ($the_query_post->have_posts()) : $the_query_post->the_post();
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                        <div class="custom-post d-flex ">
                            <a href="<?php echo get_the_permalink() ?>">
                                <div class="image">
                                    <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>">
                                </div>
                            </a>
                            <div class="content ">
                                <?php if (get_the_tag_list()) : ?><span class="tag tag-name"><span class="text"><?php echo get_the_tag_list('', ', ') ?></span> </span><?php endif; ?>
                                <h6> <a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h6>
                                <?php if (get_the_excerpt()) : ?><p class="size-text-16"><?php echo get_the_excerpt() ?></p><?php endif; ?>
                                <?php if (get_the_date()) : ?> <span class="tag tag-calender">
                                        <span class="text size-text-14"><?php echo get_the_date() ?></span>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata() ?>
                </div>
                <div class="custom-pagination">
                    <nav aria-label="Page navigation example m-auto" class="pagination justify-content-center ">
                        <?php
                        global $wp_query;
                        $custom_query = '';
                        if ($custom_query) $main_query = $custom_query;
                        else $main_query = $wp_query;
                        $paged = ($paged) ? $paged : get_query_var('paged');
                        $big = 999999999;
                        $total = isset($main_query->max_num_pages) ? $main_query->max_num_pages : '';
                        if ($total > 1) echo '<ul class="pagination">';
                        echo paginate_links(array(
                            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                            'show_all'     => false,
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
            </div>
        </section>
    <?php endif; ?>
    <?php if ($other_info) : ?>
        <section class="other-information">
            <div class="other-container">
                <div class="other-content hover-zoom">

                    <?php foreach ($other_info as $value) : ?>
                        <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo paint_if_exist($value['text']); ?></span> </a>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
<?php
get_footer();
?>