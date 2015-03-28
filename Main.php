<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 3/28/15
 * Time: 2:01 PM
 */

class Main {

    public static function getConf()
    {
        $string = file_get_contents("data/conf");
        $array = [];
        $a = explode(',', $string);

        foreach ($a as $result) {
            $b = explode('->', $result);
            $array[$b[0]] = $b[1];
        }
        return $array;
    }

    public static function setConf($array)
    {
        $str = "";
        foreach ($array as $k => $v) {
            $str = $str . $k . "->" . $v . ',';
        }
        file_put_contents("data/conf", $str);
    }

    public static function setTime($post)
    {
        var_dump($post);
    }

    public static function setMusic($post)
    {
        var_dump($post);
    }

}