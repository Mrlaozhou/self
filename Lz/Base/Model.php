<?php 
class Model
{
	static private $_db;
	static private $_table;
	static private $_fields;
	public function __construct($table)
	{
		self::InitDb();
		self::InitTable(trim($table));
		self::InitFields();
	}

	static private function InitDb()
	{
		self::$_db instanceof Db ?  "" : self::$_db = new Db();
	}
	static private function InitTable($table)
	{
		$sql = "DESC ".DB_NAME."_{$table}";
		self::$_db->query($sql) ? self::$_table = DB_NAME.'_'.$table : die("invalid tablename {$table}");
	}
	static private function InitFields()
	{
		$sql = "DESC ".self::$_table;
		$data = self::$_db->All($sql);

		$result = array();
		foreach($data as $k => $v)
		{
			if( $v['Field'] )
				if( $v['Key'] == 'PRI')
					$result['PRI'] = $v['Field'];
				else
					$result[] = $v['Field'];
		}
		self::$_fields = $result;
	}


	/*****************************************/

	public function All($SQL='')
	{
		$keys = implode(',',self::$_fields);
		if( $SQL )
			$sql = $SQL;
		else
			$sql = "SELECT {$keys} FROM ".self::$_table;
		return self::$_db->All($sql);
	}














	/*****************************************/
}