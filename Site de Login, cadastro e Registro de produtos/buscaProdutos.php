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
                    <input name="cod" type="text" value="">
                </div>
                <input name="botao" type="submit" value="Pesquisar">
                <input type="hidden" name = "filtro" value="codBotao"> 
            </div>
            </form>
            <form name="form2" method="POST" action="">
            <div class="labelsBusca">
                <div>
                    <label>Nome: </label> <input name="nome" type="text" value="">
                </div>
                <input name="botao" type="submit" value="Pesquisar">
                <input type="hidden" name = "filtro" value="nomeBotao"> 
            </div>
            </form>
            <form name="form3" method="POST" action="">
            <div class="labelsBusca">
                <div>
                    <label>preco: </label> <input name="preco" type="text" value="">
                </div>
                <input name="botao" type="submit" value="Pesquisar">
                <input type="hidden" name = "filtro" value="precoBotao"> 
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
    if($_POST['filtro'] == 'codBotao')
    {
        $cod = $_POST['cod'] ;
        $sql = "Select * from produtos where produto_id='$cod'";
    }
    else if ($_POST['filtro'] == 'nomeBotao')
    {
        $nome = $_POST['nome'] ;
        $sql = "Select * from produtos where produto_nome like '%$nome%'";
    }
    else if ($_POST['filtro'] == 'precoBotao')
    {
        $preco = $_POST['preco'] ;
        $sql = "Select * from produtos where produto_preco ='$preco'";
    }
    $result = mysql_query($sql) or die(mysql_error());
    while ($obj = mysql_fetch_array($result))
    {
        $cod = $obj[0];
        $nome = $obj[1];
        $preco = $obj [2] ;



        echo" 
        <div class=\"busca\">
            <form name=\"formulario\" method=\"post\" action=\"excluirProdutos.php\">
                    Codigo: <input name=\"produto_id\" type=\"text\" value=\"$cod\"><br>
                    Nome: <input name=\"produto_nome\" type=\"text\" value=\"$nome\"><br>
                    Preço: <input name=\"produto_preco\" type=\"text\" value=\"$preco\"><br>

               
            <div class=\"labelsBusca\">
                <input name=\"botao\" type=\"submit\" value=\"Excluir\">
            </div>
            </form>
        </div>
        ";

    }
}


    
    ?>
    <style>
        .busca {
            display: flex;
            flex-direction: column;
            width: 500px;
            justify-content: center;
            align-items: center;
            border-radius: 20px;
            overflow: hidden;
            padding: 0;
            position: relative;
            left: 50%;
            transform: translateX(-50%);
        }
        .busca form {
            width: 100%;
            align-items: center;
            border-radius: 0;
        }

        .busca form:first-child {
            padding-bottom: 0;
        }

        .busca form:last-child {
            padding-top: 0;
        }
</style>

</body>
</html>