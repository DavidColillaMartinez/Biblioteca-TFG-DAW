<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $titulo = $_POST["titulo"];
    $descripcion_short = $_POST["descripcion_short"];
    $descripcion = $_POST["descripcion"];
    $autor = $_POST["autor"];
    $id_genero = $_POST["id_genero"];

 
    $portada_nombre = $_FILES["portada"]["name"];
    $portada_extension = pathinfo($portada_nombre, PATHINFO_EXTENSION);

   
    $directorio_img = "src/";

    $portada_nuevo_nombre = $directorio_img . $titulo . '.' . $portada_extension;

    if (move_uploaded_file($_FILES["portada"]["tmp_name"], $portada_nuevo_nombre)) {
  
        $conn = new mysqli('127.0.0.1', 'root', '', 'biblioteca');

        if ($conn->connect_error) {
            die("Error en la conexión a la base de datos: " . $conn->connect_error);
        }

        $sql = "INSERT INTO libros (titulo, descripcion_short, descripcion, autor, id_genero, portada)
                VALUES ('$titulo', '$descripcion_short', '$descripcion', '$autor', $id_genero, '$portada_nuevo_nombre')";

        if ($conn->query($sql) === TRUE) {
          
            echo "El libro se añadió correctamente.";
        } else {
            echo "Error al añadir el libro: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Error al subir la portada.";
    }
}

header("Location: añadir_libro.php");
exit();
?>