<?php
namespace app\index\controller;
class Index extends Common
{
    public function index()
    {
        $this->getFood();
        $this->getEssay();
        $this->getMen();
        $id=input('get.pid');
        $ader=db('ader')->where('status',0)->order('sort desc')->select();
        $img=db('ader')->where('status',1)->find();
        $sword=db('swords')->select();
        $this->assign('s',$sword);
        $this->assign('aders',$ader);
        $this->assign('ccid',$id);
        $this->assign('img',$img);
        return $this->fetch();
    }
    public function getFood(){
        $res=db('img')->join('cc_category','cc_category.id=cc_img.cid')->where('cc_img.cid',7)->select();
        $this->assign('res',$res);
    }
    public function getEssay(){
        $res=db('article')->order('create_time desc')->where('cid',9)->select();
        $r=db('article')->order('create_time desc')->where('cid',9)->find();
        $cid=$r['cid'];
        $c=db('category')->where('id',$cid)->find();
        $pid=$c['pid'];
        $this->assign('piid',$pid);
        $this->assign('ess',$res);
    }
    public function getMen(){
        $res=db('img')->join('cc_category','cc_category.id=cc_img.cid')->where('cc_img.cid',11)->select();
        $this->assign('men',$res);
    }
    public function word(){
        $input=input('post.');
        $input['create_time']=time();
        $res=db('word')->insert($input);
        if($res){
            return show(1,'留言成功');
        }else{
            return show(0,'留言失败，请稍后再试');
        }
    }
    public function joinme(){
        $input=input('post.');
        $input['create_time']=time();
        $res=db('joinme')->insert($input);
        if($res){
            return show(1,'感谢你的加入，随后会有工作人员联系你');
        }else{
            return show(0,'加入失败');
        }
    }
}
