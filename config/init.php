<?php
//Começar sessao
//phpinfo();
//session_start(); //quando ativo esta gerando erro de mode que nao posso usar as funçoes do system_helper.php

//config file
require_once 'config.php';

//Incluir helpers
require_once 'helpers/system_helper.php';

//iria ter que preencher um por um
//require_once('lib/Template.php'); 

//modo automatico de carregamento
function __autoload($class_name){
    require_once 'libs/' .$class_name. '.php';
}
//echo 'init';
?>