<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class LoginController extends Controller {
  	//登陆表单
  	public function loadLogin(){
  		$this->display();
  	}

  	//验证操作
  	public function dologin(){
      $rules = array(
          array('username','require','用户名不能为空！'),
          array('password','require','密码不能为空！'), 
      );
      $User = M("Users"); // 实例化User对象
      if (!$User->validate($rules)->create()){
           // 如果创建失败 表示验证没有通过 输出错误提示信息
            $this->redirect('Admin/Login/loadLogin');
      }else{
         $name = $User->where('username="'.$_POST['username'].'"')->find();
          if(!empty($name)){
            // 密码验证
           if(md5($_POST['password']) == $name['password']){
             $_SESSION['adminuser1']=$name;
            $this->redirect('Admin/User/index');
           }else{
            $this->redirect('Admin/Login/loadLogin');
           }
        }else{
          $this->redirect('Admin/Login/loadLogin');
        }
      }
    }

  	//退出
  	public function outlogin(){
  		unset($_SESSION['adminuser']);
  		$this->redirect('Admin/Login/loadLogin');
  	}
}