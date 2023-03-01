<?php
/*
* Template Name: Thông tin báo chí
*/
?>

<?php get_header(); ?>
<div class="shareholders-relations">
    <!-- Banner -->

    <?php
    $banner = get_field('shareholder_relations_banner', 'option');
    $navigation = '';
    if ($banner) {
        $navigation = $banner['navigation'];
    }
    ?>

    <section class="banner" style='background-image:url("<?php echo $banner['background']; ?>")'>
        <div class="container">
            <div class="content">
                <h3><?php _e(isset($banner['title']) ? $banner['title'] : "", POWER); ?></h3>
                <p><?php _e(isset($banner['description']) ? $banner['description'] : "", POWER); ?></p>
            </div>
        </div>
    </section>

    <!-- End Banner -->

    <!-- Shareholders Information -->

    <section class="shareholder-information shareholders-secion active s-0">
        <?php
            $representing_post = get_field('representing_post', 'option');
            // echo "<pre>";
            // print_r($representing_post);
            // die;
        ?>
        <!-- Notification -->
        <section class="notification">
            <div class="container">
                <div class="notification-content">
                    <div class="image">
                        <img src="<?php echo paint_if_exist(get_the_post_thumbnail_url($representing_post->ID)); ?>" alt="" width="499" height="280">
                    </div>
                    <div class="text-content" data-post-id="<?php echo $representing_post->ID;?>">
                        <h5><?php _e(paint_if_exist($representing_post->post_title), POWER) ?></h5>
                        <div class="terms-and-time">
                            <div class="download">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.66797 2.4974C1.66797 2.03716 2.04106 1.66406 2.5013 1.66406H9.16797C9.38898 1.66406 9.60094 1.75186 9.75722 1.90814L18.0906 10.2415C18.416 10.5669 18.416 11.0945 18.0906 11.42L11.4239 18.0867C11.0985 18.4121 10.5708 18.4121 10.2454 18.0867L1.91205 9.75332C1.75577 9.59704 1.66797 9.38508 1.66797 9.16406V2.4974ZM3.33464 3.33073V8.81888L10.8346 16.3189L16.3228 10.8307L8.82279 3.33073H3.33464Z" fill="#7E8189"/>
                                    <path d="M7.5013 6.2474C7.5013 6.93775 6.94166 7.4974 6.2513 7.4974C5.56095 7.4974 5.0013 6.93775 5.0013 6.2474C5.0013 5.55704 5.56095 4.9974 6.2513 4.9974C6.94166 4.9974 7.5013 5.55704 7.5013 6.2474Z" fill="#7E8189"/>
                                </svg>
                                <?php 
                                    foreach (get_the_terms($representing_post->ID, 'type') as $key => $value) { ?>
                                        <span><?php _e($value->name)?></span>
                                    <?php }
                                ?>
                            </div>
                            <div class="calender">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.5 5C2.5 3.61929 3.61929 2.5 5 2.5H15C16.3807 2.5 17.5 3.61929 17.5 5V15C17.5 16.3807 16.3807 17.5 15 17.5H5C3.61929 17.5 2.5 16.3807 2.5 15V5Z" stroke="#7E8189" stroke-width="1.5"></path>
                                    <path d="M2.5 6.66667H17.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round"></path>
                                    <path d="M13.75 1.25L13.75 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M6.24998 1.25L6.24998 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M5.41669 10.0052H6.25002" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.58337 10.0052H10.4167" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13.75 10.0052H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M5.41669 13.3411H6.25002" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.58337 13.3411H10.4167" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13.75 13.3411H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <span class="text"><a href="#"><?php _e(paint_if_exist(date("d/m/Y", strtotime(get_field('release_time', $representing_post->ID)))), POWER) ?></a></span>
                            </div>
                        </div>
                        <div class="content represent-post-content">
                            <p><?php echo get_the_excerpt($representing_post->ID)?></p>
                        </div>
                        <div class="download">
                            <a href="<?php _e(get_field('press_information_file', $representing_post->ID), POWER) ?>" download><span><?php _e('Tải xuống', POWER) ?></span></a>
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.06476 14.4005L10.0832 17.419C10.4412 17.777 11.0216 17.777 11.3796 17.419L14.3981 14.4005M10.7314 17.1505L10.7314 4.31719" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Notification -->

        <!-- Shareholder Information -->

        <?php
        $paged = 2;
        $args = [
            'post_type' => 'press_information',
            'posts_per_page' => 8,
            'paged' =>  $paged
        ];

        $query = new WP_Query($args);

        // Pagination
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
                        <span data-paged=' . $paged . '>Trước</span>
                ', POWER)),
            'next_text'    => sprintf('%1$s <i></i>', __('<span data-paged=' . $paged . '>Sau</span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 19L14.3306 12.7809C14.7158 12.3316 14.7158 11.6684 14.3306 11.2191L9 5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>
                    </svg>
                ', POWER)),
            'add_args'     => false,
            'add_fragment' => '',
            // 'show_all' => true
            
        ));
        ?>

        <section class="shareholder-info">
            <div class="container">
                <div class="shareholder-content">
                    <div class="title">
                        <h3><?php _e('Thông tin cổ đông', POWER) ?></h3>
                    </div>
                    <div class="search-bar">
                        <input class="form-control my-3" type="text" placeholder="Tìm kiếm">
                        <button type="submit" class="btn btn-search"><?php _e('Tìm kiếm', POWER) ?></button>
                        <button type="text" class="btn btn-custom-1 btn-custom-1-l reset"><?php _e("Đặt lại", POWER) ?></button>
                    </div>
                    <div class="shareholder-items">
                        <?php if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="shareholder-item" data-postID="<?php echo get_the_ID() ?>">
                                    <div class="shareholder-title">
                                        <div class="name-and-time">
                                            <h6><?php _e(get_the_title(get_the_ID()), POWER) ?></h6>
                                            
                                        </div>
                                       <div class="name-and-time">
                                           
                                            <div class="download">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.66797 2.4974C1.66797 2.03716 2.04106 1.66406 2.5013 1.66406H9.16797C9.38898 1.66406 9.60094 1.75186 9.75722 1.90814L18.0906 10.2415C18.416 10.5669 18.416 11.0945 18.0906 11.42L11.4239 18.0867C11.0985 18.4121 10.5708 18.4121 10.2454 18.0867L1.91205 9.75332C1.75577 9.59704 1.66797 9.38508 1.66797 9.16406V2.4974ZM3.33464 3.33073V8.81888L10.8346 16.3189L16.3228 10.8307L8.82279 3.33073H3.33464Z" fill="#7E8189"/>
                                                    <path d="M7.5013 6.2474C7.5013 6.93775 6.94166 7.4974 6.2513 7.4974C5.56095 7.4974 5.0013 6.93775 5.0013 6.2474C5.0013 5.55704 5.56095 4.9974 6.2513 4.9974C6.94166 4.9974 7.5013 5.55704 7.5013 6.2474Z" fill="#7E8189"/>
                                                </svg>
                                                <?php 
                                                    foreach (get_the_terms(get_the_ID( ), 'type') as $key => $value) { ?>
                                                        <span><?php _e($value->name)?></span>
                                                    <?php }
                                                ?>
                                            </div>
                                            <div class="calender">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M2.5 5C2.5 3.61929 3.61929 2.5 5 2.5H15C16.3807 2.5 17.5 3.61929 17.5 5V15C17.5 16.3807 16.3807 17.5 15 17.5H5C3.61929 17.5 2.5 16.3807 2.5 15V5Z" stroke="#7E8189" stroke-width="1.5"></path>
                                                    <path d="M2.5 6.66667H17.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round"></path>
                                                    <path d="M13.75 1.25L13.75 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M6.24998 1.25L6.24998 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M5.41669 10.0052H6.25002" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.58337 10.0052H10.4167" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.75 10.0052H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M5.41669 13.3411H6.25002" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M9.58337 13.3411H10.4167" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13.75 13.3411H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                <span class="text"><a href="#"><?php _e(paint_if_exist(date("d/m/Y", strtotime(get_field('release_time', get_the_ID())))), POWER) ?></a></span>
                                                </div>
                                       </div>
                                               
                                            
                                        <div class="download">
                                            <a href="<?php echo paint_if_exist(get_field('press_information_file', get_the_ID())) ?>" download> <span><?php _e('Tải xuống', POWER) ?></span></a>
                                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.06476 14.4005L10.0832 17.419C10.4412 17.777 11.0216 17.777 11.3796 17.419L14.3981 14.4005M10.7314 17.1505L10.7314 4.31719" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata(); ?>

                    </div>
                    <div class="pagination">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Shareholder Information -->

    </section>

    <!-- Shareholders Information -->
 
    <!-- Other Information -->
    <?php
    $other_info = get_field('shareholders_other_info', 'option');
    ?>
    <section class="other-information">
        <div class="other-container ">
            <div class="other-content hover-zoom">
                <?php if ($other_info) : ?>
                    <?php foreach ($other_info as $value) : ?>
                        <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- End other information -->
</div>

<?php get_footer(); ?>