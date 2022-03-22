CREATE TABLE cdr_prueba;
USE cdr_prueba;

CREATE TABLE materia(
		id INT(4) AUTO_INCREMENT NOT NULL,
		nombre_mat VARCHAR(30) NOT NULL,
		indicadores_mat TEXT NOT NULL,
		icono VARCHAR(30)  NOT NULL,
		CONSTRAINT pk_materias PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE periodo(
	id INT(4) AUTO_INCREMENT NOT NULL,
	nombre_periodo VARCHAR(10) NOT NULL,
	fecha_inicio DATE NOT NULL,
	fecha_fin DATE NOT NULL,
	CONSTRAINT pk_periodo PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE estudiante(
	id INT(4) AUTO_INCREMENT NOT NULL,
	nombre_e VARCHAR(20) NOT NULL,
	pellidos_e VARCHAR(20) NOT NULL,
	fecha_nacimiento_e  DATE NOT NULL,
	edad_e 	INT(2) NOT NULL,
	sexo_e VARCHAR(10) NOT NULL,
	tipo_identificacion_e VARCHAR(11)  NOT NULL,
	numero_e INT(11) NOT NULL,
	CONSTRAINT pk_estudiante PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE cognitivo(
id_cognitivo INT(3) AUTO_INCREMENT NOT NULL,
porcenteje_cognitvo INT(3) NOT NULL,
porcentaje_evaluacion INT(3) NOT NULL,
porcentaje_trimestral INT(3) NOT NULL,
CONSTRAINT pk_cognitivo PRIMARY KEY (id_cognitivo)
)ENGINE=InnoDb;

CREATE TABLE evaluacion(
id_evaluacion INT(3) AUTO_INCREMENT NOT NULL,
id_estudiante_e INT(3) NOT NULL,
id_materia_e INT(3) NOT NULL,
id_periodo_e INT(3) NOT NULL,
id_cognitivo_e INT(3) NOT NULL,
nota_evaliacion INT(2) NOT NULL,
CONSTRAINT pk_evaluaciones PRIMARY KEY (id_evaluacion),
CONSTRAINT fk_estudiante_evaluacion FOREIGN KEY (id_estudiante_e) REFERENCES estudiante(id),
CONSTRAINT	 fk_mateia_evaluacion FOREIGN KEY (id_materia_e) REFERENCES materia (id),
CONSTRAINT fk_periodo_evaluacion FOREIGN KEY (id_periodo_e) REFERENCES periodo (id),
CONSTRAINT fk_cognitivo_evaliacion FOREIGN KEY (id_cognitivo_e) REFERENCES cognitivo (id_cognitivo)
)ENGINE=InnoDb;

CREATE TABLE trimestral(
id_trimestral INT(3) AUTO_INCREMENT NOT NULL,
id_estudiante_t INT(3) NOT NULL,
id_materia_t INT(3) NOT NULL,
id_periodo_t INT(3) NOT NULL,
id_cognitivo_t INT(3) NOT NULL,
nota_trimestral INT(2) NOT NULL,
CONSTRAINT pk_trimestral PRIMARY KEY (id_trimestral),
CONSTRAINT fk_estudiante_trimestal FOREIGN KEY (id_estudiante_t) REFERENCES estudiante(id),
CONSTRAINT	 fk_mateia_trimestral FOREIGN KEY (id_materia_t) REFERENCES materia (id),
CONSTRAINT fk_periodo_trimestral FOREIGN KEY (id_periodo_t) REFERENCES periodo (id),
CONSTRAINT fk_cognitivo_trimestral FOREIGN KEY (id_cognitivo_t) REFERENCES cognitivo (id_cognitivo)
)ENGINE=InnoDb;

SELECT m.nombre_mat, t.nota_trimestral, e.nota_evaliacion, c.porcentaje_evaluacion, c.porcentaje_trimestral FROM cognitivo c
INNER JOIN evaluacion e ON e.id_cognitivo_e = c.id_cognitivo
INNER JOIN trimestral t ON t.id_cognitivo_t = c.id_cognitivo
INNER JOIN estudiante es ON es.id =e.id_estudiante_e = es.id
INNER JOIN materia m ON m.id = m.id = e.id_materia_e
WHERE es.id = 1 AND   t.id_periodo_t =  1 AND e.id_periodo_e  = 1;