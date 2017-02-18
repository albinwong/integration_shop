<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class GoodsController extends CommonController {
	/**
	 * 商品添加
	 */
	public function add(){
		$Cate = M('cates');
		$res = $Cate->field("*,concat(path,',',id) as npath")->order('npath')->select();
		foreach($res as $k=>$v){
            $total = count(explode(',',$v['path']))-1;
            $res[$k]['name'] = str_repeat('&nbsp;', 7*$total). '|-------'.$v['name'];
	    }
		$this->assign('res',$res);
		$this->display();
	}

	/**
	 * 用户添加验证
	 */
	public function insert(){
		dump($_POST);exit;
		// 进行表单验证
		$rules = array(
			array('gname','require','商品名称不能为空！'),
			array('price','require','商品正价不能为空！'), 
		);

		$Goods = M("goods"); // 实例化User对象
		if (!$Goods->validate($rules)->create()){
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     exit($Goods->getError());
		}else{
		     // 验证通过 可以进行其他数据操作
			$data = $_POST;
			// 头像处理
			$upload = new \Think\Upload();//实例化上传类
	 		$upload->maxSize = 3145728;//设置附件上传大小
	 		$upload->exts = array('jpg','gif','png','jpeg');//设置附件上传类型
	 		$upload->rootPath = './Public/Uploads/goods/';//设置附件上传目录
	 		$upload->autoSub = false;//拒绝子目录创建
	 		// 上传文件
	 		$info = $upload->upload();
	 		if($info){
	 			//上传成功
	 			$data['pic'] = $info['pic']['savename'];
	 		}
	 		// dump($data);exit;
			$res = $Goods->data($data)->add(); 
			if($res){
	 			//成功跳转
	 			$this->success('添加成功',U('admin/goods/index'),1);
			}else{
	 			//失败跳转
	 			$this->error('添加失败');
			}
		}
	}

	/**
	 * 用户列表页面
	 */
    public function index(){
    	$Goods = M('goods');
    	// 实例化分页对象
   		$count = $Goods->count();//获取表中数据条数
   		$size = C('PAGE_SIZE');//获取分页的大小
   		$page = new Page($count,$size);
   		// 设置分页样式
   		$page->setConfig('prev','上一页');
   		$page->setConfig('next','下一页');
   		$res = $Goods->limit($page->firstRow,$page->listRows)->select();
   		// 分配变量
   		$this->assign('res',$res);
   		// 输出分页连接
   		$this->assign('page',$page->show());
        $this->display();
    }

    /**
     * 商品修改
     */
    public function edit($id){
 		$Goods = M('goods');
 		$res = $Goods->find($id);
 		// dump($res);exit;
 		$Cate = M('cates');
 		$res1 = $Cate->where('id='.$res['pid'])->find();
 		$res1 = $res1['id'];
    	$Cate = M('cates');
		$res2 = $Cate->field("*,concat(path,',',id) as npath")->order('npath')->select();
		foreach($res2 as $k=>$v){
            $total = count(explode(',',$v['path']))-1;
            $res2[$k]['name'] = str_repeat('&nbsp;', 7*$total). '|-------'.$v['name'];
	    }
	    // dump($res);exit;
 		$this->assign('res',$res);
 		$this->assign('res1',$res1);
 		$this->assign('res2',$res2);
 		$this->display();
 	}

 	/**
     * 商品修改验证
     */
 	public function update(){
 		//进行表单验证
		$rules = array(
			array('gname','require','商品名称不能为空！'),
			array('price','require','商品正价不能为空！'), 
		);
 		$Goods = M('goods');
		if (!$Goods->validate($rules)->create()){
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     exit($Goods->getError());
		}else{
			 // 验证通过 可以进行其他数据操作
			$data = $_POST;
			// 头像处理
			$upload = new \Think\Upload();//实例化上传类
	 		// $upload->maxSize = 3145728;//设置附件上传大小
	 		$upload->exts = array('jpg','gif','png','jpeg');//设置附件上传类型
	 		$upload->rootPath = './Public/Uploads/goods/';//设置附件上传目录
	 		$upload->autoSub = false;//拒绝子目录创建
	 		// 上传文件
	 		$info = $upload->upload();
	 		if($info){
	 			//上传成功
	 			$data['pic'] = $info['pic']['savename'];
	 		}
	 		// dump($data);exit;
			$res = $Goods->save($data); 
			// echo $Goods->_SQL();
			// dump($res);exit;
			if($res){
	 			//成功跳转
	 			$this->success('修改成功',U('admin/goods/index'),1);
			}else{
	 			//失败跳转
	 			$this->error('修改失败');
			}
		}
 		
 	}

 	/**
 	 * 用户删除
 	 */
 	public function delete(){
 		$Goods = M('goods');
 		$res = $Goods->where($_GET)->delete();
 		if($res){
 			// 删除成功
 			$this->success('删除成功',U('admin/goods/index'),1);
 		}else{
 			//修改失败
 			$this->error('删除失败');
 		}
 	}


 	/**
 	 * 修改商品状态
 	 */
 	 public function status($id)
    {
        $id = $_GET['id'];
        $Goods = M('goods');
        $res = $Goods->field('status')->find($id);
        $status = $res['status'];
        if($status==0){
        	$data['status'] = '1';
            $res = $Goods->where('id='.$id)->save($data);
            $this->success('商品上架成功');
        }else{
            $data['status'] = '2';
            $res = $Goods->where('id='.$id)->save($data);
            $this->success('商品下架成功');
        }
    }



}