<?php
/**
 *  小宇宙安装文件
 *  作用：帮助主题开发者快速集成小宇宙插件
 *  作者：魏星
 *  version：0.0.2
 *  changelog：针对WordPress5.3的函数参数调整了 XYZ_Skin
 */

// 禁用WordPress安装回调
if( !class_exists('XYZ_Skin') ){
    include_once( ABSPATH . 'wp-admin/includes/class-wp-upgrader.php' );
    class XYZ_Skin extends WP_Upgrader_Skin {
        public function feedback( $stream, ...$args){} // 禁用插件安装后的回调
        public function header(){}
        public function footer(){}
    }
}

// 定义小宇宙安装函数
if( !function_exists('install_star') ){

    function install_star(){
        require (ABSPATH . WPINC . '/pluggable.php');
        if( !current_user_can('manage_options') ) die('鸡你太美？');
        $api_url = 'https://www.wpxyz.com.cn/wp-admin/admin-ajax.php';
        $args = array(
            'action'=>'get_plugin_info',
            'id'=>'12',
            'site'=>get_bloginfo('url')
        );
        $response = wp_remote_post( $api_url,array('body'=>$args));
        if ( is_array( $response ) ) {
            $body = json_decode( $response['body'] );
            $url = $body -> src;

            if(!empty($url)){

                include_once( ABSPATH .'wp-admin/includes/plugin-install.php' );
                include_once( ABSPATH .'wp-admin/includes/plugin.php' );
                include_once( ABSPATH .'wp-admin/includes/file.php' );
                include_once( ABSPATH .'wp-admin/includes/misc.php' );

                remove_action( 'upgrader_process_complete', 'wp_update_plugins' );
                remove_action( 'upgrader_process_complete', 'wp_update_themes'  );

                $upgrader = new Plugin_Upgrader( new XYZ_Skin() );

                if( $upgrader->install( $url, array( 'clear_update_cache' => false ) ) ){

                    $plugin_file = $upgrader->plugin_info();

                    $msg = array(
                        'status' => 200,
                        'url'    => admin_url( 'plugins.php?action=activate&plugin=' . urlencode( $plugin_file ) . '&_wpnonce=' . wp_create_nonce( 'activate-plugin_' . $plugin_file ) )
                    );

                }else{
                    $msg = array(
                        'status' => 500,
                        'msg'    => '1'
                    );
                }

            }else{

                $msg = array(
                    'status' => 500,
                    'msg'    => '2'
                );

            }

        }else{
            $msg = array(
                'status' => 500,
                'msg'    => '连接不到您的服务器，请稍后重试'
            );
        }
        echo json_encode( $msg );
        die();
    }
    function install_xyz(){
        install_star('xyz');
    }
    add_action( 'wp_ajax_install_xyz', 'install_xyz' );

}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

$xyz_status = true;

# 判断是否安装了小宇宙插件
# ------------------------------------------------------------------------------
$filename = WP_PLUGIN_DIR.'/wpxyz';
if (file_exists($filename) && !is_plugin_active('wpxyz/wpxyz.php')) {

    $url = admin_url( 'plugins.php?action=activate&plugin=' . urlencode( 'wpxyz/wpxyz.php' ) . '&_wpnonce=' . wp_create_nonce( 'activate-plugin_wpxyz/wpxyz.php'  ) );
    $html = '<div class="notice notice-warning"><p><b>警告：</b> 检测到您已安装了 <code>小宇宙插件</code><a href="'.$url.'">现在启用？</a></p></div>';
    echo $html;
    $install_js = <<<EOT
<script>
jQuery(document).on('click', '.install_xyz', function(event) {event.preventDefault();
	var $ = jQuery;
	var that = $(this);
	if( !that.hasClass('ing') ){
		that.text('正在安装...').addClass('ing');
		$.ajax({
			url: ajaxurl,
			type: 'POST',
			dataType: 'json',
			data: {action: 'install_xyz'},
		})
			.done(function( data ) {
				if( data.status == 200 ){
					that.text('安装成功');
					if( confirm('安装成功，现在就启动他？') == true ){
						window.location.href = data.url;
					}
				}else{
					alert( data.msg );
				}
			})
			.fail(function() {
				alert('网络错误，请稍后再试！')
			});
	}
});
</script>
EOT;
    echo  $install_js;
    $xyz_status = false;

}elseif(!file_exists($filename)){
    add_action( 'admin_notices', 'xyz_init_check' );
    function xyz_init_check(){
        $script_url = get_template_directory_uri() . '/static/js/xyz-install.js';
        $html = '<div class="notice notice-error"><p><b>错误：</b> 当前主题 缺少依赖插件 <code>小宇宙插件</code> 请先安装并启用 <code>小宇宙插件</code> 插件。<a href="javascript:;" class="install_xyz">现在安装？</a></p></div>';
        echo $html;

        $install_js = <<<EOT
<script>
jQuery(document).on('click', '.install_xyz', function(event) {event.preventDefault();
	var $ = jQuery;
	var that = $(this);
	if( !that.hasClass('ing') ){
		that.text('正在安装...').addClass('ing');
		$.ajax({
			url: ajaxurl,
			type: 'POST',
			dataType: 'json',
			data: {action: 'install_xyz'},
		})
			.done(function( data ) {
				if( data.status == 200 ){
					that.text('安装成功');
					if( confirm('安装成功，现在就启动他？') == true ){
						window.location.href = data.url;
					}
				}else{
					alert( data.msg );
				}
			})
			.fail(function() {
				alert('网络错误，请稍后再试！')
			});
	}
});
</script>
EOT;
        echo  $install_js;

    }
    if (!function_exists('is_login')){
        function is_login() {
            return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
        }
    }
    if( !is_admin() && !is_login()){
        wp_die('当前主题 缺少依赖插件 <code>小宇宙插件</code> 请先安装并启用 <a href="https://www.wpxyz.com.cn/">小宇宙插件</a>。');
    }

    $xyz_status = false;

}

