<?php

$content = file_get_contents('http://mp.weixin.qq.com/profile?src=3&timestamp=1467642379&ver=1&signature=klwAfc5RUSxsmHSqZyam9nrClhy6muENJeYZzjln*b4pCsXTSzAobOIo8R8L-3z950TAdK*CY4ri-5UBPlZjNQ==');

$startPos = strpos($content, 'var msgList = ');
if($startPos > 10)
{
	$endPos = strpos($content, "}}]}';");

	$json = trim(substr($content, $startPos+15, $endPos-($startPos+11)));

	print_r( json_decode( htmlspecialchars_decode($json) ) );
}

