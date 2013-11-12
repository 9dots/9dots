<?php if (post_password_required()): ?>
	<?php _e('This post is password protected. Enter the password to view comments.', WAVE_TEXT_DOMAIN); ?>
	<?php return; endif; ?>
<div class="commentsection">
	<?php if (have_comments()) : ?>
		<h2 id="comments"><?php comments_number(__('No Comments', WAVE_TEXT_DOMAIN), __('One Comment', WAVE_TEXT_DOMAIN), __('% Comments', WAVE_TEXT_DOMAIN)); ?></h2>
		<div class="navigation">
			<div class="next-posts"><?php previous_comments_link() ?></div>
			<div class="prev-posts"><?php next_comments_link() ?></div>
		</div>
		<ol class="commentlist">
			<?php wp_list_comments(array(
				'type'     => "ol",
				'type'     => "comment",
				'callback' => "wave_comment"
			)); ?>
		</ol>
		<div class="navigation">
			<div class="next-posts"><?php previous_comments_link() ?></div>
			<div class="prev-posts"><?php next_comments_link() ?></div>
		</div>
	<?php else: ?>
		<?php if (comments_open()) : ?>
		<?php else : ?>
			<p><?php _e('Comments are closed.', WAVE_TEXT_DOMAIN); ?></p>
		<?php endif; ?>
	<?php endif; ?>
	<?php if (comments_open()) : ?>
		<div id="respond">
			<h2><?php comment_form_title('Leave a comment', __('Leave a comment to %s', WAVE_TEXT_DOMAIN)); ?></h2>

			<div class="cancel-comment-reply">
				<?php cancel_comment_reply_link(); ?>
			</div>
			<?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
				<p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', WAVE_TEXT_DOMAIN), wp_login_url(get_permalink())); ?></p>
			<?php else: ?>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
					<?php if (is_user_logged_in()) : ?>
						<p>
							<?php _e('Logged in as', WAVE_TEXT_DOMAIN); ?>
							<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
							<a href="<?php echo wp_logout_url(get_permalink()); ?>"
							   title="Log out of this account"><?php _e('Log out', WAVE_TEXT_DOMAIN); ?> &raquo;</a>
						</p>
					<?php else: ?>
						<div class="field-fields">
							<div class="field-author">
								<label for="author"><?php
									_e('Name', WAVE_TEXT_DOMAIN);
									echo($req ? ' <span class="required">*</span>' : '');
									?></label>
								<input type="text" name="author" id="author"
								       value="<?php echo esc_attr($comment_author); ?>" size="22"
								       tabindex="1"<?php echo($req ? ' aria-required="true"' : ''); ?> />
							</div>
							<div class="field-email">
								<label
									for="email"><?php _e('Email', WAVE_TEXT_DOMAIN); ?> <?php echo($req ? ' <span class="required">*</span>' : ''); ?></label>
								<input type="text" name="email" id="email"
								       value="<?php echo esc_attr($comment_author_email); ?>" size="22"
								       tabindex="2"<?php echo($req ? ' aria-required="true"' : ''); ?> />
							</div>
							<div class="field-website">
								<label for="url"><?php _e('Website', WAVE_TEXT_DOMAIN); ?></label>
								<input type="text" name="url" id="url"
								       value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3"/>
							</div>
						</div>
					<?php endif; ?>
					<div class="field-comment">
						<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
					</div>
					<div class="field-submit">
						<input name="submit" type="submit" id="submit" tabindex="5"
						       value="<?php _e('Submit Comment', WAVE_TEXT_DOMAIN); ?>"/>
						<?php comment_id_fields(); ?>
					</div>
					<?php do_action('comment_form', $post->ID); ?>
				</form>
			<?php endif; ?>
		</div>
	<?php endif; ?>
</div>
