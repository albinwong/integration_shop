<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
use Think\DB;
class IndexController extends Controller {
    public function _empty(){
        redirect('/Home/index/index');
    }

    /**
     * 商品列表页
     */
    public function index(){
        //读取分类
        $cate = M('cates');
        $pm_cate = $cate->where('id='.$_GET['id'])->find();
        $cates = $cate->where("pid=0")->select();
        $this->assign('zx',$pm_cate);
        $this->assign('cate',$cates);
        $this->display();
    }

    /**
     * 商品详情
     */
    public function detail($id = 0){
        // 根据id读取商品详细信息
        $one = M('goods');
        $goods = $one->where('id='.$_GET['id'])->find();
        $this->assign('goods',$goods);
        $this->display();
    }



    public function ajax(){
        $mod = M('goods');
        $res = $mod->where('repertory >= 0 and pid="'.$_POST['pid'].'"')->select();
        if(empty($res)){
            echo 1;
        }else{
            echo json_encode($res);
        }
    }

    /**
     * 添加购物车
     */
    public function addCart(){
        // dump($_GET);exit;
        $goods = M('goods');
        //判断购物车中是否有这种商品
        if(empty($_SESSION['cart'][$_GET['gid']])){
            $cart = $goods->where('id='.$_GET['gid'])->find();
            //1.如果没有,从数据库中取出信息
            $_SESSION['cart'][$_GET['gid']] = $cart;
            
            //2.然后添加一项(数量)
            $_SESSION['cart'][$_GET['gid']]['count'] = 1;
        }else{
            //如果购物车中有这种商品,那么数量自动加1
            $_SESSION['cart'][$_GET['gid']]['count'] += 1;
        }
        // dump($_SESSION['cart']);exit;
        redirect("commit");
    }

    /**
     * 购物车显示
     */
    public function commit(){
        if(!empty($_SESSION['cart'])){
            //购物车中有商品时
            $cate = M('cates');
            foreach($_SESSION['cart'] as $k=>$v){
                $cates = $cate->field('pid')->where('id='.$v['pid'])->select();
                foreach($cates as $kk=>$vv){
                    $cate_fid = $cate->field('id,name,logo')->where('id='.$vv['pid'])->find();
                    $_SESSION[' cart'][$k]['cate'] = $cate_fid;
                }
                $_SESSION['cart'][$k]['zyhj'] = $v['count']*$v['fprice'];
                $_SESSION['cart'][$k]['zjf'] = $v['count']*$v['pv'];
            }
            // dump($_SESSION['cart']);exit;
            $this->assign('cart',$_SESSION['cart']);
        }
        $this->display();
    }


    /**
     * 确认订单
     */
    public function doCommit(){
        if(empty($_POST['uid'])){
            redirect('http://www.huimengtongbao.com:8081/hmtb/html/index/index.html', 5, '请登录...');
        }else{
            //数据库配置1
            $model = M('');
            $res1 = $model->db(1,"mysql://root:Admin@123@rm-2zed31rxvrvg5sg4so.mysql.rds.aliyuncs.com:3306/huibao")->query("select points from member where user_name = ".$_POST['uid']);
            $points = (float)($res1[0]['points']);
            if($points < $_POST['jfzs']){
                redirect('index',5,'通报币不足,暂不能购买!');
            }else{
                $res2 = $model->db(1,"mysql://root:Admin@123@rm-2zed31rxvrvg5sg4so.mysql.rds.aliyuncs.com:3306/huibao")->query("update member set points = points - ".$_POST['jfzs']." where user_name = ".$_POST['uid']);
                if(!$res2){
                    $model->db(0);
                    $tmp = date('YmdHis').rand(1000,9999);
                    //订单主表
                    $data['oid'] = $tmp;
                    $data['status'] = 1;//订单状态
                    $data['uid'] = $_POST['uid'];
                    $data['otime'] = time();
                    $data['opv'] = $_POST['jfzs'];//总积分
                    $order = M('orders');
                    $res = $order->add($data);
                    if($res){
                        foreach($_SESSION['cart'] as $k=>$v){
                            //dump($_SESSION['cart']);//exit;
                            $data1['oid'] = $tmp;
                            $data1['gid'] = $_SESSION['cart'][$k]['id'];
                            $data1['buycnt'] = $_SESSION['cart'][$k]['count'];
                            $data1['buypv'] = $_SESSION['cart'][$k]['zjf'];
                            $order1 = M('order_detail');
                            $res_detail = $order1->add($data1);
                            unset($data1);
                            $model1 = M('');
                           $cnt = $model1 ->query("update goods set repertory =repertory -{$v['count']} where gid={$k}");
                           $scnt = $model1 ->query("update goods set sales =sales +{$v['count']} where gid={$k}");
                        } 
                    }
                    if($res && !$res2){
                        unset($_SESSION['cart']);
                        redirect('index',3,'支付成功...');
                    }else{
                        $this->error('支付失败');
                    }
                }
            }
        }
        
    }

}