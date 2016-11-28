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

	$connection = new SqlServerConnection();
	$query = sprintf('select todos.matricula,u.password, todos.nombres,todos.paterno,t.id ,t.description from usuarios u join typeofuser t on u.type = t.id join (select matricula,nombres, paterno from Alumnos union select id as id, numbres, paterno from tutores union select id as id, nombre, paterno from asesor_empresarial) todos on todos.matricula = u.id where u.id = \''.$user.'\' and u.password = \''.$pswd."';");
	echo $query;
	$data=$connection->execute_query($query);
		
	odbc_result($data, 'matricula');
	odbc_result($data, 'password');
	odbc_result($data, 'nombres');
 	odbc_result($data, 'paterno');
	odbc_result($data, 'id');
	odbc_result($data, 'description');

	if (odbc_result($data, 'matricula')=='' && odbc_result($data, 'password')=='') {
		
			echo $result='{"status" : 1 , "Descrition" : "User Not Found" }';
					die;
	}
	echo odbc_result($data, 'id');
	echo "passwrod".odbc_result($data, 'password');
	$u = new User(odbc_result($data, 'id'),odbc_result($data, 'password'));
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
