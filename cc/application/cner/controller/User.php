<?php
namespace app\cner\controller;
class User extends Common{
    public function index(){
        return $this->fetch();
    }
}