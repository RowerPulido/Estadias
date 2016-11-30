var docs=
	[
	['F-VI-001 R05','Formato de evaluación de Estadias',2],//P-VI-01
	['F-VI-003 R08','Definicion de Proyecto de estadias',1],//F-VI-003
	['F-VI-002 R02','Relacion Empresas vinculadas',2],//
	['CARTA-TER','Carta de terminacion de estadias',0],
	['ACT-01','Antecedentes de la empresa',1],
	['ACT-02','Descripcion del Área de trabajo',1],
	['ACT-03','Descripcion del problema y objetivos',1],
	['ACT-04','Marco de referencia técnico',0],
	['ACT-05','Desarrollo del proyecto',0],
	['ACT-06','Resultados Obtenidos',0],
	['ACT-07','Conclusiones y recomendaciones',0],
	['ACT-08','Bibliografía, índice e introducción',0],
	['ACT-09',"2 CD's del trabajo recepcional",0],
	['ACT-10','Presentacion del trabajo recepcional',0],
	['POR-CD','PORTADA DE CD',2],
	['ETI-CD','ETIQUETA DE CD',2]
	];
var user = '';
var alums=[0315110132,0315110133,0315110134,0315110135];

var typeofuser="tutssss";

function initAlum(){
	if(sessionStorage['user'])
	{
		menuOfUser();
		dashboard();
		divTwitter();
		createNotification();
		document.getElementById('user-id').innerHTML = JSON.parse(sessionStorage['user']).User.userID;
		document.getElementById('user-name').innerHTML = JSON.parse(sessionStorage['user']).User.Nombre;
	}
	else
	{
		//redirect to login
		sessionStorage['previouspage'] = document.URL;
		window.location = 'login.html';
	}

}
function menuOfUser(){
var divInicio=document.getElementById('inicio');
var divDocumentos=document.getElementById('documentos');
var divEstadisticas=document.getElementById('estadisticas');
var divConfiguracion=document.getElementById('configuracion');
var estadisticas1=document.getElementById('estadisticas1');
	if (typeofuser=="tut") {
		estadisticas1.style.display='none';
	}
}


function registrarEstadia(){
 	var body=document.getElementById('cuerpo');
 	body.setAttribute('class','registrarEstadia');
 	cuerpo.innerHTML=" ";	
	var divAlumDatos=createDiv('divAlumDatos');
	var sAlums=createSelect('alumSelect','selects');
		sAlums.setAttribute('onchange','actualizarValoresAlum();');
	for(var i= 0; i<alums.length;i++){
		sAlums.appendChild(createOption(alums[i],alums[i]));
	}
	var lblNombreAlum=createLabel('inAlumName','Nombre del Alumno','lblNombreAlum');
	divAlumDatos.appendChild(lblNombreAlum);
	var inNombreAlum=createInput(divAlumDatos,'Nombre Completo','text','inAlumDatos','','inAlumName');
	inNombre.disabled=true;
	var lblGrupoAlum=createLabel('inAlumGrupo','Grupo del Alumno','lblGrupoAlum');
	divAlumDatos.appendChild(lblGrupoAlum);
	var inGrupo=createInput(divAlumDatos,'Grupo','text','inAlumDatos','','inAlumGrupo');
	inGrupo.disabled=true;
	divAlumDatos.appendChild(sAlums);
	cuerpo.appendChild(divAlumDatos);
	var divRegistro= createDiv('divFormRegistro');
	var divRegistroAlum=createDiv('divRegistroAlum');
	var formDatosRegistro=createForm('formDatosRegistro','formDatosRegistro','POST');
	
	/*Empiezo a crear los elemntos del formulario Alumno*/
	var lblDireccionAlum=createLabel('inDireccionAlum','Direccion:');
	var divDireccionAlum=createDiv('divDireccionAlum','divsDatosReg');
		divDireccionAlum.appendChild(lblDireccionAlum);
		divRegistroAlum.appendChild(divDireccionAlum);
	var inDireccionAlum=createInput(divRegistroAlum,'Direccion Alumno','text','inAlumDatos','','inDireccionAlum');


	var lblNumTelAlum=createLabel('inTelAlum','Num. Telefono:')
	var divNumTelAlum=createDiv('divNumTelAlum','divsDatosReg');
		divNumTelAlum.appendChild(lblNumTelAlum);
		divRegistroAlum.appendChild(divNumTelAlum);
	var inNumTelAlum=createInput(divRegistroAlum,'Numero de Telefono de Alumno','text','inAlumDatos','','inNumTelAlum');
	
	var lblEmailAlum=createLabel('inEmailAlum','Correo Electronico:');
	var divEmailAlum=createDiv('divEmailAlum','divsDatosReg');
		divEmailAlum.appendChild(lblEmailAlum);
		divRegistroAlum.appendChild(divEmailAlum);
	var inEmailAlum=createInput(divRegistroAlum,'Correo Electronico Alumno','email','inAlumDatos','','inEmailAlum');
	
	formDatosRegistro.appendChild(divRegistroAlum);

	var divRegistroEmp=createDiv('divRegistroEmp');

	formDatosRegistro.appendChild(divRegistroEmp);

	var divRegistroEst=createDiv('divRegistroEst');
	
	formDatosRegistro.appendChild(divRegistroEst);
	
	divRegistro.appendChild(formDatosRegistro);
	cuerpo.appendChild(divRegistro);

}

function actualizarValoresAlum(){
	var alumSelect= document.getElementById('alumSelect');
	var selectedOption=alumSelect.selectedIndex;
	console.log(alumSelect[selectedOption].value);
}
function divTwitter(){
	var cuerpo=document.getElementById('cuerpo');
	var divTwitter=createDiv('divTwitter');
	divTwitter.innerHTML='<a class="twitter-timeline" href="https://twitter.com/UTTIJ">Tweets by UTTIJ</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>';
	cuerpo.appendChild(divTwitter);
}
function createNotification(){
	var body=document.getElementById('body');
	var nots=['se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm','nada','se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm','se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm','se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm','se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm','se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm','se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm','se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm','se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm','se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm','se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm','se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm','se le informa que debe presentarse el dia de hoy conmigo a la hora de las 3:00pm'];
	if (document.getElementById('notificacion')) {
		var not=document.getElementById('notificacion');
		not.innerHTML='';
	}
		var notificacion= createDiv('notificacion','');
		body.appendChild(notificacion);
		var divNumNot= createDiv('divNumNot');
		var numNotificaciones=nots.length;
		divNumNot.innerHTML=numNotificaciones;
		notificacion.appendChild(divNumNot);
		notificacion.setAttribute('onClick','openNotificaciones()');

		var divNots=createDiv('divNots');
		for(var i=0; i<nots.length; i++){
			var divnot=createDiv('not'+(i+1),'notis');
			divnot.innerHTML=nots[i];
			divNots.appendChild(divnot);
		}
		notificacion.appendChild(divNots);

}

function openNotificaciones(){
	
	var notificacion=document.getElementById('notificacion');
	notificacion.classList.toggle('opennotificaciones');


}
function verDocs(){
	

	var body=document.getElementById('cuerpo');
	body.innerHTML="";
	body.setAttribute('class','');
	var p= document.createElement('p');
	p.innerHTML="Lista de Documentos";
	body.appendChild(p);
	var table=document.createElement('table');
	table.setAttribute('id','tabla-docs');
	var tr =document.createElement('tr');
	var td=document.createElement('td');
	td.setAttribute('class','rowheader');
	td.innerHTML="CLAVE DOC";
	tr.appendChild(td);
	var td=document.createElement('td');
	td.setAttribute('class','rowheader');
	td.innerHTML="Nombre DOC";
	tr.appendChild(td);
	table.appendChild(tr);
	for (var i = 0; i < docs.length; i++) {
		var tr=document.createElement('tr');
		var td = document.createElement('td');
		td.innerHTML=docs[i][0];
		td.setAttribute('class','rownormal');
		tr.appendChild(td);	
		var td = document.createElement('td');
		td.innerHTML=docs[i][1];
		td.setAttribute('class','rownormal');
		tr.appendChild(td);
		tr.setAttribute('class','rowtable-docs');
		table.appendChild(tr);
	}
	
	body.appendChild(table);
}

function misDocs(){
	var body=document.getElementById('cuerpo');
	body.innerHTML="";
	body.setAttribute('class','');
	var p= document.createElement('p');
	p.innerHTML="Lista de Documentos";
	body.appendChild(p);
	var table=document.createElement('table');
	table.setAttribute('id','tabla-docs');
	var tr =document.createElement('tr');
	var td=document.createElement('td');
	td.setAttribute('class','rowheader');
	td.innerHTML="Clave DOC";
	tr.appendChild(td);
	var td=document.createElement('td');
	td.setAttribute('class','rowheader');
	td.innerHTML="Nombre DOC";
	tr.appendChild(td);
	var td=document.createElement('td');
	td.setAttribute('class','rowheader');
	td.innerHTML="Estatus";
	tr.appendChild(td);
	table.appendChild(tr);
	for (var i = 0; i < docs.length; i++) {
		var tr=document.createElement('tr');
		var td = document.createElement('td');
		td.innerHTML=docs[i][0];
		td.setAttribute('class','rownormal');
		tr.appendChild(td);	
		var td = document.createElement('td');
		td.innerHTML=docs[i][1];
		td.setAttribute('class','rownormal');
		tr.appendChild(td);
		var td = document.createElement('td');
		if(docs[i][2]==2){var status="<center>---</center>"; td.setAttribute('class','no-entregar');}else if(docs[i][2]==1){var status="ENTREGADO";td.setAttribute('class','entregado');}else if(docs[i][2]==0){var status="NO ENTREGADO";td.setAttribute('class','no-entregado');}else{"ERROR";td.setAttribute('class','error');}
		td.innerHTML=status;
		
		tr.appendChild(td);
		tr.setAttribute('class','rowtable-docs');

		table.appendChild(tr);
	}
	
	body.appendChild(table);
}
function misCalis()
{
	var body = document.getElementById('cuerpo');
	var svgParent = document.createElementNS("http://www.w3.org/2000/svg","svg");
	var divPromedio = document.createElement('div');
	divPromedio.setAttribute('id','divPromedio');
	body.setAttribute('class','cuerpoCalificaciones');
	svgParent.setAttribute('id','svg');
	body.innerHTML = "";
	
	writeText(svgParent,'text','50%','50px','Mis Calificaciones','textHeader');
	for(var n = 0; n<=10;n++)
        writeText(svgParent,'textNum',(30+(n*6))+'%','725px',n,'num');
    writeText(svgParent,'text','60%','760px','Calificacion','textBottom');
    drawLine(svgParent,'30%','160px','30%','700px','axis');
    drawLine(svgParent,'90%','700px','30%','700px','axis');
    for(var x =0; x<=10;x++)
        drawLine(svgParent,(30+(x*6))+'%','705px',(30+(x*6))+'%','695px','axis2')
    for(var n = 1; n<=4;n++){
        var x = 500 / 4;
        var y =80+(n*x)+(x*0.1);
        writeText(svgParent,'nameParcial','28%',y+'px','Parcial '+n,'parcialName')
    }
    for (var r = 1; r<=4; r++){
        var x = 500 / 4;
        var y= 1+(r*x)+(x*0.25);
        var h= x*0.8;
        drawRectangle(svgParent,'bar'+r,'30%',y+'px','1%',h+'px','bar')
    }
    body.appendChild(divPromedio);
    body.appendChild(svgParent);

    //traer los datos 
	var p1,p2,p3,p4;
	var x = new XMLHttpRequest();
	x.open("GET",'http://localhost:8080/Estadias/api/getCalAlumn.php?matricula='+JSON.parse(sessionStorage['user']).User.userID,true);
	x.onreadystatechange = function() {//Call a function when the state changes.
    if(x.readyState == 4 && x.status == 200) {
       var JSONdata = JSON.parse(x.responseText);
			if (JSONdata.status == 0) 
			{
				p1 = (JSONdata.parcial_1)*6;
				p2 = (JSONdata.parcial_2)*6;
				p3 = (JSONdata.parcial_3)*6;
				p4 = (JSONdata.parcial_4)*6;

				document.getElementById('bar1').setAttribute('width',p1+'%');
				document.getElementById('bar2').setAttribute('width',p2+'%');
				document.getElementById('bar3').setAttribute('width',p3+'%');
				document.getElementById('bar4').setAttribute('width',p4+'%');

				if(JSONdata.parcial_1 < 6)document.getElementById('bar1').setAttribute('class','barRed');
        		else if(JSONdata.parcial_1 >=6 && JSONdata.parcial_ <=7)document.getElementById('bar1').setAttribute('class','barYellow');
        		else if(JSONdata.parcial_1 >=8 && JSONdata.parcial_1 <=10)document.getElementById('bar1').setAttribute('class','barGreen');
        		
        		if(JSONdata.parcial_2 < 6)document.getElementById('bar2').setAttribute('class','barRed');
        		else if(JSONdata.parcial_2 >=6 && JSONdata.parcial_2 <=7)document.getElementById('bar2').setAttribute('class','barYellow');
        		else if(JSONdata.parcial_2 >=8 && JSONdata.parcial_2 <=10)document.getElementById('bar2').setAttribute('class','barGreen');

        		if(JSONdata.parcial_3 < 6)document.getElementById('bar3').setAttribute('class','barRed');
        		else if(JSONdata.parcial_3 >=6 && JSONdata.parcial_3 <=7)document.getElementById('bar3').setAttribute('class','barYellow');
        		else if(JSONdata.parcial_3 >=8 && JSONdata.parcial_3 <=10)document.getElementById('bar3').setAttribute('class','barGreen');

        		if(JSONdata.parcial_4 < 6)document.getElementById('bar4').setAttribute('class','barRed');
        		else if(JSONdata.parcial_4 >=6 && JSONdata.parcial_4 <=7)document.getElementById('bar4').setAttribute('class','barYellow');
        		else if(JSONdata.parcial_4 >=8 && JSONdata.parcial_4 <=10)document.getElementById('bar4').setAttribute('class','barGreen');

     			var promedio = (JSONdata.parcial_1+JSONdata.parcial_2+JSONdata.parcial_3+JSONdata.parcial_4)/4;
     			console.log(promedio);   		
			}
			else
			{
				alert(JSONdata.errorMessage);
			}
    	}
	}
	x.send();
}


function fechas(){
	var body=document.getElementById('cuerpo');
}

function tablero(){
	var body=document.getElementById('cuerpo');
	body.innerHTML="";
	var div=document.createElement('div');
	div.setAttribute('id','mi-info');
	var table=document.createElement('table');
	var tr=document.createElement('tr');
	tr.setAttribute('class','rowheader');
	var td=document.createElement('td');
	td.setAttribute('rowspan',2);
}

function configuracion()
{
	var body = document.getElementById('cuerpo');
	var division = document.createElement('div');
	var divisionIma = document.createElement('div');
	var forma = document.createElement('form');
	var img = document.createElement('img');
	var span = document.createElement('span');

	body.setAttribute('class','');
	division.setAttribute('id','datosConfig');
	divisionIma.setAttribute('id','divIma');
	forma.setAttribute('id','formaConfig');
	forma.setAttribute('name','formaConfig');
	forma.setAttribute('method','post');
	img.setAttribute('onClick','cambiarContrasenia()');
	span.setAttribute('onClick','cambiarContrasenia()');	
	img.setAttribute('src','images/question_password.png');
	img.setAttribute('class','imagenPassword');
	span.setAttribute('class','tooltiptext');

	body.innerHTML = "";
	span.innerHTML = "Cambiar Contraseña";
	//method createP(parent,htmlTitle,cssClass)
	//method createInput(parent,htmlPlaceHolder,type,cssClass,value,id)
	createP(division,'Configuración','labelConfiguracion');
	createP(forma,'Correo Electronico:','label');
	createInput(forma,'Correo Electrónico','email','campo','','email','email');
	createP(forma,'Teléfono:','label');
	createInput(forma,'Teléfono','','campo','','tel','tel');
	createP(forma,'Constraseña:','label');
	createInput(forma,'Ingresa tu contraseña','password','campo','','passwordInput','pass');

	createInput(forma,'','hidden','campo','','matricula','matricula');
	createInput(forma,'','hidden','campo','','passSess','passSess');
	

	division.appendChild(forma);

	createInput(division,'','submit','button','Cancelar','btncancel');
	createInput(division,'','submit','button','Aceptar','btnok');
	createInput(division,'','submit','btnPassword','Cambiar Contraseña','btnPassword');

	body.appendChild(division);
	document.getElementById('btnok').setAttribute('onClick','realizarCambios()');
	document.getElementById('btnPassword').setAttribute('onClick','cambiarContrasenia()');
	//traer los datos 
	var email,tel,matri,pass;
	var x = new XMLHttpRequest();
	x.open("GET",'http://localhost:8080/Estadias/api/getalumnoinfo.php?matricula='+JSON.parse(sessionStorage['user']).User.userID,true);
	x.onreadystatechange = function() {//Call a function when the state changes.
    if(x.readyState == 4 && x.status == 200) {
       var JSONdata = JSON.parse(x.responseText);
			if (JSONdata.status == 0) 
			{
				email=JSONdata.email;
				tel = JSONdata.telefono;
				matri = JSON.parse(sessionStorage['user']).User.userID;
				pass = JSON.parse(sessionStorage['user']).User.password;
				document.getElementById('email').setAttribute('value',email);
				document.getElementById('tel').setAttribute('value',tel);
				document.getElementById('matricula').setAttribute('value',matri);
				document.getElementById('passSess').setAttribute('value',pass);
			}
			else
			{
				alert(JSONdata.errorMessage);
			}
    	}
	}
	x.send();
}
function validarContra(val,btn)
{
	if (val==null || val=="") {document.getElementById(btn).disabled=true}
	else
	if (val!=null || val!="") {document.getElementById(btn).disabled=false}
}
function realizarCambios()
{
	var email = document.getElementById('email').value;
	var tel = document.getElementById('tel').value;
	var contrasenia = document.getElementById('passwordInput').value;
	var matricula = JSON.parse(sessionStorage['user']).User.userID;
	var contraseniaSesion = JSON.parse(sessionStorage['user']).User.password;

	var x = new XMLHttpRequest();
	x.open("POST",'http://localhost:8080/Estadias/api/setConfig.php',true);
	x.send(new FormData(document.getElementById('formaConfig')));
	x.onreadystatechange = function()
	{
		if (x.readyState == 4 && x.status == 200) 
		{
			var JSONdata = JSON.parse(x.responseText);
			if (JSONdata.status == 0) 
				alert(JSONdata.descripccion);
			else
				alert(JSONdata.descripccion);
		}
	}
}
function realizarCambiosPass()
{
	var passActual = document.getElementById('passActual').value;
	var passRep = document.getElementById('passRep').value;
	var passNueva = document.getElementById('passNueva').value;
	var matricula = JSON.parse(sessionStorage['user']).User.userID;
	var contraseniaSesion = JSON.parse(sessionStorage['user']).User.password;

	var x = new XMLHttpRequest();
	x.open("POST",'http://localhost:8080/Estadias/api/setConfigPass.php',true);
	x.send(new FormData(document.getElementById('formPassword')));
	x.onreadystatechange = function()
	{
		if (x.readyState == 4 && x.status == 200) 
		{
			var JSONdata = JSON.parse(x.responseText);
			if (JSONdata.status == 0) 
				alert(JSONdata.descripccion);
			else
				alert(JSONdata.descripccion);
		}
	}
}
function cambiarContrasenia()
{
	//method createP(parent,htmlTitle,cssClass)
	//method createInput(parent,htmlPlaceHolder,type,cssClass,value)
	var cuerpo = document.getElementById('cuerpo');
	var bodyOpaca = document.getElementById('body');
	var divLateralOpaca = document.getElementById('menu-lateral');
	var divEnsima = document.createElement('div');
	var ima = document.createElement('img');
	var forma = document.createElement('form');

	cuerpo.setAttribute('class','opaca');
	divEnsima.setAttribute('id','divPassword');
	forma.setAttribute('id','formPassword');
	forma.setAttribute('method','POST');
	ima.setAttribute('src','images/exit_password.png')
	ima.setAttribute('onClick','normal();');
	ima.setAttribute('class','imaExitPassword');

	createP(forma,'Contraseña Actual:','label');
	createInput(forma,'Contraseña Actual','','campo','','passActual','passActual');
	createP(forma,'Repetir Contraseña:','label');
	createInput(forma,'Repetir Contraseña','password','campo','','passRep','passRep');
	createP(forma,'Contraseña Nueva:','label');
	createInput(forma,'Contraseña Nueva','password','campo','','passNueva','passNueva');
	createInput(forma,'','hidden','campo','','matriculaPASS','matriculaPASS');
	createInput(forma,'','hidden','campo','','passSessPASS','passSessPASS');
	divEnsima.appendChild(ima);
	bodyOpaca.appendChild(divEnsima);
	divEnsima.appendChild(forma);
	createInput(divEnsima,'','','button','Aceptar','idConfigPass');
	document.getElementById('idConfigPass').setAttribute('onClick','realizarCambiosPass()');
	
	var matri,pass;
	var x = new XMLHttpRequest();
	x.open("GET",'http://localhost:8080/Estadias/api/getalumnoinfo.php?matricula='+JSON.parse(sessionStorage['user']).User.userID,true);
	x.onreadystatechange = function() {//Call a function when the state changes.
    if(x.readyState == 4 && x.status == 200) {
       var JSONdata = JSON.parse(x.responseText);
			if (JSONdata.status == 0) 
			{
				
				matri = JSON.parse(sessionStorage['user']).User.userID;
				pass = JSON.parse(sessionStorage['user']).User.password;
				document.getElementById('matriculaPASS').setAttribute('value',matri);
				document.getElementById('passSessPASS').setAttribute('value',pass);

			}
			else
			{
				alert(JSONdata.errorMessage);
			}
    	}
	}
	x.send();
}

function normal()
{
	var cuerpo = document.getElementById('cuerpo');
	cuerpo.setAttribute('class','normal');
	var divLateralNormal = document.getElementById('menu-lateral');
	var body = document.getElementById('body');
	var divEnsimaRemove = document.getElementById('divPassword');
	body.removeChild(divEnsimaRemove);
}

function dashboard(){

	var cuerpo=	document.getElementById('cuerpo');
	cuerpo.innerHTML=" ";
	var fecha= new Date();
	var meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];


	var divDQ=createDiv('divDQ');
		var table=document.createElement('table');
		table.setAttribute('id','tableDQ');
		var tr=document.createElement('tr');
		var td=document.createElement('td');
		td.setAttribute('id','numDia');
		td.innerHTML=fecha.getDate();
		td.setAttribute('rowspan',2);
		tr.appendChild(td);
		var td=document.createElement('td');
		td.setAttribute('id','nomMes');
		td.innerHTML=meses[fecha.getMonth()];
		tr.appendChild(td);
		var td=document.createElement('td');
		td.setAttribute('id','frase');
		td.setAttribute('rowspan',2);
		td.innerHTML='"A veces una herida te recuerda que estas vivo, es esto el amor, mi estupida muerte, como explicartelo, si no estas viva"';
		tr.appendChild(td);
		table.appendChild(tr);
		var tr=document.createElement('tr');
		var td=document.createElement('td');
		td.setAttribute('id','anio');
		td.innerHTML=fecha.getFullYear();
		tr.appendChild(td);
		table.appendChild(tr);
		cuerpo.appendChild(table);
}
/*ALTA - FIN*/
