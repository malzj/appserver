<?php
namespace Login\Controller;
use Think\Controller;
use Think\Page;

/**
 * Created by PhpStorm.
 * User: malmemeda
 * Date: 2015/9/23
 * Time: 17:05
 */
class CompanyController extends Controller
{
        public  function companylist(){
                $Dao = M("Company");
                $count = $Dao->count();
                $Page =new Page($count,10);
                $show = $Page->show();
                $list = $Dao->order('addDate desc')->limit($Page->firstRow.','.$Page->listRows)->select();
                $this->assign('list',$list);// 赋值数据集
                $this->assign('page',$show);// 赋值分页输出
        $this->display();
        }
        public  function companycreate(){
                $this->display();
        }
        public  function companyadd(){
                if(IS_POST){
                        header("Content-Type:text/html; charset=utf-8");
                        $Dao = M("Company");
                        $data["name"] = $_POST["name"];
                        $data["msg"] = $_POST["msg"];
                        $data["addDate"] =date( 'Y-m-d',time());
                        $id=$Dao->add($data);
                        if($id){
                                $this->redirect('company/companylist');
                        }
                }
        }
        public  function companyshow(){
                $id=$_REQUEST['id'];
                $Dao = M("Company");
                $business = $Dao ->where('id = %d',$id)->find();
                if (!$business) {
                        alert('error', L('THERE_IS_NO_BUSINESS_OPPORTUNITIES'),$_SERVER['HTTP_REFERER']);
                }
                $this->business = $business;
                $this->display();
        }
        public  function companyupdate(){
                if(IS_POST){
                        $id=$_POST['id'];
                        header("Content-Type:text/html; charset=utf-8");
                        $Dao = M("Company");
                        $data["name"] = $_POST["name"];
                        $data["msg"] = $_POST["msg"];
                        $Dao->where('id='.$id)->save($data);
                        if($id){
                                $this->redirect('company/companylist');
                        }
                }
        }
        public  function companydelete(){
                $id=$_REQUEST['id'];
                $Dao = M("Company");
                $rusult= $Dao->where('id='.$id)->delete();
                if($rusult){
                        $this->redirect('company/companylist');
                }
                $this->display();
        }
}