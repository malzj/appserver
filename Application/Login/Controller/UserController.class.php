<?php
namespace Login\Controller;
use Think\Controller;
use Think\Page;

/**
 * Created by PhpStorm.
 * User: peng
 * Date: 2015/9/21
 * Time: 17:30
 */
class UserController extends Controller
{
    //�û��б�
    public function userlist(){
        $UserModel = M('User');
        $count = $UserModel->count();
        $Page = new Page($count,10);
        $show = $Page->show();
        $list = $UserModel->order('date_create desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        for($i=0;$i<count($list);$i++){
            $id=$list[$i]['company_id'];
            $business = M('Company') ->where('id = %d',$id)->find();
            $list[$i]['company']=$business['name'];
        }
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    //��ʾ�û�
    public function usershow(){
        $id=$_REQUEST['id'];
        $Dao = M("User");
        $business = $Dao ->where('id = %d',$id)->find();
        if (!$business) {
            alert('error', L('THERE_IS_NO_BUSINESS_OPPORTUNITIES'),$_SERVER['HTTP_REFERER']);
        }
        $list=M('Company')->select();
        $this->assign('list',$list);
        $this->business = $business;
        $this->display();
    }

    //����û�
    public function usercreate(){
        $list=M('Company')->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function useradd(){
        if(IS_POST){
            header("Content-Type:text/html; charset=utf-8");
            $UserModel = M('User');
            $CompanyUserModel = M('Companyuser');
            $data = array();
            $data['name']=$_POST['name'];

            $data['phone'] = $_POST['phone'];
            $data['company_id'] = $_POST['company_id'];
            $data['address'] = $_POST['address'];
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];
            $data['role'] = $_POST['role'];
            $data['date_create'] = date('Y-m-d',time());

            $id = $UserModel->add($data);
            $cuid = $CompanyUserModel->add($data);
            if($id&&$cuid){
                $this->redirect('User/userlist');
            }
        }
    }

    public  function userupdate(){
        if(IS_POST){
            $id=$_POST['id'];
            header("Content-Type:text/html; charset=utf-8");
            $Dao = M("User");
            $data["name"] = $_POST["name"];
            $data["username"] = $_POST["username"];
            $data["password"] = $_POST["password"];
            $data["company_id"] = $_POST["company_id"];
            $data["address"] = $_POST["address"];
            $data["phone"] = $_POST["phone"];
            $data["role"] = $_POST["role"];
            $Dao->where('id='.$id)->save($data);
            if($id){
                $this->redirect('user/userlist');
            }
        }
    }
    public  function userdelete(){
        $id=$_REQUEST['id'];
        $Dao = M("User");
        $rusult= $Dao->where('id='.$id)->delete();
        if($rusult){
            $this->redirect('user/userlist');
        }
        $this->display();
    }
}