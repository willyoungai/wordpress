	<?php 
	$foot_menu01 = _ug('foot_menu01');
	$foot_menu02 = _ug('foot_menu02');
	$foot_menu03 = _ug('foot_menu03');
	$foot_ewm = _ug('foot_ewm');
	?>
	<footer class="uk-background-default">
		<div class="uk-container uk-padding">
			<div class="foot" uk-grid>
				<div class="uk-width-2-3 uk-visible@s">
					<div  uk-grid>
						<div class="uk-width-1-3">
							<?php if (is_array($foot_menu01) ) :?>

							<div class="foot-title b-b">
								<div class="uk-flex uk-margin-small-right uk-margin-small-bottom">
									<div class="dotted1"></div>
									<div class="dotted2"></div>
								</div>
								<span><?php echo $foot_menu01['title'] ?></span>
							</div>
							<div class="foot-item uk-margin-small-top">
								<?php $foot_menu01_item = $foot_menu01['item'];
									if ($foot_menu01_item) { 
										foreach ( $foot_menu01_item as $key => $value) { 
								?>

								<a href="<?php echo $foot_menu01_item[$key]['url']; ?>" target="_blank" class="uk-display-block uk-text-muted"><?php echo $foot_menu01_item[$key]['title']; ?></a>
								<?php } }?>

							</div>
							<?php endif; ?>

						</div>
						<div class="uk-width-1-3">
							<?php if (is_array($foot_menu02) ) :?>

							<div class="foot-title b-b">
								<div class="uk-flex uk-margin-small-right uk-margin-small-bottom">
									<div class="dotted1"></div>
									<div class="dotted2"></div>
								</div>
								<span><?php echo $foot_menu02['title'] ?></span>
							</div>
							<div class="foot-item uk-margin-small-top">
								<?php $foot_menu02_item = $foot_menu02['item'];
									if ($foot_menu02_item) { 
										foreach ( $foot_menu02_item as $key => $value) { 
								?>

								<a href="<?php echo $foot_menu02_item[$key]['url']; ?>" target="_blank" class="uk-display-block uk-text-muted"><?php echo $foot_menu02_item[$key]['title']; ?></a>
								<?php } }?>

							</div>
							<?php endif; ?>

						</div>
						<div class="uk-width-1-3">
							<?php if (is_array($foot_menu03) ) :?>

							<div class="foot-title b-b">
								<div class="uk-flex uk-margin-small-right uk-margin-small-bottom">
									<div class="dotted1"></div>
									<div class="dotted2"></div>
								</div>
								<span><?php echo $foot_menu03['title'] ?></span>
							</div>
							<div class="foot-item uk-margin-small-top">
								<?php $foot_menu03_item = $foot_menu03['item'];
									if ($foot_menu03_item) { 
										foreach ( $foot_menu03_item as $key => $value) { 
								?>

								<a href="<?php echo $foot_menu03_item[$key]['url']; ?>" target="_blank" class="uk-display-block uk-text-muted"><?php echo $foot_menu03_item[$key]['title']; ?></a>
								<?php } }?>

							</div>
							<?php endif; ?>

						</div>
					</div>
				</div>
				<?php if (empty($foot_ewm['img'])) { ?>
				<?php } else { ?>

				<div class="uk-width-1-3 uk-text-right uk-visible@s" uk-lightbox>
					<?php if (is_array($foot_ewm) ) :?>

					<a href="<?php echo $foot_ewm['img']; ?>" class="foot-ewm uk-display-inline-block "><img src="<?php echo $foot_ewm['img']; ?>" /></a>
					<p class="uk-text-small uk-text-muted uk-margin-small-top"><?php echo $foot_ewm['text']; ?></p>
					<?php endif; ?>

				</div>
				<?php } ?>

			</div>
			<div class="foot-cop b-t uk-flex uk-flex-middle uk-margin-top  uk-padding-small uk-padding-remove-left uk-padding-remove-right">
				<div class="uk-flex-1 uk-text-small uk-text-muted">
					<a href="http://www.beian.miit.gov.cn/" rel="nofollow" target="_blank" class="uk-margin-small-right"><?php echo _ug('foot_beian'); ?></a>
					<span><?php echo _ug('foot_text');?></span>
				</div>

				<?php if (_ug('theme_copyright_switch') == true) { ?>
				<div class="uk-float-right uk-margin-remove-top uk-text-small uk-text-muted uk-visible@s">Theme by <a href="https://www.ztjun.com/" target="_blank">主题君</a></div>
				<?php } else { } ?>

			</div>
		</div>
	</footer>
	</body>
</html>
