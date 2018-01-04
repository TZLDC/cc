<?php
namespace app\index\controller;
class Article extends Common{
    public function index(){
        $pid=input('get.pid');
        $id=input('get.id');
        $son=db('category')->where('pid',$pid)->select();
        $res=db('category')->where('id',$id)->find();
        $art=db('article')->join('cc_category','cc_category.id=cc_article.cid')->where('cc_article.Id',$id)->find();
        $this->assign('art',$art);
        $this->assign('cid',$id);
        $this->assign('ccid',$pid);
        $this->assign('son',$son);
        $this->assign('res',$res);
        return $this->fetch();
    }
}