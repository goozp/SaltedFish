<?php
/**
 * @name theme-setting
 * @description 主题配置
 * @version     1.0.0
 * @author      锅子 (http://www.gzpblog.com)
 * @package     SaltedFish
 **/
class SaltedFish_setting {
    private $defaultsBasic;
    private $defaultsTheme;
    private $defaultsContent;

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

        $this->defaultsTheme = array(
            array(
                'title' => '首页、分类内容',
                'key'   => 'full-content',
                'type'  => 'checkbox',
                'value' => 1,
                'text'  => '显示全文',
                'label' => '默认首页和分类页文章只显示摘要，勾选开启显示全文后将全文显示。'
            ),
            array(
                'title' => '缩略图',
                'key'   => 'thumbnail',
                'type'  => 'checkbox',
                'value' => 1,
                'text'  => '只显示特色图片',
                'label' => '默认没有特色图片时缩略图会显示文章中插入的图片，勾选后，首页和归档页面只显示特色图片的缩略图，文章中插入的图片缩略图将不会显示。'
            ),
        );

        $this->defaultsContent = array(
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
        );

        // Add theme setting menu and page
        add_action( 'admin_menu', array( $this, 'menu' ) );
    }
    public function menu() {
        add_menu_page( SF_NAME, SF_NAME, '', 'SaltedFish_setting', array(
            $this,
            'basic_setting'
        ), sf_image( 'saltedfish-logo.png' ), 100 );

        add_submenu_page( 'SaltedFish_setting', SF_NAME . ' 基本设置', '基本设置', 'edit_themes', 'SaltedFish_basic_setting', array(
            $this,
            'basic_setting'
        ) );
        add_submenu_page( 'SaltedFish_setting', SF_NAME . ' 主题设置', '主题设置', 'edit_themes', 'SaltedFish_theme_setting', array(
            $this,
            'theme_setting'
        ) );
        add_submenu_page( 'SaltedFish_setting', SF_NAME . ' 内容设置', '内容设置', 'edit_themes', 'SaltedFish_content_setting', array(
            $this,
            'content_setting'
        ) );
        add_submenu_page( 'SaltedFish_setting', SF_NAME . ' 说明', '说明', 'edit_themes', 'SaltedFish_help', array(
            $this,
            'help_desc'
        ) );

        add_action( 'admin_init', array( $this, 'settings_group' ) );
    }

    /**
     * 基础设置
     */
    public function basic_setting(){
        if ( isset( $_REQUEST['settings-updated'] ) ) { ?>
            <div id="message" class="updated fade">
                <p><strong>主题设置已保存.</strong></p>
            </div>
            <?php
        }

        ?>

        <div class="wrap">
            <h2>基本设置</h2>

            <form method="post" action="options.php">
                <?php settings_fields( 'SaltedFish-settings-group-basic' ); ?>
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
                <input type="submit" class="button-primary" value="保存更改"/>
            </form>
        </div>

        <?php
    }

    /**
     * 主题设置
     */
    public function theme_setting(){
        if ( isset( $_REQUEST['settings-updated'] ) ) { ?>
            <div id="message" class="updated fade">
                <p><strong>主题设置已保存.</strong></p>
            </div>
            <?php
        }

        ?>

        <div class="wrap">
            <h2>主题设置</h2>

            <form method="post" action="options.php">
                <?php settings_fields( 'SaltedFish-settings-group-theme' ); ?>
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
                <input type="submit" class="button-primary" value="保存更改"/>
            </form>
        </div>

        <?php
    }

    /**
     * 内容设置
     */
    public function content_setting(){
        if ( isset( $_REQUEST['settings-updated'] ) ) { ?>
            <div id="message" class="updated fade">
                <p><strong>主题设置已保存.</strong></p>
            </div>
            <?php
        }

        ?>

        <div class="wrap">
            <h2>内容设置</h2>

            <form method="post" action="options.php">
                <?php settings_fields( 'SaltedFish-settings-group-content' ); ?>
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
                <input type="submit" class="button-primary" value="保存更改"/>
            </form>
        </div>

        <?php
    }

    /**
     * 说明页
     */
    public function help_desc(){
        wp_enqueue_style( 'sf-help', sf_style('setting-help.css' ) );
        ?>
        <div class="wrap">
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
                    <li>
                        发送邮件：评论回复邮件提醒功能采用了PHPMailer，发送邮件的设置可在主题设置中进行设置。
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
                    <li> </li>
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
        register_setting( 'SaltedFish-settings-group-basic', SF_NAME . '_settings_basic' );
        register_setting( 'SaltedFish-settings-group-theme', SF_NAME . '_settings_theme' );
        register_setting( 'SaltedFish-settings-group-content', SF_NAME . '_settings_content' );
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
                <input class="sf-<?php echo $_key; ?>" type="radio"
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