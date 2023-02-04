<?php

function register_taxonomy_post_company_posts()
{
    $labels = array(
        'name' => _x('Công ty', 'Taxonomy General Name', 'shtheme'),
        'singular_name' => _x('Công ty', 'Taxonomy Singular Name', 'shtheme'),
        'menu_name' => __('Công ty', 'shtheme'),
        'all_items' => __('All Items', 'shtheme'),
        'parent_item' => __('Parent Item', 'shtheme'),
        'parent_item_colon' => __('Parent Item:', 'shtheme'),
        'new_item_name' => __('New Item Name', 'shtheme'),
        'add_new_item' => __('Add New Item', 'shtheme'),
        'edit_item' => __('Edit Item', 'shtheme'),
        'update_item' => __('Update Item', 'shtheme'),
        'view_item' => __('View Item', 'shtheme'),
        'separate_items_with_commas' => __('Separate items with commas', 'shtheme'),
        'add_or_remove_items' => __('Add or remove items', 'shtheme'),
        'choose_from_most_used' => __('Choose from the most used', 'shtheme'),
        'popular_items' => __('Popular Items', 'shtheme'),
        'search_items' => __('Search Items', 'shtheme'),
        'not_found' => __('Not Found', 'shtheme'),
        'no_terms' => __('No items', 'shtheme'),
        'items_list' => __('Items list', 'shtheme'),
        'items_list_navigation' => __('Items list navigation', 'shtheme'),
    );
    $args = array(
        'hierarchical' => true,
        'label' => 'Công ty',
        'show_ui' => true,
        'query_var' => true,
        'show_admin_column' => true,
        'rewrite' => array(
            'slug' => 'post_company_news',
        ),
    );
    register_taxonomy('post_company_news', array(0 => 'post'), $args);
}
add_action('init', 'register_taxonomy_post_company_posts', 0);

function register_taxonomy_post_type_posts()
{
    $labels = array(
        'name' => _x('Loại hình', 'Taxonomy General Name', 'shtheme'),
        'singular_name' => _x('Loại hình', 'Taxonomy Singular Name', 'shtheme'),
        'menu_name' => __('Loại hình', 'shtheme'),
        'all_items' => __('All Items', 'shtheme'),
        'parent_item' => __('Parent Item', 'shtheme'),
        'parent_item_colon' => __('Parent Item:', 'shtheme'),
        'new_item_name' => __('New Item Name', 'shtheme'),
        'add_new_item' => __('Add New Item', 'shtheme'),
        'edit_item' => __('Edit Item', 'shtheme'),
        'update_item' => __('Update Item', 'shtheme'),
        'view_item' => __('View Item', 'shtheme'),
        'separate_items_with_commas' => __('Separate items with commas', 'shtheme'),
        'add_or_remove_items' => __('Add or remove items', 'shtheme'),
        'choose_from_most_used' => __('Choose from the most used', 'shtheme'),
        'popular_items' => __('Popular Items', 'shtheme'),
        'search_items' => __('Search Items', 'shtheme'),
        'not_found' => __('Not Found', 'shtheme'),
        'no_terms' => __('No items', 'shtheme'),
        'items_list' => __('Items list', 'shtheme'),
        'items_list_navigation' => __('Items list navigation', 'shtheme'),
    );
    $args = array(
        'hierarchical' => true,
        'label' => 'Loại hình',
        'show_ui' => true,
        'query_var' => true,
        'show_admin_column' => true,
        'rewrite' => array(
            'slug' => 'post_type_news',
        ),
    );
    register_taxonomy('post_type_news', array(0 => 'post'), $args);
}
add_action('init', 'register_taxonomy_post_type_posts', 0);
