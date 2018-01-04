<?php
namespace app\cner\controller;
class Word extends Common{
   public function index(){
       $res=db('word')->paginate(10);
       $this->assign('words',$res);
       return $this->fetch();
   }
}