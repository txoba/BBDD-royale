<?php
session_start();
require_once 'bbdd.php';
if (isset($_SESSION["user"])) {
    $tipo = $_SESSION["type"];
    if ($tipo == 1) {
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title></title>
            </head>
            <body>
                HOME ADMIN: <?php echo $_SESSION["user"] ?><br>
                <a href="newCard.php">Nuevas cartas</a><br>
                <a href="rankingUser.php">Ranking mejores usuarios</a><br>
                <a href="deleteUser.php">Borrar usuario</a><br>
                <a href="giveCard.php">Dar carta a usuario</a><br><br>
                <form action='logout.php' method='post'>
                    <input type='submit' value='Cerrar Sesion'>
                </form>
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
