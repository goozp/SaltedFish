<?php
/**
 * @name theme setting
 * @description 主题配置
 * @version     1.0.0
 * @author      锅子 (http://www.gzpblog.com)
 * @package     Jumping
 **/
class SaltedFish_setting {
    private $defaultsBasic;
    private $defaultsTheme;
    private $defaultsContent;
    private $defaultsOthers;

    public function __construct() {
        $this->defaultsBasic = array(
            array(
                'title' => '网站描述description',
                'key'   => 'description',
                'type'  => 'textarea',
                'value' => false,
                'label' => '对你的网站进行描述'
            ),
            array(
                'title' => '网站关键词keywords',
                'key'   => 'keywords',
                'type'  => 'textarea',
                'value' => false,
                'label' => '多个关键词请用英文逗号隔开'
            ),
        );

        $this->defaultsTheme = array(
            array(
                'title' => '缩略图',
                'key'   => 'thumbnail',
                'type'  => 'checkbox',
                'value' => 1,
                'text'  => '只显示特色图片',
                'label' => '默认没有特色图片时缩略图会显示文章中插入的图片，勾选后，首页和归档页面只显示特色图片的缩略图，文章中插入的图片缩略图将不会显示。'
            ),
            array(
                'title' => '友链——首页友链分类目录名称',
                'key'   => 'index-fried-link',
                'type'  => 'input',
                'value' => false,
                'label' => '首页友链处，友链模板页根据名称输出友链，不设置将无效。例如:首页友链'
            ),
            array(
                'title' => '友链——内页友链分类目录名称',
                'key'   => 'inside-friend-link',
                'type'  => 'input',
                'value' => false,
                'label' => '友链模板页根据名称输出友链，不设置将无效。例如:内页友链'
            ),
            array(
                'title' => '链接收藏页——要展示的分类目录名称',
                'key'   => 'collection-links',
                'type'  => 'textarea',
                'value' => false,
                'label' => '链接收藏页要展示的分类目录名称，多个关键词请用英文逗号隔开。例如:内页友链,科技人文'
            ),
            array(
                'title' => '侧栏——个人名称展示',
                'key'   => 'author-name',
                'type'  => 'input',
                'value' => false,
                'label' => '侧栏显示的个人名称展示，一般为博主。'
            ),
            array(
                'title' => '侧栏——微博链接',
                'key'   => 'weibo-link',
                'type'  => 'input',
                'value' => false,
                'label' => '侧栏微博小图标链接到的地址，可不设。'
            ),
            array(
                'title' => '侧栏——Facebook链接',
                'key'   => 'facebook-link',
                'type'  => 'input',
                'value' => false,
                'label' => '侧栏Facebook小图标链接到的地址，可不设。'
            ),
            array(
                'title' => '侧栏——Github链接',
                'key'   => 'github-link',
                'type'  => 'input',
                'value' => false,
                'label' => '侧栏Github小图标链接到的地址，可不设。'
            ),
            array(
                'title' => 'footer关于本站',
                'key'   => 'footer-about',
                'type'  => 'textarea',
                'value' => false,
                'label' => '对你的网站进行描述'
            ),
        );

        $this->defaultsContent = array(
            array(
                'title' => '首页轮播图1——标题',
                'key'   => 'index-carousel-title1',
                'type'  => 'input',
                'value' => false,
                'label' => '首页轮播图1标题'
            ),
            array(
                'title' => '首页轮播图1——链接',
                'key'   => 'index-carousel-url1',
                'type'  => 'input',
                'value' => false,
                'label' => '首页轮播图1链接'
            ),
            array(
                'title' => '首页轮播图1——图片url',
                'key'   => 'index-carousel-img1',
                'type'  => 'input',
                'value' => false,
                'label' => '首页轮播图1图片url'
            ),
            array(
                'title' => '首页轮播图2——标题',
                'key'   => 'index-carousel-title2',
                'type'  => 'input',
                'value' => false,
                'label' => '首页轮播图2标题'
            ),
            array(
                'title' => '首页轮播图2——链接',
                'key'   => 'index-carousel-url2',
                'type'  => 'input',
                'value' => false,
                'label' => '首页轮播图2链接'
            ),
            array(
                'title' => '首页轮播图2——图片url',
                'key'   => 'index-carousel-img2',
                'type'  => 'input',
                'value' => false,
                'label' => '首页轮播图2图片url'
            ),
            array(
                'title' => '首页轮播图3——标题',
                'key'   => 'index-carousel-title3',
                'type'  => 'input',
                'value' => false,
                'label' => '首页轮播图3标题'
            ),
            array(
                'title' => '首页轮播图3——链接',
                'key'   => 'index-carousel-url3',
                'type'  => 'input',
                'value' => false,
                'label' => '首页轮播图3链接'
            ),
            array(
                'title' => '首页轮播图3——图片url',
                'key'   => 'index-carousel-img3',
                'type'  => 'input',
                'value' => false,
                'label' => '首页轮播图3图片url'
            ),
            array(
                'title' => '首页专题1url',
                'key'   => 'index-subject1',
                'type'  => 'input',
                'value' => false,
                'label' => '首页专题1url'
            ),
            array(
                'title' => '首页专题2url',
                'key'   => 'index-subject2',
                'type'  => 'input',
                'value' => false,
                'label' => '首页专题2url'
            ),
            array(
                'title' => '首页工具栏1url',
                'key'   => 'index-tool1',
                'type'  => 'input',
                'value' => false,
                'label' => '首页工具栏1url'
            ),
            array(
                'title' => '首页工具栏2url',
                'key'   => 'index-tool2',
                'type'  => 'input',
                'value' => false,
                'label' => '首页工具栏2url'
            ),
        );

        $this->defaultsOthers = array(
            array(
                'title' => '评论回复邮件提醒——邮箱smtp地址',
                'key'   => 'email-smtp',
                'type'  => 'input',
                'value' => false,
                'label' => '邮箱smtp地址，如阿里云企业邮：smtp.mxhichina.com。'
            ),
            array(
                'title' => '评论回复邮件提醒——选择端口',
                'key'   => 'email-port',
                'type'  => 'radio',
                'value' => array(
                    '80' => '80',
                    '25' => '25',
                    '465' => '465',
                ),
                'label' => '与smtp地址通讯的端口'
            ),
            array(
                'title' => '评论回复邮件提醒——邮箱账号',
                'key'   => 'email-name',
                'type'  => 'input',
                'value' => false,
                'label' => '您的邮箱帐号。'
            ),
            array(
                'title' => '评论回复邮件提醒——邮箱密码',
                'key'   => 'email-password',
                'type'  => 'password',
                'value' => false,
                'label' => '您的邮箱密码。'
            ),
        );

        // Add theme setting menu and page
        add_action( 'admin_menu', array( $this, 'menu' ) );
    }

    public function menu() {
        add_menu_page( SF_NAME, SF_NAME, 'manage_options', 'SaltedFish_setting', array(
            $this,
            'intro'
        ), sf_image( 'saltedfish-logo.png' ), 100 );

        add_submenu_page( 'SaltedFish_setting', SF_NAME . ' 介绍', SF_NAME, 'edit_themes', 'SaltedFish_setting', array(
            $this,
            'intro'
        ) );
        add_submenu_page( 'SaltedFish_setting', SF_NAME . ' 选项设置', '选项设置', 'edit_themes', 'SaltedFish_setting_detail', array(
            $this,
            'setting'
        ) );
        add_submenu_page( 'SaltedFish_setting', SF_NAME . ' 主题说明', '主题说明', 'edit_themes', 'SaltedFish_help', array(
            $this,
            'desc'
        ) );

        add_action( 'admin_init', array( $this, 'settings_group' ) );
    }

    public function intro(){
        wp_enqueue_style( 'SaltedFish-help', sf_style( 'setting-help.css' ) );
        ?>

        <div class="sf-intro">
            <h1><img src="<?php echo sf_image('saltedfish-logo2.png') ?>" height="18px"/>&nbsp;<?php echo SF_NAME; ?></h1>
            <div class="intro-header">
                <h3>什么是SaltedFish?</h3>
                SaltedFish是一款基于bootstrap的Wordpress主题，更确切地说是一款博客主题。是 <a href="https://www.gzpblog.com">锅子</a>
                空闲时间为自己的博客量身定制的一款主题。当然，如果你喜欢这套主题的样式，非常欢迎使用，也很欢迎大家添砖加瓦。
            </div>
            <div >
                <h3>SaltedFish的理念</h3>
                制作SaltedFish前，作者的需求是：所见即所得。之前一直崇尚简洁，因为一个个人博客，而且偏向于技术类的话，文章的展示是首要的，太花哨不好。
                而之前制作的主题在使用中有一个很明显的问题，当有时候想要来查一篇曾经发表的笔记时，没有一个快速的入口，需要去把它翻出来，这个体验非常不好。
                因为本人使用博客，与一些追求流量的自媒体不同，首先是为自己服务，比如记录笔记，分享技术，找到志同道合的道友等。所以SaltedFish的理念，就是
                首页的所见即所得，需要什么，快速找到，打通一切入口。
            </div>
        </div>
        <?php
    }

    public function setting() {
        wp_enqueue_style( 'sf-help', sf_style('setting-main.css' ) );
        if ( isset( $_REQUEST['settings-updated'] ) ) { ?>
            <div id="message" class="updated fade">
                <p><strong>主题设置已保存.</strong></p>
            </div>
            <?php
        }

        ?>

        <div class="htmleaf-container">
            <form method="post" action="options.php">
                <?php settings_fields( 'SaltedFish-settings-group' ); ?>
                <div class="tabs">
                    <div class="tabs-header">
                        SaltedFish设置
                    </div>
                    <input type="radio" id="tab1" name="tab-control" checked>
                    <input type="radio" id="tab2" name="tab-control">
                    <input type="radio" id="tab3" name="tab-control">
                    <input type="radio" id="tab4" name="tab-control">
                    <ul>
                        <li title="basic-setting"><label for="tab1" role="button"><br><span>基本设置</span></label></li>
                        <li title="theme-setting"><label for="tab2" role="button"><br><span>主题设置</span></label></li>
                        <li title="content-setting"><label for="tab3" role="button"><br><span>内容设置</span></label></li>
                        <li title="others-setting"><label for="tab4" role="button"><br><span>其它设置</span></label></li>
                    </ul>

                    <div class="slider"><div class="indicator"></div></div>

                    <div class="content">
                        <section>
                            <h2>basic-setting</h2>
                            <table class="form-table">
                                <tbody>
                                <?php
                                foreach ( $this->defaultsBasic as $key => $arr ) {
                                    ?>
                                    <tr valign="top">
                                        <th scope="row">
                                            <label><?php echo $arr['title']; ?></label>
                                        </th>
                                        <td>
                                            <p>
                                                <?php $this->build( $arr ); ?>
                                            </p>
                                            <?php
                                            if ( $arr['label'] ) {
                                                printf( '<p class="description">%s</p>', $arr['label'] );
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                </tbody>
                            </table>
                        </section>
                        <section>
                            <h2>theme-setting</h2>
                            <table class="form-table">
                                <tbody>
                                <?php
                                foreach ( $this->defaultsTheme as $key => $arr ) {
                                    ?>
                                    <tr valign="top">
                                        <th scope="row">
                                            <label><?php echo $arr['title']; ?></label>
                                        </th>
                                        <td>
                                            <p>
                                                <?php $this->build( $arr ); ?>
                                            </p>
                                            <?php
                                            if ( $arr['label'] ) {
                                                printf( '<p class="description">%s</p>', $arr['label'] );
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                </tbody>
                            </table>
                        </section>
                        <section>
                            <h2>content-setting</h2>
                            <table class="form-table">
                                <tbody>
                                <?php
                                foreach ( $this->defaultsContent as $key => $arr ) {
                                    ?>
                                    <tr valign="top">
                                        <th scope="row">
                                            <label><?php echo $arr['title']; ?></label>
                                        </th>
                                        <td>
                                            <p>
                                                <?php $this->build( $arr ); ?>
                                            </p>
                                            <?php
                                            if ( $arr['label'] ) {
                                                printf( '<p class="description">%s</p>', $arr['label'] );
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                </tbody>
                            </table>
                        </section><section>
                            <h2>others</h2>
                            <table class="form-table">
                                <tbody>
                                <?php
                                foreach ( $this->defaultsOthers as $key => $arr ) {
                                    ?>
                                    <tr valign="top">
                                        <th scope="row">
                                            <label><?php echo $arr['title']; ?></label>
                                        </th>
                                        <td>
                                            <p>
                                                <?php $this->build( $arr ); ?>
                                            </p>
                                            <?php
                                            if ( $arr['label'] ) {
                                                printf( '<p class="description">%s</p>', $arr['label'] );
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                                </tbody>
                            </table>
                        </section>
                    </div>
                    <hr>
                    <input type="submit" id="tab-submit" class="button-primary" value="全部保存"/>
                </div>
            </form>
        </div>

        <?php
    }

    public function desc() {
        wp_enqueue_style( 'SaltedFish-help', sf_style( 'setting-help.css' ) );
        ?>
        <div class="sf-desc">
            <h1>欢迎使用<?php echo SF_NAME; ?>主题</h1>

            <div class="help-title">
                当前版本为：<?php echo SF_VERSION; ?>
                &nbsp;&nbsp;&nbsp;&nbsp;
                作者：<a href="https://www.gzpblog.com">锅子</a>
            </div>
            <hr>
            <div class="theme-about">
                <h3>主题特色</h3>
                <ol>
                    <li>采用bootstrap构建；比较简洁，风格性冷谈。</li>
                    <li>支持自适应，适配移动端设备</li>
                    <li>去除了加载Google Fonts，emoji表情等以优化速度</li>
                    <li>优化了Wordpress默认输出的 head 加载</li>
                </ol>
            </div>
            <div class="theme-things">
                <h3>主题说明</h3>
                <ul>
                    <li>
                        小图标：采用<a href="http://fontawesome.dashgame.com/" target="_blank">Font Awesome v4.7.0</a>，具体图标对应class请前往官网查看。
                    </li>
                </ul>
            </div>
            <div class="theme-inside">
                <h3>已内置功能（无需插件）</h3>
                <ul>
                    <li>
                        发送邮件：评论回复邮件提醒功能采用了PHPMailer，发送邮件的设置可在主题设置中进行设置。
                    </li>
                    <li>
                        文章图片放大灯箱效果：采用了Highslide JS，版本5.0。
                    </li>
                </ul>
            </div>
            <div class="using-about">
                <h3>部分功能使用说明</h3>
                <ol>
                    <li>开始使用主题后请先在主题设置页面设置网站信息，非常重要，description和keywords一经设置最好少修改。</li>
                </ol>
            </div>
            <div class="to-do">
                <h3>待完善</h3>
                <ol>
                    <li>首页css background图片首次加载滞后,体验不好</li>
                    <li>顶部菜单在下拉整个页面的时候偶尔会有一点移动</li>
                </ol>
            </div>
            <div class="feature-section">
                <h3>主题的未来</h3>
                <span>欢迎对该主题进行完善，github地址为：<a href="https://github.com/ZpGuo/SaltedFish" target="_blank">SaltedFish</a>，可以提issue或者直接fork。</span>
            </div>
        </div>
        <?php
    }

    public function settings_group() {
        register_setting( 'SaltedFish-settings-group', SF_NAME . '_settings' );
    }


    private function build( $obj ) {
        switch ( $obj['type'] ) {
            case 'number':
                $this->number( $obj['key'] );
                break;

            case 'input':
                $this->input( $obj['key'] );
                break;

            case 'password':
                $this->password( $obj['key'] );
                break;

            case 'textarea':
                $this->textarea( $obj['key'] );
                break;

            case 'radio':
                $this->radio( $obj['key'], $obj['value'] );
                break;

            case 'checkbox':
                $this->checkbox( $obj['key'], $obj['value'], $obj['text'] );
                break;
        }
    }

    private function input( $key ) {
        printf( '<input type="input" class="regular-text" name="%s_settings[%s]" value="%s" />', SF_NAME, $key, sf_setting( $key ) );
    }

    private function password( $key ) {
        printf( '<input type="password" class="regular-text" name="%s_settings[%s]" value="%s" />', SF_NAME, $key, sf_setting( $key ) );
    }

    private function number( $key ) {
        printf( '<input type="number" class="small-text" name="%s_settings[%s]" value="%s" step="1" min="1" />', SF_NAME, $key, sf_setting( $key ) );
    }

    private function textarea( $key ) {
        printf( '<textarea type="textarea" class="large-text" name="%s_settings[%s]">%s</textarea>', SF_NAME, $key, sf_setting( $key ) );
    }

    private function radio( $key, $value ) {
        $real_val = sf_setting( $key );

        foreach ( $value as $_key => $_val ) { ?>
            <label>
                <input class="SaltedFish-<?php echo $_key; ?>" type="radio"
                       name="<?php echo SF_NAME . '_settings[' . $key . ']'; ?>"
                       value="<?php echo $_key; ?>" <?php if ( $_key == $real_val ) {
                    echo 'checked="checked"';
                } ?> /> <?php echo $_val; ?>
            </label>
        <?php }
    }

    private function checkbox( $key, $value, $text ) {
        $real_val = sf_setting( $key );

        ?>
        <label>
            <input type="checkbox" name="<?php echo SF_NAME . '_settings[' . $key . ']'; ?>"
                   value="<?php echo $value; ?>" <?php if ( $value == $real_val ) {
                echo 'checked="checked"';
            } ?> /> <?php echo $text; ?>
        </label>
    <?php }
}