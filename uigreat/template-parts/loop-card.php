<div class="card uk-background-default">
	<div class="card-thumb uk-padding-small uk-padding-remove-bottom">
		<a href="<?php the_permalink(); ?>" target="_blank" class="uk-display-block uk-overflow-hidden" style="height:<?php echo _ug('card_cover_height'); ?>px">
			<img src="<?php echo post_thumbnail_src(); ?>" alt="<?php the_title(); ?>" />
		</a>
	</div>
	<a href="<?php the_permalink(); ?>" target="_blank" class="card-title uk-display-block uk-text-truncate uk-padding-small uk-padding-remove-bottom"><?php the_title(); ?></a>
	<?php 
	if(_ug('hide_card_tag') == true ):
	?>
	
	<div class="card-tags uk-padding-small uk-padding-remove-bottom">
		<?php the_tags( '',''); ?>

	</div>
	<?php endif; ?>

	<div class="b-b uk-padding-small uk-padding-remove-bottom">
		<div class="card-author uk-flex uk-flex-middle uk-text-small uk-text-muted">

			<span class="uk-display-inline-block uk-flex uk-flex-middle"><i class="iconfont icon-bussiness-man"></i><?php the_author(); ?></span>
			<em></em>
			<span class="uk-display-inline-block uk-flex uk-flex-middle"><i class="iconfont icon-rili"></i><?php echo time_since($post->post_date);?></span>
		</div>
	</div>
	<div class="uk-padding-small uk-flex uk-flex-middle">
		<div class="card-cat uk-flex-1">
			<?php the_category(' , '); ?>
		</div>
		<span class="uk-text-small uk-text-muted"><?php post_views('', ''); ?>人看过</span>
	</div>
</div>
