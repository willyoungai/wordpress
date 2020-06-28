<?php get_header(); ?>
<section class="crumbs uk-padding-small uk-background-default">
	<div class="uk-container uk-flex uk-flex-middle">
		<div class="uk-flex uk-margin-small-right">
			<div class="dotted1"></div>
			<div class="dotted2"></div>
		</div>
		<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
	</div>
	
</section>
<?php 
$list_gg = _ug('list_gg'); 
if (is_array($list_gg) ) : 
if( $list_gg['show'] != 0){
?>

<section class="uk-container uk-margin-top uk-margin-bottom">
	<a href="<?php echo $list_gg['url'];?>" target="_blank" >
		<img src="<?php echo $list_gg['img'];?>" />	
	</a>
</section>
<?php } endif; ?>

<section class="uk-container uk-margin-top">
	<div class="ajax-main uk-grid-small" uk-grid="masonry: true">
		<?php if(have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="ajax-item uk-width-1-1@s uk-width-1-4@m uk-width-1-4@l uk-width-1-4@xl">
			<?php get_template_part( 'template-parts/loop', 'card' ); ?>

		</div>
		<?php endwhile; else: ?>
		<p>很懒，很个性，就不发动态！</p>

		<?php endif; ?>
	</div>
	<?php if ( _ug('cat_load') == 1) { ?>
	
	<div class="fenye uk-text-center uk-margin-medium-top uk-margin-medium-bottom">
		<?php fenye(); ?>
	</div>
	<?php }else { ?>

	<div id="pagination" class="ajax-btn uk-text-center uk-margin-medium-top uk-margin-medium-bottom">
		<?php next_posts_link(__('点击查看更多')); ?>
	</div>
	<?php } ?>
	
</section>

<?php get_footer(); ?>