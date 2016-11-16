function createP(parent,htmlTitle,cssClass)
{
	var parrafo = document.createElement('p');
	parrafo.setAttribute('class',cssClass);
	parrafo.innerHTML = htmlTitle;
	//parrafo.setAttribute('class','cssClass');

	parent.appendChild(parrafo);
}
function createInput(parent,htmlPlaceHolder,type,cssClass,value,id)
{
	var input = document.createElement('input');
	input.setAttribute('type',type);
	input.setAttribute('placeholder',htmlPlaceHolder);
	input.setAttribute('class',cssClass);
	input.setAttribute('value',value);
	input.setAttribute('id',id);

	parent.appendChild(input);
}