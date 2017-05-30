<?php
/**
 * Template Name: subject 专题页
 */
get_header(); ?>
<div class="container">
    <div class="col-xs-12 col-sm-9 page-main-frame">
        <div class="row">
            <?php if ( have_posts() ):while ( have_posts() ) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-12'); ?>>
                    <div class="row sf_subject_post">
                        <div class="col-xs-12 col-sm-12 sf_subject_post_body clearfix">
                            <div class="post-content"><?php the_content( '' ); ?></div>
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
<!-- 侧栏 -->
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
