<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $titulo = $_POST["titulo"];
    $id_libro = $_POST["id_libro"];
    $id_usuario = $_POST["id_user"];
    $valoracion = $_POST["estrellas"];
    $resena = $_POST["resena"];

    
    $conn = new mysqli('127.0.0.1', 'root','' , 'biblioteca');
 
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

$sql = "INSERT INTO reseñas (id_usuario, id_libro, valoracion, comentario, fecha_creacion)
VALUES ('" . $id_usuario . "', '" . $id_libro . "', " . $valoracion . ", '" . $resena . "', CURDATE())";

    if ($conn->query($sql) === TRUE) {
      
        $conn->close();
        header("Location: pagina_libro.php?id=$titulo");
        exit();
    } else {
        echo "Error al añadir la reseña: " . $conn->error;
    }

    $conn->close();
}
?>  