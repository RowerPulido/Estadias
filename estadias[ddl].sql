/* Drop Foreign Key Constraints */

--Victor haz commit :V
-- olo
use master;
if exists(select * from sys.databases where name='Estadias')
	begin
		drop database Estadias;
		create database Estadias;
	end
else
	create database Estadias
go

use Estadias;
go
IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_Usuarios_typeofuser]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [Usuarios] DROP CONSTRAINT [FK_Usuarios_typeofuser]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_grupos_carreras]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [grupos] DROP CONSTRAINT [FK_grupos_carreras]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_grupos_Tutores]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [grupos] DROP CONSTRAINT [FK_grupos_Tutores]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_Estadias_Alumnos]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [Estadias] DROP CONSTRAINT [FK_Estadias_Alumnos]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_Estadias_asesor_empresarial]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [Estadias] DROP CONSTRAINT [FK_Estadias_asesor_empresarial]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_Estadias_proyectos_02]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [Estadias] DROP CONSTRAINT [FK_Estadias_proyectos_02]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_Documentos_Alumno]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [Documentos] DROP CONSTRAINT [FK_Documentos_Alumno]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_Documentos_typesofdocs]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [Documentos] DROP CONSTRAINT [FK_Documentos_typesofdocs]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_calificaciones_Alumnos]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [calificaciones] DROP CONSTRAINT [FK_calificaciones_Alumnos]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_asesor_empresarial_empresas]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [asesor_empresarial] DROP CONSTRAINT [FK_asesor_empresarial_empresas]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_Alumnos_ContactoAlumno]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [Alumnos] DROP CONSTRAINT [FK_Alumnos_ContactoAlumno]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_Alumnos_grupos]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [Alumnos] DROP CONSTRAINT [FK_Alumnos_grupos]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[FK_Actividades_proyectos]') AND OBJECTPROPERTY(id, 'IsForeignKey') = 1) 
ALTER TABLE [Actividades] DROP CONSTRAINT [FK_Actividades_proyectos]
GO

/* Drop Tables */

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[Usuarios]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [Usuarios]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[typesofdocs]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [typesofdocs]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[typeofuser]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [typeofuser]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[Tutores]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [Tutores]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[proyectos]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [proyectos]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[grupos]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [grupos]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[Estadias]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [Estadias]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[empresas]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [empresas]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[Documentos]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [Documentos]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[ContactoAlumno]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [ContactoAlumno]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[carreras]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [carreras]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[calificaciones]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [calificaciones]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[asesor_empresarial]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [asesor_empresarial]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[Alumnos]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [Alumnos]
GO

IF EXISTS (SELECT * FROM dbo.sysobjects WHERE id = object_id('[Actividades]') AND OBJECTPROPERTY(id, 'IsUserTable') = 1) 
DROP TABLE [Actividades]
GO

/* Create Tables */

CREATE TABLE [Usuarios]
(
	[id] char(10) NOT NULL,
	[password] char(34) not NULL,
	[tipo] char(3) not NULL
)
GO

CREATE TABLE [typesofdocs]
(
	[id] tinyint NOT NULL,
	[name] varchar(50) NULL
)
GO

CREATE TABLE [typeofuser]
(
	[id] char(3) NOT NULL,
	[description] varchar(50) NULL
)
GO

CREATE TABLE [Tutores]
(
	[id] char(10) NOT NULL,
	[numbres] varchar(50) NULL,
	[paterno] varchar(50) NULL,
	[materno] varchar(50) NULL,
	[imagen] varchar(50) NULL,
	[email] varchar(50) NULL,
	[tel] char(10) NULL
)
GO

CREATE TABLE [proyectos]
(
	[nombre] varchar(20) NULL,
	[descripcion] varchar(50) NULL,
	[alumno] char(10) NOT NULL,
	[empresa] int NULL,
	[asesor_empresarial] char(10) NULL,
	[id] int NOT NULL,
	[objetivos] varchar(70) NULL,
	[totalHoras] smallint NULL
)
GO

CREATE TABLE [grupos]
(
	[id] char(10) NOT NULL,
	[carrera] char(3) NULL,
	[tutor] char(10) NULL
)
GO

CREATE TABLE [Estadias]
(
	[idEstadias] char(10) NOT NULL,
	[idAlumno] char(10) NOT NULL,
	[deptoEmp] varchar(20) NULL,
	[asesorEmp] char(10) NULL,
	[fechasVisita] varchar(50) NULL,
	[horario] varchar(50) NULL,
	[apoyoEconomico] money NULL,
	[proyecto] int NULL
)
GO

CREATE TABLE [empresas]
(
	[id] int NOT NULL,
	[nombre] varchar(50) NULL,
	[giro] varchar(50) NULL,
	[telefono] char(10) NULL,
	[direccion] varchar(50) NULL,
	[email] varchar(50) NULL
)
GO

CREATE TABLE [Documentos]
(
	[id] bigint NOT NULL IDENTITY,
	[typeDocs] tinyint NULL,
	[alumno] char(10) NULL,
	[status] char(10) NULL,
	[fecha_actualizacion] datetime NULL,
	[fecha_limite] date NULL,
	[ubicacion] varchar(50) NULL
)
GO

CREATE TABLE [ContactoAlumno]
(
	[direccion] varchar(50) NULL,
	[telefono] char(10) NULL,
	[email] varchar(50) NULL,
	[idAlumno] char(10) NOT NULL
)
GO

CREATE TABLE [carreras]
(
	[id] char(3) NOT NULL,
	[name] varchar(30) NULL
)
GO

CREATE TABLE [calificaciones]
(
	[matricula] char(10) NOT NULL,
	[p1] tinyint NULL,
	[p2] tinyint NULL,
	[p3] tinyint NULL,
	[p4] tinyint null,
	[final] tinyint NULL
)
GO

CREATE TABLE [asesor_empresarial]
(
	[id] char(10) NOT NULL,
	[nombre] varchar(50) NULL,
	[paterno] varchar(50) NULL,
	[materno] varchar(50) NULL,
	[empresa] int NULL,
	[correo] varchar(50) NULL,
	[imagen] varchar(50)NULL
)
GO

CREATE TABLE [Alumnos]
(
	[matricula] char(10) NOT NULL,
	[nombres] varchar(50) NULL,
	[paterno] varchar(50) NULL,
	[materno] varchar(50) NULL,
	[grupo] char(10) NULL,
	[imagen] varchar(50) NULL
)
GO

CREATE TABLE [Actividades]
(
	[idActividad] int identity(1,1) not null,
	[nombre] varchar(50) NULL,
	[inicio] date NULL,
	[fin] date NULL,
	[proyecto] int NOT NULL
)
GO

/* Create Primary Keys, Indexes, Uniques, Checks */

ALTER TABLE [Usuarios] 
 ADD CONSTRAINT [PK_Usuarios]
	PRIMARY KEY CLUSTERED ([id])
GO

CREATE INDEX [IXFK_Usuarios_typeofuser] 
 ON [Usuarios] ([tipo] ASC)
GO

ALTER TABLE [typesofdocs] 
 ADD CONSTRAINT [PK_typesofdocs]
	PRIMARY KEY CLUSTERED ([id])
GO

ALTER TABLE [typeofuser] 
 ADD CONSTRAINT [PK_typeofuser]
	PRIMARY KEY CLUSTERED ([id])
GO

ALTER TABLE [Tutores] 
 ADD CONSTRAINT [PK_Tutores]
	PRIMARY KEY CLUSTERED ([id])
GO

ALTER TABLE [proyectos] 
 ADD CONSTRAINT [PK_proyectos]
	PRIMARY KEY CLUSTERED ([id])
GO

ALTER TABLE [grupos] 
 ADD CONSTRAINT [PK_grupos]
	PRIMARY KEY CLUSTERED ([id])
GO

CREATE INDEX [IXFK_grupos_carreras] 
 ON [grupos] ([carrera] ASC)
GO

CREATE INDEX [IXFK_grupos_Tutores] 
 ON [grupos] ([tutor] ASC)
GO

ALTER TABLE [Estadias] 
 ADD CONSTRAINT [PK_Estadias]
	PRIMARY KEY CLUSTERED ([idEstadias])
GO

CREATE INDEX [IXFK_Estadias_Estadias] 
 ON [Estadias] ([idEstadias] ASC)
GO

CREATE INDEX [IXFK_Estadias_asesor_empresarial] 
 ON [Estadias] ([asesorEmp] ASC)
GO

CREATE INDEX [IXFK_Estadias_proyectos] 
 ON [Estadias] ([proyecto] ASC)
GO

ALTER TABLE [empresas] 
 ADD CONSTRAINT [PK_empresas]
	PRIMARY KEY CLUSTERED ([id])
GO

ALTER TABLE [Documentos] 
 ADD CONSTRAINT [PK_Documentos]
	PRIMARY KEY CLUSTERED ([id])
GO

CREATE INDEX [IXFK_Documentos_Alumno] 
 ON [Documentos] ([alumno] ASC)
GO

CREATE INDEX [IXFK_Documentos_typesofdocs] 
 ON [Documentos] ([typeDocs] ASC)
GO

ALTER TABLE [ContactoAlumno] 
 ADD CONSTRAINT [PK_ContactoAlumno]
	PRIMARY KEY CLUSTERED ([idAlumno])
GO

ALTER TABLE [carreras] 
 ADD CONSTRAINT [PK_carreras]
	PRIMARY KEY CLUSTERED ([id])
GO

ALTER TABLE [calificaciones] 
 ADD CONSTRAINT [PK_calificaciones]
	PRIMARY KEY CLUSTERED ([matricula])
GO

CREATE INDEX [IXFK_calificaciones_Alumnos] 
 ON [calificaciones] ([matricula] ASC)
GO

ALTER TABLE [asesor_empresarial] 
 ADD CONSTRAINT [PK_asesor_empresarial]
	PRIMARY KEY CLUSTERED ([id])
GO

CREATE INDEX [IXFK_asesor_empresarial_empresas] 
 ON [asesor_empresarial] ([empresa] ASC)
GO

ALTER TABLE [Alumnos] 
 ADD CONSTRAINT [PK_Alumno]
	PRIMARY KEY CLUSTERED ([matricula])
GO

CREATE INDEX [IXFK_Alumnos_ContactoAlumno] 
 ON [Alumnos] ([matricula] ASC)
GO

CREATE INDEX [IXFK_Alumnos_grupos] 
 ON [Alumnos] ([grupo] ASC)
GO

ALTER TABLE [Actividades] 
 ADD CONSTRAINT [PK_Actividades]
	PRIMARY KEY CLUSTERED ([idActividad])
GO

CREATE INDEX [IXFK_Actividades_proyectos] 
 ON [Actividades] ([idActividad] ASC)
GO

/* Create Foreign Key Constraints */

ALTER TABLE [Usuarios] ADD CONSTRAINT [FK_Usuarios_typeofuser]
	FOREIGN KEY ([tipo]) REFERENCES [typeofuser] ([id]) ON DELETE No Action ON UPDATE No Action
GO

ALTER TABLE [grupos] ADD CONSTRAINT [FK_grupos_carreras]
	FOREIGN KEY ([carrera]) REFERENCES [carreras] ([id]) ON DELETE No Action ON UPDATE No Action
GO

ALTER TABLE [grupos] ADD CONSTRAINT [FK_grupos_Tutores]
	FOREIGN KEY ([tutor]) REFERENCES [Tutores] ([id]) ON DELETE No Action ON UPDATE No Action
GO

ALTER TABLE [Estadias] ADD CONSTRAINT [FK_Estadias_Alumnos]
	FOREIGN KEY ([idAlumno]) REFERENCES [Alumnos] ([matricula]) ON DELETE No Action ON UPDATE No Action
GO

ALTER TABLE [Estadias] ADD CONSTRAINT [FK_Estadias_asesor_empresarial]
	FOREIGN KEY ([asesorEmp]) REFERENCES [asesor_empresarial] ([id]) ON DELETE No Action ON UPDATE No Action
GO

ALTER TABLE [Estadias] ADD CONSTRAINT [FK_Estadias_proyectos_02]
	FOREIGN KEY ([proyecto]) REFERENCES [proyectos] ([id]) ON DELETE No Action ON UPDATE No Action
GO

ALTER TABLE [Documentos] ADD CONSTRAINT [FK_Documentos_Alumno]
	FOREIGN KEY ([alumno]) REFERENCES [Alumnos] ([matricula]) ON DELETE No Action ON UPDATE No Action
GO

ALTER TABLE [Documentos] ADD CONSTRAINT [FK_Documentos_typesofdocs]
	FOREIGN KEY ([typeDocs]) REFERENCES [typesofdocs] ([id]) ON DELETE No Action ON UPDATE No Action
GO

ALTER TABLE [calificaciones] ADD CONSTRAINT [FK_calificaciones_Alumnos]
	FOREIGN KEY ([matricula]) REFERENCES [Alumnos] ([matricula]) ON DELETE No Action ON UPDATE No Action
GO

ALTER TABLE [asesor_empresarial] ADD CONSTRAINT [FK_asesor_empresarial_empresas]
	FOREIGN KEY ([empresa]) REFERENCES [empresas] ([id]) ON DELETE No Action ON UPDATE No Action
GO

ALTER TABLE [ContactoAlumno] ADD CONSTRAINT [FK_Alumnos_ContactoAlumno]
	FOREIGN KEY ([idAlumno]) REFERENCES [Alumnos] ([matricula]) ON DELETE No Action ON UPDATE No Action
GO

ALTER TABLE [Alumnos] ADD CONSTRAINT [FK_Alumnos_grupos]
	FOREIGN KEY ([grupo]) REFERENCES [grupos] ([id]) ON DELETE No Action ON UPDATE No Action
GO

ALTER TABLE [Actividades] ADD CONSTRAINT [FK_Actividades_proyectos]
	FOREIGN KEY ([proyecto]) REFERENCES [proyectos] ([id]) ON DELETE No Action ON UPDATE No Action
GO

---tabla mensajes
create table mensajes(
id int  primary key identity(1,1),
texto varchar(200),
destinatario char(10) foreign key references Usuarios(id),
remitente char(10) foreign key references Usuarios(id),
fecha_limite date null
)