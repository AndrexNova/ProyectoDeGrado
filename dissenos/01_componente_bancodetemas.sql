/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     29/08/2015 2:15:13 p. m.                     */
/*==============================================================*/


/*==============================================================*/
/* Table: ACCESOS                                               */
/*==============================================================*/
create table ACCESOS (
   CODACCESO            SERIAL not null,
   CODUSUARIO           INT4                 null,
   FECHAINGRESO         DATE                 not null,
   HORAINGRESO          TIME                 not null,
   IPOCULTA             VARCHAR(50)          null,
   IPVISIBLE            VARCHAR(50)          null,
   constraint PK_ACCESOS primary key (CODACCESO)
);

-- set table ownership
alter table ACCESOS owner to USER_EVA
;
/*==============================================================*/
/* Table: ASIGNADOS2                                            */
/*==============================================================*/
create table ASIGNADOS2 (
   CODREUINON           INT4                 not null,
   CODUSUARIO           INT4                 not null,
   constraint PK_ASIGNADOS2 primary key (CODREUINON, CODUSUARIO)
);

/*==============================================================*/
/* Table: CONSIGNACIONES                                        */
/*==============================================================*/
create table CONSIGNACIONES (
   CODCONSIGNACION      SERIAL               not null,
   CODPROYECTOGRADO     INT4                 not null,
   CODUSUARIO           INT4                 not null,
   NOMBRECONSIGNACION   VARCHAR(100)         not null,
   NOMBRECODIFICADO     VARCHAR(100)         not null,
   TIPO                 VARCHAR(50)          not null,
   TAMANNO              VARCHAR(50)          not null,
   FECHA                date                 not null,
   VALOR                FLOAT4               not null,
   NUMERO               VARCHAR(50)          not null,
   constraint PK_CONSIGNACIONES primary key (CODCONSIGNACION)
);

-- set table ownership
alter table CONSIGNACIONES owner to USER_EVA
;
/*==============================================================*/
/* Table: DATOSPROYECTO                                         */
/*==============================================================*/
create table DATOSPROYECTO (
   CODIGO               SERIAL               not null,
   CODPROYECTOGRADO     INT4                 null,
   FECHA_SOLICITUD      DATE                 not null,
   NOMBRE_EMPRESA       VARCHAR(30)          null,
   DEPENDENCIA          VARCHAR(25)          null,
   ASESOR_PRACTICA      VARCHAR(50)          null,
   DIRECCION            VARCHAR(50)          null,
   TELEFONO             TEXT                 null,
   TEMATICA             VARCHAR(50)          null,
   DIRECTOR_MONOGRAFIA  VARCHAR(50)          null,
   TIPO_SEMINARIO       VARCHAR(30)          null,
   CARGOASESOR          VARCHAR(50)          null,
   TITULO               TEXT                 null,
   RESUMEN              TEXT                 null,
   OBJETIVO             TEXT                 null,
   constraint PK_DATOSPROYECTO primary key (CODIGO)
);

-- set table ownership
alter table DATOSPROYECTO owner to USER_EVA
;
/*==============================================================*/
/* Table: DECANATURAS                                           */
/*==============================================================*/
create table DECANATURAS (
   CODDECANATURA        SERIAL               not null,
   NOMBREDECANATURA     VARCHAR(200)         not null,
   constraint PK_DECANATURAS primary key (CODDECANATURA)
);

-- set table ownership
alter table DECANATURAS owner to USER_EVA
;
/*==============================================================*/
/* Table: DOCUMENTOSPROYECTO                                    */
/*==============================================================*/
create table DOCUMENTOSPROYECTO (
   CODIGO               SERIAL               not null,
   CODPROYECTOGRADO     INT4                 not null,
   ANTEPROYECTO         VARCHAR(2000)        null,
   ANTEPROYECTOCODIFICADO VARCHAR(2000)        null,
   TAMANO               VARCHAR(50)          null,
   TIPO                 VARCHAR(50)          null,
   ESTADO               VARCHAR(50)          null,
   constraint PK_DOCUMENTOSPROYECTO primary key (CODIGO)
);

-- set table ownership
alter table DOCUMENTOSPROYECTO owner to USER_EVA
;
/*==============================================================*/
/* Table: ESTADOSTRABAJOGRADO                                   */
/*==============================================================*/
create table ESTADOSTRABAJOGRADO (
   CODESTADO            SERIAL               not null,
   ESTADO               VARCHAR(30)          not null,
   LIMITEDIAS           INT2                 not null,
   constraint PK_ESTADOSTRABAJOGRADO primary key (CODESTADO)
);

-- set table ownership
alter table ESTADOSTRABAJOGRADO owner to USER_EVA
;
/*==============================================================*/
/* Table: FORMATOSGRADO                                         */
/*==============================================================*/
create table FORMATOSGRADO (
   CODFORMATO           SERIAL               not null,
   NOMBREFORMATO        VARCHAR(200)         not null,
   VERSION              VARCHAR(20)          not null,
   DESCRIPCION          TEXT                 not null,
   FORMATOCODIFICADO    VARCHAR(100)         not null,
   TIPO                 VARCHAR(100)         not null,
   TAMANNO              VARCHAR(30)          not null,
   constraint PK_FORMATOSGRADO primary key (CODFORMATO)
);

-- set table ownership
alter table FORMATOSGRADO owner to USER_EVA
;
/*==============================================================*/
/* Table: FUNCIONALIDADES                                       */
/*==============================================================*/
create table FUNCIONALIDADES (
   CODFUNC              SERIAL not null,
   CODPADRE             INT4                 null,
   NOMBRE               VARCHAR(100)         not null,
   IDENTIFICADOR        VARCHAR(30)          not null,
   ORDEN                INT4                 not null,
   URLPAGINA            VARCHAR(100)         null,
   TARGET               VARCHAR(50)          not null default '_parent',
   ICONO                VARCHAR(100)         null,
   TIPO                 VARCHAR(10)          not null default 'text'
      constraint CKC_TIPO_FUNCIONA check (TIPO in ('text','separator')),
   constraint PK_FUNCIONALIDADES primary key (CODFUNC)
);

comment on table FUNCIONALIDADES is
'Almacena todas las funcionalidades del sistema';

-- set table ownership
alter table FUNCIONALIDADES owner to USER_EVA
;
/*==============================================================*/
/* Table: HISTORICOESTADOS                                      */
/*==============================================================*/
create table HISTORICOESTADOS (
   CODHISTORICOESTADO   SERIAL               not null,
   CODESTADO            INT4                 not null,
   CODPROYECTOGRADO     INT4                 not null,
   FECHA                DATE                 not null,
   COMENTARIOESTADO     TEXT                 not null,
   constraint PK_HISTORICOESTADOS primary key (CODHISTORICOESTADO)
);

-- set table ownership
alter table HISTORICOESTADOS owner to USER_EVA
;
/*==============================================================*/
/* Table: MODALIDADESGRADO                                      */
/*==============================================================*/
create table MODALIDADESGRADO (
   CODMODALIDADGRADO    SERIAL               not null,
   NOMBREMODALIDAD      VARCHAR(200)         not null,
   VALOR                FLOAT4               not null,
   ASOCOMPANERO         BOOL                 not null,
   constraint PK_MODALIDADESGRADO primary key (CODMODALIDADGRADO)
);

-- set table ownership
alter table MODALIDADESGRADO owner to USER_EVA
;
/*==============================================================*/
/* Table: PERFILES                                              */
/*==============================================================*/
create table PERFILES (
   CODPERFIL            SERIAL not null,
   NOMBREPERFIL         VARCHAR(200)         not null,
   constraint PK_PERFILES primary key (CODPERFIL)
);

-- set table ownership
alter table PERFILES owner to USER_EVA
;
/*==============================================================*/
/* Table: PONENCIA                                              */
/*==============================================================*/
create table PONENCIA (
   CODPROYECTOGRADO     INT4                 not null,
   NOTA                 DECIMAL              null,
   ENLETRA              VARCHAR(100)         null,
   OBSERVACIONES        VARCHAR(1000)        null,
   constraint PK_PONENCIA primary key (CODPROYECTOGRADO)
);

/*==============================================================*/
/* Table: PROGRAMAS                                             */
/*==============================================================*/
create table PROGRAMAS (
   CODPROGRAMA          SERIAL               not null,
   CODDECANATURA        INT4                 null,
   NOMBREPROGRAMA       VARCHAR(300)         null,
   TIPOPROGRAMA         INT2                 null,
   constraint PK_PROGRAMAS primary key (CODPROGRAMA)
);

-- set table ownership
alter table PROGRAMAS owner to USER_EVA
;
/*==============================================================*/
/* Table: PROYECTOSGRADO                                        */
/*==============================================================*/
create table PROYECTOSGRADO (
   CODPROYECTOGRADO     SERIAL               not null,
   CODTEMA              INT4                 not null,
   FECHAESTADO          date                 not null,
   CODESTADO            INT2                 not null,
   COMENTARIOESTADO     TEXT                 not null,
   ANTEPROYECTO         VARCHAR(2000)        null,
   ANTEPROYECTOCODIFICADO VARCHAR(200)         null,
   OBSERVACIONES        TEXT                 null,
   constraint PK_PROYECTOSGRADO primary key (CODPROYECTOGRADO)
);

comment on column PROYECTOSGRADO.CODESTADO is
'Este campo se relaciona con la tabla estadostrabajogrado';

-- set table ownership
alter table PROYECTOSGRADO owner to USER_EVA
;
/*==============================================================*/
/* Table: REL_FORMATOSMODALIDADES                               */
/*==============================================================*/
create table REL_FORMATOSMODALIDADES (
   CODMODALIDADGRADO    INT4                 not null,
   CODFORMATO           INT4                 not null,
   constraint PK_REL_FORMATOSMODALIDADES primary key (CODMODALIDADGRADO, CODFORMATO)
);

-- set table ownership
alter table REL_FORMATOSMODALIDADES owner to USER_EVA
;
/*==============================================================*/
/* Table: REL_FUNCTIPOUSU                                       */
/*==============================================================*/
create table REL_FUNCTIPOUSU (
   CODFUNC              INT4                 not null,
   CODPERFIL            INT4                 not null,
   constraint PK_REL_FUNCTIPOUSU primary key (CODFUNC, CODPERFIL)
);

-- set table ownership
alter table REL_FUNCTIPOUSU owner to USER_EVA
;
/*==============================================================*/
/* Table: REL_FUNCUSUARIOS                                      */
/*==============================================================*/
create table REL_FUNCUSUARIOS (
   CODUSUARIO           INT4                 not null,
   CODFUNC              INT4                 not null,
   FAVORITO             INT2                 not null default 2
      constraint CKC_FAVORITO_REL_FUNC check (FAVORITO in (1,2)),
   constraint PK_REL_FUNCUSUARIOS primary key (CODUSUARIO, CODFUNC)
);

comment on column REL_FUNCUSUARIOS.FAVORITO is
'1 Inicia con esta opcion por defecto
2 Inicia con la opcion del sistema';

-- set table ownership
alter table REL_FUNCUSUARIOS owner to USER_EVA
;
/*==============================================================*/
/* Table: REL_REUNIONESPROYECTOS                                */
/*==============================================================*/
create table REL_REUNIONESPROYECTOS (
   CODREUINON           INT4                 not null,
   CODPROYECTOGRADO     INT4                 not null,
   constraint PK_REL_REUNIONESPROYECTOS primary key (CODREUINON, CODPROYECTOGRADO)
);

/*==============================================================*/
/* Table: REUNIONES                                             */
/*==============================================================*/
create table REUNIONES (
   CODREUINON           SERIAL               not null,
   ASUNTO               VARCHAR(200)         null,
   FECHA                DATE                 null,
   constraint PK_REUNIONES primary key (CODREUINON)
);

/*==============================================================*/
/* Table: TEMAS                                                 */
/*==============================================================*/
create table TEMAS (
   CODTEMA              SERIAL               not null,
   CODUSUARIO           INT4                 not null,
   CODPROGRAMA          INT4                 not null,
   CODMODALIDADGRADO    INT4                 not null,
   GRUPODEINVESTIGACION VARCHAR(222)         null,
   TEMATICA             VARCHAR(222)         null,
   DESCRIPCION          VARCHAR(222)         null,
   TITULO               VARCHAR(200)         null,
   ESTADO               INT2                 null,
   constraint PK_TEMAS primary key (CODTEMA)
);

-- set table ownership
alter table TEMAS owner to USER_EVA
;
/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS (
   CODUSUARIO           SERIAL               not null,
   CODPERFIL            INT4                 null,
   CODIGO               INT8                 null,
   TIPODOC              VARCHAR(2)           null,
   DOCUMENTO            VARCHAR(30)          null,
   PRIMERAPELLIDO       VARCHAR(100)         not null,
   SEGUNDOAPELLIDO      VARCHAR(100)         null,
   NOMBRES              VARCHAR(150)         not null,
   CORREO               VARCHAR(200)         null,
   GENERO               INT2                 not null default 1
      constraint CKC_GENERO_USUARIOS check (GENERO in (1,2)),
   NOMBREUSUARIO        VARCHAR(100)         null,
   CLAVE                VARCHAR(50)          null,
   PROGRAMAACADEMICO    VARCHAR(100)         null,
   JORNADA              VARCHAR(100)         null,
   DIRECCION            VARCHAR(100)         null,
   TELEFONO             VARCHAR(30)          null,
   TIPOSANGRE           VARCHAR(50)          null,
   FACULTAD             VARCHAR(100)         null,
   RH                   VARCHAR(3)           null,
   constraint PK_USUARIOS primary key (CODUSUARIO)
);

-- set table ownership
alter table USUARIOS owner to USER_EVA
;
/*==============================================================*/
/* Table: USUPROYECTOGRADO                                      */
/*==============================================================*/
create table USUPROYECTOGRADO (
   CODRELPROYUSU        SERIAL               not null,
   CODUSUARIO           INT4                 not null,
   CODPROYECTOGRADO     INT4                 not null,
   TIPOASIGNACION       INT2                 not null default 5
      constraint CKC_TIPOASIGNACION_USUPROYE check (TIPOASIGNACION in (1,2,3,4,5,6)),
   CREDITOSAPROBADOS    INT2                 not null,
   OBSERVACIONES        TEXT                 null,
   FINPROCESO           BOOL                 null,
   constraint PK_USUPROYECTOGRADO primary key (CODRELPROYUSU)
);

comment on column USUPROYECTOGRADO.TIPOASIGNACION is
'1  Director
2  Calificador
3  Comite evaluador
4  Docente
5  Estudiante propietario
6  Estudiante Pendiente x aprobacion
7  Estudiante incluido';

-- set table ownership
alter table USUPROYECTOGRADO owner to USER_EVA
;
alter table ACCESOS
   add constraint FK_ACCESOS_REF_USUARIOS foreign key (CODUSUARIO)
      references USUARIOS (CODUSUARIO)
      on delete restrict on update restrict;

alter table ASIGNADOS2
   add constraint FK_ASIGNADO_REFERENCE_REUNIONE foreign key (CODREUINON)
      references REUNIONES (CODREUINON)
      on delete restrict on update restrict;

alter table ASIGNADOS2
   add constraint FK_ASIGNADO_REFERENCE_USUARIOS foreign key (CODUSUARIO)
      references USUARIOS (CODUSUARIO)
      on delete restrict on update restrict;

alter table CONSIGNACIONES
   add constraint FK_CONSIGNA_REF_PROYECTO foreign key (CODPROYECTOGRADO)
      references PROYECTOSGRADO (CODPROYECTOGRADO)
      on delete cascade on update cascade;

alter table DATOSPROYECTO
   add constraint FK_DATOSPRO_REFERENCE_PROYECTO foreign key (CODPROYECTOGRADO)
      references PROYECTOSGRADO (CODPROYECTOGRADO)
      on delete restrict on update restrict;

alter table DOCUMENTOSPROYECTO
   add constraint FK_DOCUMENT_REFERENCE_PROYECTO foreign key (CODPROYECTOGRADO)
      references PROYECTOSGRADO (CODPROYECTOGRADO)
      on delete restrict on update restrict;

alter table FUNCIONALIDADES
   add constraint FK_FUNC_REF_FUNC foreign key (CODPADRE)
      references FUNCIONALIDADES (CODFUNC)
      on delete cascade on update cascade;

alter table HISTORICOESTADOS
   add constraint FK_HISTOESTA_REFERENCE_ESTADOS foreign key (CODESTADO)
      references ESTADOSTRABAJOGRADO (CODESTADO)
      on delete cascade on update cascade;

alter table HISTORICOESTADOS
   add constraint FK_HISTO_REF_PROYEC foreign key (CODPROYECTOGRADO)
      references PROYECTOSGRADO (CODPROYECTOGRADO)
      on delete cascade on update cascade;

alter table PONENCIA
   add constraint FK_PONENCIA_REFERENCE_PROYECTO foreign key (CODPROYECTOGRADO)
      references PROYECTOSGRADO (CODPROYECTOGRADO)
      on delete restrict on update restrict;

alter table PROGRAMAS
   add constraint FK_PROGRAMA_REFERENCE_DECANATU foreign key (CODDECANATURA)
      references DECANATURAS (CODDECANATURA)
      on delete restrict on update restrict;

alter table PROYECTOSGRADO
   add constraint FK_PROYECTO_REFERENCE_TEMAS foreign key (CODTEMA)
      references TEMAS (CODTEMA)
      on delete restrict on update restrict;

alter table REL_FORMATOSMODALIDADES
   add constraint FK_RELMODAFORMA_REF_MODAL foreign key (CODMODALIDADGRADO)
      references MODALIDADESGRADO (CODMODALIDADGRADO)
      on delete cascade on update cascade;

alter table REL_FORMATOSMODALIDADES
   add constraint FK_RELMODAFOR_REF_FORMA foreign key (CODFORMATO)
      references FORMATOSGRADO (CODFORMATO)
      on delete cascade on update cascade;

alter table REL_FUNCTIPOUSU
   add constraint FK_FUNC_REF_TIPOUSUARIO foreign key (CODFUNC)
      references FUNCIONALIDADES (CODFUNC)
      on delete cascade on update cascade;

alter table REL_FUNCTIPOUSU
   add constraint FK_PERFIL_REF_RELMENUSU foreign key (CODPERFIL)
      references PERFILES (CODPERFIL)
      on delete cascade on update cascade;

alter table REL_FUNCUSUARIOS
   add constraint FK_REL_FUNC_REF_USUARIOS foreign key (CODUSUARIO)
      references USUARIOS (CODUSUARIO)
      on delete cascade on update cascade;

alter table REL_FUNCUSUARIOS
   add constraint FK_REL_FUNC_REF_FUNCIONA foreign key (CODFUNC)
      references FUNCIONALIDADES (CODFUNC)
      on delete cascade on update cascade;

alter table REL_REUNIONESPROYECTOS
   add constraint FK_REL_REUN_REFERENCE_REUNIONE foreign key (CODREUINON)
      references REUNIONES (CODREUINON)
      on delete restrict on update restrict;

alter table REL_REUNIONESPROYECTOS
   add constraint FK_REL_REUN_REFERENCE_PROYECTO foreign key (CODPROYECTOGRADO)
      references PROYECTOSGRADO (CODPROYECTOGRADO)
      on delete restrict on update restrict;

alter table TEMAS
   add constraint FK_TEMAS_REFERENCE_USUARIOS foreign key (CODUSUARIO)
      references USUARIOS (CODUSUARIO)
      on delete restrict on update restrict;

alter table TEMAS
   add constraint FK_TEMAS_REFERENCE_PROGRAMA foreign key (CODPROGRAMA)
      references PROGRAMAS (CODPROGRAMA)
      on delete restrict on update restrict;

alter table TEMAS
   add constraint FK_TEMAS_REFERENCE_MODALIDA foreign key (CODMODALIDADGRADO)
      references MODALIDADESGRADO (CODMODALIDADGRADO)
      on delete restrict on update restrict;

alter table USUARIOS
   add constraint FK_USUARIOS_REF_PERFILES foreign key (CODPERFIL)
      references PERFILES (CODPERFIL)
      on delete cascade on update cascade;

alter table USUPROYECTOGRADO
   add constraint FK_REL_PROYECTOS_REF_USU foreign key (CODUSUARIO)
      references USUARIOS (CODUSUARIO)
      on delete cascade on update cascade;

alter table USUPROYECTOGRADO
   add constraint FK_RELPROYUSU_REF_PROYECTO foreign key (CODPROYECTOGRADO)
      references PROYECTOSGRADO (CODPROYECTOGRADO)
      on delete cascade on update cascade;

