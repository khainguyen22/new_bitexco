<?php global $c5_options;?>
<section id="section-connect">
    <div class="background-overlay">
    	<div class="container">
        <!-- Start Contact Info -->
          <ul class="connect-social">
            <?php if($c5_options['opt-connect-hotline']) { ?> 
              <li class="connect-hotline">
                <div class="inner-connect-social">
                  <span class="ic-connect"><img src="<?php bloginfo('template_directory');?>/images/ic-hotline.png" alt=""></span>
                  <a href="tel:<?php echo $c5_options['opt-connect-hotline']; ?>">Hottline<span><?php echo $c5_options['opt-connect-hotline']; ?></span></a>
                </div>
              </li>
            <?php } ?>
            <?php if($c5_options['opt-connect-zalo']) { ?> 
              <li class="connect-zalo">
                <div class="inner-connect-social">
                  <span class="ic-connect"><img src="<?php bloginfo('template_directory');?>/images/ic-zalo.png" alt=""></span>
                  <a href="http://zalo.me/<?php echo $c5_options['opt-social-zalo'];?>">Zalo<span><?php echo $c5_options['opt-connect-zalo']; ?> </span></a>
                </div>
              </li>
            <?php } ?>
            <?php if($c5_options['opt-connect-facebook']) { ?> 
              <li class="connect-hotline">
                <div class="inner-connect-social">
                  <span class="ic-connect"><img src="<?php bloginfo('template_directory');?>/images/ic-facebook.png" alt=""></span>
                  <a href="https://www.facebook.com/<?php echo $c5_options['opt-connect-facebook']; ?>">Facebook
                    <span>fb/<?php echo $c5_options['opt-connect-facebook']; ?></span></a>
                </div>
              </li>
            <?php } ?>
          </ul>
          <!-- /End Contact Info -->
    	</div>
    </div>
</section>
