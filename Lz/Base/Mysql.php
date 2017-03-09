<?php

class Mysql{
	private $_config = array();
	private $_link;
 	/**
 	 * [__construct description]
 	 */
 	public function __construct(){
		$this->_config = require_once(COF_PATH."configs.php");
		$this->_link = mysql_connect($this->_config['host'],$this->_config['user'],$this->_config['pass']);
		$this->setChar();
		$this->chooseDB();
	}
	/**
	 * [setChar description]
	 */
	public function setChar(){
		$sql = "set names {$this->_config['char']}";
		$this->query($sql);
	}
	/**
	 * [chooseDB description]
	 * @return [type] [description]
	 */
	public function chooseDB(){
		$sql = "use {$this->_config['db']}";
		$this->query($sql);
	}
	/**
	 * [query description]
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function query($sql){
		$res = mysql_query($sql);
		if($res){
			return $res;
		}else{
			echo $this->errno()."<br />".$this->error();
		}
	}
	/**
	 * [error description]
	 * @return [type] [description]
	 */
	public function error(){
		return mysql_error();
	}
	/**
	 * [errno description]
	 * @return [type] [description]
	 */
	public function errno(){
		return mysql_errno();
	}
	/**
	 * [getAll description]
	 * @param  [type] $sql [description]
	 * @return [type]      [description]
	 */
	public function getAll($sql){
		$res = $this->query($sql);
		$result = array();
		while($row = mysql_fetch_assoc($res)){
			$result[] = $row;
		}
		return $result;
	}
	public function getOne($sql){
		$res = $this->query($sql);
		return mysql_fetch_assoc($res);
	}
	/**
	 * [affected description]
	 * @return [type] [description]
	 */
	public function affected(){
		return mysql_affected_rows();
	}
}





