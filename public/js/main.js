/**
 * 顶部loading效果
 * */
jQuery(document).ready(function(){
    jQuery("#web_loading div").animate({width:"100%"},800,function(){
        setTimeout(function(){jQuery("#web_loading div").fadeOut(500);
        });
    });
});