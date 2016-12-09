<?php 
class Connection{
	private $connection;

	//Funcion que realiza la conexion..
	function get_connection()
	{

		//config
		$config = parse_ini_file('configuracion.ini');
		// connection parameters
		if(isset($config['server'])) 	$server = $config['server'];		else { echo 'Server name not found'; die; }
		if(isset($config['user'])) 		$user = $config['user']; 			else { echo 'User name not found'; die; }
		if(isset($config['password'])) 	$password = $config['password']; 	else { echo 'Password not found'; die; }
		if(isset($config['database'])) 	$database = $config['database']; 	else { echo 'Database not found'; die; }
		
		$string_connection="Driver={SQL Server Native Client 10.0};Server=".$server.";Database=".$database.";";
		// open connection
		$connection = odbc_connect($string_connection,$user,$password);

		if($connection === false)
		{
			echo "Could not connect to SQL Server";
			die;
		}

		$this->connection=$connection;
	}

	//realiza una consulta sin parametros 
	function query($query)
	{
		$this->get_connection();
		$con= $this->connection;
		$res=odbc_exec($con,$query) or die("<B>Error!</B> Couldn't Run Stored Query. Error Code:  ".odbc_error());    
	    
	    $i = 0;
	    $j = 0;
	    $toReturn = "";
	    while(odbc_fetch_row($res))
	    {
	        for ($j = 1; $j <= odbc_num_fields($res); $j++)
	        {        
	             $field_name = odbc_field_name($res, $j);
	             $ar[$field_name] = odbc_result($res, $field_name);
	        }                              
	        $toReturn[$i] = $ar;
	        $i++;
	    }
    	$JSONquery= json_encode($toReturn); 

    	return $JSONquery;
	}
}
?>