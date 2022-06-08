<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório</title>
</head>
<body>
    <center> Relatório De Clientes </center>
<br><br>
<?php
error_reporting(0);
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula17do02", $id);

$sql = "select * from clientes" ;
$result = mysql_query($sql); //executa o sql
while ($obj = mysql_fetch_array($result)) //organiza em vetores
{
    $cod = $obj [0] ;
    $nome =  $obj [1] ;
    $fone = $obj [2] ;
    $cpf =  $obj [3] ;
    $data = $obj [4] ;
   echo "<br> Codigo: $cod";
   echo "<br> Nome: $nome";
   echo "<br> Fone: $fone";
   echo "<br> CPF: $cpf";
   echo "<br> Data: $data";
} 
    ?>
</body>
</html>