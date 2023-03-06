<?php

define('THEME_URL', get_stylesheet_directory());

define('CORE', THEME_URL . "/core");

define("POWER", "POWER");

load_theme_textdomain('POWER', TEMPLATEPATH . '/languages');



require_once(CORE . "/init.php");



if (!function_exists('theme_enqueue_styles')) {

    function theme_enqueue_styles()

    {

        wp_enqueue_style('style-bootstrap', get_stylesheet_directory_uri() . '/access/css/bootstrap.css', array(), false);

        wp_enqueue_style('style-font-awesome', get_stylesheet_directory_uri() . '/access/css/font-awesome.min.css', array(), false);

        wp_enqueue_style('style-lightgallery', get_stylesheet_directory_uri() . '/access/css/lightgallery.css', array(), false);

        wp_enqueue_style('style-lightslider', get_stylesheet_directory_uri() . '/access/css/lightslider.min.css', array(), false);

        wp_enqueue_style('style-slick', get_stylesheet_directory_uri() . '/access/css/slick.min.css', array(), false);

        // wp_enqueue_style('style-css', get_stylesheet_directory_uri() . '/access/styles/index.css', array(), false);

        wp_enqueue_style('style-scss', get_stylesheet_directory_uri() . '/access/css/index.css', array(), false);

        // wp_enqueue_style('custom.css', get_stylesheet_directory_uri() . '/access/styles/custom.css', array(), false);



        wp_enqueue_script('script-jquery', get_template_directory_uri() . '/access/js/jquery.min.js', array('jquery'), 1.1, false);

        wp_enqueue_script('lightslider', get_template_directory_uri() . '/access/js/lightslider.js', array('jquery'), 1.1, false);

        // wp_enqueue_script('lightgallery-min', get_template_directory_uri() . '/access/js/lightgallery.min.js', array('jquery'), 1.1, false);

        // wp_enqueue_script('lightgallery', get_template_directory_uri() . '/access/js/lightgallery.js', array('jquery'), 1.1, false);

        wp_enqueue_script('popper', get_template_directory_uri() . '/access/js/popper.min.js', array('jquery'), 1.1, false);
        wp_enqueue_script('script-slick', get_template_directory_uri() . '/access/js/slick.min.js', array('jquery'), 1.1, false);

        wp_enqueue_script('bootstrap-min', get_template_directory_uri() . '/access/js/bootstrap.min.js', array('jquery'), 1.1, false);

        wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/access/js/bootstrap.bundle.min.js', array('jquery'), 1.1, false);

        wp_enqueue_script('carousel-slick', get_template_directory_uri() . '/access/js/carousel-slick.min.js', array('jquery'), 1.1, false);

        wp_enqueue_script('fancybox', get_template_directory_uri() . '/access/js/fancybox.umd.js', array('jquery'), 1.1, false);

        wp_enqueue_script('script-function', get_template_directory_uri() . '/access/js/functions.js', array('jquery'), 1.1, false);

        wp_enqueue_script('script-quan-he-co-dong', get_template_directory_uri() . '/access/js/quan-he-co-dong.js', array('jquery'), 1.1, false);

        wp_enqueue_script('site-map', get_template_directory_uri() . '/access/js/site-map.js', array('jquery'), 1.1, false);

        wp_enqueue_script('script-thuong-hieu-bitexco', get_template_directory_uri() . '/access/js/thuong-hieu-bitexco.js', array('jquery'), 1.1, false);

        wp_enqueue_script('thong-bao-moi-thau', get_template_directory_uri() . '/access/js/thong-bao-moi-thau.js', array('jquery'), 1.1, false);

        wp_enqueue_script('thong-tin-huu-ich', get_template_directory_uri() . '/access/js/thong-tin-huu-ich.js', array('jquery'), 1.1, false);

        wp_enqueue_script('header', get_template_directory_uri() . '/access/js/header.js', array('jquery'), 1.1, false);

        wp_enqueue_script('prevent-script-injection', get_template_directory_uri() . '/access/js/prventScriptInjection.js', array('jquery'), 1.1, false);

        wp_enqueue_script('thu-vien', get_template_directory_uri() . '/access/js/thu-vien.js', array('jquery'), 1.1, false);
    }
}

add_action('init', 'theme_enqueue_styles');





function my_scripts()
{

    // wp_enqueue_script('lightgallery', get_template_directory_uri() . '/access/js/lightgallery.js', array('jquery'), 1.1, false);
    // if (is_page(array('tuyen-dung'))) {
    wp_enqueue_script('script-tuyen-dung', get_template_directory_uri() . '/access/js/tuyen-dung.js', array('jquery'), 1.1, false);
    // }

    if (is_page(array('lich-su-phat-trien'))) {
        wp_enqueue_script('script-lich-su-phat-trien', get_template_directory_uri() . '/access/js/lich-su-phat-trien.js', array('jquery'), 1.1, false);
    }


    // wp_enqueue_script('waypoints', get_template_directory_uri() . '/access/js/waypoints.js', array('jquery'), 1.1, false);
    // wp_enqueue_script('countup', get_template_directory_uri() . '/access/js/jquery.countup.js', array('jquery'), 1.1, false);
}

add_action('wp_enqueue_scripts', 'my_scripts');



function add_additional_class_on_li($classes, $item, $args)

{

    if (isset($args->add_li_class)) {

        $classes[] = $args->add_li_class;
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_menuclass($ulclass)

{

    return preg_replace('/<a /', '<a class="nav-item-link"', $ulclass);
}

add_filter('wp_nav_menu', 'add_menuclass');


function your_custom_menu_item($items, $args)

{

    if ($args->theme_location == 'primary_menu') {

        $items .= '<li class=" nav-item nav-item-icon-search">

                            <svg  class="search-button"  width="20" height="20" viewBox="0 0 20 20" fill="none"

                                xmlns="http://www.w3.org/2000/svg">

                                <ellipse cx="9.16667" cy="9.16667" rx="6.66667" ry="6.66667" stroke="white"

                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                                <path d="M13.75 14.1318L17.9167 18.2985" stroke="white" stroke-width="1.5"

                                    stroke-linecap="round" stroke-linejoin="round" />

                            </svg>

                            <svg class="close-button" xmlns="http://www.w3.org/2000/svg" width="20" height="20"

                                viewBox="0 0 20 20" fill="none">

                                <path d="M4.16729 15.8327L15.8335 4.1665" stroke="#2B3F6C" stroke-width="1.5"

                                    stroke-linecap="round" stroke-linejoin="round" />

                                <path d="M4.16729 4.16729L15.8335 15.8335" stroke="#2B3F6C" stroke-width="1.5"

                                    stroke-linecap="round" stroke-linejoin="round" />

                            </svg>

                        </li>';

        $items .= ' <li class="nav-item ">

                            <span class="header-mobile-menu-icon " id="header-mobile-menu-icon">

                                <span class="burger" id="burger">

                                    <span class="burger-line"></span>

                                    <span class="burger-line"></span>

                                    <span class="burger-line"></span>

                                </span>

                            </span>

                        </li>';
    }

    return $items;
}

add_filter('wp_nav_menu_items', 'your_custom_menu_item', 10, 2);







if (!function_exists('specia_setup')) :

    function specia_setup()

    {

        /*

	 * Make theme available for translation.

	 */

        load_theme_textdomain('specia', get_template_directory() . '/languages');



        // Add default posts and comments RSS feed links to head.

        add_theme_support('automatic-feed-links');



        /*

	 * Let WordPress manage the document title.

	 */

        add_theme_support('title-tag');



        /*

	 * Enable support for Post Thumbnails on posts and pages.

	 */

        add_theme_support('post-thumbnails');



        add_image_size('videos-thumbnail', 100, 100, true);



        // This theme uses wp_nav_menu() in one location.

        register_nav_menus(array(

            'primary_menu' => esc_html__('Primary Menu', 'specia'),

            'category_menu' => esc_html__('Category Menu', 'specia'),

        ));



        /*

	 * Switch default core markup for search form, comment form, and comments

	 * to output valid HTML5.

	 */

        add_theme_support('html5', array(

            'search-form',

            'comment-form',

            'comment-list',

            'gallery',

            'caption',

        ));



        //Add selective refresh for sidebar widget

        add_theme_support('customize-selective-refresh-widgets');



        //Add custom logo support

        add_theme_support('custom-logo');



        /*

	 * WooCommerce Plugin Support

	 */

        add_theme_support('woocommerce');



        /*

	 * This theme styles the visual editor to resemble the theme style,

	 * specifically font, colors, icons, and column width.

	 */

        add_editor_style(array('css/editor-style.css', specia_google_font()));
    }

endif;

add_action('after_setup_theme', 'specia_setup');



/**

 * Set the content width in pixels, based on the theme's design and stylesheet.

 */

function specia_content_width()

{

    $GLOBALS['content_width'] = apply_filters('specia_content_width', 1170);
}

add_action('after_setup_theme', 'specia_content_width', 0);



/**

 * All Styles & Scripts.

 */

require_once get_template_directory() . '/inc/enqueue.php';



/**

 * Bootstrap Nav Walker.

 */

if (!class_exists('specia_nav_walker')) {

    require_once get_template_directory() . '/inc/specia-nav-walker.php';
}



/**

 * Implement the Custom Header feature.

 */

require_once get_template_directory() . '/inc/custom-header.php';



/**

 * Called Breadcrumb

 */

require_once get_template_directory() . '/inc/breadcrumb/breadcrumb.php';



/**

 * Sidebar.

 */

require_once get_template_directory() . '/inc/sidebar/sidebar.php';



/**

 * Widgets.

 */

require_once get_template_directory() . '/inc/widget/widget_feature.php';



/**

 * Custom template tags for this theme.

 */

require_once get_template_directory() . '/inc/template-tags.php';



/**

 * Load Jetpack compatibility file.

 */

require_once get_template_directory() . '/inc/jetpack.php';



/**

 * Load Sanitization file.

 */

require_once get_template_directory() . '/inc/sanitization.php';



/**

 * Called all the Customize file.

 */

require_once(get_template_directory() . '/inc/customize/specia-customizer.php');



/**

 * widget to bài viết mới

 */

class Sidebar_Post extends WP_Widget

{

    function __construct()

    {

        parent::__construct(

            'sidebar_post',

            'Bài viết theo danh mục',

            array('description'  =>  'Widget hiển thị bài viết mới theo danh mục')

        );
    }

    function form($instance)

    {

        $default = array(

            'title' => 'Tiêu đề ',

            'post_number' => 5,

            'addclass' => '',

            'select' => ''

        );

        $instance = wp_parse_args((array) $instance, $default);

        $title = esc_attr($instance['title']);

        $select = esc_attr($instance['select']);

        $post_number = esc_attr($instance['post_number']);

        $addclass = esc_attr($instance['addclass']);

        echo '<p>Nhp tiêu đề <input type="text" class="widefat" name="' . $this->get_field_name('title') . '" value="' . $title . '"/></p>';

        echo '<p>Số lượng bài viết hiển thị <input type="number" class="widefat" name="' . $this->get_field_name('post_number') . '" value="' . $post_number . '" placeholder="' . $post_number . '" max="30" /></p>';

?>

        <!-- Category Select Menu -->

        <p>

            <select id="<?php echo $this->get_field_id('select'); ?>" name="<?php echo $this->get_field_name('select'); ?>" class="widefat" style="width:100%;">

                <?php foreach (get_terms('category', 'parent=0&hide_empty=0') as $term) { ?>

                    <option <?php selected($instance['select'], $term->term_id); ?> value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>

                <?php } ?>

            </select>

        </p>

        <select name="<?php echo $this->get_field_name('addclass'); ?>" id="<?php echo $this->get_field_id('addclass'); ?>">

            <option <?php selected('post-style-1', $instance['addclass']); ?> value="post-style-1">Style 1 Image Left</option>

            <option <?php selected('post-style-2', $instance['addclass']); ?> value="post-style-2">Style 2 Image Right</option>

            <option <?php selected('post-style-3', $instance['addclass']); ?> value="post-style-3">Style 3 Image Center</option>

            <option <?php selected('post-style-4', $instance['addclass']); ?> value="post-style-4">Style 4 Image Top</option>

        </select>

        <?php

    }

    function update($new_instance, $old_instance)

    {

        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);

        $instance['select'] = strip_tags($new_instance['select']);

        $instance['post_number'] = strip_tags($new_instance['post_number']);

        $instance['addclass'] = strip_tags($new_instance['addclass']);

        return $instance;
    }

    function widget($args, $instance)

    {

        extract($args);

        $title = apply_filters('widget_title', $instance['title']);

        $post_number = $instance['post_number'];

        $select = $instance['select'];

        $addclass = $instance['addclass'];

        echo $before_widget;

        echo $before_title . $title . $after_title;

        $sidebar_post = new WP_Query('posts_per_page=' . $post_number . '&orderby=date&cat=' . $select . '');

        if ($sidebar_post->have_posts()) :

            echo '<ul class="sidebar-post ' . $addclass . '">';

            while ($sidebar_post->have_posts()) :

                $sidebar_post->the_post(); ?>

                <li>

                    <div class="img-sidebarpost">

                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>

                    </div>

                    <div class="name-sidebarpost">

                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

                        <span class="post-time"><i class="far fa-calendar-alt"></i> <?php the_time('d,m,Y') ?></span>

                    </div>

                </li>

        <?php endwhile;

            echo "</ul>";

        endif;

        echo $after_widget;
    }
}

add_action('widgets_init', 'create_sidebarpost_widget');

function create_sidebarpost_widget()

{

    register_widget('Sidebar_Post');
}



add_filter('wp_get_attachment_image_attributes', function ($attr) {

    if (isset($attr['class'])  && 'custom-logo' === $attr['class'])

        $attr['class'] = 'custom-logo navbar-brand';



    return $attr;
});



/*text editer*/

function ilc_mce_buttons($buttons)

{

    array_push(

        $buttons,

        "backcolor",

        "anchor",

        "hr",

        "sub",

        "sup",

        "fontselect",

        "fontsizeselect",

        "fontfamilyselect",

        "alignjustify",

        "cleanup"

    );

    return $buttons;
}

add_filter("mce_buttons_2", "ilc_mce_buttons");

/*excerpt editer*/

function the_excerpt_max_charlength($charlength)

{

    $excerpt = get_the_excerpt();

    $charlength++;



    if (mb_strlen($excerpt) > $charlength) {

        $subex = mb_substr($excerpt, 0, $charlength - 5);

        $exwords = explode(' ', $subex);

        $excut = - (mb_strlen($exwords[count($exwords) - 1]));

        if ($excut < 0) {

            echo mb_substr($subex, 0, $excut);
        } else {

            echo $subex;
        }

        echo '...';
    } else {

        echo $excerpt;
    }
}



if (!function_exists('specia_logo')) {

    function specia_logo()

    { ?>

        <?php

        global $c5_options;

        if ($c5_options['logo-on'] == 0) :

        ?>

            <?php if (function_exists('the_custom_logo')) : the_custom_logo();

            endif; ?>

        <?php else : ?>

            <img src="<?php echo $c5_options['logo-image']['url'] ?>" alt="" />

        <?php endif; ?>

<?php

    }
}



/* Count view post

**/

function postview_set($postID)

{

    $count_key  = 'postview_number';

    $count      = get_post_meta($postID, $count_key, true);

    if ($count == '') {

        $count = 0;

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');
    } else {

        $count++;

        update_post_meta($postID, $count_key, $count);
    }
}



function postview_get($postID)

{

    $count_key  = 'postview_number';

    $count      = get_post_meta($postID, $count_key, true);

    if ($count == '') {

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

        return '0 ' . __('Lượt xem', 'shtheme');
    }

    return $count . ' ' . __('Lượt xem', 'shtheme');
}



add_filter('use_block_editor_for_post', '__return_false');



/**

 * Rename product data tabs

 */

add_filter('woocommerce_product_tabs', 'woo_rename_tabs', 98);

function woo_rename_tabs($tabs)

{



    $tabs['description']['title'] = __('Thông tin sản phẩm');

    // Rename the description



    $tabs['attrib_desc_tab'] = array(

        'title'     => __('Thông số kỹ thuật', 'woocommerce'),

        'priority'  => 100,

        'callback'  => 'woo_attrib_desc_tab_content'

    );

    return $tabs;
}

function woo_attrib_desc_tab_content()

{

    // The new tab content

    echo $variable = get_field('thong-so-ky-thuat');
}

/* tạo single category */

add_filter('single_template', 'check_for_category_single_template');

function check_for_category_single_template($t)

{

    foreach ((array) get_the_category() as $cat) {

        if (file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php")) return TEMPLATEPATH . "/single-{$cat->slug}.php";

        if ($cat->parent) {

            $cat = get_the_category_by_ID($cat->parent);

            if (file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php")) return TEMPLATEPATH . "/single-{$cat->slug}.php";
        }
    }

    return $t;
}



add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol($currency_symbol, $currency)

{

    switch ($currency) {

        case 'VND':

            $currency_symbol = 'VNĐ';

            break;
    }

    return $currency_symbol;
}



add_filter('woocommerce_output_related_products_args', 'jk_related_products_args');

function jk_related_products_args($args)

{



    $args['posts_per_page'] = 8; // 4 related products

    $args['columns'] = 4; // arranged in 2 columns

    return $args;
}

global $devvn_quickbuy;

remove_action('woocommerce_single_product_summary', array($devvn_quickbuy, 'add_button_quick_buy'), 35);

/*Xóa trường không cần thiết trong trang thanh toán*/

add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

function custom_override_checkout_fields($fields)

{

    unset($fields['billing']['billing_company']);

    unset($fields['billing']['billing_country']);

    unset($fields['billing']['billing_address_2']);

    unset($fields['billing']['billing_city']);

    unset($fields['billing']['billing_state']);

    unset($fields['billing']['billing_postcode']);

    unset($fields['billing']['billing_postcode']);

    return $fields;
}





/**

 * Ensure cart contents update when products are added to the cart via AJAX

 */



add_filter('woocommerce_show_page_title', '__return_false');

global $user_ID;

if ($user_ID) {

    if (!current_user_can('administrator')) {

        if (

            strlen($_SERVER['REQUEST_URI']) > 255 ||

            stripos($_SERVER['REQUEST_URI'], "eval(") ||

            stripos($_SERVER['REQUEST_URI'], "CONCAT") ||

            stripos($_SERVER['REQUEST_URI'], "UNION+SELECT") ||

            stripos($_SERVER['REQUEST_URI'], "base64")

        ) {

            @header("HTTP/1.1 414 Request-URI Too Long");

            @header("Status: 414 Request-URI Too Long");

            @header("Connection: Close");

            @exit;
        }
    }
}



?>

<?php add_action('wp_footer', 'mycustom_wp_footer');

function mycustom_wp_footer()

{

?>

    <script type="text/javascript">
        document.addEventListener('wpcf7mailsent', function(event) {

            if ('6' == event.detail.contactFormId) { // Change 123 to the ID of the form 

                jQuery('#SuccessfulForm ').modal('show'); //this is the bootstrap modal popup id

            }

            if ('12' == event.detail.contactFormId) { // Change 123 to the ID of the form 

                jQuery('#SuccessfulForm ').modal('show'); //this is the bootstrap modal popup id

            }

            if ('13' == event.detail.contactFormId) { // Change 123 to the ID of the form 

                jQuery('#SuccessfulForm ').modal('show'); //this is the bootstrap modal popup id

            }

        }, false);
    </script>

<?php  } ?>

<?php function hocwp_theme_custom_woocommerce_is_purchasable_filter($can, $product)

{

    if ('' == $product->get_price()) {

        $can = $product->exists() && ('publish' === $product->get_status() || current_user_can('edit_post', $product->get_id()));
    }



    return $can;
}



add_filter('woocommerce_is_purchasable', 'hocwp_theme_custom_woocommerce_is_purchasable_filter', 10, 2);

function hocwp_theme_wc_product_data_filter($value, $data)

{

    if (empty($value)) {

        $value = 0;
    }



    return $value;
}







function filter_press_tax_projects($query)

{

    if ($query->is_tax('type_projects') && is_tax('type_projects')) :

        $query->set('posts_per_page', 10);

        return;

    endif;
}

add_action('pre_get_posts', 'filter_press_tax_projects');

// news



add_filter('woocommerce_product_get_price', 'hocwp_theme_wc_product_data_filter', 10, 2);



function filter_press_tax_company_member($query)

{

    if ($query->is_tax('type_company_member') && is_tax('type_company_member')) :

        $query->set('posts_per_page', 10);

        return;

    endif;
}

add_action('pre_get_posts', 'filter_press_tax_company_member');



function filter_press_tax_vacancies($query)

{

    if ($query->is_tax('type_vacancies') && is_tax('type_vacancies')) :

        $query->set('posts_per_page', 10);

        return;

    endif;
}

add_action('pre_get_posts', 'filter_press_tax_vacancies');

// news





add_filter('woocommerce_product_get_price', 'hocwp_theme_wc_product_data_filter', 10, 2);

/*====================================================================*/





function filter_press_tax_library($query)

{

    if ($query->is_tax('type_library') && is_tax('type_library')) :

        $query->set('posts_per_page', 10);

        return;

    endif;
}

add_action('pre_get_posts', 'filter_press_tax_library');



function filter_press_tax_events($query)

{

    if ($query->is_tax('type_events') && is_tax('type_events')) :

        $query->set('posts_per_page', 10);

        return;

    endif;
}

add_action('pre_get_posts', 'filter_press_tax_events');



// Ajax

include(get_template_directory() . '/inc/ajax/genaral_ajax_process.php');

include(get_template_directory() . '/inc/ajax/ajax_process.php');





// Options

include(get_template_directory() . '/inc/options.php');



// Post types

include(get_template_directory() . '/inc/post-types/danh-muc-du-an-thuy-dien.php');

include(get_template_directory() . '/inc/post-types/cac-cong-ty-thanh-vien.php');

include(get_template_directory() . '/inc/post-types/tin-tuc.php');

include(get_template_directory() . '/inc/post-types/vi-tri-tuyen-dung.php');

include(get_template_directory() . '/inc/post-types/thong-tin-co-dong.php');

include(get_template_directory() . '/inc/post-types/bao-cao-tai-chinh.php');

include(get_template_directory() . '/inc/post-types/tai-lieu-co-dong.php');

include(get_template_directory() . '/inc/post-types/bao-cao-thuong-nien.php');

include(get_template_directory() . '/inc/post-types/thu-vien.php');

include(get_template_directory() . '/inc/post-types/thong-bao-moi-thau.php');

include(get_template_directory() . '/inc/post-types/thong-tin-moi-thau-thuy-dien.php');

include(get_template_directory() . '/inc/post-types/ket-qua-lua-chon-nha-thau.php');

include(get_template_directory() . '/inc/post-types/an-sinh-xa-hoi.php');

include(get_template_directory() . '/inc/post-types/su-kien.php');

include(get_template_directory() . '/inc/post-types/kinh-doanh-dien.php');

include(get_template_directory() . '/inc/post-types/thong-tin-bao-chi.php');





// Paint if Exists

function paint_if_exist($param)

{

    return isset($param) ? $param : '';
}





//CODE LAY LUOT XEM

function getPostViews($postID)

{

    $count_key = 'post_views_count';

    $count = get_post_meta($postID, $count_key, true);

    if ($count == '') {

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');

        return "<b>01 </b>";
    }

    return $count . ' ';
}



// CODE DEM LUOT XEM

function setPostViews($postID)

{

    $count_key = 'post_views_count';

    $count = get_post_meta($postID, $count_key, true);

    if ($count == '') {

        $count = 0;

        delete_post_meta($postID, $count_key);

        add_post_meta($postID, $count_key, '0');
    } else {

        $count++;

        update_post_meta($postID, $count_key, $count);
    }
}



//CODE HIEN THI SO LUOT XEM BAI VIET TRONG DASHBOARDH

add_filter('manage_posts_columns', 'posts_column_views');

add_action('manage_posts_custom_column', 'posts_custom_column_views', 5, 2);

function posts_column_views($defaults)

{

    $defaults['post_views'] = __('Lượt xem');

    return $defaults;
}

function posts_custom_column_views($column_name, $id)

{

    if ($column_name === 'post_views') {

        echo getPostViews(get_the_ID());
    }
}

add_shortcode('csw_search_form', 'csw_search_form_fc');

function csw_search_form_fc()

{



?>

    <form id="searchForm" class="csw-search-form d-flex align-items-center" method="get" action="<?php echo get_home_url() ?>">
        <span class="error-message d-none">Vui lòng nhập thông tin tìm kiếm.</span>
        <button type="submit" class="btn-submit-icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">

                <circle cx="11" cy="11.5" r="8" stroke="#0D0D0E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

                <path d="M16.5 17.458L21.5 22.458" stroke="#0D0D0E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />

            </svg></button>

        <input type="text" class="csw-search-field search-input" id='input-form-search' placeholder="Nhập nội dung tìm kiếm" name="s" value="">

        <button type="submit" class="csw-search-submit" id='btn-submit-form-search'></button>

    </form>

<?php

}



add_filter('wpseo_breadcrumb_links', 'yoast_seo_breadcrumb_append_link');



function yoast_seo_breadcrumb_append_link($links)

{

    global $post;



    if (is_singular('vacancies')) {

        $breadcrumb[] = array(

            'url' => site_url('/danh-sach-tuyen-dung/'),

            'text' => ' Danh sách tuyển dụng',

        );



        array_splice($links, 1, -2, $breadcrumb);
    }

    if (is_singular('post')) {

        $breadcrumb[] = array(

            'url' => site_url('/hoat-dong-san-xuat-kinh-doanh/'),

            'text' => ' Tin tức',

        );



        array_splice($links, 1, -2, $breadcrumb);
    }

    if (is_page('an-sinh-xa-hoi') && $post->post_parent) {

        $breadcrumb[] = array(

            'url' => site_url('/an-sinh-xa-hoi/'),

            'text' => ' An sinh xã hội',

        );



        array_splice($links, 1, -2, $breadcrumb);
    }



    return $links;
}

function load_admin_style()

{

    wp_enqueue_style('admin_css', get_template_directory_uri() . '/access/css/develop.css', false, '1.0.0');
}

add_action('admin_enqueue_scripts', 'load_admin_style');

add_action('login_enqueue_scripts', 'load_admin_style', 10);



function register_my_menu()

{

    register_nav_menu('other_menu', __('Other Menu'));
}

add_action('init', 'register_my_menu');



/* Disable WordPress Admin Bar for all users */

// add_filter('show_admin_bar', '__return_false');



function custom_login_redirect()

{

    global $wp;

    return home_url($wp->request);
}



add_filter('login_redirect', 'custom_login_redirect');
// format phone number 
function formatPhoneNumber($phone)
{
    $phone_check  = preg_replace('/[^0-9]/', '', $phone);
    $country_code = '+84';
    $phoneNumber = $country_code . substr($phone_check, 1);
    if (strlen($phoneNumber) > 10) {
        $countryCode = substr($phoneNumber, 0, strlen($phoneNumber) - 10);
        $areaCode = substr($phoneNumber, -10, 3);
        $nextThree = substr($phoneNumber, -7, 3);
        $lastFour = substr($phoneNumber, -4, 4);
        $phoneNumber = $countryCode . ' ' . $areaCode . ' ' . $nextThree . ' ' . $lastFour;
    } else if (strlen($phoneNumber) == 10) {
        $areaCode = substr($phoneNumber, 0, 3);
        $nextThree = substr($phoneNumber, 3, 3);
        $lastFour = substr($phoneNumber, 6, 4);
        $phoneNumber = '(' . $areaCode . ') ' . $nextThree . ' ' . $lastFour;
    } else if (strlen($phoneNumber) == 7) {
        $nextThree = substr($phoneNumber, 0, 3);
        $lastFour = substr($phoneNumber, 3, 4);
        $phoneNumber = $nextThree . ' ' . $lastFour;
    }
    return $phoneNumber;
}

function formatedPhoneNumber($phone)
{

    $formatted_phone = sprintf(
        "%s %s %s %s",
        substr($phone, 0, 1), // first 3 digits
        substr($phone, 1, 3), // next 3 digits
        substr($phone, 4, 3),  // last 4 digits
        substr($phone, 7, 3)
    );
    $formatted_phone = "+84" . substr_replace($formatted_phone, "", 0, 1); // replace the first character with ""
    return $formatted_phone;
}
$recaptcha = $_POST['g-recaptcha-response'];
$res = reCaptcha($recaptcha);
if ($res['success']) {
    // Send email
} else {
    // Error
}

function reCaptcha($recaptcha)
{
    $secret = "6Lf7JNAkAAAAAFTE8Q1F6vCFP_5yPiviROYqniON";
    $ip = $_SERVER['REMOTE_ADDR'];

    $postvars = array("secret" => $secret, "response" => $recaptcha, "remoteip" => $ip);
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
    $data = curl_exec($ch);
    curl_close($ch);

    return json_decode($data, true);
}

function custom_login_error_message()
{
    // Change the error message to a custom message and translate it
    $message = __('Xin lỗi, thông tin của bạn không chính xác. Vui lòng thử lại.', POWER);
    return $message;
}
add_filter('login_errors', 'custom_login_error_message');

/**
 * Prevent non-logged-in users to leave a comment but 
 * let them see the comments list
 * 
 * @return
 * @param
 */
function my_comment_form_defaults( $defaults ) {
    if ( ! is_user_logged_in() ) {
        $defaults['comment_notes_before'] = '<p class="comment-notes">Please <a href="' . wp_login_url() . '">log in</a> to leave a comment.</p>';
    }
    return $defaults;
}
add_filter( 'comment_form_defaults', 'my_comment_form_defaults' );

/**
 * 
 * Click comment form button ridirect to login page
 * 
 * @return
 * @param
 *
 */
function my_comment_redirect() {
    if ( ! is_user_logged_in() && empty( $_POST['comment'] ) ) {
        wp_redirect( wp_login_url() );
    } elseif ( ! is_user_logged_in() ) {
        wp_redirect( wp_login_url() );
        exit;
    }
}
add_action( 'comment_post', 'my_comment_redirect' );