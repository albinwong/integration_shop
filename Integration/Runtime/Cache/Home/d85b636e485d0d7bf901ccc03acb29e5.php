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
    	        <input class="search" type="text" value="请输入" />
    	        <div class="pull_right" onclick="javascript:location.reload();">
    	            <img src="/work/inte_shop/Public/Home/Img/icon/new.png" alt=""/>
    	        </div>
    	    </header>
        
	    
            
<div class="weui_cell_bd">
	<div class="baner">
    	<div class="inbaner"><img src="/work/inte_shop/Public/Home/img/baner/baner_1.jpg" alt=""/></div>
    </div>
	<div class="weui_navbar">
        <?php if(is_array($cate)): foreach($cate as $key=>$vo): if($key == 0): ?><div class="weui_navbar_item weui_bar_item_on" key="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></div>
            <?php else: ?>
                <div class="weui_navbar_item" key="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></div><?php endif; endforeach; endif; ?>
    </div>
    <div class="ad_tbsc">
    	<div id="goods" class="inad_tbsc"></div>
    </div>
</div>
<script type="text/javascript">
    $(function(){
        //页面加载完毕
        var pid = $('.weui_navbar').find('.weui_bar_item_on').attr('key');
        if(pid){
            $.ajax({
                url:'Home/Index/ajax',
                data:{'pid':pid},
                dataType:'',
                type:'POST',
                success:function(mes){
                    if(mes!=1){
                       var res = eval(mes);
                       for(var i = 0;i<res.length;i++){
                            var div = $('<a class="inal_ad" href="/work/inte_shop/index.php/Home/Index/detail?id='+res[i]['id']+'"><div class="inal_ad_pic"><img src="/work/inte_shop/Public/Uploads/goods/'+res[i]['pic']+'"/></div><p class="inal_ad_p1">'+res[i]['gname']+'（'+res[i]['size']+'）</p><p class="inal_ad_p2">价格：'+res[i]['pv']+'TBC</p><p class="inal_ad_p3"><span class="inal_ad_p3l">已售'+res[i]['sales']+'件</span><span class="inal_ad_p3r">库存'+res[i]['repertory']+'件</span></p></a>');
                            $('#goods').prepend(div);
                       }
                   }else{
                        var div = $('<div style="font-size:22px;padding:20px;"><center>暂无商品</center></div>');
                        $('#goods').prepend(div);
                   }
                }
            });
        }
        //切换分类
        $('.weui_navbar').eq(1).show().siblings().hide();
        $('.weui_navbar_item').click(function(){
            // $(this).addClass(".weui_bar_item_on").siblings().removeClass(".weui_bar_item_on");
            var sy=$(this).index();
            // $(".weui_navbar").eq(sy).show().siblings().hide();
            var pid = $('.weui_navbar').find('.weui_bar_item_on').attr('key');
            $('#goods').text('');
            if(pid){
                $.ajax({
                    url:'Home/Index/ajax',
                    data:{'pid':pid},
                    dataType:'',
                    type:'POST',
                    success:function(mes){
                        if(mes!=1){
                           var res = eval(mes);
                           for(var i = 0;i<res.length;i++){
                            var div = $('<a class="inal_ad" href="/work/inte_shop/index.php/Home/Index/detail?id='+res[i]['id']+'"><div class="inal_ad_pic"><img src="/work/inte_shop/Public/Uploads/goods/'+res[i]['pic']+'"/></div><p class="inal_ad_p1">'+res[i]['gname']+'（'+res[i]['size']+'）</p><p class="inal_ad_p2">价格：'+res[i]['pv']+'TBC</p><p class="inal_ad_p3"><span class="inal_ad_p3l">已售'+res[i]['sales']+'件</span><span class="inal_ad_p3r">库存'+res[i]['repertory']+'件</span></p></a>');
                                $('#goods').prepend(div);
                           }
                       }else{
                            var div = $('<div style="font-size:22px;padding:20px;"><center>暂无商品</center></div>');
                            $('#goods').prepend(div);
                       }
                    }
                });
            }
        });
    });
</script>


        
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