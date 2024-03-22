<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Biblioteca</title>

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




    
    include ('conexion.php');
    $conn = new mysqli('127.0.0.1', 'root','' , 'biblioteca');


    $recogerResenas = "SELECT id_libro, AVG(valoracion) AS media_valoracion
    FROM reseñas
    JOIN libros ON reseñas.id_libro = libros.id
    WHERE libros.titulo = 'fs'
    GROUP BY id_libro";
    
    $valor = mysqli_sql($recogerResenas,false);
    
    
    // $resenasResult = $conn->query($recogerResenas);
    // $resenas = $resenasResult->fetch_all(MYSQLI_ASSOC);


 


    $recogerDatos = 'select * from libros, genero where libros.id_genero = genero.id';
    

    $mostrar = mysqli_sql($recogerDatos,false);
    

    foreach($mostrar as $filas){
      // $ejemplo = $filas['genero'];
      $id = $filas['titulo'];
      
      $recogerResenas = "SELECT AVG(valoracion) AS media_valoracion
    FROM reseñas
    JOIN libros ON reseñas.id_libro = libros.id
    WHERE libros.titulo = '$id'
    GROUP BY id_libro";
    $num = mysqli_sql($recogerResenas,false);
   
    if (!empty($num) && is_numeric($num[0]['media_valoracion'])) {
      $media = $num[0]['media_valoracion'];
      
  } elseif(empty($num)){
      $media = 0;
  }
  $estrellas = str_repeat('★',(int)$media);

  if($media >=4){
    $destacados[]='<div class=" libro">
    <img src="src/'.$filas['portada'].'.jpg" alt="Portada del libro">
    <div class="descripcion">
    <h3><a href="pagina_libro.php?id=' . $filas['titulo'] . '" onclick="">'.$filas['titulo'].'</a> </h3>
    <p>'.$filas['descripcion_short'].'</p>
    <div class="calificacion">
    
        <span class="estrellas">'.$estrellas.'</span>                   
   </div>
  </div>
  
     </div>';
  }
      
  


       if ($filas['genero']== 'Novela'){
        
        $novela[]='<div class=" libro">
                <img src="src/'.$filas['genero'].'/'.$filas['portada'].'.jpg" alt="Portada del libro">
                <div class="descripcion">
                <h3><a href="pagina_libro.php?id=' . $filas['titulo'] . '" onclick="">'.$filas['titulo'].'</a> </h3>
                <p>'.$filas['descripcion_short'].'</p>
                <div class="calificacion">
                
                    <span class="estrellas">'.$estrellas.'</span>                   
               </div>
              </div>
              
                 </div>';
       }

       if ($filas['genero']== 'Poesia'){
        $poesia[]='<div class="libro" data-id="">
                <img src="src/'.$filas['titulo'].'.jpg" alt="Portada del libro">
                <div class="descripcion">
                <h3><a href="pagina_libro.php?id=' . $filas['titulo'] . '" onclick="">'.$filas['titulo'].'</a> </h3>
                <p>'.$filas['descripcion_short'].'</p>
                <div class="calificacion">
                <span class="estrellas">'.$estrellas.'</span>                     
               </div>
              </div>

                 </div>';
       }

       if ($filas['genero']== 'Ensayo'){
        $ensayo[]='<div class="libro">
                <img src="src/'.$filas['titulo'].'.jpg" alt="Portada del libro">
                <div class="descripcion">
                <h3><a href="pagina_libro.php?id=' . $filas['titulo'] . '" onclick="">'.$filas['titulo'].'</a> </h3>
                <p>'.$filas['descripcion_short'].'</p>
                <div class="calificacion">
                <span class="estrellas">'.$estrellas.'</span>    
               </div>
              </div>

                 </div>';
       }

       if ($filas['genero']== 'Infantil'){
        $infantil[]='<div class="libro">
                <img src="src/'.$filas['titulo'].'.jpg" alt="Portada del libro">
                <div class="descripcion">
                <h3><a href="pagina_libro.php?id=' . $filas['titulo'] . '" onclick="">'.$filas['titulo'].'</a> </h3>
                <p>'.$filas['descripcion_short'].'</p>
                <div class="calificacion">
                <span class="estrellas">'.$estrellas.'</span>                
               </div>
              </div>

                 </div>';
       }
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
          
       

      
        <section id="destacados">
            <h2>Libros Destacados</h2>     
                             
            <?php 
           
           foreach ($destacados as $destacados) {
            echo $destacados;}
            
            ?>
                
            
        </section>
          
        <section id="novela">
            <h2>Novela</h2>
            <?php 
           
           foreach ($novela as $novela) {
            echo $novela;}
            
            ?>
            
         
        </section>


        <section id="poesia">
            <h2>Poesía</h2>
            <?php 
           
           foreach ($poesia as $poesia) {
            echo $poesia;}
            
            ?>
            
            
          
        </section>


        <section id="ensayo">
            <h2>Ensayo</h2>
            <?php 
           
           foreach ($ensayo as $ensayo) {
            echo $ensayo;}
           
           ?>
        
        </section>


        <section id="infantil">
            <h2>Infantil</h2>
            
            <?php 
           
           foreach ($infantil as $infantil) {
            echo $infantil;}
           
           ?>

            
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
