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
    }else{
        if ( $count > 1000 ){
            $count = sprintf( "%.2fk", $count / 1000 );
        }
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

/**
 * 文章截取
 * @param string $content
 * @param int    $limit
 * @return string
 */
function sf_excerpt( $content, $limit = 100 ) {
    if ( $content ) {
        $content = preg_replace( "/\[.*?\].*?\[\/.*?\]/is", "", $content );
        $content = mb_strimwidth( strip_tags( apply_filters( 'the_content', $content ) ), 0, $limit, "..." );
    }

    return strip_tags( $content );
}

/**
 * Thumbnail缩略图检测
 * @param string $type
 * @param int    $width
 * @param int    $height
 * @return array
 */
function sf_thumbnail( $type = 'full', $width = 0, $height = 0 ) {
    global $post;

    $result = array(
        'exist' => false,
        'url'   => null,
        'size'  => array( $width, $height ),
        'crop'  => true
    );

    $size_array = array(
        'full'            => array( $width, $height ),
        'index-thumbnail' => array( 260, 260 )
    );

    if ( has_post_thumbnail() ) { //有特色图片时
        $attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $type );

        $result['exist'] = true;
        $result['url']   = $attachment_image[0];

        // correct image size that don't need crop
        if ( $size_array[ $type ][0] == $attachment_image[1] && $size_array[ $type ][1] == $attachment_image[2] ) {
            $result['crop'] = false;
        }

    } else if ( ! sf_setting( 'thumbnail' ) ) { //没有特色图片时查看配置是否选择显示文章中插入的图片
        ob_start();
        ob_end_clean();

        /* filter all the images in the post content
         * 正则匹配文章中的图片img标签
         * TODO 效率
         */
        preg_match_all( '/\<img.+?src="(.+?)".*?\/>/is', $post->post_content, $matches, PREG_SET_ORDER );
        $count = count( $matches );

        if ( $count > 0 ) {
            $result['exist'] = true;
            $result['url']   = $matches[0][1];
        }
    }
    return $result;
}

/**
 * 制作缩略图
 * @param array|string $obj
 * @param int          $width
 * @param int          $height
 * @param bool         $is_avatar
 * @return string
 */
function sf_thumbnail_url( $obj, $width = 0, $height = 0, $is_avatar = false ) {
    $url       = '';
    $need_crop = true;

    if ( is_array( $obj ) ) {
        $url       = $obj['url'];
        $width     = $obj['size'][0];
        $height    = $obj['size'][1];
        $need_crop = $obj['crop'];
    } else if ( is_string( $obj ) ) {
        $url = $obj;
    }

    if ( $need_crop && !$is_avatar) {
        $url = sprintf( '%s&#63;src=%s&#38;w=%s&#38;h=%s&#38;zc=1&#38;q=100', sf_file_url( 'timthumb.php' ), urlencode( $url ), $width, $height );
    }

    return $url;
}

/**
 * 分页
 * @param int $space
 */
function sf_pagenavi( $space = 5 ) {
    if ( is_singular() ) {
        return;
    }

    global $wp_query, $paged;
    $max_page = $wp_query->max_num_pages;

    if ( $max_page == 1 ) {
        return;
    }
    if ( empty( $paged ) ) {
        $paged = 1;
    }


    if ( $paged > 1 ) {
        printf( '<li><a class="page-numbers" href="%s" title="%s" aria-label="Previous"><span aria-hidden="true">%s</span></a></li>', esc_html( get_pagenum_link( $paged - 1 ) ), '« Previous', '«' );
    }
    if ( $paged > $space + 2 ) {
        echo '<li><span class="page-numbers">...</span></li>';
    }
    for ( $i = $paged - $space; $i <= $paged + $space; $i ++ ) {
        if ( $i > 0 && $i <= $max_page ) {
            if ( $i == $paged ) {
                echo '<li class="active"><span class="page-numbers" >'.$i.'</span></li>';
            } else {
                printf( '<li><a class="page-numbers" href="%s" title="page %s">%s</a></li>', esc_html( get_pagenum_link( $i ) ), $i, $i );
            }
        }
    }
    if ( $paged < $max_page - $space - 1 ) {
        echo '<li><span class="page-numbers">...</span></li>';
    }
    if ( $paged < $max_page ) {
        printf( '<li><a class="page-numbers" href="%s" title="%s" aria-label="Next"><span aria-hidden="true">%s</span></a></li>', esc_html( get_pagenum_link( $paged + 1 ) ), 'Next »', '»' );
    }
}

/**
 * 获得热评文章
 **/
function get_most_viewed($posts_num=7, $days=300){
    global $wpdb;
    $sql = "SELECT ID , post_title , comment_count
            FROM $wpdb->posts
            WHERE post_type = 'post' AND TO_DAYS(now()) - TO_DAYS(post_date) < $days
            AND ($wpdb->posts.`post_status` = 'publish' OR $wpdb->posts.`post_status` = 'inherit')
            ORDER BY comment_count DESC LIMIT 0 , $posts_num ";
    $posts = $wpdb->get_results($sql);
    $output = "";
    foreach ($posts as $post){
        $output .= "\n<li><i class=\"fa-li fa fa-angle-double-right\"></i><a href= \"".get_permalink($post->ID)."\" rel=\"bookmark\" title=\"".$post->post_title." (".$post->comment_count."条评论)\" >". $post->post_title."</a></li>";
    }
    echo $output;
}