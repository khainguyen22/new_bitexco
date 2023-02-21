<?php

/**
Template Name: Ban lãnh đạo - Ban kiểm soát
 **/
$banner = get_field('banner_ban_lanh_dao', 'option');
$navigation = '';
if ($banner) {
    $navigation = $banner['navigation'];
}
$ban_kiem_soat =  get_field('ban_kiem_soat', 'option');
$ban_kiem_soat_banner = '';
$ban_kiem_soat_operating = '';
$ban_kiem_soat_member = '';
$ban_kiem_soat_member_person = '';
if ($ban_kiem_soat) {
    $ban_kiem_soat_banner = $ban_kiem_soat['banner'];
    $ban_kiem_soat_operating = $ban_kiem_soat['operating'];
    $ban_kiem_soat_member = $ban_kiem_soat['member'];
    $ban_kiem_soat_member_person = $ban_kiem_soat_member['person'];
}

$other_info = get_field('other_info_ban_lanh_dao', 'option');
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";
get_header();
?>
<div class="ban-lanh-dao">
    <?php if ($banner) : ?>
        <section class="banner" style='background-image:url("<?php echo $banner['background']; ?>")'>
            <div class="container">
                <div class="content">
                    <?php if ($banner['title']) : ?><h3><?php echo $banner['title'] ?></h3> <?php endif; ?>
                    <?php if ($banner['description']) : ?> <p><?php echo   $banner['description']; ?></p> <?php endif; ?>
                </div>
                <?php if ($navigation) : ?>
                    <div class="navigation">
                        <ul>
                            <?php foreach ($navigation as $key => $value) : ?>
                                <li class="<?php echo $actual_link == $value['link'] ? 'active' : '' ?>"> <a href="<?php echo $value['link']; ?>"><?php echo $value['label']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
    <?php if ($ban_kiem_soat) : ?>
        <div class="main">
            <div class="container">
                <div class="wrap-head">
                    <?php if ($ban_kiem_soat_banner['title']) : ?> <h3 class="title"><?php echo $ban_kiem_soat_banner['title']; ?></h3> <?php endif; ?>
                    <?php if ($ban_kiem_soat_banner['description']) : ?> <p class="description"><?php echo $ban_kiem_soat_banner['description']; ?></p> <?php endif; ?>
                </div>
                <span class="divider-section"></span>
                <div class="content">
                    <?php if ($ban_kiem_soat_operating) : ?>
                        <?php foreach ($ban_kiem_soat_operating as $key => $value) : ?>
                            <div class="person d-flex">
                                <div class="image">
                                    <img src="<?php echo $value['image']; ?>" alt="person">
                                </div>
                                <div class="info">
                                    <?php if ($value['position']) : ?> <p class="position"><?php echo $value['position']; ?></p> <?php endif; ?>
                                    <?php if ($value['name']) : ?> <h6 class="name"><?php echo $value['name']; ?></h6> <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <span class="divider-section"></span>
                    <div class="wraper-member" style="display: none">
                        <?php if ($ban_kiem_soat_member['title']) : ?> <h5 class="title"><?php echo $ban_kiem_soat_member['title']; ?></h5><?php endif; ?>
                        <div class="member">
                            <?php if ($ban_kiem_soat_member_person) : ?>
                                <?php foreach ($ban_kiem_soat_member_person as $key => $value) : ?>
                                    <div class="person d-flex">
                                        <div class="image">
                                            <img src="<?php echo $value['image']; ?>" alt="person">
                                        </div>
                                        <div class="info">
                                            <?php if ($value['name']) : ?><h6 class="name"><?php echo $value['name']; ?></h6> <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
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