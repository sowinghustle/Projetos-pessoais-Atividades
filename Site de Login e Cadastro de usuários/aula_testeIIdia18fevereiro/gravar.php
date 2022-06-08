
<?php
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula17do02", $id);

$nome=$_POST['Nome'];
$fone=$_POST['Telefone'];
$cpf=$_POST['CPF'];
$data=$_POST['Data'];

$sql="insert into clientes (cli_nome, cli_fone, cli_cpf, cli_data) 
                    values ('$Nome', '$Telefone', '$CPF', '$Data')";

mysql_query($sql);
mysql_close($id);

header("location: cadastro.html");
?>