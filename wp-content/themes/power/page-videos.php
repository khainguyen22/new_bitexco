<?php
/**
 * Template Name: Page Videos
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SH_Theme
 */
 
get_header();?>
<?php global $c5_options;?>
<section id="page-videos">
    <?php if( have_posts()) :  the_post();?>
    <div class="background-overlay">
        <h2 class="title-section"><span><?php the_title();?></span></h2>
        <?php if (isset($c5_options['opt-slides-videos']) && !empty($c5_options['opt-slides-videos'])) : ?>
        <div class="row content-page-videos">
          <?php 
            $videos = $c5_options['opt-slides-videos']; 
            foreach ($videos as $key => $value) {
          ?>        
          <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 item-videos">
            <div class="box-videos">
                <div class="img-videos">                 
                   <a class="fancybox" href="<?php echo $value['url'];?>" title="<?php echo $value['title'];?>">
                       <img src="<?php echo $value['image'];?>" alt=""/>  
                      <span class="icplay-video"><i class="fab fa-youtube"></i></span>
                  </a>  
                 </div>
                 <p class="name-videos" title="<?php echo $value['title'];?>"><?php echo $value['title'];?></p> 
                </div>
          </div>
          <?php } ?> 
        </div>
      <?php endif;?>	
    </div>	
    <?php endif;?>  
</section>
<?php get_footer(); ?>

