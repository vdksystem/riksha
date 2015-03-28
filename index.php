<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 28.03.15
 * Time: 9:04
 */

?>
<!doctype html>
<html lang="us">
<head>
    <meta charset="utf-8">
    <title>Riksha</title>
    <style>
        body{
            font: 62.5% "Trebuchet MS", sans-serif;
            margin: 50px;
        }
        .demoHeaders {
            margin: 2em;
        }
        #dialog-link {
            padding: .4em 1em .4em 20px;
            text-decoration: none;
            position: relative;
        }
        #dialog-link span.ui-icon {
            margin: 0 5px 0 0;
            position: absolute;
            left: .2em;
            top: 50%;
            margin-top: -8px;
        }
        #icons {
            margin: 0;
            padding: 0;
        }
        #icons li {
            margin: 2px;
            position: relative;
            padding: 4px 0;
            cursor: pointer;
            float: left;
            list-style: none;
        }
        #icons span.ui-icon {
            float: left;
            margin: 0 4px;
        }
        .fakewindowcontain .ui-widget-overlay {
            position: absolute;
        }
        select {
            width: 200px;
        }
        .content {
            margin:0 5% 0 5%;
            width:90%;
        }
        .files {
            width: 40%;
            border-radius: 7px;
            border: solid 1px orange;
            height: 500px;
            float: left;
            margin:0 5% 0 5%;
            padding: 4px;;
        }
        .calendar {
            width: 40%;
            border-radius: 7px;
            border: solid 1px orange;

            float: left;

        }
        .addfile {
            width: 40%;
            border-radius: 7px;
            border: solid 1px orange;

            float: left;
            margin-top: 10px;

        }
        .form {
            margin:5%;
        }
        .form2 {
            margin: 0 10%;
        }
        .timeform {
            margin:5%;
            font-size: 15px;
        }
        .timeform input {
            border-radius: 5px;
            border: solid 1px orange;
            height: 20px;
            width: 50px;
            text-align: center;
        }
        .timeform div {
            margin: 5%;
        }
        .musicform {
            margin:5%;
            font-size: 15px;
        }
        .musicform div {
            margin: 5%;
        }
        .musicform select {
            border-radius: 5px;
            border: solid 1px orange;
            height: 20px;
            width: 150px;
            text-align: center;
        }
        .button {
            border-radius: 5px;
            border: solid 1px orange;
            height: 20px;
            width: 100px;
            text-align: center;
        }

    </style>
</head>
<body>
<h1>Riksha telephony</h1>
<div class="content">
<div class="files">
    <h2 class="demoHeaders">Список мелодий</h2>
    <div class="form">
        <form name="addFile" method="post">
        <input type="file">
        <input type="hidden" name="action" value="add">
        <button type="submit" id="addfile">Добавить</button>
    </form></div>

    <?php
    require_once("Main.php");

    $conf = Main::getConf();

    $post = $_POST;
    if ($post) {
        switch ($post["action"]) {
            case "settime" :
                Main::setTime($post);
                break;
            case "music" :
                Main::setMusic($post);
                break;
        }
        sleep(2);
        header('Location: index.php');
    }

    $path = "files";
    $list = scandir($path);
    $fileList = [];
    foreach ($list as $val) {
        if (($val!=".") && ($val !="..")){
            $fileList[] = $val;
        }
    }
    foreach ($fileList as $val) {
        ?>
            <div class="form2"><div style="font-size: 14px;">
                <?php echo $val;?>
            </div>
            <div>
    <audio controls>
        <source src="<?php echo $path . "/" . $val?>" type="audio/wav">
        Your browser does not support the audio element.
    </audio>
            </div></div>
        <?php }?>
</div>
<div class="calendar">
    <h2 class="demoHeaders">Время работы</h2>
    <form method="post">
        <input type="hidden" name="action" value="settime">
        <div class="timeform">
            <div><label>Начало работы</label>
            <input type="text" name="hFrom" value="<?php echo $conf['hfrom']?>">:<input type="text" name="mFrom" value="<?php echo $conf['mfrom']?>">
            </div>

            <div><label>Окончание работы</label>
                <input type="text" name="hTo" value="<?php echo $conf['hto']?>">:<input type="text" name="mTo"  value="<?php echo $conf['mto']?>">
            </div>
            <button class="button">Изменить</button>
        </div>
    </form>
</div>
    <div class="addfile">
        <h2 class="demoHeaders">Музыка по умолчанию</h2>
        <form method="post">
            <input type="hidden" name="action" value="music">
            <div class="musicform">
                <div><label>Дневное приветствие</label>
                    <select name="day">
                        <option><?php echo $conf['day']?></option>
                        <?php
                        foreach ($fileList as $val) {
                            echo "<option>" . $val . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div><label>Ночное приветствие</label>
                    <select name="day">
                        <option><?php echo $conf['night']?></option>
                        <?php
                        foreach ($fileList as $val) {
                            echo "<option>" . $val . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <button class="button">Изменить</button>
            </div>
        </form>
    </div>
</div>
