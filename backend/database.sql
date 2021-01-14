create database escomingreso;
use escomingreso;

-- Creacion de la tabla horarios

create table horarios (
    horario_id int primary key not null auto_increment, 
    hora_inicio time not null,
    hora_fin time not null,
    salon char(7) not null,
    dia int not null,
    lugares_ocupados int not null,
    capacidad_max int not null,
    disponible int not null
);



