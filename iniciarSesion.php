<?php

require_once('bbdd.php');
if (isset($_SESSION["username"])) {
    $tipo = $_SESSION["tipo"];
    if ($tipo == 1) {
        header("refresh:1;url=home_admin.php");
    } else {
        header("refresh:1;url=home_user.php");
    }
}
if (isset($_POST["enviar"])) {

    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = selectUserPassword($username, $password);
        $numrows = mysql_num_rows($query);
        if ($numrows != 0) {
            while ($row = mysql_fetch_assoc($query)) {
                $user = $row['username'];
                $pass = $row['password'];
            }
            if ($username == $user && $password == $pass) {
                $_SESSION['username'] = $username;
                $tipo = $_SESSION["tipo"];
                if ($tipo == 1) {
                    header("Location: home_admin.php");
                } else {
                    header("Location: home_user.php");
                }
            }
        } else {
            $message = "Nombre de usuario ó contraseña invalida!";
        }
    } 
}else {
        echo ' 
        <form action = "" method = "POST">
        Nombre de usuario: <input type = "text" name = "username" required><br>
        Password: <input type = "password" name = "password" required><br>
        <input type = "submit" name = "enviar" value = "Iniciar Sesion"><br>
        </form>';
    }
