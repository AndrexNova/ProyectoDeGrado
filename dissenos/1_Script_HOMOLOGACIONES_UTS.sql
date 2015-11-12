/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     20/10/2015 06:03:50 p. m.                    */
/*==============================================================*/


/*==============================================================*/
/* Table: PROGRAMAS                                             */
/*==============================================================*/
create table PROGRAMAS
(
   ID_PROGRAMA          char(3) not null,
   NOMBRE               varchar(50) not null,
   FACULTAD             varchar(50) not null,
   NIVEL                varchar(50) not null,
   SNIES                char(10) not null,
   primary key (ID_PROGRAMA)
);

/*==============================================================*/
/* Table: MATERIAS                                              */
/*==============================================================*/
create table MATERIAS
(
   ID_MATERIA           char(6) not null,
   ID_PROGRAMA          char(3) not null,
   NOMENCLATURA         char(10) not null,
   NOMBRE               varchar(50) not null,
   PONDERACION          char(1) not null,
   SEMESTRE             decimal(2,0) not null,
   ESTADO               char(1) not null default 'A',
   primary key (ID_MATERIA),
   constraint FK_PROGRAMAS foreign key (ID_PROGRAMA)
      references PROGRAMAS (ID_PROGRAMA) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: HOMOLOGACIONES                                        */
/*==============================================================*/
create table HOMOLOGACIONES
(
   ID_MATERIA1          char(6) not null,
   ID_MATERIA2          char(6) not null,
   primary key (ID_MATERIA1, ID_MATERIA2),
   constraint FK_MATERIA1 foreign key (ID_MATERIA1)
      references MATERIAS (ID_MATERIA) on delete restrict on update restrict,
   constraint FK_MATERIA2 foreign key (ID_MATERIA2)
      references MATERIAS (ID_MATERIA) on delete restrict on update restrict
);

/*==============================================================*/
/* Table: funcionalidades                                       */
/*==============================================================*/
CREATE TABLE funcionalidades
(
  codfunc serial NOT NULL,
  codpadre integer,
  nombre character varying(100) NOT NULL,
  identificador character varying(30) NOT NULL,
  orden integer NOT NULL,
  urlpagina character varying(100),
  target character varying(50) NOT NULL DEFAULT '_parent'::character varying,
  icono character varying(100),
  tipo character varying(10) NOT NULL DEFAULT 'text'::character varying,
  CONSTRAINT pk_funcionalidades PRIMARY KEY (codfunc),
  CONSTRAINT fk_func_ref_func FOREIGN KEY (codpadre)
      REFERENCES funcionalidades (codfunc) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT ckc_tipo_funciona CHECK (tipo::text = ANY (ARRAY['text'::character varying::text, 'separator'::character varying::text]))
);

/*==============================================================*/
/* Table: perfiles                                      		*/
/*==============================================================*/
CREATE TABLE perfiles
(
  codperfil serial NOT NULL,
  nombreperfil character varying(200) NOT NULL,
  CONSTRAINT pk_perfiles PRIMARY KEY (codperfil)
);

/*==============================================================*/
/* Table: usuarios                                       		*/
/*==============================================================*/
CREATE TABLE usuarios
(
  codusuario serial NOT NULL,
  codperfil integer NOT NULL,
  tipodoc character varying(3) NOT NULL,
  documento character varying(30),
  primerapellido character varying(100) NOT NULL,
  segundoapellido character varying(100),
  nombres character varying(150) NOT NULL,
  correo character varying(200),
  direccion character varying(200),
  telefono character varying(30),
  celular character varying(30),
  contacto character varying(200),
  fechanacimiento date,
  estado smallint,
  genero smallint NOT NULL DEFAULT 1,
  nombreusuario character varying(100),
  clave character varying(50),
  CONSTRAINT pk_usuarios PRIMARY KEY (codusuario),
  CONSTRAINT fk_usuarios_ref_perfiles FOREIGN KEY (codperfil)
      REFERENCES perfiles (codperfil) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT ckc_estado_usuarios CHECK (estado IS NULL OR (estado = ANY (ARRAY[1, 2]))),
  CONSTRAINT ckc_genero_usuarios CHECK (genero = ANY (ARRAY[1, 2])),
  CONSTRAINT ckc_tipodoc_usuarios CHECK (tipodoc::text = ANY (ARRAY['CC'::character varying::text, 'TI'::character varying::text, 'PA'::character varying::text, 'CE'::character varying::text, 'NIT'::character varying::text]))
);

/*==============================================================*/
/* Table: rel_funcusuarios                                      */
/*==============================================================*/
CREATE TABLE rel_funcusuarios
(
  codusuario integer NOT NULL,
  codfunc integer NOT NULL,
  favorito smallint NOT NULL DEFAULT 2,
  CONSTRAINT pk_rel_funcusuarios PRIMARY KEY (codusuario, codfunc),
  CONSTRAINT fk_func_ref_relmenusu FOREIGN KEY (codfunc)
      REFERENCES funcionalidades (codfunc) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT fk_usu_ref_relmenusu FOREIGN KEY (codusuario)
      REFERENCES usuarios (codusuario) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT ckc_favorito_rel_func CHECK (favorito = ANY (ARRAY[1, 2]))
);
