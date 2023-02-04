<?php

/**
 * Template Name: Lịch sử phát triển
 **/
$banner = get_field('banner_lich_su_phat_trien', 'option');
$other_info = get_field('other_info_lich_su_phat_trien', 'option');
$historical_period = get_field('historical_period', 'option');
get_header();
?>
<div class="historical-grow-page">
    <section class="banner not_navigation" style='background-image:url("<?php echo $banner['background']; ?>")'>
        <div class="container">
            <div class="content">
                <h3><?php echo isset($banner['title']) ? $banner['title'] : ""; ?></h3>
                <p><?php echo isset($banner['description']) ? $banner['description'] : ""; ?></p>
            </div>
        </div>
    </section>
    <div class="main">
        <section class="period-section">
            <div class="container">
                <div class="content">
                    <?php if ($historical_period) : ?>
                        <?php foreach ($historical_period as $key => $value) : ?>
                            <div class="period period-<?php echo $key + 1 ?> <?php echo $key == 0 ? "active" : "" ?>" data-number="<?php echo $key + 1 ?>">
                                <h5><?php echo $value['title'] ?></h5>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
        <?php if ($historical_period) : ?>
            <?php foreach ($historical_period as $key => $value) : ?>
                <section class="period-grow period-<?php echo $key + 1 ?>  <?php echo $key == 0 ? "active" : "" ?>" data-number="<?php echo $key + 1 ?> ">
                    <div class="container">
                        <div class="grow-content">
                            <h6><?php echo $value['headding']; ?></h6>
                            <p><?php echo $value['description']; ?></p>
                        </div>
                        <div class="historical-period">
                            <div class="period-line">
                                <?php foreach ($value['post'] as $key => $post) : ?>
                                    <div class="year year-<?php echo $key + 1 ?> <?php echo $key == count($value['post']) - 1 ? "last-item" : "" ?>">
                                        <div class="number"><span><?php echo $post['year']; ?></span></div>
                                        <div class="box-content">
                                            <div class="content">
                                                <div class="image">
                                                    <img src="<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>">
                                                </div>
                                                <div class="text">
                                                    <h5><?php echo $post['title']; ?></h5>
                                                    <p><?php echo $post['description']; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="new-line"></div>
                            </div>
                            <div class="navigation">
                                <div class="nav prev">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.33385 7.32812L4.31536 10.3466C3.95738 10.7046 3.95738 11.285 4.31536 11.643L7.33385 14.6615M4.58385 10.9948L17.4172 10.9948" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                    <span>Giai đoạn Trước</span>
                                </div>
                                <div class="nav next">
                                    <span>Giai đoạn tiếp theo</span>
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M14.1302 14.6615L17.1487 11.643C17.5067 11.285 17.5067 10.7046 17.1487 10.3466L14.1302 7.32812M16.8802 10.9948L4.04688 10.9948" stroke="#DAA622" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endforeach; ?>
        <?php endif; ?>
        </section>
        <section class="other-information">
            <div class="other-container">
                <div class="other-content hover-zoom">
                    <?php if ($other_info) : ?>
                        <?php foreach ($other_info as $value) : ?>
                            <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
</div>
<?php
get_footer();
?>