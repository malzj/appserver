<?php
namespace Front\Controller;
use Think\Controller;
use Think\Page;

/**
 * Created by PhpStorm.
 * User: malmemeda
 * Date: 2015/9/25
 * Time: 20:01
 */
class FrontController extends Controller{
    public  function index(){

        $xinxi=$_REQUEST['xinxi'];
        $name = iconv("gbk","utf-8",$xinxi);
//    $xinxi='��û��Ȩ�޵�½��̨����';
        $this->assign('xinxi',$name);
        $this->display();
    }
    public function login(){

        if($_POST){
            header("Content-type:text/html;charset=utf-8");
            $username=$_POST['username'];
            $password=$_POST['password'];
            $map=array();
            $map['username']= $username;
            $map['password']= $password;
            $Dao=M('User');
            $user=$Dao->where($map)->find();
            if($user){
                if($user['role']=="公司管理"||$user['role']=="公司老板 "){
                    $_SESSION['user']=$user;
                    $this->redirect('Front/mokuailist');

                }else{
                    $this->redirect('Front/index', array('xinxi' => '您没有权限登陆系统'));
                }
            }else{
                $this->redirect('Front/index', array('xinxi' => '您输入的账号密码有误'));
            }

        }
    }
    public function mokuailist(){
        $user=$_SESSION['user'];
        $date =date( 'Y-m-d',time());
        $Dao=M('Mokuai');
        $map=array();
        $map['begin_date']=array('elt',$date);
        $map['over_date']=array('egt',$date);
        $map['company_id']=$user['compang_id'];
        $count = $Dao->count();
        $Page =new Page($count,10);
        $show = $Page->show();
        $list = $Dao->where($map)->order('add_date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// ��ֵ���ݼ�
        $this->assign('page',$show);// ��ֵ��ҳ���
    }

    public function companyuserlist(){

    }
}