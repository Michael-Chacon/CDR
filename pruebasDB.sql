CREATE DATABASE cdr;
USE cdr;

CREATE TABLE administrativo(
	id INT(4) AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(20) NOT NULL,
	pellidos VARCHAR(20) NOT NULL,
	CONSTRAINT pk_administrativo PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE grados(
		id INT(4) AUTO_INCREMENT NOT NULL,
		grado VARCHAR(3) NOT NULL,
		CONSTRAINT pk_grado PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE estudiante(
	id INT(4) AUTO_INCREMENT NOT NULL,
	id_gradoE INT(4) NOT NULL,
	nombre VARCHAR(20) NOT NULL,
	pellidos VARCHAR(20) NOT NULL,
	CONSTRAINT pk_estudiante PRIMARY KEY(id),
	CONSTRAINT fk_grado_estudiante FOREIGN KEY(id_gradoE) REFERENCES grados(id)
)ENGINE=InnoDb;

CREATE TABLE docente(
	id INT(4) AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(20) NOT NULL,
	pellidos VARCHAR(20) NOT NULL,
	CONSTRAINT pk_docente PRIMARY KEY(id)
)ENGINE=InnoDb;
#añadir los campos faltantes a la tabla docente
alter table docente add numero_resolucion_posesion int(20) not null;
alter table docente add nombre_posgrado varchar(30) null;
alter table docente add fecha_posesion date not null;

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
	CONSTRAINT fk_usuario_credencial FOREIGN KEY(id_administrativo) REFERENCES administrativo(id),
	CONSTRAINT fk_estudiante_credencial FOREIGN KEY(id_estudiante) REFERENCES estudiante(id),
	CONSTRAINT fk_docente_credencial FOREIGN KEY(id_docente) REFERENCES docente(id)
)ENGINE=InnoDb;

CREATE TABLE materias(
		id INT(4) AUTO_INCREMENT NOT NULL,
		id_grado INT(4) NOT NULL,
		nombre VARCHAR(30) NOT NULL,
		indicadores TEXT NOT NULL,
		CONSTRAINT pk_materias PRIMARY KEY(id),
		CONSTRAINT fk_grado_materia FOREIGN KEY(id_grado) REFERENCES grados(id)
)ENGINE=InnoDb;

CREATE TABLE estudianteMateria(
	id_estudianteM INT(4) NOT NULL,
	id_materiaE INT(4) NOT NULL,
	CONSTRAINT fk_estudiante_materia FOREIGN KEY(id_estudianteM) REFERENCES estudiante(id),
	CONSTRAINT fk_materia_estudiante  FOREIGN KEY(id_materiaE) REFERENCES materias(id)
)ENGINE=InnoDb;



CREATE TABLE años(
	id INT(4) AUTO_INCREMENT NOT NULL,
	año INT(4) not null,
	CONSTRAINT pk_año PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE peridos(
	id INT(4) AUTO_INCREMENT NOT NULL,
	id_año INT(4) NOT NULL,
	inicio DATE NOT NULL,
	fin DATE NOT NULL,
	CONSTRAINT pk_periodo PRIMARY KEY(id),
	CONSTRAINT fk_año_periodo FOREIGN KEY(id_año) REFERENCES año(id)
)ENGINE=InnoDb;


#constulta para ontener datos del estudiante y grado
SELECT e.*, g.grado FROM estudiante e 
INNER JOIN grados g ON g.id = e.id_gradoE;

#ontener los estudiantes que pertenecen a un determinado grado
SELECT e.*, g.id AS 'ig_grado' FROM estudiante e 
INNER JOIN grados g ON g.id = e.id_gradoE
WHERE g.id = $grado;


