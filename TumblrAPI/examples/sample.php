<?php
require 'rhaco/Rhaco.php';
require '../TumblrAPI.php';

// いずれ rhaco に pit つくりたい
Rhaco::constant('TUMBLR_EMAIL', 'mailaddress');
Rhaco::constant('TUMBLR_PASSWORD', 'password');

$title = 'ケコーン';
$body = <<<_BOD
riaf: ごはんかってきた
sotarok: 今日は何カレー？
riaf: はるさめヌードルのカレーwwww
sotarok: なんであたってるんだｗｗｗ
riaf: さすがwww
_BOD;
$type = 'conversation';

$tumblr = new TumblrAPI(Rhaco::constant('TUMBLR_EMAIL'), Rhaco::constant('TUMBLR_PASSWORD'));
$ret = $tumblr->write(array('title' => $title, 'conversation' => $body), $type);
Logger::d($ret);
