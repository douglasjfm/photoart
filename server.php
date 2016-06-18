<?php
$conn = new mysqli('localhost', 'root', '','photoarts');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['all']))
    lerBD();
else
{
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
}

function lerBD()
{
    global $conn;
    $r = $conn->query("SELECT * FROM `photos`");
    $fotos = [];
    $i = 0;
    while ($row = $r->fetch_assoc()) {
        $fotos[$i] = $row;
        $i++;
    }

    $i = 0;
    $table = '<link rel="stylesheet" type="text/css" href="app.css"><table class="relat"><th>Link<th>Nome</th><th>Comentario</th>';
    foreach ($fotos as $f) {
        $link = $f["link"];
        $nome = $f["nome"];
        $com = $f["comentario"];
        $conn->query("INSERT INTO `photos` (link,nome,comentario) VALUES ('$link','$nome','$com')");

        $table .= "<tr>"."<td>".$link."</td>"."<td>".$nome."</td>"."<td>".$com."</td>"."</tr>";
    }
    $table .= "</table>";
    echo $table;
}
?>
