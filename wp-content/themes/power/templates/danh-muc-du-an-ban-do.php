<?php

/**
Template Name: Danh muc du an / ban do
 **/
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REDIRECT_URL]";
$banner = get_field('banner_danh_muc_du_an', 'option');
$other_info = get_field('other_info_danh_muc_du_an', 'option');
$navigation = '';
if ($banner) {
    $navigation = $banner['navigation'];
}
$danh_muc_du_an_ban_do = get_field('danh_muc_du_an_ban_do', 'option');
get_header();
?>
<div class="danh-muc-du-an-ban-do">
    <section class="banner list" style='background-image:url("<?php echo $banner['background']; ?>")'>
        <div class="container">
            <div class="content">
                <?php if ($banner['title']) : ?><h3><?php echo  $banner['title']; ?></h3><?php endif; ?>
                <?php if ($banner['description']) : ?><p><?php echo  $banner['description']; ?></p><?php endif; ?>
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
    <section class="projects">
        <div class="projects-content">
            <h3>
                <?php if ($danh_muc_du_an_ban_do['title']) : ?><h3 class="justify-content-center"><?php echo $danh_muc_du_an_ban_do['title']; ?></h3><?php endif; ?>
            </h3>
            <?php if ($danh_muc_du_an_ban_do['description']) : ?><p><?php echo $danh_muc_du_an_ban_do['description']; ?></p><?php endif; ?>
            <?php if ($danh_muc_du_an_ban_do['projects']) : ?>
                <div class="figures">
                    <?php foreach ($danh_muc_du_an_ban_do['projects'] as $value) : ?>
                        <div class="figure-column">
                            <?php if ($value['icon']) : ?> <img src="<?php echo $value['icon'] ?>" alt="<?php echo _e($value['label']) ?>"><?php endif; ?>
                            <div class="number-title">
                                <?php if ($value['number']) : ?> <h4><?php echo _e($value['number']) ?></h4><?php endif; ?>
                                <?php if ($value['label']) : ?> <p><?php echo _e($value['label']) ?></p><?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section class="map-section">
        <div id="googleMap" style="width:100%; height:708px;"></div>
    </section>
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
    <script>
        function myMap() {
            var styledMapType = new google.maps.StyledMapType([{}]);

            var mapProp = {
                center: new google.maps.LatLng(17.08609183914221, 106.85480302417643),
                zoom: 6,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                mapTypeControl: true,
                scaleControl: true,
                streetViewControl: true,
                rotateControl: true,
                fullscreenControl: true
            };

            console.log(google.maps.MapTypeId);

            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

            var LocationsForMap = [
                ['Hagiang', 22.91014717658154, 105.29492723890908],
                ['Backan', 22.57618538261618, 105.56143008143711],
                ['Hagiang', 22.444560260081417, 104.726634926565],
                ['Tuyenquang', 22.225269125058656, 105.33095500825091],
                ['Yenbai', 21.680310326903435, 104.81317050662587],
                ['Dienbien', 21.60191200314312, 103.30327898586076],
                ['Sonla', 21.534120182998386, 103.85577830840046],
                ['Thanhhoa', 19.69745568187122, 105.77153766752723],
                ['Thanhhoa', 19.376657264792357, 105.73709077982545],
                ['Quangbinh', 17.409217112040157, 106.6213551654783],
                ['Quangtri', 17.07828185613196, 107.02517569865654],
                ['Quangnam', 15.933604833712103, 107.37412291082302],
                ['Gialai', 14.184142139406017, 107.68945433960768],
                ['Gialai', 13.886415510819951, 108.05456327159273],
                ['EsupDistrict', 13.119725824443346, 107.67012689956005],
                ['Daklak', 12.804374372800797, 108.00565939849088],
                ['Ninhthuan', 11.618905004440142, 108.70297581998966],
                ['<div class="test">Tayninh</div>', 11.49400726885824, 105.9157459481872],
            ];

            var infowindow = new google.maps.InfoWindow();

            var marker, i;

            var markerImage = 'https://power.dtts.com.vn/wp-content/uploads/2023/02/Frame-427319445-1.png';
            for (i = 0; i < LocationsForMap.length; i++) {
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(LocationsForMap[i][1], LocationsForMap[i][2]),
                    map: map,
                    icon: markerImage,
                    mapTypeId: google.maps.MapTypeId.SATELLITE
                });

                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent('<h1 style="padding: 20px">' + LocationsForMap[i][0] + '</h1>');
                        infowindow.open(map, marker);
                    }
                })(marker, i));
            }
        }
    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDIJ9XX2ZvRKCJcFRrl-lRanEtFUow4piM&callback=initMap"> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1PQnohUd35MSfol6G-6D9m6i6R422_Jg&callback=myMap">
    </script>
</div>
<?php
get_footer();
?>