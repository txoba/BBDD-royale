<?php
require_once 'bbdd.php';
echo "<form action='' method='post'>";
echo'<table style="width:50%" border="1">';
echo "<tr><th>Nombre de usuario</th><th>Password</th><th>Tipo</th><th>Victorias</th><th>Nivel</th>";
$user = selectUserLevelWin();
while ($fila = mysqli_fetch_array($user)) {
    extract($fila);
    echo "<tr><td>$username</td><td>$password</td><td>$type</td><td>$wins</td><td>$level</td>";
}
echo'</table>';
echo "</form>";
echo "<form action='home_admin.php' method='post'>";
echo "<input type='submit' value='Volver a la home'>";
echo "</form>";