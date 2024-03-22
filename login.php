<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {  
    header('Location: index.php');
    exit;
}
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


$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['password'];
    $hostnameBDD = 'localhost';
    $usernameBDD = 'admin';
    $passwordBDD = '123';
    $databaseBDD = 'biblioteca';

   
    $conexion = new mysqli('127.0.0.1', 'root','' , 'biblioteca');

    if ($conexion->connect_error) {
        die('Error al conectar con la base de datos: ' . $conexion->connect_error);
    }

    $usuario = $conexion->real_escape_string($usuario);
    $contrasena = $conexion->real_escape_string($contrasena);

 
    $consulta = "SELECT * FROM usuario WHERE usuario = '$usuario'";
    $resultado = $conexion->query($consulta);

    if ($resultado && $resultado->num_rows === 1) {
        $fila = $resultado->fetch_assoc();

     
        if ($contrasena === $fila['contraseña']) {
         
            $_SESSION['loggedin'] = true;
            $_SESSION['usuario'] = $usuario;
            header('Location: index.php');
            exit;
        } else {
            $error = 'Usuario o contraseña incorrectos';
        }
    } else {
        $error = 'Usuario o contraseña incorrectos';
    }

    $conexion->close();
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="style.css">
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
      <form id="login" action="login.php" method="post">
        <label for="usuario"><h3>Usuario:</h3></label>
        <input type="text" id="usuario" name="usuario" placeholder="Usuario..." required>
        
        <label for="password"><h3>Contraseña:</h3></label>
        <input type="password" id="password" name="password" placeholder="Contraseña..." required>
        <button type="submit"><h3>Iniciar Sesión</h3></button>
        <a href="registe.php" type="button"><h3>Registrarse</h3></a>
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
            <li><a href="#"><i class="fab fa-instagram"></i>Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
    <p>Derechos de autor &copy; 2023 La Biblioteca Virtual. Todos los derechos reservados.</p>
  </footer>
</body>
</html>
