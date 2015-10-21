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
        $map['company_id']=$user['company_id'];
        $count = $Dao->count();
        $Page =new Page($count,10);
        $show = $Page->show();
        $list = $Dao->where($map)->order('add_date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        for($i=0;$i<count($list);$i++){
            $id=$list[$i]['gongneng_id'];
            $business = M('Gongneng') ->where('id = %d',$id)->find();
            $list[$i]['url']=$business['url'];
            $list[$i]['cid']=$user['company_id'];
        }
        $this->assign('list',$list);// ��ֵ���ݼ�
        $this->assign('page',$show);// ��ֵ��ҳ���
        $this->display();
    }
    public function memberlist(){
        $user=$_SESSION['user'];
        $mokuai_id=$_REQUEST['mokuai_id'];
        $date =date( 'Y-m-d',time());
        $Dao=M('Member');
        $map=array();
        $map['mokuai_id']=$mokuai_id;
        $map['company_id']=$user['company_id'];
        $count = $Dao->count();
        $Page =new Page($count,10);
        $show = $Page->show();
        $list = $Dao->where($map)->order('add_date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// ��ֵ���ݼ�
        $this->assign('mokuai_id',$mokuai_id);// ��ֵ���ݼ�
        $this->assign('page',$show);// ��ֵ��ҳ���
        $this->display();
    }
    public function membercreate(){
        $mokuai_id=$_REQUEST['mokuai_id'];
        $this->assign('mokuai_id',$mokuai_id);// ��ֵ���ݼ�
        $this->display();
    }
    public function memberadd(){
        $user=$_SESSION['user'];
        if(IS_POST){
            header("Content-Type:text/html; charset=utf-8");
            $UserModel = M('Member');
            $data = array();
            $data['name']=$_POST['name'];
            $data['jifen']=$_POST['jifen'];
            $data['mokuai_id'] = $_POST['mokuai_id'];
            $data['company_id'] =$user['company_id'];
            $data['add_date'] = date('Y-m-d',time());
            $id = $UserModel->add($data);
            if($id){
                $this->redirect('Front/memberlist','mokuai_id='. $_POST['mokuai_id']);
            }
        }
    }
    public function membershow(){
        $id=$_REQUEST['id'];
        $Dao = M("Member");
        $business = $Dao ->where('id = %d',$id)->find();
        if (!$business) {
            alert('error', L('THERE_IS_NO_BUSINESS_OPPORTUNITIES'),$_SERVER['HTTP_REFERER']);
        }
        $this->assign('mokuai_id',$business['mokuai_id']);// ��ֵ���ݼ�
        $this->business = $business;
        $this->display();
    }
    public  function memberupdate(){
        if(IS_POST){
            $id=$_POST['id'];

            header("Content-Type:text/html; charset=utf-8");
            $Dao = M("Member");
            $business = $Dao ->where('id = %d',$id)->find();
            $data["name"] = $_POST["name"];
            $data["jifen"] = $_POST["jifen"];
            $Dao->where('id='.$id)->save($data);
            if($id){
                $this->redirect('Front/memberlist','mokuai_id='. $business['mokuai_id']);
            }
        }
    }
    public  function memberdelete(){
        $id=$_REQUEST['id'];
        $Dao = M("Member");
        $business = $Dao ->where('id = %d',$id)->find();
        $rusult= $Dao->where('id='.$id)->delete();
        if($rusult){
            $this->redirect('Front/memberlist','mokuai_id='. $business['mokuai_id']);
        }
//        $this->display();
    }

    public function companyuserlist(){
        $user=$_SESSION['user'];
        $mokuai_id=$_REQUEST['mokuai_id'];
        $date =date( 'Y-m-d',time());
        $Dao=M('Companyuser');
        $map=array();
        $map['mokuai_id']=$mokuai_id;
        $map['company_id']=$user['company_id'];
        $count = $Dao->count();
        $Page =new Page($count,10);
        $show = $Page->show();
        $list = $Dao->where($map)->order('add_date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// ��ֵ���ݼ�
        $this->assign('mokuai_id',$mokuai_id);// ��ֵ���ݼ�
        $this->assign('page',$show);// ��ֵ��ҳ���
        $this->display();
    }


}