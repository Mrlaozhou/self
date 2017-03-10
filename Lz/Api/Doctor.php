<?php 
class Doctor extends Base
{
	public function index()
	{
		$doctor = M('doctor');
		$data = $doctor->All();
		dump($data);
	}

}