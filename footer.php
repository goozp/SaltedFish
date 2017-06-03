<hr>
<footer class="footer">

    <div class="container">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="col-xs-12 col-sm-6 footer-info-block">
                <div class="col-xs-12 col-sm-12 footer_links_label"><p><i class="fa fa-link"></i> 友情链接</p>
                    </div>
                <div class="col-xs-12 col-sm-12">
                    <ul class="footer_links">
                        <?php
                        $indexFriedLink = sf_setting('index-fried-link');
                        wp_list_bookmarks("category_name={$indexFriedLink}&title_li=&categorize=0&orderby=rand&show_images=0"); ?>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 footer-info-block">
                <div class="col-xs-12 col-sm-12 footer_links_label">
                    <p><i class="fa fa-desktop"></i> 关于本站</p>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <p>
                        <?php if ($footer_about = sf_setting('footer-about')) {
                            echo $footer_about;
                        }else{
                            echo "Welcome!";
                        }?>
                    </p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3 footer-info-block" >
                <div class="col-xs-12 col-sm-12 footer_links_label">
                    <p><i class="fa fa-weixin"></i> 微信公众号</p>
                </div>
                <div class="col-xs-12 col-sm-12">
                    <p><img src="<?php echo sf_image('wechatPic.png'); ?>"  alt="微信公众号二维码" width="150px"/></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid footer-bottom-container">
        <div class="col-xs-12 col-sm-12 col-lg-12 footer-bottom text-center">
            <span>
                Copyright © 2017 <a id="footer_name" href="<?php bloginfo( 'url' ); ?>" target="_blank"><?php bloginfo( 'name' ); ?></a>
                All Rights Reserved. Jumping theme powered by <a href="http://www.gzpblog.com" target="_blank" rel="nofollow">guo</a>.
            </span>
        </div>
    </div>
</footer>

<div class="bottom-tools hidden-xs">
    <a id="back-to-top" title="返回顶部"></a>
</div>


<?php wp_footer(); ?>
<?php
if ( is_home() ){ ?>
    <script>
        $('.carousel').carousel({
            interval: 2000
        });
    </script>
<?php }
if ( is_single() ) { ?>
    <script type="text/javascript">
        hs.graphicsDir = <?php echo "'".get_template_directory_uri().'/public/highslide/graphics/'."'"; ?>;
        hs.align = 'center';
        hs.transitions = ['expand', 'crossfade'];
        hs.wrapperClassName = 'dark borderless floating-caption';
        hs.fadeInOut = true;
        hs.dimmingOpacity = .75;
        hs.showCredits = false;

        // Add the controlbar
        if (hs.addSlideshow) hs.addSlideshow({
            //slideshowGroup: 'group1',
            interval: 5000,
            repeat: false,
            useControls: true,
            fixedControls: 'fit',
            overlayOptions: {
                opacity: .6,
                position: 'bottom center',
                hideOnMouseOut: true
            }
        });
    </script>
    <?php } ?>
</body>
</html>