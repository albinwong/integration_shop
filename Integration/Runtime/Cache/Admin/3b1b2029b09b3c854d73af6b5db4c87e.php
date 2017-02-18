<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>订单列表</title>
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
		
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">订单列表</div>
			<div class="panel-body">
				<div class="bootstrap-table">
					<div class="fixed-table-container">
						<div class="fixed-table-header"><table></table></div>
						<div class="fixed-table-body">
							<div class="fixed-table-loading" style="top: 37px; display: none;">Loading, please wait…</div>
							<table data-toggle="table" data-url="tables/data1.json" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" class="table table-hover">
							    <thead>
							    	<tr>
							    		<th style="">
							    			<div class="th-inner sortable">订单号</div>
							    		</th>
							    		<th style="">
							    			<div class="th-inner sortable">收货人</div><div class="fht-cell"></div>
							    		</th>
							    		<th style="">
							    			<div class="th-inner sortable">联系电话</div><div class="fht-cell"></div>
							    		</th>

							    		<th style="">
							    			<div class="th-inner sortable">订单时间</div><div class="fht-cell"></div>
							    		</th>
							    		<th style="">
							    			<div class="th-inner sortable">订单状态</div><div class="fht-cell"></div>
							    		</th>

							    		<th style="">
							    			<div class="th-inner sortable">操作</div><div class="fht-cell"></div>
							    		</th>
							    	</tr>
							    </thead>
								<tbody>
									<?php if(is_array($res)): foreach($res as $key=>$vo): ?><tr data-index="0">
								            <td><?php echo ($vo['oid']); ?></td>
								            <td><?php echo ($vo['uid']); ?></td>
								            <td><?php echo ($vo['uid']); ?></td>
			           						<td><?php echo date('Y年m月d日 H:i:s',$vo['otime']);?></td>
								            <td><?php echo (getorderstatus($vo['status'])); ?></td>
								            <td>
			            						<a href="<?php echo U('admin/orders/send',array('oid'=>$vo['oid']));?>">发货</a>
												<a href="<?php echo U('admin/orders/detail',array('id'=>$vo['oid']));?>">订单详情</a>
											</td>
										</tr><?php endforeach; endif; ?>
								</tbody>
							</table>
						</div>
						<div class="fixed-table-pagination">
							<div class="pull-right pagination">
								<ul class="pagination">
									<li class="page-number"><a href="javascript:void(0)"><?php echo ($page); ?></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
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