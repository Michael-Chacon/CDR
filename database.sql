CREATE DATABASE cdr_beta;
USE cdr_beta;

CREATE TABLE administrativo(
	id_admin INT(4) AUTO_INCREMENT NOT NULL,
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

CREATE TABLE grado(
		id INT(4) AUTO_INCREMENT NOT NULL,
		id_admin_grado INT(4) NOT NULL,
		nombre_g VARCHAR(3) NOT NULL,
		CONSTRAINT pk_grado PRIMARY KEY(id),
		CONSTRAINT fk_creador_grado FOREIGN KEY (id_admin_grado) REFERENCES administrativo(id_admin)
)ENGINE=InnoDb;

CREATE TABLE areas(
	id_area INT(3) AUTO_INCREMENT NOT NULL,
	nombre_area VARCHAR (60) NOT NULL,
	color VARCHAR(10) NOT NULL,
	CONSTRAINT pk_area PRIMARY KEY(id_area) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE materias_base(
	id_base INT(4) AUTO_INCREMENT NOT NULL,
	id_area_m INT(4) NOT NULL,
	nombre_materia VARCHAR(50) NOT NULL,
	porcentaje_materia_b INT(3) NOT NULL,
	icono VARCHAR(60) NOT NULL,
	CONSTRAINT pk_materias_base PRIMARY KEY (id_base),
	CONSTRAINT fk_base_area FOREIGN KEY (id_area_m) REFERENCES areas(id_area) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE materia(
		id INT(4) AUTO_INCREMENT NOT NULL,
		id_grado_mat INT(4) NOT NULL,
		id_materia_area INT(4) NOT NULL,
		id_admin_materia INT(4) NOT NULL,
		nombre_mat VARCHAR(30) NOT NULL,
		indicadores_mat TEXT NOT NULL,
		porcentaje_materia INT(3) NOT NULL,
		icono VARCHAR(30)  NOT NULL,
		asignacion VARCHAR(2) NOT NULL,
		CONSTRAINT pk_materias PRIMARY KEY(id),
		CONSTRAINT fk_grado_materia FOREIGN KEY(id_grado_mat) REFERENCES grado(id) ON DELETE CASCADE,
		CONSTRAINT fk_materia_area FOREIGN KEY (id_materia_area) REFERENCES areas (id_area) ON DELETE CASCADE,
		CONSTRAINT fk_admin_materia FOREIGN KEY (id_admin_materia) REFERENCES administrativo (id_admin)
)ENGINE=InnoDb;

CREATE TABLE periodo(
	id INT(4) NOT NULL,
	id_admin_periodo INT(4) NOT NULL,
	nombre_periodo VARCHAR(10) NOT NULL,
	fecha_inicio DATE NOT NULL,
	fecha_fin DATE NOT NULL,
	CONSTRAINT pk_periodo PRIMARY KEY(id),
	CONSTRAINT fk_admin_periodo FOREIGN KEY (id_admin_periodo) REFERENCES administrativo (id_admin)
)ENGINE=InnoDb;

INSERT INTO periodo VALUES (1, '2022-01-01', '2022-02-02');
INSERT INTO periodo VALUES (2, '2022-03-03', '2022-04-04');
INSERT INTO periodo VALUES (3, '2022-05-05', '2022-06-06');
-- -----------------------------------------------------

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
	id_admin_estudiante INT(4) NOT NULL,
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
	img 	VARCHAR(255) NULL,
	CONSTRAINT pk_estudiante PRIMARY KEY(id),
	CONSTRAINT fk_grado_estudiante FOREIGN KEY (id_gradoE) REFERENCES grado (id),
	CONSTRAINT fk_padres_estudiante FOREIGN KEY (id_familia_e) REFERENCES padres(id) ON DELETE CASCADE,
	CONSTRAINT fk_admin_estudiante FOREIGN KEY (id_admin_estudiante) REFERENCES administrativo (id_admin)
)ENGINE=InnoDb;

CREATE TABLE docente(
	id INT(4) AUTO_INCREMENT NOT NULL,
	id_admin_docente INT(4) NOT NULL,
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
	img 	VARCHAR(255) NULL,
	director VARCHAR(2) NULL,
	CONSTRAINT pk_docente PRIMARY KEY(id),
	CONSTRAINT fk_admin_docente FOREIGN KEY (id_admin_docente) REFERENCES administrativo (id_admin)
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
	idC INT(4) AUTO_INCREMENT NOT NULL,
	id_administrativo INT(4),
	id_estudiante INT(4),
	id_docente INT(4),
	rol VARCHAR(15) NOT NULL,
	usuario VARCHAR(15) NOT NULL,
	password VARCHAR(20) NOT NULL, 
	estado VARCHAR(8) NOT NULL,
	CONSTRAINT pk_credenciales PRIMARY KEY(id),
	CONSTRAINT fk_usuario_credencial FOREIGN KEY(id_administrativo) REFERENCES administrativo(id_admin) ON DELETE CASCADE,
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
id_docente_nota INT(4) NOT NULL,
id_materia_n INT(4) NOT NULL,
id_estudiante_n INT(4) NOT NULL,
id_periodo_n INT(4) NOT NULL,
area VARCHAR(50) NOT NULL,
nota FLOAT(5) NOT NULL,
porcentejes INT(4) NOT NULL,
CONSTRAINT pk_nota PRIMARY KEY(id),
CONSTRAINT fk_materia_nota FOREIGN KEY(id_materia_n) REFERENCES materia(id) ON DELETE CASCADE,
CONSTRAINT fk_estudiante_nota FOREIGN KEY (id_estudiante_n) REFERENCES estudiante(id) ON DELETE CASCADE,
CONSTRAINT fk_periodo_nota FOREIGN KEY (id_periodo_n) REFERENCES periodo(id) ON DELETE CASCADE,
CONSTRAINT fk_docente_notas FOREIGN KEY (id_docente_nota) REFERENCES docente (id)
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
	CONSTRAINT fk_materia_docente FOREIGN KEY (id_materia_doc) REFERENCES materia (id) ON DELETE CASCADE,
	CONSTRAINT fk_doncente_materia FOREIGN KEY (id_docente_mat) REFERENCES docente (id) ON DELETE CASCADE
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

CREATE TABLE documentosdocentes(
	id INT(4) AUTO_INCREMENT NOT NULL,
	nombre  VARCHAR(255) NOT NULL, 
	descripcion VARCHAR(100) NOT NULL,
	CONSTRAINT pk_documentos_docentes PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE documentosestudiantes(
	id INT(4) AUTO_INCREMENT NOT NULL,
	nombre  VARCHAR(255) NOT NULL,
	descripcion VARCHAR(100) NOT NULL,
	CONSTRAINT pk_documentos_estudiantes PRIMARY KEY(id)
)ENGINE=InnoDb;

# tablas nuevas
CREATE TABLE documentosClase(
 id INT(4) AUTO_INCREMENT NOT NULL,
 id_materia_d INT(4) NOT NULL,
 titulo VARCHAR(200)  NOT NULL, 
 fecha DATE NOT NULL,
 formato VARCHAR(7) NOT NULL,
 documento VARCHAR(255) NOT NULL,
 descripcion TEXT NOT NULL,
 CONSTRAINT pk_documentos_clase PRIMARY KEY(id),
 CONSTRAINT fk_documentos_clase_materia FOREIGN KEY(id_materia_d) REFERENCES materia(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE actividadesMateria(
	id INT(4) AUTO_INCREMENT NOT NULL, 
	id_materia_a INT(4) NOT NULL,
	titulo_actividad VARCHAR(100) NOT NULL, 
	fecha DATE NOT NULL, 
	descripcion TEXT NOT NULL, 
	CONSTRAINT pk_actividad_materia PRIMARY KEY(id), 
	CONSTRAINT fk_actividad_materia FOREIGN KEY(id_materia_a) REFERENCES materia(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE aulas(
	id_aula INT(3) AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(5) NOT NULL,
	asignada VARCHAR (2) NOT NULL,
	CONSTRAINT pk_aulas PRIMARY KEY(id_aula)
)ENGINE=InnoDb;

CREATE TABLE observaciones(
	id_observacion INT(3) AUTO_INCREMENT NOT NULL,
	id_estudiante_ob INT(3) NOT NULL,
	fecha_ob DATE NOT NULL,
	docente VARCHAR(30) NOT NULL,
	observacion VARCHAR(200) NOT NULL,
	acciones VARCHAR(500) NOT NULL,
	CONSTRAINT pK_observador PRIMARY KEY(id_observacion),
	CONSTRAINT fk_observador_estudiante FOREIGN KEY(id_estudiante_ob) REFERENCES estudiante(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE director(
	id_dir INT(3) AUTO_INCREMENT NOT NULL,
	id_docente_dir INT(3) NOT NULL,
	id_grado_dir INT(3) NOT NULL,
	CONSTRAINT pk_director PRIMARY KEY(id_dir),
	CONSTRAINT fk_docente_dir_grado FOREIGN KEY(id_docente_dir) REFERENCES docente(id) ON DELETE CASCADE,
	CONSTRAINT fk_grado_dir_docente FOREIGN KEY(id_grado_dir) REFERENCES grado(id) ON DELETE CASCADE
)ENGINE=InnoDb;

CREATE TABLE aulaGrado(
aula_grado INT(3) AUTO_INCREMENT NOT NULL,
id_aula_grado INT(3) NOT NULL,
id_grado_aula INT(3) NOT NULL,
CONSTRAINT pk_aula_grado PRIMARY KEY(aula_grado),
CONSTRAINT fk_aula_grado FOREIGN KEY (id_aula_grado) REFERENCES aulas(id_aula) ON DELETE CASCADE,
CONSTRAINT fk_grado_aula FOREIGN KEY (id_grado_aula) REFERENCES grado(id) ON DELETE CASCADE
)ENGINE=InnoDb;

-- ----------------COGNITIVO---------------------------------------------
CREATE TABLE cognitivo(
id_cognitivo INT(3) AUTO_INCREMENT NOT NULL,

porcentaje_cognitivo INT(3) DEFAULT 0,
porcentaje_evaluacion INT(3) DEFAULT 0,
porcentaje_trimestral INT(3) DEFAULT 0,
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
CONSTRAINT fk_estudiante_evaluacion FOREIGN KEY (id_estudiante_e) REFERENCES estudiante(id) ON DELETE CASCADE,
CONSTRAINT	 fk_mateia_evaluacion FOREIGN KEY (id_materia_e) REFERENCES materia (id) ON DELETE CASCADE,
CONSTRAINT fk_periodo_evaluacion FOREIGN KEY (id_periodo_e) REFERENCES periodo (id),
CONSTRAINT fk_cognitivo_evaluacion FOREIGN KEY (id_cognitivo_e) REFERENCES cognitivo (id_cognitivo)
)ENGINE=InnoDb;

CREATE TABLE trimestral(
id_trimestral INT(3) AUTO_INCREMENT NOT NULL,
id_estudiante_t INT(3) NOT NULL,
id_materia_t INT(3) NOT NULL,
id_periodo_t INT(3) NOT NULL,
id_cognitivo_t INT(3) NOT NULL,
nota_trimestral INT(2) NOT NULL,
CONSTRAINT pk_trimestral PRIMARY KEY (id_trimestral),
CONSTRAINT fk_estudiante_trimestal FOREIGN KEY (id_estudiante_t) REFERENCES estudiante(id) ON DELETE CASCADE,
CONSTRAINT	 fk_mateia_trimestral FOREIGN KEY (id_materia_t) REFERENCES materia (id) ON DELETE CASCADE,
CONSTRAINT fk_periodo_trimestral FOREIGN KEY (id_periodo_t) REFERENCES periodo (id),
CONSTRAINT fk_cognitivo_trimestral FOREIGN KEY (id_cognitivo_t) REFERENCES cognitivo (id_cognitivo)
)ENGINE=InnoDb;

-------------------------PROCEDIMENTAL-------------------------
CREATE TABLE procedimental(
id_procedimental INT(3) AUTO_INCREMENT NOT NULL,
porcenteje_procedimental INT(3) DEFAULT 0,
porcentaje_Tindividual INT(3) DEFAULT 0,
porcentaje_Tcolaborativo INT(3) DEFAULT 0,
CONSTRAINT pk_procedimental PRIMARY KEY (id_procedimental)
)ENGINE=InnoDb;

CREATE TABLE Tindividual(
id_Tindividual INT(3) AUTO_INCREMENT NOT NULL,
id_estudiante_Tindividual INT(3) NOT NULL,
id_materia_Tindividual INT(3) NOT NULL,
id_periodo_Tindividual INT(3) NOT NULL,
id_procedimental_Tindividual INT(3) NOT NULL,
nota_Tindividual INT(2) NOT NULL,
CONSTRAINT pk_trabajo_individual PRIMARY KEY (id_Tindividual),
CONSTRAINT fk_estudiante_Tindividual FOREIGN KEY (id_estudiante_Tindividual) REFERENCES estudiante(id) ON DELETE CASCADE,
CONSTRAINT	 fk_mateia_Tindividual FOREIGN KEY (id_materia_Tindividual) REFERENCES materia (id) ON DELETE CASCADE,
CONSTRAINT fk_periodo_Tindividual FOREIGN KEY (id_periodo_Tindividual) REFERENCES periodo (id),
CONSTRAINT fk_cognitivo_Tindividual FOREIGN KEY (id_procedimental_Tindividual) REFERENCES procedimental (id_procedimental)
)ENGINE=InnoDb;

CREATE TABLE Tcolaborativo(
id_Tcolaborativo INT(3) AUTO_INCREMENT NOT NULL,
id_estudiante_Tcolaborativo INT(3) NOT NULL,
id_materia_Tcolaborativo INT(3) NOT NULL,
id_periodo_Tcolaborativo INT(3) NOT NULL,
id_procedimental_Tcolaborativo INT(3) NOT NULL,
nota_Tcolaborativo INT(2) NOT NULL,
CONSTRAINT pk_trabajo_colaborativo PRIMARY KEY (id_Tcolaborativo),
CONSTRAINT fk_estudiante_Tcolaborativo FOREIGN KEY (id_estudiante_Tcolaborativo) REFERENCES estudiante(id) ON DELETE CASCADE,
CONSTRAINT	 fk_mateia_Tcolaborativo FOREIGN KEY (id_materia_Tcolaborativo) REFERENCES materia (id)  ON DELETE CASCADE,
CONSTRAINT fk_periodo_Tcolaborativo FOREIGN KEY (id_periodo_Tcolaborativo) REFERENCES periodo (id),
CONSTRAINT fk_cognitivo_Tcolaborativo FOREIGN KEY (id_procedimental_Tcolaborativo) REFERENCES procedimental (id_procedimental)
)ENGINE=InnoDb;

-- ----------------ACTITUDINAL---------------------------------------------
CREATE TABLE actitudinal(
id_actitudinal INT(3) AUTO_INCREMENT NOT NULL,
porcenteje_actitudinal INT(3) DEFAULT 0,
porcentaje_apreciativa INT(3) DEFAULT 0,
porcentaje_autoevaluacion INT(3) DEFAULT 0,
CONSTRAINT pk_actitudinal PRIMARY KEY (id_actitudinal)
)ENGINE=InnoDb;

CREATE TABLE apreciativa(
id_apreciativa INT(3) AUTO_INCREMENT NOT NULL,
id_estudiante_apreciativa INT(3) NOT NULL,
id_materia_apreciativa INT(3) NOT NULL,
id_periodo_apreciativa INT(3) NOT NULL,
id_actitudinal_apreciativa INT(3) NOT NULL,
nota_apreciativa INT(2) NOT NULL,
CONSTRAINT pk_apreciativa PRIMARY KEY (id_apreciativa),
CONSTRAINT fk_estudiante_apreciativa FOREIGN KEY (id_estudiante_apreciativa) REFERENCES estudiante(id) ON DELETE CASCADE,
CONSTRAINT	 fk_mateia_apreciativa FOREIGN KEY (id_materia_apreciativa) REFERENCES materia (id) ON DELETE CASCADE,
CONSTRAINT fk_periodo_apreciativa FOREIGN KEY (id_periodo_apreciativa) REFERENCES periodo (id),
CONSTRAINT fk_cognitivo_apreciativa FOREIGN KEY (id_actitudinal_apreciativa) REFERENCES actitudinal (id_actitudinal)
)ENGINE=InnoDb;

CREATE TABLE autoevaluacion(
id_autoevaluacion INT(3) AUTO_INCREMENT NOT NULL,
id_estudiante_autoevaluacion INT(3) NOT NULL,
id_materia_autoevaluacion INT(3) NOT NULL,
id_periodo_autoevaluacion INT(3) NOT NULL,
id_actitudinal_autoevaluacion INT(3) NOT NULL,
nota_trimestral INT(2) NOT NULL,
CONSTRAINT pk_autoevaluacion PRIMARY KEY (id_autoevaluacion),
CONSTRAINT fk_estudianteautoevaluacion FOREIGN KEY (id_estudiante_autoevaluacion) REFERENCES estudiante(id) ON DELETE CASCADE,
CONSTRAINT	 fk_mateia_autoevaluacion FOREIGN KEY (id_materia_autoevaluacion) REFERENCES materia (id) ON DELETE CASCADE,
CONSTRAINT fk_periodo_autoevaluacion FOREIGN KEY (id_periodo_autoevaluacion) REFERENCES periodo (id),
CONSTRAINT fk_actitudinal_autoevaluacion FOREIGN KEY (id_actitudinal_autoevaluacion) REFERENCES actitudinal (id_actitudinal)
)ENGINE=InnoDb;

# icono
CREATE TABLE iconos(
	id_icono INT(3) AUTO_INCREMENT NOT NULL,
	icono VARCHAR(50) NOT NULL,
	CONSTRAINT pk_iconos PRIMARY KEY (id_icono)
)ENGINE=InnoDb;
INSERT INTO iconos VALUES (NULL, 'bi bi-rulers');
INSERT INTO iconos VALUES (NULL, 'bi bi-activity');
INSERT INTO iconos VALUES (NULL, 'bi bi-translate');
INSERT INTO iconos VALUES (NULL, 'bi bi-patch-question');
INSERT INTO iconos VALUES (NULL, 'bi bi-yin-yang');
INSERT INTO iconos VALUES (NULL, 'bi bi-globe');
INSERT INTO iconos VALUES (NULL, 'bi bi-cloud-sun');
INSERT INTO iconos VALUES (NULL, 'bi bi-book');
INSERT INTO iconos VALUES (NULL, 'bi bi-spellcheck');
INSERT INTO iconos VALUES (NULL, 'bi bi-graph-down');
INSERT INTO iconos VALUES (NULL, 'bi bi-list-ol');
INSERT INTO iconos VALUES (NULL, 'bi bi-droplet-half');
INSERT INTO iconos VALUES (NULL, 'bi bi-brightness-high');
INSERT INTO iconos VALUES (NULL, 'bi bi-alarm');
INSERT INTO iconos VALUES (NULL, 'bi bi-arrow-repeat');
INSERT INTO iconos VALUES (NULL, 'bi bi-at');
INSERT INTO iconos VALUES (NULL, 'bi bi-arrows-collapse');
INSERT INTO iconos VALUES (NULL, 'bi bi-award');
INSERT INTO iconos VALUES (NULL, 'bi bi-back');
INSERT INTO iconos VALUES (NULL, 'bi bi-backspace');
INSERT INTO iconos VALUES (NULL, 'bi bi-bank');
INSERT INTO iconos VALUES (NULL, 'bi bi-bar-chart-line');
INSERT INTO iconos VALUES (NULL, 'bi bi-bar-chart-steps');
INSERT INTO iconos VALUES (NULL, 'bi bi-bell');
INSERT INTO iconos VALUES (NULL, 'bi bi-bookmark-star');
INSERT INTO iconos VALUES (NULL, 'bi bi-box');
INSERT INTO iconos VALUES (NULL, 'bi bi-brush');
INSERT INTO iconos VALUES (NULL, 'bi bi-calculator');
INSERT INTO iconos VALUES (NULL, 'bi bi-cash-coin');
INSERT INTO iconos VALUES (NULL, 'bi bi-coin');
INSERT INTO iconos VALUES (NULL, 'bi bi-dribbble');
INSERT INTO iconos VALUES (NULL, 'bi bi-graph-down-arrow');
INSERT INTO iconos VALUES (NULL, 'bi bi-hammer');
INSERT INTO iconos VALUES (NULL, 'bi bi-palette');
INSERT INTO iconos VALUES (NULL, 'bi bi-people');
INSERT INTO iconos VALUES (NULL, 'bi bi-piggy-bank');
INSERT INTO iconos VALUES (NULL, 'bi bi-radioactive');
INSERT INTO iconos VALUES (NULL, 'bi bi-stars');
-- -----------------------------------------------------

# tabla para almacenar notas definitvas
CREATE TABLE notasdefinitivas(
	id_nota INT(3) AUTO_INCREMENT NOT NULL,
	id_estudiante_nd INT(3) NOT NULL,
	id_materia_nd INT(3) NOT NULL,
	id_periodo_nd INT(3) NOT NULL,
	nota_definitiva INT(4) NOT NULL,
	fecha DATE NOT NULL,
	hora TIME NOT NULL,
	CONSTRAINT pk_nota_definitiva PRIMARY KEY (id_nota),
	CONSTRAINT fk_estudiante_nota FOREIGN KEY (id_estudiante_nd) REFERENCES estudiante (id) ON DELETE CASCADE,
	CONSTRAINT fk_materia_nota FOREIGN KEY (id_materia_nd) REFERENCES materia (id) ON DELETE CASCADE,
	CONSTRAINT fk_periodo_nota FOREIGN KEY (id_periodo_nd) REFERENCES periodo (id)
)ENGINE=InnoDb;

# Tabla para almacenar el promedio por periodo de un estudiante
CREATE TABLE promedioEstudiante(
	id_avg INT(10) AUTO_INCREMENT NOT NULL,
	id_estudiante_avg INT(4) NOT NULL,
	id_periodo_avg INT(4) NOT NULL,
	id_grado_avg INT(4) NOT NULL,
	promedio FLOAT(4,2) NOT NULL,
	CONSTRAINT pk_promedio PRIMARY KEY (id_avg),
	CONSTRAINT fk_estudiante_avg FOREIGN KEY (id_estudiante_avg) REFERENCES estudiante (id) ON DELETE CASCADE,
	CONSTRAINT fk_periodo_avg FOREIGN KEY (id_periodo_avg) REFERENCES periodo (id),
	CONSTRAINT fk_grado_avg FOREIGN KEY (id_grado_avg) REFERENCES grado (id)
)ENGINE=InnoDb;

-- -----------------------------------------------BOLETIN ----------------------------------
CREATE TABLE boletin(
	id_boletin  INT(10) AUTO_INCREMENT NOT NULL,
	id_docente_boletin INT(4) NOT NULL,
	id_estudiante_boletin INT(10) NOT NULL,
	id_materia_boletin INT(10) NOT NULL,
	id_area_boletin INT(10) NOT NULL,
	id_periodo_boletin INT(10) NOT NULL,
	nombre_materia VARCHAR(50) NOT NULL,
	nombre_estudiante VARCHAR(40) NOT NULL,
	nombre_docente VARCHAR(40) NOT NULL,
	observaciones TEXT NOT NULL,
	recuperacion_nota VARCHAR(10) NULL,
	nota_periodo1 INT(2) NOT NULL,
	nota_periodo2 INT(2) NOT NULL,
	nota_periodo3 INT(2) NOT NULL,
	primerdio_materia FLOAT NOT NULL,
	total_fallas_periodo INT(2) NOT NULL,
	CONSTRAINT pk_boletin PRIMARY KEY (id_boletin),
	CONSTRAINT fk_estudiante_boletin FOREIGN KEY (id_estudiante_boletin) REFERENCES estudiante (id) ON DELETE CASCADE,
	CONSTRAINT fk_materia_boletin FOREIGN KEY (id_materia_boletin) REFERENCES materia (id) ON DELETE CASCADE,
	CONSTRAINT fk_area_boletin FOREIGN KEY (id_area_boletin) REFERENCES areas (id_area),
	CONSTRAINT fk_periodo_boletin FOREIGN KEY (id_periodo_boletin) REFERENCES periodo (id),
	CONSTRAINT fk_boletin_docente FOREIGN KEY (id_docente_boletin) REFERENCES docente (id)
)ENGINE=InnoDb;

# tabla para avilitar o desabilitar el envio de notas al boletin general
CREATE TABLE habilitarBoletin(
	id_estado INT(3) NOT NULL,
	estado VARCHAR(15) NOT NULL,
	CONSTRAINT pd_habilitar_boletin PRIMARY KEY (id_estado)
)ENGINE=InnoDb;

INSERT INTO habilitarBoletin VALUES(1, 'Deshabilitado');
-- ----------------------------------------------------------------------------

# tabla para guardar el puesto que ocupa un estudiante
CREATE TABLE puestos(
	id_puesto  INT(10) AUTO_INCREMENT NOT NULL,
	id_estudiante_puesto INT(10) NOT NULL,
	id_periodo_puesto INT(10) NOT NULL,
	id_grado_puesto INT(10) NOT NULL,
	puesto INT(3) NOT NULL,
	fecha DATE NOT NULL,
	hora TIME NOT NULL,
	CONSTRAINT pk_pruesto PRIMARY KEY (id_puesto),
	CONSTRAINT fk_estudiante_puesto FOREIGN KEY (id_estudiante_puesto) REFERENCES estudiante (id) ON DELETE CASCADE,
	CONSTRAINT fk_periodo_puesto FOREIGN KEY (id_periodo_puesto) REFERENCES periodo (id),
	CONSTRAINT fk_grado_puesto FOREIGN KEY (id_grado_puesto) REFERENCES grado (id)
)ENGINE=InnoDb;

	# Tablero de actividades
	CREATE TABLE tableroactividadesestudiantes(
		id INT(3) AUTO_INCREMENT NOT NULL,
		titulo VARCHAR(100) NOT NULL,
		fecha DATE NOT NULL,
		detalle TEXT NOT NULL,
		color VARCHAR(20) NOT NULL,
		CONSTRAINT pk_tablero_actividades_estudiantes PRIMARY KEY (id)
	)ENGINE=InnoDb;

	CREATE TABLE tableroactividadesdocentes(
		id INT(3) AUTO_INCREMENT NOT NULL,
		titulo VARCHAR(100) NOT NULL,
		fecha DATE NOT NULL,
		detalle TEXT NOT NULL,
		color VARCHAR(20) NOT NULL,
		CONSTRAINT pk_tablero_actividades_docentes PRIMARY KEY (id)
	)ENGINE=InnoDb;

# Tabla para registar las notas de comportamiento de los estudiante por parte del docente
CREATE TABLE notacomportamiento(
	id INT(4) AUTO_INCREMENT NOT NULL,
	id_estudiante_compor INT(4) NOT NULL,
	id_periodo_compor INT(4) NOT NULL,
	observacion TEXT NOT NULL,
	nota FLOAT NOT NULL,
	CONSTRAINT pk_nota_comportamiento PRIMARY KEY (id),
	CONSTRAINT fk_estudiante_comportamiento FOREIGN KEY (id_estudiante_compor) REFERENCES estudiante (id) ON DELETE CASCADE,
	CONSTRAINT fk_nota_compor_periodo FOREIGN KEY (id_periodo_compor) REFERENCES periodo (id)
)ENGINE=InnoDb;



-- ------------------------------------------------------------------- INICIO TABLAS Y TRIGGERS PARA AUDITORIA --------------------------------------------------------
# Tabla para ver quien actualizo el periodo academico
CREATE TABLE update_periodo(
	id_up INT(4) AUTO_INCREMENT NOT NULL,
	nombre_admin_up VARCHAR(50) NOT NULL,
	nombre_periodo VARCHAR(12) NOT NULL,
	fecha_inicio VARCHAR (15) NOT NULL,
	fecha_fin VARCHAR(15) NOT NULL,
	fecha_modificacion_up DATETIME NOT NULL,
	CONSTRAINT pk_update_periodo PRIMARY KEY (id_up)
)ENGINE=InnoDb;


# tabla para ver quien registro una materia y cuando
CREATE TABLE insertar_grado(
	id_ig INT(4) AUTO_INCREMENT NOT NULL,
	id_admin_ig INT(4) NOT NULL,
	nombre_grado_ig VARCHAR(10) NOT NULL,
	fecha_creacion_grado DATETIME NOT NULL,
	CONSTRAINT pk_insertar_grado PRIMARY KEY (id_ig),
	CONSTRAINT fk_admin_insert_grado FOREIGN KEY (id_admin_ig) REFERENCES administrativo (id_admin)
)ENGINE=InnoDb;
# trigger para auditar la creacion de lo grados
CREATE TRIGGER insertar_grado_bi BEFORE INSERT ON grado
FOR EACH ROW
INSERT INTO insertar_grado (id_admin_ig, nombre_grado_ig, fecha_creacion_grado)
VALUES (new.id_admin_grado, new.nombre_g, NOW());


# tabla para ver quien registro a un estudiante y sus padres
CREATE TABLE insertar_estudiante(
	id_ie INT(4) AUTO_INCREMENT NOT NULL,
	id_admin_ie INT(4) NOT NULL,
	nombre_estudiante_ie VARCHAR(20) NOT NULL,
	apellidos_estudiante_ie VARCHAR(30) NOT NULL,
	identificacion_ie INT(11) NOT NULL,
	fecha_creacion_ie DATETIME NOT NULL,
	CONSTRAINT pk_insertar_estudiante PRIMARY KEY (id_ie),
	CONSTRAINT fk_insertar_estudiante FOREIGN KEY (id_admin_ie) REFERENCES administrativo (id_admin)
)ENGINE=InnoDb;
# trigger  para auditrar el registro de estudiantes
CREATE TRIGGER insertar_estudiante_ai BEFORE INSERT ON estudiante
FOR EACH ROW
INSERT INTO insertar_estudiante (id_admin_ie, nombre_estudiante_ie, apellidos_estudiante_ie, identificacion_ie, fecha_creacion_ie)
VALUES(new.id_admin_estudiante, new.nombre_e, new.apellidos_e, new.numero_e, NOW());


# tabla para registar las fecha en que se modifico un estudiante
CREATE TABLE actualizar_estudiante(
	id_ue INT(4) AUTO_INCREMENT NOT NULL,
	nombre_admin_ue VARCHAR(50) NOT NULL,
	nombre_estudiante_ue VARCHAR(20) NOT NULL,
	apellidos_estudiante_ue VARCHAR(30) NOT NULL,
	identificacion_ue INT(11) NOT NULL,
	fecha_modificacion_ue DATETIME NOT NULL,
	CONSTRAINT pk_actualizar_estudiante PRIMARY KEY (id_ue)
)ENGINE=InnoDb;


# tabla para registar las fecha en que se inserto un docente
CREATE TABLE insertar_docente(
	id_id INT(4) AUTO_INCREMENT NOT NULL,
	id_admin_id INT(4) NOT NULL,
	nombre_docente_id VARCHAR(20) NOT NULL,
	apellidos_docente_id VARCHAR(30) NOT NULL,
	identificacion_id INT(11) NOT NULL,
	fecha_modificacion_id DATETIME NOT NULL,
	CONSTRAINT pk_insetar_docente PRIMARY KEY (id_id),
	CONSTRAINT fk_admin_insertar_docente FOREIGN KEY (id_admin_ue) REFERENCES administrativo (id_admin)
)ENGINE=InnoDb;
# trigger para aiditar cuando se actualizar los datos de un docente
CREATE TRIGGER insertar_docente_ai AFTER INSERT ON docente
FOR EACH ROW
INSERT INTO insertar_docente (id_admin_id, nombre_docente_id, apellidos_docente_id, identificacion_id, fecha_modificacion_id)
VALUES(new.id_admin_docente, new.nombre_d, new.apellidos_d, new.numero_d, NOW());


# tabla para registar las fecha en que se modifico un docente
CREATE TABLE actualizar_docente(
	id_ue INT(4) AUTO_INCREMENT NOT NULL,
	nombre_admin_ud VARCHAR(50) NOT NULL,
	nombre_docente_ud VARCHAR(20) NOT NULL,
	apellidos_docente_ud VARCHAR(30) NOT NULL,
	identificacion_ud INT(11) NOT NULL,
	fecha_modificacion_ud DATETIME NOT NULL,
	CONSTRAINT pk_actualizar_docente PRIMARY KEY (id_ue)
)ENGINE=InnoDb;

# tabla para registrar la fecha de las acutalizaciones de las credenciales de los usuaros
CREATE TABLE actualizar_credenciales(
	id_acu INT(4) AUTO_INCREMENT NOT NULL,
	nombre_admin_acu VARCHAR(50) NOT NULL,
	nombre_usuario_acu VARCHAR(20) NOT NULL,
	fecha_actualizacion_acu DATETIME NOT NULL,
	CONSTRAINT pk_admin_credenciales PRIMARY KEY (id_acu)
)ENGINE=InnoDb;


# tabla para registrar la habilitacion del boletín
CREATE TABLE habilitacion_boletin(
	id_hb INT(4) AUTO_INCREMENT NOT NULL,
	nombre_admin_hb VARCHAR(50) NOT NULL,
	estado_hb VARCHAR(15) NOT NULL,
	fecha_modificacion_hb DATETIME NOT NULL,
	CONSTRAINT pk_admin_habilitacion PRIMARY KEY (id_hb)
)ENGINE=InnoDb;


# tabla para registrar los cambios en la tabla materia
CREATE TABLE insertar_materia(
	id_im INT(4) AUTO_INCREMENT NOT NULL,
	id_admin_im INT(4) NOT NULL,
	id_grado_im INT(4) NOT NULL,
	nombre_materia_im VARCHAR(200) NOT NULL,
	porcentaje_mat_im INT(3) NOT NULL,
	fecha_insercion_im DATETIME NOT NULL,
	CONSTRAINT pk_insertar_materia PRIMARY KEY (id_im,
	CONSTRAINT fk_admin_inserto_mat FOREIGN KEY (id_admin_im) REFERENCES administrativo (id_admin),
	CONSTRAINT fk_grado_insert_mat FOREIGN KEY (id_grado_im) REFERENCES grado (id)
)ENGINE=InnoDb;
#trigger para auditar la insercion de materias
CREATE TRIGGER insertar_materia_ai AFTER INSERT ON materia
FOR EACH ROW
INSERT INTO insertar_materia (id_admin_im, id_grado_im, nombre_materia_im, porcentaje_mat_im, fecha_insercion_im)
VALUES (new.id_admin_materia, new.id_grado_mat, new.nombre_mat, new.porcentaje_materia, NOW());

-- ---------------------------DOCENTES-----------------------------------

# tabla para registrar el ingreso de notas al boletin
CREATE TABLE subir_boletin(
	id_sb INT(4) AUTO_INCREMENT NOT NULL,
	id_docente_sb INT(4) NOT NULL,
	id_estudiante_sb INT(4) NOT NULL,
	nombre_estudiante_sb VARCHAR(40) NOT NULL,
	nombre_docente_sb VARCHAR(40) NOT NULL,
	nombre_materia_sb VARCHAR(50) NOT NULL,
	nota_periodo_1 INT(4) NOT NULL,
	nota_periodo_2 INT(4) NOT NULL,
	nota_periodo_3 INT(4) NOT NULL,
	fecha_insercion_sb DATETIME NOT NULL,
	CONSTRAINT pk_subir_nota PRIMARY KEY (id_sb),
	CONSTRAINT fk_docente_sb FOREIGN KEY (id_docente_sb) REFERENCES docente (id),
	CONSTRAINT fk_estudiante_sb FOREIGN KEY (id_estudiante_sb) REFERENCES estudiante (id)
)ENGINE=InnoDb;
# trigger para auditar la subida de boletines
CREATE TRIGGER subir_boletin_ai AFTER INSERT ON boletin
FOR EACH ROW
INSERT INTO subir_boletin (id_docente_sb, id_estudiante_sb, nombre_estudiante_sb, nombre_docente_sb, nombre_materia_sb, nota_periodo_1, nota_periodo_2, nota_periodo_3, fecha_insercion_sb)
VALUES(new.id_docente_boletin, new.id_estudiante_boletin, new.nombre_estudiante, new.nombre_docente, new.nombre_materia, new.nota_periodo1, new.nota_periodo2, new.nota_periodo3, NOW());


-- ----------------------------FIN TABLAS Y TRIGGERS PARA AUDITORIA INICIO CONSULTAS  A LA TABLAS DE AUDITORIA----------------------------------------------

#consultar tabla isertar_grado
SELECT a.nombre_a, a.apellidos_a, a.cargo_a, ig.nombre_grado_ig, ig.fecha_creacion_grado FROM administrativo a
INNER JOIN insertar_grado ig ON a.id = ig.id_admin_ig;


--  --------------------------------------------	FIN DE LAS CONSULTAS A LAS TABLAS DE AUDITORIA ----------------------------------------------------------------
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
INNER JOIN docente d ON d.id = dm.id_docente_mat
INNER JOIN materia m ON m.id = dm.id_materia_doc
INNER JOIN grado g ON g.id = m.id_grado_mat
WHERE d.id = 2 AND g.id = 1;

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
WHERE d.id = 2;

# consulta para obterner el total de fallas 
SELECT COUNT(id) FROM fallas WHERE id_materia_f = 6 AND id_estudiante_f = 2;

# seleccinar el docente que es director en un grado
SELECT d.nombre_d, d.apellidos_d FROM docente d
INNER JOIN director dir ON dir.id_docente_dir = d.id
WHERE dir.id_grado_dir = 4;

# seleccionar el grado donde es docente es director
SELECT g.* FROM grado g
INNER JOIN director d ON d.id_grado_dir = g.id
WHERE d.id_docente_dir = 2;

# seleccionar el aula de un grado

SELECT a.nombre, a.id_aula FROM aulas a
INNER JOIN aulaGrado au ON au.id_aula_grado = a.id_aula
WHERE au.id_grado_aula = 1;

# seleccionar las notas del criterio cognitivo
SELECT m.nombre_mat, t.nota_trimestral, e.nota_evaliacion, c.porcentaje_evaluacion, c.porcentaje_trimestral FROM cognitivo c
INNER JOIN evaluacion e ON e.id_cognitivo_e = c.id_cognitivo
INNER JOIN trimestral t ON t.id_cognitivo_t = c.id_cognitivo
INNER JOIN estudiante es ON es.id =e.id_estudiante_e = es.id
INNER JOIN materia m ON m.id = m.id = e.id_materia_e
WHERE es.id = 1 AND   t.id_periodo_t =  1 AND e.id_periodo_e  = 1;


# consulta para listar las materias y señalar el area a la que pertenecen

SELECT mb.nombre_materia, a.color FROM materias_base mb
INNER JOIN areas a ON a.id_area = mb.id_area_m
ORDER BY a.id_area;

# seleccionar todas las notas del criterio cognitivo de un estudiante en el periodo 1
SELECT c.*, e.*, t.* FROM evaluacion e
INNER JOIN trimestral t ON t.id_cognitivo_t = e.id_cognitivo_e
INNER JOIN materia m ON m.id = e.id_materia_e
INNER JOIN estudiante es ON es.id = t.id_estudiante_t
INNER JOIN cognitivo c ON c.id_cognitivo = t.id_cognitivo_t
WHERE es.id = 1 AND m.id = 1 AND e.id_periodo_e = 1 AND t.id_periodo_t = 1;

SELECT e.*, c.* FROM evaluacion e
INNER JOIN cognitivo c ON c.id_cognitivo = e.id_cognitivo_e
WHERE e.id_estudiante_e = 1 AND e.id_materia_e = 1 AND e.id_periodo_e = 1;

SELECT d.nombre_d, d.apellidos_d, g.nombre_g FROM director dir
INNER JOIN grado g ON g.id = dir.id_grado_dir
INNER JOIN docente d ON d.id = dir.id_docente_dir
WHERE d.director = 'no';

SELECT g.*,  a.nombre FROM grado g
INNER JOIN aulagrado ag ON ag.id_grado_aula = g.id
INNER JOIN aulas a ON a.id_aula = ag.id_aula_grado;

SELECT m.nombre_mat, m.asignacion, a.nombre_area, d.nombre_d, d.apellidos_d  FROM materia m
INNER JOIN docentemateria dm ON dm.id_materia_doc = m.id
INNER JOIN docente d ON  d.id = dm.id_docente_mat
INNER JOIN areas a ON a.id_area = m.id_materia_area
WHERE m.id = 3;

# listar las materias de un estudiante
SELECT m.* FROM materia m
INNER JOIN estudiantemateria em ON em.id_materia_e = m.id
INNER JOIN estudiante e ON e.id = em.id_estudiante_m
WHERE e.id = 3;

# Obtener los datos del docente y de la materia
SELECT m.*, d.nombre_d, d.apellidos_d, d.nombre_pregrado_d FROM materia m
INNER JOIN docentemateria dm ON dm.id_materia_doc = m.id
INNER JOIN docente d ON d.id = dm.id_docente_mat
WHERE m.id = 7;

# intentar generar el boletin de notas
SELECT estu.nombre_e, mat.nombre_mat, doc.nombre_d,  nd.nota_definitiva FROM estudiantemateria  em
INNER JOIN  estudiante estu  ON estu.id = em.id_estudiante_m
LEFT JOIN docentemateria dm ON  dm.id_materia_doc = em.id_materia_e
INNER JOIN notasdefinitivas nd ON  nd.id_estudiante_nd = estu.id
JOIN docente doc
JOIN materia mat
INNER JOIN grado g ON g.id = mat.id_grado_mat
WHERE nd.id_estudiante_nd = 1 AND g.id = 1;

# reporte de las notas de todos los estudiantes en una materia
SELECT e.nombre_e, e.apellidos_e, nd.nota_definitiva FROM estudiante e
INNER JOIN notasdefinitivas nd ON nd.id_estudiante_nd = e.id
INNER JOIN materia m ON m.id = nd.id_materia_nd
WHERE e.id_gradoE = 1 AND m.id = 6;

# hallar el promedio de estudiante
SELECT AVG(nd.nota_definitiva), e.nombre_e, nd.nota_definitiva FROM notasdefinitivas nd
INNER JOIN estudiante e ON e.id = nd.id_estudiante_nd
INNER JOIN periodo p ON p.id = nd.id_periodo_nd
WHERE e.id = 6 AND p.id =1;

# Listar los puestos de un grado
SELECT e.nombre_e, p.puesto, p.id_periodo_puesto FROM estudiante e
INNER JOIN puestos p ON p.id_estudiante_puesto = e.id
WHERE p.id_grado_puesto = 2 ORDER BY puesto DESC;

# Obtener el puesto que ocupa el estudiante y el promedio, en x periodo
SELECT pe.promedio, p.puesto FROM promedioestudiante pe
INNER JOIN estudiante e ON e.id = pe.id_estudiante_avg
INNER JOIN puestos p ON p.id_estudiante_puesto = e.id
WHERE e.id = 6 AND p.id_periodo_puesto = 1 AND id_periodo_avg = 1;

# seleccionar el numero de materias perdidad en x periodo
SELECT COUNT(id_nota) AS 'perdidas' FROM notasdefinitivas
WHERE id_estudiante_nd = 6 AND id_periodo_nd = 1 AND nota_definitiva < 30;

# Total de fallas de un estudiante
SELECT COUNT(f.id) FROM falla f
INNER JOIN estudiante e ON e.id = f.id_estudiante_f
WHERE e.id = 6 AND f.id_periodo_f = 1;

# Obtener los datos del estudiante y del direcor de grado
SELECT e.nombre_e, e.apellidos_e, do.nombre_d, do.apellidos_d, g.nombre_g FROM director d
INNER JOIN docente do ON do.id = d.id_docente_dir
INNER JOIN grado g ON g.id = d.id_grado_dir
INNER JOIN estudiante e ON e.id_gradoE = g.id
WHERE e.id = 6 AND g.id= 2;


# Seleccionar los estudiantes que estan matriculados en x mateia en un grado determinado
SELECT e.nombre_e, e.apellidos_e, e.id AS 'estudiante_id', e.img, m.id AS 'materia_id',  FROM estudiante e
INNER JOIN estudiantemateria em ON em.id_estudiante_m = e.id
INNER JOIN materia m ON m.id = em.id_materia_e
INNER JOIN grado g ON g.id = m.id_grado_mat
WHERE m.id = 10 AND g.id = 2;

# Seleccinar las materias que pertenecen a un grado pero que el estudiante no esta matriculado en ellas
SELECT * FROM materia
WHERE id NOT IN (
	SELECT id_materia_e FROM estudiantemateria
	WHERE id_estudiante_m = 1
) AND id_grado_mat = 1;

# seleccionar todas las materas de un grado
SELECT id, nombre_mat FROM materia WHERE id_grado_mat = 1;

# Selecctionar las materias de un estudiante
SELECT m.id, m.nombre_mat FROM materia m
INNER JOIN estudiantemateria em ON em.id_materia_e = m.id
WHERE m.id_grado_mat = 1 AND em.id_estudiante_m = 1;

# Obtener las notas del area de matematicas
SELECT m.nombre_mat, nd.nota_definitiva, m.porcentaje_materia, b.* FROM materia m
INNER JOIN notasdefinitivas nd ON  nd.id_materia_nd = m.id
INNER JOIN areas a ON a.id_area = m.id_materia_area
WHERE a.nombre_area = 'MATEMATICAS' AND nd.id_estudiante_nd = 1 AND nd.id_periodo_nd = 1;
