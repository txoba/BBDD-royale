<?php

//CONECTAR

function conectar($database) {
    $conexion = mysqli_connect("localhost", "root", "", $database)
            or die("No se ha podido conectar a la BBDD");
    return $conexion;
}

//DESCONECTAR

function desconectar($conexion) {
    mysqli_close($conexion);
}

//INSERTS

function newUser($username, $password, $type, $wins, $level) {
    $conexion = conectar("royal");
    $insert = "insert into user values('$username', '$password', $type, $wins, $level)";
    if (mysqli_query($conexion, $insert)) {
        echo "Usuario dado de alta.<br>";
        header("refresh:3;url=index.php");
    } else {
        echo mysqli_error($conexion);
        header("refresh:3;url=index.php");
    }
    desconectar($conexion);
}
function newCard($nombre, $tipo, $rareza, $vida, $danyo, $coste) {
    $conexion = conectar("royal");
    $insert = "insert into card values('$nombre', '$tipo', '$rareza', $vida, $danyo, $coste)";
    if (mysqli_query($conexion, $insert)) {
        echo "Carta dada de alta.<br>";
        header("refresh:3;url=home_admin.php");
    } else {
        echo mysqli_error($conexion);
        header("refresh:3;url=home_admin.php");
    }
    desconectar($conexion);
}
function newDeckCard($usuario, $carta) {
    $conexion = conectar("royal");
    $insert = "insert into deck values('$usuario', '$carta',1)";
    if (mysqli_query($conexion, $insert)) {
        echo "Carta $carta dada al usuario $usuario.<br>";
        header("refresh:3;url=home_admin.php");
    } else {
        echo mysqli_error($conexion);
        header("refresh:3;url=home_admin.php");
    }
    desconectar($conexion);
}

//SELECTS

function selectUser() {
    $con = conectar("royal");
    $query = "select * from user;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectUserPassword($user,$pass) {
    $con = conectar("royal");
    $query = "select username,password from user where username='$user' and password='$pass' ;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectCard() {
    $con = conectar("royal");
    $query = "select * from card;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}
function selectUserLevelWin() {
    $con = conectar("royal");
    $query = "select * from user order by level desc, wins desc;";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

// DELETE USER

function deleteUser($name){
    $con= conectar("royal");
    $delete = "delete from user where username='$name'";
    if (mysqli_query($con, $delete)) {
        echo "Usuario eliminado!";
        header("refresh:3;url=home_admin.php");
    } else {
        echo mysqli_error($con);
        header("refresh:3;url=home_admin.php");
    }
    desconectar($con);
}

//UPDATES

function updateDeck($usuario, $carta) {
    $con = conectar("royal");
    $update = "update deck set level=level+1 where user='$usuario' and card='$carta'";
    if (mysqli_query($con, $update)) {
        echo "Nivel de carta actualizado.";
        header("refresh:3;url=home_admin.php");
    } else {
        echo mysqli_error($con);
        header("refresh:3;url=home_admin.php");
    }
    desconectar($con);
}
function updatePassword($password,$usuario) {
    $con = conectar("royal");
    $update = "update user set password='$password' where username='$usuario'";
    if (mysqli_query($con, $update)) {
        echo "Nivel de carta actualizado.";
        header("refresh:3;url=home_admin.php");
    } else {
        echo mysqli_error($con);
    header("refresh:3;url=home_admin.php");    }
    desconectar($con);
}
