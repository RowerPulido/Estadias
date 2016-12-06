CREATE PROCEDURE ADD_ESTADIA
(@matricula char(10),@direccion varchar(50),@telefono char(10),@email varchar(50),
@empresa varchar(50),@area varchar(50),@nomAse varchar(50),@patAse varchar(50), @matAse varchar(50),@cargo varchar(50),@visita varchar(50),
@hora1 time, @hora2 time,@apoyo money,@proNom varchar(50),@proObj varchar(150),@inicioEst date,
@act1 varchar(50),@durAct1 int,@act2 varchar(50),@durAct2 int,@act3 varchar(50),@durAct3 int,@act4 varchar(50),@durAct4 int,@act5 varchar(50),@durAct5 int)
AS
BEGIN 

declare @finAct1 date;
declare @finAct2 date;
declare @finAct3 date;
declare @finAct4 date;
declare @finAct5 date;

declare @iniAct2 date;
declare @iniAct3 date;
declare @iniAct4 date;
declare @iniAct5 date;
declare @horasTot int;
declare @semTot int;

set @semTot=@durAct1 + @durAct2+ @durAct3+ @durAct4+ @durAct5;
declare @horasDia int=(select DATEDIFF(HH,@hora1,@hora2));
declare @durhr1 int=((@durAct1)*5)*@horasDia;
declare @durhr2 int=((@durAct2)*5)*@horasDia;
declare @durhr3 int=((@durAct3)*5)*@horasDia;
declare @durhr4 int=((@durAct4)*5)*@horasDia;
declare @durhr5 int=((@durAct5)*5)*@horasDia;

set @horasTot= @durhr1+@durhr2+@durhr3+@durhr4+@durhr5;

set @finAct1= DATEADD(day,((@durAct1-1)*7)+4,@inicioEst);
set @iniAct2=DATEADD(DAY,@durAct1*7,@inicioEst);
set @finAct2=DATEADD(DAY,((@durAct2-1)*7)+4,@iniAct2);
set @iniAct3=DATEADD(DAY,@durAct2*7,@iniAct2);
set @finAct3=DATEADD(DAY,((@durAct3-1)*7)+4,@iniAct3);
set @iniAct4=DATEADD(DAY,@durAct3*7,@iniAct3);
set @finAct4=DATEADD(DAY,((@durAct4-1)*7)+4,@iniAct4);
set @iniAct5=DATEADD(DAY,@durAct4*7,@iniAct4);
set @finAct5=DATEADD(DAY,((@durAct5-1)*7)+4,@iniAct5);

declare @lastAseEmp char;
declare @empID int;
set @empID=(select id from Empresa.empresas where nombre=@empresa);

	if((select COUNT(*) from Empresa.asesor_empresarial where nombre=@nomAse and paterno=@patAse and materno=@matAse)=1)
		begin
			set @lastAseEmp= (select id from Empresa.asesor_empresarial where nombre=@nomAse and paterno=@patAse and materno=@matAse);
		end
	else
	begin
		if((select COUNT(*) from Empresa.asesor_empresarial)>0)
			begin
				set @lastAseEmp= convert(char,((convert(bigint,(select top 1 id from Empresa.asesor_empresarial order by id desc)))+1));
				insert into Empresa.asesor_empresarial(id,nombre,paterno,materno,empresa,cargo)  values(@lastAseEmp,@nomAse,@patAse,@matAse,@empID,@cargo);
			end
		else
			begin
				set @lastAseEmp='7000000001';
				insert into Empresa.asesor_empresarial(id,nombre,paterno,materno,empresa,cargo) values(@lastAseEmp,@nomAse,@patAse,@matAse,@empID,@cargo);
			end
	end		
declare @lastPro int;
	if((select count(*) from Estadia.proyectos)>0)
		set @lastPro=(select top 1 id from Estadia.proyectos order by id desc )+1; 
	else
		set
			@lastPro=1;
	insert into Estadia.proyectos(nombre,alumno,empresa,asesor_empresarial,id,objetivos,totalHoras) values (@proNom,@matricula,@empID,@lastAseEmp,@lastPro,@proObj,@horasTot);

declare @lastEstadia char;
	if((select COUNT(*) from Estadia.Estadias)>0)
		set @lastEstadia=convert(char,(convert(bigint,(select top 1 idEstadias from Estadia.Estadias order by idEstadias desc))+1));
	else
		set @lastEstadia='0000000001';
	
	insert into Estadia.Estadias values (@lastEstadia,@matricula,@area,@lastAseEmp,@visita,@hora1,@hora2,@apoyo,@lastPro);


	insert into Estadia.Actividades values(@act1,@inicioEst,@finAct1,@durhr1,@lastPro);	
	
	insert into Estadia.Actividades values(@act2,@iniAct2,@finAct2,@durhr2,@lastPro);
	
	insert into Estadia.Actividades values(@act3,@iniAct3,@finAct3,@durhr3,@lastPro);
	
	insert into Estadia.Actividades values(@act4,@iniAct4,@finAct4,@durhr4,@lastPro);
	
	insert into Estadia.Actividades values(@act5,@iniAct5,@finAct5,@durhr5,@lastPro);
	
	if((select COUNT(*) from Alumno.ContactoAlumno where idAlumno=@matricula)=0)		
		insert into Alumno.ContactoAlumno values (@direccion,@telefono,@email,@matricula);
	
	insert into Usuario.Usuarios values (@matricula,HashBytes('sha1',@matricula),'ALU');
end 
--BORRAR STORED PROCEDURE
--drop procedure ADD_ESTADIA

--PROBAR STORED_PROCEDURE
exec ADD_ESTADIA '0315110140','vivo aqui','665121321','notengo@gmail.com','Steam','desarrollo','josean','perez','lopez','gerente','no hay','7:00','17:00',0,'Estadia','no tengo definidos','2016-12-05','intro',
2,'desar',3,'presentacion',2,'conclusion',1,'fin',3;



select * from Estadia.proyectos


use Estadias
select * from Usuario.usuarios