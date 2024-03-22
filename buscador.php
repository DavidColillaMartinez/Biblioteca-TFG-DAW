<?php
$conn = new mysqli('127.0.0.1', 'root', '', 'biblioteca');

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if (isset($_GET["barra"])) {
    $term = $_GET["barra"];
  
    $sql = "SELECT * FROM libros
            INNER JOIN genero ON libros.id_genero = genero.id
            WHERE libros.titulo LIKE '%$term%' OR genero.genero LIKE '%$term%'";

    $result = $conn->query($sql);

  
    $results = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }

  
    echo json_encode($results);
} else {
    echo "No se ha enviado el formulario de búsqueda.";
}

$conn->close();
?>
