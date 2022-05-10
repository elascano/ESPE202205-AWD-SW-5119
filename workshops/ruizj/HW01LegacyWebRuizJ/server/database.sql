CREATE DATABASE Restaurante;

CREATE TABLE todo(
    todo_id SERIAL PRIMARY KEY,
    description VARCHAR(255)
);

CREATE TABLE reservaciones(
    todo_id SERIAL PRIMARY KEY,
    Nombre_res VARCHAR(50),
    Email_res VARCHAR(30),
    Telefono_res VARCHAR(30),
    Motivo VARCHAR(30),
    Dia_res VARCHAR(20),
    Hora_res VARCHAR(20),
    Comentarios VARCHAR(255)
);