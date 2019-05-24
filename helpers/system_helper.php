<?php
    //redirecionar para pagina
        function redirect($page = FALSE, $message = NULL, $message_type = NULL){
            //Começar sessao
            //session_start();
            if (is_string ($page)){
                $page = $page;
            } else {
                $page = $_SERVER ['SCRIPT_NAME'];
            }
           
            //Checar por mensagens
            if($message != NULL){
                //Set Message
                $_SESSION['message'] = $message;
             }

             //Checar por tipo
             if($message_type != NULL){
                 //Set tipo mensagem
                 $_SESSION['message_type'] = $message_type;
             }
             //echo $page;
             //Redirect
             header ('Location: ' . $page);
             exit;
            
        }

        //Mostrar mensagem
    function displayMessage(){
       
        if(!empty($_SESSION['message'])){
            //atribua valor de mensagem para a variavel
            $message = $_SESSION['message'];

            if(!empy($_SESSION['message_type'])){
                //atribua tipo
                $message_type = $_SESSION['message_type'];
                //Criar output
                if ($message_type == 'error'){
                    echo '<div class="alert alert-danger">' . $message . '</div>';
                } else {
                    echo '<div class="alert alert-success">' . $message . '</div>';

                }
            }

            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        } else {
            echo '';
        }
    }

?>

