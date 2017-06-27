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
        header("refresh:2;url=index.php");
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
        header("refresh:2;url=home_admin.php");
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

function selectUserAll($user) {
    $con = conectar("royal");
    $query = "select * from user where username='$user';";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function selectFromDeck($user) {
    $con = conectar("royal");
    $query = "select * from deck inner join card on deck.card=card.name where user='$user';";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    return $resultado;
}

function selectUserCard($user, $card) {
    $con = conectar("royal");
    $query = "select * from deck where user='$user' and card='$card';";
    $resultado = mysqli_query($con, $query);
    if (mysqli_fetch_array($resultado)) {
        $update = "update deck set level=level+1 where user='$user' and card='$card'";
        $resultado = mysqli_query($con, $update);
        echo "Nivel de carta actualizado.";
        header("refresh:1;url=home_admin.php");
    } else {
        $insert = "insert into deck values('$user', '$card',1)";
        $resultado = mysqli_query($con, $insert);
        echo "Carta dada de alta.";
        header("refresh:1;url=home_admin.php");
    }
    desconectar($con);
}

function selectUserPassword($user, $pass) {
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

function comprobarUser($username) {
    $con = conectar("royal");
    $query = "select username from user where username='$username'";
    $resultado = mysqli_query($con, $query);
    desconectar($con);
    $num_rows = mysqli_num_rows($resultado);
    if ($num_rows == 0) {
        return false;
    }
}

function validarPassword($username) {
    $conexion = conectar("royal");
    $query = "select password from user where username='$username'";
    $resultado = mysqli_query($conexion, $query);
    desconectar($conexion);
    return $resultado;
}

function selectType($username) {
    $conexion = conectar("royal");
    $select = "select type from user where username='$username'";
    $resultado = mysqli_query($conexion, $select);
    $fila = mysqli_fetch_array($resultado);
    extract($fila);
    desconectar($conexion);
    return $type;
}

// DELETE USER

function deleteUser($name) {
    $con = conectar("royal");
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

function updatePassword($password, $usuario) {
    $con = conectar("royal");
    $update = "update user set password='$password' where username='$usuario'";
    if (mysqli_query($con, $update)) {
        echo "Password actualizada.";
        header("refresh:3;url=home_user.php");
    } else {
        echo mysqli_error($con);
        header("refresh:3;url=home_user.php");
    }
    desconectar($con);
}
