<div class="col-xs-12 col-sm-12 sf_page_comments" id="comments">
    <div class="row">
        <?php
        if ( isset( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
            die(__('Please don\'t directly loading the page, thanks!', SF_NAME));
        }

        if ( post_password_required() ) { ?>
            <p class="nocomments"><?php echo '该文章已加密。'; ?></p>
            <?php
            return;
        }
        ?>

        <!-- 评论显示 -->
        <?php if ( have_comments() ) : ?>
            <div class="col-xs-12 col-sm-12 comments-data comments-data-body">
                <div class="col-xs-12 col-sm-12 comments-data-title">
                    <h4>
                        <span><i class="fa fa-comments"></i> 当前共有 <strong style="color: #f39c12"><?php echo $post->comment_count; ?></strong> 条评论</span>
                        <span class="link-to-reply-button"><a href="#respond"><i class="fa fa-comment-o"></i> 我要评论</a></span>
                    </h4>
                </div>
                <div class="col-xs-12 col-sm-12 comments-data-body">
                    <ul class="comment-list media-list comments-data-media clearfix">
                        <?php wp_list_comments( array( 'type' => 'comment', 'callback' => 'sf_comment' ) ); ?>
                    </ul>
                    <div class="comments-data-footer clearfix">
                        <?php if ( 'open' != $post->comment_status ) : ?>
                            <h3 class="comments-title"><?php echo "评论关闭！" ?></h3>
                        <?php else : ?>
                            <div class="comment-topnav text-center"><?php paginate_comments_links( 'prev_text=«&next_text=»' ); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <?php if ( 'open' != $post->comment_status ) : ?>
                <h3 class="comments-title"><?php echo "评论关闭！" ?></h3>
            <?php endif; ?>
        <?php endif; ?>

        <!-- 发表评论 -->
        <?php if ( comments_open() ) : ?>
            <div  class="col-xs-12 col-sm-12 comments-data comments-respond" id="respond">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <h4 class="comments-title"><i class="fa fa-commenting"></i>&nbsp;<?php echo "发表评论" ?> <small>为了网站的健康成长，请友爱发言~</small></h4>
                    </div>
                    <form method="post" action="<?php echo site_url('wp-comments-post.php');?>" id="comment_form">

                        <?php if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) : ?>
                            <p class="title welcome"><?php printf( '你需要 <a href="%s">登录</a> 才能回复.', wp_login_url( get_permalink() ) ); ?></p>
                        <?php else : ?>

                        <div  class="col-xs-12 col-sm-12">
                            <?php if ( is_user_logged_in() ) : ?>
                            <p class="title welcome"><?php printf( '欢迎 <a href="%1$s">%2$s</a> 回来，', get_option( 'siteurl' ) . '/wp-admin/profile.php', $user_identity ); ?>
                                <a href="<?php echo wp_logout_url( get_permalink() ); ?>"
                                   title="<?php echo "退出登录" ?>"><?php echo "退出登录" ?></a>
                                <span class="cancel-comment-reply"><?php cancel_comment_reply_link('点击取消回复') ?></span>
                            </p>
                        </div>
                        <?php else : ?>

                        <?php if ( $comment_author != "" ): ?>
                        <p class="title welcome">
                            欢迎<?php printf(' <strong>%s</strong> ', $comment_author ) ?>回来，写个评论吧？
                        </p>
                </div>
                <div  class="col-xs-12 col-sm-12">
                    <div id="author_info" class="author_hide">
                        <?php else : ?>
                    </div>
                    <div class="col-xs-12 col-sm-12">
                        <div id="author_info">
                            <?php endif; ?>
                            <div class="col-xs-12 col-sm-6 input-group sf_comments_col">
                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user"></i>&nbsp;&nbsp;  昵称 <small class="text-danger">*</small></span>
                                <input  class="form-control"  type="text" name="author" id="author"
                                        placeholder="输入一个昵称" aria-describedby="sizing-addon2"
                                        value="<?php echo $comment_author; ?>">
                            </div>
                            <div class="col-xs-12 col-sm-6 input-group sf_comments_col">
                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i>&nbsp;Email <small class="text-danger">*</small></span>
                                <input  class="form-control"  type="text" name="email" id="mail"
                                        placeholder="输入您的邮箱" aria-describedby="sizing-addon2"
                                        value="<?php echo $comment_author_email; ?>">
                            </div>
                            <div class="col-xs-12 col-sm-6 input-group sf_comments_col">
                                <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-link"></i>&nbsp;  网址 &nbsp;</span>
                                <input  class="form-control"  type="text" name="url" id="url"
                                        placeholder="Example:http://yourwebsite.com" aria-describedby="sizing-addon2"
                                        value="<?php echo $comment_author_url; ?>">
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-xs-12 col-sm-12 sf_comments_col">
                        <textarea class="form-control" name="comment" id="comment" rows="4" tabindex="4" placeholder="输入评论内容..."
                          onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"></textarea>
                    </div>

                    <div class="col-xs-12 col-sm-12">
                        <div class="col-xs-12 col-sm-7 checkbox reply-button">
                            <label>
                                <input type="checkbox"  name="comment_mail_notify"  id="comment_mail_notify" value="comment_mail_notify" checked="checked">
                                <strong>有回复时邮件通知我</strong> <i class="fa fa-envelope-o"></i>
                            </label>
                        </div>
                        <div class="col-xs-12 col-sm-2 cancel-comment-reply reply-button"><?php cancel_comment_reply_link('点击取消回复') ?></div>
                        <div class="col-xs-12 col-sm-2 reply-button"><input class="btn btn-primary" id="submit" type="submit" name="submit" value="提交 / Ctrl+Enter" /></div>
                    </div>

                    <?php comment_id_fields(); ?>
                    <?php do_action( 'comment_form', $post->ID ); ?>
                    <?php endif; ?>
                    </form>
                </div>
            </div>
        <?php endif; ?>

        <script>
            var addComment={moveForm:function(a,b,c,d){var e,f=this,g=f.I(a),h=f.I(c),i=f.I("cancel-comment-reply-link"),j=f.I("comment_parent"),k=f.I("comment_post_ID");if(g&&h&&i&&j){f.respondId=c,d=d||!1,f.I("wp-temp-form-div")||(e=document.createElement("div"),e.id="wp-temp-form-div",e.style.display="none",h.parentNode.insertBefore(e,h)),g.parentNode.insertBefore(h,g.nextSibling),$('body,html').animate( { scrollTop: $('#respond').offset().top - 150 }, 400);k&&d&&(k.value=d),j.value=b,i.style.display="",i.onclick=function(){var a=addComment,b=a.I("wp-temp-form-div"),c=a.I(a.respondId);if(b&&c)return a.I("comment_parent").value="0",b.parentNode.insertBefore(c,b),b.parentNode.removeChild(b),this.style.display="none",this.onclick=null,!1};try{f.I("comment").focus()}catch(l){}return!1}},I:function(a){return document.getElementById(a)}};
        </script>
    </div>
</div>