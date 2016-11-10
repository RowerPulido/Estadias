function createP(parent,htmlTitle,cssClass)
{
	var parrafo = document.createElement('p');
	parrafo.innerHtml = htmlTitle;
	parrafo.setAttribute('class','cssClass');

	parent.appentChild(parrafo);

}