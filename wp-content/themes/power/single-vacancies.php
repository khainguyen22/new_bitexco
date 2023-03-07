<?php
$banner = get_field('banner_danh_sach_tuyen_dung', 'option');
get_header(); ?>

<!-- Blog & Sidebar Section -->

<div class="custom-single-page  details_vacancies">
    <?php if (have_posts()) : ?>

        <?php while (have_posts()) : the_post();
            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
            <div class="breadcrumbs">
                <div class="container">
                    <?php
                    if (function_exists('yoast_breadcrumb')) {
                        yoast_breadcrumb('<div id="breadcrumbs-content" class="breadcrumbs-content">', '</div>');
                    }
                    ?>
                </div>
            </div>

            <div class="banner" style='background-image:url("<?php echo isset($featured_img_url) ? $featured_img_url : $banner['background'] ?>")'>
                <div class="wrap_banner">
                    <div class="container">
                        <div class="content">
                            <h3><?php the_title(); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-9 ">
                            <div class="wrap_content">
                                <div class="head">
                                    <?php if (get_field("company")) : ?>
                                        <p class="company">
                                            <span class="icon">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M18.75 6.87507H16.875V3.75007C16.8779 3.60386 16.8295 3.46124 16.7382 3.34704C16.6468 3.23284 16.5183 3.15429 16.375 3.12507L3.875 0.625072C3.78421 0.607182 3.69058 0.609676 3.60087 0.632374C3.51116 0.655072 3.42761 0.697407 3.35625 0.756322C3.28291 0.815806 3.224 0.891135 3.18395 0.976652C3.14389 1.06217 3.12374 1.15565 3.125 1.25007V6.87507H1.25C1.08424 6.87507 0.925268 6.94092 0.808058 7.05813C0.690848 7.17534 0.625 7.33431 0.625 7.50007V18.7501C0.625 18.9158 0.690848 19.0748 0.808058 19.192C0.925268 19.3092 1.08424 19.3751 1.25 19.3751H18.75C18.9158 19.3751 19.0747 19.3092 19.1919 19.192C19.3092 19.0748 19.375 18.9158 19.375 18.7501V7.50007C19.375 7.33431 19.3092 7.17534 19.1919 7.05813C19.0747 6.94092 18.9158 6.87507 18.75 6.87507ZM1.875 8.12507H3.125V18.1251H1.875V8.12507ZM4.375 7.50007V2.01257L15.625 4.26257V18.1251H12.5V14.3751C12.5 14.2093 12.4342 14.0503 12.3169 13.9331C12.1997 13.8159 12.0408 13.7501 11.875 13.7501H8.125C7.95924 13.7501 7.80027 13.8159 7.68306 13.9331C7.56585 14.0503 7.5 14.2093 7.5 14.3751V18.1251H4.375V7.50007ZM8.75 18.1251V15.0001H11.25V18.1251H8.75ZM18.125 18.1251H16.875V8.12507H18.125V18.1251Z" fill="#7E8189" />
                                                    <path d="M6.5625 8.125H9.0625C9.22826 8.125 9.38723 8.05915 9.50444 7.94194C9.62165 7.82473 9.6875 7.66576 9.6875 7.5V5C9.6875 4.83424 9.62165 4.67527 9.50444 4.55806C9.38723 4.44085 9.22826 4.375 9.0625 4.375H6.5625C6.39674 4.375 6.23777 4.44085 6.12056 4.55806C6.00335 4.67527 5.9375 4.83424 5.9375 5V7.5C5.9375 7.66576 6.00335 7.82473 6.12056 7.94194C6.23777 8.05915 6.39674 8.125 6.5625 8.125ZM7.1875 5.625H8.4375V6.875H7.1875V5.625Z" fill="#7E8189" />
                                                    <path d="M9.0625 12.5C9.22826 12.5 9.38723 12.4342 9.50444 12.3169C9.62165 12.1997 9.6875 12.0408 9.6875 11.875V9.375C9.6875 9.20924 9.62165 9.05027 9.50444 8.93306C9.38723 8.81585 9.22826 8.75 9.0625 8.75H6.5625C6.39674 8.75 6.23777 8.81585 6.12056 8.93306C6.00335 9.05027 5.9375 9.20924 5.9375 9.375V11.875C5.9375 12.0408 6.00335 12.1997 6.12056 12.3169C6.23777 12.4342 6.39674 12.5 6.5625 12.5H9.0625ZM7.1875 10H8.4375V11.25H7.1875V10Z" fill="#7E8189" />
                                                    <path d="M10.9375 8.125H13.4375C13.6033 8.125 13.7622 8.05915 13.8794 7.94194C13.9967 7.82473 14.0625 7.66576 14.0625 7.5V5C14.0625 4.83424 13.9967 4.67527 13.8794 4.55806C13.7622 4.44085 13.6033 4.375 13.4375 4.375H10.9375C10.7717 4.375 10.6128 4.44085 10.4956 4.55806C10.3783 4.67527 10.3125 4.83424 10.3125 5V7.5C10.3125 7.66576 10.3783 7.82473 10.4956 7.94194C10.6128 8.05915 10.7717 8.125 10.9375 8.125ZM11.5625 5.625H12.8125V6.875H11.5625V5.625Z" fill="#7E8189" />
                                                    <path d="M10.9375 12.5H13.4375C13.6033 12.5 13.7622 12.4342 13.8794 12.3169C13.9967 12.1997 14.0625 12.0408 14.0625 11.875V9.375C14.0625 9.20924 13.9967 9.05027 13.8794 8.93306C13.7622 8.81585 13.6033 8.75 13.4375 8.75H10.9375C10.7717 8.75 10.6128 8.81585 10.4956 8.93306C10.3783 9.05027 10.3125 9.20924 10.3125 9.375V11.875C10.3125 12.0408 10.3783 12.1997 10.4956 12.3169C10.6128 12.4342 10.7717 12.5 10.9375 12.5ZM11.5625 10H12.8125V11.25H11.5625V10Z" fill="#7E8189" />
                                                </svg>
                                            </span>
                                            <span class="info">
                                                <strong>Công ty: </strong> <?php echo  get_field("company") ?>
                                            </span>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (get_field("address")) : ?>
                                        <p class="address">
                                            <span class="icon">
                                                <svg width="16" height="19" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M14.8125 8.08333C14.8125 12.9398 9.2875 18 7.90625 18C6.525 18 1 12.9398 1 8.08333C1 4.17132 4.09203 1 7.90625 1C11.7205 1 14.8125 4.17132 14.8125 8.08333Z" stroke="#7E8189" stroke-width="1.5" />
                                                    <circle r="2.65625" transform="matrix(-1 0 0 1 7.90625 7.90625)" stroke="#7E8189" stroke-width="1.5" />
                                                </svg>
                                            </span>
                                            <span class="info">
                                                <strong><?php _e('Địa điểm:'); ?> </strong><?php echo  get_field("address") ?>
                                            </span>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (get_field("amount")) : ?>
                                        <p class="amount">
                                            <span class="icon">
                                                <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <ellipse rx="3.33333" ry="3.33333" transform="matrix(-1 0 0 1 6.99967 4.83333)" stroke="#7E8189" stroke-width="1.5" />
                                                    <path d="M1.1665 13.1109C1.1665 12.394 1.61722 11.7544 2.29241 11.5133V11.5133C5.33654 10.4261 8.66314 10.4261 11.7073 11.5133V11.5133C12.3825 11.7544 12.8332 12.394 12.8332 13.1109V14.2072C12.8332 15.1967 11.9567 15.9568 10.9772 15.8169L10.6506 15.7702C8.22904 15.4243 5.77064 15.4243 3.34911 15.7702L3.02251 15.8169C2.04292 15.9568 1.1665 15.1967 1.1665 14.2072V13.1109Z" stroke="#7E8189" stroke-width="1.5" />
                                                </svg>
                                            </span>
                                            <span class="info">
                                                <strong><?php _e('Số lượng:'); ?></strong><?php echo  get_field("amount") ?>
                                            </span>
                                        </p>
                                    <?php else : ?>
                                        <p class="amount">
                                            <span class="icon">
                                                <svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <ellipse rx="3.33333" ry="3.33333" transform="matrix(-1 0 0 1 6.99967 4.83333)" stroke="#7E8189" stroke-width="1.5" />
                                                    <path d="M1.1665 13.1109C1.1665 12.394 1.61722 11.7544 2.29241 11.5133V11.5133C5.33654 10.4261 8.66314 10.4261 11.7073 11.5133V11.5133C12.3825 11.7544 12.8332 12.394 12.8332 13.1109V14.2072C12.8332 15.1967 11.9567 15.9568 10.9772 15.8169L10.6506 15.7702C8.22904 15.4243 5.77064 15.4243 3.34911 15.7702L3.02251 15.8169C2.04292 15.9568 1.1665 15.1967 1.1665 14.2072V13.1109Z" stroke="#7E8189" stroke-width="1.5" />
                                                </svg>
                                            </span>
                                            <span class="info">
                                                <strong><?php _e('Số lượng:'); ?></strong>0
                                            </span>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (get_field("position")) : ?>
                                        <p class="position">
                                            <span class="icon">
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.6665 6.35547C1.6665 5.2509 2.56193 4.35547 3.6665 4.35547H16.3332C17.4377 4.35547 18.3332 5.2509 18.3332 6.35547V7.15309C18.3332 8.03631 17.7538 8.81496 16.9079 9.06875L11.1492 10.7963C10.3995 11.0213 9.6002 11.0213 8.85045 10.7963L3.09181 9.06875C2.24584 8.81496 1.6665 8.03631 1.6665 7.15309V6.35547Z" stroke="#7E8189" stroke-width="1.5" />
                                                    <path d="M10 8.64341L10 7.21484" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.36084 8.64453L2.36084 12.5016C2.36084 14.7108 4.1517 16.5016 6.36084 16.5016H13.6386C15.8478 16.5016 17.6386 14.7108 17.6386 12.5016V8.64453" stroke="#7E8189" stroke-width="1.5" />
                                                    <path d="M12.7777 4.35713V3.5C12.7777 2.39543 11.8823 1.5 10.7777 1.5H9.22217C8.1176 1.5 7.22217 2.39543 7.22217 3.5L7.22217 4.35713" stroke="#7E8189" stroke-width="1.5" />
                                                </svg>
                                            </span>
                                            <span class="info">
                                                <strong> <?php _e('Cấp bậc: '); ?></strong><?php echo  get_field("position") ?>
                                            </span>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (get_field("deadline")) : ?>
                                        <p class="deadline">
                                            <span class="icon">
                                                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.5 5C1.5 3.61929 2.61929 2.5 4 2.5H14C15.3807 2.5 16.5 3.61929 16.5 5V15C16.5 16.3807 15.3807 17.5 14 17.5H4C2.61929 17.5 1.5 16.3807 1.5 15V5Z" stroke="#7E8189" stroke-width="1.5" />
                                                    <path d="M1.5 6.66667H16.5" stroke="#7E8189" stroke-width="1.5" stroke-linejoin="round" />
                                                    <path d="M12.7502 1.25L12.7502 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M5.25016 1.25L5.25016 3.75" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M4.4165 9.9974H5.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.58301 9.9974H9.41634" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12.75 9.9974H13.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M4.4165 13.3294H5.24984" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M8.58301 13.3294H9.41634" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M12.75 13.3294H13.5833" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </span>
                                            <span class="info">
                                                <strong><?php _e('Hạn nộp hồ sơ: '); ?> </strong> <?php echo  get_field("deadline") ?>
                                            </span>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (get_field("work")) : ?>
                                        <p class="work">
                                            <span class="icon">
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.6665 6.35547C1.6665 5.2509 2.56193 4.35547 3.6665 4.35547H16.3332C17.4377 4.35547 18.3332 5.2509 18.3332 6.35547V7.15309C18.3332 8.03631 17.7538 8.81496 16.9079 9.06875L11.1492 10.7963C10.3995 11.0213 9.6002 11.0213 8.85045 10.7963L3.09181 9.06875C2.24584 8.81496 1.6665 8.03631 1.6665 7.15309V6.35547Z" stroke="#7E8189" stroke-width="1.5" />
                                                    <path d="M10 8.64341L10 7.21484" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.36084 8.64453L2.36084 12.5016C2.36084 14.7108 4.1517 16.5016 6.36084 16.5016H13.6386C15.8478 16.5016 17.6386 14.7108 17.6386 12.5016V8.64453" stroke="#7E8189" stroke-width="1.5" />
                                                    <path d="M12.7777 4.35713V3.5C12.7777 2.39543 11.8823 1.5 10.7777 1.5H9.22217C8.1176 1.5 7.22217 2.39543 7.22217 3.5L7.22217 4.35713" stroke="#7E8189" stroke-width="1.5" />
                                                </svg>
                                            </span>
                                            <span class="info">
                                                <strong><?php _e('Công việc: '); ?> </strong><?php echo  get_field("work") ?>
                                            </span>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (get_field("skill")) : ?>
                                        <p class="skill">
                                            <span class="icon">
                                                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1.6665 6.35547C1.6665 5.2509 2.56193 4.35547 3.6665 4.35547H16.3332C17.4377 4.35547 18.3332 5.2509 18.3332 6.35547V7.15309C18.3332 8.03631 17.7538 8.81496 16.9079 9.06875L11.1492 10.7963C10.3995 11.0213 9.6002 11.0213 8.85045 10.7963L3.09181 9.06875C2.24584 8.81496 1.6665 8.03631 1.6665 7.15309V6.35547Z" stroke="#7E8189" stroke-width="1.5" />
                                                    <path d="M10 8.64341L10 7.21484" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M2.36084 8.64453L2.36084 12.5016C2.36084 14.7108 4.1517 16.5016 6.36084 16.5016H13.6386C15.8478 16.5016 17.6386 14.7108 17.6386 12.5016V8.64453" stroke="#7E8189" stroke-width="1.5" />
                                                    <path d="M12.7777 4.35713V3.5C12.7777 2.39543 11.8823 1.5 10.7777 1.5H9.22217C8.1176 1.5 7.22217 2.39543 7.22217 3.5L7.22217 4.35713" stroke="#7E8189" stroke-width="1.5" />
                                                </svg>
                                            </span>
                                            <span class="info">
                                                <strong><?php _e('Kỹ năng: '); ?> </strong><?php echo  get_field("skill") ?>
                                            </span>
                                        </p>
                                    <?php endif; ?>
                                    <?php if (get_field("other_requirements")) : ?>
                                        <p class="other_requirements">
                                            <span class="icon">
                                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M13.5938 9.375H10.625V6.40625C10.625 6.32031 10.5547 6.25 10.4688 6.25H9.53125C9.44531 6.25 9.375 6.32031 9.375 6.40625V9.375H6.40625C6.32031 9.375 6.25 9.44531 6.25 9.53125V10.4688C6.25 10.5547 6.32031 10.625 6.40625 10.625H9.375V13.5938C9.375 13.6797 9.44531 13.75 9.53125 13.75H10.4688C10.5547 13.75 10.625 13.6797 10.625 13.5938V10.625H13.5938C13.6797 10.625 13.75 10.5547 13.75 10.4688V9.53125C13.75 9.44531 13.6797 9.375 13.5938 9.375Z" fill="#7E8189" />
                                                    <path d="M10 1.25C5.16797 1.25 1.25 5.16797 1.25 10C1.25 14.832 5.16797 18.75 10 18.75C14.832 18.75 18.75 14.832 18.75 10C18.75 5.16797 14.832 1.25 10 1.25ZM10 17.2656C5.98828 17.2656 2.73438 14.0117 2.73438 10C2.73438 5.98828 5.98828 2.73438 10 2.73438C14.0117 2.73438 17.2656 5.98828 17.2656 10C17.2656 14.0117 14.0117 17.2656 10 17.2656Z" fill="#7E8189" />
                                                </svg>
                                            </span>
                                            <span class="info">
                                                <strong><?php _e('Yêu cầu khác: '); ?> </strong><?php echo  get_field("other_requirements") ?>
                                            </span>
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="content">
                                    <?php if (get_field("job_description")) : ?>
                                        <div class="job_description" id="job_description">
                                            <h5><?php _e('Mô tả công việc '); ?> </h5>
                                            <div class="info">
                                                <?php echo  get_field("job_description") ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (get_field("job_requirements")) : ?>
                                        <div class="job_requirements" id="job_requirements">
                                            <h5><?php _e('Yêu cầu công việc '); ?></h5>
                                            <div class="info">
                                                <?php echo  get_field("job_requirements") ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if (get_field("welfare")) : ?>
                                        <div class="welfare" id="welfare">
                                            <h5><?php _e('Các phúc lợi dành cho bạn'); ?></h5>
                                            <div class="info">
                                                <?php echo  get_field("welfare") ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="history">
                                    <a href="">
                                        <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.33336 1.33594L1.31487 4.35442C0.956891 4.7124 0.956892 5.2928 1.31487 5.65079L4.33336 8.66927M1.58336 5.00261L14.4167 5.00261" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round" />
                                        </svg>
                                        <?php _e('Quay lại tuyển dụng'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="wrap_scrollspy">
                                <?php if (get_field('amount') > 0 || get_field('date')) : ?>
                                    <button type="button" data-toggle="modal" data-target="#popup_ung_tuyen" class="btn btn_success"> <?php _e('Ứng tuyển'); ?></button>
                                <?php else : ?>
                                    <span class="btn btn_feild "> <?php _e('Hết hạn'); ?></span>
                                <?php endif; ?>
                                <ul class="scrollspy">
                                    <?php if (get_field("job_description")) : ?> <li class="active"><a href="#job_description"><?php _e('Mô tả công việc'); ?> </a></li> <?php endif; ?>
                                    <?php if (get_field("job_requirements")) : ?> <li><a href="#job_requirements"><?php _e('Yêu cầu công việc'); ?></a> </li> <?php endif; ?>
                                    <?php if (get_field("welfare")) : ?> <li><a href="#welfare"><?php _e('Phúc lợi'); ?></a></li> <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

    <!-- Modal -->
    <div class="modal fade" id="popup_ung_tuyen" tabindex="-1" role="dialog" aria-labelledby="popup_ung_tuyen_title" aria-hidden="true" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php the_title(); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.00056 14.9994L15 1" stroke="#434449" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M1.00055 1.00056L15 15" stroke="#434449" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo do_shortcode('[contact-form-7 id="3058" title="Popup ứng tuyển"]'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal  successfully -->
    <div class="modal fade" id="popup_ung_tuyen_successfully" tabindex="-1" role="dialog" aria-labelledby="popup_ung_tuyen_successfully_title" aria-hidden="true" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1.00056 14.9994L15 1" stroke="#434449" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1.00055 1.00056L15 15" stroke="#434449" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="modal-body text-center">
                    <div class="icon">
                        <svg width="71" height="70" viewBox="0 0 71 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" width="70" height="70" rx="35" fill="#DAA622" />
                            <path d="M37.549 46.1597H25.2115C21.854 46.1597 19.1253 43.4284 19.1253 40.0722V28.6097C19.1253 25.2534 21.8553 22.5222 25.2115 22.5222H44.4615C47.8253 22.5222 50.5615 25.2534 50.5615 28.6097V33.1472C50.5615 33.7684 51.0653 34.2722 51.6865 34.2722C52.3078 34.2722 52.8115 33.7684 52.8115 33.1472V28.6097C52.8115 24.0122 49.0653 20.2734 44.4603 20.2734H25.2115C20.614 20.2734 16.874 24.0134 16.874 28.6097V40.0722C16.874 44.6697 20.614 48.4097 25.2115 48.4097H37.549C38.1703 48.4097 38.674 47.9059 38.674 47.2847C38.674 46.6634 38.1703 46.1597 37.549 46.1597Z" fill="white" />
                            <path d="M45.8449 27.9041L35.5311 32.0229C35.0874 32.2016 34.5936 32.2016 34.1499 32.0229L23.8374 27.9041C23.2624 27.6754 22.6061 27.9541 22.3749 28.5316C22.1436 29.1091 22.4249 29.7629 23.0024 29.9941L33.3149 34.1129C33.8074 34.3091 34.3249 34.4079 34.8411 34.4079C35.3574 34.4079 35.8749 34.3091 36.3674 34.1129L46.6811 29.9941C47.2574 29.7629 47.5399 29.1091 47.3086 28.5316C47.0774 27.9541 46.4199 27.6766 45.8449 27.9041Z" fill="white" />
                            <path d="M46.8719 35.2188C42.8732 35.2188 39.6182 38.4725 39.6182 42.4713C39.6182 46.47 42.8732 49.7238 46.8719 49.7238C50.8707 49.7238 54.1257 46.47 54.1257 42.4713C54.1257 38.4725 50.8707 35.2188 46.8719 35.2188ZM46.8719 47.4738C44.1132 47.4738 41.8694 45.23 41.8694 42.4713C41.8694 39.7125 44.1132 37.4687 46.8719 37.4687C49.6307 37.4687 51.8744 39.7125 51.8744 42.4713C51.8744 45.23 49.6307 47.4738 46.8719 47.4738Z" fill="white" />
                            <path d="M48.2489 40.5536L46.1439 42.2486L45.6714 41.6473C45.2877 41.1573 44.5814 41.0723 44.0914 41.4561C43.6027 41.8398 43.5177 42.5461 43.9014 43.0348L45.0764 44.5336C45.2614 44.7698 45.5339 44.9236 45.8327 44.9573C45.8752 44.9623 45.9177 44.9648 45.9614 44.9648C46.2164 44.9648 46.4652 44.8786 46.6664 44.7161L49.6589 42.3061C50.1427 41.9161 50.2189 41.2086 49.8302 40.7236C49.4427 40.2423 48.7339 40.1623 48.2489 40.5536Z" fill="white" />
                        </svg>
                    </div>
                    <h6><?php _e('Đơn ứng tuyển của bạn đã được gửi đi thành công!') ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>