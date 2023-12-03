<?php

    class Curriculo {
        private $idCurriculo;
        private $idUsuario;
        private $objetivo;
        private $habilidades;
        private $genero;
        private $estadoCivil;

        public function getGenero(){
            return $this->genero;
        }

        public function setGenero($genero){
            $this->genero = $genero;
        }

        public function getId(){
            return $this->idCurriculo;
        }

        public function getIdUsuario(){
            return $this->idUsuario;
        }

        public function getObjetivo(){
            return $this->objetivo;
        }

        public function getHabilidades(){
            return $this->habilidades;
        }

        public function getEstadoCivil(){
            return $this->estadoCivil;
        }

        public function setId($id){
            $this->idCurriculo = $id;
        }

        public function setIdUsuario($id){
            $this->idUsuario = $id;
        }

        public function setObjetivo($objetivo){
            $this->objetivo = $objetivo;
        }

        public function setHabilidades($habilidades){
            $this->habilidades = $habilidades;
        }

        public function setEstadoCivil($estadoCivil){
            $this->estadoCivil = $estadoCivil;
        }

    }

?>