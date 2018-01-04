<?php
namespace app\index\controller;
class Artlist extends Common{
    public function index(){
        $id=input('get.pid');
        $cateres=db('category')->where('pid',$id)->find();
        $art=db('article')->where('cid',$cateres['id'])->find();
        $son=db('category')->where('pid',$id)->select();
        $sonf=db('category')->where('id',$id)->find();
        $this->assign('son',$son);
        $this->assign('sonf',$sonf);
        $this->assign('cate',$cateres);
        $this->assign('ccid',$id);
        $this->assign('art',$art);
        return $this->fetch();
    }
    public function lists(){
        $cid=input('get.cid');
        $id=input('get.pid');
        if($id==0){
            $pid=db('category')->where('id',$cid)->field('pid')->find();
            $id=$pid['pid'];
        }
        $art=db('article')->where('cid',$cid)->find();
        $son=db('category')->where('pid',$id)->select();
        $sonf=db('category')->where('id',$id)->find();
        $this->assign('son',$son);
        $this->assign('ccid',$id);
        $this->assign('art',$art);
        $this->assign('pid',$id);
        $this->assign('cid',$cid);
        $this->assign('sonf',$sonf);
        return $this->fetch();
    }
}