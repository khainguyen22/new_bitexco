<?php
get_header();
// get_template_part('sections/specia', 'breadcrumb'); 
?>

<!-- Blog & Sidebar Section -->
<script>

</script>
<style>

</style>

<div class="details_news_page">
    <section class="article article-breadcrumbs">
        <div class="breadcrumbs">
            <div class="container news-detail-container">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<div id="breadcrumbs-content" class="breadcrumbs-content">', '</div>');
                }
                ?>
            </div>
        </div>
    </section>

    <?php if (have_posts()) : ?>
        <div class="main container">
            <div class="social-medias">
                <div class="medias">
                    <div class="share">
                        <span>Chia sẻ</span>
                    </div>
                    <div class="item my-3" id="shareOnFacebook" title="Share On Facebook">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="44" height="44" rx="22" fill="#EAEDF3" />
                            <path d="M10 22C10 15.3726 15.3726 10 22 10C28.6274 10 34 15.3726 34 22C34 28.6274 28.6274 34 22 34C15.3726 34 10 28.6274 10 22Z" stroke="#141518" stroke-width="1.5" />
                            <path d="M23.3639 29.6977V22.5756H25.3299L25.5904 20.1212H23.3639L23.3672 18.8928C23.3672 18.2527 23.428 17.9097 24.3474 17.9097H25.5765V15.4551H23.6102C21.2484 15.4551 20.417 16.6457 20.417 18.6479V20.1215H18.9448V22.5758H20.417V29.6977H23.3639Z" fill="#141518" />
                        </svg>
                    </div>
                    <div class="item my-3" id="shareOnZalo" title="Share On Zalo">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <rect width="44" height="44" rx="22" fill="#EAEDF3" />
                            <rect x="10" y="10" width="24" height="24" fill="url(#pattern0)" />
                            <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                                    <use xlink:href="#image0_6963_132140" transform="matrix(0.04 0 0 0.04 0 0.32)" />
                                </pattern>
                                <image id="image0_6963_132140" width="25" height="9" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAJCAYAAADHP4f4AAAAAXNSR0IArs4c6QAAATBJREFUOE+Vkn1Rw1AQxDcKWBRQCUUBRUFBAa0CkFAJoKCggDgAFICEOmBRAPPLvJd5ZFJmyD/JXPZuP+4626+SLjTzJOnm6rVWepVk9Reus72RtGhAS0lrSQ9J7v5LYtv0JEnt/aW0AF4kfVV1tlG5b4TgfIXL1olthIKrrsBtkxymJL0knCxRUhrfJb1Jui8DcHcyQ/JRlO+a93eS85HENkOIDpVDg20aNknGOAvutiWRBI4ELpPggF4cDbWBpOwFq9h7bBZL8xo1TQ0h+yMkp3UXJfrPgcQ28cD4NF207StJz5Kuk/TNzohz3IkkcAewSbZFOGKpLwDy8+zYCdsGfFOGjLHN7GRwyGGVWVzZkAwkdVFTHpyzJ+LELaoYwHGwp11x6hpxORRwPD2XxccPWUujKsWByPgAAAAASUVORK5CYII=" />
                            </defs>
                        </svg>
                    </div>
                    <div class="item my-3" id="shareViaEmail" title="Share Via Email">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="44" height="44" rx="22" fill="#EAEDF3" />
                            <rect x="12" y="14" width="20" height="16" rx="5" stroke="#141518" stroke-width="1.5" />
                            <path d="M16 19L20.8 22.6C21.5111 23.1333 22.4889 23.1333 23.2 22.6L28 19" stroke="#141518" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="item my-3" id="copyUrl" title="Copy Url">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="44" height="44" rx="22" fill="#EAEDF3" />
                            <path d="M20.0399 22.9602C21.4067 24.327 23.6228 24.327 24.9896 22.9602L28.5252 19.4246C29.892 18.0578 29.892 15.8417 28.5252 14.4749C27.1583 13.108 24.9423 13.108 23.5754 14.4749L21.8077 16.2426" stroke="#141518" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M22.8683 20.1316C21.5015 18.7648 19.2854 18.7648 17.9186 20.1316L14.383 23.6672C13.0162 25.034 13.0162 27.2501 14.383 28.6169C15.7499 29.9838 17.9659 29.9838 19.3328 28.6169L21.1006 26.8492" stroke="#141518" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="item my-3" id="printPage" title="Print Page">
                        <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="44" height="44" rx="22" fill="#EAEDF3" />
                            <path d="M31.4286 15.1429H28.8571V12.5714C28.8571 11.8894 28.5862 11.2354 28.104 10.7532C27.6218 10.2709 26.9677 10 26.2857 10H17.7143C17.0323 10 16.3782 10.2709 15.896 10.7532C15.4138 11.2354 15.1429 11.8894 15.1429 12.5714V15.1429H12.5714C11.8894 15.1429 11.2354 15.4138 10.7532 15.896C10.2709 16.3782 10 17.0323 10 17.7143V26.2857C10 26.9677 10.2709 27.6218 10.7532 28.104C11.2354 28.5862 11.8894 28.8571 12.5714 28.8571H15.1429V31.4286C15.1429 32.1106 15.4138 32.7646 15.896 33.2468C16.3782 33.7291 17.0323 34 17.7143 34H26.2857C26.9677 34 27.6218 33.7291 28.104 33.2468C28.5862 32.7646 28.8571 32.1106 28.8571 31.4286V28.8571H31.4286C32.1106 28.8571 32.7646 28.5862 33.2468 28.104C33.7291 27.6218 34 26.9677 34 26.2857V17.7143C34 17.0323 33.7291 16.3782 33.2468 15.896C32.7646 15.4138 32.1106 15.1429 31.4286 15.1429ZM16.8571 12.5714C16.8571 12.3441 16.9474 12.1261 17.1082 11.9653C17.2689 11.8046 17.487 11.7143 17.7143 11.7143H26.2857C26.513 11.7143 26.7311 11.8046 26.8918 11.9653C27.0526 12.1261 27.1429 12.3441 27.1429 12.5714V15.1429H16.8571V12.5714ZM27.1429 31.4286C27.1429 31.6559 27.0526 31.8739 26.8918 32.0347C26.7311 32.1954 26.513 32.2857 26.2857 32.2857H17.7143C17.487 32.2857 17.2689 32.1954 17.1082 32.0347C16.9474 31.8739 16.8571 31.6559 16.8571 31.4286V23.7143H27.1429V31.4286ZM32.2857 26.2857C32.2857 26.513 32.1954 26.7311 32.0347 26.8918C31.8739 27.0526 31.6559 27.1429 31.4286 27.1429H28.8571V22.8571C28.8571 22.6298 28.7668 22.4118 28.6061 22.2511C28.4453 22.0903 28.2273 22 28 22H16C15.7727 22 15.5547 22.0903 15.3939 22.2511C15.2332 22.4118 15.1429 22.6298 15.1429 22.8571V27.1429H12.5714C12.3441 27.1429 12.1261 27.0526 11.9653 26.8918C11.8046 26.7311 11.7143 26.513 11.7143 26.2857V17.7143C11.7143 17.487 11.8046 17.2689 11.9653 17.1082C12.1261 16.9474 12.3441 16.8571 12.5714 16.8571H31.4286C31.6559 16.8571 31.8739 16.9474 32.0347 17.1082C32.1954 17.2689 32.2857 17.487 32.2857 17.7143V26.2857Z" fill="#141518" />
                            <path d="M15.9999 18.5723H15.1428C14.9155 18.5723 14.6974 18.6626 14.5367 18.8233C14.376 18.9841 14.2856 19.2021 14.2856 19.4294C14.2856 19.6567 14.376 19.8748 14.5367 20.0355C14.6974 20.1962 14.9155 20.2866 15.1428 20.2866H15.9999C16.2273 20.2866 16.4453 20.1962 16.606 20.0355C16.7668 19.8748 16.8571 19.6567 16.8571 19.4294C16.8571 19.2021 16.7668 18.9841 16.606 18.8233C16.4453 18.6626 16.2273 18.5723 15.9999 18.5723Z" fill="#141518" />
                            <path d="M19.4284 27.142H24.5713C24.7986 27.142 25.0166 27.0517 25.1774 26.891C25.3381 26.7302 25.4284 26.5122 25.4284 26.2849C25.4284 26.0575 25.3381 25.8395 25.1774 25.6788C25.0166 25.518 24.7986 25.4277 24.5713 25.4277H19.4284C19.2011 25.4277 18.9831 25.518 18.8223 25.6788C18.6616 25.8395 18.5713 26.0575 18.5713 26.2849C18.5713 26.5122 18.6616 26.7302 18.8223 26.891C18.9831 27.0517 19.2011 27.142 19.4284 27.142Z" fill="#141518" />
                            <path d="M19.4284 30.5717H24.5713C24.7986 30.5717 25.0166 30.4814 25.1774 30.3207C25.3381 30.1599 25.4284 29.9419 25.4284 29.7146C25.4284 29.4872 25.3381 29.2692 25.1774 29.1085C25.0166 28.9477 24.7986 28.8574 24.5713 28.8574H19.4284C19.2011 28.8574 18.9831 28.9477 18.8223 29.1085C18.6616 29.2692 18.5713 29.4872 18.5713 29.7146C18.5713 29.9419 18.6616 30.1599 18.8223 30.3207C18.9831 30.4814 19.2011 30.5717 19.4284 30.5717Z" fill="#141518" />
                        </svg>
                    </div>

                </div>
            </div>
            <?php while (have_posts()) : the_post(); ?>
                <div class="content">
                    <section class="article">
                        <div class="article-container">
                            <article>
                                <div class="title">
                                    <h3><?php the_title(); ?></h3>
                                </div>
                                <div class="time">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M2.5 5C2.5 3.61929 3.61929 2.5 5 2.5H15C16.3807 2.5 17.5 3.61929 17.5 5V15C17.5 16.3807 16.3807 17.5 15 17.5H5C3.61929 17.5 2.5 16.3807 2.5 15V5Z" stroke="#7E8189" stroke-width="1.5" />
                                        <path d="M2.5 6.66667H17.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round" />
                                        <path d="M13.7502 1.25L13.7502 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M6.25016 1.25L6.25016 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.4165 10.0013H6.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9.58301 10.0013H10.4163" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.75 10.0013H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.4165 13.3353H6.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9.58301 13.3353H10.4163" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M13.75 13.3353H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <span class="date"><?php the_time('d/m/Y') ?></span>
                                </div>
                                <div class="divider"></div>
                                <div class="excerpt"><?php the_excerpt(); ?></div>
                                <div><?php the_content(); ?></div>
                                <div class="source">
                                    <span><?php _e('Nguồn: Bitexco Power'); ?></span>
                                </div>
                                <div class="tag">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M1.66797 2.49935C1.66797 2.03911 2.04106 1.66602 2.5013 1.66602H9.16797C9.38898 1.66602 9.60094 1.75381 9.75722 1.91009L18.0906 10.2434C18.416 10.5689 18.416 11.0965 18.0906 11.4219L11.4239 18.0886C11.0985 18.414 10.5708 18.414 10.2454 18.0886L1.91205 9.75527C1.75577 9.59899 1.66797 9.38703 1.66797 9.16602V2.49935ZM3.33464 3.33268V8.82084L10.8346 16.3208L16.3228 10.8327L8.82279 3.33268H3.33464Z" fill="#7E8189" />
                                        <path d="M7.5013 6.24935C7.5013 6.9397 6.94166 7.49935 6.2513 7.49935C5.56095 7.49935 5.0013 6.9397 5.0013 6.24935C5.0013 5.55899 5.56095 4.99935 6.2513 4.99935C6.94166 4.99935 7.5013 5.55899 7.5013 6.24935Z" fill="#7E8189" />
                                    </svg>
                                    <?php echo get_the_tag_list('', ' , ') ?>
                                </div>
                                <div class="attach">
                                    <div class="title">
                                        <h5><?php _e('Tài liệu đính kèm'); ?>

                                        </h5>
                                    </div>
                                    <div class="file">
                                        <?php if (get_field('file')) : foreach (get_field('file') as $value) : ?>
                                                <a href="<?php echo $value['item']['url'] ?>" download="<?php echo $value['item']['filename'] ?>" class="file-item d-flex justify-content-between">
                                                    <span class="name d-flex">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                            <path d="M15.2193 9.91559L9.6214 15.5135C8.15693 16.978 5.78256 16.978 4.3181 15.5135V15.5135C2.85363 14.0491 2.85363 11.6747 4.3181 10.2102L11.0945 3.43378C12.0708 2.45747 13.6538 2.45747 14.6301 3.43378V3.43378C15.6064 4.41009 15.6064 5.99301 14.6301 6.96932L7.76945 13.8299C7.2813 14.3181 6.48984 14.3181 6.00169 13.8299V13.8299C5.51353 13.3418 5.51353 12.5503 6.00169 12.0622L11.6838 6.38006" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" />
                                                        </svg>
                                                        <span><?php echo $value['item']['filename'] ?></span>
                                                    </span>
                                                    <span class="download d-flex">
                                                        <span><?php _e('Tải xuống'); ?></span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M16.293 15.707L13.0001 18.9999C12.6095 19.3905 11.9764 19.3905 11.5859 18.9999L8.29297 15.707M12.293 18.707L12.293 4.70703" stroke="#DAA622" stroke-width="2" stroke-linecap="round" />
                                                        </svg>
                                                    </span>
                                                </a>
                                        <?php endforeach;
                                        endif; ?>
                                    </div>
                                </div>
                                <div class="divider-bottom"></div>
                                <?php comments_template(); ?>

                                <a class="back" href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M7.33336 7.33203L4.31487 10.3505C3.95689 10.7085 3.95689 11.2889 4.31487 11.6469L7.33336 14.6654M4.58336 10.9987L17.4167 10.9987" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                    <span onclick="window.history.go(-1); return false;"><?php _e('Quay lại tin tức'); ?></span>
                                </a>
                            </article>
                        </div>
                    </section>


                </div>
            <?php endwhile; ?>
        </div>

        <section class="related-news">
            <div class="article-container">
                <h4 class="related-news-title"><?php _e('Tin tức liên quan'); ?></h4>
                <div class="related-news-content">
                    <div class="image-related-item">
                        <?php
                        $post_id = get_the_category(get_the_ID());
                        if (isset($post_id)) {
                            $arr = json_decode(json_encode($post_id), true);
                        }
                        $post_related = array(
                            'post_type'    => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => 2,
                        );

                        $post_related = new WP_Query($post_related);
                        ?>
                        <?php if ($post_related->have_posts()) : ?>
                            <?php while ($post_related->have_posts()) : $post_related->the_post();
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                                <div class="related-item">
                                    <div class="image">
                                        <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>" class="img-banner">
                                    </div>
                                    <div class="item-content">
                                        <div class="item-cat">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M1.66797 2.49935C1.66797 2.03911 2.04106 1.66602 2.5013 1.66602H9.16797C9.38898 1.66602 9.60094 1.75381 9.75722 1.91009L18.0906 10.2434C18.416 10.5689 18.416 11.0965 18.0906 11.4219L11.4239 18.0886C11.0985 18.414 10.5708 18.414 10.2454 18.0886L1.91205 9.75527C1.75577 9.59899 1.66797 9.38703 1.66797 9.16602V2.49935ZM3.33464 3.33268V8.82084L10.8346 16.3208L16.3228 10.8327L8.82279 3.33268H3.33464Z" fill="#7E8189" />
                                                <path d="M7.5013 6.24935C7.5013 6.9397 6.94166 7.49935 6.2513 7.49935C5.56095 7.49935 5.0013 6.9397 5.0013 6.24935C5.0013 5.55899 5.56095 4.99935 6.2513 4.99935C6.94166 4.99935 7.5013 5.55899 7.5013 6.24935Z" fill="#7E8189" />
                                            </svg>
                                            <span class="text"><?php echo get_the_tag_list('', ', ') ?></span>
                                        </div>
                                        <div class="item-title">
                                            <h6> <a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h6>
                                        </div>
                                        <div class="item-time">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M2.5 5C2.5 3.61929 3.61929 2.5 5 2.5H15C16.3807 2.5 17.5 3.61929 17.5 5V15C17.5 16.3807 16.3807 17.5 15 17.5H5C3.61929 17.5 2.5 16.3807 2.5 15V5Z" stroke="#7E8189" stroke-width="1.5" />
                                                <path d="M2.5 6.66667H17.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round" />
                                                <path d="M13.7502 1.25L13.7502 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M6.25016 1.25L6.25016 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.4165 10.0013H6.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.58301 10.0013H10.4163" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M13.75 10.0013H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.4165 13.3353H6.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.58301 13.3353H10.4163" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M13.75 13.3353H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span class="text"><?php echo get_the_date() ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                    <div class="no-image-related-item">
                        <?php
                        $post_id = get_the_category(get_the_ID());
                        if (isset($post_id)) {
                            $arr = json_decode(json_encode($post_id), true);
                        }
                        $post_related_no_image = array(
                            'post_type'    => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
                        );

                        $post_related_no_image = new WP_Query($post_related_no_image);
                        ?>
                        <?php if ($post_related_no_image->have_posts()) : ?>
                            <?php while ($post_related_no_image->have_posts()) : $post_related_no_image->the_post(); ?>
                                <div class="related-item">
                                    <div class="item-content">
                                        <div class="item-cat">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M1.66797 2.49935C1.66797 2.03911 2.04106 1.66602 2.5013 1.66602H9.16797C9.38898 1.66602 9.60094 1.75381 9.75722 1.91009L18.0906 10.2434C18.416 10.5689 18.416 11.0965 18.0906 11.4219L11.4239 18.0886C11.0985 18.414 10.5708 18.414 10.2454 18.0886L1.91205 9.75527C1.75577 9.59899 1.66797 9.38703 1.66797 9.16602V2.49935ZM3.33464 3.33268V8.82084L10.8346 16.3208L16.3228 10.8327L8.82279 3.33268H3.33464Z" fill="#7E8189" />
                                                <path d="M7.5013 6.24935C7.5013 6.9397 6.94166 7.49935 6.2513 7.49935C5.56095 7.49935 5.0013 6.9397 5.0013 6.24935C5.0013 5.55899 5.56095 4.99935 6.2513 4.99935C6.94166 4.99935 7.5013 5.55899 7.5013 6.24935Z" fill="#7E8189" />
                                            </svg>
                                            <span class="text"><?php echo get_the_tag_list('', ', ') ?></span>
                                        </div>
                                        <div class="item-title">
                                            <h6> <a href="<?php echo get_the_permalink() ?>"><?php echo the_title() ?></a></h6>
                                        </div>
                                        <div class="item-time">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M2.5 5C2.5 3.61929 3.61929 2.5 5 2.5H15C16.3807 2.5 17.5 3.61929 17.5 5V15C17.5 16.3807 16.3807 17.5 15 17.5H5C3.61929 17.5 2.5 16.3807 2.5 15V5Z" stroke="#7E8189" stroke-width="1.5" />
                                                <path d="M2.5 6.66667H17.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round" />
                                                <path d="M13.7502 1.25L13.7502 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M6.25016 1.25L6.25016 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.4165 10.0013H6.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.58301 10.0013H10.4163" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M13.75 10.0013H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5.4165 13.3353H6.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.58301 13.3353H10.4163" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M13.75 13.3353H14.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <span><?php echo get_the_date() ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

</div>
<?php get_footer(); ?>