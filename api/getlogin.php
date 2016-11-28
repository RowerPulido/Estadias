<?php 
header('Access-Control-Allow-Origin:*');
require_once('MODELS/connection_sql_server.php');
require_once('MODELS/User.php');
require_once('MODELS/generate_token.php');
/*
	STATUS:
	0 -> SIN ERRORES
	1 -> USUARIO INEXISTENTE
	2 -> ERROR en el query
	3 -> No parameters found
 */

$user= $_POST['usr_id'];
$pswd=$_POST['usr_psw'];
if (isset($user) && isset($pswd))
{

	$connection = new SqleServerConnection();
	$query = sprintf('select todos.matricula,u.password, todos.nombres,todos.paterno,t.id ,t.description from usuarios u join typeofuser t on u.type = t.id join (select matricula,nombres, paterno from Alumnos union select id as id, numbres, paterno from tutores union select id as id, nombre, paterno from asesor_empresarial) todos on todos.matricula = u.id where u.id = \''.$usr_id.'"  and u.password = \''.$usr_psw."'");
	$data=$connection->execute_query($query);
	$found = odbc_num_rows($data) > 0;
	if (!$found)
		{
			$result='{"status" : 2 , "Descrition" : "Error in query : '.$query .'"}';
			echo $result;
			die;
		}
		// MODIFICAR EN ESTA SECCION....
		//odbc_result($data, '');

	if ($id=='' && $pswd=='') {
		
			echo $result='{"status" : 1 , "Descrition" : "User Not Found" }';
					die;
	}
	$u= new User($id,$pswd);
	echo '
		{ "status" : "0" ,
			 "User":
			 {
			 	"userID" : "'.$u->get_id().'",
			 	"nombre" : "'.$nombre.'",
			 	"paterno" : "'.$paterno.'",
			 	"imagen" : "'.$img.'",
			 	"UserType" : 
			 					{
			 						"ID" : "'.$u->get_user_type()->get_id_type().'",
			 						"Description" : "'.$u->get_user_type()->get_description().'"
			 					},
			 	"token" : "'.generate_token($user).'"					
			 } 
		}';
}
else
	{
		echo $result='{"status" : 3 , "Descrition" : "Invalid parameters" }';
				die;
	}
/*--Estructura de resultados
{
  "status": "0",
  "User": {
    "userID": "0315108352",
    "nombre": "Victor javier",
    "paterno": "gutierrez",
    "imagen": "C:imagenesvictor.png",
    "UserType": {
      "ID": "alu",
      "Description": "alumno"
    },
    "token": "565b0852352aeaead156dcb6a1702a82"
  }
}
}*/
/*--Estructura para la subconsulta de el login
select todos.matricula, todos.nombre,todos.paterno,t.id ,t.descripcion
from users u
join typeofusers t
on u.typeofuser = t.id
join 
(
select matricula, nombre, paterno from tutores 
union 
select matricula, nombre, paterno from alumnos 
) todos
on todos.matricula = u.id
where u.id = '0315110132' and u.pswd ='rower'
*/
 ?>
