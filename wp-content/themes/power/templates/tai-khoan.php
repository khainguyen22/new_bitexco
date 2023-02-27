<?php

/*
*Template Name: Tài khoản
 **/
get_header(); ?>

<main id="site-content">
    <div class="section-inner">

        <?php
        if (!is_user_logged_in()) {

            echo 'Bạn chưa đăng nhập. Vui lòng <a href="/dang-nhap">đăng nhập</a>.';
        } else {

            $current_user = wp_get_current_user();

        ?>
            <h1><?php the_title(); ?></h1>
            <hr>
            <form id="hk-userinfo">
                <?php wp_nonce_field('form_userinfo'); ?>
                <div id="hk-message"></div>
                <p id="hk-success" style="display:none">Cập nhập thành công</p>
                <p>
                    <input type="text" name="first_name" id="first_name" placeholder="Họ" value="<?php echo $current_user->user_firstname; ?>">
                </p>
                <p>
                    <input type="text" name="last_name" id="last_name" placeholder="Tên" value="<?php echo $current_user->user_lastname; ?>">
                </p>
                <p>
                    <input type="url" name="url" id="url" placeholder="Website" value="<?php echo $current_user->user_url; ?>">
                </p>
                <p>
                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Tiểu sử"><?php echo $current_user->user_description; ?></textarea>
                </p>
                <p class="text-center mb-0">
                    <button class="form-submit" type="submit">
                        Lưu thay đổi
                    </button>
                </p>
            </form>

        <?php } ?>

    </div>
</main>

<?php get_footer(); ?>