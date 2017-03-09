<?php
class Base
{
	static $_db;
	public function __construct()
	{
		$this->init_db();
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

	public function init_header()
	{
		header("Access-Control-Allow-Origin:*");
	}

}