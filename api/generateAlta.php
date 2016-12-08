 <?php 
 require_once('dompdf/autoload.inc.php');
 require_once('MODELS/connection_sql_server.php');
 header('Access-Control-Allow-Origin:*');
   use Dompdf\Dompdf;
try{
	$matricula=$_GET['matricula'];
  $connection= new SqlServerConnection();
  $query=sprintf("SELECT * FROM Alumno.getInfoEst('".$matricula."');");
  $data=$connection->execute_query($query);
  
  //variables
  $carrera=odbc_result($data,'carrera');
  $director=odbc_result($data,'director');
  $grupo=odbc_result($data,'grupo');
  $alumNom=odbc_result($data,'alumNom');
  $alumDir=odbc_result($data,'alumDir');
  $alumTel=odbc_result($data,'alumTel');
  $alumEmail=odbc_result($data,'alumEmail');
  $empNom=odbc_result($data,'empNom');
  $empDir=odbc_result($data,'empDir');
  $empCon=odbc_result($data,'empCon');
  $proNom=odbc_result($data,'proNom');
  $area=odbc_result($data,'area');
  $aseEmp=odbc_result($data,'aseEmp');
  $visita=odbc_result($data,'visita');
  $tutor=odbc_result($data,'tutor');
  $horario=odbc_result($data,'horario');
  $apoyo=odbc_result($data,'apoyo');
  $objetivos=odbc_result($data,'objetivos');

  $act1Nom=odbc_result($data,'act1Nom');
  $act1ini=odbc_result($data,'act1ini');
  $act1fin=odbc_result($data,'act1fin');
  $act1horas=odbc_result($data,'act1horas');

  $act2Nom=odbc_result($data,'act2Nom');
  $act2ini=odbc_result($data,'act2ini');
  $act2fin=odbc_result($data,'act2fin');
  $act2horas=odbc_result($data,'act2horas');

  $act3Nom=odbc_result($data,'act3Nom');
  $act3ini=odbc_result($data,'act3ini');
  $act3fin=odbc_result($data,'act3fin');
  $act3horas=odbc_result($data,'act3horas');

  $act4Nom=odbc_result($data,'act4Nom');
  $act4ini=odbc_result($data,'act4ini');
  $act4fin=odbc_result($data,'act4fin');
  $act4horas=odbc_result($data,'act4horas');

  $act5Nom=odbc_result($data,'act5Nom');
  $act5ini=odbc_result($data,'act5ini');
  $act5fin=odbc_result($data,'act5fin');
  $act5horas=odbc_result($data,'act5horas');

  $horasTotales=odbc_result($data,'horasTotales');

  $grado=intval($grupo[3]+$grupo[4]);
  switch ($grado) {
    case 06:
      # code...
      $tsu='X';
      break;
    case 09:
      # code...
      $ip='X';
      break;
    case 11:
      # code...
      $ing='X';
      break;
  }


  // instantiate and use the dompdf class
  $dompdf = new Dompdf();
  $dompdf->loadHtml('<!DOCTYPE html>
  <html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title></title>
  </head>
  <body>
      <table id="primertabla">
        <tr>
          <td rowspan="3"><img src="images/logo.png" id="logo-utt"></td>
          <td rowspan="3">
          <div id="formato">FORMATO</div>
          <br>
          <div id="definicion"> DEFINICI&Oacute;N PROYECTO DE ESTADIA</div>
          </td>
          <td>CODIGO</td>
          <td>F-VI-003</td>
        </tr>
        <tr>
          <td>REVISION</td>
          <td>08/312</td>
        </tr>
        <tr>
          <td>HOJA</td>
          <td>1 DE 1</td>
        </tr>
      </table>
      <br>
      <table id="tcarrera">
        <tr>
          <td class="1carrera"> CARRERA DE:</td>
          <td class="2carrera"><table id="tdcarreras"><tr><td>TSU</td><td class="wborder">'.$tsu.'</td><td>LP</td><td class="wborder">'.$ip.'</td><td>ING</td><td class="wborder">'.$ing.'</td></tr></table></td>
        </tr>
        <tr>
          <td class="1carrera">NOMBRE DE LA CARRERA:</td>
          <td class="2carrera">'.$carrera.'</td>
        </tr>
      </table>
      <br>
      <table id="talumno">
        <tr>
          <td >DATOS DEL ALUMNO</td>
          <td id="tdmatricula">MATRICULA</td>
          <td>'.$matricula.'</td>
        </tr>
        <tr>
          <td>NOMBRE</td>
          <td colspan="2">'.$alumNom.'</td>
        </tr>
        <tr>
          <td>DIRECCION</td>
          <td colspan="2">'.$alumDir.'</td>
        </tr>
        <tr>
          <td>TELEFONO/CELULAR</td>
          <td colspan="2">'.$alumTel.'</td>
        </tr>
        <tr>
          <td>E-MAIL</td>
          <td colspan="2">'.$alumEmail.'</td>
        </tr>
      </table>
      <br>
      <table id="tempresa">
        <tr>
          <td colspan="2" class="tit">DATOS DE LA EMPRESA</td>
        </tr>
        <tr>
          <td>NOMBRE:</td>
          <td>'.$empNom.'</td>
        </tr>
        <tr>
          <td>DIRECCION:</td>
          <td>'.$empDir.'</td>
        </tr>
        <tr>
          <td>TELEFONO:/FAX/E-MAIL:</td>
          <td>'.$empCon.'</td>
        </tr>
         <tr>
          <td colspan="2" class="tit">DATOS DE LA ESTADIA</td>
        </tr>
        <tr>
          <td>NOMBRE DEL PROYECTO</td>
          <td>'.$proNom.'</td>
        </tr>
        <tr>
          <td>AREA O DEPARTAMENTO</td>
          <td>'.$area.'</td>
        </tr>
        <tr>
          <td>ASESOR EMPRESARIAL/CARGO</td>
          <td>'.$aseEmp.'</td>
        </tr>
        <tr>
          <td>FECHAS DE VISITA A EMPRESA</td>
          <td>'.$visita.'</td>
        </tr>
        <tr>
          <td>ASESOR ACADEMICO</td>
          <td>'.$tutor.'</td>
        </tr>
        <tr>
          <td>HORARIO DE ESTADIA</td>
          <td>'.$horario.'</td>
        </tr>
        <tr>
          <td>APOYOS ECONOMICOS VIA UTT</td>
          <td>'.$apoyo.'</td>
        </tr>
      </table>
      <br>
      <table id="tproyecto">
        <tr>
          <td class="tit">OBJETIVOS DEL PROYECTO:</td>
        </tr>
        <tr>
          <td>
            '.$objetivos.'
          </td>
        </tr>
      </table>
      <br>
      <table id="tactividades">
        <tr>
          <td colspan="4" class="tit">ACTIVIDADES</td>
        </tr>
        <tr>
          <td class="n10">NOMBRE DE LA ACTIVIDAD</td>
          <td class="n10">FECHA DE <br>INICIO</td>
          <td class="n10">FECHA DE <br>TERMINACION</td>
          <td class="n10">NUM. HRS.</td>
        </tr>
        <tr>
          <TD>'.$act1Nom.'</TD>
          <TD>'.$act1ini.'</TD>
          <TD>'.$act1fin.'</TD>
          <TD>'.$act1horas.'</TD>
        </tr>
        <tr>
          <TD>'.$act2Nom.'</TD>
          <TD>'.$act2ini.'</TD>
          <TD>'.$act2fin.'</TD>
          <TD>'.$act2horas.'</TD>
        </tr>
        <tr>
          <TD>'.$act3Nom.'</TD>
          <TD>'.$act3ini.'</TD>
          <TD>'.$act3fin.'</TD>
          <TD>'.$act3horas.'</TD>
        </tr>
        <tr>
          <TD>'.$act4Nom.'</TD>
          <TD>'.$act4ini.'</TD>
          <TD>'.$act4fin.'</TD>
          <TD>'.$act4horas.'</TD>
        </tr>
        <tr>
          <TD>'.$act5Nom.'</TD>
          <TD>'.$act5ini.'</TD>
          <TD>'.$act5fin.'</TD>
          <TD>'.$act5horas.'</TD>
        </tr>
        <tr>
          <td colspan="3" class="tit" id="tothrs"> TOTAL DE HORAS CONVENIDAS</td>
          <td >'.$horasTotales.'</td>
        </tr>
      </table>
      <br>
      <div id="sello">Sello de Recibido (Vinculación)</div>
      <table id="tfirmas">
        <tr>
          <td colspan="2" id="titfirmas">F I R M A S</td>
          <tr>
            <td class="noborder">'.$aseEmp.'</td>
            <td class="noborder">'.$tutor.'</td>
          </tr>
          <tr>
            <td class="noborder">Nombre y Firma</td>
            <td class="noborder">Nombre y Firma</td>
          </tr>
          <tr>
            <td class="noborder" id="bottom">Asesor Academico</td>
            <td class="noborder" id="bottom">Asesor Empresarial</td>
          </tr>
          <tr>
            <td class="noborder">Lic. Rico</td>
            <td class="noborder">'.$alumNom.'</td>
          </tr>
          <tr>
            <td class="noborder">Nombre y Firma</td>
            <td class="noborder">Nombre y Firma</td>
          </tr>
          <tr>
            <td class="noborder" id="bottom">Director de Carrera</td>
            <td class="noborder" id="bottom">Alumno</td>
          </tr>
        </tr>
      </table>
    </body>
  </html>');

  //(Optional) Setup the paper size and orientation
  $dompdf->setPaper('A4');

  // Render the HTML as PDF
  $dompdf->render();
  $dir='../docs/'.$matricula;
  mkdir($dir,0777);
  $pdf= $dompdf->output();
  file_put_contents($dir.'/9-'.$matricula.'.pdf', $pdf);
  // Output the generated PDF to Browser
  $dompdf->stream();
	echo '{"status" : 0 , "descripcion" : "succesful" }';
}
catch(Exception $ex){
	echo '{"status" : 1 , "descripcion" : "error:'.$ex.'" }';
}
  ?>
