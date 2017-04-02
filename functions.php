<?php
/**
 * @name SaltedFish-functions
 * @description SaltedFish theme functions file
 * @version     1.0.0
 * @author      锅子(https://www.gzpblog.com)
 * @package     SaltedFish
 **/

/**
 * Define constants
 */
define( 'SF_NAME', 'SaltedFish' );
define( 'SF_VERSION', '1.0.0' );
define( 'SF_PATH', dirname( __FILE__ ) );
define( "SF_THEME_URL", get_bloginfo( 'template_directory' ) );

/**
 * 导入主题核心文件
 */
get_template_part( 'functions/sf-basic' );
get_template_part( 'functions/sf-define' );
get_template_part( 'functions/sf-functions' );
get_template_part( 'functions/sf-widget' );

/*
 * 加载js,css文件
 * */
function sf_scripts_with_jquery()
{
    //main css
    wp_enqueue_style( 'style', get_bloginfo( 'stylesheet_url' ), $deps = array(), SF_VERSION  );
    // 导航菜单 css
    wp_register_style( 'navi', get_template_directory_uri() . '/public/css/bootstrap-off-canvas-nav.css' );
    wp_enqueue_style( 'navi' );
    //顶部loading css
    wp_register_style( 'pace', get_template_directory_uri() . '/public/css/pace-theme-flash.css' );
    wp_enqueue_style( 'pace' );


    //JQuery js
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', sf_script( 'jquery.min.js' ), false, '1.11.3' );
    wp_enqueue_script( 'jquery', false, false, '1.11.3' );
    // bootstrap js
    wp_register_script( 'custom-script', get_template_directory_uri() . '/public/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '3.3.7' );
    wp_enqueue_script( 'custom-script' );
    // 导航菜单 js
    wp_enqueue_script( 'nav_js', sf_script( 'bootstrap-off-canvas-nav.js' ), null, SF_VERSION, false );
    //顶部loading js
    wp_enqueue_script( 'pace_js', sf_script( 'pace.min.js' ), null, SF_VERSION, false );
    //主题js
    wp_enqueue_script( 'main_js', sf_script( 'main.js' ), null, SF_VERSION, false );

}
add_action( 'wp_enqueue_scripts', 'sf_scripts_with_jquery' );

// 移除WordPress Emoji表情
remove_action( 'admin_print_scripts' ,	'print_emoji_detection_script');
remove_action( 'admin_print_styles'  ,	'print_emoji_styles');
remove_action( 'wp_head'             ,	'print_emoji_detection_script',	7);
remove_action( 'wp_print_styles'     ,	'print_emoji_styles');
remove_filter( 'the_content_feed'    ,	'wp_staticize_emoji');
remove_filter( 'comment_text_rss'    ,	'wp_staticize_emoji');
remove_filter( 'wp_mail'             ,	'wp_staticize_emoji_for_email');
// 移除头部wp_head没必要的加载
remove_action( 'wp_head', 'rsd_link' ); //针对Blog的远程离线编辑器接口
remove_action( 'wp_head', 'wlwmanifest_link' ); //Windows Live Writer接口
remove_action( 'wp_head', 'index_rel_link' ); //移除当前页面的索引
remove_action( 'wp_head', 'parent_post_rel_link', 10 ); //移除后面文章的url
remove_action( 'wp_head', 'start_post_rel_link', 10 ); //移除最开始文章的url
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );//自动生成的短链接
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10 ); ///移除相邻文章的url
remove_action( 'wp_head', 'wp_generator' ); // 移除版本号

/* 过滤google字体 */
add_filter( 'gettext_with_context', 'jp_google_fonts', 888, 4 );
function jp_google_fonts( $translations, $text, $context, $domain ) {
    if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
        $translations = 'off';
    }
    return $translations;
}
/**
 * 移除wordpress顶部工具栏css样式
 */
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
    remove_action('wp_head','_admin_bar_bump_cb');
}

/* 修改Gravatar服务器为cn.gravatar.com */
function mytheme_get_avatar( $avatar ) {
    $avatar = preg_replace( "/http:\/\/(www|\d).gravatar.com/","http://cn.gravatar.com",$avatar );
    return $avatar;
}
add_filter( 'get_avatar', 'mytheme_get_avatar' );

/**
 * 注册导航菜单
 */
register_nav_menus( array(
    'header_menu' => '顶部导航菜单', //注册顶部导航菜单key为header_menu; 在顶部导航处调用该key,如果用户选择了就能正常显示
) );

/**
 * 侧边栏组件widgets注册(使主题支持侧边栏)
 */
if( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'SaltedFish-sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}

/* 主题设置引入 */
if ( is_admin() ) {
    get_template_part( 'functions/sf-setting' ); //主题配置文件
    //实例化配置
    new SaltedFish_setting();
}

/**
 * 导入显示访客信息文件
 */
include("public/show-useragent/show-useragent.php");

