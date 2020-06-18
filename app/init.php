<?php

require_once 'helpers/link.php';

require_once 'config/config.php';

//cargando las librerias
spl_autoload_register(function($file) {
    require_once 'libs/' . $file . '.php';
});