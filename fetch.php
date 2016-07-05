<?php

header("Content-type: text/html; charset=utf-8");
$url ="http://weixin.sogou.com/weixin?type=1&query=%E6%B5%B7%E6%99%AE%E6%B4%9B%E6%96%AF";
$data=file_get_contents($url);

preg_match("/gotourl\('(.*)',event,this/",$data,$str_array);
if(!count($str_array)>0){
    exit;
}
$url =$str_array[1];

echo $url;

$url = str_replace('&amp;', '&', $url);
//$url = 'http://mp.weixin.qq.com/profile?src=3&timestamp=1467682135&ver=1&signature=klwAfc5RUSxsmHSqZyam9nrClhy6muENJeYZzjln*b4pCsXTSzAobOIo8R8L-3z98vljOP3JTCZSd1G4TwQ7Rw==';

$content = file_get_contents($url);

//die($content);

$startPos = strpos($content, 'var msgList = ');
if($startPos > 10)
{
	$endPos = strpos($content, "}}]}';");

	$json = trim(substr($content, $startPos+15, $endPos-($startPos+11)));

	print_r( json_decode( htmlspecialchars_decode($json) ) );
}
