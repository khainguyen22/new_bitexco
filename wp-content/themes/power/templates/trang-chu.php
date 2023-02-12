<?php

/**
Template Name: Trang chủ
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
$home_tin_tuc_moi_post = '';
if ($home_tin_tuc_moi) {
    $home_tin_tuc_moi_post = $home_tin_tuc_moi['post'];
    $home_tin_tuc_moi_button = $home_tin_tuc_moi['button'];
    $home_tin_tuc_moi_background = $home_tin_tuc_moi['background'];
}

$home_tuyen_dung = get_field('home_tuyen_dung', 'option');
$home_tuyen_dung_background = '';
$home_tuyen_dung_button = '';
$home_tuyen_dung_post = '';
if ($home_tuyen_dung) {
    $home_tuyen_dung_post = $home_tuyen_dung['post'];
    $home_tuyen_dung_button = $home_tuyen_dung['button'];
    $home_tuyen_dung_background = $home_tuyen_dung['background'];
}
$home_footer = get_field('home_footer', 'option');
print_r($home_san_xuat_kinh_doanh['file']);
print_r($home_san_xuat_kinh_doanh['home_file']);
//  Include thư viện PHPExcel_IOFactory vào
include 'Classes/PHPExcel/IOFactory.php';

$inputFileName = 'C:\xampp\htdocs\freelance-projects\bitexco\wp-content\themes\power\templates\file.xlsx';
$inputFileName = get_attached_file( get_field('home_file', 'option') );

// $inputFileName = 'https://power.dtts.com.vn/wp-content/uploads/2023/01/file-1.xlsx';

//  Tiến hành đọc file excel
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch (Exception $e) {
    die('Lỗi không thể đọc file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
}

//  Lấy thông tin cơ bản của file excel

// Lấy sheet hiện tại
$sheet = $objPHPExcel->getSheet(0);

// Lấy tổng số dòng của file, trong trường hợp này là 6 dòng
$highestRow = $sheet->getHighestRow();

// Lấy tổng số cột của file, trong trường hợp này là 4 dòng
$highestColumn = $sheet->getHighestColumn();

// Khai báo mảng $rowData chứa dữ liệu

//  Thực hiện việc lặp qua từng dòng của file, để lấy thông tin
for ($row = 1; $row <= $highestRow; $row++) {
    // Lấy dữ liệu từng dòng và đưa vào mảng $rowData
    $rowData[] = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
}

// //In dữ liệu của mảng
// echo "<pre>";
// // print_r($rowData);
// foreach ($rowData as $key => $value) {
//     echo "<pre>";
//     if (($key - 1) % 3 === 0) {
//         print_r($value[0]);
//     }
// }
// die;

echo "</pre>";
get_header();
?>

<div class="home">
    <section class="home-slide">
        <div class="home-slide-carousel">
            <div data-title="Sản xuất kinh doanh" class="item home_san_xuat_kinh_doanh">
                <?php if ($home_san_xuat_kinh_doanh) : ?>
                    <img src="<?php echo $home_san_xuat_kinh_doanh_background; ?>" alt="<?php echo $home_san_xuat_kinh_doanh_content['title']; ?>">
                    <div class="container">
                        <div class="content">
                            <?php if ($home_san_xuat_kinh_doanh_content['title']) : ?><h3 class="title"><?php echo $home_san_xuat_kinh_doanh_content['title']; ?></h3> <?php endif; ?>
                            <div class="d-flex desc-wrap">
                             
                                <?php foreach ($rowData as $key => $value) : ?>
                                    <?php if ($key === count($rowData) - 1) : ?>
                                        <div class="desc-left">
                                            <h3 class="title"><?php echo $value[0][0]; ?><span class="unit"><?php echo _e('Triệu kWh'); ?> </span></h3>
                                            <span class="description uppercase">
                                                <?php
                                                echo _e('Ngày');
                                                $day = date('d', $timestamp);
                                                echo $day;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="desc-left">
                                            <h3 class="title"><?php echo $value[0][1]; ?><span class="unit"><?php echo _e('Triệu kWh'); ?></span></h3>
                                            <span class="description uppercase">
                                                <?php
                                                echo _e('Tháng');
                                                $day = date('m', $timestamp);
                                                echo $day;
                                                ?>
                                            </span>
                                        </div>
                                        <div class="desc-left">
                                            <h3 class="title"><?php echo $value[0][2]; ?><span class="unit"><?php echo _e('Triệu kWh'); ?></span></h3>
                                            <span class="description uppercase">
                                                <?php
                                                echo _e('Năm');
                                                $day = date('Y', $timestamp);
                                                echo $day;
                                                ?>
                                            </span>
                                        </div>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </div>
                            <div id="excel_data"></div>
                            <?php if ($home_san_xuat_kinh_doanh_content['button']) : ?>
                                <a href="<?php echo $home_san_xuat_kinh_doanh_content['link'] ?>" class="btn btn-warning btn-detail uppercase"><?php echo isset($home_san_xuat_kinh_doanh_content['button']) ? $home_san_xuat_kinh_doanh_content['button'] : "Chi tiết"; ?></a>
                            <?php endif; ?>
                           
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div data-title="Dự án của chúng tôi" class="item home_du_an_cua_chung_toi">
                <?php if ($home_du_an_cua_chung_toi) : ?>
                    <img src="<?php echo $home_du_an_cua_chung_toi_background  ?>" alt="<?php echo $home_san_xuat_kinh_doanh_content['title']; ?>">
                    <div class="container">
                        <div class="content">
                            <?php if ($home_du_an_cua_chung_toi_content['title']) : ?>
                                <h3 class="title"><?php echo _e($home_du_an_cua_chung_toi_content['title']); ?></h3>
                            <?php endif; ?>
                            <div class="d-flex desc-wrap">
                                <div class="desc-left">
                                    <?php if ($home_du_an_cua_chung_toi_content['du_an_thuy_dien']) : ?>
                                        <h3 class="title"><?php echo _e($home_du_an_cua_chung_toi_content['du_an_thuy_dien']); ?></h3>
                                    <?php endif; ?>
                                    <span class="description uppercase"><?php echo _e('Dự án thủy điện'); ?></span>
                                </div>
                                <div class="desc-left">
                                    <h3 class="title"><?php echo isset($home_du_an_cua_chung_toi_content['du_an_dien_mat_troi']) ? $home_du_an_cua_chung_toi_content['du_an_dien_mat_troi'] : ""; ?></h3>
                                    <span class="description uppercase"><?php echo _e('Dự án điện mặt trời'); ?></span>
                                </div>
                                <div class="desc-left">
                                    <h3 class="title"><?php echo isset($home_du_an_cua_chung_toi_content['du_an_dien_gio']) ? $home_du_an_cua_chung_toi_content['du_an_dien_gio'] : ""; ?></h3>
                                    <span class="description uppercase"><?php echo _e('Dự án điện gió'); ?></span>
                                </div>
                            </div>
                            <a href="<?php echo $home_du_an_cua_chung_toi_content['link'] ?>" class="btn btn-warning btn-detail uppercase"><?php echo isset($home_du_an_cua_chung_toi_content['button']) ? $home_du_an_cua_chung_toi_content['button'] : "Chi tiết"; ?></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div data-title="Lịch sử phát triển" class="item home_lich_su_phat_trien">
                <?php if ($home_lich_su_phat_trien) : ?>
                    <img src="<?php echo $home_lich_su_phat_trien_background  ?>" alt="<?php echo $home_lich_su_phat_trien_content['title']; ?>">
                    <div class="container">
                        <div class="content">
                            <?php if ($home_lich_su_phat_trien_content['title']) : ?> <h3 class="title"><?php echo  $home_lich_su_phat_trien_content['title'] ?></h3> <?php endif; ?>
                            <?php if ($home_lich_su_phat_trien_content['description']) : ?><p class="desc size-text-16"><?php echo $home_lich_su_phat_trien_content['description']; ?></p> <?php endif; ?>
                            <a href="<?php echo $home_lich_su_phat_trien_content['link'] ?>" class="btn btn-warning btn-detail uppercase"><?php echo isset($home_lich_su_phat_trien_content['button']) ? $home_lich_su_phat_trien_content['button'] : "Chi tiết"; ?></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div data-title="Tin tức mới" class="item home_tin_tuc_moi">
                <?php if ($home_tin_tuc_moi) : ?>
                    <img src="<?php echo $home_tin_tuc_moi_background  ?>" alt="<?php echo $home_tin_tuc_moi_content['title']; ?>">
                    <div class="container">
                        <div class="content">
                            <?php if ($home_tin_tuc_moi_post) : ?> <h3 class="title"><?php echo  get_the_title($home_tin_tuc_moi_post)   ?></h3> <?php endif; ?>
                            <?php if ($home_tin_tuc_moi_post) : ?> <p class="desc size-text-16"><?php echo  get_the_excerpt($home_tin_tuc_moi_post)   ?></p> <?php endif; ?>
                            <?php if ($home_tin_tuc_moi_post) : ?><a href="<?php echo get_the_permalink($home_tin_tuc_moi_post) ?>" class="btn btn-warning btn-detail uppercase"><?php echo ($home_tin_tuc_moi_button) ? $home_tin_tuc_moi_button : "Chi tiết"; ?></a><?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div data-title="Tuyển dụng" class="item home_tuyen_dung">
                <?php if ($home_tuyen_dung) : ?>
                    <img src="<?php echo $home_tuyen_dung_background  ?>" alt="<?php echo $home_tuyen_dung_content['title']; ?>">
                    <div class="container">
                        <div class="content">
                            <?php if ($home_tuyen_dung_post) : ?> <h3 class="title"><?php echo  get_the_title($home_tuyen_dung_post)   ?></h3> <?php endif; ?>
                            <?php if ($home_tuyen_dung_post) : ?> <p class="desc size-text-16"><?php echo  get_field('excerpt', $home_tuyen_dung_post)   ?></p> <?php endif; ?>
                            <?php if ($home_tuyen_dung_post) : ?> <a href="<?php echo get_the_permalink($home_tuyen_dung_post) ?>" class="btn btn-warning btn-detail uppercase"><?php echo ($home_tuyen_dung_button) ? $home_tuyen_dung_button : "Chi tiết"; ?></a><?php endif; ?>
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
                            <a class="nav-link " aria-current="page" href="#">
                                <?php echo _e('đăng nhập'); ?>
                            </a>
                        </li>
                        <span class="navigator" style=" color: #d8d8d88c;">|</span>
                        <li class="nav-signup">
                            <a class="nav-link" href="#">
                                <?php echo _e('đăng ký'); ?>
                            </a>
                        </li>
                    </div>
                    <li class="nav-langue">
                        <div class="languages d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="#434449" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7.00012 11C7.00012 16.5228 8.79098 21 11.0001 21C13.2093 21 15.0001 16.5228 15.0001 11C15.0001 5.47715 13.2093 1 11.0001 1C8.79098 1 7.00012 5.47715 7.00012 11Z" stroke="#434449" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M1 11H21" stroke="#434449" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</div>
</main>
<?php wp_footer() ?>