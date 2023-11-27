<?php
    require_once '../model/Usuario.php';

    class validarCpf{
        public function validarCPF(Usuario $cliente){
            $cpf = $cliente->getCpf();

            // Extrai somente os números
            $cpf = str_replace(".","",$cpf);
            $cpf = str_replace("-","",$cpf);
            
            $vetorCpf = array();
        
            for($i = 0; $i < ( strlen($cpf) ); $i++){ 
                $vetorCpf[$i] = substr($cpf,$i,1); 
            }
        
            //Primeiro dígito
            $contador = 10;
            $soma1 = 0;
            for($i = 0; $i < 9; $i++){
                $soma1 = $soma1 + ($vetorCpf[$i] * $contador);
                $contador--;
            }
            $digito1 = ($soma1 % 11);
            if ($digito1 < 2){
                $digito1 = 0;
            }
            else{
                $digito1 = 11 - $digito1;
            }
        
            //Segundo dígito
            $contador = 11;
            $soma2 = 0;
            for($i = 0; $i < 10; $i++){
                $soma2 = $soma2 + ($vetorCpf[$i] * $contador);
                $contador--;
            }
            $digito2 = ($soma2 % 11);
            if ($digito2 < 2){
                $digito2 = 0;
            }
            else{
                $digito2 = 11 - $digito2;
            }
        
            //Verifica se o CPF é válido
            if(($digito1 == $cpf[9]) && ($digito2 == $cpf[10])) {
                return true;
            } else {
                return false;
            }

        }

    }
?>