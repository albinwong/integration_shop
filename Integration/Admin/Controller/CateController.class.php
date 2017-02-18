<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class CateController extends CommonController {
	/**
	 * 添加子分类
	 */
	public function add(){
		$Cate = M('cates');
		if(!empty($_GET['pid'])){
			$res = $Cate->where('id='.$_GET['pid'])->select();
		}else{
			$res = $Cate->select();
		}
		foreach($res as $k=>$v){
            $total = count(explode(',',$v['path']))-1;
            if($total>0){
                $res[$k]['name'] = str_repeat('&nbsp;', 10*$total). '|-----'.$v['name'];
            }
	    }
		$this->assign('res',$res);
		$this->display();
	}

	/**
	 * 添加总分类
	 */
	public function adds(){
		$Cate = M('cates');
		if(!empty($_GET['pid'])){
			$res = $Cate->field("*,concat(path,',',id) as npath")->where('id='.$_GET['pid'])->order('npath')->select();
		}else{
			$res = $Cate->field("*,concat(path,',',id) as npath")->order('npath')->select();
		}
		foreach($res as $k=>$v){
            $total = count(explode(',',$v['path']))-1;
            if($total>0){
                $res[$k]['name'] = str_repeat('&nbsp;', 10*$total). '|-----'.$v['name'];
            }
	    }
		$this->assign('res',$res);
		$this->display();
	}

	/**
	 * 分类添加验证
	 */
	public function insert(){
		//进行表单验证
		$rules = array(
			array('name','require','分类名称不能为空'),
			array('name','','分类名称已存在',0,'unique'),
		);
		$Cate = M('cates');
		if(!$Cate->validate($rules)->create()){
			// 如果创建失败 表示验证没有通过 输出错误提示信息
		     exit($Cate->getError());
		 }else{
		 	// 提取内容
		 	$data = $_POST;
		 	//判断是否为顶级分类
	        if($data['pid'] == '0'){
	            $data['path'] = '0';
	        }else{   //如果不是顶级分类
	            //读取父级分类的信息
	            $p = $Cate->where('id='.$data['pid'])->find();
	            $data['path'] = $p['path'].','.$p['id'];
	        }
	        // logo处理
			$upload = new \Think\Upload();//实例化上传类
	 		$upload->maxSize = 3145728;//设置附件上传大小
	 		$upload->exts = array('jpg','gif','png','jpeg');//设置附件上传类型
	 		$upload->rootPath = './Public/Uploads/cate/';//设置附件上传目录
	 		$upload->saveName = date('YmdHis').rand(1000,9999); 
	 		$upload->autoSub = false;//拒绝子目录创建
	 		// 上传文件
	 		$info = $upload->Upload();
	 		if($info){
	 			//上传成功
	 			$data['logo'] = $info['pic']['savename'];
	 		}
	        $res = $Cate->data($data)->add();
	        //提醒
	        if($res){
	        	$this->success('添加成功',U('admin/cate/index'),1);
	        }else{
	        	$this->error('添加失败');
	        }
		 }
	}

	/**
	 * 分类列表页面
	 */
    public function index(){
    	$Cate = M('cates');
   		$res = $Cate->field("*,concat(path,',',id) as npath")->order('npath')->select();
   		foreach($res as $k=>$v){
            $total = count(explode(',',$v['path']))-1;
            if($total>0){
                $res[$k]['name'] = str_repeat('&nbsp;', 10*$total). '|-----'.$v['name'];
            }
	    }
   		// 分配变量
   		$this->assign('res',$res);
        $this->display();
    }

    /**
     * 分页修改
     */
    public function edit($id){
 		$Cate = M('cates');
 		$res = $Cate->find($id);
 		// dump($res['pid']);exit;
 		$this->assign('vo',$res);
 		$this->display();
 	}

 	/**
     * 分类修改验证
     */
 	public function update(){
 		//进行表单验证
		$rules = array(
			array('name','require','新分类名称不能为空！'), 
			array('name','/^\S+$/','新分类名称格式不正确',2,'regex'),
		);
 		$Cate = M('cates');
		if (!$Cate->validate($rules)->create()){
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     exit($Cate->getError());
		}else{
			 // 验证通过 可以进行其他数据操作
			$data = $_POST;
			$res = $Cate->save($data); 
			if($res){
	 			//成功跳转
	 			$this->success('修改成功',U('admin/cate/index'),5);
			}else{
	 			//失败跳转
	 			$this->error('修改失败');
			}
		}
 		
 	}

 	/**
 	 * 分类删除
 	 */
 	public function delete(){
 		$Cate = M('cates');
 		//判断条件一 该分类下不能有子类
			// 查询要删除的pid是否等于父级的tid
 		$res1 = $Cate->where('pid='.$_GET['id'])->find();
 		if(!empty($res1)){
 			$this->error('该分类下面有子分类,不能删除');
 			return false;
 		}
 		//判断条件二 该分类不能有商品
 		$Goods = M('goods');
 		$res2 = $Goods->where('tid='.$_GET['id'])->find();
 		if(!empty($res2)){
 			$this->error('该分类下有商品,删除失败');
 			return false;
 		}
 		$res = $Cate->where($_GET)->delete();
 		if($res){
 			// 删除成功
 			$this->success('删除成功',U('admin/cate/index'),5);
 		}else{
 			//修改失败
 			$this->error('删除失败');
 		}
 	}


}