/* lazyload加载 */
$(function() {
    $("img.lazy").lazyload();
});


$(document).ready(function(){
    /* 回到顶部 */
    var $backToTop = $(".bottom-tools");
    /* 隐藏回顶部按钮 */
    $backToTop.hide();
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 200) { /* 返回顶部按钮将在用户向下滚动100像素后出现 */
            $backToTop.fadeIn();
        } else {
            $backToTop.fadeOut();
        }
    });
    $backToTop.on('click', function(e) {
        $("html, body").animate({scrollTop: 0}, 500);
    });


    /* 侧栏滚动控制 */
    $("#other-widgets").affix({
        offset: {
            top: 270, bottom: function () {
                return (this.bottom =
                    $('.widget-comments').outerHeight(true))
            }
        }
    });
});




