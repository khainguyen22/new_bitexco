<?php

/*====================================================================*/
function register_post_type_events()
{

    $labels = array(
        'name'                  => _x('Sự kiện', 'Post Type General Name', 'shtheme'),
        'singular_name'         => _x('Sự kiện', 'Post Type Singular Name', 'shtheme'),
        'menu_name'             => __('Sự kiện', 'shtheme'),
        'name_admin_bar'        => __('Sự kiện', 'shtheme'),
        'archives'              => __('Item Archives', 'shtheme'),
        'attributes'            => __('Item Attributes', 'shtheme'),
        'parent_item_colon'     => __('Parent Item:', 'shtheme'),
        'all_items'             => __('Tất cả', 'shtheme'),
        'add_new_item'          => __('Thêm', 'shtheme'),
        'add_new'               => __('Thêm', 'shtheme'),
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
        'slug'                  => 'events',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __('Sự kiện', 'shtheme'),
        'description'           => __('Post Type Description', 'shtheme'),
        'labels'                => $labels,
        // 'taxonomies'            => array( 'category', 'post_tag' ),
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
    register_post_type('events', $args);
}
add_action('init', 'register_post_type_events', 0);


function register_taxonomy_type_events()
{
    $labels = array(
        'name'                       => _x('Danh mục', 'Taxonomy General Name', 'shtheme'),
        'singular_name'              => _x('Danh mục', 'Taxonomy Singular Name', 'shtheme'),
        'menu_name'                  => __('Danh mục', 'shtheme'),
        'all_items'                  => __('All Items', 'shtheme'),
        'parent_item'                => __('Parent Item', 'shtheme'),
        'parent_item_colon'          => __('Parent Item:', 'shtheme'),
        'new_item_name'              => __('New Item Name', 'shtheme'),
        'add_new_item'               => __('Add New Item', 'shtheme'),
        'edit_item'                  => __('Edit Item', 'shtheme'),
        'update_item'                => __('Update Item', 'shtheme'),
        'view_item'                  => __('View Item', 'shtheme'),
        'separate_items_with_commas' => __('Separate items with commas', 'shtheme'),
        'add_or_remove_items'        => __('Add or remove items', 'shtheme'),
        'choose_from_most_used'      => __('Choose from the most used', 'shtheme'),
        'popular_items'              => __('Popular Items', 'shtheme'),
        'search_items'               => __('Search Items', 'shtheme'),
        'not_found'                  => __('Not Found', 'shtheme'),
        'no_terms'                   => __('No items', 'shtheme'),
        'items_list'                 => __('Items list', 'shtheme'),
        'items_list_navigation'      => __('Items list navigation', 'shtheme'),
    );
    $args = array(
        'hierarchical'              => true,
        'label'                     => 'Danh mục',
        'show_ui'                   => true,
        'query_var'                 => true,
        'show_admin_column'         => true,
        'rewrite'                   => array(
            'slug'  => 'type_events',
        ),
    );
    register_taxonomy('type_events', array(0 => 'events'), $args);
}
add_action('init', 'register_taxonomy_type_events', 0);



function register_taxonomy_type_events_status()
{
    $labels = array(
        'name'                       => _x('Trạng thái sự kiện', 'Taxonomy General Name', 'shtheme'),
        'singular_name'              => _x('Trạng thái sự kiện', 'Taxonomy Singular Name', 'shtheme'),
        'menu_name'                  => __('Trạng thái sự kiện', 'shtheme'),
        'all_items'                  => __('All Items', 'shtheme'),
        'parent_item'                => __('Parent Item', 'shtheme'),
        'parent_item_colon'          => __('Parent Item:', 'shtheme'),
        'new_item_name'              => __('New Item Name', 'shtheme'),
        'add_new_item'               => __('Add New Item', 'shtheme'),
        'edit_item'                  => __('Edit Item', 'shtheme'),
        'update_item'                => __('Update Item', 'shtheme'),
        'view_item'                  => __('View Item', 'shtheme'),
        'separate_items_with_commas' => __('Separate items with commas', 'shtheme'),
        'add_or_remove_items'        => __('Add or remove items', 'shtheme'),
        'choose_from_most_used'      => __('Choose from the most used', 'shtheme'),
        'popular_items'              => __('Popular Items', 'shtheme'),
        'search_items'               => __('Search Items', 'shtheme'),
        'not_found'                  => __('Not Found', 'shtheme'),
        'no_terms'                   => __('No items', 'shtheme'),
        'items_list'                 => __('Items list', 'shtheme'),
        'items_list_navigation'      => __('Items list navigation', 'shtheme'),
    );
    $args = array(
        'hierarchical'              => true,
        'label'                     => 'Trạng thái sự kiện',
        'show_ui'                   => true,
        'query_var'                 => true,
        'show_admin_column'         => true,
        'rewrite'                   => array(
            'slug'  => 'type_events_status',
        ),
    );
    register_taxonomy('type_events_status', array(0 => 'events'), $args);
}
add_action('init', 'register_taxonomy_type_events_status', 0);



function register_taxonomy_type_events_location()
{
    $labels = array(
        'name'                       => _x('Khu vực sự kiện', 'Taxonomy General Name', 'shtheme'),
        'singular_name'              => _x('Khu vực sự kiện', 'Taxonomy Singular Name', 'shtheme'),
        'menu_name'                  => __('Khu vực sự kiện', 'shtheme'),
        'all_items'                  => __('All Items', 'shtheme'),
        'parent_item'                => __('Parent Item', 'shtheme'),
        'parent_item_colon'          => __('Parent Item:', 'shtheme'),
        'new_item_name'              => __('New Item Name', 'shtheme'),
        'add_new_item'               => __('Add New Item', 'shtheme'),
        'edit_item'                  => __('Edit Item', 'shtheme'),
        'update_item'                => __('Update Item', 'shtheme'),
        'view_item'                  => __('View Item', 'shtheme'),
        'separate_items_with_commas' => __('Separate items with commas', 'shtheme'),
        'add_or_remove_items'        => __('Add or remove items', 'shtheme'),
        'choose_from_most_used'      => __('Choose from the most used', 'shtheme'),
        'popular_items'              => __('Popular Items', 'shtheme'),
        'search_items'               => __('Search Items', 'shtheme'),
        'not_found'                  => __('Not Found', 'shtheme'),
        'no_terms'                   => __('No items', 'shtheme'),
        'items_list'                 => __('Items list', 'shtheme'),
        'items_list_navigation'      => __('Items list navigation', 'shtheme'),
    );
    $args = array(
        'hierarchical'              => true,
        'label'                     => 'Khu vực sự kiện',
        'show_ui'                   => true,
        'query_var'                 => true,
        'show_admin_column'         => true,
        'rewrite'                   => array(
            'slug'  => 'type_events_location',
        ),
    );
    register_taxonomy('type_events_location', array(0 => 'events'), $args);
}
add_action('init', 'register_taxonomy_type_events_location', 0);


function register_taxonomy_type_events_formality()
{
    $labels = array(
        'name'                       => _x('Hình thức sự kiện', 'Taxonomy General Name', 'shtheme'),
        'singular_name'              => _x('Hình thức sự kiện', 'Taxonomy Singular Name', 'shtheme'),
        'menu_name'                  => __('Hình thức sự kiện', 'shtheme'),
        'all_items'                  => __('All Items', 'shtheme'),
        'parent_item'                => __('Parent Item', 'shtheme'),
        'parent_item_colon'          => __('Parent Item:', 'shtheme'),
        'new_item_name'              => __('New Item Name', 'shtheme'),
        'add_new_item'               => __('Add New Item', 'shtheme'),
        'edit_item'                  => __('Edit Item', 'shtheme'),
        'update_item'                => __('Update Item', 'shtheme'),
        'view_item'                  => __('View Item', 'shtheme'),
        'separate_items_with_commas' => __('Separate items with commas', 'shtheme'),
        'add_or_remove_items'        => __('Add or remove items', 'shtheme'),
        'choose_from_most_used'      => __('Choose from the most used', 'shtheme'),
        'popular_items'              => __('Popular Items', 'shtheme'),
        'search_items'               => __('Search Items', 'shtheme'),
        'not_found'                  => __('Not Found', 'shtheme'),
        'no_terms'                   => __('No items', 'shtheme'),
        'items_list'                 => __('Items list', 'shtheme'),
        'items_list_navigation'      => __('Items list navigation', 'shtheme'),
    );
    $args = array(
        'hierarchical'              => true,
        'label'                     => 'Hình thức sự kiện',
        'show_ui'                   => true,
        'query_var'                 => true,
        'show_admin_column'         => true,
        'rewrite'                   => array(
            'slug'  => 'type_events_formality',
        ),
    );
    register_taxonomy('type_events_formality', array(0 => 'events'), $args);
}
add_action('init', 'register_taxonomy_type_events_formality', 0);
