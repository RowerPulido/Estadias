function drawLine(svgParent,x1,y1,x2,y2,cssClass){
    var line = document.createElementNS('http://www.w3.org/2000/svg','line');
    line.setAttribute('x1',x1);
    line.setAttribute('y1',y1);
    line.setAttribute('x2',x2);
    line.setAttribute('y2',y2);
    
    line.setAttribute('class',cssClass);
    
    svgParent.appendChild(line);
    
}
function writeText(svgParent,id,x,y,innetText,cssClass){
    var t = document.createElementNS('http://www.w3.org/2000/svg','text');
    t.setAttribute('x',x);
    t.setAttribute('y',y);
    
    t.innerHTML = innetText;
    t.setAttribute('class',cssClass);
    svgParent.appendChild(t);
}

function drawRectangle(svgParent,id,x,y,width,height,cssClass){
    var r = document.createElementNS('http://www.w3.org/2000/svg','rect');
    r.setAttribute('id',id);
    r.setAttribute('x',x);
    r.setAttribute('y',y);
    r.setAttribute('width',width);
    r.setAttribute('height',height);
    r.setAttribute('class',cssClass);
    svgParent.appendChild(r);
}

function createSvg(parent,id){
    var svg=document.createElementNS('http://www.w3.org/2000/svg','svg');
    svg.setAttribute('id',id);
    parent.appendChild(svg);
    return svg;
}