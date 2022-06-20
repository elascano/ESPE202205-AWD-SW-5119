/*==============================================================*/
/* DBMS name:      PostgreSQL 7.3                               */
/* Created on:     16/2/2022 12:50:12                           */
/*==============================================================*/

drop index if exists CATEGORIZA_FK;

drop index if exists CATEGORIA_PK;

drop table CATEGORIA;

drop index if exists ESCRIBEN_FK;

drop index if exists COMENTA_FK;

drop index if exists COMENTARIOS_PK;

drop table COMENTARIOS;

drop index if exists ETIQUETA_PK;

drop table ETIQUETA;

drop index if exists ESCRIBE_FK;

drop index if exists POST_PK;

drop table POST;

drop index if exists TIENE2_FK;

drop index if exists TIENE_FK;

drop index if exists TIENE_PK;

drop table POST_ETIQUETA;

drop index if exists USUARIOS_PK;

drop table USUARIOS;



/*==============================================================*/
/* Table: CATEGORIA                                             */
/*==============================================================*/
create table if not exists  CATEGORIA (
   ID_CATEGORIA         UUID DEFAULT gen_random_uuid(),
   NOMBRE_CATEGORIA     VARCHAR(30)          not null,
   ID_POST              UUID DEFAULT gen_random_uuid(),
   constraint PK_CATEGORIA primary key (ID_CATEGORIA)
);

/*==============================================================*/
/* Index: CATEGORIA_PK                                          */
/*==============================================================*/
create unique index CATEGORIA_PK on CATEGORIA (
   ID_CATEGORIA
);

/*==============================================================*/
/* Index: CATEGORIZA_FK                                         */
/*==============================================================*/
create  index CATEGORIZA_FK on CATEGORIA (
   ID_POST
);

/*==============================================================*/
/* Table: COMENTARIOS                                           */
/*==============================================================*/
create table if not exists COMENTARIOS (
   ID_COMENTARIOS       UUID DEFAULT gen_random_uuid(),
   ID_POST              UUID DEFAULT gen_random_uuid(),
   ID_USUARIOS          UUID DEFAULT gen_random_uuid(),
   COMENTARIO           TEXT                 not null,
   constraint PK_COMENTARIOS primary key (ID_COMENTARIOS)
);

/*==============================================================*/
/* Index: COMENTARIOS_PK                                        */
/*==============================================================*/
create unique index COMENTARIOS_PK on COMENTARIOS (
   ID_COMENTARIOS
);

/*==============================================================*/
/* Index: COMENTA_FK                                            */
/*==============================================================*/
create  index COMENTA_FK on COMENTARIOS (
   ID_POST
);

/*==============================================================*/
/* Index: ESCRIBEN_FK                                           */
/*==============================================================*/
create  index ESCRIBEN_FK on COMENTARIOS (
   ID_USUARIOS
);

/*==============================================================*/
/* Table: ETIQUETA                                              */
/*==============================================================*/
create table if not exists ETIQUETA (
   ID_ETIQUETA          UUID DEFAULT gen_random_uuid(),
   NOMBRE_ETIQUETA      VARCHAR(30)          not null,
   constraint PK_ETIQUETA 
      primary key (ID_ETIQUETA)
);

/*==============================================================*/
/* Index: ETIQUETA_PK                                           */
/*==============================================================*/
create unique index ETIQUETA_PK on ETIQUETA (
   ID_ETIQUETA
);

/*==============================================================*/
/* Table: POST                                                  */
/*==============================================================*/
create table if not exists POST (
   ID_POST              UUID DEFAULT gen_random_uuid(),
   ID_USUARIOS          UUID DEFAULT gen_random_uuid(),
   TITULO               VARCHAR(30)          not null,
   FECHA_PUBLICACION    DATE                 default CURRENT_DATE,
   CONTENIDO            TEXT                 not null,
   ESTATUS              CHAR(8)              not null,
   constraint PK_POST primary key (ID_POST)
);

/*==============================================================*/
/* Index: POST_PK                                               */
/*==============================================================*/
create unique index POST_PK on POST (
   ID_POST
);

/*==============================================================*/
/* Index: ESCRIBE_FK                                            */
/*==============================================================*/
create  index ESCRIBE_FK on POST (
   ID_USUARIOS
);

/*==============================================================*/
/* Table: POST_ETIQUETA                                         */
/*==============================================================*/
create table if not exists POST_ETIQUETA (
   ID_POST              UUID DEFAULT gen_random_uuid(),
   ID_ETIQUETA          UUID DEFAULT gen_random_uuid(),
   constraint PK_POST_ETIQUETA primary key (ID_POST, ID_ETIQUETA)
);

/*==============================================================*/
/* Index: TIENE_PK                                              */
/*==============================================================*/
create unique index TIENE_PK on POST_ETIQUETA (
   ID_POST,
   ID_ETIQUETA
);

/*==============================================================*/
/* Index: TIENE_FK                                              */
/*==============================================================*/
create  index TIENE_FK on POST_ETIQUETA (
   ID_POST
);

/*==============================================================*/
/* Index: TIENE2_FK                                             */
/*==============================================================*/
create  index TIENE2_FK on POST_ETIQUETA (
   ID_ETIQUETA
);

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table if not exists USUARIOS (
   ID_USUARIOS          UUID DEFAULT gen_random_uuid(),
   LOGIN                VARCHAR(40)          null,
   PASSWORD             VARCHAR(50)          not null,
   EMAIL                VARCHAR(50)          not null,
   NICKNAME             VARCHAR(50)          not null,
   constraint PK_USUARIOS primary key (ID_USUARIOS)
);

/*==============================================================*/
/* Index: USUARIOS_PK                                           */
/*==============================================================*/
create unique index USUARIOS_PK on USUARIOS (
   ID_USUARIOS
);

alter table CATEGORIA
   add constraint FK_CATEGORI_CATEGORIZ_POST foreign key (ID_POST)
      references POST (ID_POST)
      on delete restrict on update restrict;

alter table COMENTARIOS
   add constraint FK_COMENTAR_COMENTA_POST foreign key (ID_POST)
      references POST (ID_POST)
      on delete cascade on update restrict;

alter table COMENTARIOS
   add constraint FK_COMENTAR_ESCRIBEN_USUARIOS foreign key (ID_USUARIOS)
      references USUARIOS (ID_USUARIOS)
      on delete cascade on update restrict;

alter table POST
   add constraint FK_POST_ESCRIBE_USUARIOS foreign key (ID_USUARIOS)
      references USUARIOS (ID_USUARIOS)
      on delete cascade on update restrict;

alter table POST_ETIQUETA
   add constraint FK_POST_ETI_TIENE_POST foreign key (ID_POST)
      references POST (ID_POST)
      on delete cascade on update restrict;

alter table POST_ETIQUETA
   add constraint FK_POST_ETI_TIENE2_ETIQUETA foreign key (ID_ETIQUETA)
      references ETIQUETA (ID_ETIQUETA)
      on delete cascade on update restrict;

