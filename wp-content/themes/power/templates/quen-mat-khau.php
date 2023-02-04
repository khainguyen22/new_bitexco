<?php

/**
 * Template Name: Quên mật khẩu
 */
?>
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
    <section class="register forgot-password">
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
                    <h2 class="forget-password-title">Quên mật khẩu</h2>
                </div>
                <div class="form">
                    <form action="">
                        <div class="account-name">
                            <label for="account-name">Tên tài khoản hoặc địa chỉ email<span class="require">*</span></label>
                            <input type="text" id="account-name" class="account-name form-control" placeholder="">
                        </div>
                        <div class="notification">
                            <p>Hướng dẫn đặt lại mật khẩu sẽ được gửi đến địa chỉ email đã đăng ký của bạn</p>
                        </div>
                        <div class="submit">
                            <button class="btn btn-search register-btn">Gửi đi</button>
                        </div>
                    </form>
                    <div class="old-member">
                        <span>Bạn nhớ mật khẩu?</span>
                        <a href="">Đăng nhập</a>
                    </div>
                </div>
            </div>
            <div class="image">
                <img src="../access/images/img-login.png" alt="">
            </div>
        </div>
    </section>
</body>