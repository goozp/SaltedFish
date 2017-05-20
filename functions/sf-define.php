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

//关闭后台可视化文章编辑器中的wpemoji插件
function disable_emoji9s_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
        return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
        return array();
    }
}

/*
 * 开启评论表情与自定义表情
 * */
//返回当前主题下images\smilies\下表情图片路径
function custom_smilie9s_src( $old, $img ) {
    return get_stylesheet_directory_uri().'/public/images/smilies/'.$img;
}
function init_smilie9s(){
    global $wpsmiliestrans;
    //默认表情文本与表情图片的对应关系(可自定义修改)
    $wpsmiliestrans = array(
        ':arrow:' => 'icon_arrow.gif',
        ':-D' => 'icon_biggrin.gif',
        ':???:' => 'icon_confused.gif',
        ':cool:' => 'icon_cool.gif',
        ':cry:' => 'icon_cry.gif',
        ':shock:' => 'icon_eek.gif',
        ':evil:' => 'icon_evil.gif',
        ':!:' => 'icon_exclaim.gif',
        ':idea:' => 'icon_idea.gif',
        ':lol:' => 'icon_lol.gif',
        ':mad:' => 'icon_mad.gif',
        ':mrgreen:' => 'icon_mrgreen.gif',
        ':neutral:' => 'icon_neutral.gif',
        ':?:' => 'icon_question.gif',
        ':razz:' => 'icon_razz.gif',
        ':-P' => 'icon_razz.gif',
        ':oops:' => 'icon_redface.gif',
        ':roll:' => 'icon_rolleyes.gif',
        ':sad:' => 'icon_sad.gif',
        ':smile:' => 'icon_smile.gif',
        ':eek:' => 'icon_surprised.gif',
        ':twisted:' => 'icon_twisted.gif',
        ':wink:' => 'icon_wink.gif',
    );
    add_filter( 'tiny_mce_plugins' , 'disable_emoji9s_tinymce' );
    add_filter( 'smilies_src' , 'custom_smilie9s_src' , 10 , 2 );
}
add_action( 'init', 'init_smilie9s', 5 );

