<?php
namespace app\cner\controller;
class Article extends Common{
    public function index(){
        $res=db('article')->join('cc_category','cc_category.id=cc_article.cid')->paginate(10);
        $this->assign('art',$res);
        return $this->fetch();
    }
    public function add(){
        if(request()->isAjax()){
            $input=input('post.');
            $input['create_time']=time();
            $validate=validate('Validates');
            if($validate->scene('addArt')->check($input)){
                $res=db('article')->insert($input);
                if($res){
                    return show(1,'添加成功');
                }else{
                    return show(0,'添加失败');
                }
            }else{
                return show(0,$validate->getError());
            }
        }else{
        $cate=db('category')->order('sort desc')->where('is_nav','neq','2')->select();
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
            if($validate->scene('addArt')->check($input)){
                $res=db('article')->where('id',$id)->update($input);
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
        $res=db('article')->where('id',$id)->find();
            $cate=db('category')->order('sort desc')->where('is_nav','neq','2')->select();
            $cateres=getTree($cate);
            $this->assign('cateres',$cateres);
        $this->assign('art',$res);
        return $this->fetch();
        }
    }
    public function delete(){
        $id=input('get.id');
        $res=db('article')->where('id',$id)->delete();
        if($res){
            return true;
        }else{
            return false;
        }
    }
}