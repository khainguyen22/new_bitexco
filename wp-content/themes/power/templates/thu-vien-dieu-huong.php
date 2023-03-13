<?php 

?>

<div class="filters-type">
 
    <div class="navigation">

            <ul class="nav" role="tablist">
                <li role="presentation" class="<?php echo preg_match('/hinh-anh/', $_SERVER['REQUEST_URI']) ? 'active' : '' ?>"><a href="<?php echo get_site_url() . '/thu-vien/hinh-anh/'?>"><?php _e('Hình ảnh')?></a></li>

                <li role="presentation" class="<?php echo preg_match('/video/', $_SERVER['REQUEST_URI']) ? 'active' : '' ?>"><a href="<?php echo get_site_url() . '/thu-vien/video/'?>"> <?php _e('Video')?></a></li>

                <li role="presentation" class="<?php echo preg_match('/thong-tin-huu-ich/', $_SERVER['REQUEST_URI']) ? 'active' : '' ?>"><a href="<?php echo get_site_url() . '/thu-vien/thong-tin-huu-ich/'?>"><?php _e('Thông tin hữu ích')?></a></li>

            </ul>

    </div>

</div>  