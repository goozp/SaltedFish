<?php
/**
 * @name SaltedFish theme basic functions 基础函数库
 * @description 基础函数库
 * @version     1.0.0
 * @author      锅子 (https://www.gzpblog.com)
 * @package     SaltedFish
 **/

/**
 * 主题header导入
 */
function sf_header(){
    ?>
    <?php if ( is_home() ) { ?>
        <title><?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?></title>
    <?php }elseif( is_search() ){ ?>
        <title><?php _e( 'Search&#34;', SF_NAME );the_search_query();echo "&#34;"; ?> - <?php bloginfo( 'name' ); ?></title>
    <?php }elseif( is_single() ){ ?>
        <title><?php echo trim( wp_title( '', 0 ) ); ?> - <?php bloginfo( 'name' ); ?></title>
    <?php }elseif( is_author() ){  ?>
        <title><?php wp_title( "" ); ?> - <?php bloginfo( 'name' ); ?></title>
    <?php }elseif( is_archive() ){
        if ( is_year() || is_month() || is_day() ) {
            ?>
            <title><?php echo get_the_archive_title(); ?> - <?php bloginfo( 'name' ); ?></title>
            <?php
        } else{?>
            <title><?php single_cat_title(); ?> - <?php bloginfo( 'name' ); ?></title>
        <?php }}elseif( is_year() ){ ?>
        <title><?php the_time( 'Y' ); ?> - <?php bloginfo( 'name' ); ?></title>
    <?php }elseif( is_month() ){ ?>
        <title><?php the_time( 'F' ); ?> - <?php bloginfo( 'name' ); ?></title>
    <?php }elseif( is_page() ){ ?>
        <title><?php echo trim( wp_title( '', 0 ) ); ?> - <?php bloginfo( 'name' ); ?></title>
    <?php }elseif( is_404() ){ ?>
        <title>404 - <?php bloginfo( 'name' ); ?></title>
    <?php }else{ ?>
        <?php wp_title('',true); }?>
    <?php

    set_keyword_description();
}

/**
 * 设置keyword和description
 */
function set_keyword_description(){
    $description = '';
    $keywords = '';
    global $post;
    if (is_home() || is_page()) {
        $keywords    = sf_setting( 'keywords' );
        $description = sf_setting( 'description' );
    }
    elseif (is_single()) {
        $description1 = get_post_meta($post->ID, "description", true);
        //$description2 = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));
        // 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述
        $description = $description1 ? $description1 : str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));

        // 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词
        $keywords = get_post_meta($post->ID, "keywords", true);
        if($keywords == '') {
            $tags = wp_get_post_tags($post->ID);
            foreach ($tags as $tag ) {
                $keywords = $keywords . $tag->name . ", ";
            }
            $keywords = rtrim($keywords, ', ');
        }
    }
    elseif (is_category()) {
        // 分类的description可以到后台 - 文章 -分类目录，修改分类的描述
        $description = category_description();
        $keywords = single_cat_title('', false);
    }
    elseif (is_tag()){
        // 标签的description可以到后台 - 文章 - 标签，修改标签的描述
        $description = tag_description();
        $keywords = single_tag_title('', false);
    }
    $description = trim(strip_tags($description));
    $keywords = trim(strip_tags($keywords));
    ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <meta name="keywords" content="<?php echo $keywords; ?>" />
    <?php
}


/**
 * 获取主题设置
 * @param string $key
 * @return mixed
 */
function sf_setting( $key ) {
    $defaults = array(
        'description'               => '',
        'keywords'                  => '',
    );
    $settings = get_option( SF_NAME . '_settings' );
    $settings = wp_parse_args( $settings, $defaults );
    return $settings[ $key ];
}

/**
 * 主题路径
 * @param $path
 * @return string
 */
function sf_path( $path ) {
    $file_path = SF_PATH . '/' . $path;
    return $file_path;
}

/**
 * 主题路径url
 * @param $file_path
 * @return string
 */
function sf_file_url( $file_path ) {
    $file_path = SF_THEME_URL . '/' . $file_path;
    return $file_path;
}

/**
 * 主题图片url获取
 * @param string $image_name
 * @return string
 */
function sf_image( $image_name ) {
    $image_url = sf_file_url( 'public/images/' . $image_name );
    return $image_url;
}

/**
 * 主题css样式路径
 * @param  string $style_name
 * @return string
 */
function sf_style( $style_name ) {
    $style_url = sf_file_url( 'public/css/' . $style_name );
    return $style_url;
}

/**
 * 主题javascript文件url
 * @param string $script_name
 * @return string
 */
function sf_script( $script_name ) {
    $script_url = sf_file_url( 'public/js/' . $script_name );

    return $script_url;
}
