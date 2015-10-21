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
                    $this->redirect('Front/albumCreate', array('mokuai_id'=>$mokuai_id,'msg' => $rs['msg'], 'name' => $rs['name']));
                }else if($sign=='edit') {
                    $this->redirect('Front/albumEdit' , array('mokuai_id'=>$mokuai_id,'id'=> $albumId,'msg' => $rs['msg'], 'name' => $rs['name']));
                }else{
                    $this->redirect('Front/pictureCreate', array('mokuai_id'=>$mokuai_id,'id'=> $albumId,'msg' => $rs['msg'], 'name' => $rs['name']));
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
                $this->redirect('Front/albumList',array('mokuai_id'=>$mokuai_id));
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
                $this->redirect('Front/albumList',array('mokuai_id'=>$mokuai_id));
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
            $this->success('操作成功！',U('Front/albumList',array('mokuai_id'=>$mokuai_id)));
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
            $this->redirect('Front/albumShow',array('id'=>$albumId,'mokuai_id'=>$mokuai_id));
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
                $this->redirect('Front/albumShow',array('id'=>$_SESSION['company_id']));
            }
        }
    }
    public function pictureDelete(){
        $pictureId = $_REQUEST["id"];
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
            $this->redirect('Front/albumShow',array('id'=>$album['id']));
        }
    }
//相册图片部分结束
//相册图片评论部分
    public function replyAdd(){}
    public function replyDelete(){}
//相册图片评论部分结束

}