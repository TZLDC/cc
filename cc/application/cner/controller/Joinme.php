<?php
namespace app\cner\controller;
class Joinme extends Common{
    public function index(){
        $res=db('joinme')->paginate(10);
        $this->assign('me',$res);
        return $this->fetch();
    }
}