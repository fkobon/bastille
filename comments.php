<?php
/*
================================================================================================
The template for displaying comments. This is the template that displays the area 
of the page that contains both the current comments and the comment form.
================================================================================================
@link           @link https://codex.wordpress.org/Template_Hierarchy
@package        Bastille
@copyright      Copyright (C) 2017. Samuel Guebo
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Samuel Guebo (https://samuelguebo.co/)
================================================================================================
*/

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
			<h4 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'bastille' ); ?></h4>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'bastille' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'bastille' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>
        
        <?php
                $args = array(
                'short_ping' => true,
                'callback' => 'bastille_custom_comments',
                    );
            wp_list_comments( $args);
        ?>
		<!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
			<h4 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'bastille' ); ?></h4>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'bastille' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'bastille' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'bastille' ); ?></p>
	<?php
	endif;
    
    // these variables borrowed form the documentation @link: https://codex.wordpress.org/Function_Reference/comment_form
    $commenter = wp_get_current_commenter();
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    
    $comments_args = array(
        // redefine your own textarea (the comment body)
        'fields'=>array(
            'website' =>'',
            'author' =>
                '<p class="comment-form-author"><label for="author">' .__( 'Name', 'bastille' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' /></p>',

            'email' =>
                '<p class="comment-form-email"><label for="email">' .   __( 'Email', 'bastille' ) . '</label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' /></p>',
            'url' =>
                '<p class="comment-form-url"><label for="url">' . __( 'Website', 'bastille' ) . '</label>' .
                '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
                '" size="30" /></p>',
            ),
        'title_reply'=>'<h5 id="reply-title" class="comment-reply-title">'.__( 'Leave a comment', 'bastille' ).'</h5>',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // change the title of send button 
        'label_submit'=>__( 'Send', 'bastille' ),
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __( 'Comment', 'bastille' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
        'logged_in_as' =>    
                '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'bastille'), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
        'must_log_in' =>
        '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'bastille' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
        'comment_notes_before' =>
            '<p class="comment-notes">' . __( 'Your email address will not be published. Fields marked <span class="required">*</span> are required.' , 'bastille') . '</p>'

    );
    
	comment_form($comments_args);
	?>

</div><!-- #comments -->
