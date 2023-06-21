<?php 
require './common/init.php';
// 接收参数
$id = input('get','id','d');
// 查询图片信息
$data = album_picture_data($id);
if(!$data){
	exit("该图片不存在");
}
$pid = $data['pid'];
// 相册导航
$nav = album_nav($pid);
// 上一张、下一张
$prev = db_fetch_row("SELECT `id` FROM `picture` WHERE `pid`=$pid AND `id`>$id  LIMIT 1")['id'];
$next = db_fetch_row("SELECT `id` FROM `picture` WHERE `pid`=$pid AND `id`<$id ORDER BY `id` DESC LIMIT 1")['id'];
// 载入模板
require './view/show.html';
?>