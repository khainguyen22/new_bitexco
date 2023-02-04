<?php

/**
Template Name: Tin tức
 **/
$banner = get_field('banner', 'option');
$other_info = get_field('other_info', 'option');
get_header();
?>
<div class="hoat-dong-sx-kd-content">
    <div class="terms-header ">
        <div class="terms-header-top">
            <div>
                <span class="line-headding"></span>
                <h3><?php echo $banner['title']; ?></h3>
            </div>
        </div>
    </div>
    <div class="content-container">
        <div class="container">
            <div class="news-post">
                <div class="row">
                    <div class="col-12 col-lg-6 tin-noi-bat animate_underline">
                        <h6>Tin nổi bật</h6>
                        <img src="<?php echo get_stylesheet_directory_uri() ?>/access/images/banner1.png" class="img-banner" alt="banner">
                        <div class="content">
                            <span class="tag tag-name"><span class="text"><a href="#">Thủy điện</a></span> </span>
                            <h5>Chubu đầu tư vào Bitexco Power: Cú hích mới cho ngành năng lượng tái tạo</h5>
                            <p class="size-text-16">Năm 2021 là năm chứng kiến dấu mốc quan trọng của Công ty CP
                                Thủy
                                điện Đak Mi thuộc
                                Công ty Năng lượng Bitexco (Bitexco Power) khi đơn vị tròn 10 </p>
                            <span class="tag tag-calender">
                                <span class="text"><a href="#">21/07/2022</a></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 tin-moi-nhat-wrap">
                        <h6 class="title">Tin mới nhất</h6>
                        <div class="row tin-moi-nhat">
                            <div class="col-12 d-flex tin-moi-nhat-item">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/access/images/banner2.png" class="img-banner" alt="banner">
                                <div class="content">
                                    <span class="tag tag-calender">
                                        <span class="text"><a href="#">21/07/2022</a></span>
                                    </span>
                                    <h6>Chính thức vận hành nhà máy điện mặt trời Nhị Hà - Thuận Nam 13</h6>
                                    <span class="tag tag-name"><span class="text"><a href="#">Thủy điện</a></span>
                                </div>
                            </div>
                            <div class="col-12 d-flex tin-moi-nhat-item">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/access/images/banner3.png" class="img-banner" alt="banner">
                                <div class="content">
                                    <span class="tag tag-calender">
                                        <span class="text"><a href="#">21/07/2022</a></span>
                                    </span>
                                    <h6>Chính thức vận hành nhà máy điện mặt trời Nhị Hà - Thuận Nam 13</h6>
                                    <span class="tag tag-name"><span class="text"><a href="#">Thủy điện</a></span>
                                </div>
                            </div>
                            <div class="col-12 d-flex tin-moi-nhat-item">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/access/images/banner4.png" class="img-banner" alt="banner">
                                <div class="content">
                                    <span class="tag tag-calender">
                                        <span class="text"><a href="#">21/07/2022</a></span>
                                    </span>
                                    <h6>Chính thức vận hành nhà máy điện mặt trời Nhị Hà - Thuận Nam 13</h6>
                                    <span class="tag tag-name"><span class="text"><a href="#">Thủy điện</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <ul class="d-flex flex-wrap">
                    <li class="active"><a href="">Hoạt động sản xuất kinh doanh</a></li>
                    <li><a href="">Khoa học - Công nghệ</a></li>
                    <li><a href="">Văn hoá doanh nghiệp</a></li>
                    <li><a href="">Hoạt động xã hội</a></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="lists-post">
        <div class="container">
            <div class="row fillter">
                <div class="form-filter ">
                    <form action="" class="d-flex justify-content-between flex-wrap">
                        <div class="form-filter-search">
                            <input type="text" class="form-control search" placeholder="Tìm kiếm">
                        </div>
                        <div class="form-filter-company">
                            <select name="" id="" class="form-select">
                                <option value="">Công ty</option>
                                <option value="">Công ty </option>
                                <option value="">Công ty</option>
                                <option value="">Công ty</option>
                            </select>
                        </div>
                        <div class="form-filter-type">
                            <select name="" id="" class="form-select">
                                <option value="1">Loại hình</option>
                                <option value="1">Loại hình</option>
                                <option value="2">Loại hình</option>
                                <option value="3">Loại hình</option>
                            </select>
                        </div>
                        <div class="button-submit">
                            <button class="btn btn-search btn-submit">Tìm kiếm</button>
                        </div>
                        <div class="button-reset">
                            <button class="btn btn-reset">Đặt lại</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="custom-post d-flex ">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/access/images/img-post-1.png" class="img-banner" alt="image post">
                <div class="content ">
                    <span class="tag tag-name"><span class="text"><a href="#">Thủy điện</a></span> </span>
                    <h6 class="title">Chubu đầu tư vào Bitexco Power: Cú hích mới cho ngành năng lượng tái tạo</h6>
                    <p class="size-text-16 desc">Năm 2021 là năm chứng kiến dấu mốc quan trọng của Công ty CP Thủy
                        điện
                        Đak Mi thuộc
                        Công ty Năng lượng Bitexco (Bitexco Power) khi đơn vị tròn 10 </p>
                    <span class="tag tag-calender">
                        <span class="text"><a href="#">21/07/2022</a></span>
                    </span>
                </div>
            </div>
            <div class="custom-post d-flex ">
                <img src="<?php echo get_stylesheet_directory_uri() ?>/access/images/img-post-2.png" class="img-banner" alt="image post">
                <div class="content">
                    <span class="tag tag-name"><span class="text"><a href="#">Thủy điện</a></span> </span>
                    <h6 class="title">Chubu đầu tư vào Bitexco Power: Cú hích mới cho ngành </h6>
                    <p class="size-text-16 desc">Năm 2021 là năm chứng kiến dấu mốc quan trọng của Công ty CP Thủy
                        điện
                        Đak Mi thuộc
                        Công ty Năng lượng Bitexco (Bitexco Power) khi đơn vị tròn 10 </p>
                    <span class="tag tag-calender">
                        <span class="text"><a href="#">21/07/2022</a></span>
                    </span>
                </div>
            </div>
            <nav aria-label="Page navigation example m-auto">
                <ul class="pagination justify-content-center custom-pagination">
                    <li class="page-item pagination-prev disable">
                        <a class="page-link">Trước</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item pagination-next">
                        <a class="page-link" href="#">Sau</a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <section class="other-information">
        <div class="other-container">
            <div class="other-content hover-zoom">
                <?php foreach ($other_info as $value) : ?>
                    <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();
?>