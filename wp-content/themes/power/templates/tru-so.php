<?php

/**
Template Name: Trụ sở
 **/
$banner = get_field('banner_tru_so', 'option');
$other_info = get_field('other_info_tru_so', 'option');
$content_tru_so = get_field('content_tru_so', 'option');
$content_tru_so_mien_bac = $content_tru_so['list_mien_bac'];
$content_tru_so_mien_trung = $content_tru_so['list_mien_trung'];
$content_tru_so_mien_nam = $content_tru_so['list_mien_nam'];
get_header();
?>
<div class="tru-so">
    <?php if ($banner) : ?>
        <section class="banner not_navigation" style='background-image:url("<?php echo $banner['background']; ?>")'>
            <div class="container">
                <div class="content">
                    <?php if ($banner['title']) : ?><h3><?php echo $banner['title'] ?></h3> <?php endif; ?>
                    <?php if ($banner['description']) : ?> <p><?php echo $banner['description'] ?></p> <?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($content_tru_so) : ?>
        <div class="main">
            <div class="container">
                <div class="group-tabs head-office">
                    <div class="head d-flex flex-wrap justify-content-between">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active item"><a href="#mien-bac" aria-controls="mien-bac" role="tab" data-toggle="tab">Miền Bắc</a></li>
                            <li role="presentation" class="item"><a href="#mien-trung " aria-controls="mien-trung" role="tab" data-toggle="tab">Miền Trung</a></li>
                            <li role="presentation" class="item"><a href="#mien-nam" aria-controls="mien-nam" role="tab" data-toggle="tab">Miền Nam</a></li>
                        </ul>
                        <?php if ($content_tru_so['button_contact']) : ?>
                            <a class="btn btn-detail" href="<?php echo $content_tru_so['link'] ?>"><?php echo $content_tru_so['button_contact'] ?>
                                <svg width="16" height="10" viewBox="0 0 16 10" fill="#ffffff" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.1297 8.66927L14.1482 5.65078C14.5062 5.2928 14.5062 4.7124 14.1482 4.35442L11.1297 1.33594M13.8797 5.0026L1.04639 5.00261" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="tab-content">
                        <?php if ($content_tru_so_mien_bac) : ?>
                            <div role="tabpanel" class="tab-pane active" id="mien-bac">
                                <div class="row  justify-content-between">
                                    <div class="col-12 col-lg-12 col-xl-5 col-left">
                                        <div id="accordionExample" class="accordion">
                                            <?php foreach ($content_tru_so_mien_bac as $key => $value) : ?>
                                                <div class="item" data-number='<?php echo $key ?>'>
                                                    <div id="heading<?php echo $key ?>mien-bac" data-number='<?php echo $key ?>'>
                                                        <h2 class="mb-0 d-flex">
                                                            <button type="button" data-toggle="collapse" data-target="#collapse<?php echo $key ?>mien-bac" aria-expanded="true" aria-controls="collapse<?php echo $key ?>mien-bac" class="btn btn-link collapsible-link">
                                                                <?php echo $value['item']['title'] ?>
                                                            </button>
                                                            <div class="icon-up icon <?php echo ($key == 0) ? 'active' : 'deactive' ?>">
                                                                <svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15 6.5L8.78095 1.16938C8.33156 0.784195 7.66844 0.784195 7.21905 1.16938L1 6.5" stroke="#434449" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </div>
                                                            <div class="icon-down icon <?php echo ($key == 0) ? 'deactive' : 'active' ?>">
                                                                <svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M1 1.5L7.21905 6.83061C7.66844 7.2158 8.33156 7.2158 8.78095 6.83061L15 1.5" stroke="#434449" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </div>
                                                        </h2>
                                                    </div>
                                                    <div id="collapse<?php echo $key ?>mien-bac" aria-labelledby="heading<?php echo $key ?>mien-bac" data-parent="#accordionExample" class="collapse <?php echo  $key == 0 ? 'show' : $key ?>" data-number='<?php echo $key ?>'>
                                                        <div class="card-body content">
                                                            <?php if ($value['item']['address']) : ?>
                                                                <span class="d-flex address">
                                                                    <span class="tag tag-location">
                                                                    </span>
                                                                    <span class=""><?php echo $value['item']['address'] ?></span>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if ($value['item']['phone']) : ?>
                                                                <span class="d-flex phone flex-wrap">
                                                                    <span class="tag tag-phone"></span>
                                                                    <?php foreach ($value['item']['phone'] as $key => $phone) : ?>
                                                                        <?php echo ($key > 0) ? '<span class="mx-2">|</span>' : '' ?>
                                                                        <div><a href="tel:+<?php echo $phone['item'] ?>"><?php echo formatPhoneNumber ($phone['item']) ?></a></div>
                                                                    <?php endforeach; ?>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if ($value['item']['fax']) : ?>
                                                                <span class="d-flex fax">
                                                                    <span class="tag tag-building"></span>
                                                                    <span>Fax: <a href="tel:+<?php echo $value['item']['fax'] ?>">+<?php echo formatPhoneNumber ($value['item']['fax']) ?></a></span>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if ($value['item']['email']) : ?>
                                                                <span class="d-flex email">
                                                                    <span class="tag tag-mail">
                                                                    </span>
                                                                    <span>Email: <a href="mailto:<?php echo $value['item']['email'] ?>"><?php echo $value['item']['email'] ?></a></span>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-xl-7  col-right">
                                        <?php if ($content_tru_so_mien_bac) : ?>
                                            <?php foreach ($content_tru_so_mien_bac as $key => $value) : ?>
                                                <div class="map <?php echo  $key == 0 ? 'active' : $key ?>" data-number='<?php echo $key ?>'>
                                                    <?php echo $value['item']['map']; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>
                        <?php if ($content_tru_so_mien_trung) : ?>
                            <div role="tabpanel" class="tab-pane" id="mien-trung">
                                <div class="row  justify-content-between">
                                    <div class="col-12 col-lg-12 col-xl-5 col-left">
                                        <div id="accordionExample" class="accordion">
                                            <?php foreach ($content_tru_so_mien_trung as $key => $value) : ?>
                                                <div class="item" data-number='<?php echo $key ?>'>
                                                    <div id="heading<?php echo $key ?>mien-trung" data-number='<?php echo $key ?>'>
                                                        <h2 class="mb-0 d-flex">
                                                            <button type="button" data-toggle="collapse" data-target="#collapse<?php echo $key ?>mien-trung" aria-expanded="true" aria-controls="collapse<?php echo $key ?>mien-trung" class="btn btn-link collapsible-link">
                                                                <?php echo $value['item']['title'] ?>
                                                            </button>
                                                            <div class="icon-up icon <?php echo ($key == 0) ? 'active' : 'deactive' ?>">
                                                                <svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15 6.5L8.78095 1.16938C8.33156 0.784195 7.66844 0.784195 7.21905 1.16938L1 6.5" stroke="#434449" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </div>
                                                            <div class="icon-down icon <?php echo ($key == 0) ? 'deactive' : 'active' ?>">
                                                                <svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M1 1.5L7.21905 6.83061C7.66844 7.2158 8.33156 7.2158 8.78095 6.83061L15 1.5" stroke="#434449" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </div>
                                                        </h2>
                                                    </div>
                                                    <div id="collapse<?php echo $key ?>mien-trung" aria-labelledby="heading<?php echo $key ?>mien-trung" data-parent="#accordionExample" class="collapse <?php echo  $key == 0 ? 'show' : $key ?>" data-number='<?php echo $key ?>'>
                                                        <div class="card-body content">
                                                            <?php if ($value['item']['address']) : ?>
                                                                <span class="d-flex address">
                                                                    <span class="tag tag-location">
                                                                    </span>
                                                                    <span class=""><?php echo $value['item']['address'] ?></span>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if ($value['item']['phone']) : ?>
                                                                <span class="d-flex phone flex-wrap">
                                                                    <span class="tag tag-phone"></span>
                                                                    <?php foreach ($value['item']['phone'] as $key => $phone) : ?>
                                                                        <?php echo ($key > 0) ? '<span class="mx-2">|</span>' : '' ?>
                                                                        <div><a href="tel:+<?php echo $phone['item'] ?>">+<?php echo formatPhoneNumber($phone['item']) ?></a></div>
                                                                    <?php endforeach; ?>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if ($value['item']['fax']) : ?>
                                                                <span class="d-flex fax">
                                                                    <span class="tag tag-building"></span>
                                                                    <span>Fax: <a href="tel:+<?php echo $value['item']['fax'] ?>"><?php echo formatPhoneNumber($value['item']['fax']) ?></a></span>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if ($value['item']['email']) : ?>
                                                                <span class="d-flex email">
                                                                    <span class="tag tag-mail">
                                                                    </span>
                                                                    <span>Email: <a href="mailto:<?php echo $value['item']['email'] ?>"><?php echo $value['item']['email'] ?></a></span>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-xl-7  col-right">
                                        <?php if ($content_tru_so_mien_trung) : ?>
                                            <?php foreach ($content_tru_so_mien_trung as $key => $value) : ?>
                                                <div class="map <?php echo  $key == 0 ? 'active' : $key ?>" data-number='<?php echo $key ?>'>
                                                    <?php echo $value['item']['map']; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>
                        <?php if ($content_tru_so_mien_nam) : ?>
                            <div role="tabpanel" class="tab-pane" id="mien-nam">
                                <div class="row  justify-content-between">
                                    <div class="col-12 col-lg-12 col-xl-5 col-left">
                                        <div id="accordionExample" class="accordion">
                                            <?php foreach ($content_tru_so_mien_nam as $key => $value) : ?>
                                                <div class="item" data-number='<?php echo $key ?>'>
                                                    <div id="heading<?php echo $key ?>mien-nam" data-number='<?php echo $key ?>'>
                                                        <h2 class="mb-0 d-flex">
                                                            <button type="button" data-toggle="collapse" data-target="#collapse<?php echo $key ?>mien-nam" aria-expanded="true" aria-controls="collapse<?php echo $key ?>mien-nam" class="btn btn-link collapsible-link">
                                                                <?php echo $value['item']['title'] ?>
                                                            </button>
                                                            <div class="icon-up icon <?php echo ($key == 0) ? 'active' : 'deactive' ?>">
                                                                <svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15 6.5L8.78095 1.16938C8.33156 0.784195 7.66844 0.784195 7.21905 1.16938L1 6.5" stroke="#434449" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </div>
                                                            <div class="icon-down icon <?php echo ($key == 0) ? 'deactive' : 'active' ?>">
                                                                <svg width="16" height="8" viewBox="0 0 16 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M1 1.5L7.21905 6.83061C7.66844 7.2158 8.33156 7.2158 8.78095 6.83061L15 1.5" stroke="#434449" stroke-width="1.5" stroke-linecap="round" />
                                                                </svg>
                                                            </div>
                                                        </h2>
                                                    </div>
                                                    <div id="collapse<?php echo $key ?>mien-nam" aria-labelledby="heading<?php echo $key ?>mien-nam" data-parent="#accordionExample" class="collapse <?php echo  $key == 0 ? 'show' : $key ?>" data-number='<?php echo $key ?>'>
                                                        <div class="card-body content">
                                                            <?php if ($value['item']['address']) : ?>
                                                                <span class="d-flex address">
                                                                    <span class="tag tag-location">
                                                                    </span>
                                                                    <span class=""><?php echo $value['item']['address'] ?></span>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if ($value['item']['phone']) : ?>
                                                                <span class="d-flex flex-wrap phone">
                                                                    <span class="tag tag-phone"></span>
                                                                    <?php foreach ($value['item']['phone'] as $key => $phone) : ?>
                                                                        <?php echo ($key > 0) ? '<span class="mx-2">|</span>' : '' ?>
                                                                        <div><a href="tel:+<?php echo $phone['item'] ?>">+<?php echo formatPhoneNumber($phone['item']) ?></a></div>
                                                                    <?php endforeach; ?>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if ($value['item']['fax']) : ?>
                                                                <span class="d-flex fax">
                                                                    <span class="tag tag-building"></span>
                                                                    <span>Fax: <a href="tel:+<?php echo $value['item']['fax'] ?>">+<?php echo formatPhoneNumber($value['item']['fax']) ?></a></span>
                                                                </span>
                                                            <?php endif; ?>
                                                            <?php if ($value['item']['email']) : ?>
                                                                <span class="d-flex email">
                                                                    <span class="tag tag-mail">
                                                                    </span>
                                                                    <span>Email: <a href="mailto:<?php echo $value['item']['email'] ?>"><?php echo $value['item']['email'] ?></a></span>
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-xl-7  col-right">
                                        <?php if ($content_tru_so_mien_nam) : ?>
                                            <?php foreach ($content_tru_so_mien_nam as $key => $value) : ?>
                                                <div class="map <?php echo  $key == 0 ? 'active' : $key ?>" data-number='<?php echo $key ?>'>
                                                    <?php echo $value['item']['map']; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($other_info) : ?>
        <section class="other-information">
            <div class="other-container">
                <div class="other-content hover-zoom">
                    <?php foreach ($other_info as $value) : ?>
                        <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
<?php
get_footer();
?>