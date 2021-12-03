<?php
    include ("db.inc.php");
    //Creación de la conexión con el servidor la cual se almacenará en la variable $conexion
    $conexion = mysqli_connect($servername,$username,$password,$dbname) 
        or die("ERROR DE CONEXIÓN");
    
    $sql = "SELECT * FROM  myguests";
    $result = $conexion->query($sql);

    echo '<table style="border: 1px solid black">';
    echo '<tr style="border: 1px solid black">';
    echo '  <th style="border: 1px solid black"> Nombre </th>';
    echo '  <th style="border: 1px solid black"> Apellido </th>';
    echo '  <th style="border: 1px solid black"> Correo </th>';
    echo '</tr>';

    /*vector asociativo*/
    while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        echo '<tr>  <td>' . $row["nombre"]  .
        '<td>' . $row["apellido"] . '<td>' . $row["correo"] . '</td> </tr>';
    }
    echo "</table>";


    crearJson();
    echo '<br><br><a href="index.html"><button type="button"> Registro </button></a>';
    function crearJson(){
        include ("db.inc.php");
        $conn = new mysqli($servername,$username,$password,$dbname);
 
        $data = array();
        $sql = "SELECT * FROM myguests";
        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){
            $data[] = $row;
        }
     
        //convert to json
        $data = json_encode($data);
     
        //create json file
        $filename = 'usuarios.json';
        if(file_put_contents($filename, $data)){
            echo '<br> Archivo Json Creado';
        } 
        else{
            echo '<br> Ha ocurrido un error en la creación del archivo Json';
        }
    }
 
?>