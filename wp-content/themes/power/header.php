<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php endif; ?>
    <?php global $c5_options; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&family=Public+Sans:wght@300;400;600;700;900&family=Roboto&display=swap" rel="stylesheet">
    <meta property="fb:app_id" content="<?php echo $c5_options['opt-id-appfb']; ?>" />
    <meta property="fb:admins" content="<?php echo $c5_options['opt-id-adminfb']; ?>" />
    <?php wp_head(); ?>
    <script src="https://unpkg.com/read-excel-file@4.x/bundle/read-excel-file.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body <?php body_class(); ?>>
    <header>
        <div class="home header">
            <div class="top-header home-header">
                <div class="container d-flex justify-content-between">
                    <?php $header_top = get_field('header_top', 'option');
                    if ($header_top['item']) : ?>
                        <ul class="nav nav-left">
                            <?php foreach ($header_top['item'] as $value) : ?>
                                <li class="nav-item"><a href="<?php echo  $value['link'] ?>" class="nav-link"><?php echo  _e($value['title']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <ul class="nav justify-content-center d-flex nav-right">

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
                            echo '<span class="navigator" style="place-self: center; color: #d8d8d88c;">|</span>';
                        } ?>
                        <?php if (is_user_logged_in()) : ?>
                        <?php else : ?>
                            <li class="nav-signup">
                                <a class="nav-link" href="<?php echo site_url('/wp-login.php?action=register'); ?>"><?php _e(' Đăng ký') ?> </a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-language">
                            <div class="languages d-flex">
                                <?php echo do_shortcode('[gtranslate]'); ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="bottom-header ">
                <div class="navbar">
                    <div class="container">
                        <div class="logo">
                            <a href="<?php echo get_home_url(); ?>"> <img class="img-logo" src="<?php echo get_stylesheet_directory_uri() ?>/access/images/logo.png" alt="logo"></a>
                        </div>
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary_menu',
                                'container'  => '',
                                'menu_class' => 'nav-list',
                                'fallback_cb' => 'specia_fallback_page_menu',
                                'walker' => new specia_nav_walker(),
                                'add_li_class'  => 'nav-item',
                                'link_class'    =>    'nav-item-link'
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="menu-main-container">
                    <div class="container">
                        <div id="menu-main" class="menu">
                            <div class="row">
                                <div class="col-12 col-lg-12 main-menu-primary">
                                    <?php wp_nav_menu(
                                        array(
                                            'theme_location' => 'other_menu',
                                            'container' => 'false',
                                            'menu_id' => 'other-menu',
                                            'add_li_class'  => 'main-menu-primary-item',
                                            'menu_class' => ' main-menu-primary'
                                        )
                                    ); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search">
            <div class="search-bar">
                <?php do_shortcode('[csw_search_form]'); ?>
            </div>
        </div>
    </header>
    <?php if (is_front_page()) { ?>
        <main class="main_page">
        <?php } else { ?>
        <?php } ?>