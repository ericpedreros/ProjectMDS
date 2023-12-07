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

?>