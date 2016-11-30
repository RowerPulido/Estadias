create database examen3E03;

use examen3E03;

create table grupos
(
	gpo_id varchar(10) primary key not null,
	gpo_descripcion varchar(50) not null
)engine=InnoDB;

insert into grupos (gpo_id, gpo_descripcion) values
('20163ASI', '3-A Sistemas Informaticos'),
('20163EMCE', '3-E Multimedia Y Comercio Electronico');

create table alumnos
(
	alu_id varchar(10) primary key not null,
	alu_nombre varchar(50) not null,
	alu_id_grupo varchar(10) not null
)engine=InnoDB;

insert into alumnos (alu_id, alu_nombre, alu_id_grupo) values
('0315100123', 'Alvarez, Arturo', '20163ASI'),
('0315100578', 'Bermudez, Beatriz', '20163ASI'),
('0315100657', 'Corona, Carlos', '20163ASI'),
('0315100954', 'Duarte, David', '20163ASI'),
('0315100486', 'Escobedo, Eduardo', '20163ASI'),
('0315100121', 'Fernandez, Francisco', '20163EMCE'),
('0315100315', 'Gonzalez, Guadalupe', '20163EMCE'),
('0315100467', 'Hernandez, Humberto', '20163EMCE'),
('0315100197', 'Juarez, Jorge', '20163EMCE'),
('0315100278', 'Lopez, Laura', '20163EMCE');
