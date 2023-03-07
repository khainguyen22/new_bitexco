
<?php
   $ancestors = get_post_ancestors( get_the_ID() );
   $parent_slug = '';
    if ( ! empty( $ancestors ) ) {
       $parent_id = end( $ancestors );
       $parent_slug = get_post_field( 'post_name', $parent_id );
   }
    $banner = get_field('banner_library', 'option');
    $navigation = '';

    if ($banner) {
    
        $navigation = $banner['main_navigation'];
    }
?>
<section class="banner" style='background-image:url("<?php echo $banner['background']; ?>")'>

    <div class="container">

        <div class="content">

            <h3><?php echo paint_if_exist($banner['title']) ?></h3>

            <p><?php echo paint_if_exist($banner['description']) ?></p>

        </div>

        <div class="navigation">

            <ul>

                <?php if ($navigation) : ?>

                    <?php foreach ($navigation as $key => $value) : ?>

                        <li class="<?php echo $actual_link == $value['link'] || ($parent_slug == 'thu-vien' && $key == 1) ? 'active' : '' ?>"> <a href="<?php echo $value['link']; ?>"><?php echo $value['label']; ?></a></li>

                    <?php endforeach; ?>

                <?php endif; ?>

            </ul>

        </div>

    </div>

</section>

