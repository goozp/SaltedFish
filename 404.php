<?php get_header(); ?>
<div class="container">
    <div class="col-xs-12 col-sm-9">
        <div class="col-xs-12 col-sm-12">
            <div class="logo">
                <h2>404</h2>
                <p>File not Found! - 页面不存在(´･ω･`)</p>
                <div class="sub">
                    <form method="GET" class="col-xs-12 col-sm-6 col-sm-offset-3" role="search" action="<?php bloginfo( 'home' ); ?>/">
                        <div class="input-group">
                            <input type="text" name="s" id="sf-search" class="form-control" placeholder="搜搜看" maxlength="100">
                            <span class="input-group-btn">
                                <button id="sf-search-button" class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
