<?php 
//@header('Content-Type:application/json;charset=UTF-8');
require 'src/Meting.php';
use Metowolf\Meting;
$api = empty($_GET['api'])?'':trim($_GET['api']);	            //功能  'search', 'url', 'lyric', 'pic'
$music = empty($_GET['music'])?'':trim($_GET['music']);	    //引擎  'netease', 'tencent', 'xiami', 'kugou', 'baidu'
$id = empty($_GET['id'])?'':trim($_GET['id']);
$search = empty($_GET['search'])?'':trim($_GET['search']);


$arr=array('netease', 'tencent', 'xiami', 'kugou', 'baidu');  
if(in_array($music , $arr) == false){  
    $music = 'netease';
}


$mt = new Meting($music);   //'netease', 'tencent', 'xiami', 'kugou', 'baidu'
switch ($api){
    case "search"://搜索音乐
        $data = $mt->format(true)->search( $search , [
            'page' => 1,
            'limit' => 1
        ]);
	  	break;

	case "url"://获取下载地址
		$data = $mt->format(true)->url($id);
    	break;
      
	case "lyric"://歌词下载地址
		$data = $mt->format(true)->lyric($id);
        break;
        
    case "pic"://专辑图
        $data = $mt->format(true)->pic($id);
        break;

	default:
		exit;
}
echo $data;


/*
http://127.0.0.1/index.php

music=netease&api=netease&search=[歌曲名]	//搜索歌曲 返回搜索结果
music=netease&api=url&url=[ID]				//取回下载地址	搜索返回的 url_id
music=netease&api=lyric&url=[ID]			//取回下载地址	搜索返回的 lyric_id
music=netease&api=pic&url=[ID]				//取回下载地址	搜索返回的 pic_id
*/










