<?php

/**
 * Template Name: Thương hiệu bitexco power
 */
$banner = get_field('banner_thuong_hieu', 'option');
$ve_bitexco_power = get_field('ve_bitexco_power', 'option');
$chu_tich_tap_doan_bitexco_power = get_field('chu_tich_tap_doan_bitexco_power', 'option');
$trach_nhiem_xa_hoi = get_field('trach_nhiem_xa_hoi', 'option');
$tab_content = "";
if ($trach_nhiem_xa_hoi) {
    $tab_content = $trach_nhiem_xa_hoi['tab_content'];
}
$gia_tri_cot_loi = get_field('gia_tri_cot_loi', 'option');
$slide_gia_tri_cot_loi = "";
if ($gia_tri_cot_loi) {
    $slide_gia_tri_cot_loi = $gia_tri_cot_loi['list'];
}
$doi_tac_cua_chung_toi = get_field('doi_tac_cua_chung_toi', 'option');
$list_doi_tac_cua_chung_toi = "";
if ($doi_tac_cua_chung_toi) {
    $list_doi_tac_cua_chung_toi = $doi_tac_cua_chung_toi['list'];
}
$thanh_tuu_dat_duoc = get_field('thanh_tuu_dat_duoc', 'option');
$list_thanh_tuu_dat_duoc = "";
if ($thanh_tuu_dat_duoc) {
    $list_thanh_tuu_dat_duoc = $thanh_tuu_dat_duoc['list'];
}
$other_info = get_field('other_info_thuong_hieu', 'option');
get_header();
?>
<div class="tuyen-dung bitxeco-brand-page">
    <section class="banner bitexco-brand not_navigation" style='background-image:url("<?php echo $banner['background']; ?>")'>
        <div class="container">
            <div class="content">
                <h3><?php _e(paint_if_exist($banner['title']), POWER); ?></h3>
                <p class="size-text-16"><?php echo isset($banner['description']) ? $banner['description'] : ""; ?></p>
            </div>
        </div>
    </section>
    <section class="about-bitexco">
        <div class="container">
            <div class="about-bitexco-content">
                <div class="about-bitexco-column text">
                    <div class="divider"></div>
                    <h3><?php echo isset($ve_bitexco_power['title']) ? $ve_bitexco_power['title'] : ""; ?></h3>
                    <p class="size-text-16"><?php echo isset($ve_bitexco_power['description']) ? $ve_bitexco_power['description'] : ""; ?></p>
                    <?php if ($ve_bitexco_power['button']) : ?>
                        <a href="<?php echo $ve_bitexco_power['link']; ?>" class="btn btn-custom-1 btn-custom-1-m more-about-bitexco-group">
                            <span><?php echo $ve_bitexco_power['button']; ?></span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="about-bitexco-column map">
                    <img src="<?php echo $ve_bitexco_power['image']; ?>" alt="<?php echo $ve_bitexco_power['title']; ?>">
                </div>
            </div>
        </div>
    </section>
    <section class="brand-quote">
        <div class="brand-quote-container">
            <div class="brand-quote-content">
                <div class="image">
                    <img src="<?php echo $chu_tich_tap_doan_bitexco_power['image']; ?>" alt="<?php echo $chu_tich_tap_doan_bitexco_power['name']; ?>">
                </div>
                <div class="quote-text" style='background-image:url("<?php echo $chu_tich_tap_doan_bitexco_power['background']; ?>")'>
                    <svg width="48" height="38" viewBox="0 0 48 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.6156 38C9.44359 38 7.64931 37.5632 6.23277 36.6896C4.81623 35.8161 3.63578 34.6513 2.69142 33.1954C1.74706 31.6424 1.03879 29.8953 0.566613 27.954C0.188869 26.0128 -2.09098e-06 24.2656 -1.95716e-06 22.7126C-1.54733e-06 17.9566 1.18045 13.5888 3.54135 9.60919C5.99668 5.62963 9.7269 2.42656 14.732 1.30663e-06L16.0069 2.62069C13.1738 3.8825 10.7185 5.82376 8.64089 8.44445C6.5633 11.0651 5.43007 13.7343 5.24119 16.4521C5.05232 17.908 5.14676 19.2669 5.5245 20.5287C7.22435 18.8787 9.30194 18.0536 11.7573 18.0536C14.4959 18.0536 16.8096 18.9757 18.6983 20.8199C20.587 22.567 21.5314 24.9936 21.5314 28.0996C21.5314 31.0115 20.5398 33.3895 18.5567 35.2337C16.6679 37.0779 14.3543 38 11.6156 38ZM37.3966 38C35.2246 38 33.4303 37.5632 32.0138 36.6897C30.5973 35.8161 29.4168 34.6513 28.4724 33.1954C27.5281 31.6424 26.8198 29.8953 26.3476 27.954C25.9699 26.0128 25.781 24.2656 25.781 22.7126C25.781 17.9566 26.9615 13.5888 29.3224 9.60919C31.7777 5.62963 35.5079 2.42656 40.513 3.59323e-06L41.7879 2.62069C38.9548 3.8825 36.4995 5.82376 34.4219 8.44445C32.3443 11.0651 31.2111 13.7344 31.0222 16.4521C30.8333 17.908 30.9278 19.2669 31.3055 20.5287C33.0054 18.8787 35.083 18.0536 37.5383 18.0536C40.2769 18.0536 42.5906 18.9757 44.4793 20.8199C46.3681 22.567 47.3124 24.9936 47.3124 28.0996C47.3124 31.0115 46.3208 33.3895 44.3377 35.2337C42.449 37.0779 40.1353 38 37.3966 38Z" fill="#DAA622" />
                    </svg>
                    <p class="content-quote size-text-16"><?php echo isset($chu_tich_tap_doan_bitexco_power['quote']) ? $chu_tich_tap_doan_bitexco_power['quote'] : ""; ?></p>
                    <div class="quote-divider"></div>
                    <p class="company-role size-text-16"> <?php echo isset($chu_tich_tap_doan_bitexco_power['position']) ? $chu_tich_tap_doan_bitexco_power['position'] : ""; ?></p>
                    <h3 class="author"><?php echo isset($chu_tich_tap_doan_bitexco_power['name']) ? $chu_tich_tap_doan_bitexco_power['name'] : ""; ?></h3>
                </div>
            </div>
        </div>
    </section>
    <section class="your-privilege power-enviroment social-responsibility">
        <div class="container">
            <div class="your-privilege-content">
                <div class="content">
                    <span class="divider"></span>
                    <h3><?php echo isset($trach_nhiem_xa_hoi['title']) ? $trach_nhiem_xa_hoi['title'] : ""; ?></h3>
                    <p class="size-text-16"><?php echo isset($trach_nhiem_xa_hoi['description']) ? $trach_nhiem_xa_hoi['description'] : ""; ?></p>
                </div>
                <div class="values">
                    <?php if ($tab_content) : ?>
                        <div class="the-values-image">
                            <?php foreach ($tab_content as $key => $value) : ?>
                                <img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title_tab']; ?>" class="highlight-img <?php echo $key != 0 ?  'img-' . $key : 'active img-' . $key ?>" />
                            <?php endforeach; ?>
                        </div>
                        <div class="the-values">
                            <?php foreach ($tab_content as $key => $value) : ?>
                                <div class="drop-down grow-with-challenge <?php echo $key == 0 ? 'active' : '' ?>" data-number="<?php echo $key ?>">
                                    <h5><?php echo $value['title_tab']; ?></h5>
                                    <p class="size-text-16"><?php echo $value['description_tab']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="core-value">
        <div class="core-value-container">
            <div class="content">
                <div class="divider"></div>
                <h3><?php echo isset($gia_tri_cot_loi['title']) ? $gia_tri_cot_loi['title'] : ""; ?></h3>
                <p class="size-text-16"><?php echo isset($gia_tri_cot_loi['description']) ? $gia_tri_cot_loi['description'] : ""; ?></p>
            </div>
            <div class="core-value-content">
                <?php if ($slide_gia_tri_cot_loi) : ?>
                    <?php foreach ($slide_gia_tri_cot_loi as $key => $value) : ?>
                        <div class="value resources slide-img <?php echo $key == 0 ? 'active' : '' ?>" style='background-image:url("<?php echo $value['image']; ?>")'>
                            <h6 class="numberical-order">0<?php echo $key + 1; ?></h6>
                            <h6 class="title"><?php echo $value['title']; ?></h6>
                            <p class="desc size-text-16"><?php echo $value['description']; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <section class="your-privilege power-enviromen achievement">
        <div class="container">
            <div class="your-privilege-content">
                <div class="content">
                    <span class="divider"></span>
                    <h3><?php echo isset($thanh_tuu_dat_duoc['title']) ? $thanh_tuu_dat_duoc['title'] : ""; ?></h3>
                    <p class="size-text-16"><?php echo isset($thanh_tuu_dat_duoc['description']) ? $thanh_tuu_dat_duoc['description'] : ""; ?></p>
                </div>
                <div class="achievement-figures">
                    <?php if ($list_thanh_tuu_dat_duoc) : ?>
                        <?php foreach ($list_thanh_tuu_dat_duoc as $key => $value) : ?>
                            <div class="culmulative-output figure">
                                <img src="<?php echo $value['icon'] ?>" width="80" height="80" alt="<?php echo $value['title'] ?>">
                                <div class="figure-text">
                                    <p class="name size-text-16"><?php echo $value['title'] ?></p>
                                    <h2 class="number"><?php echo $value['info'] ?></h2>
                                    <p class="unit size-text-16"><?php echo $value['unit'] ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="your-privilege power-enviromen our-partners">
        <div class="container">
            <div class="your-privilege-content">
                <div class="content">
                    <span class="divider"></span>
                    <h3><?php echo isset($doi_tac_cua_chung_toi['title']) ? $doi_tac_cua_chung_toi['title'] : ""; ?></h3>
                    <p class="size-text-16"><?php echo isset($doi_tac_cua_chung_toi['description']) ? $doi_tac_cua_chung_toi['description'] : ""; ?></p>
                </div>
                <div class="our-partner-logo">
                    <?php if ($list_doi_tac_cua_chung_toi) : ?>
                        <?php foreach ($list_doi_tac_cua_chung_toi as $key => $value) : ?>
                            <div class="partner">
                                <a href="<?php echo $value['link'] ?>">
                                    <img src="<?php echo $value['image'] ?>" width="60" height="71" alt="alt">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
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