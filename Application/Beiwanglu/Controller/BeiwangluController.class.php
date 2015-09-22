<?php
/**
 * Created by PhpStorm.
 * User: karl
 * Date: 2015/9/21
 * Time: 17:19
 */

namespace Beiwanglu\Controller;


use Think\Controller;

class BeiwangluController extends Controller
{
public function index(){
    $this->display();
}
    //用户列表
    public function beiwangluList(){
        $beiwangluModel = M('Beiwanglu');
        $count = $beiwangluModel->count();
        $Page = new Page($count,10);
        $show = $Page->show();
        $list = $beiwangluModel->order('date_create desc')->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();
    }

    //显示用户
    public function userShow(){
        $companyId = $_REQUEST("companyId");
        $userId = $_REQUEST("userId");
        $map = array();
        $map['id'] = $userId;
        $map['company_id'] = $companyId;
        $UserModel = M('User');
        $userInfo = $UserModel->where($map)->select();
        $this->assign($userInfo);
        $this->display();
    }

    //添加用户
    public function userAdd(){
        if(IS_POST){
            $UserModel = M('User');
            $data = array();
            $data['name']=$_POST['name'];
            $data['city'] = $_POST['city'];
            $data['phone'] = $_POST['phone'];
            $data['company_id'] = $_POST['company_id'];
            $data['address'] = $_POST['address'];
            $data['username'] = $_POST['username'];
            $data['password'] = $_POST['password'];
            $data['role'] = $_POST['role'];
            $data['date_create'] = date('Y-m-d',time());

            $id = $UserModel->add($data);
            if($id){
                $this->success('操作成功！',U('User/userList'));
            }
        }
    }

    //编辑用户
    public function userEdit(){
        $companyId = $_REQUEST('companyId');
        $userId = $_REQUEST('userId');

    }
}