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
<section class="uk-container">
	<div class="uk-flex uk-flex-middle">
		<div class="single-head uk-flex-1">
			<div class="uk-padding uk-padding-remove-left">
				<?php
				$allsearch = new WP_Query("s=$s&showposts=-1");
				$key = wp_specialchars($s, 1);
				$count = $allsearch->post_count;
				echo '<h1>「'. $key .'」</h1>';
				echo '<p class="uk-display-block uk-text-muted">共搜索到<strong> ' . $count .' </strong>条「' . $key .'」的相关内容。</p>' ;
				wp_reset_query(); 
				?>

			</div>
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
	<div class="fenye uk-margin-large-top uk-margin-large-bottom">
		<?php fenye(); ?>
		</div>
</section>
<?php get_footer(); ?>
