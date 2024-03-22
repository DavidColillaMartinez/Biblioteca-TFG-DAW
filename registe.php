<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrarse</title>
  <link rel="stylesheet" href="style.css">

<?php
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

<header>
        
  
<a href="index.php" class="logo"><h1>Biblioteca </h1></a>
   
    <div class="menu" >
      <button id="menu-desplegable">Menú</button>
      <ul id="opciones-menu">
        <li><a><?php if (isset($_SESSION['loggedin'])){echo $username;}else{echo 'Visitante';} ?></a></li>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="about_us.php">About Us</a></li>
        <li><?php if(isset($_SESSION['loggedin'])){echo" <form method='post' action=''>
      <input type='submit' name='logout' value='Cerrar sesión'>
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
  <nav></nav>
<body>

  <section>
    <div class="formulario">
      <h2>Iniciar Sesión</h2>
      <form id="register"  method="get" action="register.php" onsubmit="return comprobar(this)">

        <label id="regis" for="nombre"><h3>Nombre:</h3></label>
        <input type="text" id="nombre" name="nombre" placeholder="Nombre..." required>

        <label id="regis" for="apellido"><h3>Apellido:</h3></label>
        <input type="text" id="apellido" name="apellido" placeholder="Apellido..." required>

        <label  id="regis" for="correo"><h3>Correo electrónico:</h3></label>
        <input type="email" id="correo" name="correo" placeholder="Correo@gm..." required>

        <label id="regis" for="usuario"><h3>Usuario:</h3></label>
        <input type="text" id="usuario" name="usuario"  placeholder="Usuario..." required>
        
        <label id="regis" for="password"><h3>Contraseña:</h3></label>
        <input type="password" id="password" name="password"  placeholder="Contraseña..." required>

        <button type="submit"><h3>Registrarse</h3></button>
      </form>
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
</footer>
</body>
</html>