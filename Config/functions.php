<?php

/**
 * [M 实例化模型]
 * @param [type] $table [description]
 */
function M($table)
{
	return new Model(trim($table));
}
/**
 * [dump 打印]
 * @param  [type]  $config [description]
 * @param  integer $type   [description]
 * @return [type]          [description]
 */
function dump($config,$type=1)
{
	echo '<pre>';

	if($type === 1)
		var_dump($config);
	else
		print_r($config);

	exit;
}

/**
 * [Error 报错]
 * @param [type] $msg [description]
 */
function Error($msg)
{
	echo "<h1 style='font-family:楷体;color:#C40000;'>{$msg}</h1>";
	exit;
}

