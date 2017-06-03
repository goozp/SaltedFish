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
                &nbsp|&nbsp
                <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow">粤ICP备16013442号</a>
                &nbsp|&nbsp
                <a href="/sitemap.xml" target="_blank">网站地图</a>
                &nbsp|&nbsp
                本站运行于 <img src="<?php echo sf_image('aliyun.png'); ?>" height="30px" />
                &nbsp|&nbsp
                <!-- cnzz统计 -->
                <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1257421693'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1257421693%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
            </span>
        </div>
    </div>
</footer>

<div class="bottom-tools hidden-xs">
    <a id="back-to-top" title="返回顶部"></a>
</div>

<script>
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>
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