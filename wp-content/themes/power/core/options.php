<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "c5_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Theme Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Header', 'redux-framework-demo' ),
        'id'     => 'header',
        'desc'   => __( 'All of settings header on this theme.', 'redux-framework-demo' ),
        'icon'   => 'el el-home',
        'fields' => array(
            array(
                'id'       => 'logo-on',
                'type'     => 'switch',
                'title'    => __('Enable images logo', 'redux-framework-demo' ),
                'compiler' => 'bool',
                'desc'     => __( 'Do you want enable image logo.', 'redux-framework-demo' ),
                'on'       => __( 'Enable.', 'redux-framework-demo' ),
                'off'      => __( 'Disable.', 'redux-framework-demo' ),

            ),
             array(
                'id'       => 'logo-image',
                'type'     => 'media',
                'title'    => __('Upload images logo', 'redux-framework-demo' ),
                'desc'     => __( 'Image you want as logo.', 'redux-framework-demo' )
            ),
            array(
                'id'       => 'opt-header-address',
                'type'     => 'text',
                'title'    => __( 'Address Header', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-header-hotline',
                'type'     => 'text',
                'title'    => __( 'Hotline Header', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-ads-sticky-left',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image Sticky Left', 'redux-framework-demo' ),
                'compiler' => 'true',
                'desc'     => __( 'Image you want as logo.Size:145x550 px', 'redux-framework-demo' )
            ),
            array(
                'id'       => 'opt-ads-sticky-right',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Image Sticky Right', 'redux-framework-demo' ),
                'compiler' => 'true',
                'desc'     => __( 'Image you want as logo.Size:145x550 px', 'redux-framework-demo' )
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'  => __( 'Section Home', 'redux-framework-demo' ),
        'id'     => 'section-home',
        'desc'   => __( 'All of settings section home on this theme.', 'redux-framework-demo' ),
        'icon'   => 'el el-home',
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Giới thiệu', 'redux-framework-demo' ),
        'id'         => 'section-introduce',
        'desc'       => __( 'Options section introduce on theme', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-logo-introduce',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Media w/ URL logo', 'redux-framework-demo' ),
                'compiler' => 'true',
                'desc'     => __( 'Image you want as logo.', 'redux-framework-demo' )
            ),
            array(
                'id'       => 'opt-title-introduce',
                'type'     => 'text',
                'title'    => __( 'Tiêu đề', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-image-introduce',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Media w/ URL introduce', 'redux-framework-demo' ),
                'compiler' => 'true',
                'desc'     => __( 'Image you want as introduce.', 'redux-framework-demo' )
            ),
            array(
                'id'      => 'opt-excerpt-introduce',
                'type'    => 'editor',
                'title'   => __( 'Editor w/o Media Button', 'redux-framework-demo' ),
                'default' => 'Powered by Redux Framework.',
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    'quicktags'     => false,
                )
            ),
            array(
                'id'       => 'opt-url-introduce',
                'type'     => 'text',
                'title'    => __( 'Link readmore introduce', 'redux-framework-demo' ),
                'default'  => '#',
            ),
            array(         
                'id'       => 'opt-background-introduce',
                'type'     => 'background',
                'title'    => __('Body Background', 'redux-framework-demo'),
                'subtitle' => __('Body background with image, color, etc.', 'redux-framework-demo'),
                'output'   => array('#section-introduce'),
                'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Sản phẩm bán chạy', 'redux-framework-demo' ),
        'id'         => 'section-selling',
        'desc'       => __( 'Options section selling on theme', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-title-selling',
                'type'     => 'text',
                'title'    => __( 'Tiêu đề', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-url-selling',
                'type'     => 'text',
                'title'    => __( 'Link readmore selling', 'redux-framework-demo' ),
                'default'  => '#',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Sản phẩm nổi bật', 'redux-framework-demo' ),
        'id'         => 'section-featured',
        'desc'       => __( 'Options section featured on theme', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-title-featured',
                'type'     => 'text',
                'title'    => __( 'Tiêu đề', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-url-featured',
                'type'     => 'text',
                'title'    => __( 'Link readmore featured', 'redux-framework-demo' ),
                'default'  => '#',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => __( 'Tin tức', 'redux-framework-demo' ),
        'id'         => 'section-news',
        'desc'       => __( 'Options section news on theme', 'redux-framework-demo' ),
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'opt-title-news',
                'type'     => 'text',
                'title'    => __( 'Tiêu đề', 'redux-framework-demo' ),
                'default'  => 'Tin tức',
            ),
            array(
                'id'       => 'opt-description-news',
                'type'     => 'textarea',
                'title'    => __( 'Mô tả', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-select-news',
                'type'     => 'select',
                'data'     => 'categories',
                'title'    => __( 'Tin tức', 'redux-framework-demo' ),
                'subtitle' => __( 'Select the category you want to display', 'redux-framework-demo' ),
                'desc'     => __( 'Select the category you want to display', 'redux-framework-demo' ),
            ),
            array(
                'id'       => 'opt-url-news',
                'type'     => 'text',
                'title'    => __( 'Link readmore news', 'redux-framework-demo' ),
                'default'  => '#',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Thông tin liên hệ', 'redux-framework-demo' ),
        'id'     => 'infor-contact',
        'desc'   => __( 'All of settings sidebar on this theme.', 'redux-framework-demo' ),
        'icon'   => 'el el-home',
        'fields' => array(
            array(
                'id'       => 'opt-sidebar-address',
                'type'     => 'text',
                'title'    => __( 'Địa chỉ', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-sidebar-hotline',
                'type'     => 'text',
                'title'    => __( 'Điện thoại', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-sidebar-email',
                'type'     => 'text',
                'title'    => __( 'Email', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-sidebar-zalo_1',
                'type'     => 'text',
                'title'    => __( 'Hotline Tư Vấn 1', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-sidebar-zalo_2',
                'type'     => 'text',
                'title'    => __( 'Hotline Tư Vấn 2', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-sidebar-zalo_3',
                'type'     => 'text',
                'title'    => __( 'Hotline Tư Vấn 3', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-sidebar-zalo_4',
                'type'     => 'text',
                'title'    => __( 'Hotline Tư Vấn 4', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-sidebar-zalo_5',
                'type'     => 'text',
                'title'    => __( 'Hotline Tư Vấn 5', 'redux-framework-demo' ),
                'default'  => '',
            ),
            array(
                'id'       => 'opt-sidebar-zalo_6',
                'type'     => 'text',
                'title'    => __( 'Hotline Tư Vấn 6', 'redux-framework-demo' ),
                'default'  => '',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Page Videos', 'redux-framework-demo' ),
        'id'     => 'page-videos',
        'desc'   => __( 'All of settings videos on this theme.', 'redux-framework-demo' ),
        'icon'   => 'el el-home',
        'fields' => array(
            array(
                'id'          => 'opt-slides-videos',
                'type'        => 'slides',
                'title'       => __( 'Slides Options videos', 'redux-framework-demo' ),
                'subtitle'    => __( 'Unlimited slides with drag and drop sortings.', 'redux-framework-demo' ),
                'desc'        => __( 'This field will store all slides values into a multidimensional array to use into a foreach loop.', 'redux-framework-demo' ),
                'placeholder' => array(
                    'title'       => __( 'This is a title', 'redux-framework-demo' ),
                    'description' => __( 'Description Here', 'redux-framework-demo' ),
                    'url'         => __( 'Give us a link!', 'redux-framework-demo' ),
                ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'  => __( 'Footer', 'redux-framework-demo' ),
        'id'     => 'footer',
        'desc'   => __( 'All of settings footer on this theme.', 'redux-framework-demo' ),
        'icon'   => 'el el-home',
        'fields' => array(
            array(
                'id'       => 'opt-logofooter',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Media w/ URL', 'redux-framework-demo' ),
                'compiler' => 'true',
                'desc'     => __( 'Image you want as logo.', 'redux-framework-demo' )
            ),
            array(
                'id'       => 'opt-copyright-footer',
                'type'     => 'text',
                'title'    => __( 'Insert Copyright Footer', 'redux-framework-demo' ),
                'default'  => 'Copyright © 2020. All rights reserved. Thiết kế và phát triển bởi <a href="https://webc5.vn" title="">Webc5.vn</a>',
            ),
            array(         
                'id'       => 'opt-background-footer',
                'type'     => 'background',
                'title'    => __('Body Background', 'redux-framework-demo'),
                'subtitle' => __('Body background with image, color, etc.', 'redux-framework-demo'),
                'output'   => array('.footer-sidebar'),
                'desc'     => __('This is the description field, again good for additional info.', 'redux-framework-demo'),
            ),
        )
    ) );

    // -> Social
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social', 'redux-framework-demo' ),
        'id'               => 'social',
        'icon'             => 'el el-bookmark',
        'fields'           => array(
             array(
                    'id'       => 'switch-social',
                    'type'     => 'switch',
                    'title'    => __( 'Social On/Off', 'redux-framework-demo' ),
                    'default'  => true,
                ),
            array(
                'id'    =>'social-facebook',
                'type'  => 'text',
                'title' => __('Facebook', 'redux-framework-demo'),
            ),
            array(
                'id'    =>'social-twitter',
                'type'  => 'text',
                'title' => __('Twitter', 'redux-framework-demo'),
            ),
            array(
                'id'    =>'social-google',
                'type'  => 'text',
                'title' => __('Google +', 'redux-framework-demo'),
            ),
            array(
                'id'    =>'social-youtube',
                'type'  => 'text',
                'title' => __('Youtube', 'redux-framework-demo'),
            ),
            array(
                'id'    =>'social-linkedin',
                'type'  => 'text',
                'title' => __('Linkedin', 'redux-framework-demo'),
            ),
            array(
                'id'    =>'social-pinterest',
                'type'  => 'text',
                'title' => __('Pinterest', 'redux-framework-demo'),
            ),
            array(
                'id'    =>'social-instagram',
                'type'  => 'text',
                'title' => __('Instagram', 'redux-framework-demo'),
            ),
        )
    ) );

    // -> Information
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Social Ring', 'redux-framework-demo' ),
        'id'               => 'social-ring',
        'icon'             => 'el el-info-circle',
        'fields'           => array(
            array(
                'id'        =>'opt-social-hotline',
                'type'      => 'text',
                'title'     => __('Hotline number', 'redux-framework-demo'),
            ),
            array(
                'id'        =>'opt-social-facebook',
                'type'      => 'text',
                'title'     => __('Link facebook', 'redux-framework-demo'),
            ),
        )
    ) );
    // -> Information
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Facebook Comment', 'redux-framework-demo' ),
        'id'               => 'opt-fb-comment',
        'icon'             => 'el el-info-circle',
        'fields'           => array(
            array(
                'id'        =>'opt-id-appfb',
                'type'      => 'text',
                'title'     => __('ID App Facebook', 'redux-framework-demo'),
            ),
            array(
                'id'        =>'opt-id-adminfb',
                'type'      => 'text',
                'title'     => __('ID Admin Facebook', 'redux-framework-demo'),
            ),
        )
    ) );

    // -> Insert Code Settings Fields
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Chèn code', 'redux-framework-demo' ),
        'id'               => 'insertcode',
        'icon'             => 'el el-plus-sign',
        'fields'           => array(
            array(
                'id'        =>'opt-textarea-header',
                'type'      => 'textarea',
                'title'     => __('Insert code to header', 'redux-framework-demo'),
            ),
            array(
                'id'        =>'opt-textarea-footer',
                'type'      => 'textarea',
                'title'     => __('Insert code to footer', 'redux-framework-demo'),
            ),
            array(
                    'id'       => 'opt-textarea-maps',
                    'type'     => 'textarea',
                    'title'    => __( 'Chèn code google maps', 'redux-framework-demo' ),
                    'subtitle' => __( 'Google maps', 'redux-framework-demo' ),
                    'desc'     => __( 'Chèn mã nhúng google maps địa chỉ của bạn vào đây!' ),
                )
        )
    ) );
    /*
     * <--- END SECTIONS
     */
