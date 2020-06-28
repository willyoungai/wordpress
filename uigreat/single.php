<?php 
get_header(); 

?>
<section class="crumbs b-b uk-padding-small uk-background-default">
	<div class="uk-container uk-flex uk-flex-middle">
		<div class="uk-flex uk-margin-small-right">
			<div class="dotted1"></div>
			<div class="dotted2"></div>
		</div>
		<?php if(function_exists('cmp_breadcrumbs')) cmp_breadcrumbs();?>
	</div>
</section>
<section>
	<?php while ( have_posts() ) : the_post(); ?>
	<div class="uk-overflow-hidden">
		<div class="uk-padding-large uk-padding-remove-left uk-padding-remove-right">
			<div class="uk-container">
				<h1 class="uk-h2 uk-margin-small-bottom"><?php the_title(); ?></h1>
				<div class="entry-footer uk-margin-top uk-text-small uk-flex uk-text-truncate uk-overflow-auto">
					<span class="uk-margin-medium-right uk-flex uk-flex-middle"><i class="iconfont icon-bussiness-man"></i><?php the_author(); ?></span>
					<span class="uk-margin-medium-right uk-flex uk-flex-middle"><i class="iconfont icon-rili"></i><?php echo time_since($post->post_date);?></span>
					<span class="uk-margin-medium-right uk-flex uk-flex-middle"><i class="iconfont iconfont icon-yanjing"></i><?php post_views('', ''); ?></span>
					<span class="uk-margin-medium-right uk-flex uk-flex-middle"><?php edit_post_link('[编辑]'); ?></span>
				</div>
			</div>
		</div>
	</div>
	<div class="uk-container">
		<div class="uk-margin-large-bottom" uk-grid>
			<?php if(_ug('hide_side') == false ){ ?>
			<div class="single-main uk-width-1-1@s uk-width-2-3@m uk-width-2-3@l uk-width-2-3@xl">
			<?php } else { ?>
			<div class="single-main uk-width-1-1">
			<?php } ?>
				<div class="shadow uk-background-default uk-margin-bottom">
					<div class="single-content">
						<?php the_content(); ?>
					</div>
					<?php get_template_part( 'template-parts/single', 'foot' ); ?>
				</div>
				<ul class="turn-page uk-padding-remove uk-overflow-hidden uk-margin-top uk-margin-bottom" uk-grid>
					<?php
					$current_category = get_the_category();//获取当前文章所属分类ID
					$prev_post = get_previous_post($current_category,'');//与当前文章同分类的上一篇文章
					$next_post = get_next_post($current_category,'');//与当前文章同分类的下一篇文章
					?>
	
					<li class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l uk-width-1-2@xl">
						<?php if (!empty( $prev_post )): ?>
						<div class="uk-inline">
							<?php ztjun_pageturn_thumb($prev_post->ID);?>
							<div class="uk-overlay-primary uk-padding-small uk-position-cover">
								<i class="iconfont icon-arrow-lift uk-margin-small-right"></i>上一篇
								<a href="<?php echo get_permalink( $prev_post->ID ); ?>" class="uk-display-block"><?php echo $prev_post->post_title; ?></a>
							</div>
						</div>
						<?php endif; ?>
					</li>
					<li class="uk-width-1-1@s uk-width-1-2@m uk-width-1-2@l uk-width-1-2@xl uk-text-right">
						<?php if (!empty( $next_post )): ?>
						<div class="uk-inline">
							<?php ztjun_pageturn_thumb($next_post->ID);?>
							<div class="uk-overlay-primary uk-padding-small uk-position-cover">
								下一篇<i class="iconfont icon-arrow-right uk-margin-small-left"></i>
								<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="uk-display-block"><?php echo $next_post->post_title; ?></a>
							</div>
						</div>
						<?php endif; ?>
					</li>
				</ul>
	
				<?php get_template_part( 'template-parts/single', 'turnpage' ); ?>
				<?php if ( comments_open() || get_comments_number() ) : ?>
				<?php comments_template( '', true ); ?>
				<?php endif; ?>
				<?php endwhile; ?>
	
			</div>
			<?php if(_ug('hide_side') == false ): ?>
			<div class="siderbar uk-width-1-1@s uk-width-1-3@m uk-width-1-3@l uk-width-1-3@xl">
				<?php get_sidebar(); ?>
			</div>
			<?php endif; ?>
			
		</div>
	</div>
</section>

<?php get_footer(); ?>