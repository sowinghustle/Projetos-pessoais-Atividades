<?php
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula3", $id);

$nome=$_POST['usu_nome'];
$email=$_POST['usu_email'];
$senha=$_POST['usu_senha'];



$sql="insert into usuarios (usu_nome, usu_email, usu_senha) 
                    values ('$nome', '$email', '$senha')";
mysql_query($sql);
mysql_close($id);

header("location: cadastro.html");
?>