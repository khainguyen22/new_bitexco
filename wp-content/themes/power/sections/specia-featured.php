<?php global $c5_options;?>
<section id="section-featured" class="fadeIn wow" data-wow-delay="0.5s">
    <div class="background-overlay">
        <h2 class="title-section"><span><?php echo $c5_options['opt-title-featured'];?></span></h2>
        <div class="row featured-content">
            <?php
            $featured = new WP_Query(array(
            'post_type'=>'product',
            'orderby' => 'Date',
            'order' => 'DESC',
            'posts_per_page'=> 24));
            ?>
            <?php while ($featured->have_posts()) : $featured->the_post(); ?>
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 item-featured">
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
        <div class="readmore-section"><a href="<?php echo $c5_options['opt-url-featured'];?>">Xem tất cả <i class="fa fa-angle-double-right"></i></a></div>
    </div>
</section>