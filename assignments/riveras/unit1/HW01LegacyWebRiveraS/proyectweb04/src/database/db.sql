CREATE DATABASE orderdb

CREATE TABLE ordert(
    id SERIAL PRIMARY KEY,
    namef VARCHAR(255),
    quantity VARCHAR(255),
    price VARCHAR(255)
)

CREATE TABLE usert(
    id SERIAL PRIMARY KEY,
    nick VARCHAR(255),
    password1 VARCHAR(255),
    nameUser VARCHAR(255),
    lastName VARCHAR(255),
    phone VARCHAR(255),
    email VARCHAR(255),
    direction VARCHAR(255),
    position VARCHAR(255),
    salary VARCHAR(255)
)

CREATE TABLE productst(
    id SERIAL PRIMARY KEY,
    clase VARCHAR(255),
    tipo VARCHAR(255),
    precio VARCHAR(255)
)

INSERT INTO usert (nick, password1, nameUser, lastName, phone, email, direction, position,salary) VALUES ('stalin0', 'STALIN', 'STALIN', 'RIVERA', '0982063623', 'stalinrivera1980@gmail.com', 'GUANUJO', 'empleado', '100')

INSERT INTO productst (clase, tipo, precio) VALUES ('Jugos', 'Naranja', '1.70')