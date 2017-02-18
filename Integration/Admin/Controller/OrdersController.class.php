<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class OrdersController extends CommonController {
	/**
	 * 订单列表页面
	 */
    public function index(){
    	$Order = M('orders');
    	// 实例化分页对象
   		$count = $Order->count();//获取表中数据条数
   		$size = C('PAGE_SIZE');//获取分页的大小
   		$page = new Page($count,$size);
   		// 设置分页样式
   		$page->setConfig('prev','上一页');
   		$page->setConfig('next','下一页');
   		$res = $Order->limit($page->firstRow,$page->listRows)->select();
   		// 分配变量
   		$this->assign('res',$res);
   		// 输出分页连接
   		$this->assign('page',$page->show());
        $this->display();
    }

    /**
     * 订单详情
     */
    public function detail($id){
    	$details = M('order_detail');
    	// $res = $details->join('orders on order_detail.oid=orders.oid')->where('orders.oid='.$id)->select();
    	$res = $details->where('oid='.$id)->select();
    	foreach($res as $k=>$v){
    		$goods = M('goods');
    		$res1 = $goods->where('id='.$v['gid'])->find();
    		$res[$k]['goods'] = $res1;
    	}
    	$Order = M('orders');
   		$res1 = $Order->find($id);
    	// echo $details->_SQL();
    	// dump($res1);exit;
    	$this->assign('res',$res);
    	$this->assign('res1',$res1);
    	$this->display();
    }

    /**
   * 修改商品状态
   */
   public function send($oid)
    {
      // dump($_GET['oid']);exit;
        $id = $_GET['oid'];
        $Goods = M('orders');
        $res = $Goods->field('status')->find($id);
        $status = $res['status'];
        if($status==1){
          $data['status'] = '2';
            $res = $Goods->where('oid='.$id)->save($data);
            $this->success('商品已发货');
        }else{
            $data['status'] = '4';
            $res = $Goods->where('oid='.$id)->save($data);
            $this->success('订单完成');
        }
    }
    
}