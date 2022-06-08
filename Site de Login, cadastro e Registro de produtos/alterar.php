<?php
     error_reporting(0);
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula3", $id);


         $cod = $_POST['cod'];
         $nome = $_POST['nome'];
         $email = $_POST['email'];
         $senha = $_POST['senha'];
         $sql = 'UPDATE usuarios set usu_cod = '.$cod.', usu_nome = "'.$nome.'", usu_email = "'.$email.'", usu_senha = "'.$senha.'"  where usu_cod = "'.$cod.'"';

    mysql_query($sql) or die(mysql_error());

    mysql_close($id);
    header("location:listagem.php");



    ?>