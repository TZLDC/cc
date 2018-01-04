<?php
namespace app\index\controller;
use think\Controller;
class Common extends Controller{
    public function __construct()
    {
        parent::__construct();
        $this->getConf();
        $this->getNavCates();
    }
    public function getNavCates(){
        $cateres=db('category')->where(array('pid'=>0))->select();
        foreach ($cateres as $k => $v) {
            $children=db('category')->where(array('pid'=>$v['id']))->select();
            if($children){
                $cateres[$k]['children']=$children;
            }else{
                $cateres[$k]['children']=0;
            }
        }
        $this->assign('cateres',$cateres);
    }
    public function getConf(){
        $c=db('conf')->select();
        $this->assign('c',$c);
    }
}