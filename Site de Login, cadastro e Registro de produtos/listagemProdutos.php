<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <?php
     error_reporting(0);
$id=mysql_connect("localhost", "root", "");
$con=mysql_select_db("aula3", $id);


    $cod_Produto =  $_POST ["produto_id"];
    $sql = "select * from produtos produto_id = $cod_Produto";
    $result = mysql_query($sql);

    while ($obj = mysql_fetch_array($result))
    {
        $cod = $obj[0];
        $nome = $obj[1];
        $preco = $obj[2] ;

        echo" 
            <form name=\"formulario\" method=\"post\" action=\"excluir.php\">
                <div>
                    Codigo: <input name=\"cod\" type=\"text\" value=\"$cod\"><br>
                </div>
                <div>
                    Nome: <input name=\"nome\" type=\"text\" value=\"$nome\"><br>
                </div>
                <div>
                    Preco: <input name=\"Preco\" type=\"text\" value=\"$preco\"><br>
                </div>
                <div>
                    <a href='excluirProdutos.php?cod=$cod'>Excluir</a> 
                </div>

                <div class='botao'>
                <a href='pagina2.html'> 
                    <span class='material-icons'>
                        arrow_back
                    </span> 
                </a>
            </div>

            </form>
            ";
    }
    ?>

    <style>
            form {
                flex-direction: column;
                align-content: center;
                width: 200px;
                display: block;
                margin: 0 auto 20px;
                position: relative;
                z-index: 1;

            }
            form::after {
                z-index: -1;
                position: absolute;
                inset: 0 0 0 0;
                content: "";
                background: BlanchedAlmond;
                opacity: 0.5;
            }

            form div {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;

            }

            input {
                text-align: center;
            }

            a {
                width: 100px;
                height: 50px;
                background-color: #FFF5C0;
                text-decoration: none;
                border-radius: 15px;
                border: 4px outset gray;
                display: grid;
                place-items: center;   
                font-family: sans-serif;
                font-weight: bold;
                color:  #403D3D;
            }

            a:active {
                    border-style: inset;
            }


        </style>
</body>
</html>