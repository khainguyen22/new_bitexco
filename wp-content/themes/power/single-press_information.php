<?php
get_header();
// get_template_part('sections/specia', 'breadcrumb'); 
?>

<!-- Blog & Sidebar Section -->

<?php
get_header();
// get_template_part('sections/specia', 'breadcrumb'); 
?>

<!-- Blog & Sidebar Section -->

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
                <div class="social-medias">
                    <div class="medias">
                        <div class="share">
                            <span>Chia sẻ</span>
                        </div>
                        <div class="item my-3" id="shareOnFacebook" title="Share On Facebook">
                            <img src="http://localhost/new_bitexco/wp-content/uploads/2022/11/icon-fb.svg" alt="icon">
                        </div>
                        <div class="item my-3" id="shareOnZalo" title="Share On Zalo">
                            <img src="http://localhost/new_bitexco/wp-content/uploads/2022/11/icon-zalo.svg" alt="icon">
                        </div>
                        <div class="item my-3" id="shareViaEmail" title="Share Via Email">
                            <img src="http://localhost/new_bitexco/wp-content/uploads/2022/11/icon-gmail.svg" alt="icon">
                        </div>
                        <div class="item my-3" id="copyUrl" title="Copy Url">
                            <img src="http://localhost/new_bitexco/wp-content/uploads/2022/11/icon-link.svg" alt="icon">
                        </div>
                        <div class="item my-3" id="printPage" title="Print Page">
                            <img src="http://localhost/new_bitexco/wp-content/uploads/2022/11/icon-print.svg" alt="icon">
                        </div>
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

                                <div class="tag bitexco-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M1.66797 2.49935C1.66797 2.03911 2.04106 1.66602 2.5013 1.66602H9.16797C9.38898 1.66602 9.60094 1.75381 9.75722 1.91009L18.0906 10.2434C18.416 10.5689 18.416 11.0965 18.0906 11.4219L11.4239 18.0886C11.0985 18.414 10.5708 18.414 10.2454 18.0886L1.91205 9.75527C1.75577 9.59899 1.66797 9.38703 1.66797 9.16602V2.49935ZM3.33464 3.33268V8.82084L10.8346 16.3208L16.3228 10.8327L8.82279 3.33268H3.33464Z" fill="#7E8189" />
                                        <path d="M7.5013 6.24935C7.5013 6.9397 6.94166 7.49935 6.2513 7.49935C5.56095 7.49935 5.0013 6.9397 5.0013 6.24935C5.0013 5.55899 5.56095 4.99935 6.2513 4.99935C6.94166 4.99935 7.5013 5.55899 7.5013 6.24935Z" fill="#7E8189" />
                                    </svg>
                                    <?php

                                    $terms = get_the_terms(get_the_ID(), 'type');
                                    if ($terms && !is_wp_error($terms)) :
                                        foreach ($terms as $term) { ?>
                                            <p><?php echo esc_html($term->name); ?></p>
                                    <?php }
                                    endif; ?>

                                </div>
                                <div class="bitexco-info-contact">
                                    <?php $contact_information = get_field('contact_information', 'option') ?>
                                    <h5><?php _e('Thông tin liên hệ') ?></h5>
                                    <h6><?php _e('Ban truyền thông Bitexco Power') ?></h6>
                                    <p><?php _e('Điện thoại: ' . $contact_information['phone_number']) ?></p>
                                    <p><?php _e('Email: ' . $contact_information['email']) ?></p>
                                </div>

                                <div class="attach">
                                    <div class="title">
                                        <h5><?php _e('Tài liệu đính kèm'); ?></h5>
                                    </div>
                                    <div class="file">
                                        <?php if (get_field('file')) : foreach (get_field('file') as $value) : ?>
                                                <a href="<?php echo $value['item']['file'] ?>" download class="file-item d-flex justify-content-between">
                                                    <span class="name d-flex">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                            <path d="M15.2193 9.91559L9.6214 15.5135C8.15693 16.978 5.78256 16.978 4.3181 15.5135V15.5135C2.85363 14.0491 2.85363 11.6747 4.3181 10.2102L11.0945 3.43378C12.0708 2.45747 13.6538 2.45747 14.6301 3.43378V3.43378C15.6064 4.41009 15.6064 5.99301 14.6301 6.96932L7.76945 13.8299C7.2813 14.3181 6.48984 14.3181 6.00169 13.8299V13.8299C5.51353 13.3418 5.51353 12.5503 6.00169 12.0622L11.6838 6.38006" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" />
                                                        </svg>
                                                        <span><?php echo $value['item']['file_name'] ?></span>
                                                    </span>
                                                    <span class="download d-flex">
                                                        <span>Tải xuống</span>
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

                                <a class="back" href="<?php echo get_site_url() . '/thong-tin-bao-chi' ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                        <path d="M7.33336 7.33203L4.31487 10.3505C3.95689 10.7085 3.95689 11.2889 4.31487 11.6469L7.33336 14.6654M4.58336 10.9987L17.4167 10.9987" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                    <span><?php _e('Thông Tin báo chí') ?></span>
                                </a>
                            </article>
                        </div>
                    </section>


                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

</div>
<?php get_footer(); ?>