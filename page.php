<?php get_header(); ?>
<div class="container">
    <div class="col-xs-12 col-sm-9 page-main-frame">
        <div class="row">
            <?php if ( have_posts() ):while ( have_posts() ) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-sm-12'); ?>>
                    <div class="row sf_page_post">
                        <div class="col-xs-12 col-sm-12 post-header">
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>"
                                                      title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-lg-12 post_meta">
                            <ul class="post_meta_ul">
                                <li class="inline-li">
                                    <i class="fa fa-calendar-check-o"></i>
                                    <?php echo date('Y-m-d H:i',strtotime($post->post_date)); ?>
                                </li>
                                <li class="inline-li">
                                    <span class="post-span"> | </span>
                                </li>
                                <li class="inline-li">
                                    <i class="fa fa-comments-o"></i>
                                    <?php comments_popup_link('暂无回复','1 回复', '% 回复'); ?>
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-12 col-sm-12 post-body clearfix">
                            <div class="post-content"><?php the_content( '' ); ?></div>
                        </div>
                    </div>
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
