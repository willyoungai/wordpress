<?php
/*
Template Name: 默认
*/
?>
<?php get_header(); ?>
<section class="uk-container">
	<div class="uk-flex uk-flex-middle">
		<div class="single-head uk-flex-1">
			<div class="uk-padding uk-padding-remove-left">
				<h1 class="uk-h2 uk-margin-small-bottom"><?php the_title(); ?></h1>
			</div>
		</div>
	</div>
</section>
<section class="section-bg">
	<div class="uk-container">
		<div class="uk-background-default uk-padding">
			<?php while(have_posts()) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; ?>
		</div>	
		<div class="uk-margin-large-top">
			<?php comments_template( '', true ); ?>
		</div>	

	</div>
</section>
<?php get_footer(); ?>