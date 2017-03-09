<?php 
class Model
{
	static private $_db;
	static private $_table;
	public function __construct($table)
	{
		self::InitDb();
		self::InitTable(trim($table));
	}

	static private function InitDb()
	{
		self::$_db = new Mysql();
	}
	static private function InitTable($table)
	{
		$sql = "DESC {$table}";
		self::$_db->query($sql) ? self::$_table = $table :die("invalid tablename {$table}");
	}


	public function fetchFields()
	{
		$sql = "";
	}
}