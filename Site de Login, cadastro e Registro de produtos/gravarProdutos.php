<?php
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula3", $id);


$nomeProduto=$_POST['produto_nome'];
$precoProduto=$_POST['produto_preco'];

                    $sql="insert into produtos (produto_nome, produto_preco) 
                    values ('$nomeProduto', '$precoProduto')";
mysql_query($sql) or die(mysql_error());
mysql_close($id);


header("location: cadastroProduto.html");
?>