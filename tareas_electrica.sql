create database tareas_electrica	
use tareas_electrica

-- Se crea la tabla usuarios-----------------------------------------
create table usuarios (
	id_usuario int(5) auto_increment,
    usuario varchar(50) not null,
    pass varchar(50) not null,
    tecns int not null,
    
    primary key(id_usuario),
    foreign key (tecns) references tecnicos(id_tecnico)
);

-- Se crea la tabla tecnicos ------------------------------
create table tecnicos (
	id_tecnico int auto_increment,
    nombre varchar(100) not null,
    cargo_t varchar(50) not null,
	turno varchar(50) not null,
    primary key(id_tecnico)
)


-- Se agregan tecnicos ----
insert into tecnicos(nombre, cargo_t, turno) 
			  values("Camilo Barreto","Senior", "Mañana"),
					("Miler Sosa", "Senior", "Tarde"),
                    ("Luis Cabrera", "Senior", "Noche"),
                    ("Ramon Coronel", "Junior", "Mañana"),
                    ("Santiago Mendez", "Junior", "Mañana"),
                    ("Ricardo Melida", "Junior", "Tarde" ),
                    ("Nicolas Acosta", "Junior", "Tarde"),
                    ("Lazaro Romero", "Junior", "Noche" );

-- Modificacion de tipo de dato de cargo
alter table tecnicos add cargo_t varchar(50)

update tecnicos set turno = "Manhana" where id_tecnico=5

SELECT cargo_t from tecnicos where turno = 'Tarde' and nombre= 'Ricardo Melida'
SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas


-- Creamos la tabla de las tareas
create table tareas (
	id_tarea int auto_increment,
    t_tarea varchar(200) not null,
    estado varchar(50) not null,
    des_tarea text not null,
    fecha_gen date not null,
    
    hora_i time,
    hora_f time,
    horas_h time,
    turno varchar(50) not null,
    
    tecnicos varchar(100) ,
    cargo varchar(100),
    
    primary key(id_tarea)
);

-- Modificacion de datos de la tabla tareas---------------
alter table tareas change fecha fecha_gen date not null


ALTER TABLE tareas ADD fecha_cierre date AFTER fecha_gen;

select * from tareas


-- Creamos la tabla para la conexion entre tecnicos y tareas
create table tec_tareas(
	id_tecnico1 int,
    id_tarea1 int,
    
    foreign key(id_tecnico1) references tecnicos(id_tecnico),
    foreign key(id_tarea1) references tareas(id_tarea)
	
)

drop table tec_tareas
truncate table tareas
alter table tareas add id_tar1 int
alter  table tareas add foreign key(id_tar1) references t_tareas(id_tar)

-- Tabla de los tipos de tareas -----------------------------------
create table t_tareas(
	id_tar int auto_increment, 
    tipo varchar(200) not null,
    
    primary key(id_tar)
)


-- ---------------------------------------------- -----------------------------

-- Modificacion de tipo de dato de cargo
alter table tecnicos add cargo_t varchar(50)

update tecnicos set turno = "Manhana" where id_tecnico=5

update tareas set img_antes="antes.jpg", img_despues="despues.jpg" where id_tarea=8

select * from tareas
select * from t_tareas where tipo = "Mantenimiento"

SELECT cargo_t from tecnicos where turno = 'Tarde' and nombre= 'Ricardo Melida'
SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas

select * from t_tareas

SELECT * from usuarios

-- Insertamos los tipos de tareas --
insert into t_tareas(tipo) 
		 values("Rutinas"),
			   ("Asistencia"),
               ("Mantenimiento"),
               ("Correctivo"),
               ("Salon de Eventos"),
               ("Marketing"),
               ("Businesss Center"),
               ("Gimnasio"),
               ("TIC");

update tareas set img_antes="antes.jpg", img_despues="despues.jpg" where id_tarea=2

update usuarios set id_usuario = 1 where usuario='C_Barreto'


insert into tareas(t_tarea, estado, des_tarea, fecha_gen, fecha_cierre, hora_i, hora_f, horas_h, turno, tecnicos, cargo, img_antes, img_despues, id_tar1)
values("Mantenimiento", "Finalizado", "Rutinas de trafos y generadores",STR_TO_DATE('10.31.2003' ,GET_FORMAT(date,'USA')),"1992-02-12",  "13:00", "15:30", "2:00",  "tarde", "Camilo Barreto", "Junior", "antes.jpg", "despues", 3);

-- ejemplo de formato fecha
INSERT INTO demo (fecha)
VALUES (STR_TO_DATE(REPLACE('15/01/2005','/','.') ,GET_FORMAT(date,'EUR')))


-- Agregamos un pendiente de ejemplo ----------------------------------------------------------------
insert into tareas(t_tarea, estado, des_tarea, fecha_gen, turno, tecnicos, cargo, id_tar1)
values("rutinas", "Pendiente", "Verificacion de luces CC", "2019-10-20", "tarde", "Ricardo Mélida", "Junior", 1);


select tecnicos, horas_h from tareas where horas_h != "00:00:00"

insert into tareas(t_tarea, estado, des_tarea,fecha,  turno)
values("rutinas", "pendiente", "tareas","2019-10-20" , "tarde");

select * from tareas order by id_tarea desc limit 1;

truncate table tareas

drop table t_tareas

insert into usuarios(usuario, pass, tecns) 
		values('C_Barreto', 'camilobarreto', '1'),
			  ('M_Sosa', 'millersosa', '2'),
			  ('L_Cabrera', 'luiscabrera', '3'),
              ('R_Coronel', 'ramoncoronel', '4'),
              ('S_Mendez', 'santiagomendez', '5'),
              ('R_Melida', 'ricardomelida', '6'),
              ('N_Acosta', 'nicolasacosta', '7'),
              ('V_Velasquez', 'victorvelasquez', '8');
              

-- Se agregan tecnicos ----
insert into tecnicos(nombre, cargo_t, turno) 
			  values("Camilo Barreto","Senior", "Mañana"),
					("Miler Sosa", "Senior", "Tarde"),
                    ("Luis Cabrera", "Senior", "Noche"),
                    ("Ramon Coronel", "Junior", "Mañana"),
                    ("Santiago Mendez", "Junior", "Mañana"),
                    ("Ricardo Melida", "Junior", "Tarde" ),
                    ("Nicolas Acosta", "Junior", "Tarde"),
                    ("Lazaro Romero", "Junior", "Noche" );
                    
              
insert into tecnicos(nombre, turno, cargo_t) values('Victor Velazquez', 'Mañana', 'Junior')
              

SELECT t_tarea, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) as horas FROM tareas where t_tarea = "Mantenimiento"

SELECT tecnicos, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas where tecnicos = "Ricardo Melida"

select t_tarea from tareas

SELECT t_tarea, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas
SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas

SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas


DATE_SUB(NOW(), INTERVAL 1 HOUR)

select * from usuarios;
select * from tecnicos;
select * from tareas order by id_tarea desc

-- Formato de horas mas legible ----
select * from tareas where estado = "Pendiente"
SET lc_time_names = 'es_ES';
SELECT DATE_FORMAT(fecha_gen,'%d - %b - %Y') AS fecha_ge FROM tareas;


insert into tecnicos(nombre, turno, cargo_t) 
values('Admin', 'Admin', 'Admin')

insert into usuarios(usuario, pass, tecns) values('Admin', 'electrica1234', '9')

select usuario from usuarios inner join tecnicos on usuarios.tecns=tecnicos.id_tecnico where nombre = "Ricardo Melida"

update tareas set fecha_cierre = "2019-10-20"  where id_tarea <= 10

update tareas set tecnicos = "Admin" where id_tarea = 3


-- Cerramos un pendiente
update tareas 
set t_tarea = 'Correctivo', 
estado = 'Finalizado',
des_tarea = 'Se verifco algo',
fecha_cierre = '2020-01-29',
hora_i = '13:00',
hora_f = '14:30',
horas_h = '1:0',
turno = 'Tarde',
tecnicos = 'Luis Cabrera',
cargo='Senior',
img_antes = 'antes.jpg',
img_despues = 'despues.jpg' where id_tarea=3;

select * from tareas where id_tarea=3

update tareas set img_antes='antes.jpg', img_despues='despues.jpg' where id_tarea=7



-- Ejemplo de BD de fechas ----
create database formato_fecha
use formato_fecha

CREATE TABLE `demo` (
	`id` int(11) NOT NULL auto_increment,
	`fecha` date not null,
	PRIMARY KEY  (`id`)
) ENGINE=InnoDB

INSERT INTO demo (fecha)
VALUES (STR_TO_DATE(REPLACE('15/01/2005','/','.') ,GET_FORMAT(date,'EUR')))

select * from demo