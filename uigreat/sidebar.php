<section class="side-art shadow b-r-4 uk-background-default uk-margin-bottom">
	<div class="b-b uk-padding-small uk-clearfix  uk-flex uk-flex-middle">
		<div class="uk-flex uk-margin-small-right">
			<div class="dotted1"></div>
			<div class="dotted2"></div>
		</div>
		<span class="side-title uk-h5 uk-float-left uk-margin-remove uk-position-relative">热门文章</span>
		<span class="home-time uk-float-right uk-display-inline-block uk-text-muted uk-text-small uk-flex-1 uk-text-right"></span>
	</div>
	<ul class="uk-list uk-padding-remove uk-overflow-auto">
		<?php
		$cat = get_the_category();
		foreach($cat as $key=>$category){
			$catid = $category->term_id;
		}
		$args = array('orderby' => 'rand','showposts' => '5','cat' => $catid );
		$query_posts = new WP_Query();
		$query_posts->query($args);
		while ($query_posts->have_posts()) : $query_posts->the_post();
		?>

		<li class="uk-padding-small uk-margin-remove-top uk-padding-remove-top">
			<div class="b-b uk-padding-small uk-padding-remove-top uk-padding-remove-left uk-padding-remove-right">
				<div uk-grid class="uk-grid-small">
					<div class="uk-width-1-3">
						<a href="<?php the_permalink(); ?>" class="side-art-cover b-r-4 uk-display-block uk-overflow-hidden">
							<img src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>" />
						</a>
					</div>
					<div class="uk-width-2-3">
						<div class="uk-card">
							<p class="uk-margin-small-bottom">
								<a href="<?php the_permalink(); ?>" target="_blank" class="uk-display-block uk-text-truncate"><?php the_title();?></a>
							</p>
							<div class="uk-text-meta uk-margin-small-top uk-flex">
								<span class="uk-margin-right"><i class="iconfont icon-rili"></i><?php echo time_since($post->post_date);?></span>
								<span class="uk-margin-right uk-flex uk-flex-middle"><i class="iconfont iconfont icon-yanjing"></i><?php post_views('', ''); ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</li>
		<?php endwhile;?>
		<?php wp_reset_query(); ?>

	</ul>
</section>
<section class="b-r-4 shadow uk-background-default uk-margin-medium-bottom">
	<div class="b-b uk-padding-small uk-flex uk-flex-middle">
		<div class="uk-flex uk-margin-small-right">
			<div class="dotted1"></div>
			<div class="dotted2"></div>
		</div>
		<span class="side-title uk-position-relative">最新评论</span>
	</div>
	<div class="new-comment uk-padding-small uk-overflow-auto" >
		<?php
		$new_comment_num = $new_comment_show = '5';
		$comments = get_comments('status=approve&order=DESC&number='.$new_comment_num);
		foreach($comments as $comment) :
		$output = '<li class="b-b"><div class="avatar uk-display-inline-block">'.get_avatar($comment, 24).'</div>' .get_comment_author().'：<p class="content b-r-4 uk-background-muted"><a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . $comment->comment_content . '</a></p></li>';
		echo $output;
		endforeach;
		?>
	</div>
</section>
<section class="side-tag b-r-4 uk-background-default uk-margin-medium-bottom">
	<div class="b-b uk-padding-small uk-flex uk-flex-middle">
		<div class="uk-flex uk-margin-small-right">
			<div class="dotted1"></div>
			<div class="dotted2"></div>
		</div>
		<span class="side-title uk-position-relative">热门标签</span>
	</div>
	<ul class="uk-list side-tag uk-padding-small uk-margin-remove">
		<?php
		$tags_list = get_tags( array('number' => $side_tag['num'], 'orderby' => '', 'order' => 'DESC', 'hide_empty' => false) );
		shuffle($tags_list); 
		$count=0; 
		if ($tags_list) {
			foreach($tags_list as $tag) {
				$count++;
				echo '<a title="' . $tag->count . '个相关文章" href="'.get_tag_link($tag->term_id).'" target="_blank" class="b-r-4 uk-text-small" >'.$tag->name.'</a>';
				if( $count >20 ) break;
			}
		}
		?>

	</ul>
</section>
<?php 
$side_gg = _ug('side_gg');
if (is_array($side_gg) ) :
$side_gg_show = $side_gg['show'];
if ($side_gg_show == true ):
?>
<section class="uk-background-default uk-margin-medium-bottom">
	<div class="b-b uk-padding-small uk-flex uk-flex-middle">
		<div class="uk-flex uk-margin-small-right">
			<div class="dotted1"></div>
			<div class="dotted2"></div>
		</div>
		<span class="side-title uk-position-relative"><?php echo $side_gg['title']; ?></span>
	</div>
	<div class="uk-padding-small">	
	<?php $side_gg_item = $side_gg['item'];
	if ($side_gg_item) { 
		foreach ( $side_gg_item as $key => $value) { 
	?>

	<a href="<?php echo $side_gg_item[$key]['url'] ?>" target="_blank" class="uk-display-block uk-margin-bottom uk-text-center"><img src="<?php echo $side_gg_item[$key]['img'] ?>" /></a>
	<?php } }?>
		
	</div>
</section>
<?php endif; ?>
<?php endif; ?>