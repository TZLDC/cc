<?php
namespace app\cner\controller;
class Swords extends Common{
    public function index(){
        $res=db('swords')->select();
        $this->assign('art',$res);
        return $this->fetch();
    }
    public function edit(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $input['create_time']=time();
            $validate=validate('Validates');
            if($validate->scene('addsWord')->check($input)){
                $res=db('swords')->where('id',$id)->update($input);
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
            $res=db('swords')->where('id',$id)->find();
            $this->assign('art',$res);
            return $this->fetch();
        }
    }
}