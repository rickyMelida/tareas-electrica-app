create database 	
use tareas_electrica

create table tecnicos (
	id_tecnico int auto_increment,
    nombre varchar(100) not null,
    cargo_t varchar(50) not null,
	turno varchar(50) not null,
    primary key(id_tecnico)
)
select * from tecnicos

select * from tecnicos where turno = "Mañana"



create table usuarios (
	id_usuario int(5) auto_increment,
    usuario varchar(50) not null,
    pass varchar(50) not null,
    tecns int not null,
    
    primary key(id_usuario),
    foreign key (tecns) references tecnicos(id_tecnico)
);

drop table usuarios

select * from usuarios
show databases

insert into tecnicos(nombre, cargo_t, turno) 
			  values("Camilo Barreto","Senior", "Mañana"),
					("Miler Sosa", "Senior", "Tarde"),
                    ("Luis Cabrera", "Senior", "Noche"),
                    ("Ramon Coronel", "Junior", "Mañana"),
                    ("Santiago Mendez", "Junior", "Mañana"),
                    ("Ricardo Melida", "Junior", "Tarde" ),
                    ("Nicolas Acosta", "Junior", "Tarde"),
                    ("Lazaro Romero", "Junior", "Noche" );

update tecnicos 
select * from tecnicos
alter table tecnicos add cargo_t varchar(50)

update tecnicos set turno = "Manhana" where id_tecnico=5

SELECT cargo_t from tecnicos where turno = 'Tarde' and nombre= 'Ricardo Melida'
SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas
select * from tecnicos


create table tareas (
	id_tarea int auto_increment,
    t_tarea varchar(200) not null,
    estado varchar(50) not null,
    des_tarea text not null,
    fecha date not null,
    
    hora_i time,
    hora_f time,
    horas_h time,
    turno varchar(50) not null,
    
    tecnicos varchar(100) ,
    cargo varchar(100),
    
    primary key(id_tarea)
);

create table t_tareas(
	id_tar int auto_increment, 
    tipo varchar(200) not null,
    
    primary key(id_tar)
)

select * from tareas

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
               
update t_tareas set tipo="Business_Center" where id_tar = 7

select * from t_tareas

select * from tareas
	
delete * from tareas

alter table tareas add img_despues longblob not null

truncate table tareas where estado= "Finalizado"
insert into tareas(t_tarea, estado, des_tarea, fecha, hora_i, hora_f, horas_h, turno, tecnicos, cargo)
values("rutinas", "Finalizado", "Rutinas de trafos y generadores","1992-02-12", "13:00", "15:30", "2:00",  "tarde", "Ricardo Mélida", "Junior");

select tecnicos, horas_h from tareas where horas_h != "00:00:00"
insert into tareas(t_tarea, estado, des_tarea,fecha,  turno)
values("rutinas", "pendiente", "tareas","2019-10-20" , "tarde");

insert into usuarios(usuario, pass, tecns) 
		values('turnoMañana', 'homero', '1'),
			  ('turnoTarde', '1975', '2'),
			  ('turnoNoche', 'LuisC', '3');

SELECT t_tarea, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) as horas FROM tareas where t_tarea = "asistencia"

SELECT tecnicos, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas where tecnicos = "Ramon Coronel"



SELECT t_tarea, SEC_TO_TIME(SUM(TIME_TO_SEC(horas_h))) AS horas FROM tareas

select tecnicos, horas_h from tareas 

select nombre from tecnicos

SELECT * FROM tecnicos
select tecnicos, horas_h from tareas where estado="Finalizado"

DATE_SUB(NOW(), INTERVAL 1 HOUR)

insert into usuarios(usuario, pass, tecns) value("admin", "electrica1234", 6)

select * from usuarios where usuario='turnoMañana' and pass='homero'


delete from tecnicos where id_tecnico > 9