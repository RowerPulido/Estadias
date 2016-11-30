<?php
	function get_connection()
	{
		//connection
		$config = parse_ini_file('config.ini');
		if (isset($config['server']))$server = $config['server'];else{echo "Server name not found";die;}
		if(isset($config['user']))$user = $config['user'];else{echo "User not Found";die;}
		if(isset($config['password']))$password = $config['password'];else{echo "Error password";die;}
		if(isset($config['database']))$database = $config['database'];else{echo "Datanase not Found";die;}
		//test connection
		$connection = mysqli_connect($server,$user,$password,$database);
		if($connection == false)
		{
			echo "Could not connect ";
			die;
		}
		return $connection;	
	}
?>