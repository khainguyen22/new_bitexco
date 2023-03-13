<?php



/**

Template Name: Danh muc du an / ban do

 **/

//  $args = [

//     'post_type' => 'projects',

//     'posts_per_page' => -1,

// ];
// $query = new WP_Query($args);

// if ($query->have_posts()) : ? >

//     < ?php while ($query->have_posts()) : $query->the_post() ? >
//     < ?php echo get_term_by('id', get_field('company', get_the_ID()), 'project_company')->name? >
//     < ?php echo get_field('company', get_the_ID())? >
//     < ?php endwhile; ? >

// < ?php endif;


// die;

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";
$request_uri = "$_SERVER[REDIRECT_URL]";
$banner = get_field('banner_danh_muc_du_an', 'option');

$other_info = get_field('other_info_danh_muc_du_an', 'option');

$navigation = '';

if ($banner) {

    $navigation = $banner['navigation'];
}

$danh_muc_du_an_ban_do = get_field('danh_muc_du_an_ban_do', 'option');

get_header();

?>

<div class="danh-muc-du-an-ban-do">

    <section class="banner list" style='background-image:url("<?php echo $banner['background']; ?>")'>

        <div class="container">

            <div class="content">

                <?php if ($banner['title']) : ?><h3><?php echo  $banner['title']; ?></h3><?php endif; ?>

                <?php if ($banner['description']) : ?><p><?php echo  $banner['description']; ?></p><?php endif; ?>

            </div>

            <?php if ($navigation) : ?>

                <div class="navigation">

                    <ul>

                        <?php foreach ($navigation as $key => $value) : ?>

                            <li class="<?php echo strlen(strstr($value['link'], $request_uri)) > 0 ? 'active' : '' ?>"> <a href="<?php echo $value['link']; ?>"><?php echo _e($value['label']); ?></a></li>

                        <?php endforeach; ?>

                    </ul>

                </div>

            <?php endif; ?>

        </div>

    </section>

    <section class="projects">

        <div class="projects-content">

            <h3>

                <?php if ($danh_muc_du_an_ban_do['title']) : ?><h3 class="justify-content-center"><?php echo $danh_muc_du_an_ban_do['title']; ?></h3><?php endif; ?>

            </h3>

            <?php if ($danh_muc_du_an_ban_do['description']) : ?><p><?php echo $danh_muc_du_an_ban_do['description']; ?></p><?php endif; ?>

            <?php if ($danh_muc_du_an_ban_do['projects']) : ?>

                <div class="figures">

                    <?php foreach ($danh_muc_du_an_ban_do['projects'] as $value) : ?>

                        <div class="figure-column">

                            <?php if ($value['icon']) : ?> <img src="<?php echo $value['icon'] ?>" alt="<?php echo _e($value['label']) ?>"><?php endif; ?>

                            <div class="number-title">

                                <?php if ($value['number']) : ?> <h4><?php echo _e($value['number']) ?></h4><?php endif; ?>

                                <?php if ($value['label']) : ?> <p><?php echo _e($value['label']) ?></p><?php endif; ?>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>

        </div>

    </section>

    <section class="map-section">


        <div id="googleMap" style="width:100%; height:708px;"></div>

        <div class="popup-data">

            <div class="map-btn">
                <svg width="45" height="33" viewBox="0 0 45 33" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <g filter="url(#filter0_b_15017_51387)">

                        <rect width="45" height="33" rx="2" fill="white" />

                        <path d="M13 22.5H31" stroke="#007D8F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />

                        <path d="M13 16.5H31" stroke="#007D8F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />

                        <path d="M13 10.5H31" stroke="#007D8F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />

                    </g>

                    <defs>

                        <filter id="filter0_b_15017_51387" x="-20" y="-20" width="85" height="73" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">

                            <feFlood flood-opacity="0" result="BackgroundImageFix" />

                            <feGaussianBlur in="BackgroundImageFix" stdDeviation="10" />

                            <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_15017_51387" />

                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_15017_51387" result="shape" />

                        </filter>

                    </defs>

                </svg>
            </div>
            <div class="popup-modal">
                <div class="head d-flex justify-content-between">
                    <h6><?php _e('Danh sách dự án năng lượng') ?></h6>
                    <div class="icon-close">
                        <svg width="12" height="11" viewBox="0 0 12 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.33354 10.166L10.6665 0.833008" stroke="#007D8F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1.33354 0.833054L10.6665 10.166" stroke="#007D8F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </div>
                </div>
                <div class="content">
                    <?php $danh_muc_du_an_ban_do_energy_project_list = $danh_muc_du_an_ban_do['energy_project_list'];
                    foreach ($danh_muc_du_an_ban_do_energy_project_list as $key => $value) :
                    ?>
                        <div class="item">
                            <div class="headding d-flex">
                                <span class="icon">
                                    <img src="<?php _e($value['icon']) ?>" alt="<?php _e($value['title']) ?>">
                                </span>
                                <?php if ($value['title']) : ?> <p class="title"><?php _e($value['title']) ?></p><?php endif; ?>
                                <span class="dropdown-icon">
                                    <svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 7L8.78095 1.66938C8.33156 1.2842 7.66844 1.2842 7.21905 1.66938L1 7" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="info">
                                <ul>
                                    <?php foreach ($value['project'] as $key_project => $value_project) : ?>
                                        <?php if ($value_project['name']) : ?> <li><a href="<?php _e($value_project['link']) ?>"><?php _e($value_project['name']) ?></a></li><?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                                <?php foreach ($value['project'] as $key_project => $value_project) : ?>
                                    <?php if ($key_project = 3) : ?>
                                        <div class="other_project">
                                            <span class="icon">
                                                <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5.86671 7.63399L7.54485 9.44122C7.8086 9.72526 8.25815 9.72526 8.5219 9.44122L10.2 7.63399M1.33337 8.50065C1.33337 12.1825 4.31814 15.1673 8.00004 15.1673C11.6819 15.1673 14.6667 12.1825 14.6667 8.50065C14.6667 4.81875 11.6819 1.83398 8.00004 1.83398C4.31814 1.83398 1.33337 4.81875 1.33337 8.50065Z" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round" />
                                                </svg>
                                            </span>
                                            <span class="title">
                                                <?php _e('Xem thêm dự án') ?>
                                            </span>
                                        </div>
                                    <?php
                                        break;
                                    endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="wrap_map-luoi-dien">
        <div class="container">
            <div class="title">
                <h3><?php _e('Bản đồ lưới điện') ?></h3>
            </div>
            <div class="map-luoi-dien">
                <div class="goto-container">
                    <div class="goto default"><span class="icon"><span class=""></span></span><span> <?php _e('Bản đồ'); ?></span></div>
                    <div class="goto default"><span class="icon"><span class=""></span></span><span><?php _e('Biển đảo'); ?></span></div>
                    <div class="wrap-line">
                        <div class="goto"><span class="icon"><span class=" line line-500"></span></span> <span><?php _e(' Đường dây 500kV'); ?>
                            </span></div>
                        <div class="goto"><span class="icon"><span class=" line line-220"></span></span> <span><?php _e(' Đường dây 220kV'); ?>
                            </span></div>
                        <div class="goto"><span class="icon"><span class=" line line-110"></span></span> <span><?php _e(' Đường dây 110kV'); ?>
                            </span></div>
                        </span>
                    </div>
                    <div class="wrap-box">
                        <div class="goto"><span class="icon"><span class=" box box-500"></span></span> <span> <?php _e('Trạm biến áp 500kV'); ?>
                            </span></div>
                        <div class="goto"><span class="icon"><span class=" box box-220"></span></span> <span> <?php _e('Trạm biến áp 220kV'); ?>
                            </span></div>
                        <div class="goto"><span class="icon"><span class=" box box-110"></span></span> <span> <?php _e('Trạm biến áp 110kV'); ?>
                            </span></div>
                        <div class="goto"><span class="icon">
                                <svg width="22" height="30" viewBox="0 0 22 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.4002 0.348559C11.3102 0.219894 11.1603 0.142822 11 0.142822C10.8397 0.142822 10.6897 0.219894 10.5998 0.348559C10.1961 0.925782 0.714294 14.5451 0.714294 19.8794C0.714294 25.381 5.3284 29.8571 11 29.8571C16.6716 29.8571 21.2857 25.381 21.2857 19.8794C21.2857 14.5452 11.8039 0.925782 11.4002 0.348559Z" fill="#5B8FF9" />
                                    <path d="M13.6118 25.8848C7.94015 25.8848 3.32605 21.4088 3.32605 15.9071C3.32605 12.4337 7.34625 5.44766 10.2626 0.83667C8.50289 3.40475 0.714294 15.0449 0.714294 19.8794C0.714294 25.3811 5.3284 29.8571 11 29.8571C15.512 29.8571 19.3546 27.0241 20.7373 23.0956C18.8874 24.8218 16.3752 25.8848 13.6118 25.8848Z" fill="#1F61E8" />
                                    <g clip-path="url(#clip0_14918_72)">
                                        <path d="M9.92907 21.3516C10.0702 21.4057 10.2311 21.3531 10.3091 21.2261L13.8561 15.4121C13.9135 15.318 13.9139 15.2011 13.8569 15.1071C13.7998 15.0128 13.6944 14.9561 13.5818 14.9591L11.1069 15.0248L11.9274 11.457C11.9605 11.3128 11.8812 11.167 11.7398 11.1124C11.5994 11.0582 11.4375 11.1111 11.3598 11.2379L7.81276 17.0519C7.75532 17.146 7.75499 17.2629 7.812 17.3569C7.86903 17.4512 7.97452 17.5079 8.08708 17.5049L10.562 17.4392L9.74147 21.007C9.70838 21.1512 9.78768 21.297 9.92907 21.3516Z" fill="white" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_14918_72">
                                            <rect width="10.5516" height="10.2361" fill="white" transform="matrix(0.999648 -0.0265312 0.0281931 0.999602 5.41632 11.2559)" />
                                        </clipPath>
                                    </defs>
                                </svg>

                            </span>
                            <span> <?php _e('Nhà máy thuỷ điện'); ?></span>
                        </div>
                        <div class="goto"><span class="icon"> <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.5002 19.0002H14.5002V23.5003H17.5002V19.0002Z" fill="#039855" />
                                    <path d="M17.5002 23.5H15.5002V21.5C15.5002 20.9477 15.9479 20.5 16.5002 20.5H17.5002V23.5Z" fill="#12B76A" />
                                    <path d="M20.0002 25.5002H12.0001C11.724 25.5002 11.5001 25.2764 11.5001 25.0002V24.0002C11.5001 23.7241 11.724 23.5002 12.0001 23.5002H20.0002C20.2763 23.5002 20.5002 23.7241 20.5002 24.0002V25.0002C20.5002 25.2764 20.2764 25.5002 20.0002 25.5002Z" fill="#12B76A" />
                                    <path d="M31.9724 17.1715L29.4724 2.17137C29.3118 1.20312 28.4822 0.5 27.4998 0.5H4.50005C3.51862 0.5 2.68899 1.20262 2.52737 2.17137L0.0273718 17.1715C-0.0693155 17.7525 0.0933092 18.3433 0.474121 18.793C0.854995 19.2423 1.41112 19.5001 1.99999 19.5001H29.9997C30.5891 19.5001 31.1457 19.2423 31.5261 18.7926C31.907 18.3429 32.0696 17.7521 31.9724 17.1715Z" fill="#D1FADF" />
                                    <path d="M2.57654 10.5H7.67316C7.96591 10.5 8.19604 10.7504 8.17141 11.0421L7.96004 13.5421C7.93816 13.801 7.7216 14 7.46179 14H2.15985C1.85085 14 1.61585 13.7226 1.66666 13.4178L2.08335 10.9178C2.12354 10.6768 2.33216 10.5 2.57654 10.5Z" fill="#80B55C" />
                                    <path d="M3.32654 6H8.05366C8.34641 6 8.57654 6.25038 8.55191 6.54213L8.34054 9.04213C8.31866 9.301 8.1021 9.5 7.84229 9.5H2.90985C2.60085 9.5 2.36585 9.22256 2.41666 8.91781L2.83335 6.41781C2.87354 6.17675 3.08216 6 3.32654 6Z" fill="#80B55C" />
                                    <path d="M29.09 9.5H24.1579C23.898 9.5 23.6815 9.301 23.6596 9.04213L23.4483 6.54213C23.4236 6.25044 23.6537 6 23.9465 6H28.6733C28.9178 6 29.1264 6.17669 29.1665 6.41781L29.5832 8.91781C29.634 9.22256 29.399 9.5 29.09 9.5Z" fill="#80B55C" />
                                    <path d="M22.1511 9.5H17.0001C16.724 9.5 16.5001 9.27612 16.5001 9V6.5C16.5001 6.22387 16.724 6 17.0001 6H21.9397C22.1996 6 22.4161 6.199 22.438 6.45788L22.6493 8.95788C22.674 9.24962 22.4438 9.5 22.1511 9.5Z" fill="#80B55C" />
                                    <path d="M16.5002 4.5V2C16.5002 1.72388 16.7241 1.5 17.0002 1.5H21.5594C21.8192 1.5 22.0357 1.699 22.0577 1.95787L22.269 4.45788C22.2937 4.74956 22.0636 5 21.7707 5H17.0002C16.7241 5 16.5002 4.77619 16.5002 4.5Z" fill="#80B55C" />
                                    <path d="M15.0001 5H10.2295C9.93674 5 9.70661 4.74963 9.73124 4.45788L9.94261 1.95787C9.96449 1.699 10.1811 1.5 10.4409 1.5H15.0001C15.2762 1.5 15.5001 1.72388 15.5001 2V4.5C15.5001 4.77619 15.2763 5 15.0001 5Z" fill="#80B55C" />
                                    <path d="M15.5001 6.5V9C15.5001 9.27612 15.2762 9.5 15.0001 9.5H9.849C9.55625 9.5 9.32612 9.24956 9.35075 8.95788L9.56212 6.45788C9.584 6.199 9.80056 6 10.0604 6H15.0001C15.2763 6 15.5001 6.22387 15.5001 6.5Z" fill="#80B55C" />
                                    <path d="M9.67988 10.5H15.0001C15.2763 10.5 15.5001 10.7239 15.5001 11V13.5C15.5001 13.7761 15.2763 14 15.0001 14H9.4685C9.17575 14 8.94563 13.7496 8.97025 13.4579L9.18163 10.9579C9.20357 10.699 9.42007 10.5 9.67988 10.5Z" fill="#80B55C" />
                                    <path d="M15.5001 15.5V18C15.5001 18.2761 15.2763 18.5 15.0001 18.5H9.08801C8.79526 18.5 8.56513 18.2496 8.58976 17.9579L8.80113 15.4579C8.82301 15.199 9.03957 15 9.29938 15H15.0001C15.2763 15 15.5001 15.2239 15.5001 15.5Z" fill="#80B55C" />
                                    <path d="M17.0002 15H22.7006C22.9604 15 23.1769 15.199 23.1988 15.4579L23.4101 17.9579C23.4348 18.2496 23.2047 18.5 22.9119 18.5H17.0002C16.7241 18.5 16.5002 18.2761 16.5002 18V15.5C16.5002 15.2239 16.7241 15 17.0002 15Z" fill="#80B55C" />
                                    <path d="M16.5002 13.5V11C16.5002 10.7239 16.7241 10.5 17.0002 10.5H22.3202C22.58 10.5 22.7965 10.699 22.8184 10.9579L23.0297 13.4579C23.0544 13.7496 22.8243 14 22.5315 14H17.0002C16.7241 14 16.5002 13.7762 16.5002 13.5Z" fill="#80B55C" />
                                    <path d="M24.3269 10.5H29.4233C29.6677 10.5 29.8763 10.6767 29.9165 10.9178L30.3331 13.4178C30.3839 13.7226 30.1488 14 29.8399 14H24.5381C24.2783 14 24.0618 13.801 24.0399 13.5421L23.8286 11.0421C23.804 10.7504 24.0341 10.5 24.3269 10.5Z" fill="#80B55C" />
                                    <path d="M28.4165 1.91781L28.8332 4.41781C28.884 4.72256 28.6489 5 28.34 5H23.7775C23.5177 5 23.3012 4.801 23.2792 4.54212L23.0679 2.04212C23.0432 1.75044 23.2734 1.5 23.5662 1.5H27.9234C28.1677 1.5 28.3763 1.67675 28.4165 1.91781Z" fill="#80B55C" />
                                    <path d="M3.58341 1.91781C3.6236 1.67669 3.83216 1.5 4.0766 1.5H8.43422C8.72697 1.5 8.9571 1.75037 8.93247 2.04212L8.7211 4.54212C8.69922 4.801 8.48266 5 8.22285 5H3.65991C3.35091 5 3.11591 4.72256 3.16672 4.41781L3.58341 1.91781Z" fill="#80B55C" />
                                    <path d="M1.23733 18.1467C1.04689 17.9216 0.965332 17.6262 1.01371 17.3357L1.33333 15.4181C1.37352 15.1769 1.58208 15.0002 1.82652 15.0002H7.29264C7.58539 15.0002 7.81552 15.2507 7.79089 15.5424L7.57952 18.0424C7.55765 18.3012 7.34108 18.5002 7.08127 18.5002H2.00002C1.70564 18.5002 1.42777 18.3714 1.23733 18.1467Z" fill="#80B55C" />
                                    <path d="M30.763 18.1462C30.5726 18.3714 30.2948 18.5002 29.9998 18.5002H24.9186C24.6588 18.5002 24.4423 18.3012 24.4203 18.0424L24.209 15.5424C24.1843 15.2507 24.4145 15.0002 24.7073 15.0002H30.1733C30.4177 15.0002 30.6263 15.1769 30.6665 15.4181L30.9862 17.3362C31.0345 17.6262 30.9534 17.9217 30.763 18.1462Z" fill="#80B55C" />
                                    <path d="M14.0001 25.0002V24.0002C14.0001 23.7241 14.224 23.5002 14.5001 23.5002H12.0001C11.724 23.5002 11.5001 23.7241 11.5001 24.0002V25.0002C11.5001 25.2764 11.724 25.5002 12.0001 25.5002H14.5001C14.224 25.5002 14.0001 25.2764 14.0001 25.0002Z" fill="#039855" />
                                </svg>
                            </span>
                            <span><?php _e('Nhà máy điện mặt trời'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="wrap_step">
                    <div class="panzoom-controls">
                        <div class="panzoom-control">
                            <button id="bt-zoom-in" class="rounded-top" title="Zoom in">

                                <svg xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://web.resource.org/cc/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sodipodi="http://inkscape.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg" xmlns:ns1="http://sozi.baierouge.fr" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg1468" sodipodi:docname="mag3.svg" viewBox="0 0 187.5 187.5" sodipodi:version="0.32" version="1.0" y="0" x="0" inkscape:version="0.42" sodipodi:docbase="C:\Documents and Settings\Jarno\Omat tiedostot\vanhasta\opencliparts\omat\symbols">
                                    <g id="layer1">
                                        <g id="g2530" transform="translate(-278.89 -680.61)">
                                            <rect id="rect2488" style="stroke-linejoin:round;stroke:#000000;stroke-linecap:round;stroke-width:3.3857;fill:#ffffff" rx="3.7611" ry="3.7611" transform="rotate(24.33)" width="15.044" y="555.72" x="642.53" height="58.673" />
                                            <path id="path2490" style="stroke-linejoin:round;stroke:#000000;stroke-linecap:round;stroke-width:4.501;fill:#ffffff" transform="matrix(.75221 0 0 .75221 30.84 292.89)" d="m502 603.36a41 41 0 1 1 -82 0 41 41 0 1 1 82 0z" />
                                            <path id="path2492" style="fill-rule:evenodd;fill:#000000" d="m355.31 739.82s2-11.03 12.53-15.54 22.72 0.83 22.72 0.83-12.69 1.5-20.22 4.51c-7.52 3.01-15.03 8.7-15.03 10.2z" />
                                            <path id="path2474" style="fill:#000000" d="m375.06 758.83v-9.42h-9.35v-3.94h9.35v-9.35h3.98v9.35h9.36v3.94h-9.36v9.42h-3.98" />
                                        </g>
                                    </g>
                                </svg>
                            </button>
                            <button id="bt-reset" class="rounded-0" title="Clear">
                                <svg xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://web.resource.org/cc/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sodipodi="http://inkscape.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg" xmlns:ns1="http://sozi.baierouge.fr" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg1468" sodipodi:docname="mag4.svg" viewBox="0 0 187.5 187.5" sodipodi:version="0.32" version="1.0" y="0" x="0" inkscape:version="0.42" sodipodi:docbase="C:\Documents and Settings\Jarno\Omat tiedostot\vanhasta\opencliparts\omat\symbols">
                                    <g id="layer1">
                                        <g id="g2536" transform="translate(-418.89 -680.06)">
                                            <rect id="rect2496" style="stroke-linejoin:round;stroke:#000000;stroke-linecap:round;stroke-width:3.3857;fill:#ffffff" rx="3.7611" ry="3.7611" transform="rotate(24.33)" width="15.044" y="498.04" x="770.09" height="58.673" />
                                            <path id="path2498" style="stroke-linejoin:round;stroke:#000000;stroke-linecap:round;stroke-width:4.501;fill:#ffffff" transform="matrix(.75221 0 0 .75221 170.84 292.89)" d="m502 603.36a41 41 0 1 1 -82 0 41 41 0 1 1 82 0z" />
                                            <path id="path2500" style="fill-rule:evenodd;fill:#000000" d="m495.31 739.82s2-11.03 12.53-15.54 22.72 0.83 22.72 0.83-12.69 1.5-20.22 4.51c-7.52 3.01-15.03 8.7-15.03 10.2z" />
                                            <path id="text2502" style="fill:#000000" d="m509.56 757.66h-2.46v-15.69c-0.6 0.57-1.38 1.13-2.34 1.7-0.96 0.56-1.82 0.99-2.59 1.27v-2.38c1.38-0.65 2.58-1.43 3.61-2.35s1.76-1.81 2.19-2.68h1.59v20.13" />
                                            <path id="path2511" style="fill:#000000" d="m515.24 743.94v-2.8h2.8v2.8h-2.8" />
                                            <path id="path2509" style="fill:#000000" d="m515.24 755.66v-2.81h2.8v2.81h-2.8" />
                                            <path id="path2507" style="fill:#000000" d="m528.91 757.66h-2.46v-15.69c-0.59 0.57-1.37 1.13-2.34 1.7-0.96 0.56-1.82 0.99-2.58 1.27v-2.38c1.37-0.65 2.58-1.43 3.61-2.35s1.75-1.81 2.18-2.68h1.59v20.13" />
                                        </g>
                                    </g>
                                </svg>
                            </button>
                            <button id="bt-zoom-out" class="rounded-bottom" title="Zoom out">
                                <svg xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://web.resource.org/cc/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sodipodi="http://inkscape.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg" xmlns:ns1="http://sozi.baierouge.fr" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg1468" sodipodi:docname="mag2.svg" viewBox="0 0 187.5 187.5" sodipodi:version="0.32" version="1.0" y="0" x="0" inkscape:version="0.42" sodipodi:docbase="C:\Documents and Settings\Jarno\Omat tiedostot\vanhasta\opencliparts\omat\symbols">
                                    <g id="layer1">
                                        <g id="g2549" transform="translate(-138.89 -679.52)">
                                            <rect id="rect2480" style="stroke-linejoin:round;stroke:#000000;stroke-linecap:round;stroke-width:3.3857;fill:#ffffff" rx="3.7611" ry="3.7611" transform="rotate(24.33)" width="15.044" y="613.4" x="514.96" height="58.673" />
                                            <path id="path2482" style="stroke-linejoin:round;stroke:#000000;stroke-linecap:round;stroke-width:4.501;fill:#ffffff" transform="matrix(.75221 0 0 .75221 -109.16 292.89)" d="m502 603.36a41 41 0 1 1 -82 0 41 41 0 1 1 82 0z" />
                                            <path id="path2484" style="fill-rule:evenodd;fill:#000000" d="m215.31 739.82s2-11.03 12.53-15.54 22.72 0.83 22.72 0.83-12.69 1.5-20.22 4.51c-7.52 3.01-15.03 8.7-15.03 10.2z" />
                                            <path id="text2467" style="fill:#000000" d="m227.77 751.58v-4.24h18.97v4.24h-18.97" />
                                        </g>
                                    </g>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="panzoom" panzoom-scale="1">
                        <div class="step-container">
                            <div class="step default " style="transform: none;"><img src="http://power-test.bitexcopower.com.vn/wp-content/uploads/2023/03/ban-do.png" alt="ban-do"></div>
                            <div class="step default " style="transform: none;"><img src="http://power-test.bitexcopower.com.vn/wp-content/uploads/2023/03/dao.png" alt="dao"></div>
                            <div class="step" style="transform: none;"><img src="http://power-test.bitexcopower.com.vn/wp-content/uploads/2023/03/duong-day-500.png" alt="duong-day-500"></div>
                            <div class="step" style="transform: none;"><img src="http://power-test.bitexcopower.com.vn/wp-content/uploads/2023/03/duong-day-220.png" alt="duong-day-220"></div>
                            <div class="step" style="transform: none;"><img src="http://power-test.bitexcopower.com.vn/wp-content/uploads/2023/03/duong-day-110.png" alt="duong-day-110"></div>
                            <div class="step" style="transform: none;"><img src="http://power-test.bitexcopower.com.vn/wp-content/uploads/2023/03/tba-500.png" alt="TBA-500"></div>
                            <div class="step" style="transform: none;"><img src="http://power-test.bitexcopower.com.vn/wp-content/uploads/2023/03/tba-220.png" alt="TBA220"></div>
                            <div class="step" style="transform: none;"><img src="http://power-test.bitexcopower.com.vn/wp-content/uploads/2023/03/tba-110.png" alt="tba-110"></div>
                            <div class="step" style="transform: none;"><img src="http://power-test.bitexcopower.com.vn/wp-content/uploads/2023/03/nha-may-thuy-dien.png" alt="nha-may-dien"></div>
                            <div class="step" style="transform: none;"><img src="http://power-test.bitexcopower.com.vn/wp-content/uploads/2023/03/nha-may-dien-mat-troi.png" alt="nha-may-dien"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php if ($other_info) : ?>

        <section class="other-information">

            <div class="other-container">

                <div class="other-content hover-zoom">

                    <?php foreach ($other_info as $value) : ?>

                        <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>

                    <?php endforeach; ?>


                </div>

            </div>

        </section>

    <?php endif; ?>
    <script type="text/javascript" src="https://cdn.rawgit.com/YuriGor/jquery.panzoom/ignoreChildrensEvents/dist/jquery.panzoom.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.map-btn').on('click', function() {
                $(this).closest('.popup-data').addClass('active');
                $(this).closest('.popup-data').find('.popup-modal').addClass('active');
            });
            $('.icon-close').on('click', function() {
                $('.popup-data').removeClass('active');
                $('.item ').removeClass('active');
                $('.popup-data .popup-modal').removeClass('active');
            });

            $('.item .headding').on('click', function() {
                $('.item, .info').removeClass('active other_info');
                $(this).closest('.item').addClass('active');
            }).filter('.acitve').on('click', function() {
                $(this).closest('.item').removeClass('active');
            });
            $('.other_project').on('click', function(e) {
                $('.info').removeClass('other_info');
                $(this).closest('.info').addClass('other_info');
            });

            // closed popup when you click outside 
            const $myElement = $('.popup-data');
            $(document).on('click', (event) => {
                if (!$myElement.is(event.target) && !$myElement.has(event.target).length) {
                    $('.popup-data').removeClass('active');
                    $myElement.find('.active').removeClass('active');
                }
            });
        });

        function myMap() {

            var styledMapType = new google.maps.StyledMapType([{}]);

            var mapProp = {

                center: new google.maps.LatLng(17.08609183914221, 106.85480302417643),

                zoom: 6,

                mapTypeId: google.maps.MapTypeId.HYBRID,

                mapTypeControl: true,

                scaleControl: true,

                streetViewControl: true,

                rotateControl: true,

                fullscreenControl: true,

                label: true,

            };

            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

            var transitLayer = new google.maps.TransitLayer();

            transitLayer.setMap(map);

            <?php
            $args = [
                'post_type' => 'projects',
                'posts_per_page' => -1,
            ];

            $query = new WP_Query($args);
            ?>

            var infowindow = new google.maps.InfoWindow();

            var marker, i = 0;

            var markerImage = '';

            <?php if ($query->have_posts()) : ?>
                <?php while ($query->have_posts()) : $query->the_post() ?>
                    markerImage = 'https://power.dtts.com.vn/wp-content/uploads/2023/02/Frame-427319445-1.png';
                    var locationInfo = '';
                    locationInfo += '<div class="iw-content-box">';
                    locationInfo += '<div class="iw-content">';
                    locationInfo += '<div class="title d-flex">';
                    locationInfo += '<div class="droplets">'
                    locationInfo += '<svg width="45" height="45" viewBox="0 0 45 45" fill="none" xmlns="http://www.w3.org/2000/svg"><g filter="url(#filter0_d_14816_50716)"><rect x="10.3335" y="5.5" width="24" height="24" rx="12" fill="white"/><g clip-path="url(#clip0_14816_50716)"><path d="M22.5168 10.7847C22.4756 10.7258 22.4069 10.6904 22.3334 10.6904C22.2599 10.6904 22.1912 10.7258 22.15 10.7847C21.965 11.0493 17.6191 17.2915 17.6191 19.7363C17.6191 22.2579 19.7339 24.3095 22.3334 24.3095C24.9329 24.3095 27.0477 22.2579 27.0477 19.7363C27.0477 17.2915 22.7019 11.0493 22.5168 10.7847Z" fill="#5B8FF9"/><path d="M23.5305 22.4892C20.931 22.4892 18.8162 20.4377 18.8162 17.9161C18.8162 16.3241 20.6588 13.1222 21.9955 11.0088C21.1889 12.1858 17.6191 17.5209 17.6191 19.7367C17.6191 22.2583 19.7339 24.3098 22.3334 24.3098C24.4014 24.3098 26.1626 23.0114 26.7964 21.2108C25.9485 22.002 24.7971 22.4892 23.5305 22.4892Z" fill="#1F61E8"/><g clip-path="url(#clip1_14816_50716)"><path d="M21.8429 20.4115C21.9076 20.4363 21.9814 20.4122 22.0171 20.354L23.6428 17.6893C23.6691 17.6461 23.6693 17.5926 23.6432 17.5495C23.617 17.5063 23.5687 17.4803 23.5171 17.4817L22.3828 17.5118L22.7588 15.8765C22.774 15.8104 22.7376 15.7436 22.6728 15.7186C22.6085 15.6937 22.5343 15.718 22.4987 15.7761L20.8729 18.4409C20.8466 18.484 20.8465 18.5376 20.8726 18.5806C20.8987 18.6239 20.9471 18.6498 20.9987 18.6485L22.133 18.6184L21.7569 20.2536C21.7418 20.3197 21.7781 20.3865 21.8429 20.4115V20.4115Z" fill="white"/></g></g></g><defs><filter id="filter0_d_14816_50716" x="0.333496" y="0.5" width="44" height="44" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/><feMorphology radius="10" operator="erode" in="SourceAlpha" result="effect1_dropShadow_14816_50716"/><feOffset dy="5"/><feGaussianBlur stdDeviation="10"/><feColorMatrix type="matrix" values="0 0 0 0 0.166667 0 0 0 0 0.093107 0 0 0 0 0.03125 0 0 0 0.15 0"/><feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_14816_50716"/><feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_14816_50716" result="shape"/></filter><clipPath id="clip0_14816_50716"><rect width="14.6667" height="14.6667" fill="white" transform="translate(15 10.167)"/></clipPath><clipPath id="clip1_14816_50716"><rect width="4.83613" height="4.69154" fill="white" transform="matrix(0.999648 -0.0265312 0.0281931 0.999602 19.7744 15.7842)"/></clipPath></defs></svg>';
                    locationInfo += '</div>'
                    locationInfo += '<h6><?php echo the_title() ?></h6>'
                    locationInfo += '</div>';
                    locationInfo += '<div class="d-flex location-info-row">';
                    locationInfo += '<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_14816_50731)"><path d="M19.0835 6.87507H17.2085V3.75007C17.2114 3.60386 17.163 3.46124 17.0717 3.34704C16.9803 3.23284 16.8518 3.15429 16.7085 3.12507L4.2085 0.625072C4.11771 0.607182 4.02407 0.609676 3.93436 0.632374C3.84465 0.655072 3.7611 0.697407 3.68975 0.756322C3.6164 0.815806 3.55749 0.891135 3.51744 0.976652C3.47739 1.06217 3.45724 1.15565 3.4585 1.25007V6.87507H1.5835C1.41774 6.87507 1.25876 6.94092 1.14155 7.05813C1.02434 7.17534 0.958496 7.33431 0.958496 7.50007V18.7501C0.958496 18.9158 1.02434 19.0748 1.14155 19.192C1.25876 19.3092 1.41774 19.3751 1.5835 19.3751H19.0835C19.2493 19.3751 19.4082 19.3092 19.5254 19.192C19.6426 19.0748 19.7085 18.9158 19.7085 18.7501V7.50007C19.7085 7.33431 19.6426 7.17534 19.5254 7.05813C19.4082 6.94092 19.2493 6.87507 19.0835 6.87507ZM2.2085 8.12507H3.4585V18.1251H2.2085V8.12507ZM4.7085 7.50007V2.01257L15.9585 4.26257V18.1251H12.8335V14.3751C12.8335 14.2093 12.7676 14.0503 12.6504 13.9331C12.5332 13.8159 12.3743 13.7501 12.2085 13.7501H8.4585C8.29274 13.7501 8.13376 13.8159 8.01655 13.9331C7.89934 14.0503 7.8335 14.2093 7.8335 14.3751V18.1251H4.7085V7.50007ZM9.0835 18.1251V15.0001H11.5835V18.1251H9.0835ZM18.4585 18.1251H17.2085V8.12507H18.4585V18.1251Z" fill="#7E8189"/><path d="M6.896 8.125H9.396C9.56176 8.125 9.72073 8.05915 9.83794 7.94194C9.95515 7.82473 10.021 7.66576 10.021 7.5V5C10.021 4.83424 9.95515 4.67527 9.83794 4.55806C9.72073 4.44085 9.56176 4.375 9.396 4.375H6.896C6.73024 4.375 6.57126 4.44085 6.45405 4.55806C6.33684 4.67527 6.271 4.83424 6.271 5V7.5C6.271 7.66576 6.33684 7.82473 6.45405 7.94194C6.57126 8.05915 6.73024 8.125 6.896 8.125ZM7.521 5.625H8.771V6.875H7.521V5.625Z" fill="#7E8189"/><path d="M9.396 12.5C9.56176 12.5 9.72073 12.4342 9.83794 12.3169C9.95515 12.1997 10.021 12.0408 10.021 11.875V9.375C10.021 9.20924 9.95515 9.05027 9.83794 8.93306C9.72073 8.81585 9.56176 8.75 9.396 8.75H6.896C6.73024 8.75 6.57126 8.81585 6.45405 8.93306C6.33684 9.05027 6.271 9.20924 6.271 9.375V11.875C6.271 12.0408 6.33684 12.1997 6.45405 12.3169C6.57126 12.4342 6.73024 12.5 6.896 12.5H9.396ZM7.521 10H8.771V11.25H7.521V10Z" fill="#7E8189"/><path d="M11.271 8.125H13.771C13.9368 8.125 14.0957 8.05915 14.2129 7.94194C14.3301 7.82473 14.396 7.66576 14.396 7.5V5C14.396 4.83424 14.3301 4.67527 14.2129 4.55806C14.0957 4.44085 13.9368 4.375 13.771 4.375H11.271C11.1052 4.375 10.9463 4.44085 10.8291 4.55806C10.7118 4.67527 10.646 4.83424 10.646 5V7.5C10.646 7.66576 10.7118 7.82473 10.8291 7.94194C10.9463 8.05915 11.1052 8.125 11.271 8.125ZM11.896 5.625H13.146V6.875H11.896V5.625Z" fill="#7E8189"/><path d="M11.271 12.5H13.771C13.9368 12.5 14.0957 12.4342 14.2129 12.3169C14.3301 12.1997 14.396 12.0408 14.396 11.875V9.375C14.396 9.20924 14.3301 9.05027 14.2129 8.93306C14.0957 8.81585 13.9368 8.75 13.771 8.75H11.271C11.1052 8.75 10.9463 8.81585 10.8291 8.93306C10.7118 9.05027 10.646 9.20924 10.646 9.375V11.875C10.646 12.0408 10.7118 12.1997 10.8291 12.3169C10.9463 12.4342 11.1052 12.5 11.271 12.5ZM11.896 10H13.146V11.25H11.896V10Z" fill="#7E8189"/></g><defs><clipPath id="clip0_14816_50731"><rect width="20" height="20" fill="white" transform="translate(0.333496)"/></clipPath></defs></svg>';
                    locationInfo += '<p><strong>Công ty: </strong><?php echo get_term_by('id', get_field('company', get_the_ID()), 'project_company')->name ?></p>';
                    locationInfo += '</div>';
                    locationInfo += '<div class="d-flex location-info-row">';
                    locationInfo += '<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_14816_50741)"><path d="M10.7016 4.00326L6.1119 10.1036C5.45796 10.9728 6.07905 12.217 7.16686 12.217H9.10382L8.30675 15.1529C8.02222 16.2009 9.39472 16.8742 10.05 16.0096L14.5515 10.0688C15.2103 9.20017 14.59 7.95142 13.4996 7.95142H11.5993L12.4871 4.89689C12.8013 3.81638 11.3792 3.10275 10.7016 4.00326ZM13.4996 9.12334C13.6231 9.12334 13.6923 9.26248 13.6178 9.36056C13.6178 9.36064 13.6177 9.36076 13.6176 9.36084L9.68421 14.5519L10.4355 11.7846C10.5366 11.4122 10.2557 11.0452 9.87003 11.0452H7.16686C7.04393 11.0452 6.97436 10.9065 7.04831 10.8082L11.1227 5.39275L10.2562 8.37384C10.2047 8.55084 10.2396 8.74173 10.3502 8.88916C10.4609 9.03654 10.6345 9.1233 10.8188 9.1233H13.4996V9.12334Z" fill="#7E8189"/><path d="M3.33016 15.9581C4.72723 17.5988 6.66016 18.7013 8.77281 19.0625C9.09129 19.117 9.39453 18.9032 9.44914 18.5838C9.50367 18.2648 9.28934 17.962 8.97039 17.9075C5.11141 17.2475 2.31055 13.922 2.31055 10C2.31055 6.5275 4.50645 3.52293 7.6882 2.42172L7.47836 2.79418C7.31953 3.07614 7.4193 3.43344 7.70125 3.59227C7.98328 3.75117 8.34055 3.65125 8.49938 3.36942L9.38211 1.80258C9.53813 1.52559 9.44332 1.17563 9.1743 1.01324L7.63438 0.0842997C7.35723 -0.0828096 6.99715 0.00621382 6.83 0.283362C6.66285 0.560433 6.75195 0.92055 7.02902 1.08774L7.37141 1.2943C5.81352 1.82524 4.41133 2.77227 3.33016 4.04188C1.91695 5.70141 1.13867 7.81735 1.13867 10C1.13867 12.1827 1.91695 14.2986 3.33016 15.9581Z" fill="#7E8189"/><path d="M11.8937 0.937186C11.5749 0.882654 11.272 1.09699 11.2175 1.41597C11.1629 1.73492 11.3773 2.03773 11.6962 2.09226C15.5552 2.75222 18.3561 6.07777 18.3561 9.99973C18.3561 13.4722 16.1602 16.4768 12.9784 17.578L13.1882 17.2055C13.3471 16.9236 13.2473 16.5662 12.9654 16.4074C12.6834 16.2486 12.3261 16.3483 12.1673 16.6303L11.2845 18.1971C11.1289 18.4732 11.222 18.8232 11.4923 18.9864L13.0322 19.9154C13.3095 20.0827 13.6695 19.9933 13.8366 19.7164C14.0037 19.4393 13.9146 19.0792 13.6375 18.912L13.2951 18.7054C14.853 18.1745 16.2552 17.2275 17.3364 15.9578C18.7496 14.2983 19.5279 12.1823 19.5279 9.99969C19.5279 7.81707 18.7496 5.70109 17.3364 4.04156C15.9394 2.40097 14.0064 1.29847 11.8937 0.937186Z" fill="#7E8189"/></g><defs><clipPath id="clip0_14816_50741"><rect width="20" height="20" fill="white" transform="translate(0.333496)"/></clipPath></defs></svg>';
                    locationInfo += '<p><strong>Loại hình: </strong><?php echo get_term_by('id', get_field('type', get_the_ID()), 'project_company')->name ?></p>';
                    locationInfo += '</div>';
                    locationInfo += '<div class="d-flex location-info-row">';
                    locationInfo += '<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.8335 5C2.8335 3.61929 3.95278 2.5 5.3335 2.5H15.3335C16.7142 2.5 17.8335 3.61929 17.8335 5V15C17.8335 16.3807 16.7142 17.5 15.3335 17.5H5.3335C3.95278 17.5 2.8335 16.3807 2.8335 15V5Z" stroke="#7E8189" stroke-width="1.5"/><path d="M2.8335 6.66667H17.8335" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round"/><path d="M14.0837 1.25L14.0837 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.58366 1.25L6.58366 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.75 9.99935H6.58333" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.9165 9.99935H10.7498" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.0835 9.99935H14.9168" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.75 13.3324H6.58333" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.9165 13.3324H10.7498" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.0835 13.3324H14.9168" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
                    locationInfo += '<p><strong>Thời điểm COD: </strong><?php echo get_field('date', get_the_ID()) ?></p>';
                    locationInfo += '</div>';
                    locationInfo += '<div class="d-flex location-info-row">';
                    locationInfo += '<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.16667 17.9587H6.83333C2.30833 17.9587 0.375 16.0253 0.375 11.5003V6.50033C0.375 1.97533 2.30833 0.0419922 6.83333 0.0419922H11.8333C16.3583 0.0419922 18.2917 1.97533 18.2917 6.50033V8.83366C18.2917 9.17532 18.0083 9.45866 17.6667 9.45866C17.325 9.45866 17.0417 9.17532 17.0417 8.83366V6.50033C17.0417 2.65866 15.675 1.29199 11.8333 1.29199H6.83333C2.99167 1.29199 1.625 2.65866 1.625 6.50033V11.5003C1.625 15.342 2.99167 16.7087 6.83333 16.7087H9.16667C9.50833 16.7087 9.79167 16.992 9.79167 17.3337C9.79167 17.6753 9.50833 17.9587 9.16667 17.9587Z" fill="#7E8189"/><path d="M5.1665 11.2424C4.82484 11.2424 4.5415 10.959 4.5415 10.6174V7.94238C4.5415 7.60072 4.82484 7.31738 5.1665 7.31738C5.50817 7.31738 5.7915 7.60072 5.7915 7.94238V10.6174C5.7915 10.9674 5.50817 11.2424 5.1665 11.2424V11.2424Z" fill="#7E8189"/><path d="M13.5 11.2424C13.1583 11.2424 12.875 10.959 12.875 10.6174V7.94238C12.875 7.60072 13.1583 7.31738 13.5 7.31738C13.8417 7.31738 14.125 7.60072 14.125 7.94238V10.6174C14.125 10.9674 13.8417 11.2424 13.5 11.2424V11.2424Z" fill="#7E8189"/><path d="M14.2762 17.586C14.1096 17.586 13.9512 17.5193 13.8346 17.4026L11.5179 15.0943C11.2762 14.8526 11.2679 14.4526 11.5179 14.211C11.7596 13.9693 12.1596 13.961 12.4012 14.211L14.2429 16.0443L17.6596 12.2193C17.8846 11.9526 18.2762 11.9276 18.5429 12.1526C18.8012 12.3776 18.8346 12.7693 18.6096 13.036L14.7596 17.3693C14.6429 17.5026 14.4846 17.5776 14.3096 17.586C14.2929 17.586 14.2846 17.586 14.2762 17.586Z" fill="#7E8189"/><path d="M9.3335 10.875C8.99183 10.875 8.7085 10.5917 8.7085 10.25V7.75C8.7085 7.40833 8.99183 7.125 9.3335 7.125C9.67516 7.125 9.9585 7.40833 9.9585 7.75V10.25C9.9585 10.5917 9.67516 10.875 9.3335 10.875Z" fill="#7E8189"/></svg>';
                    locationInfo += '<p><strong>Tình trạng: </strong><?php echo get_term(get_field('status', get_the_ID()))->name ?></p>';
                    locationInfo += '</div>';
                    locationInfo += '<div class="d-flex location-info-row">';
                    locationInfo += '<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.3335 12.125C7.6085 12.125 6.2085 10.725 6.2085 9C6.2085 7.275 7.6085 5.875 9.3335 5.875C11.0585 5.875 12.4585 7.275 12.4585 9C12.4585 10.725 11.0585 12.125 9.3335 12.125ZM9.3335 7.125C8.30016 7.125 7.4585 7.96667 7.4585 9C7.4585 10.0333 8.30016 10.875 9.3335 10.875C10.3668 10.875 11.2085 10.0333 11.2085 9C11.2085 7.96667 10.3668 7.125 9.3335 7.125Z" fill="#7E8189"/><path d="M12.0083 17.4913C11.8333 17.4913 11.6583 17.4663 11.4833 17.4246C10.9667 17.2829 10.5333 16.9579 10.2583 16.4996L10.1583 16.3329C9.66667 15.4829 8.99167 15.4829 8.5 16.3329L8.40833 16.4913C8.13333 16.9579 7.7 17.2913 7.18333 17.4246C6.65833 17.5663 6.11667 17.4913 5.65833 17.2163L4.225 16.3913C3.71667 16.0996 3.35 15.6246 3.19167 15.0496C3.04167 14.4746 3.11667 13.8829 3.40833 13.3746C3.65 12.9496 3.71667 12.5663 3.575 12.3246C3.43333 12.0829 3.075 11.9413 2.58333 11.9413C1.36667 11.9413 0.375 10.9496 0.375 9.73292V8.26625C0.375 7.04959 1.36667 6.05792 2.58333 6.05792C3.075 6.05792 3.43333 5.91625 3.575 5.67459C3.71667 5.43292 3.65833 5.04959 3.40833 4.62459C3.11667 4.11625 3.04167 3.51625 3.19167 2.94959C3.34167 2.37459 3.70833 1.89959 4.225 1.60792L5.66667 0.782921C6.60833 0.224588 7.85 0.549588 8.41667 1.50792L8.51667 1.67459C9.00833 2.52459 9.68333 2.52459 10.175 1.67459L10.2667 1.51625C10.8333 0.549588 12.075 0.224588 13.025 0.791254L14.4583 1.61625C14.9667 1.90792 15.3333 2.38292 15.4917 2.95792C15.6417 3.53292 15.5667 4.12459 15.275 4.63292C15.0333 5.05792 14.9667 5.44125 15.1083 5.68292C15.25 5.92459 15.6083 6.06625 16.1 6.06625C17.3167 6.06625 18.3083 7.05792 18.3083 8.27459V9.74125C18.3083 10.9579 17.3167 11.9496 16.1 11.9496C15.6083 11.9496 15.25 12.0913 15.1083 12.3329C14.9667 12.5746 15.025 12.9579 15.275 13.3829C15.5667 13.8913 15.65 14.4913 15.4917 15.0579C15.3417 15.6329 14.975 16.1079 14.4583 16.3996L13.0167 17.2246C12.7 17.3996 12.3583 17.4913 12.0083 17.4913ZM9.33333 14.4079C10.075 14.4079 10.7667 14.8746 11.2417 15.6996L11.3333 15.8579C11.4333 16.0329 11.6 16.1579 11.8 16.2079C12 16.2579 12.2 16.2329 12.3667 16.1329L13.8083 15.2996C14.025 15.1746 14.1917 14.9663 14.2583 14.7163C14.325 14.4663 14.2917 14.2079 14.1667 13.9913C13.6917 13.1746 13.6333 12.3329 14 11.6913C14.3667 11.0496 15.125 10.6829 16.075 10.6829C16.6083 10.6829 17.0333 10.2579 17.0333 9.72459V8.25792C17.0333 7.73292 16.6083 7.29959 16.075 7.29959C15.125 7.29959 14.3667 6.93292 14 6.29125C13.6333 5.64959 13.6917 4.80792 14.1667 3.99125C14.2917 3.77459 14.325 3.51625 14.2583 3.26625C14.1917 3.01625 14.0333 2.81625 13.8167 2.68292L12.375 1.85792C12.0167 1.64125 11.5417 1.76625 11.325 2.13292L11.2333 2.29125C10.7583 3.11625 10.0667 3.58292 9.325 3.58292C8.58333 3.58292 7.89167 3.11625 7.41667 2.29125L7.325 2.12459C7.11667 1.77459 6.65 1.64959 6.29167 1.85792L4.85 2.69125C4.63333 2.81625 4.46667 3.02459 4.4 3.27459C4.33333 3.52459 4.36667 3.78292 4.49167 3.99959C4.96667 4.81625 5.025 5.65792 4.65833 6.29959C4.29167 6.94125 3.53333 7.30792 2.58333 7.30792C2.05 7.30792 1.625 7.73292 1.625 8.26625V9.73292C1.625 10.2579 2.05 10.6913 2.58333 10.6913C3.53333 10.6913 4.29167 11.0579 4.65833 11.6996C5.025 12.3413 4.96667 13.1829 4.49167 13.9996C4.36667 14.2163 4.33333 14.4746 4.4 14.7246C4.46667 14.9746 4.625 15.1746 4.84167 15.3079L6.28333 16.1329C6.45833 16.2413 6.66667 16.2663 6.85833 16.2163C7.05833 16.1663 7.225 16.0329 7.33333 15.8579L7.425 15.6996C7.9 14.8829 8.59167 14.4079 9.33333 14.4079Z" fill="#7E8189"/></svg>';
                    locationInfo += '<p><strong>Công suất lắp máy: </strong><?php echo get_field('wattage', get_the_ID()) ?></p>';
                    locationInfo += '</div>';
                    locationInfo += '<div class="d-flex location-info-row">';
                    locationInfo += '<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.6667 17.959H1C0.658333 17.959 0.375 17.6757 0.375 17.334C0.375 16.9923 0.658333 16.709 1 16.709H17.6667C18.0083 16.709 18.2917 16.9923 18.2917 17.334C18.2917 17.6757 18.0083 17.959 17.6667 17.959Z" fill="#7E8189"/><path d="M11.2085 17.9587H7.4585C7.11683 17.9587 6.8335 17.6753 6.8335 17.3337V2.33366C6.8335 0.900325 7.62516 0.0419922 8.9585 0.0419922H9.7085C11.0418 0.0419922 11.8335 0.900325 11.8335 2.33366V17.3337C11.8335 17.6753 11.5502 17.9587 11.2085 17.9587ZM8.0835 16.7087H10.5835V2.33366C10.5835 1.37533 10.1335 1.29199 9.7085 1.29199H8.9585C8.5335 1.29199 8.0835 1.37533 8.0835 2.33366V16.7087Z" fill="#7E8189"/><path d="M5.16683 17.9587H1.8335C1.49183 17.9587 1.2085 17.6753 1.2085 17.3337V7.33366C1.2085 5.90033 1.94183 5.04199 3.16683 5.04199H3.8335C5.0585 5.04199 5.79183 5.90033 5.79183 7.33366V17.3337C5.79183 17.6753 5.5085 17.9587 5.16683 17.9587ZM2.4585 16.7087H4.54183V7.33366C4.54183 6.29199 4.0835 6.29199 3.8335 6.29199H3.16683C2.91683 6.29199 2.4585 6.29199 2.4585 7.33366V16.7087Z" fill="#7E8189"/><path d="M16.8333 17.959H13.5C13.1583 17.959 12.875 17.6757 12.875 17.334V11.5007C12.875 10.0673 13.6083 9.20898 14.8333 9.20898H15.5C16.725 9.20898 17.4583 10.0673 17.4583 11.5007V17.334C17.4583 17.6757 17.175 17.959 16.8333 17.959ZM14.125 16.709H16.2083V11.5007C16.2083 10.459 15.75 10.459 15.5 10.459H14.8333C14.5833 10.459 14.125 10.459 14.125 11.5007V16.709Z" fill="#7E8189"/></svg>';
                    locationInfo += '<p><strong>Sản lượng thiết kế: </strong><?php echo get_field('quantity', get_the_ID()) ?></p>';
                    locationInfo += '</div>';
                    locationInfo += '<div class="d-flex location-info-row">';
                    locationInfo += '<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.146 8.08333C17.146 12.9398 11.621 18 10.2397 18C8.8585 18 3.3335 12.9398 3.3335 8.08333C3.3335 4.17132 6.42553 1 10.2397 1C14.054 1 17.146 4.17132 17.146 8.08333Z" stroke="#7E8189" stroke-width="1.5"/><circle cx="2.65625" cy="2.65625" r="2.65625" transform="matrix(-1 0 0 1 12.896 5.25)" stroke="#7E8189" stroke-width="1.5"/></svg>';
                    locationInfo += '<p><strong>Địa chỉ: </strong><?php echo get_field('address', get_the_ID()) ?></p>';
                    locationInfo += '<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.0835 14.25L10.9141 9.78095C11.2993 9.33156 11.2993 8.66844 10.9141 8.21905L7.0835 3.75" stroke="#D1D5DB" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round"/></svg>';
                    locationInfo += '</div>';
                    locationInfo += '<div class="d-flex location-info-row">';
                    locationInfo += '<a href="<?php the_permalink() ?>" class="btn  btn-detail">Xem chi tiết</a>';
                    locationInfo += '<a href="#" class="btn btn-close" id="btn-close" onclick="event.preventDefault()">Đóng</a>';
                    locationInfo += '</div>';
                    locationInfo += '</div>';
                    locationInfo += '</div>';
                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(<?php echo get_field('coordinates') ?>),
                        map: map,
                        icon: markerImage,
                    });


                    google.maps.event.addListener(marker, 'click', (function(marker, locationInfo) {
                        var content
                        return function() {

                            infowindow.setContent(locationInfo);

                            infowindow.open(map, marker);
                        }



                    })(marker, locationInfo));


                    google.maps.event.addListener(infowindow, 'domready', function() {

                        var closeBtn = $('#btn-close').get();

                        google.maps.event.addDomListener(closeBtn[0], 'click', function() {

                            infowindow.close();
                        });
                    })

                    i++;

                <?php endwhile; ?>

            <?php endif; ?>




        }


        // onmouse image luoi dien 
        var viewport = $('.wrap_step');
        var $pz = $('.panzoom');
        $pz.panzoom({
            minScale: .8,
            maxScale: 3,
            onPan: function() {
                //	console.log('pan');
            },
            onStart: function(event) {
                //	console.log('start', event);
                return true;
            },
        });

        viewport.on('wheel', function(event) {
            event.preventDefault();
            var delta = event.delta || event.originalEvent.wheelDelta;
            var zoomOut = delta ? delta < 0 : event.originalEvent.deltaY > 0;
            $pz.panzoom('zoom', zoomOut, {
                minScale: .8,
                maxScale: 3,
                focal: event.originalEvent,
            });
        });

        $pz.on('panzoomchange', function(event, panzoom, transform) {

            event.stopImmediatePropagation();
            $pz.attr('panzoom-scale', transform[0]);
            // $pz.find('.item-map')
            // 	.css('transform','scale(' + 1/transform[0] + ') translate3d( 0, 0, 0)');
        });



        $('#bt-zoom-in').on('click', function() {
            $pz.panzoom('zoom', false);
        });

        $('#bt-zoom-out').on('click', function() {
            $pz.panzoom('zoom', true);
        });

        $('#bt-reset').on('click', function() {
            $pz.panzoom('reset');
            //$pz.panzoom("setMatrix", [1,0,0,1,0,0]);
        });
        $(document).mouseup(function(e) {
            var wrap_step = $(".wrap_step");
            if (!wrap_step.is(e.target) && wrap_step.has(e.target).length === 0) {
                $pz.panzoom('reset');
            }
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB23VHQSUiL0PfJVXmZJg1Z5NLqTEqeQCs&callback=myMap">
    </script>
</div>

<?php

get_footer();

?>