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

function XSS($config)
{
	return is_array($config) ? array_map('XSS',$config) : htmlspecialchars($config);
}

function SQL($config)
{
	return is_array($config) ? array_map('SQL',$config) : addcslashes($config);
}

function echoJson($config)
{
	exit(json_encode($config));
}




/*******************************/
function U($config,$type=1)
{
	if($type === 1)
		echo "index.php?a=".$config;
	else
		echo "index.php?c=".$config;
}
/**
 * [U description]
 * @param [type]  $url      [路由]
 * @param array   $config   [参数]
 * @param boolean $isServer [显示域名]
 */
function U1($url,$config=array(),$isServer=FALSE)
{
	//是否带入域名
	if( $isServer )
		$script = $_SERVER['SERVER_NAME'].'index.php';
	else
		$script = '/index.php';
	//特殊判断
	if( $url == '/' )
		return $script;
	//分解参数
	$url = explode('/',$url);

	//判断是否传参  解析参数
	if( empty($config) )
	{
		$route = null;
	}
	else
	{
		//转变参数格式
		foreach($config as $k=>$v)
		{
			$route[] = $k.'='.$v;
		}
		$route = implode('&',$route);
	}
	if( count($url) == 2 )
	{
		//双层路由
		if( $route )
		{
			//有传参
			return $script.'?c='.$url[0].'&'.'a='.$url[1].'&'.$route;
		}
		else
		{
			//无传参
			return $script.'?c='.$url[0].'&'.'a='.$url[1];
		}
	}
	else
	{
		//单路由显示
		if( $route )
		{
			//有传参
			return $script.'?c='.CONTROLLER.'&'.'a='.$url[0].'&'.$route;
		}
		else
		{
			//无传参
			return $script.'?c='.CONTROLLER.'&'.'a='.$url[0];
		}
	}
}

function G($config=null)
{
	if( $config )
		return $_GET["{$config}"];
	return $_GET;
}
function P($config)
{
	if( $config )
		return $_POST["{$config}"];
	return $_POST;
}