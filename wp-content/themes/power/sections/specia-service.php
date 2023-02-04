<?php global $c5_options;?>
<section id="section-service" class="fadeIn wow" data-wow-delay="0.5s">
    <div class="background-overlay">
      <h2 class="title-section"><?php echo $c5_options['opt-title-service'];?></h2>
      <div class="container">
        <?php if (isset($c5_options['opt-slides-service']) && !empty($c5_options['opt-slides-service'])) : ?>
          <div id="service-carousel" class="owl-carousel owl-theme">
            <?php 
              $service = $c5_options['opt-slides-service']; 
              foreach ($service as $key => $value) {
            ?>        
            <div class="item-service">   
                <a class="img-service" href="<?php echo $value['url']?>">    
                   <img src="<?php echo $value['image']?>" alt=""/>   
                </a> 
                <a class="name-service" href="<?php echo $value['url']?>"><?php echo $value['title']?></a>      
            </div>
            <?php } ?> 
          </div>
        <?php endif;?>
        <div class="readmore-service"><a href="<?php echo $c5_options['opt-url-service'];?>">Xem tất cả <i class="fa fa-angle-double-right"></i></a></div>
      </div>
    </div>
</section>
<div class="clearfix"></div>