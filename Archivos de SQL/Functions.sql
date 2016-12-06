use Estadias;
-----------------------
--TRAE LAS ACTIVIDADES --drop function actn
-----------------------
create function actn(@numAct int,@proyecto int)
returns @tabla table(
nombre varchar(50) not null,
inicio date,
fin date,
horas int,
proyecto int)
as
begin
	insert @tabla
	select nombre,inicio,fin,horas,proyecto from (select ROW_NUMBER() 
	over(order by inicio asc)as Row,nombre,inicio ,fin ,horas,proyecto
	from Estadia.Actividades
	where proyecto=@proyecto
	) as Act
	where Row=@numAct;
	RETURN;
end

select * from getInfoEst('0315110133');
select * from Estadia.Actividades

select * from usuario.mensajes

insert into usuario.mensajes values('hola mundo','0315110132','0315110133','2016-12-8');
--MUESTRA TODA LA INFO PARA EL DOCUMENTO DE ALTA -- SELECT * FROM getInfoEst('0315110133');--drop function getInfoEst
----------------------------------
create function getInfoEst(@matricula char(10))
	returns @tabla table(
	carrera varchar(50),
	director varchar(50),
	grupo char(11),
	alumNom varchar(150),
	alumDir varchar(50),
	alumTel char(10),
	alumEmail varchar(50),
	empNom varchar(50),
	empDir varchar(50),
	empCon varchar(80),
	proNom varchar(50),
	area varchar(50),
	aseEmp varchar(250),
	visita varchar(50),
	tutor varchar(200),
	horario varchar(30),
	apoyo char(10),
	objetivos varchar(250),
	act1Nom varchar(50),act1ini varchar(15),act1fin varchar(15),act1horas int,
	act2Nom varchar(50),act2ini varchar(15),act2fin varchar(15),act2horas int,
	act3Nom varchar(50),act3ini varchar(15),act3fin varchar(15),act3horas int,
	act4Nom varchar(50),act4ini varchar(15),act4fin varchar(15),act4horas int,
	act5Nom varchar(50),act5ini varchar(15),act5fin varchar(15),act5horas int,
	horasTotales smallint
	)
	AS
	BEGIN
		declare @pro int;
		set @pro= (
		select id 
		from Estadia.proyectos
		where Alumno=@matricula)
		
		INSERT @tabla
		select car.name carrera,car.nombreDirecto director,a.grupo grupo,(a.nombres +' '+a.paterno+' '+a.materno)nomAlum,
		ca.direccion direccion,ca.telefono telefono,ca.email,emp.nombre,emp.direccion,(emp.telefono+', email:'+emp.email),
		pro.nombre,es.deptoEmp area,(asemp.nombre+' '+asemp.paterno+' '+asemp.materno+', '+asemp.cargo)aseEmp,
		es.fechasVisita visita,(tut.numbres+' '+tut.paterno+' '+tut.materno) tutor,(CONVERT(nvarchar(5), es.horaEntrada, 108)+'-'+ CONVERT(nvarchar(5), es.horaSalida, 108))horario,
		es.apoyoEconomico apoyo,pro.objetivos,
		act1.nombre act1nom,CONVERT( VARCHAR ,act1.inicio , 103 ) act1ini,CONVERT( VARCHAR ,act1.fin, 103 ) act1fin,act1.horas act1horas,
		act2.nombre act2nom,CONVERT( VARCHAR ,act2.inicio , 103 ) act2ini,CONVERT( VARCHAR ,act2.fin, 103 ) act2fin,act2.horas act2horas,
		act3.nombre act3nom,CONVERT( VARCHAR ,act3.inicio , 103 ) act3ini,CONVERT( VARCHAR ,act3.fin, 103 ) act3fin,act3.horas act3horas,
		act4.nombre act4nom,CONVERT( VARCHAR ,act4.inicio , 103 ) act4ini,CONVERT( VARCHAR ,act4.fin , 103 ) act4fin,act4.horas act4horas,
		act5.nombre act5nom,CONVERT( VARCHAR ,act5.inicio , 103 ) act5ini,CONVERT( VARCHAR ,act5.fin, 103 ) act5fin,act5.horas act5horas,
		pro.totalhoras
		from Estadia.Estadias es
		join Alumno.Alumnos a
		on es.idAlumno=a.matricula
		join Alumno.grupos g
		on a.grupo=g.id
		join alumno.tutores tut
		on g.tutor=tut.id
		join Alumno.carreras car
		on g.carrera=car.id
		join Alumno.ContactoAlumno ca
		on ca.idAlumno=a.matricula
		join Estadia.proyectos pro
		on es.proyecto=pro.id
		join Empresa.empresas emp
		on pro.empresa=emp.id
		join Empresa.asesor_empresarial asemp
		on es.asesorEmp=asemp.id
		join (select * from actn(1,@pro))as act1
		on act1.proyecto=@pro
		join (select * from actn(2,@pro))as act2
		on act2.proyecto=@pro
		join (select * from actn(3,@pro))as act3
		on act3.proyecto=@pro
		join (select * from actn(4,@pro))as act4
		on act4.proyecto=@pro
		join (select * from actn(5,@pro))as act5
		on act5.proyecto=@pro
		where a.matricula=@matricula;
		RETURN;
	END
--------------------------------
--consulta de mensajes
create function myMessages(@matricula char(10))
returns @tabla table(
texto varchar(250),
destinatario char(10),
remitente char(10)
)
as
begin
	insert @tabla
	select texto,destinatario,remitente
	from usuario.mensajes
	where fecha_limite>=getdate();
	
	return;
end

select * from usuario.mensajes
insert into usuario.mensajes values('que pedo cachorros','0315110132','1','2016-12-10')