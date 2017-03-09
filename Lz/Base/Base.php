<?php
class Base
{
	static $_db;
	public function __construct()
	{
		$this->init_db();
		$this->init_func();
	}

	private function init_db ()
	{
		if( self::$_db instanceof Mysql )
		{

		}
		else
		{
			self::$_db = new Mysql();
		}
	}

	private function init_func()
	{
		require_once('/Config/functions.php');
	}
	public function init_header()
	{
		header("Access-Control-Allow-Origin:*");
	}

}
