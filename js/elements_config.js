function createP(parent,htmlTitle)
{
	var parrafo = document.createElement('p');
	parrafo.innerHTML = htmlTitle;
	//parrafo.setAttribute('class','cssClass');

	parent.appendChild(parrafo);
}
function createInput(parent,htmlPlaceHolder,type,cssClass,value)
{
	var input = document.createElement('input');
	input.setAttribute('type',type);
	input.setAttribute('placeholder',htmlPlaceHolder);
	input.setAttribute('class',cssClass);
	input.setAttribute('value',value);

	parent.appendChild(input);
}