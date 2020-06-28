<?php 
$hide_home_new = _ug('hide_home_new');
$home_new = _ug('home_new');
if ($hide_home_new == true){
	if (is_array($home_new)) :
?>

<section class="uk-container uk-margin-medium-bottom">
	<div class="title uk-flex uk-flex-middle">
		<span class="uk-h4 uk-text-bolder"><?php echo $home_new['new_title']; ?></span>
	</div>
	<div class="ajax-main uk-grid-small uk-margin-top" uk-grid="masonry: true">
		<?php while(have_posts()) : the_post(); ?>

		<div class="ajax-item uk-width-1-1@s uk-width-1-4@m uk-width-1-4@l uk-width-1-4@xl">
			<?php get_template_part( 'template-parts/loop', 'card' ); ?>
		</div>
		<?php endwhile; ?>

	</div>
	<?php if ( _ug('home_load') == 1) { ?>
	
	<div class="fenye uk-text-center uk-margin-medium-top uk-margin-medium-bottom">
		<?php fenye(); ?>
	</div>
	<?php }else { ?>

	<div id="pagination" class="ajax-btn uk-text-center uk-margin-medium-top uk-margin-medium-bottom">
		<?php next_posts_link(__('点击查看更多')); ?>
	</div>
	<?php } ?>
</section>
<?php endif; ?>
<?php }else {} ?>

