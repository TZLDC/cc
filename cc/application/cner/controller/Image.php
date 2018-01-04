<?php
namespace app\cner\controller;
use think\Controller;
class Image extends Common
{
    public function upload(){
        $file=request()->file('file');
        $info = $file->rule('uniqid')->move('D:/phpStudy/WWW/cc/public/images/category');
        $filePath=config('u'). '/images/category/'.$info->getSaveName();
        if($info){
            return show(1,$filePath);
        }else{
            return show(0,$file->getError());
        }
    }
    public function uploadAder(){
        $file=request()->file('file');
        $info = $file->rule('uniqid')->move('D:/phpStudy/WWW/cc/public/images/ader');
        $filePath=config('u').'/images/ader/'.$info->getSaveName();
        if($info){
            return show(1,$filePath);
        }else{
            return show(0,$file->getError());
        }
    }
    public function uploadImg(){
        $file=request()->file('file');
        $info = $file->rule('uniqid')->move('D:/phpStudy/WWW/cc/public/images/img');
        $filePath= config('u').'/images/img/'.$info->getSaveName();
        if($info){
            return show(1,$filePath);
        }else{
            return show(0,$file->getError());
        }
    }
    public function uploadCallme(){
        $file=request()->file('file');
        $info = $file->rule('uniqid')->move('D:/phpStudy/WWW/cc/public/images/callme');
        $filePath= config('u').'/images/callme/'.$info->getSaveName();
        if($info){
            return show(1,$filePath);
        }else{
            return show(0,$file->getError());
        }
    }
}