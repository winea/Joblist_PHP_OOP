<?php 
class Template{
    //Caminho para template
    protected $template;
    protected $vars = array();

    //Construtor 
    //$template recebe o caminho do html
    public function __construct($template){
        $this->template = $template;
    }

    //qual informação quero retorno, verificar se a chave esta no array
    public function __get($key){
        return $this->vars[$key];
    }

    //passar os dados
    public function __set($key, $value){
        $this->vars[$key] = $value;
    }

    //retorna a info como string
    public function __toString(){
        extract($this->vars);
        chdir(dirname($this->template));
        ob_start();
        /*ob_start() irá pegar todos os dados de saída e guardar em buffer.
         Os dados só serão enviados ao navegador no momento em que você encerrar o buffer.*/

        include basename($this->template);

        return ob_get_clean();
        /*Gets the current buffer contents and delete current output buffer.
        ob_get_clean() essentially executes both ob_get_contents() and ob_end_clean().*/
    }

}

?>