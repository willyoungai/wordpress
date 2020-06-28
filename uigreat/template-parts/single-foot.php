<div class="uk-margin-top uk-padding">
	<div class="single-foot">
		<div class="uk-width-1-1 uk-text-center uk-light">
			<?php if( _ug('single_zan') == true ): ?>
			<a href="javascript:;" data-action="topTop" data-id="<?php the_ID(); ?>" class="b-r-4 btn uk-display-inline-block uk-margin-small-left dotGood <?php echo isset($_COOKIE['dotGood_' . $post->ID]) ? '' : ''; ?>">
				<i class="iconfont icon-good-fill"></i>点赞(<span class="count"><?php echo ($dot_good=get_post_meta($post->ID, 'dotGood', true)) ? $dot_good : '0'; ?></span>)
			</a>
			<?php endif; ?>
			<?php if( _ug('single_ds') == true ): ?>
			<a uk-toggle="target: #reward" class="b-r-4 btn uk-display-inline-block uk-margin-small-left"><i class="iconfont icon-agriculture"></i>打赏</a>
			<?php endif; ?>
			<?php 
				$single_ds_pop = _ug('single_ds_pop');
				if (is_array($single_ds_pop) ) :
			?>
			<div id="reward" uk-modal>
				<div class="uk-modal-dialog uk-modal-body">
					<h2 class="uk-modal-title"><?php echo $single_ds_pop['title']?></h2>
					<p><?php echo $single_ds_pop['des']?></p>	
					<img src="<?php echo $single_ds_pop['img']?>" />
				</div>
			</div>
			<?php endif; ?>
			
			<?php if( _ug('single_share') == true ): ?>
			<div class="share uk-display-inline-block uk-margin-small-left uk-light">
				<a class="b-r-4 btn uk-flex uk-flex-middle"><i class="iconfont icon-icon-test8"></i></a>
				<div class="uk-padding-small" uk-dropdown>
					<ul class="uk-nav uk-dropdown-nav uk-text-left">
						<li class="uk-flex uk-flex-middle">
							<a href="http://connect.qq.com/widget/shareqq/index.html?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&desc=&summary=<?php echo wp_trim_words( get_the_content(), 80 ); ?>&site=<?php bloginfo('name'); ?>&pics=<?php echo post_thumbnail_src(); ?>" target="_blank" class="uk-display-block uk-width-1-1">
								<i class="iconfont icon-qq uk-margin-small-right"></i>分享至QQ好友
							</a>
						</li>
						<li class="uk-flex uk-flex-middle">
							<a href="http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&desc=&summary=<?php echo wp_trim_words( get_the_content(), 80 ); ?>&site=<?php bloginfo('name'); ?>&pics=<?php echo post_thumbnail_src(); ?>" target="_blank" class="uk-display-block uk-width-1-1">
								<i class="iconfont icon-kongjian uk-margin-small-right"></i>分享至QQ空间
							</a>
						</li>
					</ul>
				</div>
			</div>
			<?php endif; ?>
		</div>
		
		<?php if( _ug('single_tag') == true ): ?>
		<div class="b-t uk-margin-medium-top uk-padding-small uk-padding-remove-horizontal uk-padding-remove-bottom">
			<div class="single-tags uk-text-left uk-flex uk-flex-middle"><i class="iconfont icon-discount"></i><?php the_tags('', ',') ?></div>
		</div>
		<?php endif; ?>
	</div>
</div>
