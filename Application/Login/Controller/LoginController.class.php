<?php
/**
 * Created by PhpStorm.
 * User: malmemeda
 * Date: 2015/9/25
 * Time: 11:09
 */

namespace Login\Controller;


use Think\Controller;
header("Content-type:text/html;charset=utf-8");
class LoginController extends Controller
{
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
                if($user['role']=="微宝后台管理"){
                    $this->redirect('User/userlist');
                }else{
                    $this->redirect('Login/index', array('xinxi' => '您没有权限登陆系统'));
                }
            }else{
                $this->redirect('Login/index', array('xinxi' => '您输入的账号密码有误'));
            }

        }
    }
}