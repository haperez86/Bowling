<?php
require 'views/header.php';
require 'models/connect.php';

?>

<form action="recibir.php" method="POST" enctype="multipart/form-data">

<label for="result"> Nombre Judagor :
        <input type="text" name="jugador" class="form-control" placeholder="Nombre" >


    <label for="result"> Número de Pines :
        <input type="text" name="result" class="form-control" placeholder="Insertar Pines" >

    </label> 
    <br/>
    <input type="submit" value="Enviar" name="submit" class="btn btn-success">   
    
</form>    

<?php

echo "<hr/>";
     
        // Mostrar bd

        $sql="SELECT * FROM juego";
        $totla_pines = mysqli_query($db, $sql);
?>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Name</th>
                <th scope="col">Total</th>
                </tr>
            <?php while ($total = mysqli_fetch_assoc($totla_pines)) {?>
                <tr>
                    <th scope="row"><?= $total["nombre"]?></th>
                    <th scope="row"><?= $total["total_puntaje"]?></th>
                </tr>
            <?php } ?>

            </thead>
        </table>
    </div>

<?php
require 'views/footer.php';
?>

