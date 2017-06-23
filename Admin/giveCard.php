<?php
require_once('bbdd.php');
if (isset($_POST["enviar"])) {
    $usuario = $_POST["user"];
    $carta = $_POST["card"];
    
    //si x user te x carta
    //updateDeck($usuario, $carta);
    //si x user no te x carta
    newDeckCard($usuario, $carta);
} 

else {
    echo ' <form action = "" method = "POST">';
    $usuario = selectUser();
    echo " 
        Usuario: <select name='user'>";
        while ($fila = mysqli_fetch_array($usuario)) {
        extract($fila);
        echo "<option value='$username'>$username</option>";
        }
    echo' 
        </select>';
    $carta = selectCard();
    echo " 
        Carta: <select name='card'>";
        while ($fila = mysqli_fetch_array($carta)) {
        extract($fila);
        echo "<option value='$name'>$name</option>";
        }
    echo' 
        </select>
        <input type = "submit" name = "enviar" value = "Dar carta al usuario"><br>
        </form>';
}
?>
