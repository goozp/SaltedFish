<?php get_header(); ?>
    <div class="container">
        <div class="col-xs-12 col-sm-9 main-frame">
            <div class="row main-frame-row">
                <div class="col-xs-12 col-sm-12 sf_page_breadcrumbs visible-xs-inline-block visible-sm-block visible-md-block visible-lg-block">
                    <ol class="breadcrumb">
                        <li>
                            <a rel="bookmark" href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">首页</a>
                        </li>

                        <?php the_post(); ?>
                        <?php if ( is_category() ) {
                            ?>
                            <li>
                                <span class="breadcrumb-arrow"></span>分类
                                <span class="breadcrumb-arrow"></span>
                            </li>
                            <i class="fa fa-caret-right"></i>
                            <?php
                        } else if ( is_tag() ) {
                            ?>
                            <li>
                                <span class="breadcrumb-arrow"></span>标签
                                <span class="breadcrumb-arrow"></span>
                            </li>
                            <i class="fa fa-caret-right"></i>
                            <?php
                        } else if ( is_year() || is_month() || is_day() ) { ?>
                            <li><span><?php echo get_the_archive_title(); ?></span></li>
                        <?php } ?>

                        <span><?php echo single_cat_title( '', false ); ?></span>
                        <?php rewind_posts(); ?>
                    </ol>
                </div>

                <?php
                if ( have_posts() ) : while ( have_posts() ) : the_post();
                    $post_thumbnail = sf_thumbnail( 'index-thumbnail', 240, 240 );
                    $post_class     = 'col-xs-12 col-sm-12 col-lg-12 sf_post_list';

                    if ( $post_thumbnail["exist"] ) {
                        $post_class .= ' sf_post_thumbnail';
                    }
                    else{
                        $post_class .= ' sf_post_normal';
                    }
                ?>
                <div  id="post-<?php the_ID(); ?>" class="<?php echo $post_class; ?>">
                    <div class="col-xs-12 col-sm-12 col-lg-12 post_body">
                        <?php
                        if ( $post_thumbnail["exist"] ) : ?>
                        <div class="col-xs-12 col-sm-4 col-md-3 post-thumbnail">
                            <div class="ih-item square effect6 from_top_and_bottom">
                                <a href="<?php the_permalink() ?>" rel="bookmark">
                                    <div class="img">
                                        <img class="lazy" src="<?php echo sf_image('placeholder.png'); ?>"
                                             data-original="<?php echo sf_thumbnail_url($post_thumbnail); ?>"
                                             alt="<?php the_title(); ?>" width="240" height="240"/>
                                    </div>
                                    <div class="info">
                                        <h3><?php the_title(); ?></h3>
                                        <p><i class="fa fa-eye"></i>点击阅读</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-8 col-md-9 post-content">
                            <?php else : ?>
                            <div class="col-xs-12 col-sm-12 col-lg-12 post-content">
                                <?php endif; ?>
                                <div class="col-xs-12 col-sm-12 col-lg-12 post_title">
                                    <h2>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                                        <?php if ( is_sticky() ) { ?>
                                            <span class="post-sticky label label-danger"><?php _e( 'Stick', SF_NAME ); ?></span>
                                        <?php } ?>
                                    </h2>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-12 post_meta">
                                    <ul class="post_meta_ul">
                                        <li class="inline-li">
                                            <i class="fa fa-calendar-check-o"></i>
                                            <?php echo date('Y-m-d H:i',strtotime($post->post_date)); ?>
                                        </li>
                                        <li class="inline-li">
                                            <i class="fa fa-tags"></i>
                                            <?php the_category( ' , ' ); ?>
                                        </li>
                                        <li class="inline-li">
                                            <i class="fa fa-eye"></i>
                                            <?php echo sf_views(); ?> 阅读
                                        </li>
                                        <li class="inline-li">
                                            <i class="fa fa-comments-o"></i>
                                            <?php comments_popup_link( '暂无回复', '1 条回复', '% 条回复', '', '评论关闭'); ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-12 post-content-main">
                                    <?php
                                    $short_post = sf_excerpt( $post->post_content, 300 );
                                    $short_post = empty($short_post) ? "该文章没有预览内容，请直接进入文章页浏览。" : $short_post;
                                    printf( '<p>%s</p>', $short_post );
                                    ?>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-lg-12 post-bottom">
                                    <div class="col-xs-9 col-sm-9 post-tags">
                                        <?php the_tags('',' '); ?>
                                    </div>
                                    <a class="view-all" href="<?php the_permalink() ?>">阅读全文 &raquo;</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endwhile; else: ?>
                        <div class="col-xs-12 col-sm-12 col-lg-12">
                            <h2><?php _e('抱歉。'); ?></h2>
                            <p><?php _e('没有内容！'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <nav class="text-center" aria-label="Page navigation">
                        <ul class="pagination">
                            <?php sf_pagenavi(); ?>
                        </ul>
                    </nav>
                </div>

                </div><?php get_sidebar(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
