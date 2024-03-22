<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Añadir Libro</title>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

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
?>
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
        <input type='submit' name='logout' value='Cerrar sesión' style='  border: 1;   background-color: #fff; border: 2px solid #ccc; border-radius: 5px; padding: 0.5rem; margin-top: 0.5rem; font-size: 1.2rem; color: #333; cursor: pointer;'>
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
         
        
        <nav>
          
           
            
            
         
        </nav>
<section>
  <div class="formulario">
    <h1>Añadir Libro</h1>
    <form  class="add" id="register" action="procesar_libro.php" method="POST" enctype="multipart/form-data">
        <label id="add" for="titulo"><h3>Título:</h3></label>
        <input type="text" name="titulo" id="titulo" required><br>
        
        <label id="add"  for="descripcion_short"><h3>Descripción Corta:</h3></label>
        <textarea name="descripcion_short" id="descripcion_short" required></textarea> <br>
        
        <label id="add" for="descripcion"><h3>Descripción:</h3></label>
        <textarea class="area" name="descripcion" id="descripcion" rows="50" cols="6" required></textarea><br>
        
        <label id="add" for="autor"><h3>Autor:</h3></label>
        <input type="text" name="autor" id="autor" required><br>
        
        <label id="add" for="id_genero"><h3>ID Género: 1, 2, 3 o 4</h3></label>
        <input type="number" name="id_genero" id="id_genero" required><br>
        
        <label id="add" for="portada"><h3>Portada:</h3></label>
        <input type="file" name="portada" id="portada" accept="image/jpeg, image/png" required><br>
        
        <label id="add" for="pdf"><h3>PDF:</h3></label>
        <input type="file" name="pdf" id="pdf" accept="application/pdf" required><br>
        
        <input type="submit" value="Añadir Libro" class="register-button">

    </form>
    </div>
</section>
        </main>

</body>
</html>