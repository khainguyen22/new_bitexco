jQuery(document).ready(function ($) {

    $('.button-reset .btn-reset').on('click', function () {

        $('.search').val('');

        $('.filter-item .item.active').removeClass('active');

        $('.filter-item .item.default').addClass('active');

        $('input[type="date"]').val('')

        $('#date_range').val('')

        // $('.filter-item .item.first').addClass('active');

        pressInfomationFilter();

        Filter_posts_news();

        // Filter_posts_library_press-infor-section();

        Filter_posts_library_video();

        Filter_posts_company_member();

        Filter_posts_projects();

        Filter_posts_vacancies();

        Filter_posts_projects_list();

        Post_filter_action_social_security();

    });


    // Start Filter & Pagination news

    $('.tin-tuc-thuy-dien .btn-submit').on('click', function () {

        Filter_posts_news();

    });



    function Filter_posts_news() {

        $the_slug = $('.the_slug').val();

        $name = $('.form-filter-search .search').val();

        $company = $('.form-filter-company .item.active').attr('data-value');

        $type = $('.form-filter-type .item.active').attr('data-value');

        $date = $('.form-filter-date input[name="date_range"]').val();

        $.ajax({

            type: "POST",

            dataType: "html",

            url: ajaxObject1.ajaxurl,

            data: {

                action: 'post_filter_action_news',

                data_page: '1',

                data_slug: $the_slug,

                data_name: $name,

                data_company: $company,

                data_date: $date,

                data_type: $type,

            },

            beforeSend: function (data) {

                $('.tin-tuc-thuy-dien .lists-post .list').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success: function (data) {

                var results = data.split('|');

                $('.tin-tuc-thuy-dien .lists-post .list').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.tin-tuc-thuy-dien  .pagination').html(results[1])

            },

            error: function (jqXHR, textStatus, errorThrown) {

                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);

            }



        });

        return false;

    }

    $("body").on("click", ".tin-tuc-thuy-dien .lists-post .page-numbers", (e) => {

        e.preventDefault();

        $('html').scrollTop(800);

        var paged = '';

        paged = e.target.innerText

        if (e.target.closest('.lists-post .page-numbers').classList.contains('prev')) {

            paged = parseInt($('.lists-post .page-numbers.current').text()) - 1;

        } else if (e.target.closest('.page-numbers').classList.contains('next')) {

            paged = parseInt($('.lists-post .page-numbers.current').text()) + 1;

        }

        $the_slug = $('.the_slug').val();

        $name = $('.form-filter-search .search').val();

        $company = $('.form-filter-company.filter-item  .item.active').attr('data-value');

        $type = $('.form-filter-type.filter-item  .item.active').attr('data-value');

        $date = $('.form-filter-date input[name="date"]').val();

        $.ajax({

            url: ajaxObject1.ajaxurl,

            type: "POST",

            data: {

                action: "post_nav_action_news",

                paged: paged,

                data_slug: $the_slug,

                data_name: $name,

                data_company: $company,

                data_date: $date,

                data_type: $type,

            },

            beforeSend(data) {

                $('.tin-tuc-thuy-dien .lists-post .list').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success(data) {

                var results = data.split('|');

                console.log(data);

                $('.tin-tuc-thuy-dien .lists-post .list').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.tin-tuc-thuy-dien .lists-post .pagination').html(results[1])

            },

            error(errorThrown) {

                console.log(errorThrown);

            },

        });

    });

    // End Filter & Pagination news



    // Start Filter & Pagination library image

    $("body").on("click", "#images .page-number", (e) => {

        e.preventDefault();
        $('html').scrollTop(200)
        var paged = '';

        paged = e.target.innerText

        if (e.target.closest('#images .page-numbers').classList.contains('prev')) {

            paged = parseInt($('#images .page-numbers.current').text()) - 1;

        } else if (e.target.closest('.page-numbers').classList.contains('next')) {

            paged = parseInt($('#images .page-numbers.current').text()) + 1;

        }

        var name = $('.form-control.search').val();

        $.ajax({

            url: ajaxObject1.ajaxurl,

            type: "POST",

            data: {

                action: "post_nav_action_library_images",

                paged: paged,

                data_name: name,

            },

            beforeSend(data) {

                $('#images .images-library').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success(data) {

                var results = data.split('|');

                $('#images .images-library').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('#images .pagination').html(results[1])


            },

            error(errorThrown) {

                console.log(errorThrown);

            },

        });

    });

    // End Filter & Pagination library image

    // Start Filter and Pagination Press Information

    $('#press-infor-content .btn-submit').on('click', function () {

        pressInfomationFilter();

    });


    function pressInfomationFilter() {

        var name = $('.form-filter-search input[name="search"]').val();

        var type = $('.form-filter-type.filter-item  .item.active').attr('data-value');

        var date = $('.form-filter-date input[name="date_range"]').val();

        $.ajax({

            type: "POST",

            dataType: "html",

            url: ajaxObject1.ajaxurl,

            data: {

                action: 'press_information_filter',

                data_page: '1',

                data_name: name,
                data_type: type,
                data_date: date,

            },

            beforeSend: function (data) {

                $('#press-infor-section .shareholder-items').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success: function (data) {

                var results = data.split('|');

                $('#press-infor-section .shareholder-items').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('#press-infor-section .pagination').html(results[1])

            },

            error: function (jqXHR, textStatus, errorThrown) {

                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);

            }



        });

        return false;

    }

    $("body").on("click", "#press-infor-section #press-infor-content .page-numbers", (e) => {

        e.preventDefault();
        $('html').scrollTop(200)
        var paged = '';

        paged = e.target.innerText

        if (e.target.closest('#press-infor-section .page-numbers').classList.contains('prev')) {

            paged = parseInt($('#press-infor-section .page-numbers.current').text()) - 1;

        } else if (e.target.closest('.page-numbers').classList.contains('next')) {

            paged = parseInt($('#press-infor-section .page-numbers.current').text()) + 1;

        }

        var name = $('.form-filter-search .search').val();

        var type = $('.form-filter-type.filter-item  .item.active').attr('data-value');

        var date = $('.form-filter-date input[name="date_range"]').val();

        $.ajax({

            url: ajaxObject1.ajaxurl,

            type: "POST",

            data: {

                action: "press_information_filter",

                paged: paged,

                data_name: name,

                data_date: date,

                data_type: type,

            },

            beforeSend(data) {

                $('#press-infor-section .shareholder-items').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success(data) {

                var results = data.split('|');

                $('#press-infor-section .shareholder-items').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('#press-infor-section .pagination').html(results[1])


            },

            error(errorThrown) {

                console.log(errorThrown);

            },

        });

    });

    // End Filter & Pagination library image


    // Start Filter & Pagination library video

    $('.thu-vien-video .btn-submit').on('click', function () {

        Filter_posts_library_video();

    });

    function Filter_posts_library_video($name) {

        $.ajax({

            type: "POST",

            dataType: "html",

            url: ajaxObject1.ajaxurl,

            data: {

                action: 'post_filter_action_library_video',

                data_page: '1',

                data_name: $name,

            },

            beforeSend: function (data) {

                // $(".lists-post .list").html('<div class="loadding"><img src="https://power.dtts.com.vn/wp-content/uploads/2022/12/loading.gif" /></div>');

                $('#video .video-content').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success: function (data) {

                var results = data.split('|');

                $('#video .video-content').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('#video .pagination').html(results[1])

            },

            error: function (jqXHR, textStatus, errorThrown) {

                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);

            }



        });

        return false;

    }

    $("body").on("click", "#video .page-numbers", (e) => {

        e.preventDefault();
        $('html').scrollTop(200)

        var paged = '';

        paged = e.target.innerText

        if (e.target.closest('#video .page-numbers').classList.contains('prev')) {

            paged = parseInt($('#video .page-numbers.current').text()) - 1;

        } else if (e.target.closest('.page-numbers').classList.contains('next')) {

            paged = parseInt($('#video .page-numbers.current').text()) + 1;

        }

        $name = $('.form-control.search').val();

        $.ajax({

            url: ajaxObject1.ajaxurl,

            type: "POST",

            data: {

                action: "post_nav_action_library_video",

                paged: paged,

                data_name: $name,

            },

            beforeSend(data) {

                $('#video .video-content').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success(data) {

                var results = data.split('|');

                $('#video .video-content').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('#video .pagination').html(results[1])

            },
            error(errorThrown) {
                console.log(errorThrown);
            },

        });

    });

    // End Filter & Pagination library video



    // Start Filter & Pagination company member

    $('.company_member .btn-submit').on('click', function () {

        Filter_posts_company_member();

    });

    function Filter_posts_company_member() {

        $name = $('.form-filter-search .search').val();

        $location = $('.form-filter-area .item.active').attr('data-value');

        $.ajax({

            type: "POST",

            dataType: "html",

            url: ajaxObject1.ajaxurl,

            data: {

                action: 'post_filter_action_company_member',

                data_paged: '1',

                data_name: $name,

                data_location: $location,

            },

            beforeSend: function (data) {

                // $(".lists-post .list").html('<div class="loadding"><img src="https://power.dtts.com.vn/wp-content/uploads/2022/12/loading.gif" /></div>');

                $('.company_member .filter-content').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success: function (data) {

                var results = data.split('|');

                $('.company_member .filter-content').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.company_member .pagination').html(results[1])

            },

            error: function (jqXHR, textStatus, errorThrown) {

                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);

            }



        });

        return false;

    }

    $("body").on("click", ".company_member .page-numbers", (e) => {

        e.preventDefault();
        $('html').scrollTop(200)

        var paged = '';

        paged = e.target.innerText

        if (e.target.closest('.company_member .page-numbers').classList.contains('prev')) {

            paged = parseInt($('.company_member .page-numbers.current').text()) - 1;

        } else if (e.target.closest('.page-numbers').classList.contains('next')) {

            paged = parseInt($('.company_member .page-numbers.current').text()) + 1;

        }

        $name = $('.form-filter-search .search').val();

        $location = $('.form-filter-area .item.active').attr('data-value');

        $.ajax({

            url: ajaxObject1.ajaxurl,

            type: "POST",

            data: {

                action: "post_nav_action_company_member",

                data_paged: paged,

                data_name: $name,

                data_location: $location,

            },

            beforeSend(data) {

                $('.company_member .filter-content').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success(data) {

                var results = data.split('|');

                $('.company_member .filter-content').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.company_member .pagination').html(results[1])

            },

            error(errorThrown) {

                console.log(errorThrown);

            },

        });

    });

    // End Filter & Pagination company member



    // Start Filter & Pagination projects

    $('.du-an .button-submit .btn-submit').on('click', function () {

        Filter_posts_projects();

    });

    $('.button-reset').on('click', function () {

        $('.search').val('');

        $('.filter-item .item ').hasAttr("data-value").removeClass('active');

        Filter_posts_projects();

    });



    function Filter_posts_projects() {

        $the_slug = $('.the_slug').val();

        $name = $('.form-filter-search .search').val();

        $company = $('.form-filter-company  .item.active').attr('data-value');

        $location = $('.form-filter-area  .item.active').attr('data-value');

        $type = $('.form-filter-type  .item.active').attr('data-value');

        $.ajax({

            type: "POST",

            dataType: "html",

            url: ajaxObject1.ajaxurl,

            data: {

                action: 'post_filter_action_projects',

                data_paged: '1',

                data_name: $name,

                the_slug: $the_slug,

                data_location: $location,

                data_type: $type,

                data_company: $company,

            },

            beforeSend: function (data) {

                // $(".lists-post .list").html('<div class="loadding"><img src="https://power.dtts.com.vn/wp-content/uploads/2022/12/loading.gif" /></div>');

                $('.du-an .filter-content').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                );

            },

            success: function (data) {

                console.log(data);

                var results = data.split('|');

                $('.du-an .filter-content').html(results[0]);
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.du-an .pagination').html(results[1]);

            },

            error: function (jqXHR, textStatus, errorThrown) {

                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);

            }



        });

        return false;

    }

    $("body").on("click", ".du-an .page-numbers", (e) => {

        e.preventDefault();
        $('html').scrollTop(640)

        var paged = '';

        paged = e.target.innerText

        if (e.target.closest('.du-an .page-numbers').classList.contains('prev')) {

            paged = parseInt($('.du-an .page-numbers.current').text()) - 1;

        } else if (e.target.closest('.page-numbers').classList.contains('next')) {

            paged = parseInt($('.du-an .page-numbers.current').text()) + 1;

        }

        $the_slug = $('.the_slug').val();

        $name = $('.form-filter-search .search').val();

        $company = $('.form-filter-company  .item.active').attr('data-value');

        $location = $('.form-filter-area  .item.active').attr('data-value');

        $type = $('.form-filter-type  .item.active').attr('data-value');

        $.ajax({

            url: ajaxObject1.ajaxurl,

            type: "POST",

            data: {

                action: "post_nav_action_projects",

                data_paged: paged,

                the_slug: $the_slug,

                data_name: $name,

                data_location: $location == null ? '' : $location,

                data_type: $type == null ? '' : $type,

                data_company: $company == null ? '' : $company,

            },

            beforeSend(data) {

                $('.du-an .filter-content').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success(data) {
                var results = data.split('|');
                $('.du-an .filter-content').html(results[0]);
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.du-an .pagination').html(results[1]);
            },

            error(errorThrown) {

                console.log(errorThrown);

            },

        });

    });

    // End Filter & Pagination projects









    // Start Filter & Pagination projects list

    $('.cac-nha-may-thuy-dien .btn-submit').on('click', function () {

        Filter_posts_projects_list();

    });

    function Filter_posts_projects_list() {

        $name = $('.form-filter-search .search').val();

        $company = $('.form-filter-company  .item.active').attr('data-value');

        $location = $('.form-filter-area  .item.active').attr('data-value');

        $type = $('.form-filter-type  .item.active').attr('data-value');

        $.ajax({

            type: "POST",

            dataType: "html",

            url: ajaxObject1.ajaxurl,

            data: {

                action: 'post_filter_action_projects_list',

                data_paged: '1',

                data_name: $name,

                data_location: $location,

                data_type: $type,

                data_company: $company,

            },

            beforeSend: function (data) {

                $('.cac-nha-may-thuy-dien .filter-content').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success: function (data) {

                var results = data.split('|');

                $('.cac-nha-may-thuy-dien .filter-content').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.cac-nha-may-thuy-dien .pagination').html(results[1])

            },

            error: function (jqXHR, textStatus, errorThrown) {

                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);

            }



        });

        return false;

    }

    $("body").on("click", ".cac-nha-may-thuy-dien .page-numbers", (e) => {

        e.preventDefault();
        $('html').scrollTop(200)

        var paged = '';

        paged = e.target.innerText

        if (e.target.closest('.cac-nha-may-thuy-dien .page-numbers').classList.contains('prev')) {

            paged = parseInt($('.cac-nha-may-thuy-dien .page-numbers.current').text()) - 1;

        } else if (e.target.closest('.page-numbers').classList.contains('next')) {

            paged = parseInt($('.cac-nha-may-thuy-dien .page-numbers.current').text()) + 1;

        }

        $name = $('.form-filter-search .search').val();

        $company = $('.form-filter-company  .item.active').attr('data-value');

        $location = $('.form-filter-area  .item.active').attr('data-value');

        $type = $('.form-filter-type  .item.active').attr('data-value');

        $.ajax({

            url: ajaxObject1.ajaxurl,

            type: "POST",

            data: {

                action: "post_nav_action_projects_list",

                data_paged: '3',

                data_name: $name,

                data_location: $location,

                data_type: $type,

                data_company: $company,

            },

            beforeSend(data) {

                $('.cac-nha-may-thuy-dien .filter-content').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success(data) {

                console.log(data);

                var results = data.split('|');

                $('.cac-nha-may-thuy-dien .filter-content').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.cac-nha-may-thuy-dien .pagination').html(results[1])

            },

            error(errorThrown) {

                console.log(errorThrown);

            },

        });

    });

    // End Filter & Pagination projects list







    // Start Filter & Pagination vacancies

    $('.danh-sach-tuyen-dung .btn-submit').on('click', function () {

        Filter_posts_vacancies();

    });

    function Filter_posts_vacancies() {

        $name = $('.form-filter-search .search').val();

        $location = $('.form-filter-field .item.active').attr('data-value');

        $.ajax({

            type: "POST",

            dataType: "html",

            url: ajaxObject1.ajaxurl,

            data: {

                action: 'post_filter_action_vacancies',

                data_paged: '1',

                data_name: $name,

                data_location: $location,

            },

            beforeSend: function (data) {

                // $(".lists-post .list").html('<div class="loadding"><img src="https://power.dtts.com.vn/wp-content/uploads/2022/12/loading.gif" /></div>');

                $('.danh-sach-tuyen-dung .infomation-list .list').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success: function (data) {

                var results = data.split('|');

                $('.danh-sach-tuyen-dung .infomation-list .list').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.danh-sach-tuyen-dung .pagination').html(results[1])

            },

            error: function (jqXHR, textStatus, errorThrown) {

                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);

            }



        });

        return false;

    }

    $("body").on("click", ".danh-sach-tuyen-dung .page-numbers", (e) => {

        e.preventDefault();
        $('html').scrollTop(200)

        var paged = '';

        paged = e.target.innerText

        if (e.target.closest('.danh-sach-tuyen-dung .page-numbers').classList.contains('prev')) {

            paged = parseInt($('.danh-sach-tuyen-dung .page-numbers.current').text()) - 1;

        } else if (e.target.closest('.page-numbers').classList.contains('next')) {

            paged = parseInt($('.danh-sach-tuyen-dung .page-numbers.current').text()) + 1;

        }

        $name = $('.form-filter-search .search').val();

        $location = $('.form-filter-field .item.active').attr('data-value');

        $.ajax({

            url: ajaxObject1.ajaxurl,

            type: "POST",

            data: {

                action: "post_nav_action_vacancies",

                data_paged: paged,

                data_name: $name,

                data_location: $location,

            },

            beforeSend(data) {

                $('.danh-sach-tuyen-dung .infomation-list .list').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success(data) {

                var results = data.split('|');

                $('.danh-sach-tuyen-dung .infomation-list .list').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.danh-sach-tuyen-dung .pagination').html(results[1])

            },

            error(errorThrown) {

                console.log(errorThrown);

            },

        });

    });

    // End Filter & Pagination vacancies

    // Start Filter & Pagination social_security



    $('.bai-viet-an-sinh-xa-hoi .btn-submit').on('click', function () {

        Filter_posts_social_security();

    });

    function Filter_posts_social_security() {

        $paged = '1';

        $the_slug = $('.the_slug').val();

        $name = $('.form-filter-search .search').val();

        $date = $('.form-filter-date input[name="date"]').val();

        $.ajax({

            url: ajaxObject1.ajaxurl,

            type: "POST",

            data: {

                action: "post_nav_action_social_security",

                paged: $paged,

                data_slug: $the_slug,

                data_name: $name,

                data_date: $date,

            },

            beforeSend: function (data) {

                // $(".lists-post .list").html('<div class="loadding"><img src="https://power.dtts.com.vn/wp-content/uploads/2022/12/loading.gif" /></div>');

                $('.bai-viet-an-sinh-xa-hoi .lists-post .list').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success: function (data) {

                console.log(data);

                var results = data.split('|');

                $('.bai-viet-an-sinh-xa-hoi .lists-post .list').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.bai-viet-an-sinh-xa-hoi  .pagination').html(results[1])

            },

            error: function (jqXHR, textStatus, errorThrown) {

                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);

            }



        });

        return false;

    }

    $("body").on("click", ".bai-viet-an-sinh-xa-hoi .lists-post .page-numbers", (e) => {

        e.preventDefault();
        $('html').scrollTop(200)

        var paged = '';

        paged = e.target.innerText

        if (e.target.closest('.lists-post .page-numbers').classList.contains('prev')) {

            paged = parseInt($('.lists-post .page-numbers.current').text()) - 1;

        } else if (e.target.closest('.page-numbers').classList.contains('next')) {

            paged = parseInt($('.lists-post .page-numbers.current').text()) + 1;

        }

        $the_slug = $('.the_slug').val();

        $name = $('.form-filter-search .search').val();

        $date = $('.form-filter-date input[name="date"]').val();

        $.ajax({

            url: ajaxObject1.ajaxurl,

            type: "POST",

            data: {

                action: "post_nav_action_social_security",

                paged: paged,

                data_slug: $the_slug,

                data_name: $name,

                data_date: $date,

            },

            beforeSend(data) {

                $('.bai-viet-an-sinh-xa-hoi .lists-post .list').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success(data) {

                var results = data.split('|');

                console.log(data);

                $('.bai-viet-an-sinh-xa-hoi .lists-post .list').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.bai-viet-an-sinh-xa-hoi .lists-post .pagination').html(results[1])

            },

            error(errorThrown) {

                console.log(errorThrown);

            },

        });

    });

    // End Filter & Pagination social_security



    // Start Filter & Pagination events

    $('.su-kien .btn-submit').on('click', function () {

        Filter_posts_events();

    });

    function Filter_posts_events() {

        $name = $('.form-control.search').val();

        $status = $('select[name="status"] option:selected').val();

        $location = $('select[name="location"] option:selected').val();

        $formality = $('select[name="formality"] option:selected').val();

        $.ajax({

            type: "POST",

            dataType: "html",

            url: ajaxObject1.ajaxurl,

            data: {

                action: 'post_filter_action_events',

                data_page: '1',

                data_name: $name,

                data_status: $status,

                data_location: $location,

                data_formality: $formality,

            },

            beforeSend: function (data) {

                // $(".filter-content").html('<div class="loadding"><img src="https://power.dtts.com.vn/wp-content/uploads/2022/12/loading.gif" /></div>');

                $('.su-kien .filter-content').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success: function (data) {

                console.log(data);

                var results = data.split('|');

                $('.su-kien .filter-content').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.su-kien  .pagination').html(results[1])

            },

            error: function (jqXHR, textStatus, errorThrown) {

                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);

            }



        });

        return false;

    }

    $("body").on("click", ".su-kien .page-numbers", (e) => {

        e.preventDefault();
        $('html').scrollTop(200)

        var paged = '';

        paged = e.target.innerText

        if (e.target.closest('.su-kien .page-numbers').classList.contains('prev')) {

            paged = parseInt($('.su-kien .page-numbers.current').text()) - 1;

        } else if (e.target.closest('.page-numbers').classList.contains('next')) {

            paged = parseInt($('.su-kien .page-numbers.current').text()) + 1;

        }

        $name = $('.form-control.search').val();

        $status = $('select[name="status"] option:selected').val();

        $location = $('select[name="location"] option:selected').val();

        $formality = $('select[name="formality"] option:selected').val();

        $.ajax({

            url: ajaxObject1.ajaxurl,

            type: "POST",

            data: {

                action: 'post_filter_action_events',

                data_page: '1',

                data_name: $name,

                data_status: $status,

                data_location: $location,

                data_formality: $formality,

            },

            beforeSend(data) {

                $('.su-kien .filter-content').html(

                    '<div class="loader-box">' +

                    '<div class="loader"></div>'

                    + '</div>'

                )

            },

            success(data) {

                var results = data.split('|');

                console.log(data);

                $('.su-kien .filter-content').html(results[0])
                results[1] = results[1].replaceAll('class="page-numbers', 'class="page-numbers notranslate');
                $('.su-kien .pagination').html(results[1])

            },

            error(errorThrown) {

                console.log(errorThrown);

            },

        });

    });

    // End Filter & Pagination events

});







