<?php global $c5_options;?>
<section id="section-learning" class="fadeIn wow" data-wow-delay="0.5s">
    <div class="background-overlay">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-7 col-lg-7">
              <div class="image-learning">
                  <img src="<?php echo $c5_options['opt-image-learning']['url'];?>" alt="">
              </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
            <h2 class="title-section"><span><?php echo $c5_options['opt-title-learning'];?></span></h2>
            <?php if (isset($c5_options['opt-slides-learning']) && !empty($c5_options['opt-slides-learning'])) : ?>
            <div id="learning-content">
              <?php 
                $learning = $c5_options['opt-slides-learning']; 
                foreach ($learning as $key => $value) {
              ?>        
              <div class="box-item-learning">   
                  <a class="img-learning" href="<?php echo $value['url'];?>">    
                     <img src="<?php echo $value['image'];?>" alt=""/>   
                  </a> 
                  <div class="infor-learning">
                     <h3 class="name-learning"><?php echo $value['title']?></h3> 
                     <p class="readmore-learning"><a href="<?php echo $value['url']?>">Xem thêm <i class="fa fa-angle-double-right"></i></a></p>
                  </div>     
              </div>
              <?php } ?> 
            </div>
          <?php endif;?>
          </div>
        </div>
      </div>
    </div>
</section>
<div class="clearfix"></div>