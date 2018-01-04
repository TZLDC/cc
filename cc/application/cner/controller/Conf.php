<?php
namespace app\cner\controller;
class Conf extends Common{
    public function index(){
        $confres=db('conf')->order('sort desc')->select();
        $this->assign('confres',$confres);
        return $this->fetch();
    }
    public function edit(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('editConf')->check($input)){
                $res=db('conf')->where('id',$id)->update($input);
                if($res){
                    return show(1,'修改成功');
                }else{
                    return show(0,'修改失败');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else{
            $id=input('get.id');
            $res=db('conf')->where('id',$id)->find();
            $this->assign('conf',$res);
            return $this->fetch();
        }
    }
}