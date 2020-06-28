<?php 
/* Template Name: 单页合集 */ 
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
		<div class="page-about" uk-grid>
			<div class="uk-width-1-6 uk-margin-large-bottom uk-visible@s">
				<div class="page-menu uk-background-default">
					<?php 
				wp_nav_menu( array(
					'theme_location' => 'page-nav',//用于在调用导航菜单时指定注册过的某一个导航菜单名，如果没有指定，则显示第一个
					'container'  => 'nav',  //容器标签
					'menu_id'   => '',  //ul节点id值
					'echo'  => true,//是否输出菜单，默认为真
				) );
				?>
				</div>	
			</div>
			<div class="uk-width-1-1@s uk-width-5-6@m uk-width-5-6@l uk-width-5-6@xl">
				<div class="page-main single-content uk-padding b-r-4 b-a  uk-background-default uk-margin-large-bottom">
					<?php while(have_posts()) : the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile; ?>
				</div>
				<?php if ( comments_open() || get_comments_number() ) : ?>
				<?php comments_template( '', true ); ?>
				<?php endif; ?>

			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>
