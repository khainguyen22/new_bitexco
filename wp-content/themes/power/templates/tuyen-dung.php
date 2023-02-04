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