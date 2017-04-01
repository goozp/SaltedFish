<?php
/**
 * @name SaltedFish theme define functions 定义函数库
 * @description 基础函数库
 * @version     1.0.0
 * @author      锅子 (https://www.gzpblog.com)
 * @package     SaltedFish
 **/

/**
 * 只对管理员显示工具条
 */
if ( !current_user_can( 'manage_options' ) ) {
    add_filter('show_admin_bar', '__return_false');
}

/* 添加管理工具栏 */
add_action( 'admin_bar_menu', 'sf_toolbar_link', 999 );
function sf_toolbar_link( $wp_admin_bar ) {
    $args = array(
        'title' => 'SaltedFish 主题设置',
        'href'  => admin_url( 'admin.php?page=SaltedFish_setting_detail' ),
        'meta'  => array(
            'title' => 'SaltedFish 主题设置'
        )
    );
    $wp_admin_bar->add_node( $args );
}

/**
 * 启用rss feed
 */
add_theme_support( 'automatic-feed-links' );

/**
 * 启用链接管理(友链)
 */
add_filter('pre_option_link_manager_enabled','__return_true');

/* 文章支持设置特色图片 */
add_theme_support( 'post-thumbnails', array('post') );