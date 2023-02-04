jQuery(document).ready(function ($) {
    function filler_posts($the_slug, $name, $company, $location, $type) {
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts_fillter.ajaxurl,
            data: {
                action: 'fillter_post_ajax',
                data_slug: $the_slug,
                data_name: $name,
                data_company: $company,
                data_location: $location,
                data_type: $type
            },
            beforeSend: function () {
                $(".lists-post .list").html('<div class="loadding"><img src="https://power.dtts.com.vn/wp-content/uploads/2022/12/loading.gif" /></div>');
            },
            success: function (data) {
                var $data = $(data);
                if ($data.length) {
                    $(".lists-post .list").html($data);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }
    $the_slug = $('.the_slug').val();
    $('.button-submit').on('click', function () {
        $the_slug = $('.the_slug').val();
        $name = $('.form-control.search').val();
        $company = $('select[name="company"] option:selected').val();
        $location = $('select[name="location"] option:selected').val();
        $type = $('select[name="type"] option:selected').val();
        filler_posts($the_slug, $name, $company, $location, $type);
    });
    $('.button-reset').on('click', function () {
        $name = '';
        $company = '';
        $location = '';
        $type = '';
        $('.form-control.search').val('');
        $('select').val("");
        filler_posts($the_slug, $name, $company, $location, $type);
    });

    function pagination_posts() {
        pageNumber++;
        var str = '&pageNumber=' + pageNumber + '&posts_per_page=' + posts_per_page + '&action=pagination_post_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts_pagination.ajaxurl,
            data: {
                action: 'pagination_post_ajax',
                website: str
            },
            success: function (data) {
                var $data = $(data);
                // if ($data.length) {
                //     $(".custom_partners_network").append($data);
                //     $("#load_more_post").attr("disabled", false);
                // } else {
                //     $("#load_more_post").attr("disabled", true);
                // }
                console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }

        });
        return false;
    }
});
