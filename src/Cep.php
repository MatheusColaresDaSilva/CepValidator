<?php
    class Cep {
        const MIN_VALUE = 100000;   
        const MAX_VALUE = 999999;

        private $codigo;

        public function getCodigo(){
           return $this->codigo;
         }

        private function setCodigo($codigo){
           $this->codigo = $codigo;
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
                return self::setCodigo($cep);
            }

            throw new InvalidArgumentException('Cep Invalido',100);
        }
    }

?>