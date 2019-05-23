

<?php
//config file
require_once 'config.php';


//iria ter que preencher um por um
//require_once('lib/Template.php'); 

//modo automatico de carregamento
function __autoload($class_name){
    require_once 'libs/' .$class_name. '.php';
}
//echo 'init';

?>