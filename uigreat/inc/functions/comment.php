<?php
/*
 * ------------------------------------------------------------------------------
 * 评论添加@
 * ------------------------------------------------------------------------------
 */
function ludou_comment_add_at( $commentdata ) {
  if( $commentdata['comment_parent'] > 0) {
    $commentdata['comment_content'] = '<a href="#comment-' . $commentdata['comment_parent'] . '">@'.get_comment_author( $commentdata['comment_parent'] ) . '</a> ' . $commentdata['comment_content'];
  }

  return $commentdata;
}
add_action( 'preprocess_comment' , 'ludou_comment_add_at', 20);


/*
 * ------------------------------------------------------------------------------
 * 评论列表
 * ------------------------------------------------------------------------------
 */
if ( ! function_exists( 'janezen_comment' ) ) :
function janezen_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :
?>
<div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
	<p><?php _e( 'Pingback:', 'janezen' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'janezen' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
	break;
	default :
	global $post;
	?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
	<article id="comment-<?php comment_ID(); ?>" class="">
		<header class="comment-head uk-flex uk-flex-middle uk-margin-remove uk-text-small">
			<?php
				if($comment->user_id!=0){
					$author_posts_url=get_author_posts_url($comment->user_id);
					$author_posts_url='<span class="uk-flex-1 uk-flex uk-flex-middle">';
				}else{
					$author_posts_url='</span>';
				}
				echo get_avatar( $comment, 24 );
			?>
			<?php
				printf( '%1$s %2$s',
					   $author_posts_url.get_comment_author( $commentdata['comment_parent'] ).'</a>',
					   ( $comment->user_id === $post->post_author ) ? '<em class="uk-text-small b-r-4">作者</em>' : ''
					  );
			?>
			<div class="comment-reply-title uk-flex-1 uk-text-small uk-text-right">
				<?php
					printf( '<span class="uk-text-small uk-margin-small-left"><time datetime="%2$s">%3$s</time></span>',
						   esc_url( get_comment_link( $comment->comment_ID ) ),
						   get_comment_time( 'c' ),
						   sprintf('%1$s at %2$s', get_comment_date(), get_comment_time() )
					);
				?>
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => '回复', 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
			
		</header>
		<?php if ( '0' == $comment->comment_approved ) : ?>
		你的评论正在审核中...
			<?php endif; ?>

		<div class="comment-content"><?php comment_text(); ?></div>
				

	</article>
	</li>
	<?php
	break;
	endswitch;
}
endif;
