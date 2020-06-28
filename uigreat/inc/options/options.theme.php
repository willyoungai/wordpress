<?php if (! defined('ABSPATH')) {
	die;
}
if (class_exists('CSF')) {
	$prefix = 'ug';
	CSF::createOptions($prefix, array(
		'menu_title' => '主题设置',
		'menu_slug' => 'my-framework',
		'framework_title'         => 'Uigreat主题 <small>by 主题君(ztJun.com)</small>',
	));

	/*
	 * 基本设置
	 * */
	CSF::createSection($prefix, array(
		'id' => 'too_basic',
		'title' => '基本设置',
	));
	CSF::createSection($prefix, array(
		'parent' => 'too_basic',
		'title' => '顶部设置',
		'fields' => array(
			array(
				'id' => 'nav_sticky',
				'type' => 'switcher',
				'title' => '开启/关闭导航条跟随',
				'default' => true
			),
			array(
				'id' => 'head_login',
				'type' => 'switcher',
				'title' => '开启/关闭顶部登录/注册按钮',
				'default' => true
			),
			array(
				'id' => 'head_logo',
				'type' => 'upload',
				'title' => '顶部Logo图片',
				'placeholder' => 'http://',
				'button_title' => '上传',
				'remove_title' => '删除',
				'default' => 'http://ug.ztjun.com/wp-content/uploads/2020/03/2020030906185047.png'
			),
			array(
				'id'          => 'logo_height',
				'type'        => 'number',
				'title'       => '设置网站LOGO高度',
				'unit'        => 'px',
				'default'     => 32,
			),
			array(
				'id' => 'favicon',
				'type' => 'upload',
				'title' => '网站favicon.ico图标',
				'placeholder' => 'http://',
				'button_title' => '上传',
				'remove_title' => '删除',
			),
			array(
				'id'      => 'navbar_bg',
				'type'    => 'color',
				'title'   => '导航条背景颜色',
				'default' => '#3945f9'
			),
			array(
				'id' => 'head_code',
				'type' => 'code_editor',
				'title' => '顶部Javascript',
				'desc' => '<b>注意：不需要添加《script》《/script》</b>',
				'settings' => array(
					'theme' => 'monokai',
					'mode' => 'javascript',
				),
				'default' => 'console.log("Hello world");',
			),

		)
	));
	CSF::createSection($prefix, array(
		'parent' => 'too_basic',
		'title' => '底部设置',
		'fields' => array(
			array(
				'id' => 'theme_copyright_switch',
				'type' => 'switcher',
				'title' => '主题版权开关',
				'desc' => '隐藏版权请添加作者网站友情链接',
				'default' => true
			),
			array(
				'id' => 'foot_beian',
				'type' => 'text',
				'title' => '网站备案号码',
			),
			array(
				'id' => 'foot_text',
				'type' => 'text',
				'title' => '网站备案号码',
			),
			array(
				'id' => 'foot_ewm',
				'type' => 'fieldset',
				'title' => '底部快捷导航',
				'fields' => array(
					array(
						'id' => 'img',
						'type' => 'upload',
						'title' => '底部二维码',
						'placeholder' => 'http://',
						'button_title' => '上传',
						'remove_title' => '删除',
					),
					array(
						'id' => 'text',
						'type' => 'text',
						'title' => '提示',
						'default' => '扫一扫关注主题君(ztJun.com)',
					),

				),
			),

			array(
				'id' => 'foot_menu01',
				'type' => 'fieldset',
				'title' => '底部快捷导航',
				'fields' => array(
					array(
						'id' => 'title',
						'type' => 'text',
						'title' => '菜单标题',
						'default' => '菜单标题',
					),
					array(
						'id' => 'item',
						'type' => 'repeater',
						'title' => '菜单项目',
						'fields' => array(
							array(
								'id' => 'title',
								'type' => 'text',
								'title' => '菜单项目',
							),
							array(
								'id' => 'url',
								'type' => 'text',
								'title' => '菜单链接',
							),

						),
					),
					array(
						'type' => 'notice',
						'style' => 'warning',
						'content' => '最多添加4项',
					),
				),
			),
			array(
				'id' => 'foot_menu02',
				'type' => 'fieldset',
				'title' => '底部快捷导航',
				'fields' => array(
					array(
						'id' => 'title',
						'type' => 'text',
						'title' => '菜单标题',
						'default' => '菜单标题',
					),
					array(
						'id' => 'item',
						'type' => 'repeater',
						'title' => '菜单项目',
						'fields' => array(
							array(
								'id' => 'title',
								'type' => 'text',
								'title' => '菜单项目',
							),
							array(
								'id' => 'url',
								'type' => 'text',
								'title' => '菜单链接',
							),

						),
					),
					array(
						'type' => 'notice',
						'style' => 'warning',
						'content' => '最多添加4项',
					),
				),
			),
			array(
				'id' => 'foot_menu03',
				'type' => 'fieldset',
				'title' => '底部快捷导航',
				'fields' => array(
					array(
						'id' => 'title',
						'type' => 'text',
						'title' => '菜单标题',
						'default' => '菜单标题',
					),
					array(
						'id' => 'item',
						'type' => 'repeater',
						'title' => '菜单项目',
						'fields' => array(
							array(
								'id' => 'title',
								'type' => 'text',
								'title' => '菜单项目',
							),
							array(
								'id' => 'url',
								'type' => 'text',
								'title' => '菜单链接',
							),

						),
					),
					array(
						'type' => 'notice',
						'style' => 'warning',
						'content' => '最多添加4项',
					),
				),
			),

		)
	));
	/*
	 * SEO设置
	 * */
	CSF::createSection($prefix, array(
		'parent' => 'too_basic',
		'title' => 'SEO设置',
		'fields' => array(
			array(
				'id' => 'website_title',
				'type' => 'text',
				'title' => '网站标题',
			),
			array(
				'id' => 'website_title_des',
				'type' => 'text',
				'title' => '网站标题',
			),
			array(
				'id' => 'website_description',
				'type' => 'textarea',
				'title' => '网站描述',
			),
			array(
				'id' => 'website_keywords',
				'type' => 'text',
				'title' => '网站关键词',
			),
		)
	));

	CSF::createSection($prefix, array(
		'parent' => 'too_basic',
		'title' => '其他设置',
		'fields' => array(
			array(
				'id' => 'link_show',
				'type' => 'switcher',
				'title' => '关闭/开启友情链接'
			),
			array(
				'id' => 'home_bg',
				'type' => 'upload',
				'title' => '首页背景',
				'default' => get_bloginfo('template_url').'/static/images/normal.jpg'
			),

		)
	));

	/*
	 * 首页设置
	 * */
	CSF::createSection($prefix, array(
		'id' => 'too_home',
		'title' => '首页设置',
	));
	CSF::createSection($prefix, array(
		'parent' => 'too_home',
		'title' => '首页幻灯',
		'fields' => array(
			array(
				'id'          => 'slide_height',
				'type'        => 'number',
				'title'       => '设置幻灯高度',
				'unit'        => 'px',
				'default'     => 315,
			),
			array(
				'id' => 'slide',
				'type' => 'repeater',
				'title' => '添加幻灯片',
				'fields' => array(
					array(
						'id' => 'img',
						'type' => 'upload',
						'title' => '上传幻灯片',
						'default' => 'https://www.ztjun.com/wp-content/uploads/2020/03/2020031802511239.jpg'
					),
					array(
						'id' => 'text',
						'type' => 'text',
						'title' => '文字',
					),

					array(
						'id' => 'link',
						'type' => 'text',
						'title' => '链接',
					),

				),
			),
		)
	));
	CSF::createSection($prefix, array(
		'parent' => 'too_home',
		'title' => '首页公告',
		'fields' => array(
			array(
				'id' => 'home_announcement_switch',
				'type' => 'switcher',
				'title' => '首页公告开关',
				'default' => false,
				'subtitle' => '关闭后，前台将看不见公告',
			),
			array(
				'id' => 'gg_img',
				'type' => 'fieldset',
				'title' => '图片公告',
				'dependency' => array('home_announcement_switch', '==', 'true'),
				'fields' => array(
					array(
						'id'          => 'height',
						'type'        => 'number',
						'title'       => '设置广告图高度',
						'unit'        => 'px',
						'default'     => 120,
						'subtitle' => '幻灯片右侧图片高度设置',

					),
					array(
						'id' => 'img',
						'type' => 'upload',
						'title' => '上传图片',
						'default' => get_bloginfo('template_url').'/static/images/normal.jpg'
					),
					array(
						'id' => 'link',
						'type' => 'text',
						'title' => '链接',
					),
					array(
						'type'    => 'notice',
						'style'   => 'warning',
						'content' => '图片公告高度设置为0即可隐藏',
					),
				),
			),
			array(
				'id' => 'gg_list',
				'type' => 'fieldset',
				'title' => '列表公告',
				'dependency' => array('home_announcement_switch', '==', 'true'),
				'fields' => array(
					array(
						'id' => 'title',
						'type' => 'text',
						'title' => '公告标题',
						'default' => '网站公告'
					),
					array(
						'id' => 'add_list',
						'type' => 'repeater',
						'title' => '添加公告',
						'fields' => array(
							array(
								'id' => 'title',
								'type' => 'text',
								'title' => '标题',
							),
							array(
								'id' => 'url',
								'type' => 'text',
								'title' => '链接',
							),

						),
					),
				),
			),
		)
	));
	CSF::createSection($prefix, array(
		'parent' => 'too_home',
		'title' => '最新发布',
		'fields' => array(
			array(
				'id' => 'hide_home_new',
				'type' => 'switcher',
				'title' => '开启最新发布模块',
				'default' => false,
			),
			array(
				'id' => 'home_new',
				'type' => 'fieldset',
				'dependency' => array('hide_home_new', '==', 'true'),
				'title' => '图片公告',
				'dependency' => array('hide_home_new', '==', 'true'),
				'fields' => array(
					array(
						'id' => 'new_title',
						'type' => 'text',
						'title' => '模块标题',
						'subtitle' => '自定义最新发布模块标题',
						'default' => '最新发布'
					),
				),
			),
			array(
				'id'          => 'home_load',
				'type'        => 'select',
				'title'       => '文章加载方式',
				'placeholder' => '选择文章加载方式',
				'options'     => array(
					'1'  => '上一页下一页数字加载',
					'2'  => 'AJAX无刷新加载',
				),
				'default'     => '1'
			),

		)
	));
	CSF::createSection($prefix, array(
		'parent' => 'too_home',
		'title' => '分类模块',
		'fields' => array(
			array(
				'id' => 'cat',
				'type' => 'repeater',
				'title' => '添加分类',
				'fields' => array(
					array(
						'id' => 'id',
						'type' => 'select',
						'title' => '选择分类',
						'placeholder' => '选择分类',
						'options' => 'categories',
					),
					array(
						'id' => 'num',
						'type' => 'text',
						'title' => '文章数量',
					),

				),

			),


		)
	));

	/*
	 * 分类设置
	 * */
	CSF::createSection($prefix, array(
		'id' => 'too_cat',
		'title' => '分类设置',
	));
	CSF::createSection($prefix, array(
		'parent' => 'too_cat',
		'title' => '分类设置',
		'fields' => array(
			array(
				'id' => 'hide_card_tag',
				'type' => 'switcher',
				'title' => '隐藏文章TAG标签',
				'default' => true,
			),
			array(
				'id'          => 'card_cover_height',
				'type'        => 'number',
				'title'       => '设置文章封面高度',
				'unit'        => 'px',
				'default'     => 120,
			),
			array(
				'id'          => 'cat_load',
				'type'        => 'select',
				'title'       => '文章加载方式',
				'placeholder' => '选择文章加载方式',
				'options'     => array(
					'1'  => '上一页下一页数字加载',
					'2'  => 'AJAX无刷新加载',
				),
				'default'     => '1'
			),
			array(
				'id' => 'default_thum',
				'type' => 'upload',
				'title' => '设置文章默认缩略图',
				'placeholder' => 'http://',
				'button_title' => '上传',
				'remove_title' => '删除',
				'default' => 'https://www.ztjun.com/wp-content/uploads/2020/03/2020031410224759.jpg'
			),

		)
	));

	/*
	 * 内页设置
	 * */
	CSF::createSection($prefix, array(
		'id' => 'too_single',
		'title' => '内页设置',
	));
	CSF::createSection($prefix, array(
		'parent' => 'too_single',
		'title' => '内页设置',
		'fields' => array(
			array(
				'id'          => 'single_height',
				'type'        => 'number',
				'title'       => '设置文章封面高度',
				'unit'        => 'px',
				'default'     => 220,
			),
			array(
				'id' => 'single_tag',
				'type' => 'switcher',
				'title' => '隐藏/显示文章标签 ',
				'default' => true,
			),
			array(
				'id' => 'single_zan',
				'type' => 'switcher',
				'title' => '开启/关闭文章点赞',
				'default' => true,
			),
			array(
				'id' => 'single_share',
				'type' => 'switcher',
				'title' => '开启/关闭文章分享 ',
				'default' => true,
			),
			array(
				'id' => 'single_ds',
				'type' => 'switcher',
				'title' => '开启/关闭打赏作者 ',
				'default' => true,
			),
			array(
				'id' => 'single_ds_pop',
				'type' => 'fieldset',
				'title' => '打赏弹窗',
				'dependency' => array('single_ds', '==', 'true'),
				'fields' => array(
					array(
						'id' => 'title',
						'type' => 'text',
						'title' => '弹窗标题',
						'default' => '打赏作者'
					),
					array(
						'id' => 'des',
						'type' => 'text',
						'title' => '弹窗简介',
						'default' => '您的支持，是我们最大的动力！'
					),
					array(
						'id' => 'img',
						'type' => 'upload',
						'title' => '打赏二维码',
						'placeholder' => 'http://',
						'button_title' => '上传',
						'remove_title' => '删除',
						'default' => 'https://www.ztjun.com/wp-content/uploads/2020/03/2020030216410893.jpg'
					),

				),
			),


		)
	));
	CSF::createSection($prefix, array(
		'parent' => 'too_single',
		'title' => '内页优化',
		'fields' => array(
			array(
				'id' => 'single_key',
				'type' => 'switcher',
				'title' => '自动添加已有关键词 ',
				'default' => true,
			),
			array(
				'id' => 'single_key_link',
				'type' => 'switcher',
				'title' => 'Tag标签自动内链 ',
				'default' => true,
			),
			array(
				'id' => 'single_nofollow',
				'type' => 'switcher',
				'title' => '文章外链自动添加nofollow',
				'default' => true,
				'subtitle' => '防止到处权重',
			),
			array(
				'id' => 'single_img_art',
				'type' => 'switcher',
				'title' => '图片自动添加alt',
				'default' => true,
			),
			array(
				'id' => 'single_upload_filter',
				'type' => 'switcher',
				'title' => '上传文件重命名',
				'default' => true,
			),
			array(
				'id' => 'single_delete_post_and_img',
				'type' => 'switcher',
				'title' => '删除文章时删除图片附件',
				'default' => true,
			),

		)
	));
	/*
	 * 站点广告设置
	 * */
	CSF::createSection($prefix, array(
		'title' => '侧边栏',
		'fields' => array(
			array(
				'id' => 'hide_side',
				'type' => 'switcher',
				'title' => '关闭侧边栏',
				'default' => false,
			),
			array(
				'id' => 'side_hot',
				'type' => 'switcher',
				'title' => '关闭侧边栏热门文章',
				'default' => true,
			),
			array(
				'id' => 'side_comment',
				'type' => 'switcher',
				'title' => '关闭侧边栏最新评论',
				'default' => true,
			),
			array(
				'id' => 'side_tag',
				'type' => 'switcher',
				'title' => '关闭侧边栏热门标签',
				'default' => true,
			),
		)
	));

	/*
	 * 站点广告设置
	 * */
	CSF::createSection($prefix, array(
		'title' => '站点广告',
		'fields' => array(
			array(
				'id' => 'home_gg',
				'type' => 'fieldset',
				'title' => '首页广告',
				'fields' => array(
					array(
						'id' => 'show',
						'type' => 'switcher',
						'title' => '是否显示首页广告',
					),
					array(
						'id' => 'img',
						'type' => 'upload',
						'title' => '广告图片',
					),
					array(
						'id' => 'url',
						'type' => 'text',
						'title' => '图片链接',
					),
				),
			),
			array(
				'id' => 'list_gg',
				'type' => 'fieldset',
				'title' => '列表页广告',
				'fields' => array(
					array(
						'id' => 'show',
						'type' => 'switcher',
						'title' => '是否显示列表页广告',
					),
					array(
						'id' => 'img',
						'type' => 'upload',
						'title' => '广告图片',
					),
					array(
						'id' => 'url',
						'type' => 'text',
						'title' => '图片链接',
					),
				),
			),
			array(
				'id' => 'side_gg',
				'type' => 'fieldset',
				'title' => '侧边栏广告',
				'fields' => array(
					array(
						'id' => 'show',
						'type' => 'switcher',
						'title' => '是否显示侧边栏广告',
					),
					array(
						'id' => 'title',
						'type' => 'text',
						'title' => '侧边栏标题',
					),
					array(
						'id' => 'item',
						'type' => 'repeater',
						'title' => '添加广告',
						'fields' => array(
							array(
								'id' => 'img',
								'type' => 'upload',
								'title' => '广告图片',
							),
							array(
								'id' => 'url',
								'type' => 'text',
								'title' => '图片链接',
							),

						),
					),
				),
			),

		)
	));
}