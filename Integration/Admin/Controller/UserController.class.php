<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class UserController extends CommonController {
	/**
	 * 用户添加
	 */
	public function add(){
		$this->display();
	}

	/**
	 * 用户添加验证
	 */
	public function insert(){
		//进行表单验证
		$rules = array(
			array('username','require','用户名不能为空！'), 
			array('username','/^\w{2,18}$/','用户名格式不正确',2,'regex'),
			array('password','require','用户名不能为空！'),
			array('password','/^\S{6,20}$/','密码格式不正确',2,'regex'),
			array('repassword','password','两次密码不一致',0,'confirm'), 
			array('email','/^\w+@\w+\.\w+$/','邮箱格式不正确',0,'regex'), 
			array('email','','邮箱已存在',0,'unique'),
			array('phone','/^1[3-8]\d{9}$/','手机号格式不正确',0,'regex'), 
		);

		$User = M("users"); // 实例化User对象
		if (!$User->validate($rules)->create()){
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     exit($User->getError());
		}else{
		     // 验证通过 可以进行其他数据操作
			$data = $_POST;
			unset($data['repassword']); 
			//自动添加注册时间
    		$data['regtime'] = time();
    		//密码加密
			$data['password'] = md5($data['password']);
			$res = $User->data($data)->add(); 
			$key = $User->where('id='.$res)->find();
			$user_id = $key['id'];
			$datas = array();
			$datas['uid'] = $user_id;
			$datas['rid'] = $data["role"];
			$roles = M('user_role');
			$addRole = $roles->data($datas)->add();
			if($res && $addRole){
	 			//成功跳转
	 			$this->success('添加成功',U('Admin/User/index'),5);
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
    	$User = M('users');
    	// 实例化分页对象
   		$count = $User->count();//获取表中数据条数
   		$size = C('PAGE_SIZE');//获取分页的大小
   		$page = new Page($count,$size);
   		// 设置分页样式
   		$page->setConfig('prev','上一页');
   		$page->setConfig('next','下一页');
   		$res = $User->limit($page->firstRow,$page->listRows)->select();
   		// 分配变量
   		$this->assign('res',$res);
   		// 输出分页连接
   		$this->assign('page',$page->show());
        $this->display();
    }

    /**
     * 用户修改
     */
    public function edit($id){
 		$User = M('users');
 		$res = $User->find($id);
 		$this->assign('vo',$res);
 		$this->display();
 	}

 	/**
     * 用户验证
     */
 	public function update(){
 		// dump($_POST);exit;
 		//进行表单验证
		$rules = array(
			array('username','require','用户名不能为空！'), 
			array('username','/^\w{8,18}$/','用户名格式不正确',2,'regex'),
			array('email','/^\w+@\w+\.\w+$/','邮箱格式不正确',0,'regex'), 
			array('phone','/^1[3-8]\d{9}$/','手机号格式不正确',0,'regex'), 
		);
 		$User = M('users');
		if (!$User->validate($rules)->create()){
		     // 如果创建失败 表示验证没有通过 输出错误提示信息
		     exit($User->getError());
		}else{
			 // 验证通过 可以进行其他数据操作
			$data = $_POST;
			// 头像处理
			$upload = new \Think\Upload();//实例化上传类
	 		$upload->maxSize = 3145728;//设置附件上传大小
	 		$upload->exts = array('jpg','gif','png','jpeg');//设置附件上传类型
	 		$upload->rootPath = './Public/Uploads/user/';//设置附件上传目录
	 		$upload->autoSub = false;//拒绝子目录创建
	 		// 上传文件
	 		$info = $upload->upload();
	 		if($info){
	 			//上传成功
	 			$pic = $info['pic']['savename'];
	 			$data['pic'] = $pic;
	 		}
	 		// dump($data);exit;
			$res = $User->save($data);
			if($res){
	 			//成功跳转
	 			$this->success('修改成功',U('admin/user/index'),5);
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
 		$User = M('users');
 		$res = $User->where($_GET)->delete();
 		if($res){
 			// 删除成功
 			$this->success('删除成功',U('admin/user/index'),5);
 		}else{
 			//修改失败
 			$this->error('删除失败');
 		}
 	}
}