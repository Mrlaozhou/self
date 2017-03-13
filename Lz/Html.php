<?php 



//定义路劲常量
defined('DS') or define('DS',DIRECTORY_SEPARATOR);
defined('ROOT_PATH') or define('ROOT_PATH',getcwd().DS);
defined('HTML_PATH') or define('HTML_PATH',ROOT_PATH.'Html'.DS);
defined('SRC_PATH') or define('SRC_PATH',HTML_PATH.'src'.DS);
defined('VIEW_PATH') or define('VIEW_PATH',HTML_PATH.'view'.DS);


//定义路由常量
defined('CONTROLLER') or define('CONTROLLER',isset($_GET['c']) ? ucwords(trim($_GET['c'])) : null);
defined('ACTION') or define('ACTION',isset($_GET['a']) ? trim($_GET['a']) : 'index');


if( CREATE )
	@require_once('/Lz/Base/InitMake.php');
if( CONTROLLER )
	@require_once(SRC_PATH.CONTROLLER.'.php');
if( ACTION )
	@require_once(VIEW_PATH.ACTION.'.html');