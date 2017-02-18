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
    	        确认订单
    	        <div class="pull_right" onclick="javascript:location.reload();">
    	            <img src="/work/inte_shop/Public/Home/Img/icon/new.png" alt=""/>
    	        </div>
    	    </header>
        
	    
            
    <link href="/work/inte_shop/Public/Home/css/style/commit.css" type="text/css" rel="stylesheet"/>
	<div class="weui_tab">
	    
	    <div class="weui_cell_bd">
        	
            <!-- <div class="dizhi">
                <img class="indz_pic1" src="/work/inte_shop/Public/Home/img/icon/tb-dz.png"/>
                <div class="indz_m">
                    <div class="indz_mt">
                        <p>收货人：<?php echo ($addr["name"]); ?></p>
                        <p><?php echo ($addr["number"]); ?></p>
                    </div>
                    <div class="indz_mb"><?php echo (getareaname($addr["prov"])); echo (getareaname($addr["city"])); echo (getareaname($addr["xian"])); echo ($addr["detail"]); ?></div>
                </div>
                <img class="indz_pic2" src="/work/inte_shop/Public/Home/img/icon/tb-xb.png"/>
            </div>
            <ul class="dzxz">
            <form>
                <?php if(is_array($addrs)): foreach($addrs as $key=>$addrs): ?><li>
                        <div class="indzxz_m">
                            <div class="indz_mt">
                                <p>收货人：<?php echo ($addrs["name"]); ?></p>
                                <p><?php echo ($addrs["number"]); ?></p>
                            </div>
                            <div class="indz_mb">收货地址：<?php echo (getareaname($addrs["prov"])); echo (getareaname($addrs["city"])); echo (getareaname($addrs["xian"])); echo ($addrs["detail"]); ?></div>
                        </div>
                    </li><?php endforeach; endif; ?>
                <input type="radio" key=<?php echo ($addrs["id"]); ?> name="dzdxk"/>
                <botton class="tjdz">添加地址</botton>
            </form>
            </ul>
            <div class="indztj">
                <form action="/work/inte_shop/index.php/Home/address/addAddress" method="post">
                    <p>所在地区
                        <select name="prov" id="prov">
                            <option>---请选择---</option>
                        </select>
                        <select name="city" id="city">
                            <option>---请选择---</option>
                        </select>
                        <select name="xian" id="xian">
                            <option>---请选择---</option>
                        </select>
                    </p>
                    <p>请输入地址<input class="dz" disabled type="text" name="detail"/></p>
                    <p>电话<input class="dh" type="text" name="number"/></p>
                    <p>收货人<input class="shr" type="text" name="name"/></p>
                    <input type="hidden" name="user_id" value="<?php echo ($_SESSION['adminuser']['id']); ?>" />
                    <input type="hidden" name="isdefault" value="1">
                    <input class="tjdztj" type="submit" value="提交"/>
                </form>
            </div> -->
            
            <ul class="spxx">
            <?php if(is_array($cart)): foreach($cart as $key=>$vo): ?><li>
                    <img class="inspxx_pic" src="/work/inte_shop/Public/Uploads/goods/<?php echo ($vo["pic"]); ?>"/>
                    <div class="inspxx_r">
                        <div class="inspxx_name"><?php echo ($vo["gname"]); ?></div>
                        <div class="inspxx_jg">
                            <div class="inspxx_jgl">价值：<?php echo ($vo["pv"]); ?>TBC</div>
                            <div class="inspxx_m">
                                商品件数:<?php echo ($vo["count"]); ?>
                            </div>
                            <botton class="inspxx_sc">删除</botton>
                        </div>
                    </div>
                </li><?php endforeach; endif; ?>
            </ul>
            <div class="sphj">
                <p>此商品性质不支持7天退货</p>
                <p class="insphj_m">配送方式:
                    <span>自提<input class="psfs" type="radio" checked/></span>
                    <span>快递<input class="psfs" disabled type="radio"/></span>
                </p>
                <p class="insphj_b">
                    <span class="insphj_bt">合计：￥<?php echo ($vo['pv']*$vo['count']); ?></span>
                    <span>共<?php echo count($cart);?>件商品</span>
                </p>
            </div>
           
            <div class="spzj">
                <p>总计：<?php echo ($vo['pv']*$vo['count']); ?>TBC</p>
                <form action="/work/inte_shop/index.php/Home/Index/doCommit" method="post">
                    <input type="hidden" name="uid">
                    <input type="hidden" name="jfzs" value="">
                    <input type="submit" value="去支付"/>
                </form>
            </div>
    	</div>
    </div>
    <script type="text/javascript">
        $(function(){
            function getCookie(name) {
                var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
                if (arr = document.cookie.match(reg))
                    return unescape(arr[2]);
                else
                    return null;
            }
            var user = getCookie(username);
            $('input[name=uid]').val(user);
            var a = $('.insphj_b span:nth-child(1)').text();
            var b = a.replace(/[^0-9]/ig,""); 
            $('input[name=jfzs]').val(b);
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