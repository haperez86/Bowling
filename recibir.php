<?php
require 'models/connect.php';
require 'views/header.php';

if (isset($_POST["submit"])) {
    if (isset($_POST["result"])) {

       $acum =0; //acumulador de puntaje

       if (strlen($_POST ['result']) == 12) {           
           $i = 1;
       }else {
           $i = 0;
       }
       //validacion del string recibido
       for ($i; $i < strlen($_POST ['result']); $i++)
       {
           $char = substr($_POST ['result'],$i,1);

           //sumariza puntajes numericos
           if (is_numeric(substr($_POST ['result'], $i, 1)) || $char == '/') {

               $num = (int)substr($_POST ['result'], $i, -1);
                $acum += $num;

                //si encuentra / acumula 10
                if (substr($_POST ['result'], $i + 1, 1) == '/')
               {
                   $acum += 10;
               }

            }
            //validacion de los strikes
            if ($char == 'X'){
                $acum += 10;
                //valida los siguientes dos puntajes
                //segunda vez que encuentre X
                if (substr($_POST ['result'], $i + 1 , 1) == 'X')
                {
                    $acum += 10;
                    //tercera vez que lo encuentre
                    if (substr($_POST ['result'], $i + 2, 1) == 'X')
                    {
                        $acum += 10;
                    }
                }else { //si el siguiente no es X, sumariza los siguientes 2 tiros
                                    
                    $num = (int)substr($_POST ['result'], $i + 1, 1);
                    $acum += $num;
                    $num = (int)substr($_POST ['result'], $i + 2, 1);
                    $acum += $num;
                }
            }

       }
           echo "Jugador: ".$_POST ['jugador'];
           echo "<br/>";
           echo "<br/>";
           echo "Puntaje Recibido: ".$_POST ['result'];
           echo "<br/>";
           echo "<br/>";
           echo "Puntaje Calculado: ".$acum;

   }

           // Insertar usuario en, la BD
           $jugador = $_POST ['jugador'];

           $sql = "INSERT INTO juego VALUES(NULL,'{$acum}','{$jugador}');";
           $insert = mysqli_query($db, $sql);
}

?>