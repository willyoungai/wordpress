<!DOCTYPE html>
<html <?php language_attributes(); ?> >
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="applicable-device"content="pc,mobile">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head();?>
<link rel="stylesheet" href="https://at.alicdn.com/t/font_1557485_whdg2u8j17i.css" />
<link rel="shortcut icon" href="<?php echo _ug('favicon'); ?>"/>
		
	</head>
	<body class="uk-position-relative">
		<?php 
			$nav_sticky = _ug('nav_sticky');
			if ( $nav_sticky == true ) {
		?>
		
		<header class="head" uk-sticky style="background: <?php echo _ug('navbar_bg'); ?>">
		<?php  }else { ?>	
			
		<header class="head uk-position-relative" style="background: <?php echo _ug('navbar_bg'); ?>">
		<?php } ?>	
			
			<div class="navbar uk-container uk-flex uk-flex-middle uk-position-relative">
				<h1 class="logo uk-margin-remove uk-display-block"><a href="<?php bloginfo('url'); ?>" class="uk-display-block" style="height: <?php echo _ug('logo_height'); ?>px"><img src="<?php echo _ug('head_logo', 'http://ug.ztjun.com/wp-content/uploads/2020/03/2020030906185047.png'); ?>" alt=""/></a></h1>
				<?php 
				wp_nav_menu( array(
					'theme_location' => 'head-nav',//用于在调用导航菜单时指定注册过的某一个导航菜单名，如果没有指定，则显示第一个
					'container'  => 'nav',  //容器标签
					'container_class' => 'nav uk-flex-1 uk-visible@m uk-position-relative',//ul父节点class值
					'menu_id'   => '',  //ul节点id值
					'menu_class' => 'uk-list uk-text-center uk-margin-remove', //ul节点class值
					'echo'  => true,//是否输出菜单，默认为真
				) );
				?>
				<div class="search uk-margin-right">
					<form method="get" class="b-r-4 uk-form uk-flex uk-overflow-hidden search-form" action="<?php echo home_url();?>">
						<input type="search" placeholder="输入主题名称" autocomplete="off" value="" name="s" required="required" class="uk-input uk-flex-1">
						<button type="submit"><i class="iconfont icon-sousuo"></i></button>
					</form>
				</div>
				<a href="#mob-nav" class="mob-nav" uk-toggle><i class="iconfont icon-category uk-text-bolder uk-hidden@s"></i></a>
				<div id="mob-nav" uk-offcanvas>
			        <div class="uk-offcanvas-bar uk-background-default uk-box-shadow-small">
						<div class="mob-nav">
							<div class="b-b uk-padding-small uk-text-center">
								<a href="<?php bloginfo('url'); ?>" class="logo uk-display-inline-block"><img src="<?php echo _ug('head_logo');?>" /></a>
							</div>
							<?php 
								wp_nav_menu( array(
									'theme_location' => 'head-nav', //用于在调用导航菜单时指定注册过的某一个导航菜单名，如果没有指定，则显示第一个
									'container'  => 'mob-nav',  //容器标签
									'container_class' => 'nav uk-flex-1 uk-position-relative uk-visible@m',//ul父节点class值
									'menu_id'   => '',  //ul节点id值
									'menu_class' => 'nav uk-flex-1  uk-text-left', //ul节点class值
									'echo'  => true,//是否输出菜单，默认为真
								) );
								?>
								
							<?php if (_ug('head_login') == true) { ?>
							<div class="head-login b-t uk-padding-small uk-padding-remove-horizontal">
								<?php if ( is_user_logged_in() ) { ?>
								<a href="<?php echo wp_logout_url($url_this); ?>" target="_blank" class="head-login-btn">退出</a>
								<?php }else{?>
								<a href="/wp-admin/" target="_blank" class="head-login-btn uk-margin-right">登录</a>
								<a href="/wp-login.php?action=register" target="_blank">注册</a>
								<?php }?>
							</div>
							<?php } else { } ?>
						</div>
			        </div>
			    </div>

				<?php if (_ug('head_login') == true) { ?>
				<div class="head-login uk-visible@s">
					<?php if ( is_user_logged_in() ) { ?>
					<a href="<?php echo wp_logout_url($url_this); ?>" target="_blank" class="head-login-btn">退出</a>
					<?php }else{?>
					<a href="/wp-admin/" target="_blank" class="head-login-btn uk-margin-right">登录</a>
					<a href="/wp-login.php?action=register" target="_blank">注册</a>
					<?php }?>
					
				</div>
				<?php } else { } ?>

				
			</div>
		</header>