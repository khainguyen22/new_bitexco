<?php global $c5_options;?>
<section id="section-partners" class="fadeIn wow" data-wow-delay="0.5s">
    <div class="background-overlay">
      <div class="container">
        <h2 class="title-section"><span><?php echo $c5_options['opt-title-partners'];?></span></h2>
      <?php if (isset($c5_options['opt-slides-partners']) && !empty($c5_options['opt-slides-partners'])) : ?>
        <div id="partners-carousel" class="owl-carousel owl-theme">
          <?php 
            $partners = $c5_options['opt-slides-partners']; 
            foreach ($partners as $key => $value) {
          ?>        
          <div class="item-partners">          
             <img src="<?php echo $value['image']?>" alt=""/>       
          </div>
          <?php } ?> 
        </div>
      <?php endif;?>
      </div>
    </div>
</section>
<div class="clearfix"></div>