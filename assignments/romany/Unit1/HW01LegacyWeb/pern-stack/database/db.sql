create database hola
create table tarea(
    id serial primary key,
    titulo varchar(255) unique,
    descripcion varchar(255)
);