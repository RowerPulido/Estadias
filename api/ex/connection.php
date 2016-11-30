<?php
    function get_connection()
    {
        //read configuration file
        $config=parse_ini_file('config.ini');
        
        //if(isset($conection['server']))
            $server=$config['server'];
       /*else
        {
            echo 'Connection error server';
            die;
       }*/
        //if(isset($conection['user']))
            $user=$config['user'];
     /*  else
        {
            echo 'Connection error user';
            die;
       }
      */
        $password=$config['password'];
       
        //if(isset($conection['database']))
            $database=$config['database']; 
        /*else
        {
            echo 'Connection error database';
            die;
        }*/

        $connection=mysqli_connect($server, $user, $password, $database);
   
        if($connection==false)
        {
            echo 'No se puede guardar con Mysql';
            die;
        }
        return $connection;
    }
?>