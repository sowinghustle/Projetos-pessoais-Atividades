<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Pesquisa</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"
      rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
<div class="titulo">
    <center>
        <h1>busca</h1>
    </center>
    </div>
    <div class="busca">
        <form name="form1" method="POST" action="">
            <div class="labelsBusca">
                <div>
                    <label>Código: </label>
                    <input name="cod" type="number" value=""><br>
                </div>
                <input name="botao" type="submit" value="Pesquisar "><br>
            </div>


            <div class="labelsBusca">
                <div>
                    <label>Nome: </label> <input name="nome" type="text" value=""><br>
                </div>
                <input name="botao" type="submit" value="Pesquisar"><br>
            </div>
            <div class="botao">
                <a href="pagina2.html"> <span class="material-icons">
arrow_back
</span> </a>
               </div>
        </form>
    </div>

<?php
error_reporting(0);
$id=mysql_connect ("localhost", "root", "");
$con=mysql_select_db ("aula3" , $id);

    if (!empty($_POST['botao'])) 
{
    if($_POST['botao'] == 'Pesquisar ')
    {
        $cod = $_POST['cod'] ;
        $sql = "Select * from usuarios where usu_cod='$cod'";
    }
    if ($_POST['botao'] == 'Pesquisar')
    {
        $nome = $_POST['nome'] ;
        $sql = "Select * from usuarios where usu_nome like '%$nome%'";
    }
    $result = mysql_query($sql) or die(mysql_error());
    while ($obj = mysql_fetch_array($result))
    {
        $cod = $obj[0];
        $nome = $obj[1];
        $email = $obj [2] ;
        $senha =  $obj [3] ;



        echo" 
        <div class=\"busca\">
            <form name=\"formulario\" method=\"post\" action=\"listagem.php\">
                    Codigo: <input name=\"usu_cod\" type=\"text\" value=\"$cod\"><br>
                    Nome: <input name=\"usu_nome\" type=\"text\" value=\"$nome\"><br>
                    E-mail: <input name=\"usu_email\" type=\"text\" value=\"$email\"><br>
                    Senha: <input name=\"usu_senha\" type=\"text\" value=\"$senha\"><br>
               
                        <div class=\"labelsBusca\">
                <input name=\"botao\" type=\"submit\" value=\"Modificar\">
            </div>
            </form>
        </div>
        ";

    }
}
else $sql = "Select * from usuarios order by usu_nome";

    
    ?>

</body>
</html>