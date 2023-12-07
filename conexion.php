<?php

    function Conectar(){

        if(! ($cnn = mysqli_connect("localhost","root",""))){ //("SERV","USER","PASS")

            exit();

        }

        if(! mysqli_select_db($cnn,"detencion")){

            exit();

        }

        return $cnn;
    }

    function verificar($caja_rut) {
        $cont = 2;
        $suma = 0;
        $largo = strlen($caja_rut);
        for ($i = $largo; $i > 0; $i--) {
            $suma = $suma + (substr($caja_rut, $i - 1, 1) * $cont);
            $cont = $cont + 1;
            if ($cont == 8) {
                $cont = 2;
            }
        }
        $Digito = 11 - ($suma % 11);
        if ($Digito == 10) {
            $Digito = 'k';
        }
        if ($Digito == 11) {
            $Digito = "0";
        }
        return $Digito;
    }
    
?>