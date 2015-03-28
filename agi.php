#!/usr/bin/php -q
<?php

set_time_limit(0);
require('/var/www/riksha/data/phpagi/phpagi.php'); # специальная библиотека для удобства работы с AGI
require_once("/var/www/riksha/Main.php");
$conf = Main::getConf();

$timeFrom = strtotime($conf['hfrom'] . $conf['mfrom']);
$timeTo = strtotime($conf['hto'] . $conf['mto']);
$day = $conf["day"];
$night = $conf["night"];
$currentMusic = (($timeFrom < time()) && (time() < $timeTo)) ? $day : $night;
if ($currentMusic == $night) $hangup = true;
$currentMusic = explode(".", $currentMusic);
$currentMusic = "cust/" . $currentMusic[0];

$agi = new AGI();
$agi->exec("playback", $currentMusic);
$agi->exec_goto("contact_incoming", "s", "1");
if ($hangup)  $agi->hangup();




?>
