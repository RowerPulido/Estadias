<?php 
require_once('MODELS/connection_sql_server.php');
require_once('MODELS/User.php');
require_once('MODELS/generate_token.php');
header('Access-Control-Allow-Origin:*');
/*
	STATUS:
	0 -> SIN ERRORES
	1 -> USUARIO INEXISTENTE
	2 -> ERROR en el query
	3 -> No parameters found
 */

$user = $_POST['usr_id'];
$pswd = $_POST['usr_psw'];
if (isset($user) && isset($pswd))
{

	$connection = new SqlServerConnection();
	try
	{
		$query = sprintf('select todos.matricula,u.constrasenia, todos.nombres,todos.paterno,todos.imagen,t.id ,t.description from usuarios u join typeofuser t on u.tipo = t.id join (select matricula,nombres, paterno,imagen from Alumnos union select id as id, numbres, paterno,imagen from tutores union select id as id, nombre, paterno,imagen from asesor_empresarial) todos on todos.matricula = u.id where u.id = \''.$user.'\' and u.constrasenia = \''.$pswd."';");
		$data=$connection->execute_query($query);
			
		$matricula=odbc_result($data, 'matricula');
		$password=odbc_result($data, 'constrasenia');
		$nombre=odbc_result($data, 'nombres');
	 	$paterno=odbc_result($data, 'paterno');
	 	$imagen=odbc_result($data, 'imagen');
		$idTipo=odbc_result($data, 'id');
		$descripccion=odbc_result($data, 'description');

		if ($matricula=='' && $password=='') {
			
				echo $result='{"Status" : 1 , "Description" : "User Not Found" }';
						die;
		}
		$u = new User($matricula,$password);
		echo '
			{ "Status" : 0,
				"User" : 
				 {
				 	"userID" : "'.$u->get_id().'",
				 	"Nombre" : "'.$nombre.'",
				 	"Paterno" : "'.$paterno.'",
				 	"Imagen" : "'.$imagen.'",
				 	"password" :"'.$password.'",
				 	"UserType" : 
				 					{
				 						"IDtype" : "'.$u->get_user_type()->get_id_type().'",
				 						"Description" : "'.$u->get_user_type()->get_description().'"
				 					},
				 	"Token" : "'.generate_token($matricula).'"					
				 } 
			}';
	}
	finally
	{
		$connection->close();
	}
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
