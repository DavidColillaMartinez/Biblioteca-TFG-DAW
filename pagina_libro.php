<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("conexion.php");

session_start();

if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {  

   
    $username = $_SESSION['usuario'];
    echo "Bienvenido, $username.";
  
} else {
   
    
    echo "Bienvenido, visitante.";

}
if (isset($_SESSION['loggedin'])){

  $usuario= "select id from usuario where usuario='. $username.' ";}else{$usuario=" ";}
  $id_usuario = $usuario;
//include("conexion.php");
$conn = new mysqli('127.0.0.1', 'root','' , 'biblioteca');

$id = $_GET['id'];



$verifica_libro = "SELECT libros.id FROM libros WHERE libros.titulo = '$id'";
$libroResult = $conn->query($verifica_libro);
$id_libro = $libroResult->fetch_all(MYSQLI_ASSOC);
$libroId=$id_libro[0];



// $verifica_user = "SELECT usuario.id FROM usuario WHERE usuario.usuario = '$usuario'";
// $userResult = $conn->query($verifica_user);
// $id_user = $userResult->fetch_all(MYSQLI_ASSOC);
// print_r($id_user);
$prueba = "SELECT * FROM usuario ";
$resulprueba=$conn->query($prueba);

// foreach ($resulprueba as $resul){
//   if ($resul['usuario']==$_SESSION['usuario']){
//   print_r($resul['id']);}
//   }










$recogerDatos = "SELECT * FROM libros, genero WHERE libros.id_genero = genero.id AND libros.titulo='$id'";
$resultado = $conn->query($recogerDatos);




$libro = array(); 

while ($mostrar = $resultado->fetch_assoc()) {
  
   $libro[]= " <section id='detalles-libro' class='libro-detalles'>
 
<div class='contenido-derecha'>
   <div class='contenedor-imagen'>
   <img src='src/". $mostrar['titulo'].".jpg' >
   </div>
</div>

<div class='contenido-izquierda'>
    <h2>". $mostrar['titulo']   ."</h2>
    <div class='datos'>
    <p>Autor: ". $mostrar['autor'] . "</p>
    <p>Género: ". $mostrar['genero'] . "</p>
    </div>

    <div class='descripcionn'>
    <p>Descripción: ". $mostrar['descripcion'] . "</p>
    </div>

    <div class='descarga'>
    <a href='src/". $mostrar['genero'] ."/". $mostrar['titulo'] .".pdf' download='". $mostrar['titulo'] ."' class='boton-descarga'>Descargar PDF</a>
     </div>
</div>

  </section>";
  
}



$reseñaExiste = false; 

$verifica_user = "SELECT reseñas.*
  FROM reseñas
  JOIN libros ON reseñas.id_libro = libros.id
  WHERE libros.titulo = '$id'";
$resenasResult = $conn->query($verifica_user);
$resenas = $resenasResult->fetch_all(MYSQLI_ASSOC);


if(isset($_SESSION['loggedin'])){
foreach ($resenas as $resena) {
  foreach ($resulprueba as $resul){
    if ($resul['usuario']==$username){
   
    if ($resena['id_usuario'] == $resul['id']) {
        $reseñaExiste = true;
        break;
    }}
}}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<header>
        
       
<a href="index.php" class="logo"><h1>Biblioteca </h1></a>
        
  
        <div class="menu" >
        <button id="menu-desplegable">Menú</button>
        <ul id="opciones-menu">
          <li><a><?php if (isset($_SESSION['loggedin'])){echo $username;}else{echo $username='Visitante';} ?></a></li>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="about_us.php">About Us</a></li>
          <?php if ($username=='admin'){ 
      echo "<li><a href='añadir_libro.php'>Añadir libros</a></li>";
    } ?>
      
          <li><?php if(isset($_SESSION['loggedin'])){echo" <form method='post' action=''>
        <input type='submit' name='logout' value='Cerrar sesión' style='  border: 1;   background-color: #fff; border: 2px solid #ccc; border-radius: 5px; padding: 0.5rem; margin-top: 0.5rem; font-size: 1.2rem; color: #333; cursor: pointer;' >
    </form>";}else{ echo "<li><a href='login.php'>Iniciar sesion</a>";}?> </li>
      </ul>
      </div>
        <script>
  
        var botonMenu = document.getElementById("menu-desplegable");
          var opcionesMenu = document.getElementById("opciones-menu");
          
          botonMenu.addEventListener("click", function() {
            if (opcionesMenu.style.display === "none") {
              opcionesMenu.style.display = "block";
            } else {
              opcionesMenu.style.display = "none";
            }
          });
  
          </script>
  
      </header>
     
      <main>
        
     
      <form id="buscador">
  <input autocomplete="off" type="text" id="barra" name="barra" placeholder="Buscar libros..."> 
  <br>
  
</form>
<div id="resultados" class="resultados-container"></div>

<script>
  var formulario = document.getElementById("buscador");
  var barra = document.getElementById("barra");
  var resultadosDiv = document.getElementById("resultados");

  barra.addEventListener("keyup", function (event) {
    event.preventDefault(); // Evitar que se envíe el formulario

    var term = barra.value.trim().toLowerCase();

    if (term === "") {
      resultadosDiv.innerHTML = "";
    } else {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "buscador.php?barra=" + term, true);
      xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          var resultados = JSON.parse(xhr.responseText);
          var resultadosHTML = "";

          if (resultados.length > 0) {
            for (var i = 0; i < resultados.length; i++) {
              var resultado = resultados[i];
              var titulo = resultado.titulo.toLowerCase();
              var genero = resultado.genero.toLowerCase();
              var autor = resultado.autor.toLowerCase();

              if (
                titulo.indexOf(term) === 0 ||
                genero.indexOf(term) === 0 ||
                autor.indexOf(term) === 0
              ) {
                resultadosHTML += "<p><a href='pagina_libro.php?id=" +resultado.titulo + "'>" + resultado.titulo + "</a></p>";
              
                resultadosHTML += "<hr>";
              }
            }
          } else {
            resultadosHTML = "No se encontraron resultados.";
          }

          resultadosDiv.innerHTML = resultadosHTML;
        }
      };
      xhr.send();
    }
  });
</script>
         
      
      

       
     <?php
  
     
     foreach ($libro as $libro) {
        echo $libro;
     }
     
     ?>
 
<section id="valoracion">
  <h2>Valoración</h2>
  
  <?php
 if(isset($_SESSION['loggedin'])) {
  if (!$reseñaExiste) { ?>
  <form id="register" action="procesar_resena.php" method="POST">
  <input type="hidden" name="titulo" value="<?php echo $id; ?>">
    <input type="hidden" name="id_libro" value="<?php echo $libroId['id']; ?>">
    <input type="hidden" name="id_user" value="<?php foreach ($resulprueba as $resul){
  if ($resul['usuario']==$username){
  echo $resul['id'];}
  } ?>">
    <label id="rese" for="valoracion"><h3>Valoración:</h3></label>
    <p class="clasificacion">
    <input id="radio1" type="radio" name="estrellas" value="5"><!--
    --><label for="radio1">★</label><!--
    --><input id="radio2" type="radio" name="estrellas" value="4"><!--
    --><label for="radio2">★</label><!--
    --><input id="radio3" type="radio" name="estrellas" value="3"><!--
    --><label for="radio3">★</label><!--
    --><input id="radio4" type="radio" name="estrellas" value="2"><!--
    --><label for="radio4">★</label><!--
    --><input id="radio5" type="radio" name="estrellas" value="1"><!--
    --><label for="radio5">★</label>
  </p>



    <label id="rese" for="resena"><h3>Reseña:</h3></label>
    <textarea name="resena" rows="4" cols="50" required></textarea><br>
    <button type="submit">Enviar Reseña</button>
  </form>
  <?php } else {
    echo "<p>Ya has dejado una reseña para este libro.</p>";
  }
 }else {echo "<p>Inicia sesion para poder dejar una reseña.</p>";}
  ?>
</section>


<section id="resenas">
  <h2>Reseñas</h2>
  <div>
  <?php


  $recogerResenas = "SELECT reseñas.*
  FROM reseñas
  JOIN libros ON reseñas.id_libro = libros.id
  WHERE libros.titulo = '$id'";
  $resenasResult = $conn->query($recogerResenas);
  $resenas = $resenasResult->fetch_all(MYSQLI_ASSOC);
  
  foreach ($resenas as $resena) {

  
    $idUsuario = $resena['id_usuario'];
    $consultaUsuario = "SELECT nombre FROM usuario WHERE id = '$idUsuario'";
    $resultadoUsuario = $conn->query($consultaUsuario);
    $nombreUsuario = $resultadoUsuario->fetch_assoc()['nombre'];

    echo "<div class='resena'>";
    echo "<h3>".$nombreUsuario."</h3>"; 
    echo "<p>Valoración: ";

   
    $valoracion = $resena['valoracion'];
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $valoracion) {
            echo "<label id='rellena'>★</label>";
        } else {
            echo "<label id='norellena'>★</label>";
        }
    }

    echo "</p>";


    echo "<p>".$resena['comentario']."</p>";
    echo "</div>";
  }
  ?>
  </div>
</section>

    </main>
  
    <footer>
        <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h3>Términos y Condiciones</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor nulla vitae bibendum pellentesque.</p>
              </div>
              <div class="col-md-3">
                <h3>Contacto</h3>
                <p>Email: info@tubiblioteca.com</p>
                <p>Teléfono: 123-456-7890</p>
              </div>
              <div class="col-md-3">
                <h3>Síguenos en redes sociales</h3>
                <ul>
                  <li><a href="#"><i class="fab fa-facebook"></i>Facebook</a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i>Twitter</a></li>
                  <li><a href="#"><i class="fab fa-instagram"></i>Istagram</a></li>
                </ul>
              </div>
            </div>
          </div>
          <p>Derechos de autor &copy; 2023 La Biblioteca Virtual. Todos los derechos reservados.</p>
          <script>

</script>
    
   
    </footer>
</body>
</html>