<?php

# Url base de la plataforma
define("base_url", "http://localhost/CDR/");
# Controlador ejecutado por defecto

define("controller_df", "LoginController");
# Metodo ejecutado por defecto
define("metodo_df", "login");

# Claves para encriptar y desencriiptar los parametros enviados por url
define('METHOD', 'AES-256-CBC');
define('SECRET_KEY', '$MICHAEL@2345');
define('SECRET_IV', '101712');

# Credenciales  para enviar correos electronicos
define('CORREO', '');
define('PASSWORD_MAIL', '');

# Nombre de la institución
define('name_col', 'CONCENTRACIÓN DE DESARROLLO RURAL <small>(CDR)</small>');

# Zona horaria
date_default_timezone_set('America/Bogota');
