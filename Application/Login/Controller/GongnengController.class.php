<?php
/**
 * Created by PhpStorm.
 * User: malmemeda
 * Date: 2015/9/24
 * Time: 13:25
 */

namespace Login\Controller;


use Think\Controller;
use Think\Page;

class GongnengController extends Controller
{
    public  function gongnenglist(){
        $Dao = M("Gongneng");
        $count = $Dao->count();
        $Page =new Page($count,10);
        $show = $Page->show();
        $list = $Dao->order('addDate desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }
    public  function gongnengcreate(){
        $this->display();
    }
    public  function gongnengadd(){
        if(IS_POST){
            header("Content-Type:text/html; charset=utf-8");
            $Dao = M("Gongneng");
            $data["name"] = $_POST["name"];
            $data["msg"] = $_POST["msg"];
            $data["url"] = $_POST["url"];
            $data["addDate"] =date( 'Y-m-d',time());
            $id=$Dao->add($data);
            if($id){
                $this->redirect('gongneng/gongnenglist');
            }
        }
    }
    public  function gongnengshow(){
        $id=$_REQUEST['id'];
        $Dao = M("Gongneng");
        $business = $Dao ->where('id = %d',$id)->find();
        if (!$business) {
            alert('error', L('THERE_IS_NO_BUSINESS_OPPORTUNITIES'),$_SERVER['HTTP_REFERER']);
        }
        $this->business = $business;
        $this->display();
    }
    public  function gongnengupdate(){
        if(IS_POST){
            $id=$_POST['id'];
            header("Content-Type:text/html; charset=utf-8");
            $Dao = M("Gongneng");
            $data["name"] = $_POST["name"];
            $data["msg"] = $_POST["msg"];
            $Dao->where('id='.$id)->save($data);
            if($id){
                $this->redirect('gongneng/gongnenglist');
            }
        }
    }
    public  function gongnengdelete(){
        $id=$_REQUEST['id'];
        $Dao = M("Gongneng");
        $rusult= $Dao->where('id='.$id)->delete();
        if($rusult){
            $this->redirect('gongneng/gongnenglist');
        }
        $this->display();
    }
}