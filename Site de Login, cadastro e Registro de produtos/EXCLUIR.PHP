<?php
     error_reporting(0);
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula3", $id);


    $cod = $_GET['cod'];
     $sql = "delete from usuarios where usu_cod=$cod" ; 

    mysql_query($sql);

    mysql_close($id);
    header("location:listagem.php");
    ?>