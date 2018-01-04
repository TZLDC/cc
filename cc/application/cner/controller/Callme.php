<?php
namespace app\cner\controller;
class Callme extends Common{
    public function index(){
        if(request()->isAjax()){
            $input=input('post.');
            $validate=validate('Validates');
            if($validate->scene('addCall')->check($input)){
                $res=db('callme')->where('id',1)->update($input);
                if($res){
                    return show(1,'添加成功');
                }else{
                    return show(0,'添加失败');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else{
            $res=db('callme')->where('id',1)->find();
            $this->assign('res',$res);
            return $this->fetch();
        }
    }
}