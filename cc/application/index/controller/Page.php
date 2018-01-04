<?php
namespace app\index\controller;
class Page extends Common{
    public function index(){
        $id=input('get.pid');
        $res=db('category')->where('id',$id)->find();
        $son=db('category')->where('pid',$id)->select();
        $sonf=db('category')->where('pid',$id)->find();
        $sonid=$sonf['id'];
        $art=db('article')->where('cid',$sonid)->order('create_time desc')->paginate(5);
        $this->assign('son',$son);
        $this->assign('sonf',$sonf);
        $this->assign('res',$res);
        $this->assign('ccid',$id);
        $this->assign('art',$art);
        return $this->fetch();
    }
    public function lists(){
        $id=input('get.pid');
        $cid=input('get.cid');
        $res=db('category')->where('id',$id)->find();
        $son=db('category')->where('pid',$id)->select();
        $art=db('article')->where('cid',$cid)->order('create_time desc')->paginate(10);
        $this->assign('son',$son);
        $this->assign('res',$res);
        $this->assign('ccid',$id);
        $this->assign('art',$art);
        $this->assign('cid',$cid);
        return $this->fetch();
    }
}
