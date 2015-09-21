<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $db = D('memorandum');
        $date['title']=1;
        $date['content'] = "好的";
        $db -> add($date);
    }
}