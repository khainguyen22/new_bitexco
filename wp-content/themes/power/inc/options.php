<?php

add_action('acf/init', 'my_acf_op_init');

function my_acf_op_init()

{



    // Check function exists.

    if (function_exists('acf_add_options_page')) {



        // Add parent.

        $parent = acf_add_options_page(array(

            'page_title'  => __('Quản lý'),

            'menu_title'  => __('Quản lý'),

            'position' => '1',

            'redirect'    => false,

        ));



        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Trang chủ'),

            'menu_title'  => __('Trang chủ'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Tuyển dụng'),

            'menu_title'  => __('Tuyển dụng'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Thương hiệu Bitexco'),

            'menu_title'  => __('Thương hiệu Bitexco'),

            'parent_slug' => $parent['menu_slug'],

        ));



        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Ban lãnh đạo'),

            'menu_title'  => __('Ban lãnh đạo'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Danh mục dự án'),

            'menu_title'  => __('Danh mục dự án'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Thủy điện'),

            'menu_title'  => __('Thủy điện'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Các công ty thành viên'),

            'menu_title'  => __('Các công ty thành viên'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Lịch sử phát triển'),

            'menu_title'  => __('Lịch sử phát triển'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Danh sách tuyển dụng'),

            'menu_title'  => __('Danh sách tuyển dụng'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Tin tức'),

            'menu_title'  => __('Tin tức'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Dịch vụ'),

            'menu_title'  => __('Dịch vụ'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Thư viện'),

            'menu_title'  => __('Thư viện'),

            'parent_slug' => $parent['menu_slug'],

        ));



        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Quan hệ cổ đông'),

            'menu_title'  => __('Quan hệ cổ đông'),

            'parent_slug' => $parent['menu_slug'],

        ));



        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Site map'),

            'menu_title'  => __('Site map'),

            'parent_slug' => $parent['menu_slug'],

        ));



        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Điều Khoản Sử Dụng'),

            'menu_title'  => __('Điều Khoản Sử Dụng'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Trụ sở'),

            'menu_title'  => __('Trụ sở'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Liên hệ'),

            'menu_title'  => __('Liên hệ'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Thông báo mời thầu'),

            'menu_title'  => __('Thông báo mời thầu'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Kết quả lựa chọn nhà thầu chi tiết'),

            'menu_title'  => __('Kết quả lựa chọn nhà thầu chi tiết'),

            'parent_slug' => $parent['menu_slug'],

        ));



        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Thông báo mời thầu chi tiết'),

            'menu_title'  => __('Thông báo mời thầu chi tiết'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('An sinh xã hội'),

            'menu_title'  => __('An sinh xã hội'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Kinh doanh điện'),

            'menu_title'  => __('Kinh doanh điện'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Kết quả sản xuất'),

            'menu_title'  => __('Kết quả sản xuất'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Thông tin mới thầu thủy điện'),

            'menu_title'  => __('Thông tin mới thầu thủy điện'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(

            'page_title'  => __('Thông tin hữu ích'),

            'menu_title'  => __('Thông tin hữu ích'),

            'parent_slug' => $parent['menu_slug'],

        ));

        // Add sub page.

        $child = acf_add_options_page(array(
            'page_title'  => __('Chính sách bảo mật'),
            'menu_title'  => __('Chính sách bảo mật'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
}
