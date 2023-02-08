<?php
function register_post_type_tender_notice_projects()
{

    $labels = array(
        'name'                  => _x('Thông tin mời thầu thủy điện', 'Post Type General Name', POWER),
        'singular_name'         => _x('Thông tin mời thầu thủy điện', 'Post Type Singular Name', POWER),
        'menu_name'             => __('Thông tin mời thầu thủy điện', POWER),
        'name_admin_bar'        => __('Thông tin mời thầu thủy điện', POWER),
        'archives'              => __('Item Archives', POWER),
        'attributes'            => __('Item Attributes', POWER),
        'parent_item_colon'     => __('Parent Item:', POWER),
        'all_items'             => __('Tất cả', POWER),
        'add_new_item'          => __('Thêm', POWER),
        'add_new'               => __('Thêm', POWER),
        'new_item'              => __('New Item', POWER),
        'edit_item'             => __('Edit Item', POWER),
        'update_item'           => __('Update Item', POWER),
        'view_item'             => __('View Item', POWER),
        'view_items'            => __('View Items', POWER),
        'search_items'          => __('Search Item', POWER),
        'not_found'             => __('Not found', POWER),
        'not_found_in_trash'    => __('Not found in Trash', POWER),
        'featured_image'        => __('Featured Image', POWER),
        'set_featured_image'    => __('Set featured image', POWER),
        'remove_featured_image' => __('Remove featured image', POWER),
        'use_featured_image'    => __('Use as featured image', POWER),
        'insert_into_item'      => __('Insert into item', POWER),
        'uploaded_to_this_item' => __('Uploaded to this item', POWER),
        'items_list'            => __('Items list', POWER),
        'items_list_navigation' => __('Items list navigation', POWER),
        'filter_items_list'     => __('Filter items list', POWER),
    );
    $rewrite = array(
        'slug'                  => 't_notice_projects',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __('Thông tin mời thầu thủy điện', POWER),
        'description'           => __('Post Type Description', POWER),
        'labels'                => $labels,
        'taxonomies'            => array('type', 'status', 'field'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        // 'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'map_meta_cap'          => true,
        'rewrite'               => $rewrite,
        'query_var'             => true,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'menu_icon'             => 'dashicons-paperclip',
    );
    register_post_type('t_notice_projects', $args);
}
add_action('init', 'register_post_type_tender_notice_projects', 0);
