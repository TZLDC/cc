<?php
namespace app\index\controller;
class Callme extends Common{
    public function index(){
        $res=db('callme')->find();
        $pid=-1;
        $this->assign('res',$res);
        $this->assign('ccid',$pid);
        return $this->fetch();
    }
    public function uAAHN(){
        $res=db('callme')->select();
        $this->assign('res',$res);
        return $this->fetch();
    }
}