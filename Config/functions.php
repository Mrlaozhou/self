<?php
	function M($table)
	{
		return new Model(trim($table));
	}
