USE ESTADIAS

-- id name
insert into Alumno.carreras values ('TIC','TEC. DE LA INF. Y COM.','nombreDirecto');
insert into Alumno.carreras values ('MEC','MECATRONICA','nombreDirecto');
insert into Alumno.carreras values ('ELC','ELECTROMECANICA INDUSTRIAL','nombreDirecto');
insert into Alumno.carreras values ('EGR','ENERGIAS RENOVABLES','nombreDirecto');
insert into Alumno.carreras values ('DIE','DESARROLLO E INOVACION EMP.','nombreDirecto');
insert into Alumno.carreras values ('FFS','FINANCIERA Y FISCAL','nombreDirecto');
insert into Alumno.carreras values ('LCG','LOGISTICA COMERCIAL GLOBAL','nombreDirecto');
insert into Alumno.carreras values ('POI','PROCESOS Y OPERACIONES IND.','nombreDirecto');


--id nombres paterno materno imagen email tel
insert into Alumno.Tutores values ('1','DANIEL','TORRES','ALDANA','...','DANIEL@TORRES.COM','6649694700');
insert into Alumno.Tutores values ('2','JUAN','GARCIA','GONZALEZ','...','JUANGG@GARCIA.COM','6648794321');
insert into Alumno.Tutores values ('3','GRACIELA','ORTIZ','LOPEZ','...','GRACIELA@ORTIZ.COM','6641234567');
insert into Alumno.Tutores values ('4','GRETEL','LOPEZ','CONTRERAS','...','GRETEL@CONTRERAS.COM','6649876543');
insert into Alumno.Tutores values ('5','RAFAEL','ZOUSA','FIGUEROA','...','RAFA@ZOUSA.COM','6649876541');
insert into Alumno.Tutores values ('6','JOSE','FLAVIO','LEON','...','JOSE@LEON.COM','6649876542');
insert into Alumno.Tutores values ('7','ALEJANDRO','GAXIOLA','ALCANTAR','...','ALEJANDRO@GAXIOLA.COM','6644567891');
insert into Alumno.Tutores values ('8','RENE','RAMIREZ','GONZALEZ','...','RENE@RAMIREZ.COM','6644561237');
insert into Alumno.Tutores values ('9','HUGO','VASQUEZ','URBINA','...','HUGO@URBINA.COM','6641352648');
insert into Alumno.Tutores values ('10','MARIA','PLASENCIA','CUEVAS','...','MARIA@CUEVAS.COM','6647896541');

-- id carrera tutor
insert into Alumno.grupos values ('TIC04A20161','TIC','1');
insert into Alumno.grupos values ('TIC04B20161','TIC','2');
insert into Alumno.grupos values ('TIC04C20161','TIC','3');
insert into Alumno.grupos values ('TIC04D20161','TIC','4');
insert into Alumno.grupos values ('TIC04E20161','TIC','5');


-- id nombre giro telefono direccion email
insert into Empresa.empresas values (1,'Samsumg','Electronica','6646276020','Blvd. Los Olivos 21014','samex.hr@samsung.com');
insert into Empresa.empresas values (2,'Telnor','Telecomunicaciones','633-20-50','Centro Comercial Plaza Río, local 6A','telnorsoluciona@telnor.com');
insert into Empresa.empresas values (3,'Plantronics','Electronica','6646894135','Blvd. Los Olivos 21014','plant@plantronics.com');
insert into Empresa.empresas values (4,'Gameloft','Desarrollo Multimedia','6646894875','Blvd. Los Olivos 21014','gameloft@gmail.com');
insert into Empresa.empresas values (5,'Steam','Desarrollo','6646899235','Blvd. Los Olivos 21014','gabe@steam.com');

-- id nombre paterno materno empresa correo imagen
insert into Empresa.asesor_empresarial values ('7000000100','JOSE','PEREZ','LOPEZ',1,'Gerente','JOSEPEREZ@SAMSUNG.COM','...');

-- matricula nombres paterno materno grupo imagen
insert into Alumno.Alumnos values ('0315110132','JORGE ALONSO','PULIDO','TRUJILLO','TIC04A20161','0315110132.JPG');
insert into Alumno.Alumnos values ('0315110133','MIGUEL ANGEL','LOPEZ','PLASENCIA','TIC04A20161','0315110133.JPG');
insert into Alumno.Alumnos values ('0315110134','VICTOR','GUTIERRES','HERNANDES','TIC04A20161','0315110134.JPG');
insert into Alumno.Alumnos values ('0315110135','JAVIER','SOTO','HERRERA','TIC04A20161','0315110135.JPG');
insert into Alumno.Alumnos values ('0315110136','MARIA','CADENA','RAMOS','TIC04A20161','0315110136.JPG');
insert into Alumno.Alumnos values ('0315110137','BRUNO','DIAZ','VELA','TIC04A20161','0315110137.JPG');
insert into Alumno.Alumnos values ('0315110138','IVAN','ACEVES','ZAMORA','TIC04A20161','0315110138.JPG');
insert into Alumno.Alumnos values ('0315110139','FERNANDO','SANCHEZ','JIMENEZ','TIC04A20161','0315110139.JPG');
insert into Alumno.Alumnos values ('0315110140','ISAAC','GUERRA','AVALOS','TIC04A20161','0315110140.JPG');
insert into Alumno.Alumnos values ('0315110141','JESSICA','VERA','CASILLAS','TIC04A20161','0315110141.JPG');

insert into Alumno.Alumnos values ('0315110142','HECTOR','KINTANA','BECERRA','TIC04B20161','0315110142.JPG');
insert into Alumno.Alumnos values ('0315110143','JUAN','GARCIA','VELAZQUEZ','TIC04B20161','0315110143.JPG');
insert into Alumno.Alumnos values ('0315110144','MICHEL','NATA','SOLIS','TIC04B20161','0315110144.JPG');
insert into Alumno.Alumnos values ('0315110145','OMAR','GONZALEZ','GUZMAN','TIC04B20161','0315110145.JPG');
insert into Alumno.Alumnos values ('0315110146','OSCAR','MERIDA','OLIVARES','TIC04B20161','0315110146.JPG');
insert into Alumno.Alumnos values ('0315110147','ANTONIO','GARNICA','RUBIO','TIC04B20161','0315110147.JPG');
insert into Alumno.Alumnos values ('0315110148','RAYMUNDO','FONSECA','LOPEZ','TIC04B20161','0315110148.JPG');
insert into Alumno.Alumnos values ('0315110149','ANGEL','LOPEZ','GONZALEZ','TIC04B20161','0315110149.JPG');
insert into Alumno.Alumnos values ('0315110150','MARIO','MORA','LOPEZ','TIC04B20161','0315110150.JPG');
insert into Alumno.Alumnos values ('0315110151','MAURICIO','VERDUZCO','VIBRAS','TIC04B20161','0315110151.JPG');

insert into Alumno.Alumnos values ('0315110152','MALINALI','PLASENCIA','MARTINEZ','TIC04C20161','0315110152.JPG');
insert into Alumno.Alumnos values ('0315110153','JOSE','MARTINEZ','CHAVES','TIC04C20161','0315110153.JPG');
insert into Alumno.Alumnos values ('0315110154','ANGELICA','GARCIA','CHAVEZ','TIC04C20161','0315110154.JPG');
insert into Alumno.Alumnos values ('0315110155','IVONNE','SANTOS','VERA','TIC04C20161','0315110155.JPG');
insert into Alumno.Alumnos values ('0315110156','JULIO','SANDOVAL','ARAUJO','TIC04C20161','0315110156.JPG');
insert into Alumno.Alumnos values ('0315110157','LEONARDO','VERDUZCO','GARCIA','TIC04C20161','0315110157.JPG');
insert into Alumno.Alumnos values ('0315110158','BRANDON','LEAL','RIOS','TIC04C20161','0315110158.JPG');
insert into Alumno.Alumnos values ('0315110159','ANA','CASILLAS','GONZALES','TIC04C20161','0315110159.JPG');
insert into Alumno.Alumnos values ('0315110160','GIOVANNI','ARAGON','FAJARDO','TIC04C20161','0315110160.JPG');
insert into Alumno.Alumnos values ('0315110161','ALONSO','PULIDO','LUCERO','TIC04C20161','0315110161.JPG');

insert into Alumno.Alumnos values ('0315110162','FRANCO','SOTO','CORRAL','TIC04D20161','0315110162.JPG');
insert into Alumno.Alumnos values ('0315110163','CHRISTIAN','CAMACHO','LARA','TIC04D20161','0315110162.JPG');
insert into Alumno.Alumnos values ('0315110164','LUIS','MARTINEZ','PULIDO','TIC04D20161','0315110162.JPG');
insert into Alumno.Alumnos values ('0315110165','DANIEL','ALVARADO','SOTO','TIC04D20161','0315110162.JPG');
insert into Alumno.Alumnos values ('0315110166','ANDRES','LIMON','ARROYO','TIC04D20161','0315110162.JPG');
insert into Alumno.Alumnos values ('0315110167','ROCIO','BERRELLEZA','ROBLES','TIC04D20161','0315110162.JPG');
insert into Alumno.Alumnos values ('0315110168','ALEJANDO','COLUNGA','RODRIGUEZ','TIC04D20161','0315110162.JPG');
insert into Alumno.Alumnos values ('0315110169','CHRISTOPHER','ANGULO','VASQUEZ','TIC04D20161','0315110162.JPG');
insert into Alumno.Alumnos values ('0315110170','GUILLERMO','ZAVALA','ARMENTA','TIC04D20161','0315110162.JPG');
insert into Alumno.Alumnos values ('0315110171','JAMID','HERNANDEZ','MARIN','TIC04D20161','0315110162.JPG');


-- direccion telefono email idAlumno
insert into Alumno.ContactoAlumno values ('C BONDAD #2113, LA BONDAD , TECATE','6651214284','JORGEPULIDOTRUJILLO@GMAIL.COM','0315110132');
insert into Alumno.ContactoAlumno values ('C BONDAD #2114, LA BONDAD , TECATE','6651312384','ALUMN2@GMAIL.COM','0315110133');
insert into Alumno.ContactoAlumno values ('C BONDAD #2115, LA BONDAD , TECATE','6651514184','ALUMN3@GMAIL.COM','0315110134');
insert into Alumno.ContactoAlumno values ('C BONDAD #2116, LA BONDAD , TECATE','6651214484','ALUMN4@GMAIL.COM','0315110135');
insert into Alumno.ContactoAlumno values ('C BONDAD #2117, LA BONDAD , TECATE','6651214284','ALUMN5@GMAIL.COM','0315110136');
insert into Alumno.ContactoAlumno values ('C BONDAD #2118, LA BONDAD , TECATE','6651712384','ALUMN6@GMAIL.COM','0315110137');
insert into Alumno.ContactoAlumno values ('C BONDAD #2119, LA BONDAD , TECATE','6651614184','ALUMN7@GMAIL.COM','0315110138');
insert into Alumno.ContactoAlumno values ('C BONDAD #2110, LA BONDAD , TECATE','6651614484','ALUMN8@GMAIL.COM','0315110139');
insert into Alumno.ContactoAlumno values ('C BONDAD #2111, LA BONDAD , TECATE','6651414284','ALUMN9@GMAIL.COM','0315110140');
insert into Alumno.ContactoAlumno values ('C BONDAD #2112, LA BONDAD , TECATE','6651914284','ALUMN10@GMAIL.COM','0315110141');

insert into Alumno.ContactoAlumno values ('C Zumpango #4040, Jibarito,, TIJUANA','6601214284','ALUMN11@GMAIL.COM','0315110142');
insert into Alumno.ContactoAlumno values ('C Zumpango #4041, Jibarito,, TIJUANA','660214284','ALUMN12@GMAIL.COM','0315110143');
insert into Alumno.ContactoAlumno values ('C Zumpango #4042, Jibarito,, TIJUANA','6651214284','ALUMN13@GMAIL.COM','0315110144');
insert into Alumno.ContactoAlumno values ('C Zumpango #4043, Jibarito,, TIJUANA','6651214284','ALUMN14@GMAIL.COM','0315110145');
insert into Alumno.ContactoAlumno values ('C Zumpango #4044, Jibarito,, TIJUANA','6651214284','ALUMN15@GMAIL.COM','0315110146');
insert into Alumno.ContactoAlumno values ('C Zumpango #4045, Jibarito,, TIJUANA','6651214284','ALUMN16@GMAIL.COM','0315110147');
insert into Alumno.ContactoAlumno values ('C Zumpango #4046, Jibarito,, TIJUANA','6651214284','ALUMN1@GMAIL.COM','0315110148');
insert into Alumno.ContactoAlumno values ('C Zumpango #4047, Jibarito,, TIJUANA','6651214284','ALUMN180@GMAIL.COM','0315110149');
insert into Alumno.ContactoAlumno values ('C Zumpango #4048, Jibarito,, TIJUANA','6651214284','ALUMN19@GMAIL.COM','0315110150');
insert into Alumno.ContactoAlumno values ('C Zumpango #4049, Jibarito,, TIJUANA','6651214284','ALUMN20@GMAIL.COM','0315110151');

insert into Alumno.ContactoAlumno values ('C Zumpango #4050, Jibarito,, TIJUANA','6651214284','ALUMN21@GMAIL.COM','0315110152');
insert into Alumno.ContactoAlumno values ('C Zumpango #4051, Jibarito,, TIJUANA','6651214284','ALUMN22@GMAIL.COM','0315110153');
insert into Alumno.ContactoAlumno values ('C Zumpango #4052, Jibarito,, TIJUANA','6651214284','ALUMN23@GMAIL.COM','0315110154');
insert into Alumno.ContactoAlumno values ('C Zumpango #4053, Jibarito,, TIJUANA','6651214284','ALUMN24@GMAIL.COM','0315110155');
insert into Alumno.ContactoAlumno values ('C Zumpango #4054, Jibarito,, TIJUANA','6651214284','ALUMN25@GMAIL.COM','0315110156');
insert into Alumno.ContactoAlumno values ('C Zumpango #4055, Jibarito,, TIJUANA','6651214284','ALUMN26@GMAIL.COM','0315110157');
insert into Alumno.ContactoAlumno values ('C Zumpango #4056, Jibarito,, TIJUANA','6651214284','ALUMN27@GMAIL.COM','0315110158');
insert into Alumno.ContactoAlumno values ('C Zumpango #4057, Jibarito,, TIJUANA','6651214284','ALUMN28@GMAIL.COM','0315110159');
insert into Alumno.ContactoAlumno values ('C Zumpango #4058, Jibarito,, TIJUANA','6651214284','ALUMN29@GMAIL.COM','0315110160');
insert into Alumno.ContactoAlumno values ('C Zumpango #4059, Jibarito,, TIJUANA','6651214284','ALUMN30@GMAIL.COM','0315110161');

insert into Alumno.ContactoAlumno values ('C Zumpango #4060, Jibarito,, TIJUANA','6651214284','ALUMN31@GMAIL.COM','0315110162');
insert into Alumno.ContactoAlumno values ('C Zumpango #4061, Jibarito,, TIJUANA','6651214284','ALUMN32@GMAIL.COM','0315110163');
insert into Alumno.ContactoAlumno values ('C Zumpango #4062, Jibarito,, TIJUANA','6651214284','ALUMN33@GMAIL.COM','0315110164');
insert into Alumno.ContactoAlumno values ('C Zumpango #4063, Jibarito,, TIJUANA','6651214284','ALUMN34@GMAIL.COM','0315110165');
insert into Alumno.ContactoAlumno values ('C Zumpango #4064, Jibarito,, TIJUANA','6651214284','ALUMN35@GMAIL.COM','0315110166');
insert into Alumno.ContactoAlumno values ('C Zumpango #4065, Jibarito,, TIJUANA','6651214284','ALUMN36@GMAIL.COM','0315110167');
insert into Alumno.ContactoAlumno values ('C Zumpango #4066, Jibarito,, TIJUANA','6651214284','ALUMN37@GMAIL.COM','0315110168');
insert into Alumno.ContactoAlumno values ('C Zumpango #4067, Jibarito,, TIJUANA','6651214284','ALUMN38@GMAIL.COM','0315110169');
insert into Alumno.ContactoAlumno values ('C Zumpango #4068, Jibarito,, TIJUANA','6651214284','ALUMN39@GMAIL.COM','0315110170');
insert into Alumno.ContactoAlumno values ('C Zumpango #4069, Jibarito,, TIJUANA','6651214284','ALUMN40@GMAIL.COM','0315110171');

-- id description
insert into Usuario.typeofuser values ('ALU','ALUMNO');
insert into Usuario.typeofuser values ('TUT','TUTOR');
insert into Usuario.typeofuser values ('ADM','ADMINISTRADOR');

-- id constrasenia tipo
insert into Usuario.Usuarios values ('0315110132',HashBytes('sha1','ROWER'),'ALU');
insert into Usuario.Usuarios values ('0315110133',HashBytes('sha1','ROWER'),'ALU');
insert into Usuario.Usuarios values ('0315110134',HashBytes('sha1','ROWER'),'ALU');
insert into Usuario.Usuarios values ('0315110135',HashBytes('sha1','ROWER'),'ALU');
insert into Usuario.Usuarios values ('0315110136',HashBytes('sha1','ROWER'),'ALU');
insert into Usuario.Usuarios values ('0315110152',HashBytes('sha1','MALI'),'ALU');
insert into Usuario.Usuarios values ('1',HashBytes('sha1','DANIEL'),'TUT');

----
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

use estadias
----
select id,nombre from alluser
-- matricula p1 p2 p3 p4 final
--INSERT INTO Calificacion.calificaciones values ('0315110152','10','9','8','7','10');
-- id name
