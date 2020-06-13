<?php

//cargando las librerias
spl_autoload_register(function($file) {
    require_once 'libs/' . $file . '.php';
});