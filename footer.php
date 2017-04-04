<hr>
<footer class="footer">

    <div class="container">
        <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="col-xs-12 col-sm-6 footer-info-block">
                <div class="col-xs-12 col-sm-12 footer_links_label"><p><i class="fa fa-link"></i> 友情链接</p>
                    </div>
                <div class="col-xs-12 col-sm-12">
                    <ul class="footer_links">
                        <?php wp_list_bookmarks('title_li=&categorize=0&orderby=rand&show_images=0'); ?>
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

</body>
</html>