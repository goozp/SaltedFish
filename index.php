<?php get_header(); ?>

    <div class="container body-container">
        <!-- 左侧边栏 -->
        <div class="col-xs-12 col-sm-3">
            <div class="row">
                <div class="col-sm-12" style="background-color: red; height: 300px">
                    123
                </div>
                <div class="col-sm-12" style="background-color: red; height: 300px">
                    123
                </div>
            </div>
        </div>

        <!-- 中间出栏 -->
        <div class="col-xs-12 col-sm-9" >
            <div class="row">
                <div class="col-sm-9">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="<?php echo sf_image('timg.jpg'); ?>" alt="...">
                                <div class="carousel-caption">
                                    <h3>第一张</h3>
                                    <p>这是第一张的介绍</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="<?php echo sf_image('timg.jpg'); ?>" alt="...">
                                <div class="carousel-caption">
                                    <h3>第二张</h3>
                                    <p>这是第二张的介绍</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="<?php echo sf_image('timg.jpg'); ?>" alt="...">
                                <div class="carousel-caption">
                                    <h3>第三张</h3>
                                    <p>这是第三张的介绍</p>
                                </div>
                            </div>
                        </div>
                        <script>
                            $('.carousel').carousel({
                                interval: 3000
                            });
                        </script>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <!-- 右侧边栏 -->
                <div class="col-xs-12 col-sm-3">
                    <div class="row">
                        <div class="col-sm-12" style="background-color: green; height: 300px">
                            123
                            
                        </div>

                        <div class="col-sm-12" style="background-color: green; height: 300px">
                            123
                        </div>
                        <div class="col-sm-12" style="background-color: green; height: 300px">
                            123
                        </div>

                        <div class="col-sm-12" style="background-color: green; height: 300px">
                            123
                        </div>

                        <div class="col-sm-12" style="background-color: green; height: 300px">
                            123
                        </div>

                        <div class="col-sm-12" style="background-color: green; height: 300px">
                            123
                        </div>

                        <div class="col-sm-12" style="background-color: green; height: 300px">
                            123
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>

<?php get_footer(); ?>