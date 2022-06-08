<?php
     error_reporting(0);
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula17do02", $id);


    $cod = $_GET['cod'];
    $sql = "delete from clientes where cli_cod=$cod" ; 

    mysql_query($sql);

    mysql_close($id);
    header("location:listagem.php");
    ?>