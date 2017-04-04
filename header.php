<!DOCTYPE html>
<html lang=“zh-cmn-Hans”>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="renderer" content="webkit|ie-comp|ie-stand">

    <?php sf_header(); ?>

    <link rel="icon" href="../../favicon.ico">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
</head>

<body>
    <nav class="navbar navbar-fixed-top clearfix
         <?php if ( $nowUser = get_current_user_id() ){
                    if ( get_user_option( 'show_admin_bar_front', $nowUser ) == 'true' ){
                        echo 'admin_login_nav';
                    }
                }
         ?>" id="topNav">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header navbar-inverse">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>">
                <img src="<?php echo sf_image('logo.png'); ?>" alt="<?php bloginfo( 'name' ); ?>">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar">
            <?php
            $args = array(
                'theme_location'  => 'header_menu', //register_nav_menus中已经注册了header_menu的导航菜单; 该处特定只输出选择了该位置的菜单
                'menu'            => '',
                'container'       => '',
                'container_class' => '',
                'container_id'    => '',
                'menu_class'      => 'nav navbar-nav',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 1,
                'walker'          => ''
            );
            wp_nav_menu($args); ?>

            <!-- 导航右部分-搜索框 start -->
            <ul class="nav navbar-right hidden-sm">
                <li id="navbar-search">
                    <form method="GET" class="navbar-form" role="search"  action="<?php bloginfo( 'home' ); ?>/">
                        <div class="input-group">
                            <input type="text" name="s" id="jp-search" class="form-control" placeholder="搜索关键字" maxlength="100">
                            <span class="input-group-btn">
                                <button id="jp-search-button" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>