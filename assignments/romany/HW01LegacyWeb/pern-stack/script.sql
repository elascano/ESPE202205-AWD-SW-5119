show data_directory;
create table sillas(
	id serial,
	imagen bytea
);
insert into sillas(imagen) values (pg_read_binary_file('Catalogo/silla1.png')::bytea);
insert into sillas(imagen) values (pg_read_binary_file('Catalogo/silla2.png')::bytea);
insert into sillas(imagen) values (pg_read_binary_file('Catalogo/silla3.png')::bytea);
insert into sillas(imagen) values (pg_read_binary_file('Catalogo/silla4.png')::bytea);
insert into sillas(imagen) values (pg_read_binary_file('Catalogo/silla5.png')::bytea);
insert into sillas(imagen) values (pg_read_binary_file('Catalogo/silla6.png')::bytea);
insert into sillas(imagen) values (pg_read_binary_file('Catalogo/silla7.png')::bytea);
insert into sillas(imagen) values (pg_read_binary_file('Catalogo/silla8.png')::bytea);
insert into sillas(imagen) values (pg_read_binary_file('Catalogo/silla9.png')::bytea);
create table mesas(
	id serial,
	imagen bytea
);
insert into mesas(imagen) values (pg_read_binary_file('Catalogo/mesa1.png')::bytea);
insert into mesas(imagen) values (pg_read_binary_file('Catalogo/mesa2.png')::bytea);
insert into mesas(imagen) values (pg_read_binary_file('Catalogo/mesa3.png')::bytea);
insert into mesas(imagen) values (pg_read_binary_file('Catalogo/mesa4.png')::bytea);
insert into mesas(imagen) values (pg_read_binary_file('Catalogo/mesa5.png')::bytea);
insert into mesas(imagen) values (pg_read_binary_file('Catalogo/mesa6.png')::bytea);
insert into mesas(imagen) values (pg_read_binary_file('Catalogo/mesa7.png')::bytea);
insert into mesas(imagen) values (pg_read_binary_file('Catalogo/mesa8.png')::bytea);
insert into mesas(imagen) values (pg_read_binary_file('Catalogo/mesa9.png')::bytea);
create table modulares(
	id serial,
	imagen bytea
);
insert into modulares(imagen) values (pg_read_binary_file('Catalogo/M1.jpg')::bytea);
insert into modulares(imagen) values (pg_read_binary_file('Catalogo/M2.jpg')::bytea);
insert into modulares(imagen) values (pg_read_binary_file('Catalogo/M3.jpg')::bytea);
insert into modulares(imagen) values (pg_read_binary_file('Catalogo/M4.jpg')::bytea);
insert into modulares(imagen) values (pg_read_binary_file('Catalogo/M5.jpg')::bytea);
insert into modulares(imagen) values (pg_read_binary_file('Catalogo/M6.jpg')::bytea);
insert into modulares(imagen) values (pg_read_binary_file('Catalogo/M7.jpg')::bytea);
insert into modulares(imagen) values (pg_read_binary_file('Catalogo/M8.jpg')::bytea);
insert into modulares(imagen) values (pg_read_binary_file('Catalogo/M9.jpg')::bytea);