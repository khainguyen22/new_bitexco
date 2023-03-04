<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0.0
 *
 * This file is here for backward compatibility with old themes and will be removed in a future version
 */
_deprecated_file(
	/* translators: %s: Template name. */
	sprintf( __( 'Theme without %s' ), basename( __FILE__ ) ),
	'3.0.0',
	null,
	/* translators: %s: Template name. */
	sprintf( __( 'Please include a %s template in your theme.' ), basename( __FILE__ ) )
);

// Do not delete these lines.
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' === basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
	die( 'Please do not load this page directly. Thanks!' );
}

if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.' ); ?></p>
	<?php
	return;
}
?>

<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
	<h3 id="comments">
		<?php
			if ( 1 <= get_comments_number() ) {
				_e('Bình luận' . '(' . get_comments_number() . ')');
			} 
		?>
	</h3>
<?php endif; ?>

<?php 

	//Declare Vars
	$comment_send = 'Gửi';
	$comment_reply = '';
	$comment_reply_to = 'Reply';

	$comment_author = 'Name';
	$comment_email = 'E-Mail';
	$comment_body = 'Nhập bình luận của bạn';
	$comment_url = 'Website';
	$comment_cookies_1 = ' By commenting you accept the';
	$comment_cookies_2 = ' Privacy Policy';

	$comment_before = 'Registration isn\'t required.';

	$comment_cancel = 'Cancel Reply';
	$logged_in_as = '';
	$current_user = wp_get_current_user()->data->user_nicename;

	//Array
	$comments_args = array(
			//Define Fields
			'fields' => array(
					// //Author field
					// 'author' => '<p class="comment-form-author"><br /><input id="author" name="author" aria-required="true" placeholder="' . $comment_author .'"></input></p>',
					// //Email Field
					// 'email' => '<p class="comment-form-email"><br /><input id="email" name="email" placeholder="' . $comment_email .'"></input></p>',
					// //URL Field
					// 'url' => '<p class="comment-form-url"><br /><input id="url" name="url" placeholder="' . $comment_url .'"></input></p>',
					// //Cookies
					// 'cookies' => '<input type="checkbox" required>' . $comment_cookies_1 . '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a>',
			),
			// Change the text before the comment form
			'logged_in_as' => __( $logged_in_as ),
			// Change button format
			'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
			// Add logged in user name
			'submit_field ' => '<p class="form-submit"><span>abc</span> %1$s %2$s</p>',
			// Change the title of send button
			'label_submit' => __( $comment_send ),
			// Change the title of the reply section
			'title_reply' => __( $comment_reply ),
			// Change the title of the reply section
			'title_reply_to' => __( $comment_reply_to ),
			//Cancel Reply Text
			'cancel_reply_link' => __( $comment_cancel ),
			// Redefine your own textarea (the comment body).
			'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" aria-required="true" placeholder="' . $comment_body .'"></textarea></p><div class="current-user"><svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect width="48" height="48" rx="24" transform="matrix(-1 0 0 1 48.5 0)" fill="#F6F8FC"/>
				<circle cx="24.5" cy="19" r="4" stroke="#2B3F6C" stroke-width="1.5"/>
				<path d="M31.5 28.9347C31.5 28.0743 30.9591 27.3068 30.1489 27.0175V27.0175C26.496 25.7128 22.504 25.7128 18.8511 27.0175V27.0175C18.0409 27.3068 17.5 28.0743 17.5 28.9347V30.2502C17.5 31.4376 18.5517 32.3498 19.7272 32.1818L20.6816 32.0455C23.2144 31.6837 25.7856 31.6837 28.3184 32.0455L29.2728 32.1818C30.4483 32.3498 31.5 31.4376 31.5 30.2502V28.9347Z" stroke="#2B3F6C" stroke-width="1.5"/>
				</svg>
				<span class="author">'. $current_user .' <span style="font-weight: 300;">(Bạn)</span></span>
				
				</div>
				<div class="g-recaptcha brochure__form__captcha" data-sitekey="6Lfqq80kAAAAAABWxTKrLkiQrzk_Ud4_k9IO_XmP"></div>
				',
			//Message Before Comment
			'comment_notes_before' => __( $comment_before),
			// Remove "Text or HTML to be displayed after the set of comment fields".
			'comment_notes_after' => '',
			//Submit Button ID
			'id_submit' => __( 'comment-submit' ),
	);
?>

<?php comment_form($comments_args); ?>

<?php if ( have_comments() ) : ?>
	<ol class="comment-list d-flex">
		<?php 
			function rjs_comments_walker() { ?>
				<div class="comment-item d-flex">
					<div class="avartar">
						<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect width="48" height="48" rx="24" transform="matrix(-1 0 0 1 48 0)" fill="#F6F8FC"/>
							<circle cx="24" cy="19" r="4" stroke="#2B3F6C" stroke-width="1.5"/>
							<path d="M31 28.9347C31 28.0743 30.4591 27.3068 29.6489 27.0175V27.0175C25.996 25.7128 22.004 25.7128 18.3511 27.0175V27.0175C17.5409 27.3068 17 28.0743 17 28.9347V30.2502C17 31.4376 18.0517 32.3498 19.2272 32.1818L20.1816 32.0455C22.7144 31.6837 25.2856 31.6837 27.8184 32.0455L28.7728 32.1818C29.9483 32.3498 31 31.4376 31 30.2502V28.9347Z" stroke="#2B3F6C" stroke-width="1.5"/>
						</svg>
					</div>
					<div class="comment-infor d-flex">
						<div class="author-and-time">
							<span class="author"><?php comment_author( )?></span>
							<span>
								<svg width="4" height="4" viewBox="0 0 4 4" fill="none" xmlns="http://www.w3.org/2000/svg">
								<circle cx="2" cy="2" r="2" fill="#DAA622"/>
								</svg>
							</span>
							<span class="time"><?php echo get_comment_time( 'h', true, true ) . 'h trước' ?></span>
						</div>
						<div class="comment-text">
							<?php comment_text()?>
						</div>
					</div>
				</div>
			<?php } 
		?>
		<div class="comment-status d-flex">
			<div class="newest active">
				<h5><a href="<?php echo $_SERVER['HTTPS'].'?newest=true'?>"><?php _e('Mới nhất')?></a></h5>
			</div>
			<div class="oldest">
				<h5><a href="<?php echo $_SERVER['HTTPS'].'?oldest=true'?>"><?php _e('Cũ nhất')?></a></h5>
			</div>
		</div>
		<?php 
			if (isset($_GET['newest']) && $_GET['newest'] !== '') {
				$reverse_top_level = true;
			} else if (isset($_GET['oldest']) && $_GET['oldest'] !== ''){
				$reverse_top_level = false;
			} else {
				$reverse_top_level = true;
			}
		?>
		<?php wp_list_comments(['callback' => 'rjs_comments_walker', 'reverse_top_level' => $reverse_top_level]);?>
	</ol>
	<div class="pagination comment-pagination">
			<?php 
				$args = [
					'prev_text'    => sprintf('<i></i> %1$s', __('

								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

										<path d="M15 5L9.66939 11.2191C9.2842 11.6684 9.2842 12.3316 9.66939 12.7809L15 19" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>

								</svg>

								<span data-paged=' . $paged . '>Trước</span>

				', POWER)),

					'next_text'    => sprintf('%1$s <i></i>', __('<span data-paged=' . $paged . '>Sau</span>

						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

								<path d="M9 19L14.3306 12.7809C14.7158 12.3316 14.7158 11.6684 14.3306 11.2191L9 5" stroke="#2B3F6C" stroke-width="1.5" stroke-linecap="round"></path>

						</svg>

				', POWER)),
				]
			?>
			<?php echo paginate_comments_links($args) ?>
	</div>
<?php else : // This is displayed if there are no comments so far. ?>
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	<?php else : // Comments are closed. ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e( 'Comments are closed.' ); ?></p>

	<?php endif; ?>
<?php endif; ?>

