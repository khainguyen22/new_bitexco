<?php global $c5_options;?>
<section id="section-news" class="fadeIn wow" data-wow-delay="0.5s">
	<div class="background-overlay">
		<div class="container">
			<h2 class="title-section"><span><?php echo $c5_options['opt-title-news'];?></span></h2>
			<div class="row content-news">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 colums-bignews">
				<p class="des-section"><?php echo $c5_options['opt-description-news'];?></p>
				<?php
				$news = new WP_Query(array(
				'post_type'=>'post',
				'post_status'=>'publish',
				'cat' => $c5_options['opt-select-news'],
				'orderby' => 'Date',
				'order' => 'DESC',
				'posts_per_page'=> 1));
				?>
				<?php $i=1;while ($news->have_posts()) : $news->the_post(); ?>
				<?php if($i==1) : ?>
			    	<div class="box-news">
					    <div class="img-news">
					        <a href="<?php the_permalink() ;?>"> 
					           <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium');?>" alt="">
					        </a>
					        <div class="ovrly"></div>
					        <div class="details-news">
					            <a href="<?php the_permalink() ;?>">Xem chi tiết</a>
					        </div>
					    </div>
					    <div class="info-news">
					        <a class="name-news" href="<?php the_permalink() ;?>"><?php the_title() ;?></a>
						    <p class="excerpt-news"><?php the_excerpt_max_charlength(140);?></p>
						    <p class="time-news"><span><i class="fa fa-calendar-alt"></i><?php the_time('d/m/Y') ?></span><span class="post-view"><i class="fas fa-eye"></i> <?php postview_set( get_the_ID() );?><?php echo postview_get( get_the_ID() );?></span></p>
					    </div>
					</div>
				<?php endif;?>
				<?php $i++; endwhile; wp_reset_query();?>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 colums-smallnews">
					<div class="readmore-section hidden-xs"><a href="<?php echo $c5_options['opt-url-news'];?>">Xem thêm <i class="fa fa-angle-double-right"></i></a></div>
					<?php
					$news = new WP_Query(array(
					'post_type'=>'post',
					'post_status'=>'publish',
					'cat' => $c5_options['opt-select-news'],
					'orderby' => 'Date',
					'order' => 'DESC',
					'posts_per_page'=> 4));
					?>
					<?php $i=1;while ($news->have_posts()) : $news->the_post(); ?>
					<?php if($i>1) : ?>
				    	<div class="box-news">
						    <div class="img-news">
						        <a href="<?php the_permalink() ;?>"> 
						           <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail');?>" alt="">
						        </a>
						        <div class="ovrly"></div>
						    </div>
						    <div class="info-news">
						        <a class="name-news" href="<?php the_permalink() ;?>"><?php the_title() ;?></a>
						        <p class="excerpt-news"><?php the_excerpt_max_charlength(140);?></p>
						        <p class="time-news"><span><i class="fa fa-calendar-alt"></i><?php the_time('d/m/Y') ?></span><span class="post-view"><i class="fas fa-eye"></i> <?php postview_set( get_the_ID() );?><?php echo postview_get( get_the_ID() );?></span></p>
						    </div>
						</div>
					<?php endif;?>
					<?php $i++; endwhile; wp_reset_query();?>
				</div>
			</div>
			<div class="readmore-section show-mobile"><a href="<?php echo $c5_options['opt-url-news'];?>">Xem thêm <i class="fa fa-angle-double-right"></i></a></div>
		</div>
	</div>
</section>
