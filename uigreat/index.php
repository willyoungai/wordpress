<?php get_header();?>


	<?php if(is_home()){  ?>
	
	<main class="uk-position-relative uk-position-z-index">
		<?php 
		$home_gg = _ug('home_gg'); 
		get_template_part( 'template-parts/home', 'slide' );
	    get_template_part( 'template-parts/home', 'new' );
		get_template_part( 'template-parts/home', 'card' );
		?>
		
		<?php 
		if (is_array($home_gg) ) : 
		if( $home_gg['show'] != 0){
		?>
		
		<section class="uk-container uk-margin-medium-top uk-margin-medium-bottom">
			<a href="<?php echo $home_gg['url'];?>" target="_blank" >
				<img src="<?php echo $home_gg['img'];?>" />	
			</a>
		</section>
		<?php } endif; ?>
		
	</main>

	<?php }elseif (is_404()) { ?>
	
	<style>
		.page404 {}
		.page404 .btn {
			padding: 12px 30px;
			border-radius: 50px;
	        background: #3945f9;
		}
		.page404 h1 {
			font-size: 4rem;
		}

		
	</style>
	<section class="uk-flex uk-flex-middle">
		<div class="uk-container uk-padding-large">
			<div class="page404 uk-text-center uk-padding-large">
				<h1 class="uk-text-bolder">404</h1>
				<p class="uk-text-muted uk-h4 uk-margin-bottom uk-margin-remove-top">Sorry，页面丢失了，要不返回首页吧？</p>
				<p class="uk-light uk-margin-large-bottom uk-margin-large-top">
					<a href="<?php bloginfo('url'); ?>" target="_blank" class="btn b-r-4 change-color uk-display-inline-block"> 返回首页<i class="iconfont icon-resonserate-fill"></i></a>
				</p>
			</div>
		</div>
	</section>
		
	<?php }else { ?>
	
		任意
		
	<?php } ?>

<?php get_footer();?>