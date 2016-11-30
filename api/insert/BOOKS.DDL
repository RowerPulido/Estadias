CREATE SCHEMA ESQ1
CREATE SCHEMA ESQ2
CREATE SCHEMA ESQ3
CREATE SCHEMA ESQ4


CREATE TABLE ESQ1.[Proceedings]
(
	[ID] int NOT NULL,
	[tittle] varchar(160),
	[volume] varchar(16),
	[series] varchar(160),
	[organization] int, --falta foranea
	[pub_month] char(3),
	[pub_year] int,
	[note] varchar(256),
	[publisher] int 
)
ON SEGUNDO
;

CREATE TABLE ESQ1.[InBook]
(
	[ID] int NOT NULL, -- PENDIENTE falta foranea
	[title] varchar(160),
	[chapter] smallint,
	[pages] varchar(32),
	[type] varchar(32),
	[note] varchar(256),
	[bookID] int
)
ON SEGUNDO
;

CREATE TABLE ESQ1.[Book]
(
	[ID] int NOT NULL, -- PENDIENTE falta foranea
	[tittle] varchar(160),
	[volume] varchar(16),
	[series] varchar(160),
	[edition] varchar(16),
	[pub_mounth] char(3),
	[pub_year] int,
	[note] varchar(256),
	[publisher] int
)
ON SEGUNDO
;

CREATE TABLE ESQ1.[Publisher]
(
	[ID] int NOT NULL,
	[name] varchar(64),
	[street] varchar(32),
	[city] varchar(32),
	[province] varchar(32),
	[postal_code] char(10),
	[country] varchar(32)
)
ON SEGUNDO
;

ALTER TABLE ESQ1.[Proceedings] 
 ADD CONSTRAINT [PK_Proceedings]
	PRIMARY KEY CLUSTERED ([ID])
;

ALTER TABLE ESQ1.[InBook] 
 ADD CONSTRAINT [PK_InBook]
	PRIMARY KEY CLUSTERED ([ID])
;

ALTER TABLE ESQ1.[Book] 
 ADD CONSTRAINT [PK_Book]
	PRIMARY KEY CLUSTERED ([ID])
;

ALTER TABLE ESQ1.[Publisher] 
 ADD CONSTRAINT [PK_Publisher]
	PRIMARY KEY CLUSTERED ([ID])
;

ALTER TABLE ESQ1.[Proceedings] ADD CONSTRAINT [FK_Proceedings_Publisher]
	FOREIGN KEY ([publisher]) REFERENCES ESQ1.[Publisher] ([ID]) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE ESQ1.[InBook] ADD CONSTRAINT [FK_InBook_Book]
	FOREIGN KEY ([bookID]) REFERENCES ESQ1.[Book] ([ID]) ON DELETE No Action ON UPDATE No Action
;

ALTER TABLE ESQ1.[Book] ADD CONSTRAINT [FK_Book_Publisher]
	FOREIGN KEY ([publisher]) REFERENCES ESQ1.[Publisher] ([ID]) ON DELETE No Action ON UPDATE No Action
;


----------

create table ESQ2.Institution
(
	id int,
	name varchar(64),
	street varchar(32),
	city varchar(32),
	province varchar(32),
	postal_code char(10),
	country varchar(32),
	constraint pk_id primary key(id)
)
ON SEGUNDO;

create table ESQ2.Article(
ID integer primary key,
title varchar(160),
joumal varchar(160),
volume varchar (16),
number smallint,
pages varchar(32),
pub_month char(3),
pub_year integer,
note varchar(256)
)
ON SEGUNDO;

create table ESQ2.Publication (
id integer primary key,
type char(18)
)
ON SEGUNDO;


create table ESQ3.techreport(
	id integer primary key references ESQ2.publication (id),
	title varchar(160) not null,
	institution integer references ESQ2.institution (id)not null,
	type varchar(64),
	number varchar(16),
	pub_month char(3),
	pub_year integer not null ,
	note varchar(256)
)
ON TERCERO
;
go
create table ESQ3.person(
	id integer primary key,
	sumame char(32) not null,
	given_name char(32) not null,
)
ON TERCERO;
go

create table ESQ3.editor(
	personID integer references ESQ3.person(id),
	publicationID integer references ESQ2.publication(id),
	constraint pk_editor primary key (personID, publicationID)
)
ON TERCERO;

create table ESQ4.Manual_01(
	id int primary key,
	title varchar(160),
	organization int,
	edition varchar(160),
	pub_month char(3),
	pub_year int,
	note varchar(256)
)
ON TERCERO
;

create table ESQ4.Misc(
	id int primary key,
	title varchar(160),
	institution int,
	type varchar(64),
	number varchar(16),
	pub_month char(3),
	pub_year integer,
	note varchar(256)
)
ON TERCERO
;

create table ESQ4.inProceedings(
id int primary key,
proceedingsID int,
title varchar(160),
pages varcHar(32),
type varchar(64),
note varchar(256)
)
ON TERCERO;


ALTER TABLE ESQ4.inProceedings
ADD FOREIGN KEY (id)
REFERENCES ESQ2.Publication(id);

ALTER TABLE ESQ4.inProceedings
ADD FOREIGN KEY (proceedingsID)
REFERENCES ESQ1.Publisher(id);

ALTER TABLE ESQ4.Misc
ADD FOREIGN KEY (id)
REFERENCES ESQ2.Publication(id);

ALTER TABLE ESQ4.Manual_01
ADD FOREIGN KEY (id)
REFERENCES ESQ2.Publication(id);

ALTER TABLE ESQ4.Manual_01
ADD FOREIGN KEY (organization)
REFERENCES ESQ2.Institution(id);




