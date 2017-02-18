<?php 
	function getCateName($id)
	{
		if($id == 0){
			return '顶级分类';
		}
		//读取分类信息
		$Cate = M('cates');
		$info = $Cate->where('id='.$id)->find();
		//返回结果
		return $info['name'];
	}

	function getPname($id)
	{
		if($id==0){
			return '';
		}
		//读取分类信息
		$Cate = M('cates');
		$info = $Cate->where('id='.$id)->find();
		//返回结果
		return $info['name'];
	}

	function getGoodsStatus($id)
	{
		switch($id){
			case '0':return '新品';break;
			case '1':return '上架';break;
			default:return '下架';break;
		}
	}

	function getOrderStatus($id)
	{
		switch ($id) {
			case '0':return '待付款';break;
			case '1':return '待发货';break;
			case '2':return '待收货';break;
			default:return '订单完成';break;
		}
	}

	function getViewStatus($id){
		if($id == 0){
			return '显示';
		}else{
			return '不显示';
		}
	}

	
	function getAreaName($id)
	{
		$res = M('areas')->where('areaid='.$id)->find();
		
		return $res['areaname'];
	}
	
	function getUserAuth($id){
		switch ($id) {
			case '1':return '普通员工';break;
			case '2':return '主管';break;
			case '3':return '经理';break;
			case '4':return '管理员';break;
			default:return '超级管理员';break;
		}
	}


 ?>