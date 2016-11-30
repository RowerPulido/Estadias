<?php 
function generate_token()
{
	if(func_num_args()==0)
		$token=md5('ESTADIAS'.date('Ymd'));
	if (func_num_args()==1) 
	{
		$args=func_get_args();
		$usr_id=$args[0];
		$token=md5('ESTADIAS'.$usr_id.date('Ymd'));
	}

	//return token
	return $token;
}
 ?>