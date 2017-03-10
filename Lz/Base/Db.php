<?php 


class Db
{
	private $_config;
	private $_link;

	public function __construct()
	{
		$this->InitConfig();
		$this->InitLink();
		$this->InitChoose();
		$this->InitChar();
	}

	private function __clone() {}

	private function InitConfig()
	{
		$this->_config = require_once('/Config/configs.php');
	}

	private function InitLink()
	{
		$this->_link = @mysql_connect($this->_config['host'],"root","laozhou") or Error("数据库连接异常");
	}
	private function InitChoose()
	{
		$sql = "use ".DB_NAME;
		$result = $this->query($sql) or Error("选择数据库出错");
	}
	private function InitChar()
	{
		$sql = "set names {$this->_config['char']}";
		$this->query($sql) or Error("选择数据库语言出错");
	}

	public function query($sql)
	{
		$res =  mysql_query($sql);
		return $res;
	}

	public function All($sql)
	{
		$result = array();
		$res = $this->query($sql);
		while( $item = mysql_fetch_assoc($res) )
		{
			 if($item)
			 	$result[] = $item;
		}
		return $result;
	}

	public function One($sql)
	{
		return mysql_fetch_assoc($this->query($sql));
	}
}
