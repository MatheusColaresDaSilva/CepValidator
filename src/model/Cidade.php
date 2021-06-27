<?php
    class Cidade {
        const MIN_VALUE = 100000;   
        const MAX_VALUE = 999999;
        private $conn;
        private $table_name = "cidade";

        private $nome;
        private $cep;

        public function __construct0(){

        }

        public function createWithDb($db){
            $this->conn = $db;
        }

        public function getNome(){
            return $this->nome;
          }
 
        public function setNome($nome){
            $this->nome = $nome;
         }

        public function getCep(){
           return $this->cep;
         }

        private function setCep($cep){
           $this->cep = $cep;
        }

        public function isCepBetweenValidNumber($cep) {
            if($cep <= self::MIN_VALUE || $cep >= self::MAX_VALUE) {
                return FALSE;
            }
            return TRUE;
        }

        public function isCepAlternateNumberRepeated($cep) {
            $regex = '{(\\d)(\\d)\\1}';
            if(preg_match_all($regex, $cep) == 0) {
                return FALSE;
            };

            return TRUE;
        }

        public function insertCep($cep) {
            if(self::isCepBetweenValidNumber($cep) && !self::isCepAlternateNumberRepeated($cep)) {
                return self::setCep($cep);
            }

            throw new InvalidArgumentException('Cep Inválido');
        }

        public function findAll(){
            $query = "SELECT
                        *
                    FROM
                        " . $this->table_name . " c ";

            $stmt = $this->conn->prepare($query);
            $stmt->execute();
          
            return $stmt;
        }

        public function create(){
            $query = "INSERT INTO
                        " . $this->table_name . "
                    SET
                    ci_nome=:nome, ci_cep=:cep";

            $stmt = $this->conn->prepare($query);
          
            $this->nome=htmlspecialchars(strip_tags($this->nome));
            $this->cep=htmlspecialchars(strip_tags($this->cep));
          
            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":cep", $this->cep);
          
            if($stmt->execute()){
                return true;
            }
          
            return false;
        }
    }

?>