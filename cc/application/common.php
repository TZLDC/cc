<?php
function show($status,$message){
    $result=[
        'status'=>$status,
        'message'=>$message,
    ];
    exit(json_encode($result));
}
function getTree($arr,$pid=0,$level=0){
    $tree=array();
    foreach ($arr as $v){
        if($v['pid']==$pid){
            $v['level']=$level;
            $v['html']=str_repeat('--',$level);
            $tree[]=$v;
            $tree=array_merge($tree,getTree($arr,$v['id'],$level+1));
        }
    }
    return $tree;
}
function getStatus($data){
    if($data==0){
        echo '单页面';
    }else if($data==1){
        echo '文章列表页';
    }else if($data==2){
        echo '图片列表页';
    }else if($data==3){
        echo '文章详情页';
    }else if($data==4){
        echo '图片详情页';
    }else if($data==5){
        echo '文章导航页';
    }
}
function getTypes($data){
    if($data==1){
        echo '单行文本框';
    }else if($data==2){
        echo '多行文本框';
    }else if($data==3){
        echo '单选按钮';
    }else if($data==4){
        echo '复选按钮';
    }else if($data==5){
        echo '下拉菜单';
    }
}
function getswords($data){
    if($data==0){
        echo '第一行文字';
    }else if($data==1){
        echo '第二行文字';
    }else if($data==2){
        echo '第三行文字';
    }else if($data==3){
        echo '第四行文字';
    }else if($data==4){
        echo '第五行文字';
    }else if($data==5){
        echo '第六行文字';
    }else if($data==6){
        echo '第七行文字';
    }else if($data==7){
        echo '第八行文字';
    }else if($data==8){
        echo '第九行文字';
    }
}
