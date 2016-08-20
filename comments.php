<?php
/**
 * The template for displaying Comments
 */

if ( post_password_required() ) {
	return;
}

?>

<section id="comments" class="comments">

	<?php if ( have_comments() ) : ?>
		
		<h2 class="comments__title">
			<?php
				printf( _nx( 'Una respuesta en &ldquo;%2$s&rdquo;', '%1$s respuestas en &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'anva-start' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php anva_comment_pagination(); ?>

		<ol class="comments__list">
			<?php
				wp_list_comments( 'type=comment&callback=anva_comment_list' );
			?>
		</ol><!-- .comment-list (end) -->

		<?php anva_comment_pagination(); ?>

	<?php endif; ?>

	<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="comments__empty">
			<?php anva_get_local( 'no_comment' ); ?>
		</p>
	<?php endif; ?>

	<?php
		$required_text = __( 'Los campos marcados con <span class="required">*</span> son requeridos.', 'anva-start' );
		$aria_req = 'required';
		$args = array(
			'id_form'           => 'commentform',
			'id_submit'         => 'submit',
			'class_submit'      => 'button button--3d button--large',
			'label_submit'      => __( 'Post Comment', 'anva-start' ),
			'title_reply'       => __( 'Leave a Reply', 'anva-start' ),
			'title_reply_to'    => __( 'Leave a Reply to %s', 'anva-start' ),
			'cancel_reply_link' => __( 'Cancel Reply', 'anva-start' ),

			'comment_field' =>  '
				<p class="comment-form__group comment-form__group--comment">
				<label for="comment" class="comment-form__label hidden">' . _x( 'Comment', 'noun', 'anva-start' ) . '</label>
				<textarea id="comment" name="comment" class="comment-form__field comment-form__field--textarea" cols="45" rows="8" aria-required="true">' . '</textarea>
				</p>',

			'must_log_in' => '<p class="comment-form__must-log-in">' .
				sprintf(
					__( 'You must be <a href="%s">logged in</a> to post a comment.', 'anva-start' ),
					wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
				) . '</p>',

			'logged_in_as' => '<p class="comment-form__logged-in-as">' .
				sprintf(
				__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'anva-start' ),
					admin_url( 'profile.php' ),
					$user_identity,
					wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
				) . '</p>',

			'comment_notes_before' => '<p class="comment-form__notes">' .
				__( 'Your email address will not be published.', 'anva-start' ) . ( $req ? $required_text : '' ) .
				'</p>',

			'comment_notes_after' => '<p class="comment-form__allowed-tags">' .
				sprintf(
					__( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s', 'anva-start' ),
					' <code>' . allowed_tags() . '</code>'
				) . '</p>',

			'fields' => apply_filters( 'comment_form_default_fields', array(

				'author' =>
					'<p class="comment-form__group comment-form__group--author">' .
					'<input id="author" name="author" type="text" class="comment-form__field" value="' . esc_attr( $commenter['comment_author'] ) .
					'" size="30"' . $aria_req . ' />' .
					'<label for="author" class="comment-form__label">' . __( 'Name', 'anva-start' ) . '</label> ' .
					( $req ? '<span class="comment-form__required">*</span>' : '' ) .
					'</p>',

				'email' =>
					'<p class="comment-form__group comment-form__group--email">
					<input id="email" name="email" type="text" class="comment-form__field" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' />
					<label for="email" class="comment-form__label">' . __( 'Email', 'anva-start' ) . '</label> ' . ( $req ? '<span class="comment-form__required">*</span>' : '' ) .
					'</p>',

				'url' =>
					'<p class="comment-form__group comment-form__group--url">
					<input id="url" name="url" type="text" class="comment-form__field" value="' . esc_attr( $commenter['comment_author_url'] ) .
					'" size="30" />
					<label for="url" class="comment-form__label">' . __( 'Website', 'anva-start' ) . '</label>' .
					'</p>'
				)
			),
		);

		comment_form( $args );
	?>

</section><!-- #comments (end) -->
