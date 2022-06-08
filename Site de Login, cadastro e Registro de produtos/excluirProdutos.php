<?php
     error_reporting(0);
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula3", $id);


    $cod = $_POST['produto_id'];
    $sql = "delete from produtos where produto_id= $cod" ; 
echo $sql ;
    mysql_query($sql) or die (mysql_error());

    mysql_close($id);
   header("location:buscaProdutos.php");
    ?>