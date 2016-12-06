use master;
create login tutor
with password = 'tutor',
default_database = Estadias; 
go
use master;
create login alumno
with password = 'alumno',
default_database = Estadias; 

use Estadias;
go
create user user_tutor from login tutor;
grant select on schema :: Alumno to user_tutor;
grant update on schema :: Alumno to user_tutor;
grant select on schema :: Calificacion to user_tutor;
grant update on schema :: Calificacion to user_tutor;
grant insert on schema :: Calificacion to user_tutor;
grant insert on schema :: Usuario to user_tutor;
grant update on schema :: Usuario to user_tutor;
grant select on schema :: Estadia to user_tutor;
grant update on schema :: Estadia to user_tutor;
grant insert on schema :: Estadia to user_tutor;
grant select on schema :: Documento to user_tutor;
grant update on schema :: Documento to user_tutor;
grant insert on schema :: Documento to user_tutor;

create user user_alumno from login alumno;
grant select on schema :: Alumno to user_alumno;
grant update on schema :: Alumno to user_alumno;
grant select on schema :: Calificacion to user_alumno;
grant update on schema :: Usuario to user_alumno;
grant insert on schema :: Estadia to user_alumno;