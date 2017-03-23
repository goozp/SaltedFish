<?php
/**
 * 只对管理员显示工具条
 */
if ( !current_user_can( 'manage_options' ) ) {
    add_filter('show_admin_bar', '__return_false');
}

/* 添加管理工具栏 */
add_action( 'admin_bar_menu', 'sf_toolbar_link', 999 );
function sftoolbar_link( $wp_admin_bar ) {
    $args = array(
        'title' => 'SaltedFish 主题设置',
        'href'  => admin_url( 'admin.php?page=sf_setting' ),
        'meta'  => array(
            'title' => 'SaltedFish 主题设置'
        )
    );
    $wp_admin_bar->add_node( $args );
}