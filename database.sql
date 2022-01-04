CREATE DATABASE cdr_beta;
USE cdr_beta;

CREATE TABLE materia(
		id INT(4) AUTO_INCREMENT NOT NULL,
		id_grado_mat INT(4) NOT NULL,
		nombre_mat VARCHAR(30) NOT NULL,
		indicadores_mat TEXT NOT NULL,
		icono VARCHAR(30)  NOT NULL,
		CONSTRAINT pk_materias PRIMARY KEY(id),
		CONSTRAINT fk_grado_materia FOREIGN KEY(id_grado_mat) REFERENCES grado(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE grado(
		id INT(4) AUTO_INCREMENT NOT NULL,
		nombre_g VARCHAR(3) NOT NULL,
		CONSTRAINT pk_grado PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE periodo(
	id INT(4) AUTO_INCREMENT NOT NULL,
	nombre_periodo VARCHAR(10) NOT NULL,
	fecha_inicio DATE NOT NULL,
	fecha_fin DATE NOT NULL,
	CONSTRAINT pk_periodo PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE padres(
	id INT(4) AUTO_INCREMENT NOT NULL,
	nombre_m VARCHAR(25) NULL,
	apellidos_m VARCHAR(30) NULL,
	fecha_nacimiento_m DATE NULL,
	edad_m INT(2) NULL,
	tipo_identificacion_m VARCHAR(11) NULL,
	numero_m INT(12) NULL,
	lugar_expedicion_m VARCHAR(50) NULL, 
	fecha_expedicion_m DATE NULL,
	telefono_m BIGINT(10) NULL,
	ocupacion_m VARCHAR(50) NULL,
	nombre_p VARCHAR(25) NULL,
	apellidos_p VARCHAR(30) NULL,
	fecha_nacimiento_p DATE NULL,
	edad_p INT(2) NULL,
	tipo_identificacion_p VARCHAR(11) NULL,
	numero_p INT(12) NULL,
	lugar_expedicion_p VARCHAR(50) NULL, 
	fecha_expedicion_p DATE NULL,
	telefono_p BIGINT(10) NULL,
	ocupacion_p VARCHAR(50) NULL,
	direccion VARCHAR(30) NOT NULL,
	correo VARCHAR(30) NOT NULL, 
	CONSTRAINT pk_padres PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE estudiante(
	id INT(4) AUTO_INCREMENT NOT NULL,
	id_gradoE INT(4) NOT NULL,
	id_familia_e INT(4) NOT NULL,
	nombre_e VARCHAR(20) NOT NULL,
	pellidos_e VARCHAR(20) NOT NULL,
	fecha_nacimiento_e  DATE NOT NULL,
	edad_e 	INT(2) NOT NULL,
	sexo_e VARCHAR(10) NOT NULL,
	tipo_identificacion_e VARCHAR(11)  NOT NULL,
	numero_e INT(11) NOT NULL,
	lugar_expedicion_e VARCHAR(50) NOT NULL,
	fecha_expedicion_e DATE NOT NULL,
	direccion_e VARCHAR(30) NOT NULL,
	telefono_e BIGINT(10) NULL,
	correo_e VARCHAR(50) NULL,
	religion_e VARCHAR(20) NOT NULL,
	incapacidad_medica_e VARCHAR(255) NOT NULL,
	grupo_sanguineo_e VARCHAR(2) NOT NULL, 
	rh_e VARCHAR(1) NOT NULL,
	transporte VARCHAR(2) NOT NULL,
	pae VARCHAR(2) NOT NULL,
	CONSTRAINT pk_estudiante PRIMARY KEY(id),
	CONSTRAINT fk_grado_estudiante FOREIGN KEY(id_gradoE) REFERENCES grado(id) ON DELETE CASCADE, 
	CONSTRAINT fk_padres_estudiante FOREIGN KEY(id_familia_e) REFERENCES padres(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE docente(
	id INT(4) AUTO_INCREMENT NOT NULL,
	nombre_d VARCHAR(20) NOT NULL,
	apellidos_d VARCHAR(20) NOT NULL,
	fecha_nacimiento_d DATE NOT NULL,
	edad_d INT(2) NOT NULL,
	sexo_d VARCHAR(10) NOT NULL,
	tipo_identificacion_d VARCHAR(10) NOT NULL,
	numero_d INT(10) NOT NULL,
	lugar_expedicion_d VARCHAR(50) NOT NULL,
	fecha_expedicion_d DATE NOT NULL,
	direccion_d VARCHAR(30) NOT NULL,
	telefono_d BIGINT(10) NOT NULL,
	correo_d VARCHAR(50) NOT NULL,
	religion_d VARCHAR(20) NOT NULL,
	incapacidad_medica_d VARCHAR(255) NOT NULL,
	grupo_sanguineo_d VARCHAR(2) NOT NULL,
	rh_d VARCHAR(1) NOT NULL,
	fecha_posesion_d DATE NOT NULL,
	numero_acta_posesion_d BIGINT NOT NULL,
	numero_resolucion_posesion_d BIGINT NOT NULL,
	pregrado_d VARCHAR(2) NOT NULL,
	nombre_pregrado_d VARCHAR(30) NOT NULL,
	posgrado_d VARCHAR(2) NOT NULL,
	nombre_posgrado_d VARCHAR(30) NOT NULL,
	CONSTRAINT pk_docente PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE administrativo(
	id INT(4) AUTO_INCREMENT NOT NULL,
	nombre_a VARCHAR(20) NOT NULL,
	apellidos_a VARCHAR(20) NOT NULL,
	fecha_nacimiento_a DATE NOT NULL,
	edad_a INT(2) NOT NULL,
	sexo_a VARCHAR(10) NOT NULL,
	cargo_a VARCHAR(11) NOT NULL,
	tipo_identificacion_a VARCHAR(10) NOT NULL,
	numero_a INT(10) NOT NULL,
	lugar_expedicion_a VARCHAR(50) NOT NULL,
	fecha_expedicion_a DATE NOT NULL,
	direccion_a VARCHAR(30) NOT NULL,
	telefono_a BIGINT(10) NOT NULL,
	correo_a VARCHAR(50) NOT NULL,
	religion_a VARCHAR(20) NOT NULL,
	incapacidad_medica_a VARCHAR(255) NOT NULL,
	grupo_sanguineo_a VARCHAR(2) NOT NULL,
	rh_a VARCHAR(1) NOT NULL,
	fecha_posesion_a DATE NOT NULL,
	numero_acta_posesion_a BIGINT NOT NULL,
	numero_resolucion_posesion_a BIGINT NOT NULL,
	pregrado_a VARCHAR(2) NOT NULL,
	nombre_pregrado_a VARCHAR(30) NOT NULL,
	posgrado_a VARCHAR(2) NOT NULL,
	nombre_posgrado_a VARCHAR(30) NOT NULL,
	CONSTRAINT pk_administrativo PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE personal(
	id INT(4) AUTO_INCREMENT NOT NULL,
	nombre_per VARCHAR(20) NOT NULL,
	apellidos_per VARCHAR(20) NOT NULL,
	fecha_nacimiento_per DATE NOT NULL,
	edad_per INT(2) NOT NULL,
	sexo_per VARCHAR(10) NOT NULL,
	cargo_per VARCHAR(11) NOT NULL,
	tipo_identificacion_per VARCHAR(10) NOT NULL,
	numero_per INT(10) NOT NULL,
	lugar_expedicion_per VARCHAR(50) NOT NULL,
	fecha_expedicion_per DATE NOT NULL,
	direccion_per VARCHAR(30) NOT NULL,
	telefono_per BIGINT(10) NOT NULL,
	correo_per VARCHAR(50) NOT NULL,
	religion_per VARCHAR(20) NOT NULL,
	incapacidad_medica_per VARCHAR(255) NOT NULL,
	grupo_sanguineo_per VARCHAR(2) NOT NULL,
	rh_per VARCHAR(1) NOT NULL,
	fecha_posesion_per DATE NOT NULL,
	numero_acta_posesion_per BIGINT NOT NULL,
	numero_resolucion_posesion_per BIGINT NOT NULL,
	pregrado_per VARCHAR(2) NOT NULL,
	nombre_pregrado_per VARCHAR(30) NOT NULL,
	posgrado_per VARCHAR(2) NOT NULL,
	nombre_posgrado_per VARCHAR(30) NOT NULL,
	CONSTRAINT pk_administrativo PRIMARY KEY(id)
)ENGINE=InnoDb;



CREATE TABLE credenciales(
	id INT(4) AUTO_INCREMENT NOT NULL,
	id_administrativo INT(4),
	id_estudiante INT(4),
	id_docente INT(4),
	rol VARCHAR(15) NOT NULL,
	usuario VARCHAR(15) NOT NULL,
	password VARCHAR(20) NOT NULL, 
	estado VARCHAR(8) NOT NULL,
	CONSTRAINT pk_credenciales PRIMARY KEY(id),
	CONSTRAINT fk_usuario_credencial FOREIGN KEY(id_administrativo) REFERENCES administrativo(id) ON DELETE CASCADE,
	CONSTRAINT fk_estudiante_credencial FOREIGN KEY(id_estudiante) REFERENCES estudiante(id) ON DELETE CASCADE,
	CONSTRAINT fk_docente_credencial FOREIGN KEY(id_docente) REFERENCES docente(id) ON DELETE CASCADE
)ENGINE=InnoDb;



CREATE TABLE estudianteMateria(
	id_estudiante_m INT(4) NOT NULL,
	id_materia_e INT(4) NOT NULL,
	CONSTRAINT fk_estudiante_materia FOREIGN KEY(id_estudiante_m) REFERENCES estudiante(id) ON DELETE CASCADE,
	CONSTRAINT fk_materia_estudiante  FOREIGN KEY(id_materia_e) REFERENCES materia(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE notas(
id INT(4) AUTO_INCREMENT NOT NULL,
id_materia_n INT(4) NOT NULL,
id_estudiante_n INT(4) NOT NULL,
id_periodo_n INT(4) NOT NULL,
area VARCHAR(50) NOT NULL,
nota FLOAT(5) NOT NULL,
porcentejes INT(4) NOT NULL,
CONSTRAINT pk_nota PRIMARY KEY(id),
CONSTRAINT fk_materia_nota FOREIGN KEY(id_materia_n) REFERENCES materia(id) ON DELETE CASCADE,
CONSTRAINT fk_estudiante_nota FOREIGN KEY (id_estudiante_n) REFERENCES estudiante(id) ON DELETE CASCADE,
CONSTRAINT fk_periodo_nota FOREIGN KEY (id_periodo_n) REFERENCES periodo(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE falla(
	id INT(4) AUTO_INCREMENT NOT NULL,
	fecha_falla DATE NOT NULL,
	id_estudiante_f INT(4) NOT NULL,
	id_materia_f INT(4) NOT NULL,
	id_periodo_f INT(4) NOT NULL,
	CONSTRAINT pk_falla PRIMARY KEY(id),
	CONSTRAINT fk_estudiante_falla FOREIGN KEY (id_estudiante_f) REFERENCES estudiante(id) ON DELETE CASCADE,
	CONSTRAINT fk_materia_falla FOREIGN KEY (id_materia_f) REFERENCES materia(id) ON DELETE CASCADE,
	CONSTRAINT fk_periodo_falla FOREIGN KEY (id_periodo_f) REFERENCES periodo(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE gradoDocente(
	id_grado_d INT(4) NOT NULL,
	id_docente_g INT(4) NOT NULL,
	CONSTRAINT fk_grado_docente FOREIGN KEY(id_grado_d) REFERENCES grado(id) ON DELETE CASCADE,
	CONSTRAINT fk_docente_grado FOREIGN KEY(id_docente_g) REFERENCES docente(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE calendario(
	id INT(4) AUTO_INCREMENT NOT NULL,
	titulo VARCHAR(50) NOT NULL,
	descripcion VARCHAR(255) NOT NULL,
	color VARCHAR(30) NOT NULL,
	textColor VARCHAR(30) NOT NULL, 
	inicio_evento DATETIME NOT NULL,
	fin_evento DATETIME NOT NULL, 
	CONSTRAINT pk_calendario PRIMARY KEY(id)
)ENGINE=InnoDb;


CREATE TABLE docenteMateria(
	id_docente_mat INT(4) NOT NULL,
	id_materia_doc INT(4) NOT NULL,
	CONSTRAINT fk_materia_docente FOREIGN KEY(id_materia_doc) REFERENCES materia(id) ON DELETE CASCADE,
	CONSTRAINT fk_doncente_materia FOREIGN KEY(id_docente_mat) REFERENCES docente(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE lunes(
	id INT(4) AUTO_INCREMENT NOT NULL,
	id_materia_lunes INT(4) NOT NULL, 
	inicio TIME NOT NULL, 
	fin TIME NOT NULL,
	CONSTRAINT pk_lunes PRIMARY KEY(id), 
	CONSTRAINT fK_materia_lunes FOREIGN KEY(id_materia_lunes) REFERENCES materia(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE martes(
	id INT(4) AUTO_INCREMENT NOT NULL,
	id_materia_martes INT(4) NOT NULL, 
	inicio TIME NOT NULL, 
	fin TIME NOT NULL,
	CONSTRAINT pk_lunes PRIMARY KEY(id), 
	CONSTRAINT fK_materia_martes FOREIGN KEY(id_materia_martes) REFERENCES materia(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE miercoles(
	id INT(4) AUTO_INCREMENT NOT NULL,
	id_materia_miercoles INT(4) NOT NULL, 
	inicio TIME NOT NULL, 
	fin TIME NOT NULL,
	CONSTRAINT pk_lunes PRIMARY KEY(id), 
	CONSTRAINT fK_materia_miercoles FOREIGN KEY(id_materia_miercoles) REFERENCES materia(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE jueves(
	id INT(4) AUTO_INCREMENT NOT NULL,
	id_materia_jueves INT(4) NOT NULL, 
	inicio TIME NOT NULL, 
	fin TIME NOT NULL,
	CONSTRAINT pk_lunes PRIMARY KEY(id), 
	CONSTRAINT fK_materia_jueves FOREIGN KEY(id_materia_jueves) REFERENCES materia(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE viernes(
	id INT(4) AUTO_INCREMENT NOT NULL,
	id_materia_viernes INT(4) NOT NULL, 
	inicio TIME NOT NULL, 
	fin TIME NOT NULL,
	CONSTRAINT pk_lunes PRIMARY KEY(id), 
	CONSTRAINT fK_materia_viernes FOREIGN KEY(id_materia_viernes) REFERENCES materia(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE documentos(
	id INT(4) AUTO_INCREMENT NOT NULL,
	nombre  VARCHAR(255) NOT NULL, 
	descripcion VARCHAR(100) NOT NULL,
	CONSTRAINT pk_documentos PRIMARY KEY(id)
)ENGINE=InnoDb;

--  seleccionar todos los grados
SELECT gd.id_grado_d FROM gradodocente gd
INNER JOIN docente d ON d.id = gd.id_docente_g
WHERE d.id = 4;

# seleccionar los grados que se le asignacion al docente 
SELECT g.* FROM grado g
INNER JOIN gradodocente gd ON g.id = gd.id_grado_d
INNER JOIN docente d ON d.id = gd.id_docente_g
WHERE d.id = 4;
-- consulta  para listar los grados en los que va a dictar clase un docente 
SELECT  g.id, g.nombre_g, m.*FROM gradodocente gd
INNER JOIN grado g ON g.id = gd.id_grado_d
INNER JOIN materia m ON m.id_grado_mat =  gd.id_grado_d
WHERE gd.id_grado_d = 1 AND gd.id_docente_g = 4;

# consulta para obtener las materias matriculadas en un cierto grado
SELECT dm.*,  m.nombre_mat , g.nombre_g FROM docentemateria dm
INNER JOIN docente d ON d.id = id_docente_mat
INNER JOIN materia m ON m.id = dm.id_materia_doc
INNER JOIN grado g ON g.id = m.id_grado_mat
WHERE d.id = 1 AND g.id = 1;

# seleccionar el horario de las materias de detenminado dia 
SELECT m.*, l.* FROM materia m
INNER JOIN lunes l ON l.id_materia_lunes = m.id
WHERE m.id_grado_mat = 1;

#seleccionar los datos de un estudiante en especifico y los datos de sus padres
SELECT e.*, p.* FROM estudiante e 
INNER JOIN padres p ON p.id = e.id_familia_e
WHERE e.id = 1 AND p.id = 1;

# obtener el horario del docente para el dia lunes
SELECT mar.inicio, mar.fin, m.nombre_mat, g.nombre_g FROM martes mar
INNER JOIN materia m ON m.id = mar.id_materia_martes
INNER JOIN grado g ON g.id = m.id_grado_mat
INNER JOIN docentemateria dm ON dm.id_materia_doc = m.id
INNER JOIN docente d ON d.id = dm.id_docente_mat
WHERE d.id = 1;
