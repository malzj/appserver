<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 2015/9/21
 * Time: 17:19
 */

namespace Beiwanglu\Controller;

use Think\Page;
use Think\Controller;

class BeiwangluController extends Controller
{

    //用户列表
    public function index(){
        import('ORG.Util.Page');
        $cid=$_GET['cid'];
        $uid=$_GET['uid'];
        $companyappid=$_GET['companyappid'];
        $_SESSION['cid']=$cid;
        $_SESSION['uid']=$uid;
        $_SESSION['companyappid']=$companyappid;
        $beiwangluModel = M('Beiwanglu');

        $map = array();
        $map['cid'] = $cid;
        $map['uid'] = $uid;
        $map['companyappid'] = $companyappid;
        $count =  $beiwangluModel->where($map)->count();
        $Page = new Page($count,10);
        $show = $Page->show();
        $list = $beiwangluModel->where($map)->order('date_create desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    //显示用户
    public function show(){
        $beiwangluId = $_REQUEST["id"];
        $map = array();
        $map['id'] = $beiwangluId;

        $beiwangluModel = M('Beiwanglu');
        $beiwangluInfo = $beiwangluModel->where($map)->find();
        $this->assign('beiwangluInfo',$beiwangluInfo);
         //var_dump($beiwangluInfo);

      $this->display();
    }
    public function beiwangluDelete(){
        $beiwangluId = $_REQUEST["id"];
        $map = array();
        $map['id'] = $beiwangluId;

        $beiwangluModel = M('Beiwanglu');
        $is = $beiwangluModel->where($map)->delete();
        if($is){
            $this->success('操作成功！',U('Beiwanglu/index',array('cid'=>$_SESSION['cid'],'uid'=>$_SESSION['uid'],'companyappid'=>$_SESSION['companyappid'])));
        }
    }
    //添加用户
    public function beiwangluAdd(){
        if(IS_POST){
            $beiwanglurModel = M('Beiwanglu');
            $data = array();
            $data['cid']=$_SESSION['cid'];
            $data['uid'] = $_SESSION['uid'];
            $data['companyappid'] =$_SESSION['companyappid'];

            $data['title'] = $_POST['title'];
            $data['content'] = $_POST['content'];
            $data['date_create'] = date('Y-m-d',time());

            $id = $beiwanglurModel->add($data);
            if($id){
                $this->success('操作成功！',U('Beiwanglu/index',array('cid'=>$_SESSION['cid'],'uid'=>$_SESSION['uid'],'companyappid'=>$_SESSION['companyappid'])));
            }
        }
    }
    public function update(){
        $beiwangluId = $_REQUEST["id"];
        $map = array();
        $map['id'] = $beiwangluId;

        $beiwangluModel = M('Beiwanglu');
        $beiwangluInfo = $beiwangluModel->where($map)->find();
        $this->assign('beiwangluInfo',$beiwangluInfo);
        //var_dump($beiwangluInfo);

        $this->display();
    }
    //编辑用户
    public function beiwangluEdit(){
        $beiwangluId =$_POST['id'];
//        var_dump($beiwangluId);
        $map = array();
        $map['id'] = $beiwangluId;

        $beiwangluModel = M('Beiwanglu');
        $beiwanglu = $beiwangluModel->where($map)->find();
//        var_dump($beiwanglu);
        if(!$beiwanglu){
            $this->error('获取数据失败！');
        }else {
            $beiwanglu['title'] = $_POST['title'];
            $beiwanglu['content'] = $_POST['content'];
            $is = $beiwangluModel->where($map)->data($beiwanglu)->save();
            if($is){
                $this->success('操作成功！',U('Beiwanglu/index',array('cid'=>$_SESSION['cid'],'uid'=>$_SESSION['uid'],'companyappid'=>$_SESSION['companyappid'])));
            }
        }
    }
    public function create(){
    $this->display();
    }
}