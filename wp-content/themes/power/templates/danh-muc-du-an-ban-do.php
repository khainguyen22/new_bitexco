<?php

/**
Template Name: Danh muc du an / ban do
 **/
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";
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
                            <li class="<?php echo $actual_link == $value['link'] ? 'active' : '' ?>"> <a href="<?php echo $value['link']; ?>"><?php echo $value['label']; ?></a></li>
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
                    <rect width="45" height="33" rx="2" fill="white"/>
                    <path d="M13 22.5H31" stroke="#007D8F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13 16.5H31" stroke="#007D8F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M13 10.5H31" stroke="#007D8F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                    <filter id="filter0_b_15017_51387" x="-20" y="-20" width="85" height="73" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feGaussianBlur in="BackgroundImageFix" stdDeviation="10"/>
                    <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_15017_51387"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_15017_51387" result="shape"/>
                    </filter>
                    </defs>
                </svg>
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
    <script>
        function myMap() {
            var styledMapType = new google.maps.StyledMapType([{}]);

            var mapProp = {
                center: new google.maps.LatLng(17.08609183914221, 106.85480302417643),
                zoom: 6,
                mapTypeId: google.maps.MapTypeId.SATELLITE,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                rotateControl: true,
                fullscreenControl: true,
                label: true,
            };

            console.log(google.maps.MapTypeId);

            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var transitLayer = new google.maps.TransitLayer();
            transitLayer.setMap(map);
            var LocationsForMap = [
                ['Hagiang', 22.91014717658154, 105.29492723890908],
                ['Backan', 22.57618538261618, 105.56143008143711],
                ['Hagiang', 22.444560260081417, 104.726634926565],
                ['Tuyenquang', 22.225269125058656, 105.33095500825091],
                ['Yenbai', 21.680310326903435, 104.81317050662587],
                ['Dienbien', 21.60191200314312, 103.30327898586076],
                ['Sonla', 21.534120182998386, 103.85577830840046],
                ['Thanhhoa', 19.69745568187122, 105.77153766752723],
                ['Thanhhoa', 19.376657264792357, 105.73709077982545],
                ['Quangbinh', 17.409217112040157, 106.6213551654783],
                ['Quangtri', 17.07828185613196, 107.02517569865654],
                ['Quangnam', 15.933604833712103, 107.37412291082302],
                ['Gialai', 14.184142139406017, 107.68945433960768],
                ['Gialai', 13.886415510819951, 108.05456327159273],
                ['EsupDistrict', 13.119725824443346, 107.67012689956005],
                ['Daklak', 12.804374372800797, 108.00565939849088],
                ['Ninhthuan', 11.618905004440142, 108.70297581998966],
                ['<div class="test">Tayninh</div>', 11.49400726885824, 105.9157459481872],
            ];

            <?php
                $args = [
                    'post_type'=> 'projects',
                    'posts_per_page'=>-1,
                ];

                $query = new WP_Query($args);
            ?>

            var infowindow = new google.maps.InfoWindow({
            });
          
            var marker, i = 0;

            var markerImage = 'https://power.dtts.com.vn/wp-content/uploads/2023/02/Frame-427319445-1.png';

            let locationInfo = '';
            

            <?php if ($query->have_posts(  )) : ?>
                <?php while($query->have_posts(  )) : $query->the_post(  )?>
                    locationInfo = '';
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
                                locationInfo += '<h6><strong>Công ty: </strong>Công ty CP Đầu tư & Phát triển điện Nho Quế</h6>';
                            locationInfo += '</div>';
                            locationInfo += '<div class="d-flex location-info-row">';
                                locationInfo += '<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_14816_50741)"><path d="M10.7016 4.00326L6.1119 10.1036C5.45796 10.9728 6.07905 12.217 7.16686 12.217H9.10382L8.30675 15.1529C8.02222 16.2009 9.39472 16.8742 10.05 16.0096L14.5515 10.0688C15.2103 9.20017 14.59 7.95142 13.4996 7.95142H11.5993L12.4871 4.89689C12.8013 3.81638 11.3792 3.10275 10.7016 4.00326ZM13.4996 9.12334C13.6231 9.12334 13.6923 9.26248 13.6178 9.36056C13.6178 9.36064 13.6177 9.36076 13.6176 9.36084L9.68421 14.5519L10.4355 11.7846C10.5366 11.4122 10.2557 11.0452 9.87003 11.0452H7.16686C7.04393 11.0452 6.97436 10.9065 7.04831 10.8082L11.1227 5.39275L10.2562 8.37384C10.2047 8.55084 10.2396 8.74173 10.3502 8.88916C10.4609 9.03654 10.6345 9.1233 10.8188 9.1233H13.4996V9.12334Z" fill="#7E8189"/><path d="M3.33016 15.9581C4.72723 17.5988 6.66016 18.7013 8.77281 19.0625C9.09129 19.117 9.39453 18.9032 9.44914 18.5838C9.50367 18.2648 9.28934 17.962 8.97039 17.9075C5.11141 17.2475 2.31055 13.922 2.31055 10C2.31055 6.5275 4.50645 3.52293 7.6882 2.42172L7.47836 2.79418C7.31953 3.07614 7.4193 3.43344 7.70125 3.59227C7.98328 3.75117 8.34055 3.65125 8.49938 3.36942L9.38211 1.80258C9.53813 1.52559 9.44332 1.17563 9.1743 1.01324L7.63438 0.0842997C7.35723 -0.0828096 6.99715 0.00621382 6.83 0.283362C6.66285 0.560433 6.75195 0.92055 7.02902 1.08774L7.37141 1.2943C5.81352 1.82524 4.41133 2.77227 3.33016 4.04188C1.91695 5.70141 1.13867 7.81735 1.13867 10C1.13867 12.1827 1.91695 14.2986 3.33016 15.9581Z" fill="#7E8189"/><path d="M11.8937 0.937186C11.5749 0.882654 11.272 1.09699 11.2175 1.41597C11.1629 1.73492 11.3773 2.03773 11.6962 2.09226C15.5552 2.75222 18.3561 6.07777 18.3561 9.99973C18.3561 13.4722 16.1602 16.4768 12.9784 17.578L13.1882 17.2055C13.3471 16.9236 13.2473 16.5662 12.9654 16.4074C12.6834 16.2486 12.3261 16.3483 12.1673 16.6303L11.2845 18.1971C11.1289 18.4732 11.222 18.8232 11.4923 18.9864L13.0322 19.9154C13.3095 20.0827 13.6695 19.9933 13.8366 19.7164C14.0037 19.4393 13.9146 19.0792 13.6375 18.912L13.2951 18.7054C14.853 18.1745 16.2552 17.2275 17.3364 15.9578C18.7496 14.2983 19.5279 12.1823 19.5279 9.99969C19.5279 7.81707 18.7496 5.70109 17.3364 4.04156C15.9394 2.40097 14.0064 1.29847 11.8937 0.937186Z" fill="#7E8189"/></g><defs><clipPath id="clip0_14816_50741"><rect width="20" height="20" fill="white" transform="translate(0.333496)"/></clipPath></defs></svg>';
                                locationInfo += '<h6><strong>Loại hình: </strong>Thủy điện</h6>';
                            locationInfo += '</div>';
                            locationInfo += '<div class="d-flex location-info-row">';
                                locationInfo += '<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.8335 5C2.8335 3.61929 3.95278 2.5 5.3335 2.5H15.3335C16.7142 2.5 17.8335 3.61929 17.8335 5V15C17.8335 16.3807 16.7142 17.5 15.3335 17.5H5.3335C3.95278 17.5 2.8335 16.3807 2.8335 15V5Z" stroke="#7E8189" stroke-width="1.5"/><path d="M2.8335 6.66667H17.8335" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round"/><path d="M14.0837 1.25L14.0837 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M6.58366 1.25L6.58366 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.75 9.99935H6.58333" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.9165 9.99935H10.7498" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.0835 9.99935H14.9168" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M5.75 13.3324H6.58333" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.9165 13.3324H10.7498" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M14.0835 13.3324H14.9168" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
                                locationInfo += '<h6><strong>Thời điểm COD: </strong>2016</h6>';
                            locationInfo += '</div>';
                            locationInfo += '<div class="d-flex location-info-row">';
                                locationInfo += '<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.16667 17.9587H6.83333C2.30833 17.9587 0.375 16.0253 0.375 11.5003V6.50033C0.375 1.97533 2.30833 0.0419922 6.83333 0.0419922H11.8333C16.3583 0.0419922 18.2917 1.97533 18.2917 6.50033V8.83366C18.2917 9.17532 18.0083 9.45866 17.6667 9.45866C17.325 9.45866 17.0417 9.17532 17.0417 8.83366V6.50033C17.0417 2.65866 15.675 1.29199 11.8333 1.29199H6.83333C2.99167 1.29199 1.625 2.65866 1.625 6.50033V11.5003C1.625 15.342 2.99167 16.7087 6.83333 16.7087H9.16667C9.50833 16.7087 9.79167 16.992 9.79167 17.3337C9.79167 17.6753 9.50833 17.9587 9.16667 17.9587Z" fill="#7E8189"/><path d="M5.1665 11.2424C4.82484 11.2424 4.5415 10.959 4.5415 10.6174V7.94238C4.5415 7.60072 4.82484 7.31738 5.1665 7.31738C5.50817 7.31738 5.7915 7.60072 5.7915 7.94238V10.6174C5.7915 10.9674 5.50817 11.2424 5.1665 11.2424V11.2424Z" fill="#7E8189"/><path d="M13.5 11.2424C13.1583 11.2424 12.875 10.959 12.875 10.6174V7.94238C12.875 7.60072 13.1583 7.31738 13.5 7.31738C13.8417 7.31738 14.125 7.60072 14.125 7.94238V10.6174C14.125 10.9674 13.8417 11.2424 13.5 11.2424V11.2424Z" fill="#7E8189"/><path d="M14.2762 17.586C14.1096 17.586 13.9512 17.5193 13.8346 17.4026L11.5179 15.0943C11.2762 14.8526 11.2679 14.4526 11.5179 14.211C11.7596 13.9693 12.1596 13.961 12.4012 14.211L14.2429 16.0443L17.6596 12.2193C17.8846 11.9526 18.2762 11.9276 18.5429 12.1526C18.8012 12.3776 18.8346 12.7693 18.6096 13.036L14.7596 17.3693C14.6429 17.5026 14.4846 17.5776 14.3096 17.586C14.2929 17.586 14.2846 17.586 14.2762 17.586Z" fill="#7E8189"/><path d="M9.3335 10.875C8.99183 10.875 8.7085 10.5917 8.7085 10.25V7.75C8.7085 7.40833 8.99183 7.125 9.3335 7.125C9.67516 7.125 9.9585 7.40833 9.9585 7.75V10.25C9.9585 10.5917 9.67516 10.875 9.3335 10.875Z" fill="#7E8189"/></svg>';
                                locationInfo += '<h6><strong>Tình trạng: </strong>Đang vận hành</h6>';
                            locationInfo += '</div>';
                            locationInfo += '<div class="d-flex location-info-row">';
                                locationInfo += '<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.3335 12.125C7.6085 12.125 6.2085 10.725 6.2085 9C6.2085 7.275 7.6085 5.875 9.3335 5.875C11.0585 5.875 12.4585 7.275 12.4585 9C12.4585 10.725 11.0585 12.125 9.3335 12.125ZM9.3335 7.125C8.30016 7.125 7.4585 7.96667 7.4585 9C7.4585 10.0333 8.30016 10.875 9.3335 10.875C10.3668 10.875 11.2085 10.0333 11.2085 9C11.2085 7.96667 10.3668 7.125 9.3335 7.125Z" fill="#7E8189"/><path d="M12.0083 17.4913C11.8333 17.4913 11.6583 17.4663 11.4833 17.4246C10.9667 17.2829 10.5333 16.9579 10.2583 16.4996L10.1583 16.3329C9.66667 15.4829 8.99167 15.4829 8.5 16.3329L8.40833 16.4913C8.13333 16.9579 7.7 17.2913 7.18333 17.4246C6.65833 17.5663 6.11667 17.4913 5.65833 17.2163L4.225 16.3913C3.71667 16.0996 3.35 15.6246 3.19167 15.0496C3.04167 14.4746 3.11667 13.8829 3.40833 13.3746C3.65 12.9496 3.71667 12.5663 3.575 12.3246C3.43333 12.0829 3.075 11.9413 2.58333 11.9413C1.36667 11.9413 0.375 10.9496 0.375 9.73292V8.26625C0.375 7.04959 1.36667 6.05792 2.58333 6.05792C3.075 6.05792 3.43333 5.91625 3.575 5.67459C3.71667 5.43292 3.65833 5.04959 3.40833 4.62459C3.11667 4.11625 3.04167 3.51625 3.19167 2.94959C3.34167 2.37459 3.70833 1.89959 4.225 1.60792L5.66667 0.782921C6.60833 0.224588 7.85 0.549588 8.41667 1.50792L8.51667 1.67459C9.00833 2.52459 9.68333 2.52459 10.175 1.67459L10.2667 1.51625C10.8333 0.549588 12.075 0.224588 13.025 0.791254L14.4583 1.61625C14.9667 1.90792 15.3333 2.38292 15.4917 2.95792C15.6417 3.53292 15.5667 4.12459 15.275 4.63292C15.0333 5.05792 14.9667 5.44125 15.1083 5.68292C15.25 5.92459 15.6083 6.06625 16.1 6.06625C17.3167 6.06625 18.3083 7.05792 18.3083 8.27459V9.74125C18.3083 10.9579 17.3167 11.9496 16.1 11.9496C15.6083 11.9496 15.25 12.0913 15.1083 12.3329C14.9667 12.5746 15.025 12.9579 15.275 13.3829C15.5667 13.8913 15.65 14.4913 15.4917 15.0579C15.3417 15.6329 14.975 16.1079 14.4583 16.3996L13.0167 17.2246C12.7 17.3996 12.3583 17.4913 12.0083 17.4913ZM9.33333 14.4079C10.075 14.4079 10.7667 14.8746 11.2417 15.6996L11.3333 15.8579C11.4333 16.0329 11.6 16.1579 11.8 16.2079C12 16.2579 12.2 16.2329 12.3667 16.1329L13.8083 15.2996C14.025 15.1746 14.1917 14.9663 14.2583 14.7163C14.325 14.4663 14.2917 14.2079 14.1667 13.9913C13.6917 13.1746 13.6333 12.3329 14 11.6913C14.3667 11.0496 15.125 10.6829 16.075 10.6829C16.6083 10.6829 17.0333 10.2579 17.0333 9.72459V8.25792C17.0333 7.73292 16.6083 7.29959 16.075 7.29959C15.125 7.29959 14.3667 6.93292 14 6.29125C13.6333 5.64959 13.6917 4.80792 14.1667 3.99125C14.2917 3.77459 14.325 3.51625 14.2583 3.26625C14.1917 3.01625 14.0333 2.81625 13.8167 2.68292L12.375 1.85792C12.0167 1.64125 11.5417 1.76625 11.325 2.13292L11.2333 2.29125C10.7583 3.11625 10.0667 3.58292 9.325 3.58292C8.58333 3.58292 7.89167 3.11625 7.41667 2.29125L7.325 2.12459C7.11667 1.77459 6.65 1.64959 6.29167 1.85792L4.85 2.69125C4.63333 2.81625 4.46667 3.02459 4.4 3.27459C4.33333 3.52459 4.36667 3.78292 4.49167 3.99959C4.96667 4.81625 5.025 5.65792 4.65833 6.29959C4.29167 6.94125 3.53333 7.30792 2.58333 7.30792C2.05 7.30792 1.625 7.73292 1.625 8.26625V9.73292C1.625 10.2579 2.05 10.6913 2.58333 10.6913C3.53333 10.6913 4.29167 11.0579 4.65833 11.6996C5.025 12.3413 4.96667 13.1829 4.49167 13.9996C4.36667 14.2163 4.33333 14.4746 4.4 14.7246C4.46667 14.9746 4.625 15.1746 4.84167 15.3079L6.28333 16.1329C6.45833 16.2413 6.66667 16.2663 6.85833 16.2163C7.05833 16.1663 7.225 16.0329 7.33333 15.8579L7.425 15.6996C7.9 14.8829 8.59167 14.4079 9.33333 14.4079Z" fill="#7E8189"/></svg>';
                                locationInfo += '<h6><strong>Công suất lắp máy: </strong>48 MW</h6>';
                            locationInfo += '</div>';
                            locationInfo += '<div class="d-flex location-info-row">';
                                locationInfo += '<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.6667 17.959H1C0.658333 17.959 0.375 17.6757 0.375 17.334C0.375 16.9923 0.658333 16.709 1 16.709H17.6667C18.0083 16.709 18.2917 16.9923 18.2917 17.334C18.2917 17.6757 18.0083 17.959 17.6667 17.959Z" fill="#7E8189"/><path d="M11.2085 17.9587H7.4585C7.11683 17.9587 6.8335 17.6753 6.8335 17.3337V2.33366C6.8335 0.900325 7.62516 0.0419922 8.9585 0.0419922H9.7085C11.0418 0.0419922 11.8335 0.900325 11.8335 2.33366V17.3337C11.8335 17.6753 11.5502 17.9587 11.2085 17.9587ZM8.0835 16.7087H10.5835V2.33366C10.5835 1.37533 10.1335 1.29199 9.7085 1.29199H8.9585C8.5335 1.29199 8.0835 1.37533 8.0835 2.33366V16.7087Z" fill="#7E8189"/><path d="M5.16683 17.9587H1.8335C1.49183 17.9587 1.2085 17.6753 1.2085 17.3337V7.33366C1.2085 5.90033 1.94183 5.04199 3.16683 5.04199H3.8335C5.0585 5.04199 5.79183 5.90033 5.79183 7.33366V17.3337C5.79183 17.6753 5.5085 17.9587 5.16683 17.9587ZM2.4585 16.7087H4.54183V7.33366C4.54183 6.29199 4.0835 6.29199 3.8335 6.29199H3.16683C2.91683 6.29199 2.4585 6.29199 2.4585 7.33366V16.7087Z" fill="#7E8189"/><path d="M16.8333 17.959H13.5C13.1583 17.959 12.875 17.6757 12.875 17.334V11.5007C12.875 10.0673 13.6083 9.20898 14.8333 9.20898H15.5C16.725 9.20898 17.4583 10.0673 17.4583 11.5007V17.334C17.4583 17.6757 17.175 17.959 16.8333 17.959ZM14.125 16.709H16.2083V11.5007C16.2083 10.459 15.75 10.459 15.5 10.459H14.8333C14.5833 10.459 14.125 10.459 14.125 11.5007V16.709Z" fill="#7E8189"/></svg>';
                                locationInfo += '<h6><strong>Sản lượng thiết kế: </strong>195.45 triệu kWh/năm</h6>';
                            locationInfo += '</div>';
                            locationInfo += '<div class="d-flex location-info-row">';
                                locationInfo += '<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.146 8.08333C17.146 12.9398 11.621 18 10.2397 18C8.8585 18 3.3335 12.9398 3.3335 8.08333C3.3335 4.17132 6.42553 1 10.2397 1C14.054 1 17.146 4.17132 17.146 8.08333Z" stroke="#7E8189" stroke-width="1.5"/><circle cx="2.65625" cy="2.65625" r="2.65625" transform="matrix(-1 0 0 1 12.896 5.25)" stroke="#7E8189" stroke-width="1.5"/></svg>';
                                locationInfo += '<h6><strong>Địa chỉ: </strong>Giàng Chu Phìn, Mèo Vạc, Hà Giang</h6>';
                                locationInfo += '<svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.0835 14.25L10.9141 9.78095C11.2993 9.33156 11.2993 8.66844 10.9141 8.21905L7.0835 3.75" stroke="#D1D5DB" stroke-opacity="0.8" stroke-width="1.5" stroke-linecap="round"/></svg>';
                            locationInfo += '</div>';
                            locationInfo += '<div class="d-flex location-info-row">';
                                locationInfo += '<a href="#" class="btn">Xem chi tiết</a>';
                                locationInfo += '<a href="#" class="btn">Đóng</a>';
                            locationInfo += '</div>';
                        locationInfo += '</div>';
                    locationInfo += '</div>';


                    marker = new google.maps.Marker({
                        position: new google.maps.LatLng(<?php echo get_field('coordinates')?>),
                        map: map,
                        icon: markerImage,
                    });

                    google.maps.event.addListener(marker, 'click', (function(marker, locationInfo) {
                        return function() {
                            infowindow.setContent(locationInfo);
                            infowindow.open(map, marker);
                        }
                    })(marker, locationInfo));

                    i++;
                <?php endwhile;?>

            <?php endif ;?>

           
            // for (i = 0; i < LocationsForMap.length; i++) {
            //     marker = new google.maps.Marker({
            //         position: new google.maps.LatLng(LocationsForMap[i][1], LocationsForMap[i][2]),
            //         map: map,
            //         icon: markerImage,
            //     });

            //     google.maps.event.addListener(marker, 'click', (function(marker) {
            //         return function() {
            //             infowindow.setContent(locationInfo);
            //             infowindow.open(map, marker);
            //         }
            //     })(marker, i));
            // }
        }
    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIJ9XX2ZvRKCJcFRrl-lRanEtFUow4piM&callback=initMap"> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1PQnohUd35MSfol6G-6D9m6i6R422_Jg&callback=myMap">
    </script>
</div>
<?php
get_footer();
?>