<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><title>订单详情页</title></title>
<link href="/work/inte_shop/Public/Admin/css/bootstrap.min.css" rel="stylesheet">
<link href="/work/inte_shop/Public/Admin/css/datepicker3.css" rel="stylesheet">
<link href="/work/inte_shop/Public/Admin/css/styles.css" rel="stylesheet">
<script src="/work/inte_shop/Public/Admin/js/html5shiv.min.js"></script>
<script src="/work/inte_shop/Public/Admin/js/respond.min.js"></script>
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>通宝商城</span>后台管理</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li class="parent ">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> 用户管理 <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li>
						<a class="" href="<?php echo U('Admin/User/index');?>">
							<span class="glyphicon glyphicon-share-alt"></span> 用户列表
						</a>
					</li>
					<li>
						<a class="" href="<?php echo U('Admin/User/add');?>">
							<span class="glyphicon glyphicon-share-alt"></span> 添加用户
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> 分类管理 <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li>
						<a class="" href="<?php echo U('Admin/Cate/index');?>">
							<span class="glyphicon glyphicon-share-alt"></span> 分类列表
						</a>
					</li>
					<li>
						<a class="" href="<?php echo U('Admin/Cate/adds');?>">
							<span class="glyphicon glyphicon-share-alt"></span> 添加分类
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> 商品管理 <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-3">
					<li>
						<a class="" href="<?php echo U('Admin/Goods/index');?>">
							<span class="glyphicon glyphicon-share-alt"></span> 商品列表
						</a>
					</li>
					<li>
						<a class="" href="<?php echo U('Admin/Goods/add');?>">
							<span class="glyphicon glyphicon-share-alt"></span> 添加商品
						</a>
					</li>
				</ul>
			</li>
			<li class="parent ">
				<a href="#">
					<span class="glyphicon glyphicon-list"></span> 订单管理 <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="glyphicon glyphicon-s glyphicon-plus"></em></span> 
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li>
						<a class="" href="<?php echo U('Admin/Orders/index');?>">
							<span class="glyphicon glyphicon-share-alt"></span> 订单列表
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li><a href="login.html"><span class="glyphicon glyphicon-user"></span> Login Page</a></li>
		</ul>
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
<style type="text/css">
	#order-info{border:1px solid red;}
</style>
	<div class="col-md-12 graphs">
	    <div class="xs">
	  		<h3>订单详情</h3>
			<div class="bs-example4" data-example-id="simple-responsive-table">
			<div class="bg-primary" style="padding:7px 20px 29px;">
	            <div class="pull-left">订单号: <?php echo ($res1["oid"]); ?></div>
	       		<div class="pull-right col-xs-offset-1">下单时间: <?php echo date('Y年m月d日 H:i:s',$res1['otime']);?> 
	       		</div>
	        </div>
			<div class="goods-total" style="border:solid 1px #ddd;">
				<ul class="list-unstyled" style="padding:10px">
					<li>
						<span class="text">客户姓名：</span><span class="txt"><?php echo ($res1["rec"]); ?></span>
					</li>
					<li>
						<span class="text">联系方式：</span><span class="txt"><?php echo ($res1["tel"]); ?></span>
					</li>
					<li>
						<span class="text">客户地址：</span><span class="txt"><?php echo ($res1["addr"]); ?></span>
					</li>
				</ul>
			</div>
			    <div class="table-responsive">
			      <table class="table table-bordered">
			        <thead>
			          <tr>
			            <th>商品图片</th>
			            <th>商品名称</th>
			            <th>商品规格</th>
			            <th>购买单价</th>
			            <th>数量</th>
			            <th>小计</th>
			          </tr>
			        </thead>
			        <tbody>
			        <?php if(is_array($res)): foreach($res as $key=>$vo): ?><tr>
			            <td scope="row"><img src="/work/inte_shop/Public/Uploads/goods/<?php echo ($vo['goods']['pic']); ?>" alt=""></td>
			            <td><?php echo ($vo['goods']['gname']); ?></td>
			            <td><?php echo ($vo['goods']['size']); ?></td>
			            <td><?php echo ($vo['buyprice']); ?></td>
			            <td><?php echo ($vo['buycnt']); ?></td>
			            <td><?php echo number_format($vo['buyprice']*$vo['buycnt'],2);?></td>
			          </tr><?php endforeach; endif; ?>
			        </tbody>
			        	<td>买家留言</td>
			        	<td colspan="5"><?php echo ($res1["umsg"]); ?></td>
			        <tfoot>
			        </tfoot>
			      </table>
					<div class="goods-total pull-right">
						<ul class="list-unstyled">
							<li>
								<span class="text">商品数量：</span>
								<span class="txt"><?php echo count($res);?></span>
							</li>
							<li>
								<span class="text">商品总额：</span>
								<span class="txt">¥<?php echo ($res1["ormb"]); ?></span>
							</li>
							<li>
								<span class="text">运&#12288;&#12288;费：</span>
								<span class="txt">¥0.00</span>
							</li>
							<li class="ftx-01">
								<span class="text">实付总额：</span>
								<span class="txt count">¥<?php echo ($res1["ormb"]); ?></span>
							</li>
						</ul>
					</div>
			    </div>
		  	</div>
  		</div>
   </div>

	</div>
	<!--/.main-->

	<script src="/work/inte_shop/Public/Admin/js/jquery-1.11.1.min.js"></script>
	<script src="/work/inte_shop/Public/Admin/js/bootstrap.min.js"></script>
	<script src="/work/inte_shop/Public/Admin/js/chart.min.js"></script>
	<script src="/work/inte_shop/Public/Admin/js/chart-data.js"></script>
	<script src="/work/inte_shop/Public/Admin/js/easypiechart.js"></script>
	<script src="/work/inte_shop/Public/Admin/js/easypiechart-data.js"></script>
	<script src="/work/inte_shop/Public/Admin/js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});
		!function ($) {
		    $(document).on("click","ul.nav li.parent > a > span.icon", function(){          
		        $(this).find('em:first').toggleClass("glyphicon-minus");      
		    }); 
		    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>