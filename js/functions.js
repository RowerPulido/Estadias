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

var alum='';
var tut='';
var user = '';
var alums;
var emps=[];
	loadEmpresas();loadAlumnos();
var typeofuser=JSON.parse(sessionStorage['user']).User.UserType.IDtype;

function initAlum(){
	if(sessionStorage['user'])
	{
		menuOfUser();
		dashboard();
		divTwitter();
		createNotification();
		document.getElementById('user-id').innerHTML = JSON.parse(sessionStorage['user']).User.userID;
		document.getElementById('user-name').innerHTML = JSON.parse(sessionStorage['user']).User.Nombre;
		console.log(sessionStorage['user']);
	}
	else
	{
		//redirect to login
		sessionStorage['previouspage'] = document.URL;
		window.location = 'login.html';
	}

}
// Función que suma o resta días a la fecha indicada
sumaFecha = function(d, fecha)
{
	 var Fecha = new Date();
	 var sFecha = fecha || (Fecha.getDate() + "/" + (Fecha.getMonth() +1) + "/" + Fecha.getFullYear());
	 var sep = sFecha.indexOf('/') != -1 ? '/' : '-'; 
	 var aFecha = sFecha.split(sep);
	 var fecha = aFecha[2]+'/'+aFecha[1]+'/'+aFecha[0];
	 fecha= new Date(fecha);
	 fecha.setDate(fecha.getDate()+parseInt(d));
	 var anno=fecha.getFullYear();
	 var mes= fecha.getMonth()+1;
	 var dia= fecha.getDate();
	 mes = (mes < 10) ? ("0" + mes) : mes;
	 dia = (dia < 10) ? ("0" + dia) : dia;
	 var fechaFinal = dia+sep+mes+sep+anno;
	 return (fechaFinal);
 }
function checkIsMonday(){
	var d=document.getElementById('inInicio').value;
	console.log(d);


	var anio=parseInt(d.charAt(0)+d.charAt(1)+d.charAt(2)+d.charAt(3));
	var mes=parseInt(d.charAt(5)+d.charAt(6))-1;
	var dia=parseInt(d.charAt(8)+d.charAt(9));
	var fecha= new Date(anio,mes,dia);

	if (fecha.getUTCDay()!=1) {
		window.alert("Debe seleccionar un dia lunes para el inicio  de estadias");
	}
}

function menuOfUser(){
var divInicio=document.getElementById('inicio');
var divDocumentos=document.getElementById('documentos');
var divEstadisticas=document.getElementById('estadisticas');
var divConfiguracion=document.getElementById('configuracion');
var estadisticas1=document.getElementById('estadisticas1');
	if (typeofuser=="ALUs") {
		alumDatos(JSON.parse(sessionStorage['user']).User.userID);
		estadisticas1.style.display='none';
	}
}

function alumDatos(){
var matricula=document.getElementById('inMatricula').value;
console.log(matricula);
	var x = new XMLHttpRequest();
	x.open("GET",'http://localhost:8080/Estadias/api/get_alumno.php?matricula='+matricula,true);
	x.send();
	x.onreadystatechange = function()
	{
		if (x.readyState == 4 && x.status == 200) 
		{	

			var JSONdata = JSON.parse(x.responseText);
			if (JSONdata.status == 0) 
			{
				alum=JSONdata.alumno[0];
				console.log(alum);
			}
			else
			{
				console.log("no sirve");
			}
		}

	}
}
function registrarEstadia(){
	var body = document.getElementById('cuerpo');

	cuerpo.innerHTML='';
		var frmRegistro= createForm('frmRegistro','frmRegistro','post');
		var divAlum= createDiv('divAlum');
		var divAlumMat=createDiv('divAlumMat');
			var lblMatricula=createLabel('inMatricula','Matricula Alumno:','lblMatricula');
			divAlumMat.appendChild(lblMatricula);
			var inMatricula=createInput(divAlumMat,'Ingrese la matricula aqui...','text','inRegistro','','inMatricula','matricula');
			var dlAlums=createDatalist('dlAlums');
			for (var i=0; i<alums.length;i++) {
				var oAlum=createOption(alums[i][0],alums[i][1]);
				dlAlums.appendChild(oAlum);
			}
			divAlumMat.appendChild(dlAlums);
			divAlum.appendChild(divAlumMat);
			inMatricula.setAttribute('list','dlAlums');
			
			var divAlumDir=createDiv('divAlumDir');
			var lblAlumDir=createLabel('inAlumDir','Direccion Alumno:','lblAlumDir');
			divAlumDir.appendChild(lblAlumDir);
			var inAlumDir=createInput(divAlumDir,'Ingrese direccion Alumno','text','inRegistro','','inAlumDir','AlumDir');
			divAlum.appendChild(divAlumDir);

			var divAlumTel=createDiv('divAlumTel');
			var lblAlumTel=createLabel('inAlumTel','Telefono Alumno:','lblAlumTel');
			divAlumTel.appendChild(lblAlumTel);
			var inAlumTel=createInput(divAlumTel,'Ingrese Telefono Alumno','text','inRegistro','','inAlumTel','AlumTel');
			divAlum.appendChild(divAlumTel);

			var divAlumEmail=createDiv('divAlumEmail');
			var lblAlumTel=createLabel('inAlumEmail','e-Mail Alumno:','lblAlumEmail');
			divAlumEmail.appendChild(lblAlumTel);
			var inAlumTel=createInput(divAlumEmail,'Ingrese e-Mail Alumno','email','inRegistro','','inAlumEmail','AlumEmail');
			divAlum.appendChild(divAlumEmail);

		frmRegistro.appendChild(divAlum);
		inMatricula.setAttribute('oninput','alumDatos();');

		var divEmp=createDiv('divEmp');

			var lblEmpNom=createLabel('inEmpNom','Nombre empresa:','lblEmpNom');
			divEmp.appendChild(lblEmpNom);
			var inEmpNom=createInput(divEmp,'Nombre ...','text','inRegistro','','inEmpNom','empresa');
			var dlEmps=createDatalist('dlEmps');
			for (var i=0; i<emps.length;i++) {
				var oEmp=createOption(emps[i],emps[i]);
				dlEmps.appendChild(oEmp);
			}
			divEmp.appendChild(dlEmps);
			inEmpNom.setAttribute('list','dlEmps');
		frmRegistro.appendChild(divEmp);

		var divEst=createDiv('divEst');
			var divProNom=createDiv('divProNom');
			var lblProNom=createLabel('inProNom','Nombre del proyecto:','lblProNom');
				divProNom.appendChild(lblProNom);
			var inProNom=createInput(divProNom,'Nombre Proyecto','text','inRegistro','','inProNom','proNom');
				divEst.appendChild(divProNom);

				var divEstArea=createDiv('divEstArea');
			var lblEstArea=createLabel('inEstArea','Area Estadias','lblEstArea');
				divEstArea.appendChild(lblEstArea);
			var inProNom=createInput(divEstArea,'Area Estadias','text','inRegistro','','inEstArea','estArea');
			divEst.appendChild(divEstArea);
			
			var divAse=createDiv('divAse');
			var lblAseNom=createLabel('inAseNom','Nombre De Asesor:','lblAseNom');
				divAse.appendChild(lblAseNom);
			var inAseNom=createInput(divAse,'Nombre de asesor','text','inRegistro','','inAseNom','AseNom');
				divEst.appendChild(divAse);
				
			var lblAsePat=createLabel('inAsePat','Apellido Paterno De Aseso:','lblAsePat');
				divAse.appendChild(lblAsePat);
			var inAsePat=createInput(divAse,'Apellido Paterno De Aseso','text','inRegistro','','inAsePat','AsePat');
			//	divEst.appendChild(inEstArea);

			var lblAseMat=createLabel('inAseMat','Apellido Materno De Aseso:','lblAseNom');
				divAse.appendChild(lblAseMat);
			var inAseNom=createInput(divAse,'Apellido materno De Aseso','text','inRegistro','','inAseMat','AseMat');
			//	divEst.appendChild(inEstArea);

			var lblAseCar=createLabel('inAseCar','Puesto del asesor:','lblAseCar');
				divAse.appendChild(lblAseCar);
			var inAseCar=createInput(divAse,'Puesto del asesor','text','inRegistro','','inAseCar','AseCar');
			//	divEst.appendChild(inEstArea);

			var divEstVis=createDiv('divEstVis');
			var lblEstVis=createLabel('inEstVis','Dias de visita a su estadia:','lblEstVis');
				divEstVis.appendChild(lblEstVis);
			var inEstVis=createInput(divEstVis,'Dias de visita a su estadia:','text','inRegistro','','inEstVis','EstVis');
			divEst.appendChild(divEstVis);

			var divHrs= createDiv('divHrs');
			var lblEstHr1=createLabel('inEstHr1','Hora de entrada:','lblEstHr1');
				divHrs.appendChild(lblEstHr1);
			var inEstHr1=createInput(divHrs,'Hora de entrada::','time','inRegistro','','inEstHr1','EstHr1');
				inEstHr1.value='07:00';
			var lblEstHr2=createLabel('inEstHr2','Hora de salida:','lblEstHr2');
				divHrs.appendChild(lblEstHr2);
			var inEstHr2=createInput(divHrs,'Hora de salida:','time','inRegistro','','inEstHr2','EstHr2');
			inEstHr2.value='16:00';
			inEstHr2.setAttribute('onfocusout','check9Hours()');
			divEst.appendChild(divHrs);

			var divEstEco=createDiv('divEstEco');
			var lblEstEco=createLabel('inEstEco','Apoyo Economico via UTT:','lblEstEco');
				divEstEco.appendChild(lblEstEco);
			var inEstEco=createInput(divEstEco,'Cantidad apoyo','number','inRegistro','','inEstEco','EstEco');
				inEstEco.setAttribute('min',0);
				divEst.appendChild(divEstEco);
			frmRegistro.appendChild(divEst);

			var divProObj=createDiv('divProObj');
			
			var lblProObj=createLabel('inProObj','Objetivos del proyecto','lblProObj');
			divProObj.appendChild(lblProObj);
			var inProObj=createInput(divProObj,'Ingrese los objetivos del proyecto','text','inRegistro','','inProObj','ProObj');
			
			frmRegistro.appendChild(divProObj);
		
			var divProAct=createDiv('divProAct');
				var thoras=0;
				//var horasS=horasSem();
				var divInicio=createDiv('divInicio');
				var lblInicio=createLabel('inInicio','Inicio de Estadias:','lblInicio');
					divInicio.appendChild(lblInicio);
				var inInicio=createInput(divInicio,'Fecha inicio Estadias','date','inRegistro','dd:mm:yyyy','inInicio','Inicio');
					inInicio.setAttribute('oninput','checkIsMonday();');
					divProAct.appendChild(divInicio);

				var divAct1=createDiv('divAct1');
				var lblAct1=createLabel('inAct1','Nombre de Actividad 1:','lblAct1');
					divAct1.appendChild(lblAct1);
				var inAct1=createInput(divAct1,'Nombre actividad 1','text','inRegistro','','inAct1','Act1');

				var lblAct1Dur=createLabel('inAct1Dur','Duracion Actividad 1 :','lblAct1Dur');
					divAct1.appendChild(lblAct1Dur);
				var inAct1Dur=createInput(divAct1,'Duracion Actividad 1','number','inRegistro','','inAct1Dur','Act1Dur');
					inAct1Dur.setAttribute('min',0);

					divProAct.appendChild(divAct1);

				var divAct2=createDiv('divAct2');
				var lblAct2=createLabel('inAct2','Nombre de Actividad 2:','lblAct2');
					divAct2.appendChild(lblAct2);
				var inAct2=createInput(divAct2,'Nombre actividad 2','text','inRegistro','','inAct2','Act2');
				
				var lblAct2Dur=createLabel('inAct2Dur','Duracion Actividad 2 :','lblAct2Dur');
					divAct2.appendChild(lblAct2Dur);
				var inAct2Dur=createInput(divAct2,'Duracion Actividad 2','number','inRegistro','','inAct2Dur','Act2Dur');
					inAct2Dur.setAttribute('min',0);
					divProAct.appendChild(divAct2);

				var divAct3=createDiv('divAct3');
				var lblAct3=createLabel('inAct3','Nombre de Actividad 3:','lblAct3');
					divAct3.appendChild(lblAct3);
				var inAct3=createInput(divAct3,'Nombre actividad 3','text','inRegistro','','inAct3','Act3');
				
				var lblAct3Dur=createLabel('inAct3Dur','Duracion Actividad 3 :','lblAct3Dur');
					divAct3.appendChild(lblAct3Dur);
				var inAct3Dur=createInput(divAct3,'Duracion Actividad 3','number','inRegistro','','inAct3Dur','Act3Dur');
					inAct3Dur.setAttribute('min',0);
					divProAct.appendChild(divAct3);

				var divAct4=createDiv('divAct4');
				var lblAct4=createLabel('inAct4','Nombre de Actividad 4:','lblAct4');
					divAct4.appendChild(lblAct4);
				var inAct4=createInput(divAct4,'Nombre actividad 4','text','inRegistro','','inAct4','Act4');
				
				var lblAct4Dur=createLabel('inAct4Dur','Duracion Actividad 4 :','lblAct4Dur');
					divAct4.appendChild(lblAct4Dur);
				var inAct4Dur=createInput(divAct4,'Duracion Actividad 4','number','inRegistro','','inAct4Dur','Act4Dur');
				inAct4Dur.setAttribute('min',0);
				divProAct.appendChild(divAct4);

				var divAct5=createDiv('divAct5');
				var lblAct5=createLabel('inAct5','Nombre de Actividad 5:','lblAct5');
					divAct5.appendChild(lblAct5);
				var inAct5=createInput(divAct5,'Nombre actividad 5','text','inRegistro','','inAct5','Act5');
				
				var lblAct5Dur=createLabel('inAct5Dur','Duracion Actividad 5 :','lblAct5Dur');
					divAct5.appendChild(lblAct5Dur);
				var inAct5Dur=createInput(divAct5,'Duracion Actividad 5','number','inRegistro','','inAct5Dur','Act5Dur');
				inAct5Dur.setAttribute('min',0);
				divProAct.appendChild(divAct5)

			frmRegistro.appendChild(divProAct);
	body.appendChild(frmRegistro);
	var btnRegistrar=createInput(body,'Registrar','button','btn','Registrar','btnRegistrar','btnRegistrar');
	btnRegistrar.setAttribute('onclick','checkRegistro();');
}
function checkRegistro(){
	check9Hours();
	checkIsMonday();
	check13Sem();

	var x = new XMLHttpRequest();
	x.open("POST",'http://localhost:8080/Estadias/api/generateAlta.php',true);
	x.send(new FormData(document.getElementById('frmRegistro')));
	x.onreadystatechange = function()
	{
		if (x.readyState == 4 && x.status == 200) 
		{
			
		}
		console.log(x);
	}
}


function check13Sem(){
	var act1=parseInt(document.getElementById('inAct1Dur').value);
	var act2=parseInt(document.getElementById('inAct2Dur').value);
	var act3=parseInt(document.getElementById('inAct3Dur').value);
	var act4=parseInt(document.getElementById('inAct4Dur').value);
	var act5=parseInt(document.getElementById('inAct5Dur').value);
	
	if (act1+act2+act3+act4+act5<13) {
		window.alert("ERROR: la Duracion minima de estadias es de 13 semanas");
	}
}
function check9Hours(){
	var hora1=document.getElementById('inEstHr1').value;
	var hora2=document.getElementById('inEstHr2').value;

	hora1=parseInt(hora1.charAt(0)+hora1.charAt(1));
	hora2=parseInt(hora2.charAt(0)+hora2.charAt(1));

	if ((hora2-hora1)<9) {window.alert("Horas invalidas, deben ser minimo 9 horas diarias");}

	var horaB=document.getElementById('inEstHr2').value;
	var shora=(hora1+9)+':00';
	document.getElementById('inEstHr2').value=shora;
}

function horasSem(){
	var hora1=document.getElementById('inEstHr1').value;
	var hora2=document.getElementById('inEstHr2').value;
	hora1=parseInt(hora1.charAt(0)+hora1.charAt(1));
	hora2=parseInt(hora2.charAt(0)+hora2.charAt(1));

	var thoras=hora2-hora1;

	return thoras;
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
	var td=document.createElement('td');
	td.setAttribute('class','rowheader');
	td.innerHTML="Fecha Limite";
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
        		else if(JSONdata.parcial_1 >=6 && JSONdata.parcial_1 <=7)document.getElementById('bar1').setAttribute('class','barYellow');
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
				console.log(JSONdata.errorMessage);
			}
    	}
	}
	x.send();
}

function calis(){
    
    var body=document.getElementById('cuerpo');
	body.innerHTML="";
	body.setAttribute('class','');
	var p= document.createElement('p');
	p.innerHTML="Calificaciones de los alumnos";
	body.appendChild(p);
	
    var x = new XMLHttpRequest();
    var fGrupos = document.createElement('form');
    fGrupos.setAttribute('id','fGrupos');
	x.open('GET', 'http://localhost:8080/Estadias/api/get_all_grupos.php?group=', true);
	x.send();
	
	x.onreadystatechange = function()
	{
		if(x.status == 200 && x.readyState == 4)
		{
            var JSONdata = JSON.parse(x.responseText);
            console.log(JSONdata);
	
	        if(JSONdata.status == 0)
            {
                var grupos = JSONdata.grupos;
                console.log(grupos);

                var ini = 0;
                var sGrupos = document.createElement('select');
                sGrupos.setAttribute('id','group');
                sGrupos.setAttribute('class','selects');
		        sGrupos.setAttribute('onchange','actGrupos(this.value);');
                
                body.appendChild(fGrupos);
                fGrupos.appendChild(sGrupos);
                
                for(var i = 0; i < grupos.length; i++)
                {
                    var g = grupos[i];
                    
                    var nom = g.id + ' ' + g.carrera + ' ' + g.tutor;
                    console.log(nom);
		            sGrupos.appendChild(createOption(g.id,g.id));
			         
		      }	
	       }
		}        
	}	
    
    var table=document.createElement('table');
	table.setAttribute('id','tabla-alums');
	var tr =document.createElement('tr');
	var td=document.createElement('td');
	td.setAttribute('class','rowheader');
	td.innerHTML="Matricula";
	tr.appendChild(td);
	var td=document.createElement('td');
	td.setAttribute('class','rowheader');
	td.innerHTML="Nombre";
	tr.appendChild(td);    
	var td=document.createElement('td');
	td.setAttribute('class','rowheader');
	td.innerHTML="Parcial 1";
	tr.appendChild(td);
	var td=document.createElement('td');
	td.setAttribute('class','rowheader');
	td.innerHTML="Parcial 2";
	tr.appendChild(td);
	var td=document.createElement('td');
	td.setAttribute('class','rowheader');
	td.innerHTML="Parcial 3";
	tr.appendChild(td);
	var td=document.createElement('td');
	td.setAttribute('class','rowheader');
	td.innerHTML="Parcial 4";
	tr.appendChild(td);
	table.appendChild(tr);	
	
	body.appendChild(table);
}

function actGrupos(grupo){
    var x = new XMLHttpRequest();

	x.open('GET', 'http://localhost:8080/Estadias/api/get_alumno_by_group.php?group='+grupo,'true');
	
	x.onreadystatechange = function()
	{
		if(x.status == 200 && x.readyState == 4)
		{
            var JSONdata = JSON.parse(x.responseText);
            console.log(JSONdata);
	
	        if(JSONdata.status == 0)
            {
                var alumns = JSONdata.alumnos;
                console.log(alumns);
                
                var ini = 0;
                
                for(var i = 0; i < alumns.length; i++)
                {
                    var a = alumns[i];
			         
                    var nom = a.nombre + ' ' + a.apellidoPaterno + ' ' + a.apellidoMaterno;
                    console.log(nom);
                    var table = document.getElementById('tabla-alums');
                    
                        var tr=document.createElement('tr');
                        var td = document.createElement('td');
                        td.innerHTML=a.matricula;
                        td.setAttribute('class','rownormal');
                        tr.appendChild(td);	
                        var td = document.createElement('td');
                        td.innerHTML=nom;
                        td.setAttribute('class','rownormal');
                        tr.appendChild(td);
                        tr.setAttribute('class','rowtable-docs');
                        table.appendChild(tr);
                    
		      }	
	       }
		}
        console.log(x);
	}
    x.send();
}

function calificar(){
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

	createP(forma,'Primer Parcial:','label');
	createInput(forma,'Primer Parcial','','campo','','fstParcial','fstParcial');
	createP(forma,'Segundo Parcial:','label');
	createInput(forma,'Segundo Parcial','','campo','','scndParcial','scndParcial');
	createP(forma,'Tercer Parcial:','label');
	createInput(forma,'Tercer Parcial','','campo','','thrdParcial','thrdParcial');
	createP(forma,'Cuarto Parcial:','label');
	createInput(forma,'Cuarto Parcial','','campo','','frthParcial','frthParcial');
	divEnsima.appendChild(ima);
	bodyOpaca.appendChild(divEnsima);
	divEnsima.appendChild(forma);
	createInput(divEnsima,'','','button','Aceptar','acceptCalif');
	document.getElementById('idConfigPass').setAttribute('onClick','cambioCalif()');
	
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
	createInput(forma,'','hidden','campo','','tipouser','tipouser');
	

	division.appendChild(forma);

	createInput(division,'','submit','button','Cancelar','btncancel');
	createInput(division,'','submit','button','Aceptar','btnok');
	createInput(division,'','submit','btnPassword','Cambiar Contraseña','btnPassword');

	body.appendChild(division);
	document.getElementById('btnok').setAttribute('onClick','realizarCambios()');
	document.getElementById('btnPassword').setAttribute('onClick','cambiarContrasenia()');
	//traer los datos 
	var email,tel,matri,pass,tipouser;
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
				tipouser = JSON.parse(sessionStorage['user']).User.UserType.IDtype;
				document.getElementById('email').setAttribute('value',email);
				document.getElementById('tel').setAttribute('value',tel);
				document.getElementById('matricula').setAttribute('value',matri);
				document.getElementById('passSess').setAttribute('value',pass);
				document.getElementById('tipouser').setAttribute('value',tipouser);
				
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
	var tipouser = JSON.parse(sessionStorage['user']).User.UserType.IDtype;
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
	console.log(x);
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
	console.log(x);
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
function loadEmpresas(){

	var x = new XMLHttpRequest();
	x.open("GET",'http://localhost:8080/Estadias/api/getEmpresa.php',true);
	x.send();
	x.onreadystatechange = function()
	{
		if (x.readyState == 4 && x.status == 200) 
		{
			var JSONdata = JSON.parse(x.responseText);
			if (JSONdata.status == 0){
				for(var i=0; i<JSONdata.Empresas.length;i++)
					{
						emps[i]=JSONdata.Empresas[i].name;	
					}
				}
			else
				alert(JSONdata.descripccion);
		}
	}
}

function loadAlumnos(){
	var x = new XMLHttpRequest();
	x.open("GET",'http://localhost:8080/Estadias/api/get_all_alumnos.php',true);
	x.send();
	x.onreadystatechange = function()
	{
		if (x.readyState == 4 && x.status == 200) 
		{
			var JSONdata = JSON.parse(x.responseText);
			if (JSONdata.status == 0){
				var matriz=new Array();
				for(var i=0; i<JSONdata.alumnos.length;i++)
					{
						matriz[i]=new Array(2);
						var fullname=JSONdata.alumnos[i].apellidoPaterno+" "+JSONdata.alumnos[i].nombre;

						matriz[i][1]=fullname;
						matriz[i][0]=JSONdata.alumnos[i].matricula;
					}
				}
			else
				alert(JSONdata.descripccion);
			alums=matriz;
		}
	}
}
/*ALTA - FIN*/
