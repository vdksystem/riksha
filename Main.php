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
            if ($result != "") {
                $b = explode('->', $result);
                $array[$b[0]] = $b[1];
            }
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
        $conf = self::getConf();
        foreach ($post as $k => $v) {
            if ($v) {
                if (array_key_exists($k, $conf)) {
                    $conf[$k] = $v;
                }
            }
        }

        self::setConf($conf);
    }

    public static function setMusic($post)
    {
        $conf = self::getConf();
        foreach ($post as $k => $v) {
            if ($v) {
                if (array_key_exists($k, $conf)) {
                    $conf[$k] = $v;
                }
            }
        }

        self::setConf($conf);
    }

    public static function Upload($post)
    {

        $uploaddir = 'files/';
        $uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
            return;
        } else {
            echo "Possible file upload attack!\n";
        }
    }

}