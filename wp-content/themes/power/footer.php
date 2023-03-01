</body>
<?php
$home_footer = get_field('home_footer', 'option');
?>
<footer class="footer-second">
    <div class="footer-desktop">
        <div class="container">
            <div class="row row-1 d-flex flex-wrap">
                <?php if ($home_footer['content']['links']) : ?>
                    <div class="d-flex links">
                        <?php foreach ($home_footer['content']['links'] as $value) : ?>
                            <a class="link item " href="<?php echo  $value['link'] ?>"><?php echo  $value['label'] ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if ($home_footer['content']['other_links']) : ?>
                    <div class="other-links d-flex">
                        <select name="other_links" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option name="other_links " value=""><?php _e('Liên kết nhanh') ?></option>
                            <?php foreach ($home_footer['content']['other_links'] as $value) : ?>
                                <a class="link item " href="<?php echo  $value['link'] ?>">
                                    <option name="other_links " value=" <?php echo  $value['link'] ?>"><?php echo  $value['label'] ?></option>
                                </a>
                            <?php endforeach; ?>
                        </select>
                        <span>
                            <svg width="16" height="7" viewBox="0 0 16 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.3125L7.364 5.29C7.75313 5.5332 8.24687 5.5332 8.636 5.29L15 1.3125" stroke="white" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </span>
                    </div>
                <?php endif; ?>
            </div>
            <span class="driver"></span>
            <div class="row  row-2 d-flex flex-wrap">
                <div class="col-12">
                    <?php if ($home_footer['content']['logo']) : ?>
                        <img class="img-logo" src="<?php echo $home_footer['content']['logo'] ?>" alt="logo">
                    <?php endif; ?>
                </div>
                <?php if ($home_footer['content']['address']) : ?>
                    <div class="col-12 col-lg-4 wrap-address">
                        <div class="address size-text-16">
                            <?php echo _e($home_footer['content']['address']) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col-12 col-lg-4">
                    <div class="info size-text-16">
                        <?php if ($home_footer['content']['phone']) : ?>
                            <?php echo _e('Tel: ') ?>
                            <?php foreach ($home_footer['content']['phone'] as $key => $phone) : ?>
                                <?php echo ($key > 0) ? '<span class="mx-2">|</span>' : '' ?>
                                <a href="tel:<?php echo  formatPhoneNumber($phone['item']); ?>"><?php echo  formatPhoneNumber($phone['item']); ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php if ($home_footer['content']['fax']) : ?>
                            <br />
                            <?php echo _e('Fax: ') ?> <a href="tel:<?php echo formatPhoneNumber($home_footer['content']['fax']) ?>"><?php echo formatPhoneNumber($home_footer['content']['fax']) ?> </a>
                        <?php endif; ?>
                        <?php if ($home_footer['content']['email']) : ?>
                            <br />
                            <?php echo _e('Email: ') ?> <a href="mailto:<?php echo $home_footer['content']['email'] ?>"><?php echo $home_footer['content']['email'] ?> </a>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                </div>
            </div>
            <span class="driver"></span>
        </div>
    </div>
    <div class="footer-top footer-mobile">
        <div class="row">

            <div class="col-12">
                <div class="logo">
                    <img class="img-logo" src="<?php echo get_stylesheet_directory_uri() ?>/access/images/icon-logo.png" alt="logo">
                </div>
            </div>
            <div class="col-12 col-lg-4 box-1">
                <div class="name-site size-text-16">
                    Bitexco Power
                </div>
                <?php if ($home_footer['content']['address']) : ?>
                    <div class=" ">
                        <div class="address size-text-16">
                            <?php echo _e($home_footer['content']['address']) ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="info size-text-14">
                    <?php if ($home_footer['content']['fax']) : ?>
                        <br />
                        <?php echo _e('Fax: ') ?> <a href="tel:<?php echo  formatPhoneNumber($home_footer['content']['fax']); ?>"><?php echo  formatPhoneNumber($home_footer['content']['fax']); ?> </a>
                    <?php endif; ?>
                    <?php if ($home_footer['content']['email']) : ?>
                        <br />
                        <?php echo _e('Email: ') ?><a href="mailto:<?php echo $home_footer['content']['email'] ?>"><?php echo $home_footer['content']['email'] ?> </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-md-3  box-2">
                <ul>
                    <li><a href="#" class=" size-text-16">Thương hiệu Bitexco Power</a></li>
                    <li><a href="#" class=" size-text-16">Quan hệ cổ đông</a></li>
                    <li><a href="#" class=" size-text-16">Đối tác</a></li>
                    <li><a href="#" class=" size-text-16">Danh mục dự án</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3  box-3">
                <ul>
                    <li><a href="#" class=" size-text-16">Tin tức</a></li>
                    <li><a href="#" class=" size-text-16">Sự kiện</a></li>
                    <li><a href="#" class=" size-text-16">Tuyển dụng</a></li>
                    <li><a href="#" class=" size-text-16">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container container d-flex flex-wrap justify-content-between">
            <?php if ($home_footer['copyright']) : ?>
                <div class="copy-right">
                    <span>©<?php echo _e($home_footer['copyright']) ?></span>
                </div>
            <?php endif; ?>
            <div class="d-flex flex-wrap">
                <?php if ($home_footer['page']) : ?>
                    <ul class="d-flex flex-wrap footer-links d-flex flex-wrap size-text-16 justify-content-center m-auto">
                        <?php foreach ($home_footer['page'] as $value) : ?>
                            <li class="link px-2"><a href="<?php echo  $value['link'] ?>"><?php echo _e($value['text']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <ul class="d-flex justify-content-center  m-auto">
                    <li class="social">
                        <a href="#" target="_blank">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14 0C6.26801 0 0 6.26801 0 14C0 21.732 6.26801 28 14 28C21.732 28 28 21.732 28 14C28 6.26801 21.732 0 14 0ZM15.4592 14.615V22.2317H12.3078V14.6153H10.7333V11.9905H12.3078V10.4146C12.3078 8.2733 13.1968 7 15.7227 7H17.8255V9.62507H16.5111C15.5279 9.62507 15.4628 9.99188 15.4628 10.6765L15.4592 11.9902H17.8404L17.5618 14.615H15.4592Z" fill="white" />
                            </svg>
                        </a>

                    </li>
                    <li class="social">
                        <a href="#" target="_blank">
                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14 0C6.26801 0 0 6.26801 0 14C0 21.732 6.26801 28 14 28C21.732 28 28 21.732 28 14C28 6.26801 21.732 0 14 0ZM19.8343 9.18711C20.4768 9.36343 20.9829 9.88296 21.1546 10.5427C21.4667 11.7384 21.4667 14.2333 21.4667 14.2333C21.4667 14.2333 21.4667 16.7281 21.1546 17.924C20.9829 18.5837 20.4768 19.1032 19.8343 19.2796C18.6698 19.6 14 19.6 14 19.6C14 19.6 9.33019 19.6 8.16565 19.2796C7.52309 19.1032 7.01705 18.5837 6.84532 17.924C6.53333 16.7281 6.53333 14.2333 6.53333 14.2333C6.53333 14.2333 6.53333 11.7384 6.84532 10.5427C7.01705 9.88296 7.52309 9.36343 8.16565 9.18711C9.33019 8.86667 14 8.86667 14 8.86667C14 8.86667 18.6698 8.86667 19.8343 9.18711Z" fill="white" />
                                <path d="M12.6001 16.8005V12.1338L16.3334 14.4672L12.6001 16.8005Z" fill="white" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer() ?>