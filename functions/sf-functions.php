<?php
/**
 * @name SaltedFish theme functions 功能函数库
 * @description 功能函数库
 * @version     1.0.0
 * @author      锅子 (https://www.gzpblog.com)
 * @package     SaltedFish
 **/

/**
 * 阅读量函数
 * 调用方法: get_post_views($post -> ID);
 * @param $post_id
 */
function get_post_views ($post_id) {
    $count_key = 'views';
    $count = get_post_meta($post_id, $count_key, true);
    if ($count == '') {
        delete_post_meta($post_id, $count_key);
        add_post_meta($post_id, $count_key, '0');
        $count = '0';
    }
    echo number_format_i18n($count);
}
function set_post_views () {
    global $post;
    $post_id = $post -> ID;
    $count_key = 'views';
    $count = get_post_meta($post_id, $count_key, true);
    if (is_single() || is_page()) {
        if ($count == '') {
            delete_post_meta($post_id, $count_key);
            add_post_meta($post_id, $count_key, '0');
        } else {
            update_post_meta($post_id, $count_key, $count + 1);
        }
    }
}
add_action('get_header', 'set_post_views');