
<?php
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula17do02", $id);

$nome=$_POST['cli_nome'];
$fone=$_POST['cli_fone'];
$cpf=$_POST['cli_cpf'];
$data=$_POST['cli_data'];

$sql="insert into clientes (cli_nome, cli_fone, cli_cpf, cli_data) 
                    values ('$nome', '$telefone', '$cpf', '$data')";

mysql_query($sql);
mysql_close($id);

header("location: cadastro.html");
?>