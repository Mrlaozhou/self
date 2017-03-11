<?php
// +----------------------------------------------------------------------
// |  	入口文件
// +----------------------------------------------------------------------
// | 	Date: 2017-03-04
// +----------------------------------------------------------------------
header("Content-Type:text/html;Charset=utf-8");

defined("DS") or define("DS",DIRECTORY_SEPARATOR);
defined("ROOT_PATH") or define("ROOT_PATH",getcwd().DS);

$list = require_once('/Lz/Base/InitMake.php');

echo "<pre>";
var_dump($list);