<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 2015/10/9
 * Time: 10:59
 */

namespace Album\Controller;

use Think\Page;
use Think\Controller;

class AlbumController extends Controller
{
//    相册部分方法
    public function albumList(){
        import('ORG.Util.Page');
        $company_id=$_GET['company_id'];
        $user_id=$_GET['user_id'];
        $app_id=$_GET['app_id'];
        $_SESSION['company_id']=$company_id;
        $_SESSION['user_id']=$user_id;
        $_SESSION['app_id']=$app_id;
        $albumModel = M('Album');

        $map = array();
        $map['company_id'] = $company_id;
        $map['user_id'] = $user_id;
        $map['app_id'] = $app_id;
        $count =  $albumModel->where($map)->count();
        $Page = new Page($count,10);
        $show = $Page->show();
//        $list = $albumModel->where($map)->order('date_create desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list = $albumModel->where($map)->order('date_create desc')->select();
        $this->assign('list',$list);
//        $this->assign('page',$show);
        $this->display();
    }
    public function albumAdd(){
        if(IS_POST){
            $albumModel = M('Album');
            $data = array();
            $data['company_id']=$_SESSION['company_id'];
            $data['user_id'] = $_SESSION['user_id'];
            $data['app_id'] =$_SESSION['app_id'];

            $data['title'] = $_POST['title'];
            $data['content'] = $_POST['content'];

            $data['add_date'] = date('Y-m-d',time());

            $id = $albumModel->add($data);
            if($id){
                $this->success('操作成功！',U('Beiwanglu/index',array('cid'=>$_SESSION['cid'],'uid'=>$_SESSION['uid'],'companyappid'=>$_SESSION['companyappid'])));
            }
        }
    }
    public function albumDelete(){
        $albumId = $_REQUEST["id"];
        $map = array();
        $map['id'] = $albumId;

        $albumModel = M('Album');
        $is = $albumModel->where($map)->delete();
        if($is){
            $this->success('操作成功！',U('Album/albumList',array('company_id'=>$_SESSION['company_id'],'user_id'=>$_SESSION['user_id'],'app_id'=>$_SESSION['app_id'])));
        }
    }
    public function albumShow(){
        $albumId = $_REQUEST["id"];
        $map = array();
        $map['id'] = $albumId;

        $albumModel = M('Album');
        $albumInfo = $albumModel->where($map)->find();
        $this->assign('beiwangluInfo',$albumInfo);
        $this->display();
    }
    public function albumModify(){
        $albumId = $_REQUEST["id"];
        $map = array();
        $map['id'] = $albumId;

        $albumModel = M('Album');
        $albumInfo = $albumModel->where($map)->find();
        $this->assign('beiwangluInfo',$albumInfo);
        $this->display();
    }
    public function albumUpdate(){
        $albumId =$_POST['id'];
        $map = array();
        $map['id'] = $albumId;

        $albumModel = M('Album');
        $album = $albumModel->where($map)->find();
        if(!$album){
            $this->error('获取数据失败！');
        }else {
            $album['title'] = $_POST['title'];
            $album['content'] = $_POST['content'];
            $is = $albumModel->where($map)->data($album)->save();
            if($is){
                $this->success('操作成功！',U('Album/albumList',array('company_id'=>$_SESSION['company_id'],'user_id'=>$_SESSION['user_id'],'app_id'=>$_SESSION['app_id'])));
            }
        }
    }



    //图片部分方法
    public function pictureList(){

    }
    public function pictureAdd(){

    }
    public function pictureDelete(){

    }
    public function pictureShow(){

    }
    public function pictureModify(){

    }
    public function pictureUpdate(){

    }


    //评论部分方法
    public function replyAdd(){

    }
    public function replyDelete(){

    }
}