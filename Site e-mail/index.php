<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site e-mail</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php
    set_time_limit(0);
    require_once('verifymail.php');
    $email_valido = false;
    $vmail = new verifyEmail();
    $vmail->setStreamTimeoutWait(0);
    $vmail->Debug = false;
    $vmail->Debugoutput = 'html';



    // if (isset($_POST["email"]) && isset($_POST["senha"]) && isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["email_enviar"]) && isset($_POST["mensagem"])) {
    //     $email = $_POST["email"];
    //     $senha = $_POST["senha"];
    //     $nome = $_POST["nome"];
    //     $email_enviar = $_POST["email_enviar"];
    //     $mensagem = $_POST["mensagem"];
    // }

    require_once('feito pelo professor/PHPMailer-master/src/PHPMailer.php'); //permitindo acesso as classes que foram extraidas
    require_once('feito pelo professor/PHPMailer-master/src/SMTP.php');
    require_once('feito pelo professor/PHPMailer-master/src/Exception.php');

    use PHPMailer\PHPMailer\PHPMailer; //usando a classe
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


    //var_dump ($_POST);
    if (!empty($_POST["email"])) //comparando se existe realmento algum valor na variavel
    {
        $email = $_POST["email"];
        $vmail->setEmailFrom($email); //email which is used to set from headers,you can add your own/company email over here
        $valid = $vmail->check($email);


        if ($valid) {
            $email_valido = true;
            if (!empty($_POST["nome"]) && !empty($_POST["senha"]))  //se for diferente de vazio, o contúdo da varialvel, que vem lá do POST
            {
                $nome = $_POST["nome"]; //ATRIBUINDO para variavel texto o conteudo que veio da variavel "POST" da Caixa
                $senha = $_POST["senha"];
                echo "Aqui é a senha: $senha <br>";
                $email_enviar = $_POST["email_enviar"];
                if (!empty($_POST["mensagem"])) //comparando se existe realmento algum valor na variavel
                {
                    $mensagem = $_POST["mensagem"];

                    $mail = new PHPMailer(true);

                    try {
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER; //classe estática para verificar os possiveis erros
                        $mail->isSMTP();
                        // $mail->Host = 'smtp.office365.com';
                        $mail->Host = 'smtp-mail.outlook.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = $email; //colocar aqui seu e-mail
                        $mail->Password = $senha; //sua senha do e-mail
                        $mail->SMTPSecure = 'starttls';
                        $mail->Port = 587; //indicar a porta do seu servidor de e-mail (gmail/hotmail...)

                        $mail->setFrom($email); //saindo do meu email

                        $mail->addAddress($email_enviar); //vai enviar para o email que veio do formulário

                        $mail->isHTML(true); //habilitando o html para o modo html 
                        $mail->Subject = 'Recebendo E-mail pelo PHPMailer'; //assunto
                        $mail->Body =  "Olá $nome: $mensagem"; //corpo da mensagem
                        $mail->AltBody = 'Chegou o email teste';



                        if ($mail->send()) {
                            echo "EMAIL ENVIADO";
                            // header('location: index.html');
                            echo "
                            <script>
                                alert('EMAIL ENVIADO COM SUCESSO!');
                                window.location.href = 'index.php';
                            </script>
                        ";
                        } else {
                            echo 'Email nao enviado';
                        }
                    } catch (Exception $e) {
                        echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
                    }
                }
            }
        } else {
            if ($valid == NULL) echo "Ocorreu um erro";
            else echo '<h1>email &lt;' . $email . '&gt; O e-mail não é válido, e ele não existe!</h1>';
        }
    }
    ?>
    <div class="busca">
        <form name="textbox" method="POST">
            <div>
                <label for="email">Insira o seu E-mail</label>
                <input type="text" id="email" name="email" placeholder="Digite aqui seu e-mail" value="<?php if ($email_valido == true) echo $_POST["email"] ?>" required>
            </div>
            <div>
                <label for="senha">Insira sua senha</label>
                <input type="text" id="senha" name="senha" placeholder="Digite aqui sua senha" value="<?php if ($email_valido == true) echo $_POST["senha"] ?>" required>
            </div>

            <?php if ($email_valido == true) { ?>
                <div>
                    <label for="nome">Insira o seu nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite aqui o seu nome" required>
                </div>
                <div>
                    <label for="email_enviar">Insira o E-mail destinatário</label>
                    <input type="text" id="email_enviar" name="email_enviar" placeholder="Digite aqui o e-mail destinatário" required>
                </div>
                <div>
                    <label for="mensagem">Insira sua Mensagem</label>
                    <input type="text" id="mensagem" name="mensagem" placeholder="Digite aqui sua mensagem" required>
                </div>
                <div class="botao">
                    <button class="button" input type="submit" value="Verificar">Enviar</button>
                </div>
            <?php   } else {
            ?>
                <div class="botao">
                    <button class="button" input type="submit">Verificar</button>
                </div>
            <?php

            }  ?>


        </form>
    </div>
    <style>
        body {
            font-family: poppins;
            background-image: url('imgs/bkg.gif');
            background-size: cover;
            color: white;
            text-shadow: 0 0 22px black;
        }

        .titulo {
            font-size: large;
            color: #ffffffad;
            display: flex;
            justify-content: center;
        }

        h1 {
            color: #ffffffad;
        }

        form {
            border: #fff5c0a6;
            padding: 30px, 30px;
            width: 45vh;
            border-radius: 15px;
            background-color: #1e2329f5;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-content: center;
        }

        form>div {
            display: grid;
            place-items: center;
            text-align: center;
            font-weight: bold;
            color: #8e99a3;
            margin: 1vh;
            font-size: clamp(0.6rem, 1vw, 4rem);
            /* font-size: 0.6rem; */
            /* font-size: 1rem; */
        }


        form>div>input {
            text-align: center;
            font-weight: 700;
        }

        .labels {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #403D3D;
        }

        .labels input {
            /* adicione padding, width, height e margin */
            padding: 5px;
            width: 300px;
            height: 20px;
        }

        button {
            border: #2f2f42;
            border-radius: 1vh;
            font-family: 'Poppins';
            font-weight: 800;
            border-radius: 6;
            text-transform: uppercase;
            color: #3c454e;
        }



        .labels input[type=submit] {
            padding: 0;
            height: 50px;
            width: 200px;
            font-family: poppins;
            border-radius: 10px;

        }

        .busca {
            padding: 50px;
            border-radius: 15px;
            display: flex;
            justify-content: center;
        }



        .labelsBusca input {
            /* adicione padding, width, height e margin */
            padding: 5px;
            width: 100px;
            height: 20px;
        }

        .labelsBusca input[type=submit] {
            padding: 0;
            height: 35px;
            width: 100px;
            font-family: poppins;
            border-radius: 5px;
            margin: 15px auto 0;
            display: block;
            justify-content: center;
        }

        .labelsBusca {
            display: block;
            width: 400px;
        }

        .labelsBusca>div:first-child {
            display: flex;
        }

        .labelsBusca>div:first-child label {
            width: 8ch;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .labelsBusca>div:first-child input {
            flex-grow: 1;
        }
    </style>




</body>

</html>