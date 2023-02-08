<?php
function register_post_type_tender_notice()
{

    $labels = array(
        'name'                  => _x('Thông Báo Mời Thầu', 'Post Type General Name', POWER),
        'singular_name'         => _x('Thông Báo Mời Thầu', 'Post Type Singular Name', POWER),
        'menu_name'             => __('Thông Báo Mời Thầu', POWER),
        'name_admin_bar'        => __('Thông Báo Mời Thầu', POWER),
        'archives'              => __('Item Archives', POWER),
        'attributes'            => __('Item Attributes', POWER),
        'parent_item_colon'     => __('Parent Item:', POWER),
        'all_items'             => __('Tất cả Thông Báo Mời Thầu', POWER),
        'add_new_item'          => __('Thêm Thông Báo Mời Thầu', POWER),
        'add_new'               => __('Thêm Thông Báo Mời Thầu', POWER),
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
        'slug'                  => 'tender_notice',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __('Thông Báo Mời Thầu', POWER),
        'description'           => __('Post Type Description', POWER),
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
    register_post_type('tender_notice', $args);
}
add_action('init', 'register_post_type_tender_notice', 0);

function register_taxonomy_type_status()
{
    $labels = array(
        'name'                       => _x('Trạng Thái', 'Taxonomy General Name', POWER),
        'singular_name'              => _x('Trạng Thái', 'Taxonomy Singular Name', POWER),
        'menu_name'                  => __('Trạng Thái', POWER),
        'all_items'                  => __('All Items', POWER),
        'parent_item'                => __('Parent Item', POWER),
        'parent_item_colon'          => __('Parent Item:', POWER),
        'new_item_name'              => __('New Item Name', POWER),
        'add_new_item'               => __('Add New Item', POWER),
        'edit_item'                  => __('Edit Item', POWER),
        'update_item'                => __('Update Item', POWER),
        'view_item'                  => __('View Item', POWER),
        'separate_items_with_commas' => __('Separate items with commas', POWER),
        'add_or_remove_items'        => __('Add or remove items', POWER),
        'choose_from_most_used'      => __('Choose from the most used', POWER),
        'popular_items'              => __('Popular Items', POWER),
        'search_items'               => __('Search Items', POWER),
        'not_found'                  => __('Not Found', POWER),
        'no_terms'                   => __('No items', POWER),
        'items_list'                 => __('Items list', POWER),
        'items_list_navigation'      => __('Items list navigation', POWER),
    );
    $args = array(
        'hierarchical'              => true,
        'label'                     => 'Trạng Thái',
        'show_ui'                   => true,
        'query_var'                 => true,
        'show_admin_column'         => true,
        'rewrite'                   => array(
            'slug'  => 'status',
        ),
    );
    register_taxonomy('status', array(0 => 'tender_notice'), $args);
}
add_action('init', 'register_taxonomy_type_status', 0);

function register_taxonomy_type()
{
    $labels = array(
        'name'                       => _x('Loại Hình', 'Taxonomy General Name', POWER),
        'singular_name'              => _x('Loại Hình', 'Taxonomy Singular Name', POWER),
        'menu_name'                  => __('Loại Hình', POWER),
        'all_items'                  => __('All Items', POWER),
        'parent_item'                => __('Parent Item', POWER),
        'parent_item_colon'          => __('Parent Item:', POWER),
        'new_item_name'              => __('New Item Name', POWER),
        'add_new_item'               => __('Add New Item', POWER),
        'edit_item'                  => __('Edit Item', POWER),
        'update_item'                => __('Update Item', POWER),
        'view_item'                  => __('View Item', POWER),
        'separate_items_with_commas' => __('Separate items with commas', POWER),
        'add_or_remove_items'        => __('Add or remove items', POWER),
        'choose_from_most_used'      => __('Choose from the most used', POWER),
        'popular_items'              => __('Popular Items', POWER),
        'search_items'               => __('Search Items', POWER),
        'not_found'                  => __('Not Found', POWER),
        'no_terms'                   => __('No items', POWER),
        'items_list'                 => __('Items list', POWER),
        'items_list_navigation'      => __('Items list navigation', POWER),
    );
    $args = array(
        'hierarchical'              => true,
        'label'                     => 'Loại Hình',
        'show_ui'                   => true,
        'query_var'                 => true,
        'show_admin_column'         => true,
        'rewrite'                   => array(
            'slug'  => 'type',
        ),
    );
    register_taxonomy('type', array(0 => 'tender_notice'), $args);
}
add_action('init', 'register_taxonomy_type', 0);

function register_taxonomy_field()
{
    $labels = array(
        'name'                       => _x('Lĩnh Vực', 'Taxonomy General Name', POWER),
        'singular_name'              => _x('Lĩnh Vực', 'Taxonomy Singular Name', POWER),
        'menu_name'                  => __('Lĩnh Vực', POWER),
        'all_items'                  => __('All Items', POWER),
        'parent_item'                => __('Parent Item', POWER),
        'parent_item_colon'          => __('Parent Item:', POWER),
        'new_item_name'              => __('New Item Name', POWER),
        'add_new_item'               => __('Add New Item', POWER),
        'edit_item'                  => __('Edit Item', POWER),
        'update_item'                => __('Update Item', POWER),
        'view_item'                  => __('View Item', POWER),
        'separate_items_with_commas' => __('Separate items with commas', POWER),
        'add_or_remove_items'        => __('Add or remove items', POWER),
        'choose_from_most_used'      => __('Choose from the most used', POWER),
        'popular_items'              => __('Popular Items', POWER),
        'search_items'               => __('Search Items', POWER),
        'not_found'                  => __('Not Found', POWER),
        'no_terms'                   => __('No items', POWER),
        'items_list'                 => __('Items list', POWER),
        'items_list_navigation'      => __('Items list navigation', POWER),
    );
    $args = array(
        'hierarchical'              => true,
        'label'                     => 'Lĩnh Vực',
        'show_ui'                   => true,
        'query_var'                 => true,
        'show_admin_column'         => true,
        'rewrite'                   => array(
            'slug'  => 'field',
        ),
    );
    register_taxonomy('field', array(0 => 'tender_notice'), $args);
}
add_action('init', 'register_taxonomy_field', 0);
