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
        <div class="widget widget-news">
            <h4><i class="fa fa-leaf"></i>&nbsp;最新文章</h4>
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