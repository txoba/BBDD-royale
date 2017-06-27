<?php

session_start();
require_once 'bbdd.php';
if (isset($_SESSION["user"])) {
    $tipo = $_SESSION["type"];
    if ($tipo == 0) {
        $user = $_SESSION["user"];
        $select = selectUserAll($user);
        $fila = mysqli_fetch_array($select);
        extract($fila);
        echo "INFORMACION USUARIO:<br>";
        echo "Usuario: $user<br>";
        echo "Nivel: $level<br>";
        echo "Victorias: $wins<br><br>";
        echo "CARTAS DEL USUARIO:<br>";
        echo'<table style="width:30%" border="1">';
        echo "<tr><th>Carta</th><th>Nivel</th><th>Tipo</th><th>Rareza</th><th>Vida</th><th>Damage</th><th>Coste</th>";
        $select2 = selectFromDeck($user);
        while ($fila2 = mysqli_fetch_array($select2)) {
            extract($fila2);
            $userhp = $hitpoints+($level*2);
            $userdamage = $damage+($level*2);
            echo "<tr><td>$card</td><td>$level</td><td>$type</td><td>$rarity</td><td>$userhp</td><td>$userdamage</td><td>$cost</td>";
        }
        echo'</table>';
        echo "<form action='home_user.php' method='post'>";
        echo "<input type='submit' value='Volver'>";
        echo "</form>";
    } else {
        echo "<p>No tienes permisos para ver esta página.</p>";
    }
} else {
    echo "<p>No hay usuario validado</p>";
}
?>