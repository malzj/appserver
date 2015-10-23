<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 2015/10/23
 * Time: 15:07
 */

namespace Front\Controller;


use Think\Controller;

class NewsContorller extends Controller
{
    public function newsShow(){
        $user=$_SESSION['user'];
        $id=$_GET['id'];
        $company_id=$user['company_id'];
        $mokuai_id=$_REQUEST['mokuai_id'];
        $NewsModel=M('News');
        $newsinfo=$NewsModel->where(array('id'=>$id,'company_id'=>$company_id,'mokuai_id'=>$mokuai_id))->find();
        $this->assign('newsinfo',$newsinfo);
        $this->display();
    }
//    新闻新建或更新
    public function newsSave(){
        $user=$_SESSION['user'];
        $newsId=$_POST['id'];
        $mokuai_id=$_REQUEST['mokuai_id'];
        $NewsModel=M('News');
        $data=array();
        $data['title']=$_POST['title'];
        $data['content']=$_POST['content'];
        $data['company_id']=$user['company_id'];
        $data['mokuai_id']=$mokuai_id;
        $data['date_create']=date('Y-m-d H:i:s',time());
        if($newsId){
            $result=$NewsModel->where(array('id'=>$newsId))->save($data);
        }else {
            $result = $NewsModel->add($data);
        }
        if($result){
            $this->redirect('Front/newsList','mokuai_id='.$mokuai_id);
        }

    }

    public function newsCreate(){
        $mokuai_id=$_REQUEST['mokuai_id'];
        $this->assign('mokuai_id',$mokuai_id);
        $this->display();
    }
}