<div class="col-xs-12 col-sm-3 right-sidebar visible-lg-block" id="sidebar">
    <?php get_template_part('widget-self'); ?>

    <div id="other-widgets" class="other-widgets" >
        <?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'SaltedFish-sidebar' ) ) : ?>
            <p>请到后台添加侧栏项目。</p>
        <?php endif; ?>
    </div>
</div>
