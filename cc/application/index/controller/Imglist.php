<?php
namespace app\index\controller;
class Imglist extends Common{
    public function index(){
        $id=input('get.pid');
        $cateres=db('category')->where('id',$id)->find();
        $art=db('img')->where('cid',$id)->select();
        $this->assign('ccid',$id);
        $this->assign('cates',$cateres);
        $this->assign('arts',$art);
        $this->assign('pid',$id);
        return $this->fetch();
    }
    public function lists(){
        $id=input('get.pid');
        $imgid=input('get.cid');
        $res=db('category')->where('id',$id)->find();
        $imgres=db('img')->where('id',$imgid)->find();
        $this->assign('ccid',$id);
        $this->assign('cres',$res);
        $this->assign('imgres',$imgres);
        return $this->fetch();
    }
}