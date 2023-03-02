<?php

/*
*Template Name: Trang chủ
 **/

$home_san_xuat_kinh_doanh = get_field('home_san_xuat_kinh_doanh', 'option');
$home_san_xuat_kinh_doanh_background = '';
$home_san_xuat_kinh_doanh_content = '';
if ($home_san_xuat_kinh_doanh) {
    $home_san_xuat_kinh_doanh_content = $home_san_xuat_kinh_doanh['content'];
    $home_san_xuat_kinh_doanh_background = $home_san_xuat_kinh_doanh['background'];
    $timestamp = strtotime($home_san_xuat_kinh_doanh_content['date']);
}
$home_du_an_cua_chung_toi = get_field('home_du_an_cua_chung_toi', 'option');
$home_du_an_cua_chung_toi_background = '';
$home_du_an_cua_chung_toi_content = '';
if ($home_du_an_cua_chung_toi) {
    $home_du_an_cua_chung_toi_content = $home_du_an_cua_chung_toi['content'];
    $home_du_an_cua_chung_toi_background = $home_du_an_cua_chung_toi['background'];
}
$home_lich_su_phat_trien = get_field('home_lich_su_phat_trien', 'option');
$home_lich_su_phat_trien_background = '';
$home_lich_su_phat_trien_content = '';
if ($home_lich_su_phat_trien) {
    $home_lich_su_phat_trien_content = $home_lich_su_phat_trien['content'];
    $home_lich_su_phat_trien_background = $home_lich_su_phat_trien['background'];
}

$home_tin_tuc_moi = get_field('home_tin_tuc_moi', 'option');
$home_tin_tuc_moi_background = '';
$home_tin_tuc_moi_button = '';
$home_tin_tuc_moi_link = '';
$home_tin_tuc_moi_post = '';
$home_tin_tuc_moi_title_content = '';
$home_tin_tuc_moi_desc_content = '';
if ($home_tin_tuc_moi) {

    // $home_tin_tuc_moi_title_content = $home_tuyen_dung['title_content'];
    // $home_tin_tuc_moi_desc_content = $home_tuyen_dung['description_content'];
    $home_tin_tuc_moi_post = $home_tin_tuc_moi['post'];
    $home_tin_tuc_moi_button = $home_tin_tuc_moi['button'];
    // $home_tin_tuc_moi_link = $home_tin_tuc_moi['link'];
    $home_tin_tuc_moi_background = $home_tin_tuc_moi['background'];
}

$home_tuyen_dung = get_field('home_tuyen_dung', 'option');
$home_tuyen_dung_background = '';
$home_tuyen_dung_button = '';
// $home_tuyen_dung_link = '';
$home_tuyen_dung_post = '';
$home_tuyen_dung_title_content = '';
$home_tuyen_dung_desc_content = '';

if ($home_tuyen_dung) {

    $home_tuyen_dung_title_content = $home_tuyen_dung['title_content'];
    $home_tuyen_dung_desc_content = $home_tuyen_dung['description_content'];
    $home_tuyen_dung_post = $home_tuyen_dung['post'];
    $home_tuyen_dung_button = $home_tuyen_dung['button'];
    // $home_tuyen_dung_link = $home_tuyen_dung['link'];
    $home_tuyen_dung_background = $home_tuyen_dung['background'];
}

$home_footer = get_field('home_footer', 'option');
include 'Classes/PHPExcel/IOFactory.php';

$inputFileName = __DIR__ . '/Bitexco.xlsx';

try {

    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);

    $objReader = PHPExcel_IOFactory::createReader($inputFileType);

    $objPHPExcel = $objReader->load($inputFileName);
} catch (Exception $e) {

    die('Lỗi không thể đọc file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
}

// get data current date of day

$sheet = $objPHPExcel->getSheet(idate('m'));

$highestRow = $sheet->getHighestRow();

$highestColumn = $sheet->getHighestColumn();

for ($row = 1; $row <= $highestRow; $row++) {

    $rowData[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
}

// get data current date of month and total of year

$sheet_month = $objPHPExcel->getSheet(0);

$highestRow_month  = $sheet_month->getHighestRow();

$highestColumn_month = $sheet_month->getHighestColumn();

for ($row = 1; $row <= $highestRow_month; $row++) {

    $rowData_month[] = $sheet_month->rangeToArray('A' . $row . ':' . $highestColumn_month . $row, NULL, TRUE, FALSE);
}
// check the previous day
$date = date("Y-m-d");
$yesterday = $date;
$current_date = date('m-d');
$fake_date = '01-01';

if ($current_date === $fake_date) {
    $yesterday = date_create($date)->format('Y-m-d');
} else {
    $yesterday = date_create($date)->modify('-1 day')->format('Y-m-d');
}

$day = number_format(date('d', strtotime($yesterday)));
$month = number_format(date('m', strtotime($yesterday)));

get_header();

?>



<div class="home">

    <section class="home-slide">

        <div class="home-slide-carousel">

            <?php

            $titles = get_field('slider_title', 'option');

            ?>

            <div data-title="<?php echo $home_san_xuat_kinh_doanh['title'] ?>" class="item home_san_xuat_kinh_doanh">

                <?php if ($home_san_xuat_kinh_doanh) : ?>

                    <img src="<?php echo $home_san_xuat_kinh_doanh_background; ?>" alt="<?php echo $home_san_xuat_kinh_doanh_content['title']; ?>">

                    <div class="container">

                        <div class="content">

                            <?php if ($home_san_xuat_kinh_doanh['content']['title']) : ?><h3 class="title">
                                    <?php echo $home_san_xuat_kinh_doanh['content']['title']; ?></h3> <?php endif; ?>

                            <div class="d-flex desc-wrap">

                                <?php foreach ($rowData as $key => $value) : ?>

                                    <?php if ($key === count($rowData) - 1) : ?>

                                        <div class="desc-left">

                                            <h3 class="title"><?php echo number_format($rowData[$day][0][8]); ?><span class="unit"><?php echo _e('Triệu kWh'); ?> </span></h3>

                                            <span class="description uppercase">

                                                <?php

                                                echo _e('Ngày ');

                                                $d = date('d');

                                                echo $d - 1;

                                                ?>

                                            </span>

                                        </div>

                                        <div class="desc-left">

                                            <h3 class="title"><?php echo number_format($rowData_month[$month][0][8]); ?><span class="unit"><?php echo _e('Triệu kWh');  ?></span></h3>

                                            <span class="description uppercase">

                                                <?php

                                                echo _e('Tháng ');

                                                $m = date('m');

                                                echo $m;

                                                ?>

                                            </span>

                                        </div>

                                        <div class="desc-left">

                                            <h3 class="title"><?php echo number_format($rowData_month[13][0][8]); ?><span class="unit"><?php echo _e('Triệu kWh'); ?></span></h3>

                                            <span class="description uppercase">

                                                <?php

                                                echo _e('Năm ');

                                                $year = date('Y');

                                                echo $year;

                                                ?>

                                            </span>

                                        </div>

                                    <?php endif; ?>

                                <?php endforeach; ?>

                            </div>

                            <div id="excel_data"></div>

                            <?php if ($home_san_xuat_kinh_doanh['content']['button']) : ?>

                                <a href="<?php echo $home_san_xuat_kinh_doanh['content']['link'] ?>" class="btn btn-warning btn-detail uppercase"><?php echo isset($home_san_xuat_kinh_doanh['content']['button']) ? $home_san_xuat_kinh_doanh['content']['button'] : "Chi tiết"; ?></a>

                            <?php endif; ?>

                        </div>

                    </div>

                <?php endif; ?>

            </div>

            <div data-title="<?php echo $home_du_an_cua_chung_toi['title'] ?>" class="item home_du_an_cua_chung_toi">

                <?php if ($home_du_an_cua_chung_toi) : ?>

                    <img src="<?php echo $home_du_an_cua_chung_toi_background  ?>" alt="<?php echo $home_san_xuat_kinh_doanh_content['title']; ?>">

                    <div class="container">

                        <div class="content">

                            <?php if ($home_du_an_cua_chung_toi_content['title']) : ?>

                                <h3 class="title"><?php echo _e($home_du_an_cua_chung_toi_content['title']); ?></h3>

                            <?php endif; ?>
                            <?php if ($home_du_an_cua_chung_toi_content['content']) : ?>
                                <div class="d-flex desc-wrap">
                                    <?php foreach ($home_du_an_cua_chung_toi_content['content'] as $value) :   ?>
                                        <div class="desc-left">
                                            <?php if ($value['count']) : ?>
                                                <h3 class="title"><?php echo (str_pad($value['count'], 2, '0', STR_PAD_LEFT)); ?></h3>
                                            <?php endif; ?>

                                            <span class="description uppercase"><?php echo _e($value['label']); ?></span>

                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <a href="<?php echo $home_du_an_cua_chung_toi_content['link'] ?>" class="btn btn-warning btn-detail uppercase"><?php echo isset($home_du_an_cua_chung_toi_content['button']) ? $home_du_an_cua_chung_toi_content['button'] : "Chi tiết"; ?></a>

                        </div>

                    </div>

                <?php endif; ?>

            </div>

            <div data-title="<?php echo $home_lich_su_phat_trien['title'] ?>" class="item home_lich_su_phat_trien">

                <?php if ($home_lich_su_phat_trien) : ?>

                    <img src="<?php echo $home_lich_su_phat_trien_background  ?>" alt="<?php echo $home_lich_su_phat_trien_content['title']; ?>">

                    <div class="container">

                        <div class="content">

                            <?php if ($home_lich_su_phat_trien_content['title']) : ?> <h3 class="title">
                                    <?php echo  $home_lich_su_phat_trien_content['title'] ?></h3> <?php endif; ?>

                            <?php if ($home_lich_su_phat_trien_content['description']) : ?><p class="desc size-text-16">
                                    <?php echo $home_lich_su_phat_trien_content['description']; ?></p> <?php endif; ?>

                            <a href="<?php echo $home_lich_su_phat_trien_content['link'] ?>" class="btn btn-warning btn-detail uppercase"><?php echo isset($home_lich_su_phat_trien_content['button']) ? $home_lich_su_phat_trien_content['button'] : "Chi tiết"; ?></a>

                        </div>

                    </div>

                <?php endif; ?>

            </div>

            <div data-title="<?php echo $home_tin_tuc_moi['title'] ?>" class="item home_tin_tuc_moi">
                <?php if ($home_tin_tuc_moi) : ?>
                    <img src="<?php echo $home_tin_tuc_moi_background  ?>" alt="<?php echo $home_tin_tuc_moi_content['title']; ?>">
                    <div class="container">
                        <div class="content">
                            <?php if ($home_tin_tuc_moi_post) : ?> <h3 class="title">
                                    <?php echo  get_the_title($home_tin_tuc_moi_post)   ?></h3> <?php endif; ?>
                            <?php if ($home_tin_tuc_moi_post) : ?> <p class="desc size-text-16">
                                    <?php echo  get_the_excerpt($home_tin_tuc_moi_post)   ?></p> <?php endif; ?>
                            <?php if ($home_tin_tuc_moi_post) : ?><a href="<?php echo get_the_permalink($home_tin_tuc_moi_post) ?>" class="btn btn-warning btn-detail uppercase"><?php echo ($home_tin_tuc_moi_button) ? $home_tin_tuc_moi_button : "Chi tiết"; ?></a><?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div data-title="<?php echo $home_tuyen_dung['title'] ?>" class="item home_tuyen_dung">
                <?php if ($home_tuyen_dung) : ?>
                    <img src="<?php echo $home_tuyen_dung_background  ?>" alt="<?php echo $home_tuyen_dung_content['title']; ?>">
                    <div class="container">
                        <div class="content">
                            <?php if ($home_tuyen_dung_title_content) : ?> <h3 class="title">
                                    <?php echo  _e($home_tuyen_dung_title_content)   ?></h3> <?php endif; ?>
                            <?php if ($home_tuyen_dung_desc_content) : ?> <p class="desc size-text-16">
                                    <?php echo _e($home_tuyen_dung_desc_content)   ?></p> <?php endif; ?>
                            <?php if ($home_tuyen_dung_button) : ?> <a href="<?php echo get_the_permalink($home_tuyen_dung_post) ?>" class="btn btn-warning btn-detail uppercase"><?php echo ($home_tuyen_dung_button) ? $home_tuyen_dung_button : "Chi tiết"; ?></a><?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <footer class="home-page">
        <div class="container">
            <div class="footer d-flex justify-content-between">
                <?php if ($home_footer['copyright']) : ?>
                    <div class="copy-right">
                        <span>©<?php echo $home_footer['copyright'] ?></span>
                    </div>
                <?php endif; ?>
                <?php if ($home_footer['page']) : ?>
                    <ul class="d-flex footer-links">
                        <?php foreach ($home_footer['page'] as $value) : ?>
                            <li class="link px-2"><a href="<?php echo  $value['link'] ?>"><?php echo  $value['text'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <div class="top-header home-header footer-mobile">
                <?php $header_top = get_field('header_top', 'option');
                if ($header_top) : ?>
                    <ul class="nav nav-left">
                        <?php foreach ($header_top['item'] as $value) : ?>
                            <li class="nav-item"><a href="<?php echo  $value['link'] ?>" class="nav-link"><?php echo  _e($value['title']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <ul class="nav d-flex nav-right">
                    <div class="d-flex">
                        <li class="nav-login">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle r="2.66667" transform="matrix(-1 0 0 1 7.99984 4.66667)" stroke="white" />
                                <path d="M3.33325 11.2898C3.33325 10.7162 3.69382 10.2046 4.23398 10.0117V10.0117C6.66928 9.14192 9.33056 9.14192 11.7659 10.0117V10.0117C12.306 10.2046 12.6666 10.7162 12.6666 11.2898V12.1668C12.6666 12.9584 11.9654 13.5665 11.1818 13.4546L10.9205 13.4172C8.98328 13.1405 7.01656 13.1405 5.07934 13.4172L4.81806 13.4546C4.03439 13.5665 3.33325 12.9584 3.33325 12.1668V11.2898Z" stroke="white" />
                            </svg>
                            <?php
                            global $current_user;
                            wp_get_current_user();
                            if (is_user_logged_in()) : ?>
                                <?php echo   $current_user->user_login; ?>
                                <ul class="is_login">
                                    <li class="logout">
                                        <svg fill="#fff" height="20px" width="20px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 384.971 384.971" xml:space="preserve">
                                            <g>
                                                <g id="Sign_Out">
                                                    <path d="M180.455,360.91H24.061V24.061h156.394c6.641,0,12.03-5.39,12.03-12.03s-5.39-12.03-12.03-12.03H12.03
			C5.39,0.001,0,5.39,0,12.031V372.94c0,6.641,5.39,12.03,12.03,12.03h168.424c6.641,0,12.03-5.39,12.03-12.03
			C192.485,366.299,187.095,360.91,180.455,360.91z" />
                                                    <path d="M381.481,184.088l-83.009-84.2c-4.704-4.752-12.319-4.74-17.011,0c-4.704,4.74-4.704,12.439,0,17.179l62.558,63.46H96.279
			c-6.641,0-12.03,5.438-12.03,12.151c0,6.713,5.39,12.151,12.03,12.151h247.74l-62.558,63.46c-4.704,4.752-4.704,12.439,0,17.179
			c4.704,4.752,12.319,4.752,17.011,0l82.997-84.2C386.113,196.588,386.161,188.756,381.481,184.088z" />
                                                </g>
                                            </g>
                                        </svg>
                                        <a href="<?php echo wp_logout_url('$index.php'); ?>"><?php _e('Đăng xuất') ?></a>
                                    </li>
                                </ul>
                            <?php else : ?>
                                <?php wp_loginout(); ?>
                            <?php endif; ?>
                        </li>
                        <?php if (is_user_logged_in()) {
                        } else {
                            echo '<span class="navigator" style="margin:0 6px; color: #d8d8d88c;">|</span>';
                        } ?>
                        <?php if (is_user_logged_in()) : ?>
                        <?php else : ?>
                            <li class="nav-signup">
                                <a class="nav-link" href="<?php echo site_url('/wp-login.php?action=register'); ?>"><?php _e(' Đăng ký') ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    </div>
                    <li class="nav-language">
                        <div class="languages d-flex">
                            <?php echo do_shortcode('[gtranslate]'); ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</div>
</main>
<?php wp_footer() ?>