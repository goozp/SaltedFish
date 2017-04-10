<?php
/**
 * 新增主题专属侧边栏组件
 * @name sf-widget
 * @description Theme basic functions
 * @version     1.0.0
 * @author      锅子 (http://www.gzpblog.com)
 * @package     SaltedFish
 **/

/**
 * 最新文章
 */
class sf_widget_new extends WP_Widget
{
    function sf_widget_new()
    {
        $widget_ops = array('description' => 'SaltedFish：最新文章');
        $this->WP_Widget('sf_widget_new', 'SaltedFish：最新文章', $widget_ops);
    }

    function widget($args, $instance)
    {
        extract($args);
        $limit = strip_tags($instance['limit']);
        $limit = $limit ? $limit : 6;
        ?>
        <div class="widget widget-news visible-lg-block">
            <h4><span><i class="fa fa-leaf"></i>&nbsp;最新文章</span></h4>
            <ul class="list fa-ul">
                <?php
                $args = array(
                    'orderby' => 'post_date',
                    'post_type' => 'post',
                    'showposts' => $limit
                );
                $posts = query_posts($args); ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <li class="widget-new"><i class="fa-li fa fa-angle-double-right"></i>
                        <p>
                            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </p>
                    </li>
                <?php endwhile;
                wp_reset_query();
                $posts =null;
                ?>
            </ul>
        </div>
        <?php
    }

    function update($new_instance, $old_instance)
    {
        if (!isset($new_instance['submit'])) {
            return false;
        }
        $instance = $old_instance;
        $instance['limit'] = strip_tags($new_instance['limit']);
        return $instance;
    }

    function form($instance)
    {
        global $wpdb;
        $instance = wp_parse_args((array)$instance, array('limit' => ''));
        $limit = strip_tags($instance['limit']);
        ?>
        <p><label for="<?php echo $this->get_field_id('limit'); ?>">文章数量：<input
                    id="<?php echo $this->get_field_id('limit'); ?>"
                    name="<?php echo $this->get_field_name('limit'); ?>" type="text"
                    value="<?php echo $limit; ?>"/></label></p>
        <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>"
               name="<?php echo $this->get_field_name('submit'); ?>" value="1"/>
        <?php
    }
}
register_widget('sf_widget_new');

/**
 * 标签化菜单
 */
class sf_widget_tagsMenu extends WP_Widget{
    function sf_widget_tagsMenu()
    {
        $widget_ops = array('description' => 'SaltedFish：标签化菜单');
        $this->WP_Widget('sf_widget_tagsMenu', 'SaltedFish：标签化菜单', $widget_ops);
    }

    function widget($args, $instance)
    {
        extract($args);
        $widgetName = strip_tags($instance['showType']);
        $menuDepth  = strip_tags($instance['menuDepth']);
        $defaultMenu    = strip_tags($instance['defaultMenu']);
        $widgetName = $widgetName ? $widgetName : '分类';
        $menuDepth  = $menuDepth ? $menuDepth : 3;
        $defaultMenu  = $defaultMenu ? $defaultMenu : 'wp_tag_cloud';
        ?>
        <div class="widget widget-tagsMenu clearfix visible-lg-block">
            <h4><span><i class="fa fa-tags"></i>&nbsp;<?php echo $widgetName ?></span></h4>
            <?php
            $args = array(
                'theme_location'  => 'sidebar_menu', //register_nav_menus中已经注册了header_menu的导航菜单; 该处特定只输出选择了该位置的菜单
                'echo'            => true,
                'container'       => 'ul',
                'fallback_cb'     => $defaultMenu,
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => $menuDepth,
            );
            wp_nav_menu($args); ?>
        </div>
        <?php
    }

    function update($new_instance, $old_instance)
    {
        if (!isset($new_instance['submit'])) {
            return false;
        }
        $instance = $old_instance;
        $instance['widgetName']  = strip_tags($new_instance['widgetName']);
        $instance['menuDepth']   = strip_tags($new_instance['menuDepth']);
        $instance['defaultMenu'] = strip_tags($new_instance['defaultMenu']);
        return $instance;
    }

    function form($instance)
    {
        global $wpdb;
        $instance = wp_parse_args((array)$instance, array('widgetName' => '分类', 'menuDepth' => 3, 'defaultMenu' => ''));
        $widgetName = strip_tags($instance['widgetName']);
        $menuDepth = strip_tags($instance['menuDepth']);
        $defaultMenu = strip_tags($instance['defaultMenu']);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('widgetName'); ?>">显示标题：<input
                    id="<?php echo $this->get_field_id('widgetName'); ?>"
                    name="<?php echo $this->get_field_name('widgetName'); ?>" type="text"
                    value="<?php echo $widgetName; ?>"/></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('menuDepth'); ?>">菜单深度：<input
                    id="<?php echo $this->get_field_id('menuDepth'); ?>"
                    name="<?php echo $this->get_field_name('menuDepth'); ?>" type="text"
                    value="<?php echo $menuDepth; ?>"/></label>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('defaultMenu'); ?>">默认菜单：<input
                    id="<?php echo $this->get_field_id('defaultMenu'); ?>"
                    name="<?php echo $this->get_field_name('defaultMenu'); ?>" type="text"
                    value="<?php echo $defaultMenu; ?>"/></label>
        </p>
        <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>"
               name="<?php echo $this->get_field_name('submit'); ?>" value="1"/>
        <?php
    }
}
register_widget('sf_widget_tagsMenu');

/**
 * 最新评论
 */
class sf_widget_comment extends WP_Widget{
    function sf_widget_comment()
    {
        $widget_ops = array('description' => 'SaltedFish：最新评论');
        $this->WP_Widget('sf_widget_comment', 'SaltedFish：最新评论', $widget_ops);
    }

    function sf_get_comments($num){
        $comments = get_comments( "user_id=0&status=approve&number={$num}" );
        $output = "";
        foreach ($comments as $comment) {
            $output .= "<li> 
                        <div class='col-xs-12 col-sm-2 gavatar'>".get_avatar( $comment, 43,'',$comment->comment_author, array('class' => 'img-responsive img-circle'))."</div>
                        <div class='col-xs-12 col-sm-10 comments-con'>
                            <p class='comments-name'><a  href='".get_permalink($comment->comment_post_ID)."#comment-" . $comment->comment_ID . "'>".strip_tags($comment->comment_author)."</a>
                                 <span class='comments-time'>".date('Y-m-d', strtotime($comment->comment_date_gmt))."</span>
                            </p>
                            <p class='comments-comment'><a href='".get_permalink($comment->comment_post_ID )."#comment-".$comment->comment_ID."'>" .strip_tags($comment->comment_content) ."</a></p>
                        </div>
                    </li>";
        }
        $output = convert_smilies($output);
        echo $output;
    }

    function widget($args, $instance)
    {
        extract($args);
        $limit = strip_tags($instance['limit']);
        $limit = $limit ? $limit : 5;
        ?>
        <div class="widget widget-comments visible-lg-block">
            <h4><span><i class="fa fa-comments"></i>&nbsp;最新评论</span></h4>
            <ul>
                <?php $this->sf_get_comments($limit);?>
            </ul>
        </div>
        <?php
    }

    function update($new_instance, $old_instance)
    {
        if (!isset($new_instance['submit'])) {
            return false;
        }
        $instance = $old_instance;
        $instance['limit'] = strip_tags($new_instance['limit']);
        return $instance;
    }

    function form($instance)
    {
        global $wpdb;
        $instance = wp_parse_args((array)$instance, array('limit' => '5'));
        $limit = strip_tags($instance['limit']);
        ?>
        <p><label for="<?php echo $this->get_field_id('limit'); ?>">显示条数：<input
                    id="<?php echo $this->get_field_id('limit'); ?>"
                    name="<?php echo $this->get_field_name('limit'); ?>" type="text"
                    value="<?php echo $limit; ?>"/></label></p>
        <input type="hidden" id="<?php echo $this->get_field_id('submit'); ?>"
               name="<?php echo $this->get_field_name('submit'); ?>" value="1"/>
        <?php
    }
}
register_widget('sf_widget_comment');