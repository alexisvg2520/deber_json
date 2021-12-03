<?php
    include ("db.inc.php");

    //Obtención de datos del formulario
    $nombre = $_POST['name'];
    $apellido = $_POST['lastname'];
    $correo = $_POST['mail'];
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO myguests (nombre, apellido, correo)
        VALUES ('$nombre','$apellido','$correo')";
        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Nuevo registro creado correctamente";
    } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;

    echo '<br><br><a href="obtener.php"><button type="button"> Comprobar </button></a>'
?>
