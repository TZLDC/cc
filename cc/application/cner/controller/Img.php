<?php
namespace app\cner\controller;
class Img extends Common{
    public function index(){
        $res=db('img')->join('cc_category','cc_category.id=cc_img.cid')->paginate(10);
        $this->assign('imgs',$res);
        return $this->fetch();
    }
    public function add(){
        if(request()->isAjax()){
            $input=input('post.');
            $validate=validate('Validates');
            if($validate->scene('addImg')->check($input)){
                $res=db('img')->insert($input);
                if($res){
                    return show(1,'添加成功');
                }else{
                    return show(0,'添加失败');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else{
        $cate=db('category')->where('is_nav',2)->order('sort desc')->select();
        $cateres=getTree($cate);
        $this->assign('cateres',$cateres);
        return $this->fetch();
        }
    }
    public function edit(){
        if(request()->isAjax()){
            $input=input('post.');
            $id=input('get.id');
            $validate=validate('Validates');
            if($validate->scene('addImg')->check($input)){
                $res=db('img')->where('Id',$id)->update($input);
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
        $res=db('img')->where('Id',$id)->find();
        $cate=db('category')->where('is_nav',2)->order('sort desc')->select();
        $cateres=getTree($cate);
        $this->assign('cateres',$cateres);
        $this->assign('img',$res);
        return $this->fetch();
        }
    }
    public function delete(){
        $id=input('get.id');
        $res=db('img')->where('Id',$id)->delete();
        if($res){
            return true;
        }else{
            return false;
        }
    }
}