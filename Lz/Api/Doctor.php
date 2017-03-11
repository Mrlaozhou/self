<?php 
class Doctor extends Base
{
	public function index()
	{
		$doctor = M('doctor');
		dump($doctor);
	}

}