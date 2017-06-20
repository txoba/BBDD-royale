<?php
require_once('bbdd.php');
if (isset($_POST["enviar"])) {
    $username = $_POST["username"];
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];   
    
    if($pass1==$pass2){
        newUser($username, $pass1, 0, 0, 1);
    }else{
        echo "Las contrasenyas no coinciden";
        header("refresh:3;url=registro.php");
    }
} else {
    echo ' 
        <form action = "" method = "POST">
        Nombre de usuario: <input type = "text" name = "username" required><br>
        Contrasenya: <input type = "password" name = "pass1" required><br>
        Repetir contrasenya: <input type = "password" name = "pass2" required><br>
        <input type = "submit" name = "enviar" value = "Registrarse"><br>
        </form>';
}
?>