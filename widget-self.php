<div class="author-info-widget">
    <div class="author-info-widget-img">
        <img src="<?php echo sf_image('jumbotron_self.png'); ?>" class="img-responsive img-circle center-block" alt="侧栏个人头像" width="120px">
    </div>
    <div class="author-info-widget-intro text-center">
        <?php
        $authorName     = sf_setting( 'author-name' );
        $author_name    = empty($authorName) ? '博主' : $authorName;
        $weiboName      = sf_setting( 'weibo-link' );
        $weibo_name     = empty($weiboName) ? '#' : $weiboName;
        $facebookName  = sf_setting( 'facebook-link' );
        $facebook_name  = empty($facebookName) ? '#' : $facebookName;
        $githubName    = sf_setting( 'github-link' );
        $github_name    = empty($githubName) ? '#' : $githubName;
        ?>
        <h4><?php echo $author_name ?></h4>
        <a href="<?php echo $weibo_name ?>" class="i_weibo" target="_blank" rel="external nofollow"><i class="fa fa-weibo  fa-lg"></i></a>
        <a href="<?php echo $github_name ?>" class="i_github" target="_blank" rel="external nofollow"><i class="fa fa-github fa-lg"></i></a>
        <a href="<?php echo $facebook_name ?>" class="i_facebook" target="_blank" rel="external nofollow"><i class="fa fa-facebook-square fa-lg"></i></a>
    </div>
    <div class="author-info-widget-words">
        <div class="author-info-widget-words-left"></div>
        <div class="author-info-widget-words-main">
            <span>当你发现自己的才华撑不起野心时，就请安静下来学习吧。</span>
        </div>
        <div class="author-info-widget-words-right"></div>
    </div>
    <div class="author-info-widget-marker"></div>
</div>


