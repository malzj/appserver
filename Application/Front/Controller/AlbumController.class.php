<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 2015/10/26
 * Time: 10:38
 */
namespace Front\Controller;
use Think\Controller;
use Think\Page;
class AlbumController extends Controller{
    //相册部分开始
    public function albumList(){
        import('ORG.Util.Page');
        $user=$_SESSION['user'];
        $company_id=$user['company_id'];
        $user_id=$user['id'];
        $mokuai_id=$_GET['mokuai_id'];

        $albumModel = M('Album');

        $map = array();
        $map['company_id'] = $company_id;
        $map['user_id'] = $user_id;
        $map['mokuai_id'] = $mokuai_id;
        $count =  $albumModel->where($map)->count();
        $Page = new Page($count,20);
        $show = $Page->show();
        $list = $albumModel->where($map)->order('add_date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $list = $albumModel->where($map)->order('add_date desc')->select();
        $this->assign('mokuai_id',$mokuai_id);
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }
    public function albumUpload(){
        $mokuai_id=$_POST['mokuai_id'];

        $sign = $_POST["sign"];
        $albumId = $_POST["id"];
        if (!empty($_FILES)) {
            //图片上传设置

            $config = array(
//                'maxSize'    =>    9145728,
                'savePath'   =>    'Public/weixinapp/upload/',
                'rootPath'  =>     './',
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
                'autoSub'      =>      false
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload($_FILES);

            //判断是否有图
            if($images){
                $rs['name']=$images['file1']['savename'];
                $rs['msg']=true;
                if($sign=='create') {
                    $this->redirect('Album/albumCreate', array('mokuai_id'=>$mokuai_id,'msg' => $rs['msg'], 'name' => $rs['name']));
                }else if($sign=='edit') {
                    $this->redirect('Album/albumEdit' , array('mokuai_id'=>$mokuai_id,'id'=> $albumId,'msg' => $rs['msg'], 'name' => $rs['name']));
                }else{
                    $this->redirect('Album/pictureCreate', array('mokuai_id'=>$mokuai_id,'id'=> $albumId,'msg' => $rs['msg'], 'name' => $rs['name']));
                }}
            else{
                $this->error($upload->getError());//获取失败信息
            }
        }
    }
    public function albumAdd(){

        if(IS_POST){
            $albumModel = M('Album');
            $data = array();
            $user=$_SESSION['user'];
            $user_id=$user['id'];
            $company_id=$user['company_id'];
            $mokuai_id=$_POST['mokuai_id'];

            $data['company_id']=$company_id;
            $data['user_id'] = $user_id;
            $data['mokuai_id'] =$mokuai_id;

            $data['title'] = $_POST['title'];
            $data['content'] = $_POST['content'];
            $data['fengmian'] = $_POST['fengmian'];
            $data['add_date'] = date('Y-m-d H:i:s',time());

            $id = $albumModel->add($data);
            if($id){
                $this->redirect('Album/albumList',array('mokuai_id'=>$mokuai_id));
            }
        }
    }
    public function albumShow(){
        $mokuai_id=$_REQUEST['mokuai_id'];
        $albumId = $_REQUEST["id"];
        $map = array();
        $map['album_id'] = $albumId;

        $pictureModel = M('Picture');
        $pictureList = $pictureModel->where($map)->select();

        $this->assign('pictureList',$pictureList);
        $this->assign('albumId',$albumId);
        $this->assign('mokuai_id',$mokuai_id);
        $this->display();
    }
    public function albumEdit(){
        $albumId = $_REQUEST["id"];
        $mokuai_id=$_REQUEST['mokuai_id'];
        $map = array();
        $map['id'] = $albumId;

        $albumModel = M('Album');
        $albumInfo = $albumModel->where($map)->find();
        $this->assign('albumInfo',$albumInfo);
        $this->assign('mokuai_id',$mokuai_id);
//        var_dump($albumInfo);
//        return;
        $this->display();
    }
    public function albumUpdate(){
        $mokuai_id=$_POST['mokuai_id'];
//        var_dump($mokuai_id);
//        return;
        $albumId =$_POST['id'];
        $map = array();
        $map['id'] = $albumId;

        $albumModel = M('Album');
        $album = $albumModel->where($map)->find();
//        var_dump($beiwanglu);
        if(!$album){
            $this->error('获取数据失败！');
        }else {
            $album['title'] = $_POST['title'];
            $album['content'] = $_POST['content'];
            $album=$_POST;
            $is = $albumModel->where($map)->data($album)->save();
            if($is){
                $this->redirect('Album/albumList',array('mokuai_id'=>$mokuai_id));
            }
        }
    }
    public function albumDelete(){
        $albumId = $_REQUEST["id"];
        $user=$_SESSION['user'];
        $user_id=$user['id'];
        $company_id=$user['company_id'];
        $mokuai_id=$_REQUEST['mokuai_id'];
        $map = array();
        $map['id'] = $albumId;
        $map1 = array();
        $map1['album_id'] = $albumId;
        $albumModel = M('Album');
        $pictureModel = M('Picture');
        $is = $albumModel->where($map)->delete();
        $id= $pictureModel->where($map1)->delete();
        if($is>0&&id>=0){
            $this->success('操作成功！',U('Album/albumList',array('mokuai_id'=>$mokuai_id)));
        }
    }
    public function albumCreate(){
        $mokuai_id=$_GET['mokuai_id'];
        $this->assign('mokuai_id',$mokuai_id);
        $this->display();
    }
    //相册部分结束
    //相册图片部分

    public function pictureShow(){
        $pictureId = $_REQUEST["id"];
        $mokuai_id=$_REQUEST['mokuai_id'];
        $map = array();
        $map['id'] = $pictureId;

        $pictureModel = M('Picture');
        $pictureInfo = $pictureModel->where($map)->find();
        if($pictureInfo){
            $map1 = array();
            $map1['id'] = $pictureInfo['album_id'];
            $albumModel = M('Album');
            $albumInfo = $albumModel->where($map1)->find();
        }
//        var_dump($albumInfo);
//        exit;
        $this->assign('pictureInfo',$pictureInfo);
        $this->assign('albumInfo',$albumInfo);
        $this->assign('mokuai_id',$mokuai_id);
        $this->display();
    }
    public function pictureCreate(){
        $albumId = $_REQUEST["id"];
        $mokuai_id=$_REQUEST['mokuai_id'];
        $this->assign('albumId',$albumId);
        $this->assign('mokuai_id',$mokuai_id);
        $this->display();
    }
    public function pictureAdd(){
        $mokuai_id=$_POST['mokuai_id'];

        $albumId=$_POST["id"];

        $data = array();
        $user=$_SESSION['user'];
        $company_id=$user['company_id'];
        $user_id=$user['id'];
        $data['company_id']=$company_id;
        $data['user_id'] = $user_id;
        $data['mokuai_id'] =$mokuai_id;
        $data['album_id'] = $albumId;
        $data['introduction'] = $_POST['introduction'];
        $data['img'] = $_POST['img'];

        $data['add_date'] = date('Y-m-d H:i:s',time());
        $pictureModel= M('Picture');
        $id = $pictureModel->add($data);
        if($id){
            $this->redirect('Album/albumShow',array('id'=>$albumId,'mokuai_id'=>$mokuai_id));
        }
    }
    public function pictureEdit(){
        $pictureId = $_REQUEST["id"];
        $map = array();
        $map['id'] = $pictureId;

        $pictureModel = M('Picture');
        $pictureInfo = $pictureModel->where($map)->find();
        $this->assign('pictureInfo',$pictureInfo);

        $this->display();
    }
    public function pictureUpdate(){
        $pictureId = $_REQUEST["id"];

        $map = array();
        $map['id'] = $pictureId;

        $pictureModel = M('Picture');
        $pictureInfo = $pictureModel->where($map)->find();
        if(!$pictureInfo){
            $this->error('获取数据失败！');
        }else {
            $pictureInfo=$_POST;
            $is = $pictureModel->where($map)->data($pictureInfo)->save();
            if($is){
                $this->redirect('Album/albumShow',array('id'=>$_SESSION['company_id']));
            }
        }
    }
    public function pictureDelete(){
        $pictureId = $_REQUEST["id"];
        $mokuai_id=$_REQUEST['mokuai_id'];
        $map = array();
        $map['id'] = $pictureId;

        $pictureModel = M('Picture');
        $picture=$pictureModel->where($map)->find();
        $map1 = array();
        $map1['id'] = $picture['album_id'];
        $is = $pictureModel->where($map)->delete();
        $albumMode=M('Album');
        $album=$albumMode->where($map1)->find();
        if($is){
            $this->redirect('Album/albumShow',array('id'=>$album['id'],'mokuai_id'=>$mokuai_id));
        }
    }
//相册图片部分结束
//相册图片评论部分
    public function replyAdd(){}
    public function replyDelete(){}
//相册图片评论部分结束
}