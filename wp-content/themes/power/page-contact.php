<?php
/**
 * Template Name: Contact Page
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */
 
get_header();?>
<?php global $c5_options;?>
        <section class="page_contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="info_contact">
                            <h3>Nội Thất Flatinor</h3>
                            <div class="contact">
                                <p><i class="fas fa-map-marker-alt"></i> Địa chỉ: 266 Đội Cấn - Ba Đình - Hà Nội</p>
                                <p><i class="fas fa-phone-alt"></i> Hotline: 1900.0909</p>
                                <p><i class="far fa-envelope"></i> Email: Flatinor@gmail.com</p>
                            </div>
                            <h3>Liên hệ với chúng tôi</h3>
                            <form>
                                <input type="text" name="" placeholder="Họ và tên">
                                <input type="text" name="" placeholder="Địa chỉ Email">
                                <input type="text" name="" placeholder="Số điện thoại">
                                <textarea placeholder="Nội dung liên hệ"></textarea>
                                <button>Gửi liên hệ ngay</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="map_gg">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.90815372949!2d105.81375601444539!3d21.036360692895826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab128d511a8d%3A0x3440d4c5d63f693!2zMjY2IMSQ4buZaSBD4bqlbiwgTGnhu4V1IEdpYWksIEJhIMSQw6xuaCwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1630553228643!5m2!1svi!2s" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php get_footer(); ?>

