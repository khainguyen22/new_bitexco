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
                                    <span class="text size-text-16 mx-1"> Từ <?php echo get_field('date'); ?></span>
                                    <span class="text size-text-16 mx-1"> Đến <?php echo get_field('date_end'); ?></span>
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
            </div>
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-9 ">
                            <div class="wrap_content">
                                <?php if (get_field('general_information')) : ?>
                                    <div class="general_information" id="general_information">
                                        <?php if (get_field('general_information')['title']) : ?>
                                            <h5 class="title"><?php _e(get_field('general_information')['title']) ?></h5>
                                        <?php endif; ?>
                                        <?php if (get_field('general_information')['description']) : ?>
                                            <div class="description">
                                                <?php _e(get_field('general_information')['description']) ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="driver"></div>
                                <?php endif; ?>
                                <?php if (get_field('content')) : ?>
                                    <div class="content" id="content">
                                        <?php if (get_field('content')['title']) : ?>
                                            <h5 class="title"><?php _e(get_field('content')['title']) ?></h5>
                                        <?php endif; ?>
                                        <table class="table">
                                            <tbody class="table-body">
                                                <?php if (get_field('content')['info']) :
                                                    foreach (get_field('content')['info'] as $value) : ?>
                                                        <tr>
                                                            <td><?php _e($value['date_start']) ?> - <?php _e($value['date_end']) ?></td>
                                                            <td><?php _e($value['title']) ?></td>
                                                        </tr>
                                                <?php endforeach;
                                                endif; ?>
                                        </table>
                                    </div>
                                    <div class="driver"></div>
                                <?php endif; ?>
                                <?php if (get_field('speakers')) : ?>
                                    <div class="speakers" id="speakers">
                                        <?php if (get_field('speakers')['title']) : ?>
                                            <h5 class="title"><?php _e(get_field('speakers')['title']) ?></h5>
                                        <?php endif; ?>
                                        <div class="wrap-person">
                                            <?php if (get_field('speakers')['person']) :
                                                foreach (get_field('speakers')['person'] as $value) : ?>
                                                    <div class="person d-flex">
                                                        <div class="image">
                                                            <img src="<?php echo $value['image'] ?>" alt=" <?php _e($value['name']) ?>">
                                                        </div>

                                                        <div class="info">
                                                            <p class="position"> <?php _e($value['position']) ?></p>
                                                            <p class="company"> <?php _e($value['company']) ?></p>
                                                            <p class="name"> <?php _e($value['name']) ?></p>
                                                        </div>
                                                    </div>
                                            <?php endforeach;
                                            endif; ?>
                                        </div>
                                    </div>
                                    <div class="driver"></div>
                                <?php endif; ?>
                                <?php if (get_field('document')) : ?>
                                    <div class="document" id="document">

                                        <?php if (get_field('document')['item']) :
                                            foreach (get_field('document')['item'] as $value) : ?>
                                                <div class="item">

                                                </div>
                                        <?php endforeach;
                                        endif; ?>

                                        <div class="attach">
                                            <?php if (get_field('document')['title']) : ?>
                                                <h5 class="title"><?php _e(get_field('document')['title']) ?></h5>
                                            <?php endif; ?>
                                            <div class="file">
                                                <?php if (get_field('document')['item']) : foreach (get_field('document')['item'] as $value) :  ?>
                                                        <a href="<?php echo $value['file']['url'] ?>" download="<?php echo $value['file']['filename'] ?>" class="file-item d-flex justify-content-between">
                                                            <span class="name d-flex">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                                    <path d="M15.2193 9.91559L9.6214 15.5135C8.15693 16.978 5.78256 16.978 4.3181 15.5135V15.5135C2.85363 14.0491 2.85363 11.6747 4.3181 10.2102L11.0945 3.43378C12.0708 2.45747 13.6538 2.45747 14.6301 3.43378V3.43378C15.6064 4.41009 15.6064 5.99301 14.6301 6.96932L7.76945 13.8299C7.2813 14.3181 6.48984 14.3181 6.00169 13.8299V13.8299C5.51353 13.3418 5.51353 12.5503 6.00169 12.0622L11.6838 6.38006" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                                <span><?php echo $value['file']['filename'] ?></span>
                                                            </span>
                                                            <span class="download d-flex">
                                                                <span><?php _('Tải xuống'); ?></span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path d="M16.293 15.707L13.0001 18.9999C12.6095 19.3905 11.9764 19.3905 11.5859 18.9999L8.29297 15.707M12.293 18.707L12.293 4.70703" stroke="#DAA622" stroke-width="2" stroke-linecap="round" />
                                                                </svg>
                                                            </span>
                                                        </a>
                                                <?php endforeach;
                                                endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="driver"></div>
                                <?php endif; ?>

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
                                    <?php if (get_field("general_information")) : ?> <li class="active"><a href="#general_information">Thông tin tổng quan</a></li> <?php endif; ?>
                                    <?php if (get_field("content")) : ?> <li><a href="#content">Nội dung chương trình</a> </li> <?php endif; ?>
                                    <?php if (get_field("speakers")) : ?> <li><a href="#speakers">Diễn giả</a></li> <?php endif; ?>
                                    <?php if (get_field("document")) : ?> <li><a href="#document">Tài liệu đính kèm (2)</a></li> <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php if (get_field('contact')) : ?>
                        <div class="driver"></div>
                        <div class="contact">
                            <div>
                                <?php if (get_field('contact')['title']) : ?>
                                    <h5 class="title"><?php _e(get_field('contact')['title']) ?></h5>
                                <?php endif; ?>
                                <?php if (get_field('contact')['description']) : ?>
                                    <?php _e(get_field('contact')['description']) ?>
                                <?php endif; ?>
                            </div>
                            <div class="info">
                                <a href="http://" class="btn btn-contact">Liên hệ</a>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <div class="related_events">
                    <?php
                    $post_type = 'events';
                    $args = array(
                        'post_type'    => $post_type,
                    );
                    $the_query_post = new WP_Query($args);
                    if ($the_query_post->have_posts()) : ?>
                        <?php while ($the_query_post->have_posts()) : $the_query_post->the_post();
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                            <div class="content-item">
                                <div class="image">
                                    <a href="<?php the_permalink() ?>">
                                        <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>">
                                    </a>
                                </div>
                                <div class="content-text">
                                    <h6><?php echo the_title() ?></h6>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>