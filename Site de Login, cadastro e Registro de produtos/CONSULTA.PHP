<?php
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula3", $id);

$email=$_POST['usu_email'];
$senha=$_POST['usu_senha'];

echo "$email";
$sql="select * from usuarios
        where usu_email='$email';

"; 
$result = mysql_query($sql) or die(mysql_error());
while ($obj = mysql_fetch_array($result))
{

    $senha_obtida = $obj["usu_senha"];

    if ($senha == $senha_obtida){
        header("location: pagina2.html");
    }
    else {
        header("location: login.html");
    }
}




mysql_query($sql);
mysql_close($id);


?>