<?php

/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package specia
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

	<div class="post-content">
		<div class="entry-content">
			<?php if (is_home() && current_user_can('publish_posts')) : ?>
				<p style="margin: 0 0 20px  0 ;">
					<?php printf(__('Bạn đã sẵn sàng để đăng bài viết đầu tiên của bạn? <a href="%1$s">Hãy bắt đầu từ đây</a>.', 'specia'), esc_url(admin_url('post-new.php'))); ?>
				</p>

			<?php elseif (is_search()) : ?>
				<p style="margin: 0 0 20px  0 ;">
					<?php _e('Xin lỗi, nhưng không có gì phù hợp với điều kiện tìm kiếm của bạn. Vui lòng thử lại với một số từ khóa khác nhau.', 'specia'); ?>
				</p>
				<?php get_search_form(); ?>
			<?php else : ?>
				<p style="margin: 0 0 20px  0 ;">
					<?php _e('Có vẻ như chúng tôi không thể tìm thấy những gì bạn đang tìm kiếm. Có lẽ tìm kiếm có thể giúp đỡ.', 'specia'); ?>
				</p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div>

	</div>
</article>