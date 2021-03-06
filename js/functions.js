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

function misCalis(){
	var body=document.getElementById('cuerpo');
}

function fechas(){
	var body=document.getElementById('cuerpo');
}

function tablero(){
	var body=document.getElementById('cuerpo');
	var div=document.createElement('div');
	div.setAttribute('id','mi-info');
	var table=document.createElement('table');
	var tr=document.createElement('tr');
	tr.setAttribute('class','rowheader');
	var td=document.createElement('td');
	td.setAttribute('rowspan',2);
}