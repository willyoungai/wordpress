<?php 
$cat = _ug('cat');
if (is_array($cat) ) :
if ($cat) {
	foreach ( $cat as $key => $value) {
?>
<section class="uk-container uk-margin-medium-bottom">
	<div class="title uk-flex uk-flex-middle">
		<span class="uk-flex-1 uk-h4 uk-text-bolder"><?php echo get_cat_name( $cat[$key]['id'] ,'分类名称' );?></span>
		<span><a href="<?php echo get_category_link( $cat[$key]['id'] );?>" target="_blank" class="uk-text-muted uk-text-small uk-text-light">更多<i class="iconfont icon-arrow-right"></i></a></span>
	</div>
	<div class="uk-grid-small uk-margin-top" uk-grid="masonry: true">
		<?php query_posts('cat='.$cat[$key]['id'].'&showposts='.$cat[$key]['num']); //cat是要调用的分类ID,showposts是需要显示的文章数量 ?>
	<?php while (have_posts()) : the_post(); ?>

		<div class="uk-width-1-1@s uk-width-1-4@m uk-width-1-4@l uk-width-1-4@xl">
			<?php get_template_part( 'template-parts/loop', 'card' ); ?>

		</div>
		<?php endwhile; wp_reset_query(); ?>
	</div>
</section>
<?php } }?>
<?php endif; ?>
