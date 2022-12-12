<!DOCTYPE html>
<html lang="pt-PT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veículos</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <center>
        <br>
        <h1></h1>
    </center>

    <div class="busca">
        <form name="form1" method="GET" action="info.php">
            <input type="hidden" name="url" value="" />
            <div class="botao">
                <?php
                function fetch_data($url)
                {
                    $ch = curl_init($url); //iniciei variavel com comando curl
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //habilita o uso do CURL
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //transforma dados em ARRAY
                    $resultado = json_decode(curl_exec($ch)); //decodifica para uso no json
                    return $resultado;
                }

                $url = "https://swapi.dev/api/vehicles"; //busca todo os atores
                $resultado = fetch_data($url);

                foreach ($resultado->results as $veiculos) {
                    echo '<a href="#" data-url="' . $veiculos->url . '" type="button">' . $veiculos->name . '</a><br/>';
                }
                ?>
            </div>
        </form>
    </div>

    <script>
        [...document.querySelectorAll("form *[data-url]")].forEach(link => {
            link.addEventListener('click', function() {
                document.getElementsByName("url")[0].value = link.dataset.url;
                document.querySelector("form").submit();
            });
        });
    </script>

    <style>
        h1 {
            color: #403D3D;
            font-weight: 800;

        }

        form {
            display: flex;
            align-items: center;
            align-content: center;
        }

        .busca {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);


        }

        a {
            text-decoration: none;
            color: #403D3D;
            font-weight: bold;
            text-transform: uppercase;
            margin: 20px;
            display: inline-block;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>