<?php
get_header();
// get_template_part('sections/specia', 'breadcrumb'); 
?>

<!-- Blog & Sidebar Section -->
<script>

</script>
<style>

</style>

<div class="details_news_page">
    <section class="article article-breadcrumbs">
        <div class="breadcrumbs">
            <div class="container news-detail-container">
                <?php
                if (function_exists('yoast_breadcrumb')) {
                    yoast_breadcrumb('<div id="breadcrumbs-content" class="breadcrumbs-content">', '</div>');
                }
                ?>
            </div>
        </div>
    </section>

    <?php if (have_posts()) : ?>
        <section class="banner list" style='background-image:url("<?php the_post_thumbnail( )?>")'>

            <div class="container">

                <div class="content">

                    <h3><?php the_title() ?></h3>

                    <p><?php the_excerpt() ?></p>

                </div>

            </div>

        </section>
        <div class="main container">
            <?php while (have_posts()) : the_post(); ?>
                <div class="content">

                    <section class="article">
                        <article>
                            <!-- START UNITE GALLERY LITE 1.7.56 -->
                            <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(  ) . '/access/js/unite-gallery.min.js'?>"></script>
                            <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(  ) . '/access/js/unite-gallery-default-theme.js'?>"></script>

                            <div class="article-container">
                                <?php $images = get_field('image') ?>
                                
                                <div id="hydroelectric-plant">
                                        <?php foreach ($images['gallery'] as $key => $value) : ?>
                                            <div class="gallery-item">
                                                <img src="<?php echo $value; ?>" alt="<?php echo "Image ". $key?>" data-image="<?php echo $value;?>">
                                            </div>
                                        <?php endforeach;?>
                                </div>
                            </div>
                            <script>
                                window.onload = function (e) {
                                    if (typeof ugCheckForErrors == "undefined") {
                                        document.getElementById("hydroelectric-plant").innerHTML =
                                            "<span style='color:red'>Unite Gallery Error - gallery js and css files not included in the footer. Please make sure that wp_footer() function is added to your theme.</span>";
                                    } else {
                                        ugCheckForErrors("hydroelectric-plant", "jquery");
                                    }
                                };
                            </script>
                        </article>
                    </section>


                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>

</div>
<?php get_footer(); ?>