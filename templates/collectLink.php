<?php
/**
 * Template Name: collectLink 链接收藏页面
 */
get_header(); ?>
    <div class="container">
        <div class="col-xs-12 col-sm-12 page-main-frame">
            <div class="row">
                <?php if ( have_posts() ):while ( have_posts() ) : the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-12'); ?>>
                        <div class="row sf_collect_link">
                            <div class="col-xs-12 col-sm-12 post-body clearfix">
                                <div class="sf_collect_link_content">
                                    <?php
                                    $collectionLinks = sf_setting('collection-links');
                                    $linksType = explode(',', $collectionLinks);
                                    foreach ($linksType as $k => $v){
                                        wp_list_bookmarks("category_name={$v}&title_li=&category_before=<div class='collectionLinkDiv'>&category_after=</div>&show_description=1");
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; else:; ?>
                    <div class="col-xs-12 col-sm-12">
                        <div class="row jp_page_post">
                            <div class="col-xs-12 col-sm-12 post-header"">
                                <h2 class="post-title"><?php _e('对不起,页面不存在'); ?></h2>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>