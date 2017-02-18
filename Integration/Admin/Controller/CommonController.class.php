<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {
  	public function _initialize(){
    //登陆检测
    if(empty($_SESSION['adminuser1'])){//没有登陆
      $this->redirect('admin/login/loadLogin');
    } 
  }
}