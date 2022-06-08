<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Clientes</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <?php
     error_reporting(0);
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula17do02", $id);

    $sql = "select * from clientes order by cli_nome";
    $result = mysql_query($sql);

    while ($obj = mysql_fetch_array($result))
    {
        $cod = $obj[0];
        $nome = $obj[1];
        $telefone = $obj[2];
        $email = $obj[3];
        $nota = $obj[4];
        echo" <form name=\"formulario\" method=\"post\" action=\"excluir.php\">
        Codigo: <input name=\"cod\" type=\"text\" value=\"$cod\"><br>
        Nome: <input name=\"nome\" type=\"text\" value=\"$nome\"><br>
        Telefone: <input name=\"telefone\" type=\"text\" value=\"$telefone\"><br>
        E-mail: <input name=\"email\" type=\"text\" value=\"$email\"><br>
        Nota: <input name=\"nota\" type=\"text\" value=\"$nota\"><br>
        <input name=\"botao\" type=\"submit\" value=\"Excluir\">

        ";

    }
    ?>
</body>
</html>