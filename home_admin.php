<?php
session_start();
require_once 'bbdd_user.php';
if (isset($_SESSION["username"])) {
    // Nos aseguramos que el usuario sea administrador
    // Cogemos el tipo de la variable de sesión
    $tipo = $_SESSION["tipo"];
    if ($tipo == 1) {
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title></title>
            </head>
            <body>
                <a href="newCard.php">Nuevas cartas</a><br>
                <a href="rankingUser.php">Ranking mejores usuarios</a><br>
                <a href="deleteUser.php">Borrar usuario</a><br>
                <a href="giveCard.php">Dar carta a usuario</a><br>
            </body>
        </html>
<?php
    } else {
        echo "<p>No tienes permisos para ver esta página.</p>";
    }
} else {
    echo "<p>No hay usuario validado</p>";
}
?>
