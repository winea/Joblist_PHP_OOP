<?php
//classe pode ser reutilizavel
//conectar o banco de dados
    class Database{
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        //database handler
        private $dbh;
        private $error;
        //statement
        private $stmt;

        public function __construct()
        {
            //Set DNS
            $dns = 'mysql:host=' . $this->host. ';dbname=' . $this->dbname;

            //usar PDO que é um php data para objetos para conectar o banco de dados
            //Set Options
            $options = array(
                //para conexao persistente
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            //PDO instance $pdo = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
            try{
                $this->dbh = new PDO($dns, $this->user, $this->pass, $options);
            } catch (PDOException $e){
                $this->error = $e->getMessage();
            }
        }

        public function query($query){
            $this->stmt = $this->dbh->prepare($query);
        }

        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                    case is_int ($value) :
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool ($value) :
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_int ($value) :
                        $type = PDO::PARAM_NULL;
                        break;
                    default :
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        public function execute(){
            return $this->stmt->execute();
        }

        //receber todos os trabalhos
        public function resultSet(){
            $this->execute();
            //retornar objeto
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }

        //retonar unico valor
        public function single(){
            $this->execute();
            //retornar objeto
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

    }
?>
