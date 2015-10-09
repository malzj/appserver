<?php
/**
 * Created by PhpStorm.
 * User: malmemeda
 * Date: 2015/9/25
 * Time: 17:02
 */

namespace Login\Controller;


use Think\Controller;
use Think\Page;

class MokuaiController extends Controller
{
    public function mokuailist(){
        $cid=$_REQUEST['Id'];
        $map=array();
        $map['company_id']=$cid;
        $Dao=M('Mokuai');
        $count = $Dao->where($map)->count();
        $Page =new Page($count,10);
        $show = $Page->show();
        $list = $Dao->where($map)->order('add_date desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        for($i=0;$i<count($list);$i++){
            $id=$list[$i]['gongneng_id'];
            $business = M('Gongneng') ->where('id = %d',$id)->find();
            $list[$i]['gongneng']=$business['name'];
        }
        $this->assign('list',$list);// ��ֵ���ݼ�
        $this->assign('page',$show);// ��ֵ��ҳ���
        $this->assign('cid',$cid);// ��ֵ��ҳ���
        $this->display();
    }
    public  function mokuaicreate(){
        $cid=$_REQUEST['cid'];
        $list=M('Company')->select();
        $list1=M('Gongneng')->select();
        $this->assign('list',$list);
        $this->assign('list1',$list1);
        $this->assign('cid',$cid);
        $this->display();
    }
    public  function mokuaiadd(){
        if(IS_POST){
            header("Content-Type:text/html; charset=utf-8");
            $Dao = M("Mokuai");
            $data["name"] = $_POST["name"];
            $data["company_id"] = $_POST["company_id"];
            $data["img"] =$_POST["img"];
            $data["gongneng_id"] =$_POST["gongneng_id"];
            $data["begin_date"] =$_POST["begin_date"];
            $data["over_date"] =$_POST["over_date"];

            $data["add_date"] =date( 'Y-m-d',time());
            $id=$Dao->add($data);
            if($id){
                $this->redirect('mokuai/mokuailist','Id='. $data["company_id"]);
            }
        }
    }
    public function mokuaishow(){
        $id=$_REQUEST['id'];
        $Dao = M("Mokuai");
        $business = $Dao ->where('id = %d',$id)->find();
        if (!$business) {
            alert('error', L('THERE_IS_NO_BUSINESS_OPPORTUNITIES'),$_SERVER['HTTP_REFERER']);
        }
        $list1=M('Gongneng')->select();
        $this->assign('list1',$list1);
        $this->business = $business;
        $this->display();
    }
    public  function mokuaiupdate(){
        if(IS_POST){
            $id=$_POST['id'];
            header("Content-Type:text/html; charset=utf-8");
            $Dao = M("Mokuai");
            $business = $Dao ->where('id = %d',$id)->find();
            $data["name"] = $_POST["name"];
            $data["img"] =$_POST["img"];
            $data["gongneng_id"] =$_POST["gongneng_id"];
            $data["begin_date"] =$_POST["begin_date"];
            $data["over_date"] =$_POST["over_date"];
            $Dao->where('id='.$id)->save($data);
            if($id){
                $this->redirect('mokuai/mokuailist','Id='. $business["company_id"]);
            }
        }
    }
    public  function mokuaidelete(){
        $id=$_REQUEST['id'];
        $Dao = M("Mokuai");
        $business = $Dao ->where('id = %d',$id)->find();
        $rusult= $Dao->where('id='.$id)->delete();
        if($rusult){
            $this->redirect('mokuai/mokuailist','Id='. $business["company_id"]);
        }
        $this->display();
    }
}