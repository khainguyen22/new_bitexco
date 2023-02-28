<?php

/**
 * Template Name: Dịch vụ
 */
$tong_quan_dich_vu = get_field('tong_quan_dich_vu', 'option');
$tong_quan_dich_vu_banner = '';
$tong_quan_dich_vu_list = '';
if ($tong_quan_dich_vu) {
  $tong_quan_dich_vu_banner = $tong_quan_dich_vu['banner'];
  $tong_quan_dich_vu_list = $tong_quan_dich_vu['list']['item'];
}
$cac_goi_dich_vu =  get_field('cac_goi_dich_vu', 'option');
$cac_goi_dich_vu_banner = '';
$cac_goi_dich_vu_list = '';
if ($cac_goi_dich_vu) {
  $cac_goi_dich_vu_banner = $cac_goi_dich_vu['banner'];
  $cac_goi_dich_vu_list = $cac_goi_dich_vu['list']['item'];
}
$gia_trị_dem_lại_cho_khach_hang = get_field('gia_trị_dem_lại_cho_khach_hang', 'option');
$gia_trị_dem_lại_cho_khach_hang_banner = '';
$gia_trị_dem_lại_cho_khach_hang_tab_content = '';
if ($gia_trị_dem_lại_cho_khach_hang) {
  $gia_trị_dem_lại_cho_khach_hang_banner = $gia_trị_dem_lại_cho_khach_hang['banner'];
  $gia_trị_dem_lại_cho_khach_hang_tab_content = $gia_trị_dem_lại_cho_khach_hang['tab_content'];
}
$lien_he_de_duoc_ho_tro = get_field('lien_he_de_duoc_ho_tro', 'option');
$lien_he_de_duoc_ho_tro_content = '';
if ($lien_he_de_duoc_ho_tro) {
  $lien_he_de_duoc_ho_tro_content = $lien_he_de_duoc_ho_tro['content'];
}

get_header();
?>
<div class="tuyen-dung dich-vu">
  <!-- Banner -->
  <?php
  $banner = get_field('banner_dich_vu', 'option');
  ?>
  <section class="banner service not_navigation" style='background-image:url("<?php echo $banner['background']; ?>")'>
    <div class="container">
      <div class="content">
        <h3><?php echo isset($banner['title']) ? $banner['title'] : ""; ?></h3>
        <p><?php echo isset($banner['description']) ? $banner['description'] : ""; ?></p>
      </div>
    </div>
  </section>
  <!-- End Banner -->


  <div class="main-content">
    <section class="your-privilege overrall">
      <div class="container">
        <div class="your-privilege-content">
          <div class="content">
            <span class="divider"></span>
            <h3><?php echo isset($tong_quan_dich_vu_banner['title']) ? $tong_quan_dich_vu_banner['title'] : ""; ?></h3>
            <p><?php echo isset($tong_quan_dich_vu_banner['description']) ? $tong_quan_dich_vu_banner['description'] : ""; ?></p>
          </div>
          <div class="services">
            <?php if ($tong_quan_dich_vu_list) : ?>
              <?php foreach ($tong_quan_dich_vu_list as $key => $value) : ?>
                <div class="service">
                  <div class="image">
                    <img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>">
                  </div>
                  <h6><?php echo isset($value['title']) ? $value['title'] : ""; ?></h6>
                  <p><?php echo isset($value['description']) ? $value['description'] : ""; ?></p>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    <section class="your-privilege service-packages">
      <div class="container">
        <div class="your-privilege-content">
          <div class="content">
            <span class="divider"></span>
            <h3><?php echo isset($cac_goi_dich_vu_banner['title']) ? $cac_goi_dich_vu_banner['title'] : ""; ?></h3>
            <p><?php echo isset($cac_goi_dich_vu_banner['description']) ? $cac_goi_dich_vu_banner['description'] : ""; ?></p>
          </div>
          <div class="service-packages-content">
            <?php if ($cac_goi_dich_vu_list) : ?>
              <?php foreach ($cac_goi_dich_vu_list as $key => $value) : ?>
                <div class="service-package fixing-service" style='<?php echo $key % 2 != 0 ? 'flex-direction: row-reverse;' : ''; ?>'>
                  <div class="service-image">
                    <img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>">
                  </div>
                  <div class="service-content fixing-service-content">
                    <h5><?php echo isset($value['title']) ? $value['title'] : ""; ?></h5>
                    <div class="description">
                      <?php echo isset($value['description']) ? $value['description'] : ""; ?>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <?php if ($cac_goi_dich_vu_banner['show_button'] == 1) : ?>
            <div class="button-more-infor">
              <a href="<?php echo $cac_goi_dich_vu_banner['link']; ?>" class="btn btn-custom-1 btn-custom-1-l"><?php echo isset($cac_goi_dich_vu_banner['button']) ? $cac_goi_dich_vu_banner['button'] : ""; ?></a>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <section class="your-privilege power-enviroment value-for-customers">
      <div class="container">
        <div class="your-privilege-content">
          <div class="content">
            <span class="divider"></span>
            <h3><?php echo isset($gia_trị_dem_lại_cho_khach_hang_banner['title']) ? $gia_trị_dem_lại_cho_khach_hang_banner['title'] : ""; ?></h3>
            <p><?php echo isset($gia_trị_dem_lại_cho_khach_hang_banner['description']) ? $gia_trị_dem_lại_cho_khach_hang_banner['description'] : ""; ?></p>
          </div>
          <div class="values">
            <div class="the-values">
              <?php if ($gia_trị_dem_lại_cho_khach_hang_tab_content['item']) : ?>
                <?php foreach ($gia_trị_dem_lại_cho_khach_hang_tab_content['item'] as $key => $value) : ?>
                  <div class="drop-down always-grow <?php echo $key == 0 ? 'active' : '' ?>" data-number="<?php echo $key ?>">
                    <h5> <?php echo isset($value['title']) ? $value['title'] : ""; ?></h5>
                    <div class="description">
                      <p> <?php echo isset($value['description']) ? $value['description'] : ""; ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            <div class="the-values-image">
              <?php if ($gia_trị_dem_lại_cho_khach_hang_tab_content['item']) : ?>
                <?php foreach ($gia_trị_dem_lại_cho_khach_hang_tab_content['item'] as $key => $value) : ?>
                  <img src=" <?php echo isset($value['image']) ? $value['image'] : ""; ?>" alt=" <?php echo isset($value['title']) ? $value['title'] : ""; ?>" class="highlight-img img-<?php echo $key ?> <?php echo $key == 0 ? 'active' : '' ?>" data-number="<?php echo $key ?>">
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="your-privilege contact-section">
      <div class="container">
        <div class="your-privilege-content contact-section-content">
          <div class="content">
            <span class="divider"></span>
            <h3><?php echo isset($lien_he_de_duoc_ho_tro['title']) ? $lien_he_de_duoc_ho_tro['title'] : ""; ?></h3>
          </div>
          <div class="cwt-content">
            <div class="cwt-content-img">
              <img src="<?php echo isset($lien_he_de_duoc_ho_tro['image']) ? $lien_he_de_duoc_ho_tro['image'] : ""; ?>" alt="<?php echo isset($lien_he_de_duoc_ho_tro['image']) ? $lien_he_de_duoc_ho_tro['image'] : ""; ?>">
            </div>
            <div class="cwu-content-text">
              <h5><?php echo isset($lien_he_de_duoc_ho_tro_content['title']) ? $lien_he_de_duoc_ho_tro_content['title'] : ""; ?></h5>
              <div class="address contact-info">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M16.8125 8.08333C16.8125 12.9398 11.2875 18 9.90625 18C8.525 18 3 12.9398 3 8.08333C3 4.17132 6.09203 1 9.90625 1C13.7205 1 16.8125 4.17132 16.8125 8.08333Z" stroke="#7E8189" stroke-width="1.5" />
                  <circle r="2.65625" transform="matrix(-1 0 0 1 9.90625 7.90625)" stroke="#7E8189" stroke-width="1.5" />
                </svg>
                <p><?php echo isset($lien_he_de_duoc_ho_tro_content['address']) ? $lien_he_de_duoc_ho_tro_content['address'] : ""; ?></p>
              </div>
              <div class="phone-number contact-info">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15.885 16.8486C14.2564 18.4772 10.0857 16.9469 6.56939 13.4306C3.0531 9.91432 1.52283 5.74356 3.15142 4.11496L4.22373 3.04265C4.964 2.30238 6.18379 2.32195 6.9482 3.08636L8.6091 4.74727C9.37352 5.51168 9.39308 6.73147 8.65281 7.47174L8.42249 7.70206C8.02281 8.10174 7.98371 8.74651 8.35509 9.19656C8.71331 9.63066 9.0995 10.063 9.51823 10.4818C9.93696 10.9005 10.3693 11.2867 10.8034 11.6449C11.2535 12.0163 11.8983 11.9772 12.2979 11.5775L12.5283 11.3472C13.2685 10.6069 14.4883 10.6265 15.2527 11.3909L16.9136 13.0518C17.6781 13.8162 17.6976 15.036 16.9573 15.7763L15.885 16.8486Z" stroke="#7E8189" stroke-width="1.5" />
                </svg>
                <?php if ($lien_he_de_duoc_ho_tro_content['phone']) : ?>
                  <span><?php _e('Tel: ', POWER) ?></span>
                  <?php foreach ($lien_he_de_duoc_ho_tro_content['phone'] as $key => $value) : ?>
                    <?php echo ($key > 0) ? '<span class="mx-1">|</span>' : '' ?>
                    <a href="tel:+<?php echo $value['item']; ?>">+<?php echo $value['item']; ?></a>
                  <?php endforeach; ?>
                <?php endif; ?>
                </p>
              </div>
              <div class="contact-info fax">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_3949_135568)">
                    <g clip-path="url(#clip1_3949_135568)">
                      <path d="M17.2246 18.5177H5.73888C5.54944 18.5177 5.36776 18.4424 5.23381 18.3085C5.09985 18.1745 5.0246 17.9928 5.0246 17.8034C5.0246 17.614 5.09985 17.4323 5.23381 17.2983C5.36776 17.1644 5.54944 17.0891 5.73888 17.0891H17.2246C17.5155 17.1139 17.8045 17.0237 18.0296 16.8378C18.2547 16.6519 18.3979 16.3851 18.4286 16.0948V7.81483C18.3978 7.52461 18.2545 7.25801 18.0294 7.07224C17.8043 6.88646 17.5154 6.79631 17.2246 6.82111C17.0352 6.82111 16.8535 6.74586 16.7195 6.6119C16.5856 6.47795 16.5103 6.29627 16.5103 6.10683C16.5103 5.91739 16.5856 5.7357 16.7195 5.60175C16.8535 5.46779 17.0352 5.39254 17.2246 5.39254C17.8944 5.36651 18.5473 5.60668 19.0406 6.06057C19.5339 6.51446 19.8275 7.14515 19.8572 7.81483V16.0943C19.8276 16.7641 19.5341 17.395 19.0408 17.8491C18.5476 18.3032 17.8946 18.5436 17.2246 18.5177Z" fill="#7E8189" />
                      <path d="M8.30288 6.8192H5.73888C5.54944 6.8192 5.36776 6.74394 5.23381 6.60999C5.09985 6.47603 5.0246 6.29435 5.0246 6.10491C5.0246 5.91547 5.09985 5.73379 5.23381 5.59983C5.36776 5.46588 5.54944 5.39063 5.73888 5.39062H8.30288C8.49232 5.39063 8.674 5.46588 8.80796 5.59983C8.94191 5.73379 9.01717 5.91547 9.01717 6.10491C9.01717 6.29435 8.94191 6.47603 8.80796 6.60999C8.674 6.74394 8.49232 6.8192 8.30288 6.8192Z" fill="#7E8189" />
                      <path d="M4.05717 19.235H2.53774C1.903 19.2337 1.29465 18.9809 0.845822 18.5321C0.396993 18.0833 0.144242 17.4749 0.142883 16.8402V6.36304C0.144393 5.7284 0.39721 5.12019 0.846023 4.67149C1.29484 4.22278 1.9031 3.97011 2.53774 3.96875H4.05717C4.69181 3.97011 5.30007 4.22278 5.74889 4.67149C6.1977 5.12019 6.45052 5.7284 6.45203 6.36304V16.8402C6.45067 17.4749 6.19792 18.0833 5.74909 18.5321C5.30026 18.9809 4.69191 19.2337 4.05717 19.235ZM2.53774 5.39732C2.28161 5.39747 2.03601 5.49925 1.85484 5.6803C1.67368 5.86136 1.57176 6.10691 1.57145 6.36304V16.8402C1.57161 17.0964 1.67346 17.3421 1.85464 17.5233C2.03582 17.7045 2.28151 17.8063 2.53774 17.8065H4.05717C4.31335 17.8062 4.55895 17.7043 4.7401 17.5231C4.92125 17.342 5.02315 17.0964 5.02346 16.8402V6.36304C5.023 6.10695 4.92103 5.8615 4.7399 5.68047C4.55877 5.49945 4.31325 5.39762 4.05717 5.39732H2.53774Z" fill="#7E8189" />
                      <path d="M16.3755 9.49458H8.50634C8.3169 9.49458 8.13522 9.41932 8.00126 9.28537C7.86731 9.15142 7.79205 8.96973 7.79205 8.78029V1.48772C7.79205 1.29828 7.86731 1.1166 8.00126 0.982647C8.13522 0.848692 8.3169 0.773438 8.50634 0.773438H16.3755C16.5649 0.773438 16.7466 0.848692 16.8806 0.982647C17.0145 1.1166 17.0898 1.29828 17.0898 1.48772V8.78029C17.0898 8.96973 17.0145 9.15142 16.8806 9.28537C16.7466 9.41932 16.5649 9.49458 16.3755 9.49458ZM9.22062 8.06601H15.6612V2.19915H9.22062V8.06601Z" fill="#7E8189" />
                      <path d="M9.49487 12.6708C9.67937 12.6634 9.85385 12.5849 9.98178 12.4517C10.1097 12.3186 10.1812 12.1411 10.1812 11.9565C10.1812 11.7718 10.1097 11.5943 9.98178 11.4612C9.85385 11.3281 9.67937 11.2496 9.49487 11.2422C9.31038 11.2496 9.13589 11.3281 9.00797 11.4612C8.88004 11.5943 8.80859 11.7718 8.80859 11.9565C8.80859 12.1411 8.88004 12.3186 9.00797 12.4517C9.13589 12.5849 9.31038 12.6634 9.49487 12.6708Z" fill="#7E8189" />
                      <path d="M12.4412 12.6708C12.6257 12.6634 12.8001 12.5849 12.9281 12.4517C13.056 12.3186 13.1274 12.1411 13.1274 11.9565C13.1274 11.7718 13.056 11.5943 12.9281 11.4612C12.8001 11.3281 12.6257 11.2496 12.4412 11.2422C12.2567 11.2496 12.0822 11.3281 11.9543 11.4612C11.8263 11.5943 11.7549 11.7718 11.7549 11.9565C11.7549 12.1411 11.8263 12.3186 11.9543 12.4517C12.0822 12.5849 12.2567 12.6634 12.4412 12.6708Z" fill="#7E8189" />
                      <path d="M15.3875 12.6708C15.5719 12.6634 15.7464 12.5849 15.8744 12.4517C16.0023 12.3186 16.0737 12.1411 16.0737 11.9565C16.0737 11.7718 16.0023 11.5943 15.8744 11.4612C15.7464 11.3281 15.5719 11.2496 15.3875 11.2422C15.203 11.2496 15.0285 11.3281 14.9005 11.4612C14.7726 11.5943 14.7012 11.7718 14.7012 11.9565C14.7012 12.1411 14.7726 12.3186 14.9005 12.4517C15.0285 12.5849 15.203 12.6634 15.3875 12.6708Z" fill="#7E8189" />
                      <path d="M9.49487 15.0614C9.67937 15.054 9.85385 14.9755 9.98178 14.8424C10.1097 14.7092 10.1812 14.5317 10.1812 14.3471C10.1812 14.1625 10.1097 13.985 9.98178 13.8518C9.85385 13.7187 9.67937 13.6402 9.49487 13.6328C9.31038 13.6402 9.13589 13.7187 9.00797 13.8518C8.88004 13.985 8.80859 14.1625 8.80859 14.3471C8.80859 14.5317 8.88004 14.7092 9.00797 14.8424C9.13589 14.9755 9.31038 15.054 9.49487 15.0614Z" fill="#7E8189" />
                      <path d="M12.4412 15.0614C12.6257 15.054 12.8001 14.9755 12.9281 14.8424C13.056 14.7092 13.1274 14.5317 13.1274 14.3471C13.1274 14.1625 13.056 13.985 12.9281 13.8518C12.8001 13.7187 12.6257 13.6402 12.4412 13.6328C12.2567 13.6402 12.0822 13.7187 11.9543 13.8518C11.8263 13.985 11.7549 14.1625 11.7549 14.3471C11.7549 14.5317 11.8263 14.7092 11.9543 14.8424C12.0822 14.9755 12.2567 15.054 12.4412 15.0614Z" fill="#7E8189" />
                      <path d="M15.3875 15.0614C15.5719 15.054 15.7464 14.9755 15.8744 14.8424C16.0023 14.7092 16.0737 14.5317 16.0737 14.3471C16.0737 14.1625 16.0023 13.985 15.8744 13.8518C15.7464 13.7187 15.5719 13.6402 15.3875 13.6328C15.203 13.6402 15.0285 13.7187 14.9005 13.8518C14.7726 13.985 14.7012 14.1625 14.7012 14.3471C14.7012 14.5317 14.7726 14.7092 14.9005 14.8424C15.0285 14.9755 15.203 15.054 15.3875 15.0614Z" fill="#7E8189" />
                    </g>
                  </g>
                  <defs>
                    <clipPath id="clip0_3949_135568">
                      <rect width="20" height="20" fill="white" />
                    </clipPath>
                    <clipPath id="clip1_3949_135568">
                      <rect width="20" height="20" fill="white" />
                    </clipPath>
                  </defs>
                </svg>
                Fax: <a href="tel:+<?php echo isset($lien_he_de_duoc_ho_tro_content['fax']) ? $lien_he_de_duoc_ho_tro_content['fax'] : ""; ?>">+ <?php echo isset($lien_he_de_duoc_ho_tro_content['fax']) ? $lien_he_de_duoc_ho_tro_content['fax'] : ""; ?> </a>
              </div>
              <div class="contact-info email">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M18.3334 5V14.8333C18.3334 15.3856 17.8856 15.8333 17.3334 15.8333H2.66669C2.1144 15.8333 1.66669 15.3856 1.66669 14.8333V5M18.3334 5H1.66669M18.3334 5L10 10.4167L1.66669 5" stroke="#7E8189" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <a href="mailto:<?php echo isset($lien_he_de_duoc_ho_tro_content['email']) ? $lien_he_de_duoc_ho_tro_content['email'] : ""; ?>"><?php echo isset($lien_he_de_duoc_ho_tro_content['email']) ? $lien_he_de_duoc_ho_tro_content['email'] : ""; ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>


  <!-- Other Infor -->
  <?php
  $other_info = get_field('other_info_dich_vu', 'option');
  ?>
  <section class="other-information other-information-service">
    <div class="other-container ">
      <div class="other-content hover-zoom">
        <?php if ($other_info) : ?>
          <?php foreach ($other_info as $value) : ?>
            <a href="<?php echo $value['link']; ?>" class="hydro-electric-news" style="background-image:url('<?php echo $value['image']; ?>')"><span class="text"><?php echo $value['text']; ?></span> </a>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <!-- End Other Infor -->
</div>
<?php
get_footer();
?>