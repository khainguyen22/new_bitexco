<?php
get_header(); ?>

<!-- Blog & Sidebar Section -->

<div class="custom-single-page  details_event">
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post();
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
            <div class="breadcrumbs">
                <div class="container">
                    <?php
                    if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<div id="breadcrumbs-content" class="breadcrumbs-content">', '</div>');
                    }
                    ?>
                </div>
            </div>

            <div class="banner" style='background-image:url("<?php echo $featured_img_url; ?>")'>
                <div class="wrap_banner">
                    <div class="container">
                        <div class="content">
                            <h3><?php the_title(); ?></h3>
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
                                    <span class="text size-text-16"> Đến <?php echo get_field('date_end'); ?></span>
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
                                        <span class="text size-text-16"> <?php echo get_field('location'); ?></span>
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
            </div>
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-9 ">
                            <div class="wrap_content">
                                <div class="head">

                                </div>
                                <div class="content">

                                </div>
                                <div class="history">
                                    <a href="">
                                        <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.33336 1.33594L1.31487 4.35442C0.956891 4.7124 0.956892 5.2928 1.31487 5.65079L4.33336 8.66927M1.58336 5.00261L14.4167 5.00261" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                        Quay lại sự kiện
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 ">
                            <div class="wrap_scrollspy">
                                <?php if (get_field('amount') > 0 || get_field('date')) : ?>
                                    <a href="" class="btn btn_success">Đăng ký ngay</a>
                                <?php else : ?>
                                    <span class="btn btn_feild ">Đăng ký ngay</span>
                                <?php endif; ?>
                                <ul class="scrollspy">
                                    <?php if (get_field("")) : ?> <li class="active"><a href="#">Thông tin tổng quan</a></li> <?php endif; ?>
                                    <?php if (get_field("")) : ?> <li><a href="#">Nội dung chương trình</a> </li> <?php endif; ?>
                                    <?php if (get_field("")) : ?> <li><a href="#">Diễn giả</a></li> <?php endif; ?>
                                    <?php if (get_field("")) : ?> <li><a href="#">Tài liệu đính kèm (2)</a></li> <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>