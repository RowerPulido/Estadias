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
var user=
[
	'Jorge Pulido',
	'0315110132',
	'4A',
	'DOMOTICA',
	'e-House'
]

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
    for(var n = 1; n<=3;n++){
        var x = 500 / 3;
        var y =80+(n*x)+(x*0.1);
        writeText(svgParent,'nameParcial','28%',y+'px','Parcial '+n,'parcialName')
    }
    for (var r = 1; r<=3; r++){
        var x = 500 / 3;
        var y= 1+(r*x)+(x*0.1);
        var h= x*0.8;
        drawRectangle(svgParent,'bar'+r,'30%',y+'px','1%',h+'px','bar')
    }
    body.appendChild(svgParent);
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
	//method createInput(parent,htmlPlaceHolder,type,cssClass,value)
	createP(division,'Configuración','labelConfiguracion');
	createP(forma,'Correo Electronico:','label');
	createInput(forma,'Correo Electrónico','email','campo','','');
	createP(forma,'Teléfono:','label');
	createInput(forma,'Teléfono','','campo','','');
	createP(forma,'Constraseña:','label');
	createInput(forma,'Ingresa tu contraseña','password','campo','','');

	forma.appendChild(divisionIma);
	divisionIma.appendChild(span);
	divisionIma.appendChild(img);
	division.appendChild(forma);

	createInput(division,'','submit','button','Cancelar','');
	createInput(division,'','submit','button','Aceptar','');

	body.appendChild(division);
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
	createInput(forma,'Contraseña Actual','','campo','','');
	createP(forma,'Repetir Contraseña:','label');
	createInput(forma,'Repetir Contraseña','password','campo','','');
	createP(forma,'Contraseña Nueva:','label');
	createInput(forma,'Contraseña Nueva','password','campo','');
	createInput(forma,'','','button','Aceptar','idConfigPass');
	divEnsima.appendChild(ima);
	bodyOpaca.appendChild(divEnsima);
	divEnsima.appendChild(forma);
	var btnok= document.getElementById('idConfigPass');console.log('ok');
	btnok.setAttribute('onClick','normal();');
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