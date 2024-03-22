<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>About Us</title>
 
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
<body class="index">
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
          
       
      
     <nav></nav>

  <section>
    <div >
      <h3>Sobre Nosotros</h3>
      <p>Somos una plataforma creada por dos estudiantes de DAW con el objetivo de ofrecer una biblioteca accesible y 100% gratuita. Nuestro sueño es fomentar el amor por la lectura y asegurar que el conocimiento esté al alcance de todos, sin importar su situación económica o ubicación geográfica.</p>
      <p>Desde nuestros inicios, nos hemos esforzado por brindar una experiencia de calidad a nuestros usuarios. Hemos recibido reconocimientos internacionales por nuestro impacto en la sociedad y hemos establecido alianzas estratégicas con instituciones educativas y organizaciones sin fines de lucro para ampliar nuestro alcance.</p>
      <p>En nuestra plataforma, encontrarás una amplia selección de libros de diferentes géneros y disciplinas. Nuestra interfaz intuitiva y amigable te permitirá buscar, filtrar y descubrir nuevos títulos de manera sencilla. Además, podrás unirte a nuestra comunidad en línea, donde podrás conectar con otros lectores, compartir recomendaciones y participar en discusiones literarias.</p>
      <p>Estamos orgullosos de formar parte de esta increíble historia y de poder ofrecer a las personas la biblioteca virtual que siempre soñamos. Seguiremos innovando y expandiendo nuestros horizontes para asegurar un acceso cada vez más amplio a la literatura y el conocimiento.</p>
    </div>
  </section>

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
