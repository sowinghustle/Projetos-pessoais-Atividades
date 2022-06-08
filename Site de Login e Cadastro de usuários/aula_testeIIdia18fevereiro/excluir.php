<?php
     error_reporting(0);
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula17do02", $id);

    $cod = $_POST['cod'];

    if ($_POST['botao'] == "Excluir")
    {
        $sql = "delete from clientes where cod=$cod" ; 
    }
    else if ($_POST['botao'] == "Alterar")
    {
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $nota = $_POST['nota'];
        $sql = "UPDATE clientes SET cod = '$cod', nome = '$nome' ,
                                    telefone = '$telefone', email = '$email' ,
                                    nota = '$nota'
                                    where cod ='$cod'
        ";
    }

    mysql_query($sql);

    mysql_close($id);
    header("location:listagem.php");
    ?>