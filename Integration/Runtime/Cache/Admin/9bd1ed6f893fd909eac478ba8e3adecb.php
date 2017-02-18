<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>商品添加</title>
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
		
<script src="/work/inte_shop/Public/Admin/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/work/inte_shop/Public/Admin/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/work/inte_shop/Public/Admin/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/work/inte_shop/Public/Admin/ueditor/lang/zh-cn/zh-cn.js"></script>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">商品添加</div>
				<div class="panel-body">
					<div class="col-md-10 col-md-offset-2">
						<form role="form" action="/work/inte_shop/index.php/Admin/Goods/update" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label>商品分类</label>
								<select class="form-control" name="pid">
									<?php if(is_array($res2)): foreach($res2 as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>">&nbsp;<?php echo ($vo["name"]); ?></option><?php endforeach; endif; ?>
								</select>
							</div>

							<div class="form-group">
								<label>商品名称</label>
								<input class="form-control" value=<?php echo ($res["gname"]); ?> type="text" name="gname">
							</div>

							<div class="form-group">
								<label>商品编号</label>
								<input class="form-control" value="<?php echo ($res["gid"]); ?>" type="text" name="gid">
							</div>

							<div class="form-group">
								<label>通宝价</label>
								<input class="form-control" value="<?php echo ($res["pv"]); ?>" type="text" name="pv">
							</div>

							<div class="form-group">
								<label>商品图片</label>
								<input type="file" name="pic" value=<?php echo ($res["pic"]); ?>><img src="/work/inte_shop/Public/Uploads/goods/<?php echo ($res["pic"]); ?>" alt="">
							</div>

							<div class="form-group">
								<label>商品描述</label>
								<script id="editor1" name="desc" type="text/plain" style="width:700px;height:100px;"><?php echo ($res["desc"]); ?></script>
							</div>

							<div class="form-group">
								<label>商品特点</label>
								<script id="editor2" name="special" type="text/plain" style="width:700px;height:100px;"><?php echo ($res["special"]); ?></script>
							</div>

							<div class="form-group">
								<label>注意事项</label>
								<script id="editor3" name="notice" type="text/plain" style="width:700px;height:100px;"><?php echo ($res["notice"]); ?></script>
							</div>
							
							<div class="form-group">
								<label>商品状态</label>
								<div class="radio">
									<label>
										<input name="status" id="optionsRadios1" value="1" type="radio" <?php if($res["status"] == 1): ?>checked<?php endif; ?>>上架
									</label>
								</div>
								<div class="radio">
									<label>
										<input name="status" id="optionsRadios2" value="2" type="radio" <?php if($res["status"] == 2): ?>checked<?php endif; ?>>下架
									</label>
								</div>
							</div>

							<div class="form-group">
								<label>库存</label>
								<input class="form-control" placeholder="请输入商品库存" type="number" name="repertory" value="<?php echo ($res["repertory"]); ?>">
							</div>

							<div class="form-group">
								<label>销量</label>
								<input class="form-control" placeholder="请输入商品销量" type="number" name="sales" value="<?php echo ($res["sales"]); ?>">
							</div>

					       	<input type="hidden" value="<?php echo ($res["id"]); ?>" name="id">
							<button type="submit" class="btn btn-primary">提交</button>
							<button type="reset" class="btn btn-default">取消</button>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /.col-->
	</div>
	<script type="text/javascript">
		$(function(){
		     var ue1 = UE.getEditor('editor1');
		     var ue2 = UE.getEditor('editor2');
		     var ue3 = UE.getEditor('editor3');
		});
	</script>

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