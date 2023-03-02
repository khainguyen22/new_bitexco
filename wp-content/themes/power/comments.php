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
    'comment_field' => '<p class="comment-form-comment"><br /><textarea id="comment" name="comment" aria-required="true" placeholder="' . $comment_body .'"></textarea></p><div class="current-user"><svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
			<rect width="48" height="48" rx="24" transform="matrix(-1 0 0 1 48.5 0)" fill="#F6F8FC"/>
			<circle cx="24.5" cy="19" r="4" stroke="#2B3F6C" stroke-width="1.5"/>
			<path d="M31.5 28.9347C31.5 28.0743 30.9591 27.3068 30.1489 27.0175V27.0175C26.496 25.7128 22.504 25.7128 18.8511 27.0175V27.0175C18.0409 27.3068 17.5 28.0743 17.5 28.9347V30.2502C17.5 31.4376 18.5517 32.3498 19.7272 32.1818L20.6816 32.0455C23.2144 31.6837 25.7856 31.6837 28.3184 32.0455L29.2728 32.1818C30.4483 32.3498 31.5 31.4376 31.5 30.2502V28.9347Z" stroke="#2B3F6C" stroke-width="1.5"/>
			</svg>
			<span>'. $current_user .' (Bạn)</span>
			</div>',
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
	<ol class="commentlist">
	<?php wp_list_comments(); ?>
	</ol>
<?php else : // This is displayed if there are no comments so far. ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	<?php else : // Comments are closed. ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e( 'Comments are closed.' ); ?></p>

	<?php endif; ?>
<?php endif; ?>

