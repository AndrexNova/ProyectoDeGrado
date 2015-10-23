--Inserts de prueba para el componente Banco de Temas - trabajos de grado
--Tabla Perfiles
INSERT INTO perfiles(nombreperfil) VALUES ('Administrador');

INSERT INTO perfiles(nombreperfil) VALUES ('Estudiante');

INSERT INTO perfiles(nombreperfil) VALUES ('Secretaria');

INSERT INTO perfiles(nombreperfil) VALUES ('Docente');

-- Tabla Usuarios
INSERT INTO usuarios(codperfil, tipodoc, documento, primerapellido, segundoapellido,nombres, correo, genero, nombreusuario, clave)
 
VALUES (1, 'CC', '77666888', 'Guerrero', 'Alarcón', 'Carlos Andrés', 'anguerrco@msn.com', 1, 'anguerrco@msn.com', md5('123456'));

INSERT INTO usuarios(codperfil, tipodoc, documento, primerapellido, segundoapellido,nombres, correo, genero, nombreusuario, clave)
 
VALUES (1, 'CC', '77666888', 'Cortes', 'Paredes', 'Jhon Jairo', 'jhonjairo.cortesp@live.com', 1, 'jhonjairo', md5('123456'));

INSERT INTO usuarios(codperfil, tipodoc, documento, primerapellido, segundoapellido,nombres, correo, genero, nombreusuario, clave) 

VALUES (3, 'CC', '77666888', 'Ana', 'Maria', 'Ana ', 'anita@live.com', 2, 'anita@live.com', md5('123456'));

INSERT INTO usuarios(codperfil, tipodoc, documento, primerapellido, segundoapellido,nombres, correo, genero, nombreusuario, clave) 

VALUES (4, 'CC', '77666888', 'Cortisona', 'Mendez', 'Paco', 'jhonjairo.cortesp@live.com', 1, 'paco', md5('123456'));

INSERT INTO usuarios(codperfil, tipodoc, documento, primerapellido, segundoapellido,nombres, correo, genero, nombreusuario, clave) 

VALUES (4, 'CC', '77666888', 'Cortisona', 'Mendez', 'Luis', 'jhonjairo.cortesp@live.com', 1, 'luis', md5('123456'));

INSERT INTO usuarios(codperfil, tipodoc, documento, primerapellido, segundoapellido,nombres, correo, genero, nombreusuario, clave) 

VALUES (2, 'CC', '77666888', 'Ramirez','Avella', 'Rosa Lizeth', 'lizeth.uts@hotmail.com', 2, 'lizeth.uts@hotmail.com', md5('123456'));


INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo) 
VALUES (1,NULL,'MENU_SYSTEM_MOON','SYS_MOON','1','URLPAGES','_parent','URLPAGES','text');

INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo)
VALUES (2,1,'Trabajos de Grado','GRA','3','URLPAGES','_parent','fa fa-mortar-board','text');

INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo)
VALUES (3,2,'Modalidades','GRAMOD','1','trabajosdegrado/views/modalidades_index.php','_parent','URLPAGES','text');

INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo) 
VALUES (4,2,'Registro y Seguimiento','GRASEG','2','trabajosdegrado/views/index.php','_parent','URLPAGES','text');

INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo)
VALUES (5,1,'Documentacion','GRAPRE','4','trabajosdegrado/views/documentacion.php','_parent','fa fa-archive','text');

INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo) 
VALUES (6,1,'Verificar Datos','GRA','5','URLPAGES','_parent','fa fa-book','text');

INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo) 
VALUES (7,6,'Proyectos Registrados','GRAVER','1','trabajosdegrado/views/verificar_index.php','_parent','icon-book','text');


INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo) 
VALUES (8,1,'General','KRAUFF','2','URLPAGES','_parent','fa fa-sliders','text');

INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo) 
VALUES (9,8,'Perfiles','KRAUFF','1','krauff/views/perfiles_admin.php','_parent','URLPAGES','text');

INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo) 
VALUES (10,8,'Usuarios','KRAUFF','2','krauff/views/usuarios_admin.php','_parent','URLPAGES','text');


INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo) 
VALUES (11,1,'Banco de Tema','GRA','2','URLPAGES','_parent','glyphicon glyphicon-duplicate','text');


INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo) 
VALUES (12,11,'Resgistro de Temas','GRASEG','1','bancoproyectos/views/temas_admin.php','_parent','URLPAGES','text');


INSERT INTO funcionalidades(codfunc,codpadre,nombre,identificador,orden,urlpagina,target,icono,tipo) 
VALUES (13,11,'Ver de Temas','GRASEG','2','bancoproyectos/views/verprogramas_admin.php','_parent','glyphicon glyphicon-search','text');



--perfil administrador

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 1);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 2);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 3);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 4);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 5);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 6);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 7);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 8);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 9);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 10);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 11);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 12);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (1, 13);



--perfil estudiante

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (2, 2);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (2, 4);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (2, 5);
INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (6, 2);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (6, 4);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (6, 5);
INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (6, 11);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (6, 13);


--perfil secretaria 

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (3, 1);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (3, 2);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (3, 3);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (3, 4);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (3, 5);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (3, 6);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (3, 7);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (3, 11);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (3, 12);



--perfil docente

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (4, 1);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (4, 2);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (4, 3);
INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (4, 4);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (4, 5);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (4, 6);

INSERT into rel_funcusuarios (codusuario, codfunc) VALUES (4, 7);


-- Modalidades


INSERT INTO modalidadesgrado(nombremodalidad, valor, asocompanero) VALUES ('Práctica Profesional', '147376', FALSE);

INSERT INTO modalidadesgrado(nombremodalidad, valor, asocompanero) VALUES ('Seminario Taller', '650000', FALSE);

INSERT INTO modalidadesgrado(nombremodalidad, valor, asocompanero) VALUES ('Proyecto de Investigación', '135000', TRUE);

INSERT INTO modalidadesgrado(nombremodalidad, valor, asocompanero) VALUES ('Práctica Social Comunitaria', '150000', FALSE);

INSERT INTO modalidadesgrado(nombremodalidad, valor, asocompanero) VALUES ('Monografía', '147376', TRUE);

INSERT INTO modalidadesgrado(nombremodalidad, valor, asocompanero) VALUES ('Sistematizacion Informatica', '147376', TRUE);

INSERT INTO modalidadesgrado(nombremodalidad, valor, asocompanero) VALUES ('Proyecto de Desarrollo Tecnologico', '147376', TRUE);



--Estdos trabajos de grado
INSERT INTO estadostrabajogrado(estado, limitedias) VALUES ('Radicación', 8);

INSERT INTO estadostrabajogrado(estado, limitedias) VALUES ('Verificación Pago', 3);

INSERT INTO estadostrabajogrado(estado, limitedias) VALUES ('Preparación documento', 15);

INSERT INTO estadostrabajogrado(estado, limitedias) VALUES ('Comité de Grado', 15);

INSERT INTO estadostrabajogrado(estado, limitedias) VALUES ('Desarrollo', 60);
INSERT INTO estadostrabajogrado(estado, limitedias) VALUES ('Evaluación', 5);

INSERT INTO estadostrabajogrado(estado, limitedias) VALUES ('Devuelto', 5);

INSERT INTO estadostrabajogrado(estado, limitedias) VALUES ('Cerrado', 1);



--Decanaturas
INSERT INTO decanaturas(nombredecanatura) VALUES('CIENCIAS SOCIOECONÓMICAS Y EMPRESARIALES');
INSERT INTO decanaturas(nombredecanatura) VALUES('CIENCIAS NATURALES E INGENIERÍAS');

--Programas
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Electrónica Industrial', 2, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología Deportiva', 2, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Operación y Mantenimiento Electromecánico', 2, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Topografía', 2, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Sistemas de Telecomunicaciones', 2, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Estudios Geotécnicos', 2, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Recursos Ambientales', 2, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Manejo de Petróleo y Gas en Superficie', 2, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Desarrollo de Sistemas informáticos', 2, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Ingeniería Electromecánica ', 2, 2);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Ingeniería Ambiental', 2, 2);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Ingeniería Electrónica', 2, 2);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Ingeniería de Sistemas', 2, 2);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Ingeniería de Telecomunicaciones', 2, 2);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Técnico Profesional en Instalación de Redes Eléctricas', 2, 3);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Técnico Laboral por Competencias en Diseño y Patronaje Industrial de Moda', 1, 4);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Administración de Empresas', 1, 2);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Profesional en Actividad Física y Deporte', 1, 2);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Profesional en Marketing y Negocios Internacionales', 1, 2);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Contaduría Pública', 1, 2);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Contabilidad Financiera', 1, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Gestión Empresarial', 1, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología Deportiva', 1, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Turismo Sostenible', 1, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Gestión Agroindustrial', 1, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Mercadeo y Gestión Comercial', 1, 1);
INSERT INTO programas(nombreprograma, coddecanatura, tipoprograma) VALUES ('Tecnología en Banca y Finanzas', 1, 1);

