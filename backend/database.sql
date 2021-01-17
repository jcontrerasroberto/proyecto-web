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

-- Creacion de la tabla alumno

create table alumno (
    boleta char(10) primary key not null,
    nombre varchar(50) not null,
    apellidop varchar(50) not null,
    apellidom varchar(50) not null,
    daten date not null,
    sexo bool not null,
    curp char(18) not null unique,
    calle varchar(50) not null,
    colonia varchar(50) not null,
    codpostal int(5) not null,
    tel varchar(10) not null,
    correo varchar(60) not null,
    escuela varchar(8) not null,
    entidad varchar(19) not null,
    nombreE varchar(50),
    promedio double(4,2) not null,
    escom int(1) not null, 
    horario_id int not null,
    foreign key (horario_id) REFERENCES horarios(horario_id)
);



