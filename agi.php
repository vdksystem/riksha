#!/usr/bin/php -q
<?php

set_time_limit(0);
require('data/phpagi/phpagi.php'); # специальная библиотека для удобства работы с AGI
require_once("Main.php");
$conf = Main::getConf();

$timeFrom = strtotime($conf['hfrom'] . $conf['mfrom']);
$timeTo = strtotime($conf['hto'] . $conf['mto']);
$day = $conf["day"];
$night = $conf["night"];
$currentMusic = (($timeFrom < time()) && (time() < $timeTo)) ? $day : $night;

echo $currentMusic;

$agi = new AGI();
$agi->answer();
$agi->exec("playback", $currentMusic);
$agi->set_context('night');
$agi->hangup();



?>