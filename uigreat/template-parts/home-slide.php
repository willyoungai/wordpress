<?php 
$slide = _ug('slide');
$gg_img = _ug('gg_img');
$gg_list = _ug('gg_list');
?>
<section class="uk-container uk-margin-top uk-margin-medium-bottom">
	<div class="uk-grid-medium" uk-grid>
		<div class="slide-main uk-width-1-1@s uk-width-3-4@m uk-width-3-4@l uk-width-3-4@xl uk-position-relative" style="height:<?php echo _ug('slide_height'); ?>px">
			<div class="slide shadow uk-height-1-1 uk-position-relative uk-visible-toggle uk-overflow-hidden" uk-slideshow >
				<ul class="uk-slideshow-items" style="height:<?php echo _ug('slide_height'); ?>px">
					<?php if (is_array($slide) ) :
					if ($slide) { 
						foreach ( $slide as $key => $value) { 
					?>
					
					<li class="uk-overflow-hidden uk-height-1-1">
						<a href="<?php echo $slide[$key]['link']; ?>" target="_blank" class="slide uk-display-block uk-background-default uk-height-1-1">
							<img src="<?php echo $slide[$key]['img']; ?>" class="uk-height-1-1 uk-width-1-" />
							<div class="uk-width-1-1 uk-padding-small uk-margin-remove uk-position-bottom-left uk-text-bolder uk-flex uk-flex-middle">
								<div class="uk-flex uk-margin-small-right">
									<div class="dotted1"></div>
									<div class="dotted2"></div>
								</div>
								<span><?php echo $slide[$key]['text']; ?></span>
							</div>
						</a>
					</li>
					<?php } }?>
					<?php endif; ?>
					
				</ul>
			</div>
		</div>
		<?php if (_ug('home_announcement_switch') == true) { ?>
		
		<div class="uk-width-1-1@s uk-width-1-4@m uk-width-1-4@l uk-width-1-4@xl">
			<?php if (is_array($gg_img) ) :?>
			
			<a href="<?php echo $gg_img['link'];?>" target="_blank" class="slide-sbox uk-display-block uk-overflow-hidden uk-visible@s" style="max-height: <?php echo $gg_img['height']; ?>px;">
				<img src="<?php echo $gg_img['img'];?>"/>
			</a>
			<?php endif; ?>
			
			<div class="news shadow uk-background-default">
				<?php if (is_array($gg_list) ) :?>
				
				<div class="title b-b uk-h5 uk-flex uk-flex-middle">
					<div class="uk-flex uk-margin-small-right">
						<div class="dotted1"></div>
						<div class="dotted2"></div>
					</div>
					<span><?php echo $gg_list['title']; ?></span>
				</div>
				<div class="news-main uk-overflow-auto">
					<ul class="uk-list uk-padding-small uk-padding-remove-top uk-padding-remove-bottom uk-margin-left">
						<?php 
							$add_list = $gg_list['add_list'];
								if ($add_list) { 
								foreach ( $add_list as $key => $value) {
						?>	

						<li class="uk-position-relative">
							<a href="<?php echo $add_list[$key]['url'] ?>" target="_blank" class="uk-display-block uk-text-truncate"><?php echo $add_list[$key]['title'] ?></a>
						</li>
						<?php } }?>

					</ul>
					<?php endif; ?>

				</div>
			</div>
		</div>
		<?php } else { ?>
		
		<style>.slide-main{width: 100%;}</style>
		<?php } ?>
		
	</div>
</section>