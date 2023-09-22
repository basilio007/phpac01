<?php

//session_start();



$id = $_GET['ID'];
$color = $_GET['COLOR'];
$dimension = $_GET['DIMENSION'];
$tipo = $_GET['TIPO'];

//$_SESSION["nick_logueado"]=$id;

echo "El id del mueble es ".$id." su color es ".$color." tiene una dimension de ".$dimension." es de tipo ".$tipo;

$servidor="localhost";
$usuario="basilio";
$password=")(3F9I4K_zul.wNr";
$bd="muebles";

$con=mysqli_connect($servidor,$usuario,$password,$bd);

if(!$con){
    die("No se ha podido realizar la conexión_".mysqli_connect_error()."<br>");
}else{
    mysqli_set_charset($con,"utf8");
    echo "Se ha establecido correctamente la conexión a la base de datos";

    $sql="INSERT INTO `datos`(`ID` , `COLOR`, `DIMENSION`, `TIPO`) 
    VALUES ('$id','$color','$dimension','$tipo')";
    
    $consulta=mysqli_query($con,$sql);

    if(!$consulta){
        die("No se ha podido realizar el insert");
    }else{
        echo "El insert se ha realizado correctamente";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <table>
    <?php
    echo "error1";
        $sql2="SELECT * FROM `datos`";
        $consulta=mysqli_query($con,$sql2);
        while($fila=$consulta->fetch_assoc()){
            
            echo "<tr>";
            echo "<td>".$fila["id"]."</td>";
            echo "<td>".$fila["color"]."</td>";
            echo "<td>".$fila["dimension"]."</td>";
            echo "<td>".$fila["tipo"]."</td>";
            echo "</tr>";
        }
    ?>
    </table>

    <form action="/logout.php" method="post">

    <input type="submit" value="Enviar">
</form>
</body>
</html>

<?php
}
?>