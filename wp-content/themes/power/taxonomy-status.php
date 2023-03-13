<?php
/*
Template Name: Tax-Status Template
*/
get_header();
$tax_query = array(
    array(
        'taxonomy' => 'status',
        'field' => 'slug',
        'terms' => 'published'
    )
);
$args = array(
    'post_type' => 'tender_notice',
    'tax_query' => $tax_query
);
$query = new WP_Query($args);

?>
<section class="list_news_page infomation-list tender tender-infor active">
    <div class="container">
        <div class="list">
            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('template-parts/content', 'status'); ?>

                <?php endwhile; ?>

                <div class="paginations">
                    <?php echo $pagination; ?>
                </div>

            <?php else : ?>

                <?php get_template_part('template-parts/content', 'none'); ?>

            <?php endif; ?>
        </div>
    </div>
</section>
<!-- End of Blog & Sidebar Section -->


<?php get_footer(); ?>