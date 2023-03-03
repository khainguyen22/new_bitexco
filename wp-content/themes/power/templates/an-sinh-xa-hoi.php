<?php

/*
*Template Name: An sinh xã hội
**/

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";
$request_uri = "$_SERVER[REDIRECT_URL]";
$an_sinh_xa_hoi = get_field('an_sinh_xa_hoi', 'option');
$banner = $an_sinh_xa_hoi['banner'];
$navigation = $banner['navigation'];
$desid_us = $an_sinh_xa_hoi['desid_us'];
$did_it = $an_sinh_xa_hoi['did_it'];
$other_banner = $an_sinh_xa_hoi['other_banner'];
$news = $an_sinh_xa_hoi['news'];
$mailbox = $an_sinh_xa_hoi['mailbox'];
$other_info = $an_sinh_xa_hoi['other_info'];
$args = array(
    'post_type'   => 'social_security',
    'posts_per_page' => 2,
    'paged' => 1,
);
$post_of_outstanding = array(
    'post_type'   => 'social_security',
    'posts_per_page' => 1,
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => 'outstanding',
            'value' => '1',
            'compare' => 'LIKE'
        ),
        array(
            'key' => 'outstanding',
            'value' => '',
            'compare' => 'LIKE'
        ),
    ),
);
$post_of_news = array(
    'post_type'   => 'social_security',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'orderby' => 'post_date',
    'order' => 'DESC',
);
$the_query_post_outstanding = new WP_Query($post_of_outstanding);
$the_query_post_news = new WP_Query($post_of_news);
$query = new WP_Query($args);

get_header();
?>
<div class="an-sinh-xa-hoi">
    <section class="banner list" style='background-image:url("<?php echo $banner['background']; ?>")'>
        <div class="container">
            <div class="content">
                <?php if ($banner['title']) : ?> <h3><?php echo _e($banner['title']) ?></h3> <?php endif; ?>
                <?php if ($banner['description']) : ?> <p><?php echo _e($banner['description']); ?></p> <?php endif; ?>
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
    <?php if ($desid_us) : ?>
        <section class="desid_us">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 content_wrap">
                        <div class="content">
                            <span class="line-headding"></span>
                            <?php if ($desid_us['title']) : ?> <h3><?php echo _e($desid_us['title']); ?></h3> <?php endif; ?>
                            <?php if ($desid_us['description']) : ?> <p><?php echo _e($desid_us['description']); ?></p> <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 image_wrap">
                        <div class="image">
                            <?php if ($desid_us['title']) : ?>
                                <img src="<?php echo $desid_us['image'] ?>" alt="<?php echo _e($desid_us['title']); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($did_it) : ?>
        <section class="did_it">
            <div class="container">
                <div class="head text-center m-auto">
                    <span class="line-headding"></span>
                    <?php if ($did_it['title']) : ?> <h3><?php echo _e($did_it['title']); ?></h3> <?php endif; ?>
                    <?php if ($did_it['description']) : ?> <p><?php echo _e($did_it['description']); ?></p> <?php endif; ?>
                </div>
                <div class="content d-flex flex-wrap row">
                    <?php foreach ($did_it['content']['item'] as $key => $value) : ?>
                        <div class="item d-flex">
                            <div class="icon">
                                <?php if ($value['label']) : ?> <img src="<?php echo $value['icon']; ?>" alt="<?php echo _e($value['label']); ?>"><?php endif; ?>
                            </div>
                            <div class="info">
                                <?php if ($value['label']) : ?> <span class="label size-text-14"><?php echo _e($value['label']); ?></span><?php endif; ?>
                                <div class="count d-flex">
                                    <?php if ($value['number']) : ?>
                                        <h1 class="number counter"><?php echo number_format($value['number'], 2, ',', '.'); ?></h1>
                                    <?php endif; ?>
                                    <?php if ($value['unit']) : ?><span class="unit mx-2"> <?php echo _e($value['unit']); ?></span><?php endif; ?>
                                </div>
                                <?php if ($value['sub_label']) : ?> <span class="sub_label"><?php echo _e($value['sub_label']); ?></span><?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($other_banner) : ?>
        <section class="other_banner banner" style='background-image:url("<?php echo $other_banner['image']; ?>")'>
            <div class="content">
                <?php if ($other_banner['title']) : ?> <h3 class="title"> <?php echo _e($other_banner['title']); ?></h3> <?php endif; ?>
                <div class=" link-detail text-center">
                    <?php if ($other_banner['link']) : ?> <a class="btn btn-detail" href="<?php echo $other_banner['link']; ?>"><?php echo _e('Xem chi tiết'); ?></a><?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($news) : ?>
        <div class="tin-tuc">
            <div class="content-container">
                <div class="container">
                    <div class="head  text-center m-auto">
                        <span class="line-headding"></span>
                        <?php if ($news['title']) : ?> <h3><?php echo _e($news['title']) ?></h3> <?php endif; ?>
                        <?php if ($news['description']) : ?> <p><?php echo _e($news['description']); ?></p> <?php endif; ?>
                    </div>
                    <div class="news-post">
                        <div class="row">
                            <div class="col-12 col-lg-6 tin-noi-bat animate_underline  ">
                                <?php if ($the_query_post_outstanding->have_posts()) : ?>
                                    <?php while ($the_query_post_outstanding->have_posts()) : $the_query_post_outstanding->the_post();
                                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                                        <a href="<?php echo get_the_permalink() ?>">
                                            <div class="image">
                                                <img src="<?php echo $featured_img_url ?>" alt="<?php echo _e(the_title()) ?>" class="img-banner">
                                            </div>
                                            <div class="content">
                                                <h5> <a href="<?php echo get_the_permalink() ?>"><?php echo _e(the_title()) ?></a></h5>
                                                <p class="size-text-16"><?php echo _e(get_field('excerpt')) ?></p>
                                                <span class="tag tag-calender">
                                                    <span class="text size-text-14"><?php echo get_the_date() ?></span>
                                                </span>
                                            </div>
                                        </a>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-12 col-lg-6 tin-moi-nhat-wrap">
                                <div class="row tin-moi-nhat">
                                    <?php if ($the_query_post_news->have_posts()) : ?>
                                        <?php while ($the_query_post_news->have_posts()) : $the_query_post_news->the_post();
                                            $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>
                                            <div class="col-12 d-flex tin-moi-nhat-item ">
                                                <a href="<?php echo get_the_permalink() ?>">
                                                    <div class="image">
                                                        <img src="<?php echo $featured_img_url ?>" alt="<?php echo _e(the_title()) ?>" class="img-banner">
                                                    </div>
                                                </a>
                                                <div class="content">
                                                    <span class="tag tag-calender">
                                                        <span class="text size-text-14"><?php echo get_the_date() ?></span>
                                                    </span>
                                                    <h6><a href="<?php echo get_the_permalink() ?>"><?php echo _e(the_title()) ?></a></h6>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class=" link-detail text-center">
                            <?php if ($news['link']) : ?> <a class="btn btn-detail" href="<?php echo $news['link']; ?>"><?php echo _e('Xem chi tiết') ?></a><?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($mailbox) : $mailbox_content = $mailbox['content'];
        $mailbox_content_info = $mailbox_content['info']; ?>
        <div class="dich-vu">
            <section class="your-privilege contact-section">
                <div class="your-privilege-container container">
                    <div class="your-privilege-content contact-section-content">
                        <div class="head text-center m-auto">
                            <span class="line-headding"></span>
                            <?php if ($mailbox['title']) : ?><h3><?php echo _e($mailbox['title']); ?></h3> <?php endif; ?>
                            <?php if ($mailbox['description']) : ?><p><?php echo _e($mailbox['description']); ?></p> <?php endif; ?>
                        </div>
                        <div class="cwt-content d-flex ">
                            <div class="cwt-content-img">
                                <?php if ($mailbox_content['image']) : ?> <img src="<?php echo $mailbox_content['image']; ?>" alt="<?php echo _e($mailbox['title']); ?>"> <?php endif; ?>
                            </div>
                            <div class="cwu-content-text">
                                <div class="contact-info-wrapper"> <?php if ($mailbox_content_info['title']) : ?> <h5><?php echo _e($mailbox_content_info['title']); ?></h5><?php endif; ?>
                                    <?php if ($mailbox_content_info['location']) : ?> <div class="address contact-info d-flex">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M16.0625 8.08333C16.0625 10.2531 14.8109 12.5638 13.3002 14.3838C12.5549 15.2818 11.7739 16.0266 11.1095 16.54C10.7766 16.7972 10.4852 16.9867 10.2525 17.1082C9.99505 17.2426 9.89122 17.25 9.90625 17.25V18.75C10.2666 18.75 10.6376 18.5993 10.9466 18.438C11.2804 18.2637 11.6474 18.02 12.0266 17.7269C12.7866 17.1397 13.6459 16.316 14.4544 15.3419C16.0516 13.4177 17.5625 10.77 17.5625 8.08333H16.0625ZM9.90625 17.25C9.92128 17.25 9.81745 17.2426 9.55996 17.1082C9.32726 16.9867 9.03595 16.7972 8.70299 16.54C8.0386 16.0266 7.2576 15.2818 6.51226 14.3838C5.00157 12.5638 3.75 10.2531 3.75 8.08333H2.25C2.25 10.77 3.76093 13.4177 5.35805 15.3419C6.16662 16.316 7.02585 17.1397 7.78588 17.7269C8.16513 18.02 8.53207 18.2637 8.86589 18.438C9.17493 18.5993 9.54591 18.75 9.90625 18.75V17.25ZM3.75 8.08333C3.75 4.56752 6.52403 1.75 9.90625 1.75V0.25C5.66003 0.25 2.25 3.77512 2.25 8.08333H3.75ZM9.90625 1.75C13.2885 1.75 16.0625 4.56752 16.0625 8.08333H17.5625C17.5625 3.77512 14.1525 0.25 9.90625 0.25V1.75Z" fill="#7E8189" />
                                                <circle r="2.65625" transform="matrix(-1 0 0 1 9.90625 7.90625)" stroke="#7E8189" stroke-width="1.5" />
                                            </svg>
                                            <p class="size-text-16"><?php echo _e($mailbox_content_info['location']); ?></p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($mailbox_content_info['phone']) : ?> <div class="phone contact-info d-flex">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15.885 16.8486C14.2564 18.4772 10.0857 16.9469 6.56939 13.4306C3.0531 9.91432 1.52283 5.74356 3.15142 4.11496L4.22373 3.04265C4.964 2.30238 6.18379 2.32195 6.9482 3.08636L8.6091 4.74727C9.37352 5.51168 9.39308 6.73147 8.65281 7.47174L8.42249 7.70206C8.02281 8.10174 7.98371 8.74651 8.35509 9.19656C8.71331 9.63066 9.0995 10.063 9.51823 10.4818C9.93696 10.9005 10.3693 11.2867 10.8034 11.6449C11.2535 12.0163 11.8983 11.9772 12.2979 11.5775L12.5283 11.3472C13.2685 10.6069 14.4883 10.6265 15.2527 11.3909L16.9136 13.0518C17.6781 13.8162 17.6976 15.036 16.9573 15.7763L15.885 16.8486Z" stroke="#7E8189" stroke-width="1.5" />
                                            </svg>
                                            <?php echo _e('Tel:'); ?>
                                            <?php foreach ($mailbox_content_info['phone'] as $key => $value) : ?>
                                                <?php echo ($key > 0) ? '<span class="">|</span>' : '' ?>
                                                <a class="size-text-16" href="tel:<?php echo formatPhoneNumber($value['item']); ?>"><?php echo formatPhoneNumber($value['item']); ?></a>
                                            <?php endforeach; ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($mailbox_content_info['fax']) : ?>
                                        <div class="contact-info d-flex fax">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_3949_135568)">
                                                    <g clip-path="url(#clip1_3949_135568)">
                                                        <path d="M17.2246 18.5177H5.73888C5.54944 18.5177 5.36776 18.4424 5.23381 18.3085C5.09985 18.1745 5.0246 17.9928 5.0246 17.8034C5.0246 17.614 5.09985 17.4323 5.23381 17.2983C5.36776 17.1644 5.54944 17.0891 5.73888 17.0891H17.2246C17.5155 17.1139 17.8045 17.0237 18.0296 16.8378C18.2547 16.6519 18.3979 16.3851 18.4286 16.0948V7.81483C18.3978 7.52461 18.2545 7.25801 18.0294 7.07224C17.8043 6.88646 17.5154 6.79631 17.2246 6.82111C17.0352 6.82111 16.8535 6.74586 16.7195 6.6119C16.5856 6.47795 16.5103 6.29627 16.5103 6.10683C16.5103 5.91739 16.5856 5.7357 16.7195 5.60175C16.8535 5.46779 17.0352 5.39254 17.2246 5.39254C17.8944 5.36651 18.5473 5.60668 19.0406 6.06057C19.5339 6.51446 19.8275 7.14515 19.8572 7.81483V16.0943C19.8276 16.7641 19.5341 17.395 19.0408 17.8491C18.5476 18.3032 17.8946 18.5436 17.2246 18.5177Z" fill="#7E8189" />
                                                        <path d="M8.30288 6.8192H5.73888C5.54944 6.8192 5.36776 6.74394 5.23381 6.60999C5.09985 6.47603 5.0246 6.29435 5.0246 6.10491C5.0246 5.91547 5.09985 5.73379 5.23381 5.59983C5.36776 5.46588 5.54944 5.39063 5.73888 5.39062H8.30288C8.49232 5.39063 8.674 5.46588 8.80796 5.59983C8.94191 5.73379 9.01717 5.91547 9.01717 6.10491C9.01717 6.29435 8.94191 6.47603 8.80796 6.60999C8.674 6.74394 8.49232 6.8192 8.30288 6.8192Z" fill="#7E8189" />
                                                        <path d="M4.05717 19.235H2.53774C1.903 19.2337 1.29465 18.9809 0.845822 18.5321C0.396993 18.0833 0.144242 17.4749 0.142883 16.8402V6.36304C0.144393 5.7284 0.39721 5.12019 0.846023 4.67149C1.29484 4.22278 1.9031 3.97011 2.53774 3.96875H4.05717C4.69181 3.97011 5.30007 4.22278 5.74889 4.67149C6.1977 5.12019 6.45052 5.7284 6.45203 6.36304V16.8402C6.45067 17.4749 6.19792 18.0833 5.74909 18.5321C5.30026 18.9809 4.69191 19.2337 4.05717 19.235ZM2.53774 5.39732C2.28161 5.39747 2.03601 5.49925 1.85484 5.6803C1.67368 5.86136 1.57176 6.10691 1.57145 6.36304V16.8402C1.57161 17.0964 1.67346 17.3421 1.85464 17.5233C2.03582 17.7045 2.28151 17.8063 2.53774 17.8065H4.05717C4.31335 17.8062 4.55895 17.7043 4.7401 17.5231C4.92125 17.342 5.02315 17.0964 5.02346 16.8402V6.36304C5.023 6.10695 4.92103 5.8615 4.7399 5.68047C4.55877 5.49945 4.31325 5.39762 4.05717 5.39732H2.53774Z" fill="#7E8189" />
                                                        <path d="M16.3755 9.49458H8.50634C8.3169 9.49458 8.13522 9.41932 8.00126 9.28537C7.86731 9.15142 7.79205 8.96973 7.79205 8.78029V1.48772C7.79205 1.29828 7.86731 1.1166 8.00126 0.982647C8.13522 0.848692 8.3169 0.773438 8.50634 0.773438H16.3755C16.5649 0.773438 16.7466 0.848692 16.8806 0.982647C17.0145 1.1166 17.0898 1.29828 17.0898 1.48772V8.78029C17.0898 8.96973 17.0145 9.15142 16.8806 9.28537C16.7466 9.41932 16.5649 9.49458 16.3755 9.49458ZM9.22062 8.06601H15.6612V2.19915H9.22062V8.06601Z" fill="#7E8189" />
                                                        <path d="M9.49487 12.6708C9.67937 12.6634 9.85385 12.5849 9.98178 12.4517C10.1097 12.3186 10.1812 12.1411 10.1812 11.9565C10.1812 11.7718 10.1097 11.5943 9.98178 11.4612C9.85385 11.3281 9.67937 11.2496 9.49487 11.2422C9.31038 11.2496 9.13589 11.3281 9.00797 11.4612C8.88004 11.5943 8.80859 11.7718 8.80859 11.9565C8.80859 12.1411 8.88004 12.3186 9.00797 12.4517C9.13589 12.5849 9.31038 12.6634 9.49487 12.6708Z" fill="#7E8189" />
                                                        <path d="M12.4412 12.6708C12.6257 12.6634 12.8001 12.5849 12.9281 12.4517C13.056 12.3186 13.1274 12.1411 13.1274 11.9565C13.1274 11.7718 13.056 11.5943 12.9281 11.4612C12.8001 11.3281 12.6257 11.2496 12.4412 11.2422C12.2567 11.2496 12.0822 11.3281 11.9543 11.4612C11.8263 11.5943 11.7549 11.7718 11.7549 11.9565C11.7549 12.1411 11.8263 12.3186 11.9543 12.4517C12.0822 12.5849 12.2567 12.6634 12.4412 12.6708Z" fill="#7E8189" />
                                                        <path d="M15.3875 12.6708C15.5719 12.6634 15.7464 12.5849 15.8744 12.4517C16.0023 12.3186 16.0737 12.1411 16.0737 11.9565C16.0737 11.7718 16.0023 11.5943 15.8744 11.4612C15.7464 11.3281 15.5719 11.2496 15.3875 11.2422C15.203 11.2496 15.0285 11.3281 14.9005 11.4612C14.7726 11.5943 14.7012 11.7718 14.7012 11.9565C14.7012 12.1411 14.7726 12.3186 14.9005 12.4517C15.0285 12.5849 15.203 12.6634 15.3875 12.6708Z" fill="#7E8189" />
                                                        <path d="M9.49487 15.0614C9.67937 15.054 9.85385 14.9755 9.98178 14.8424C10.1097 14.7092 10.1812 14.5317 10.1812 14.3471C10.1812 14.1625 10.1097 13.985 9.98178 13.8518C9.85385 13.7187 9.67937 13.6402 9.49487 13.6328C9.31038 13.6402 9.13589 13.7187 9.00797 13.8518C8.88004 13.985 8.80859 14.1625 8.80859 14.3471C8.80859 14.5317 8.88004 14.7092 9.00797 14.8424C9.13589 14.9755 9.31038 15.054 9.49487 15.0614Z" fill="#7E8189" />
                                                        <path d="M12.4412 15.0614C12.6257 15.054 12.8001 14.9755 12.9281 14.8424C13.056 14.7092 13.1274 14.5317 13.1274 14.3471C13.1274 14.1625 13.056 13.985 12.9281 13.8518C12.8001 13.7187 12.6257 13.6402 12.4412 13.6328C12.2567 13.6402 12.0822 13.7187 11.9543 13.8518C11.8263 13.985 11.7549 14.1625 11.7549 14.3471C11.7549 14.5317 11.8263 14.7092 11.9543 14.8424C12.0822 14.9755 12.2567 15.054 12.4412 15.0614Z" fill="#7E8189" />
                                                        <path d="M15.3875 15.0614C15.5719 15.054 15.7464 14.9755 15.8744 14.8424C16.0023 14.7092 16.0737 14.5317 16.0737 14.3471C16.0737 14.1625 16.0023 13.985 15.8744 13.8518C15.7464 13.7187 15.5719 13.6402 15.3875 13.6328C15.203 13.6402 15.0285 13.7187 14.9005 13.8518C14.7726 13.985 14.7012 14.1625 14.7012 14.3471C14.7012 14.5317 14.7726 14.7092 14.9005 14.8424C15.0285 14.9755 15.203 15.054 15.3875 15.0614Z" fill="#7E8189" />
                                                    </g>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_3949_135568">
                                                        <rect width="20" height="20" fill="white" />
                                                    </clipPath>
                                                    <clipPath id="clip1_3949_135568">
                                                        <rect width="20" height="20" fill="white" />
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            Fax: <a class="size-text-16" href="tel:<?php echo formatPhoneNumber($mailbox_content_info['fax']); ?>"><?php echo formatPhoneNumber($mailbox_content_info['fax']); ?> </a>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($mailbox_content_info['email']) : ?> <div class="contact-info d-flex email">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.3334 5V14.8333C18.3334 15.3856 17.8856 15.8333 17.3334 15.8333H2.66669C2.1144 15.8333 1.66669 15.3856 1.66669 14.8333V5M18.3334 5H1.66669M18.3334 5L10 10.4167L1.66669 5" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            Email: <a class="size-text-16" href="mailto:<?php echo $mailbox_content_info['email']; ?>"> <?php echo $mailbox_content_info['email']; ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    <?php endif; ?>
    <?php if ($other_info) : ?>
        <section class="other-information">
            <div class="other-container">
                <div class="other-content hover-zoom">
                    <?php foreach ($other_info as $value) : ?>
                        <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo _e($value['text']); ?></span> </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>

<?php
get_footer();
?>