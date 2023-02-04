<?php global $c5_options;?>
<section id="section-selling" class="fadeIn wow" data-wow-delay="0.5s">
    <div class="background-overlay">
        <h2 class="title-section">
            <span><?php echo $c5_options['opt-title-selling'];?></span>
            <a class="readmore-btn" href="<?php echo $c5_options['opt-url-selling'];?>">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
        </h2>
        <div id="selling-carousel" class="owl-carousel owl-theme">
            <?php
            $selling = new WP_Query(array(
            'post_type' => 'product',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'name',
                    'terms'    => 'featured',
                ),
            ),
            'orderby' => 'Date',
            'order' => 'DESC',
            'posts_per_page'=> 10));
            ?>
            <?php while ($selling->have_posts()) : $selling->the_post(); ?>
                <div class="item-selling">
                   <div class="box-product">
                         <div class="img-product">
                             <a href="<?php the_permalink() ;?>"> 
                                 <?php the_post_thumbnail("medium",array( "title" => get_the_title(),"alt" => get_the_title() ));?>
                             </a>
                             <div class="ovrly"></div>
                             <div class="details-product">
                                <div class="cart-product">
                                 <a href="<?php the_permalink() ;?>" title="Xem chi tiết" class="show-pr"><i class="far fa-eye"></i></a>
                                 
                                 <?php global $product;
                                    echo sprintf( '<a href="%s" title="Thêm giỏ hàng" data-quantity="1" class="%s" %s><i class="fab fa-opencart"></i></a>',
                                        esc_url( $product->add_to_cart_url() ),
                                        esc_attr( implode( ' ', array_filter( array(
                                            'button', 'product_type_' . $product->get_type(),
                                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                                            $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                                        ) ) ) ),
                                        wc_implode_html_attributes( array(
                                            'data-product_id'  => $product->get_id(),
                                            'data-product_sku' => $product->get_sku(),
                                            'aria-label'       => $product->add_to_cart_description(),
                                            'rel'              => 'nofollow',
                                        ) ),
                                        esc_html( $product->add_to_cart_text() )
                                    );
                                  ?>
                                </div>
                             </div>
                         </div>
                         <div class="info-product">
                             <a class="name-product" href="<?php the_permalink() ;?>" title=""><?php the_title() ;?></a>
                             <p class="price-product">Giá bán: <span><?php global $product;echo $product->get_price_html(); ?></span></p>
                         </div>
                    </div>                                
                </div>
            <?php endwhile ; wp_reset_query() ;?>
        </div>
    </div>
</section>