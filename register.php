<?php
include('conexion.php');

function verificarExistenciaUsuarioCorreo($usuario, $correo)
{
    $conexion = mysqli_connect(hostnameBDD, usernameBDD, passwordBDD, databaseBDD) or die("Error: " . mysqli_error($conexion));

    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $correo = mysqli_real_escape_string($conexion, $correo);

    
    $sql = "SELECT COUNT(*) as total FROM usuario WHERE usuario = '$usuario' OR correo = '$correo'";
    $resultado = mysqli_query($conexion, $sql);

    $fila = mysqli_fetch_assoc($resultado);
    $total = $fila['total'];

    mysqli_close($conexion);

    return $total > 0;
}

function is_password(string $pwd): bool
{
    if (
        mb_strlen($pwd) >= 1 and preg_match('/[A-Z]/', $pwd)
        and preg_match('/[a-z]/', $pwd)
        and preg_match('/[0-9]/', $pwd)
        and !preg_match('/\\s/', $pwd)
    ) {
        return true;
    }
    return false;
}

function is_mail($str)
{
    return (false !== filter_var($str, FILTER_VALIDATE_EMAIL));
}

$enviado = $_GET['nombre'] ?? false;

if ($enviado) {
    $valido = true;
    $msgerror = '';
    $pwd = filter_input(INPUT_GET, 'password');
    $todos = filter_input_array(INPUT_GET);

    if ($valido) {
        /*if (!is_password($todos['password'])) {
            $msgerror = 'password no valida';
            $valido = false;
        }*/

        if (!is_mail($todos['correo'])) {
            $msgerror = 'correo no valido';
            $valido = false;
        }

        /*if (!str_text($todos['usuario'], 0, 15)) {
            $msgerror = 'usuario no valido';
            $valido = false;
        }*/
    }

if (verificarExistenciaUsuarioCorreo($todos['usuario'], $todos['correo'])) {
    $msgerror = 'El usuario o el correo ya están registrados.';
    $valido = false;
}

    if ($valido) {
        $conexion = mysqli_connect(hostnameBDD, usernameBDD, passwordBDD, databaseBDD) or die("Error: " . mysqli_error($conexion));
        $nombre = mysqli_real_escape_string($conexion, $todos['nombre']);
        $apellido = mysqli_real_escape_string($conexion, $todos['apellido']);
        $correo = mysqli_real_escape_string($conexion, $todos['correo']);
        $usuario = mysqli_real_escape_string($conexion, $todos['usuario']);
        $password = mysqli_real_escape_string($conexion, $todos['password']);

        $sql = "INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correo`, `usuario`, `contraseña`) VALUES (NULL,
            '$nombre',
            '$apellido',
            '$correo',
            '$usuario',
            '$password')";
        mysqli_query($conexion, $sql);

        mysqli_close($conexion);

      
        header('Location: login.php');
        exit;
    } else {
        print '<script>alert("' . $msgerror . '");history.go(-1);</script>';
        die();
    }
}
?>
