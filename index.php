<?php
require './common/init.php';
// 接收参数
$id = input('get','id','d');
$sort = input('get','sort','s');//获取排序方式
//列出图片
$list = album_list($id,$sort);
$action = input('post','action','s');

//判断相册是否存在
if($id && !album_data($id)){
	exit('相册不存在！');
}

//新建相册
if($action =='new'){
	album_new($id,input('post','name','s'));
}

// 上传图片
elseif ($action == 'upload') {
	album_upload($id,input($_FILES,'upload','a'));
}

//设为封面
elseif($action == 'pic_cover'){
	album_picture_cover(input('post','action_id','d'),$id);
}

//删除图片
elseif($action == 'pic_delete'){
	album_picture_delete(input('post','action_id','d'));
}

//删除相册
elseif($action == 'alb_delete'){
	album_delete(input('post','action_id','d'));
}
$nav = album_nav($id);//导航栏
require './view/index.html';
