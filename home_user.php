<?php
session_start();
require_once 'bbdd.php';
if (isset($_SESSION["user"])) {
    $tipo = $_SESSION["type"];
    if ($tipo == 0) {
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title></title>
            </head>
            <body>
                HOME USER: <?php echo $_SESSION["user"] ?><br>
                <a href="verPerfil.php">Ver perfil</a><br>
                <a href="modificarPassword.php">Modificar password</a><br>
                <a href="batalla.php">Batalla</a><br><br>
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