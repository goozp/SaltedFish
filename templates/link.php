<?php
/**
 * Template Name: link 链接页面
 */
get_header(); ?>
<div class="container">
    <div class="col-xs-12 col-sm-9 page-main-frame">
        <div class="row">
            <?php if ( have_posts() ):while ( have_posts() ) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-12'); ?>>
                    <div class="row sf_link_post">
                        <div class="col-xs-12 col-sm-12 post-body clearfix">
                            <div class="sf_link_post_content">
                                <?php
                                $indexFriendLink = sf_setting('index-fried-link');
                                $insideFriendLink = sf_setting('inside-friend-link');
                                wp_list_bookmarks("category_name={$indexFriendLink}&title_li=&category_before=<div class='friendLinkDiv'>&category_after=</div>");
                                wp_list_bookmarks("category_name={$insideFriendLink}&title_li=&category_before=<div class='friendLinkDiv'>&category_after=</div>"); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 ">
                    <div class="alert alert-info friend-link-info" role="alert">交换友链可以在下面留言哦！最好是专注于IT相关技术的独立博客。</div>
                </div>

                <?php comments_template(); ?>
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
<!-- 侧栏 -->
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
