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
<section class="uk-container uk-flex uk-flex-middle">
	<div class="single-head uk-flex-1">
		<div class="uk-padding uk-padding-remove-left">
			<h1 class="uk-h2 uk-margin-small-bottom">#<?php single_tag_title(); ?></h1>
			<p class="uk-display-block uk-text-muted">标签为 #<?php single_tag_title(); ?> 内容如下：</p>
		</div>
	</div>
</section>
<section class="uk-container">
	<div class="uk-grid-small" uk-grid>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="uk-width-1-1@s uk-width-1-4@m uk-width-1-4@l uk-width-1-4@xl">
			<?php get_template_part( 'template-parts/loop', 'card' ); ?>
		</div>
		<?php endwhile; else: ?>
		<div class="uk-width-1-1">
			<div class="uk-alert" data-uk-alert>
				<p>暂无您搜索的内容...</p>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div class="fenye uk-margin-large-top">
		<?php fenye(); ?>
	</div>
</section>
<?php get_footer(); ?>
