<?php

function register_post_type_selection_results()
{

    $labels = array(
        'name'                  => _x('Kết quả lựa chọn nhà thầu', 'Post Type General Name', 'shtheme'),
        'singular_name'         => _x('Kết quả lựa chọn nhà thầu', 'Post Type Singular Name', 'shtheme'),
        'menu_name'             => __('Kết quả lựa chọn nhà thầu', 'shtheme'),
        'name_admin_bar'        => __('Kết quả lựa chọn nhà thầu', 'shtheme'),
        'archives'              => __('Item Archives', 'shtheme'),
        'attributes'            => __('Item Attributes', 'shtheme'),
        'parent_item_colon'     => __('Parent Item:', 'shtheme'),
        'all_items'             => __('Tất cả Kết quả lựa chọn nhà thầu', 'shtheme'),
        'add_new_item'          => __('Thêm Kết quả lựa chọn nhà thầu', 'shtheme'),
        'add_new'               => __('Thêm Kết quả lựa chọn nhà thầu', 'shtheme'),
        'new_item'              => __('New Item', 'shtheme'),
        'edit_item'             => __('Edit Item', 'shtheme'),
        'update_item'           => __('Update Item', 'shtheme'),
        'view_item'             => __('View Item', 'shtheme'),
        'view_items'            => __('View Items', 'shtheme'),
        'search_items'          => __('Search Item', 'shtheme'),
        'not_found'             => __('Not found', 'shtheme'),
        'not_found_in_trash'    => __('Not found in Trash', 'shtheme'),
        'featured_image'        => __('Featured Image', 'shtheme'),
        'set_featured_image'    => __('Set featured image', 'shtheme'),
        'remove_featured_image' => __('Remove featured image', 'shtheme'),
        'use_featured_image'    => __('Use as featured image', 'shtheme'),
        'insert_into_item'      => __('Insert into item', 'shtheme'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'shtheme'),
        'items_list'            => __('Items list', 'shtheme'),
        'items_list_navigation' => __('Items list navigation', 'shtheme'),
        'filter_items_list'     => __('Filter items list', 'shtheme'),

    );
    $rewrite = array(
        'slug'                  => 'selection_results',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __('Thêm Kết quả lựa chọn nhà thầu', 'shtheme'),
        'description'           => __('Post Type Description', 'shtheme'),
        'labels'                => $labels,
        'taxonomies'            => array( 'type', 'field' ),
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
    register_post_type('selection_results', $args);
}
add_action('init', 'register_post_type_selection_results', 0);

