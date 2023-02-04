<?php

/**
 * Template Name: Đăng nhập
 */
?>
<!-- < ?php
if (!is_user_logged_in()) :
    if (empty($_GET['redirect_to'])) {
        wp_safe_redirect(home_url() . "/custom-login?login=notyet&redirect_to=" . urlencode(home_url()));
        exit;
    } else { ?> -->
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://sachinchoolur.github.io/lightslider/dist/js/lightslider.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body>
    <section class="register login-page">
        <div class="register-box">
            <div class="form-box">
                <div class="login-logo-box">
                    <img src="../access/images/red-bitexco-group.png" alt="" class="login-logo" width="49px" height="67px">
                </div>
                <div class="languages">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                        <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="#434449" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7.00012 11C7.00012 16.5228 8.79098 21 11.0001 21C13.2093 21 15.0001 16.5228 15.0001 11C15.0001 5.47715 13.2093 1 11.0001 1C8.79098 1 7.00012 5.47715 7.00012 11Z" stroke="#434449" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M1 11H21" stroke="#434449" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <select name="" id="">
                        <option value="">Tiếng Việt</option>
                        <option value="">English</option>
                        <option value="">Japanese</option>
                        <option value="">Spain</option>
                    </select>
                </div>
                <div class="title">
                    <h2>Đăng nhập</h2>
                </div>
                <div class="form">
                    <form action="">
                        <div class="account-name">
                            <label for="account-name">Tên tài khoản <span class="require">*</span></label>
                            <input type="text" id="account-name" class="account-name form-control" placeholder="Nhập email">
                        </div>
                        <div class="password">
                            <label for="password">Mật khẩu <span class="require">*</span></label>
                            <input type="password" id="password" class="password form-control" placeholder="Nhập mật khẩu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M5.02358 6.11203L2.19197 3.28133L3.4733 2L21.402 19.9296L20.1206 21.21L17.1233 18.2127C15.5307 19.2229 13.683 19.7578 11.797 19.7548C6.91433 19.7548 2.85211 16.2413 2 11.605C2.38941 9.49576 3.45033 7.56894 5.02448 6.11203H5.02358ZM14.2935 15.3829L12.9678 14.0572C12.4608 14.2998 11.8909 14.3791 11.3369 14.2843C10.7829 14.1894 10.2719 13.925 9.87441 13.5276C9.47694 13.1301 9.21255 12.6191 9.11769 12.0651C9.02284 11.511 9.10218 10.9412 9.34479 10.4341L8.01909 9.10844C7.44291 9.9791 7.18533 11.0221 7.28998 12.0609C7.39462 13.0997 7.85505 14.0704 8.5933 14.8087C9.33155 15.5469 10.3023 16.0074 11.341 16.112C12.3798 16.2166 13.4229 15.9591 14.2935 15.3829ZM8.15129 4.1434C9.28049 3.69969 10.5111 3.45519 11.797 3.45519C16.6796 3.45519 20.7418 6.96867 21.5939 11.605C21.3165 13.1133 20.6928 14.5367 19.772 15.7632L16.2767 12.2679C16.3805 11.5684 16.3191 10.8544 16.0973 10.183C15.8755 9.51159 15.4996 8.90145 14.9996 8.40146C14.4996 7.90148 13.8895 7.52554 13.2181 7.30378C12.5467 7.08202 11.8326 7.02059 11.1332 7.12442L8.15129 4.1443V4.1434Z" fill="#434449" />
                            </svg>
                        </div>
                        <div class="forget-password">
                            <a href="">Quên mật khẩu?</a>
                        </div>
                        <div class="submit">
                            <button class="btn btn-search register-btn">Đăng nhập</button>
                        </div>
                    </form>
                    <div class="old-member">
                        <span>Bạn chưa là thành viên?</span>
                        <a href="">Đăng kí</a>
                    </div>
                </div>
            </div>
            <div class="image">
                <img src="../access/images/img-login.png" alt="">
            </div>
        </div>
    </section>
</body>
<!-- < ?php } ?>

< ?php endif; ?> -->