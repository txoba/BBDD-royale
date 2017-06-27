<?php

require_once 'bbdd.php';
if (isset($_POST["registrar"])) {
    $username = $_POST["username"];
    if (comprobarUser($username)) {
        echo "<p>Usuario ya extstente.</p>";
    } else {
        $pass1 = $_POST["pass1"];
        if ($_POST["pass1"] == $_POST["pass2"]) {
            newUser($username, $pass1, 0, 0, 1);
        } else {
            echo "<p>Las contraseñas no coinciden. </p>";
            
        }
    }
} else if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $pass = $_POST["password"];
    $verify = validarPassword($username);
    $fila = mysqli_fetch_array($verify);
    extract($fila);
    if ($password == $pass) {
        session_start();
        $_SESSION["user"] = $username;
        $tipo = selectType($username);
        $_SESSION["type"] = $tipo;
        if ($tipo == 0) {
            header("refresh:1;url=home_user.php");
        } else if ($tipo == 1) {
            header("refresh:1;url=home_admin.php");
        }
    } else {
        echo "<p>Usuario o password incorrectos.</p>";
        header("refresh:1;url=index.php");
    }
} else {
        echo 'REGISTRO:<br>
        <form action = "" method = "POST">
        Nombre de usuario: <input type = "text" name = "username" required><br>
        Contrasenya: <input type = "password" name = "pass1" required><br>
        Repetir contrasenya: <input type = "password" name = "pass2" required><br>
        <input type = "submit" name = "registrar" value = "Registrarse"><br>
        </form>';
        
        echo 'INICIAR SESION:<br>
        <form action = "" method = "POST">
        Nombre de usuario: <input type = "text" name = "username" required><br>
        Contrasenya: <input type = "password" name = "password" required><br>
        <input type = "submit" name = "login" value = "Iniciar Sesion"><br>
        </form>';
}
?>
