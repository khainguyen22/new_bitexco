<?php
get_header();
get_template_part('sections/specia', 'breadcrumb'); ?>

<!-- Blog & Sidebar Section -->

<section class="details_news_page">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-12">
                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post(); ?>
                        <div class="content_details_news">
                            <h3><?php the_title(); ?></h3>
                            <div class="date_time_ad">
                                <span><i class="far fa-calendar-alt"></i><?php the_time('g:i a d/m/Y') ?></span>
                                <span><i class="far fa-user"></i> Admin</span>
                            </div>
                            <?php
                            the_content(sprintf(
                                /* translators: %s: Name of current post. */
                                wp_kses(__('Read More', 'specia'), array('span' => array('class' => array()))),
                                the_title('<span class="screen-reader-text">"', '"</span>', false)
                            ));

                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'specia'),
                                'after'  => '</div>',
                            ));
                            ?>
                        </div>
                        <div class="ketnoi">
                            <ul class="list_socical">
                                <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-skype" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>

                    <?php get_template_part('template-parts/content', 'none'); ?>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>