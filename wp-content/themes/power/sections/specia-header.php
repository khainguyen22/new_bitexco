<?php global $c5_options;?>
<section class="header-top-info-1">
    <div class="container">
    	<div class="container-box">
        <div class="row">
        	<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4 header-top-left">
				<?php if($c5_options['switch-social']) { ?>
					<ul class="social pull-left">
						<?php if($c5_options['social-facebook']) { ?> 
							<li><a href="<?php echo $c5_options['social-facebook']; ?>"><i class="fab fa-facebook-f"></i></a></li>
						<?php } ?>
											
						<?php if($c5_options['social-twitter']) { ?> 
						<li><a href="<?php echo $c5_options['social-twitter']; ?>"><i class="fab fa-twitter"></i></a></li>
						<?php } ?>
						
						<?php if($c5_options['social-google']) { ?> 
						<li><a href="<?php echo $c5_options['social-google']; ?>"><i class="fab fa-google-plus"></i></a></li>
						<?php } ?>

						<?php if($c5_options['social-youtube']) { ?> 
						<li><a href="<?php echo $c5_options['social-youtube']; ?>"><i class="fab fa-youtube"></i></a></li>
						<?php } ?>

						<?php if($c5_options['social-linkedin']) { ?> 
						<li><a href="<?php echo $c5_options['social-linkedin']; ?>"><i class="fab fa-linkedin-in"></i></a></li>
						<?php } ?>
						
						<?php if($c5_options['social-pinterest']) { ?> 
						<li><a href="<?php echo $c5_options['social-pinterest']; ?>"><i class="fab fa-pinterest-square"></i></a></li>
						<?php } ?>

						<?php if($c5_options['social-instagram']) { ?> 
						<li><a href="<?php echo $c5_options['social-instagram']; ?>"><i class="fab fa-instagram"></i></a></li>
						<?php } ?>
					</ul>
				<?php } ?>
            </div>
            <div class="col-xs-6 col-sm-8 col-md-8 col-lg-8 header-top-right">
				<?php if($c5_options['opt-header-address']) { ?> 
					<p class="top-header-address">
						<i class="fa fa-map-marked-alt"></i><?php echo $c5_options['opt-header-address']; ?>
					</p>
				<?php } ?>
				<?php if($c5_options['opt-header-hotline']) { ?> 
					<p class="top-header-hotline">
						<i class="fab fa-whatsapp"></i>
						<a href="tel:<?php echo $c5_options['opt-header-hotline']; ?>"><?php echo $c5_options['opt-header-hotline']; ?>
						</a>	
					</p>
				<?php } ?>
			</div>
        </div>
        </div>
    </div>
</section>

<div class="clearfix"></div>