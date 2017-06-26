<?php
require_once('bbdd.php');
if (isset($_POST["enviar"])) {
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    $rareza = $_POST["rareza"];
    $vida = $_POST["vida"];
    $danyo = $_POST["danyo"];
    $coste = $_POST["coste"];
    newCard($nombre, $tipo, $rareza, $vida, $danyo, $coste);
} else {
    echo ' 
        <form action = "" method = "POST">
        Nombre: <input type = "text" name = "nombre" required><br>
        Tipo: <select name="tipo">
        <option value=tropa>tropa</option>
        <option value=hechizo>hechizo</option>
        <option value=estructura>estructura</option>
        </select><br>
        Rareza: <select name="rareza">
        <option value=comun>comun</option>
        <option value=especial>especial</option>
        <option value=epica>epica</option>
        <option value=legendaria>legendaria</option>
        </select><br>
        Puntos de vida: <input type = "number" name = "vida" min="1" max="20" required><br>
        Damage: <input type = "number" name = "danyo" min="1" max="20" required><br>
        Coste: <input type = "number" name = "coste" min="1" max="10" required><br>
        <input type = "submit" name = "enviar" value = "Alta carta"><br>
        </form>';
}
?>
