<?php
require_once('src/PHPMailer.php'); //permitindo acesso as classes que foram extraidas
require_once('src/SMTP.php');
require_once('src/Exception.php');
 
use PHPMailer\PHPMailer\PHPMailer; //usando a classe
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//var_dump ($_POST);
if (!empty($_POST["nome"])) //se for diferente de vazio, o contúdo da varialvel, que vem lá do POST
	{ 
		$nome = $_POST["nome"]; //ATRIBUINDO para variavel texto o conteudo que veio da variavel "POST" da Caixa
			  if (!empty($_POST["email"])) //comparando se existe realmento algum valor na variavel
			     {    
			        $email = $_POST["email"];
					 if (!empty($_POST["mensagem"])) //comparando se existe realmento algum valor na variavel
			             {    
			               $mensagem = $_POST["mensagem"];
				         
							$mail = new PHPMailer(true); 
 
							try {
								//$mail->SMTPDebug = SMTP::DEBUG_SERVER; //classe estática para verificar os possiveis erros
								$mail->isSMTP();
								$mail->Host = 'smtp.live.com';
								$mail->SMTPAuth = true;
								$mail->Username = 'exemplo@hotmail.com'; //colocar aqui seu e-mail
								$mail->Password = '123456'; //sua senha do e-mail
								$mail->SMTPSecure = 'tls';
								$mail->Port = 587; //indicar a porta do seu servidor de e-mail (gmail/hotmail...)
							 
								$mail->setFrom('exemplo@hotmail.com'); //saindo do meu email
								
								$mail->addAddress($email);//vai enviar para o email que veio do formulário
															 
								$mail->isHTML(true); //habilitando o html para o modo html 
								$mail->Subject = 'Recebendo E-mail pelo PHPMailer'; //assunto
								$mail->Body =  "Olá $nome: $mensagem"; //corpo da mensagem
								$mail->AltBody = 'Chegou o email teste';
							 
								if($mail->send()) 
								{
									echo 'Email enviado com sucesso';
										header("location:formulario.html"); //Voltando para o formulário		
								} 
								else 
								{
									echo 'Email nao enviado';
								}
							} 
							catch (Exception $e) 
							{
								echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
							}
							}
				 }
			}
			else
			{
				echo "Nenhum Valor Informado! <br><br>";
			}

?>