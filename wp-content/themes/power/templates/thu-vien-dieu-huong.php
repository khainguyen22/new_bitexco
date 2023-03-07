<?php 
    $home = home_url( add_query_arg( $_GET, '' ) );
?>

<div class="filters-type">
 
    <div class="navigation">

            <ul class="nav" role="tablist">

                <li role="presentation" class="<?php echo $actual_link == $home . '/thu-vien/hinh-anh/' ? 'active' : '' ?>"><a href="<?php echo get_site_url() . '/thu-vien/hinh-anh/'?>"><?php _e('Hình ảnh')?></a></li>

                <li role="presentation" class="<?php echo $actual_link == $home . '/thu-vien/video/' ? 'active' : '' ?>"><a href="<?php echo get_site_url() . '/thu-vien/video/'?>"> <?php _e('Video')?></a></li>

                <li role="presentation" class="<?php echo $actual_link == $home . '/thu-vien/thong-tin-huu-ich/' ? 'active' : '' ?>"><a href="<?php echo get_site_url() . '/thu-vien/thong-tin-huu-ich/'?>"><?php _e('Thông tin hữu ích')?></a></li>

            </ul>

    </div>

</div>  