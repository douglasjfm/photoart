<?php
$conn = new mysqli('localhost', 'root', '','photoarts');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$fotos = $_POST['value'];

$i = 0;
$table = '<table class="relat"><th>Link<th>Nome</th><th>Comentario</th>';
foreach ($fotos as $f) {
    $link = $f["link"];
    $nome = $f["nome"];
    $com = $f["comentario"];
    $conn->query("INSERT INTO `photos` (link,nome,comentario) VALUES ('$link','$nome','$com')");

    $table .= "<tr>"."<td>".$link."</td>"."<td>".$nome."</td>"."<td>".$com."</td>"."</tr>";
}
$table .= "</table>";
echo $table;
?>
