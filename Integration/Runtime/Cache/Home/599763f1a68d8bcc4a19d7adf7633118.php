<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>汇盟通宝微商城</title>
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=yes">
<link href="/work/inte_shop/Public/Home/css/style/throughsetting.css" type="text/css" rel="stylesheet"/>
<link href="/work/inte_shop/Public/Home/css/weui.css" type="text/css" rel="stylesheet"/>
<link href="/work/inte_shop/Public/Home/css/order.css" type="text/css" rel="stylesheet" />
<link href="/work/inte_shop/Public/Home/css/swiper-3.4.1.min.css" type="text/css" rel="stylesheet" />
<link href="/work/inte_shop/Public/Home/css/common.css" type="text/css" rel="stylesheet" />
<script src="/work/inte_shop/Public/Home/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/work/inte_shop/Public/Home/js/swiper-3.4.1.min.js" type="text/javascript"></script>
<script src="/work/inte_shop/Public/Home/js/order.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
    $(".inad_tbsc").eq(0).show().siblings().hide();
    $(".weui_navbar_item").click(function(){
		var i=$(this).index();
		$(".weui_navbar_item").eq(i).addClass("weui_bar_item_on").siblings().removeClass("weui_bar_item_on");
		$(".inad_tbsc").eq(i).show().siblings().hide();
		});

});
</script>
</head>

<body ontouchstart>
	<div class="weui_tab">
        
    		<header class="weui_cell_hd">
    	        <div class="pull_left" onclick="javascript:window.history.back()" >
    	            <img src="/work/inte_shop/Public/Home/Img/icon/tb-1.png" alt=""/>
    	        </div>
    	        <p class="pull_m">产品详情页</p>
    	        <div class="pull_right" onclick="javascript:location.reload();">
    	            <img src="/work/inte_shop/Public/Home/Img/icon/new.png" alt=""/>
    	        </div>
    	    </header>
        
	    
            
    <link href="/work/inte_shop/Public/Home/css/style/detail.css" type="text/css" rel="stylesheet"/>
    <div class="weui_cell_bd">
        <div class="pic"><img class="pic_pic" src="../img/Tupian/1.png"/></div>
        <div class="ad_name">
            <p class="inad_name_t"><?php echo ($goods["gname"]); ?>(<?php echo ($goods["size"]); ?>)</p>
            <p class="inad_name_m">产品编号: <?php echo ($goods["gid"]); ?></p>
            <p class="inad_name_m">产品规格: <?php echo ($goods["size"]); ?></p>
            <p class="inad_name_br">通粉优惠：260TBC</p>
            <form action="/work/inte_shop/index.php/Home/Index/addCart" method="get">
                <input type="hidden" name="gid" value="<?php echo ($goods["id"]); ?>">
                <button class="inad_name_bl" onClick="com()">购买</button>
            </form>
        </div>
        <p class="ad_cpms">产品描述：</p>
        <div class="ad_cptd_u"><?php echo ($goods["desc"]); ?></div>
        <p class="ad_cptd">产品特点：</p>
        <div class="ad_cptd_u"><?php echo ($goods["special"]); ?></div>
        <p class="ad_cptd">注意事项：</p>
        <div class="ad_zysx_u ad_cptd_u"><?php echo ($goods["notice"]); ?></div>
    </div>


        
            <div class="weui_tabbar" style="background:#04be01; position:fixed; bottom:0px; z-index:3;">
                <a href="index.html" class="weui_tabbar_item weui_bar_item_on">
                    <div class="weui_tabbar_icon">
                        <img src="/work/inte_shop/Public/Home/Img/icon/tb-8.png" alt="">
                    </div>
                    <p class="weui_tabbar_label" style="color: #ffffff;">首页</p>
                </a>
                <a href="#" class="weui_tabbar_item">
                    <div class="weui_tabbar_icon">
                        <img src="/work/inte_shop/Public/Home/Img/icon/tb-7.png" alt="">
                    </div>
                    <p class="weui_tabbar_label"style="color: #ffffff;">购物</p>
                </a>
                <a href="#" class="weui_tabbar_item">
                    <div class="weui_tabbar_icon">
                        <img src="/work/inte_shop/Public/Home/Img/icon/tb-6.png" alt="">
                    </div>
                    <p class="weui_tabbar_label"style="color: #ffffff;">购物车</p>
                </a>
                <a href="#" class="weui_tabbar_item">
                    <div class="weui_tabbar_icon">
                        <img src="/work/inte_shop/Public/Home/Img/icon/tb-5.png" alt="">
                    </div>
                    <p class="weui_tabbar_label"style="color: #ffffff;">我的</p>
                </a>
            </div>
        
    </div>
</body>
</html>