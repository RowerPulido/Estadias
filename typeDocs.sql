use estadias;

select * from Calificacion.Calificaciones;

select * from documento.typesofdocs

insert into Documento.typesofdocs values(1, 'Antecedentes de la empresa'); 
insert into Documento.typesofdocs values(2, 'Descripcion del area de trabajo'); 
insert into Documento.typesofdocs values(3, 'Descripcion del problema y objetivos'); 
insert into Documento.typesofdocs values(4, 'Marco de referencia tecnico'); 
insert into Documento.typesofdocs values(5, 'Propuesta de solucion(Desarrollo del proyecto)'); 
insert into Documento.typesofdocs values(6, 'Resultados obtenidos'); 
insert into Documento.typesofdocs values(7, 'Conclusiones y recomencadiones'); 
insert into Documento.typesofdocs values(8, 'Bibliografia, indice e introduccion'); 
insert into Documento.typesofdocs values(9, 'Alta de estadia'); 
insert into Documento.typesofdocs values(10, 'Finalizacion de estadia'); 

select p1 from Calificacion.calificaciones where matricula='0315110142' and p1=9

alta
baja
