<div class="comments shadow uk-background-default uk-position-relative uk-margin-bottom">
	<div class="comments-title b-b uk-flex uk-flex-middle">
		<div class="uk-flex uk-margin-small-right">
			<div class="dotted1"></div>
			<div class="dotted2"></div>
		</div>
		评论
	</div>
	<div class="comments-main">
		<div class="uk-form" >
			<div class="uk-form">
				<?php comment_form(array(
					'fields'  =>  array(
						'author' => '<span class="comment-form-author uk-display-inline-block uk-margin-small-bottom uk-text-small uk-form uk-margin-right"><input type="text" class="b-r-4 uk-input uk-form-width-medium" aria-required="true" value="'.$comment_author.'" name="author" id="author" placeholder="请输入您的昵称" ><label for="author"></label></span>',
						'email' => '<span class="comment-form-email uk-text-small uk-form"><input type="text" class="b-r-4 uk-input uk-form-width-medium" aria-required="true" value="'.$comment_author_email.'" name="email" id="email" placeholder="请输入您的邮箱" ><label for="email"></label></span>'
					),
					'comment_field'        => '<div class="uk-form uk-margin-bottom"><textarea id="comment" class="b-r-4 uk-textarea uk-text-small" name="comment" rows="3" placeholder="说点啥不？" aria-required="true"></textarea></div>',
					'must_log_in'          => '<div class="must-log-in uk-margin-bottom"><i class="iconfont icon-bulb"></i>' .  sprintf( __( ' 抱歉，<a href="%s" target="_blank">登录</a>后才可以评论！' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div>',
					'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( '您好，%2$s ！<a href="%3$s" title="Log out of this account">退出?</a>' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
					'comment_notes_after'  => '',
					'id_form'              => 'comment-form uk-light',
					'class_submit'         =>'comment-submit b-r-4',
					'title_reply'          => '',
					'title_reply_to'       => '@ %s',
					'cancel_reply_link'    => '取消回复',
					'label_submit'         => '发布',
				));
			?>
			</div>
			<?php if ( have_comments() ) : ?>
			
			<nav id="comment-nav-below" class="comments-nav" role="navigation">
				<?php paginate_comments_links('prev_text=上一页&next_text=下一页');?>
			</nav>
			<div class="commentlist">
				<?php wp_list_comments( array( 'callback' => 'janezen_comment', 'style' => 'ol' ) ); ?>
			</div>

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :?>
			<nav id="comment-nav-below" class="comments-nav" role="navigation">
				<?php paginate_comments_links('prev_text=上一页&next_text=下一页');?>
			</nav>
			<?php endif;if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="nocomments">评论已关闭</p>
			<?php endif;endif;?>
			
		</div>
	</div>
</div>

