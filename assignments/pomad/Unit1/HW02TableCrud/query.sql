create database crud_table;

create table anime_information(
    id int(11) auto_increment,
    title varchar(100),
    description varchar(500),
    author varchar(100),
    gender varchar(255),
    primary key(id)
);
