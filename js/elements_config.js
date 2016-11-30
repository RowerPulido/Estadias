function createP(parent,htmlTitle,cssClass)
{
	var parrafo = document.createElement('p');
	parrafo.setAttribute('class',cssClass);
	parrafo.innerHTML = htmlTitle;
	//parrafo.setAttribute('class','cssClass');

	parent.appendChild(parrafo);
	return parrafo;
}
function createInput(parent,htmlPlaceHolder,type,cssClass,value,id,name)
{
	var input = document.createElement('input');
	input.setAttribute('type',type);
	input.setAttribute('placeholder',htmlPlaceHolder);
	input.setAttribute('class',cssClass);
	input.setAttribute('value',value);
	input.setAttribute('id',id);
	input.setAttribute('name',name);

	parent.appendChild(input);
	return input;
}

function createDatalist(id,cssClass){
	var dl=document.createElement('datalist');
	dl.setAttribute('id',id);
	dl.setAttribute('class',cssClass);
	return dl;
}
function insertImg(parent,direccion,id,cssClass){
	var img=document.createElement('img');
	img.setAttribute('src',direccion);
	img.setAttribute('id',id);
	img.setAttribute('class',cssClass);

	parent.appendChild(img);
}

function createSelect(id,cssClass){
	var s=document.createElement('select');
	s.setAttribute('id',id);
	s.setAttribute('class',cssClass);

	return s;
}
function createDiv(id,cssClass){

	var div=document.createElement('div');
	div.setAttribute('id',id);
	div.setAttribute('class',cssClass);

	return div;
}

//create options
function createOption(displayValue, displayText)
{
	var o= document.createElement('option');
	o.setAttribute('value',displayValue);
	o.innerHTML=displayText;
	return o;
}

function createForm(name,id,method){
	var form=document.createElement('form');
	form.setAttribute('id',id);
	form.setAttribute('name',name);
	form.setAttribute('method',method);

	return form;

}

function createLabel(forE,textHtml,id){
	var label=document.createElement('label');
	label.setAttribute('for',forE);
	label.innerHTML=textHtml;
	label.setAttribute('id',id);

	return label;
}

