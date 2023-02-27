<?php

/**
 * Template Name: Tuyển dụng
 */
get_header();
$banner = get_field('banner_tuyen_dung', 'option');
$moi_truong_tai_bitexco_power = get_field('moi_truong_tai_bitexco_power', 'option');
$tab_content = '';
if ($moi_truong_tai_bitexco_power) {
    $tab_content = $moi_truong_tai_bitexco_power['tab_content'];
}

$slider = get_field('slider', 'option');
$dai_ngo_danh_cho_ban = get_field('dai_ngo_danh_cho_ban', 'option');
$list_dai_ngo = '';
if ($dai_ngo_danh_cho_ban) {
    $list_dai_ngo = $dai_ngo_danh_cho_ban['list'];
}

$cuoc_song_tai_bitexco_power = get_field('cuoc_song_tai_bitexco_power', 'option');
$nguoi_power_noi_gi = get_field('nguoi_power_noi_gi', 'option');
$slider_nguoi_power_noi_gi = '';
if ($nguoi_power_noi_gi) {
    $slider_nguoi_power_noi_gi = $nguoi_power_noi_gi['slider'];
}

$co_hoi_lam_viec = get_field('co_hoi_lam_viec', 'option');
$other_info = get_field('other_info_tuyen_dung', 'option');
$post_type = 'post';

$args = array(
    'post_type'    => $post_type,
);
$the_query_post = new WP_Query($args);
?>
<div class="tuyen-dung">
    <section class="banner recruit not_navigation" style='background-image:url("<?php echo $banner['background']; ?>")'>
        <div class="container">
            <div class="content">
                <h3><?php echo isset($banner['title']) ? $banner['title'] : ""; ?></h3>
                <p><?php echo isset($banner['description']) ? $banner['description'] : ""; ?></p>
                <a href="<?php echo $banner['link']; ?>" class="btn btn-custom-1 btn-custom-1-l position"><?php echo isset($banner['button']) ? $banner['button'] : ""; ?></a>
            </div>
        </div>
    </section>
    <section class="your-privilege power-enviroment">
        <div class="container">
            <div class="your-privilege-content">
                <div class="content">
                    <span class="divider"></span>
                    <h3><?php echo  isset($moi_truong_tai_bitexco_power['title']) ? $moi_truong_tai_bitexco_power['title'] : ""; ?></h3>
                    <p><?php echo isset($moi_truong_tai_bitexco_power['description']) ? $moi_truong_tai_bitexco_power['description'] : ""; ?></p>
                </div>
                <div class="values">
                    <?php if ($tab_content) : ?>
                        <div class="the-values">
                            <?php foreach ($tab_content as $key => $value) : ?>
                                <div class="drop-down always-grow <?php echo $key == 0 ? 'active' : '' ?>" data-number="<?php echo $key ?>">
                                    <h5><?php echo $value['title_tab']; ?></h5>
                                    <p><?php echo $value['description_tab']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="the-values-image">
                            <?php foreach ($tab_content as $key => $value) : ?>
                                <img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title_tab']; ?>" class="highlight-img img-<?php echo $key ?> <?php echo $key == 0 ? 'active' : '' ?>" />
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="building-dream">
        <div class="building-dream-container">
            <div class="building-dream-content">
                <?php if ($slider) : ?>
                    <?php foreach ($slider as $value) : ?>
                        <div class="content">
                            <img src="<?php echo $value['image_item']; ?>" alt="image">
                            <div class="text">
                                <h4><?php echo $value['title_item']; ?></h4>
                                <p><?php echo $value['description_item']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="your-privilege">
        <div class="container">
            <div class="your-privilege-content">
                <div class="content">
                    <span class="divider"></span>
                    <h3><?php echo  isset($dai_ngo_danh_cho_ban['title']) ? $dai_ngo_danh_cho_ban['title'] : ""; ?></h3>
                    <p><?php echo isset($dai_ngo_danh_cho_ban['description']) ? $dai_ngo_danh_cho_ban['description'] : ""; ?></p>
                </div>
                <div class="services">
                    <?php if ($list_dai_ngo) : ?>
                        <?php foreach ($list_dai_ngo as $value) : ?>
                            <div class="service">
                                <img src="<?php echo $value['icon']; ?>" alt="image">
                                <div class="text">
                                    <h6><?php echo $value['title']; ?></h6>
                                    <p><?php echo $value['description']; ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="your-privilege slogan">
        <div class="container">
            <div class="your-privilege-content">
                <div class="content">
                    <span class="divider"></span>
                    <h3><?php echo isset($nguoi_power_noi_gi['title']) ? $nguoi_power_noi_gi['title'] : ""; ?></h3>
                    <p><?php echo isset($nguoi_power_noi_gi['description']) ? $nguoi_power_noi_gi['description'] : ""; ?></p>
                </div>
                <div class="quote">
                    <div class="quote-agency">
                        <?php if ($slider_nguoi_power_noi_gi) : ?>
                            <?php foreach ($slider_nguoi_power_noi_gi as $key => $value) : ?>
                                <img class="agency-<?php echo $key ?> quote-agency-img <?php echo $key == 0 ? 'active' : '' ?>" src="<?php echo $value['image'] ?>" alt="Agency Quote">
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="quote-content">
                        <div class="quote-navigation">
                            <?php if ($slider_nguoi_power_noi_gi) : ?>
                                <?php foreach ($slider_nguoi_power_noi_gi as $key => $value) : ?>
                                    <div data-number="<?php echo $key ?>" class="quote-nav-img-<?php echo $key ?> quote-nav-img <?php echo $key == 0 ? 'active' : '' ?>">
                                        <img src="<?php echo $value['image'] ?>" alt="Nav">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="quote-text">
                            <?php if ($slider_nguoi_power_noi_gi) : ?>
                                <?php foreach ($slider_nguoi_power_noi_gi as $key => $value) : ?>
                                    <div class="quote-text-<?php echo $key ?> quote-text-inner <?php echo $key == 0 ? 'active' : '' ?>">
                                        <svg width="48" height="38" viewBox="0 0 48 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.6156 38C9.44359 38 7.64931 37.5632 6.23277 36.6896C4.81623 35.8161 3.63578 34.6513 2.69142 33.1954C1.74706 31.6424 1.03879 29.8953 0.566613 27.954C0.188869 26.0128 -2.09098e-06 24.2656 -1.95716e-06 22.7126C-1.54733e-06 17.9566 1.18045 13.5888 3.54135 9.60919C5.99668 5.62963 9.7269 2.42656 14.732 1.30663e-06L16.0069 2.62069C13.1738 3.8825 10.7185 5.82376 8.64089 8.44445C6.5633 11.0651 5.43007 13.7343 5.24119 16.4521C5.05232 17.908 5.14676 19.2669 5.5245 20.5287C7.22435 18.8787 9.30194 18.0536 11.7573 18.0536C14.4959 18.0536 16.8096 18.9757 18.6983 20.8199C20.587 22.567 21.5314 24.9936 21.5314 28.0996C21.5314 31.0115 20.5398 33.3895 18.5567 35.2337C16.6679 37.0779 14.3543 38 11.6156 38ZM37.3966 38C35.2246 38 33.4303 37.5632 32.0138 36.6897C30.5973 35.8161 29.4168 34.6513 28.4724 33.1954C27.5281 31.6424 26.8198 29.8953 26.3476 27.954C25.9699 26.0128 25.781 24.2656 25.781 22.7126C25.781 17.9566 26.9615 13.5888 29.3224 9.60919C31.7777 5.62963 35.5079 2.42656 40.513 3.59323e-06L41.7879 2.62069C38.9548 3.8825 36.4995 5.82376 34.4219 8.44445C32.3443 11.0651 31.2111 13.7344 31.0222 16.4521C30.8333 17.908 30.9278 19.2669 31.3055 20.5287C33.0054 18.8787 35.083 18.0536 37.5383 18.0536C40.2769 18.0536 42.5906 18.9757 44.4793 20.8199C46.3681 22.567 47.3124 24.9936 47.3124 28.0996C47.3124 31.0115 46.3208 33.3895 44.3377 35.2337C42.449 37.0779 40.1353 38 37.3966 38Z" fill="#DAA622" />
                                        </svg>
                                        <h2><?php echo $value['quote'] ?></h2>
                                        <div class="quote-divider"></div>
                                        <p class="company-role"><?php echo $value['role'] ?></p>
                                        <h3 class="author"><?php echo $value['name'] ?></h3>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="your-privilege life-at-bitexco-section">
        <div class="container">
            <div class="your-privilege-content">
                <div class="content">
                    <span class="divider"></span>
                    <h3><?php echo isset($cuoc_song_tai_bitexco_power['title']) ? $cuoc_song_tai_bitexco_power['title'] : ""; ?></h3>
                    <p class="size-text-18"><?php echo isset($cuoc_song_tai_bitexco_power['description']) ? $cuoc_song_tai_bitexco_power['description'] : ""; ?></p>
                </div>
            </div>
        </div>
        <div class="life-in-bitexco">
            <div class="container">
                <div class="life-in-bitexco-content">
                    <?php if ($the_query_post->have_posts()) : ?>
                        <?php while ($the_query_post->have_posts()) : $the_query_post->the_post();
                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                            <div class="content-item">
                                <div class="image">
                                    <a href="<?php the_permalink() ?>">
                                        <img src="<?php echo $featured_img_url ?>" alt="<?php echo the_title() ?>">
                                        <?php
                                        if (get_field('type_post')) : $type_post = get_field('type_post'); ?>
                                            <span class="type">
                                                <?php
                                                if ($type_post['value'] === 'Video') {
                                                    echo '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"> <rect width="28" height="28" rx="14" fill="#DAA622"/><path d="M18.3166 7.77734H8.90564C7.85325 7.77734 7 8.65442 7 9.73619V19.0407C7 20.1225 7.85325 20.9996 8.90564 20.9996H18.3166C19.369 20.9996 20.2222 20.1225 20.2222 19.0407V9.73619C20.2222 8.65442 19.369 7.77734 18.3166 7.77734ZM16.905 15.6607L12.6173 18.2053C12.3934 18.338 12.1481 18.4046 11.9027 18.4046C11.6574 18.4046 11.4115 18.3385 11.1881 18.2053C10.7407 17.9398 10.4735 17.4643 10.4735 16.933V11.8439C10.4735 11.3126 10.7407 10.8371 11.1881 10.5716C11.6354 10.3062 12.17 10.3062 12.6173 10.5716L16.905 13.1162C17.3524 13.3816 17.6196 13.8576 17.6196 14.3885C17.6196 14.9193 17.3524 15.3953 16.905 15.6607Z" fill="white"/></svg>';
                                                }
                                                if ($type_post['value'] == 'Image') {
                                                    echo '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="28" height="28" rx="14" fill="#DAA622"/><path d="M20.1073 7.46094H8.67141C7.7496 7.46094 7 8.21029 7 9.13319V19.6434C7 20.5652 7.7496 21.3138 8.67141 21.3138H20.1072C21.029 21.3138 21.7778 20.5652 21.7778 19.6434V9.13319C21.7779 8.21029 21.0291 7.46094 20.1073 7.46094ZM16.5561 9.94789C17.4476 9.94789 18.1705 10.6709 18.1705 11.5623C18.1705 12.4536 17.4475 13.1766 16.5561 13.1766C15.6644 13.1766 14.9418 12.4536 14.9418 11.5623C14.9418 10.6709 15.6644 9.94789 16.5561 9.94789ZM19.5831 19.7688H14.3888H9.42591C8.98005 19.7688 8.78148 19.4462 8.98247 19.0482L11.753 13.5606C11.9538 13.1627 12.3364 13.1272 12.6073 13.4812L15.3932 17.1219C15.6641 17.476 16.1377 17.5062 16.4511 17.1889L17.1327 16.4988C17.4459 16.1815 17.9073 16.2208 18.1629 16.5859L19.9277 19.1068C20.1828 19.4725 20.0289 19.7688 19.5831 19.7688Z" fill="white"/></svg>';
                                                }
                                                if ($type_post['value'] == 'Radio') {
                                                    echo '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"> <rect width="28" height="28" rx="14" fill="#DAA622"/><path fill-rule="evenodd" clip-rule="evenodd" d="M13.5201 8.89675C13.6622 8.95566 13.7836 9.05537 13.869 9.1833C13.9545 9.31122 14 9.46159 14 9.61541V18.9487C14 19.1026 13.9543 19.2529 13.8689 19.3808C13.7834 19.5087 13.6619 19.6083 13.5198 19.6672C13.3777 19.726 13.2214 19.7414 13.0705 19.7114C12.9197 19.6814 12.7811 19.6074 12.6723 19.4986L9.78911 16.6154H7.77778C7.5715 16.6154 7.37367 16.5335 7.2278 16.3876C7.08195 16.2418 7 16.0439 7 15.8376V12.7265C7 12.5202 7.08195 12.3224 7.2278 12.1765C7.37367 12.0307 7.5715 11.9487 7.77778 11.9487H9.78911L12.6723 9.06552C12.7811 8.95668 12.9197 8.88256 13.0706 8.85251C13.2215 8.82247 13.378 8.83786 13.5201 8.89675ZM17.6221 8.78241C17.7679 8.6366 17.9657 8.55469 18.172 8.55469C18.3783 8.55469 18.5761 8.6366 18.7219 8.78241C19.4451 9.50392 20.0186 10.3612 20.4096 11.305C20.8005 12.2488 21.0012 13.2605 21 14.2821C21.0012 15.3037 20.8005 16.3154 20.4096 17.2592C20.0186 18.203 19.4451 19.0603 18.7219 19.7817C18.5752 19.9234 18.3787 20.0018 18.1748 20.0001C17.9709 19.9983 17.7758 19.9164 17.6316 19.7722C17.4874 19.628 17.4056 19.433 17.4038 19.229C17.402 19.0251 17.4804 18.8286 17.6221 18.682C18.2009 18.1049 18.6598 17.4191 18.9726 16.664C19.2854 15.9089 19.4457 15.0994 19.4444 14.2821C19.4444 12.5632 18.7491 11.0092 17.6221 9.88219C17.4763 9.73633 17.3944 9.53854 17.3944 9.3323C17.3944 9.12606 17.4763 8.92826 17.6221 8.78241ZM15.4218 10.982C15.494 10.9097 15.5798 10.8523 15.6742 10.8131C15.7687 10.774 15.8699 10.7539 15.9721 10.7539C16.0743 10.7539 16.1754 10.774 16.2699 10.8131C16.3643 10.8523 16.4501 10.9097 16.5223 10.982C16.9563 11.4149 17.3003 11.9293 17.5348 12.4957C17.7693 13.062 17.8897 13.6691 17.8889 14.2821C17.8897 14.895 17.7693 15.5021 17.5348 16.0685C17.3003 16.6348 16.9562 17.1492 16.5223 17.5822C16.3764 17.7282 16.1785 17.8101 15.9721 17.8101C15.7656 17.8101 15.5677 17.7282 15.4218 17.5822C15.2759 17.4363 15.1938 17.2383 15.1938 17.0319C15.1938 16.8256 15.2759 16.6276 15.4218 16.4816C15.7113 16.1932 15.9408 15.8504 16.0973 15.4729C16.2537 15.0954 16.334 14.6907 16.3333 14.2821C16.334 13.8734 16.2538 13.4687 16.0973 13.0912C15.9409 12.7137 15.7113 12.3709 15.4218 12.0825C15.3494 12.0103 15.2921 11.9245 15.2529 11.8301C15.2138 11.7357 15.1937 11.6345 15.1937 11.5322C15.1937 11.43 15.2138 11.3288 15.2529 11.2344C15.2921 11.14 15.3494 11.0542 15.4218 10.982Z" fill="white"/></svg>';
                                                }
                                                ?>
                                            </span>
                                        <?php endif; ?>
                                    </a>
                                </div>
                                <div class="content-text">
                                    <h6><?php echo the_title() ?></h6>
                                    <p><?php echo the_excerpt() ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="lib-button">
                    <a href="<?php echo $cuoc_song_tai_bitexco_power['link']; ?>" class="btn btn-custom-1 btn-custom-1-m position"><?php echo isset($cuoc_song_tai_bitexco_power['button']) ? $cuoc_song_tai_bitexco_power['button'] : ""; ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="banner opportunity" style="background-image : url(<?php echo $co_hoi_lam_viec['background'] ?>)">
        <div class="container">
            <div class="content">
                <span class="divider"></span>
                <h3><?php echo isset($co_hoi_lam_viec['title']) ? $co_hoi_lam_viec['title'] : ""; ?></h3>
                <p><?php echo isset($co_hoi_lam_viec['description']) ? $co_hoi_lam_viec['description'] : ""; ?></p>
                <a href="<?php echo $co_hoi_lam_viec['link']; ?>" class="btn btn-custom-1 btn-custom-1-m position"><?php echo isset($co_hoi_lam_viec['button']) ? $co_hoi_lam_viec['button'] : ""; ?></a>
            </div>
        </div>
    </section>
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
</div>

<?php
get_footer();
?>