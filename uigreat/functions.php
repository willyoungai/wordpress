<?php

include 'inc/xyz-install.php';

if($xyz_status){
    if ( ! function_exists( '_ug' ) ) {
        function _ug( $option = '', $default = null ) {
            $options = get_option( 'ug' ); // Attention: Set your unique id of the framework
            return ( isset( $options[$option] ) ) ? $options[$option] : $default;
        }
    }
/*
* ------------------------------------------------------------------------------
* 加载后台框架
* ------------------------------------------------------------------------------
*/

    require_once(dirname(__FILE__) . '/inc/options/options.theme.php');
    require_once(dirname(__FILE__) . '/inc/functions/enqueue.php');
    require_once(dirname(__FILE__) . '/inc/functions/article.php');
    require_once(dirname(__FILE__) . '/inc/functions/category.php');
    require_once(dirname(__FILE__) . '/inc/functions/user.php');
    require_once(dirname(__FILE__) . '/inc/functions/other.php');
    require_once(dirname(__FILE__) . '/inc/functions/comment.php');
    xyz_theme_upgrader('61');
}

