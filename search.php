<?php
//脚本使用 input() 函数从 URL 查询字符串中获取搜索词，
// 然后使用 db_fetch_all() 函数构建 SQL 查询以搜索与搜索词匹配的图片名称。
// 最后，脚本包含一个视图文件，以向用户显示搜索结果。
require './common/init.php';
$search = input('get','search','s');
$like = '%'.db_escape_like($search).'%';
$list = db_fetch_all("SELECT `id`,`pid`,`name`,`save` FROM `picture` WHERE `name` LIKE ? ORDER BY `id` DESC ",'s',[$like]);
require './view/search.html';
