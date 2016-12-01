 <?php 
 require_once('dompdf/autoload.inc.php');
// reference the Dompdf namespace
use Dompdf\Dompdf;
$matricula=$_POST['matricula'];
$ing='';
$tsu='X';
$ip='';
$carreraNom='';
$alumDir=$_POST['alumDir'];
$alumEmail=$_POST['alumEmail'];
$alumNom='';
$alumTel=$_POST['alumTel'];
$proNom=$_POST['proNom'];
$estArea=$_POST['estArea'];
$aseEmpNom=$_POST['AseNom'].' '.$_POST['AsePat'].' '.$_POST['AseMat'];
$aseEmpCargo=$_POST['AseCar'];
$estVisitas=$_POST['EstVis'];
$tutNom='';
$estHor='LUNES-VIERNES :'.$_POST['EstHr1'].'-'.$_POST['EstHr2'];
$hr1=$_POST['EstHr1'];
$hr2=$_POST['EstHr2'];
$h1=intval(substr($hr1, 0,1));
$h2=intval(substr($hr2, 0,1));
$hrsdia=$h2-$h1;
$estEco='$ '.$_POST['EstEco'];
$proObj=$_POST['ProObj'];
$ACTIVIDAD1=$_POST['Act1'];
$INICIO1=$_POST['Inicio'];
$dur1=$_POST['Act1Dur'];
$FIN1='';
$NUMHRS1=($hrsdia*5)*(intval($dur1));
$ACTIVIDAD2=$_POST['Act2'];
$INICIO2='';
$FIN2='';
$dur2=$_POST['Act2Dur'];
$NUMHRS2=($hrsdia*5)*(intval($dur2));
$ACTIVIDAD3=$_POST['Act3'];
$INICIO3='';
$FIN3='';
$dur3=$_POST['Act3Dur'];
$NUMHRS3=($hrsdia*5)*(intval($dur3));
$ACTIVIDAD4=$_POST['Act4'];
$INICIO4='';
$FIN4='';
$dur4=$_POST['Act4Dur'];
$NUMHRS4=($hrsdia*5)*(intval($dur4));
$ACTIVIDAD5=$_POST['Act5'];
$INICIO5='';
$FIN5='';
$dur5=$_POST['Act5Dur'];
$NUMHRS5=($hrsdia*5)*(intval($dur5));
$TOTALHRS=$NUMHRS1+$NUMHRS2+$NUMHRS3+$NUMHRS4+$NUMHRS5;
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
        <td class="2carrera"><table id="tdcarreras"><tr><td>TSU</td><td class="wborder">'.$tsu.'</td><td>IP</td><td class="wborder">'.$ip.'</td><td>ING</td><td class="wborder">'.$ing.'</td></tr></table></td>
      </tr>
      <tr>
        <td class="1carrera">NOMBRE DE LA CARRERA:</td>
        <td class="2carrera">'.$carreraNom.'</td>
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
        <td>NOMBRE DEL PROYECTO</td>
        <td>'.$proNom.'</td>
      </tr>
      <tr>
        <td>AREA O DEPARTAMENTO</td>
        <td>'.$estArea.'</td>
      </tr>
      <tr>
        <td>ASESOR EMPRESARIAL/CARGO</td>
        <td>'.$aseEmpNom.', '.$aseEmpCargo.'</td>
      </tr>
      <tr>
        <td>FECHAS DE VISITA A EMPRESA</td>
        <td>'.$estVisitas.'</td>
      </tr>
      <tr>
        <td>ASESOR ACADEMICO</td>
        <td>'.$tutNom.'</td>
      </tr>
      <tr>
        <td>HORARIO DE ESTADIA</td>
        <td>'.$estHor.'</td>
      </tr>
      <tr>
        <td>APOYOS ECONOMICOS VIA UTT</td>
        <td>'.$estEco.'</td>
      </tr>
    </table>
    <br>
    <table id="tproyecto">
      <tr>
        <td class="tit">OBJETIVOS DEL PROYECTO:</td>
      </tr>
      <tr>
        <td>
          '.$proObj.'
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
        <TD>'.$ACTIVIDAD1.'</TD>
        <TD>'.$INICIO1.'</TD>
        <TD>'.$FIN1.'</TD>
        <TD>'.$NUMHRS1.'</TD>
      </tr>
      <tr>
        <TD>'.$ACTIVIDAD2.'</TD>
        <TD>'.$INICIO2.'</TD>
        <TD>'.$FIN2.'</TD>
        <TD>'.$NUMHRS2.'</TD>
      </tr>
      <tr>
        <TD>'.$ACTIVIDAD3.'</TD>
        <TD>'.$INICIO3.'</TD>
        <TD>'.$FIN3.'</TD>
        <TD>'.$NUMHRS3.'</TD>
      </tr>
      <tr>
        <TD>'.$ACTIVIDAD4.'</TD>
        <TD>'.$INICIO4.'</TD>
        <TD>'.$FIN4.'</TD>
        <TD>'.$NUMHRS4.'</TD>
      </tr>
      <tr>
        <TD>'.$ACTIVIDAD5.'</TD>
        <TD>'.$INICIO5.'</TD>
        <TD>'.$FIN5.'</TD>
        <TD>'.$NUMHRS5.'</TD>
      </tr>
      <tr>
        <td colspan="3" class="tit" id="tothrs"> TOTAL DE HORAS CONVENIDAS</td>
        <td >'.$TOTALHRS.'</td>
      </tr>
    </table>
    <br>
    <div id="sello">Sello de Recibido (Vinculación)</div>
    <table id="tfirmas">
      <tr>
        <td colspan="2" id="titfirmas">F I R M A S</td>
        <tr>
          <td class="noborder">'.$aseEmpNom.'</td>
          <td class="noborder">'.$tutNom.'</td>
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
file_put_contents($dir.'/'.$matricula.'.pdf', $pdf);
// Output the generated PDF to Browser
$dompdf->stream($matricula);
  ?>
