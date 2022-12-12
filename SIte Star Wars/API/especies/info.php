<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Raças</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../../style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<style>
		img {
			width: 85%;
			height: 75%;
			position: relative;
			z-index: 200;
		}

		.imagem {
			height: 20vh;
			width: 20vw;
			max-height: 60vh;
			min-height: 50vh;
			max-width: 30vw;
			min-width: 20vw;
			position: relative;
			overflow: hidden;
			border-radius: 10vh;
			border: 1vh solid #babac117;
			display: grid;
			place-items: center;
		}

		.imagem::after {
			content: "";
			position: absolute;
			background: #191928;
			height: 20vh;
			width: 20vw;
			max-height: 60vh;
			min-height: 50vh;
			max-width: 30vw;
			min-width: 20vw;
			inset: 0;
			border-radius: 9vh;
			border: #191928;

		}

		.coluna-informacoes {
			height: 40vh;
			width: 60vw;
		}

		.informacoes_personagens {
			text-decoration: none;
			color: #d3d1d1d1;
			font-weight: bold;
			text-transform: uppercase;
			display: grid;
			/* grid-template-rows: 1fr; */
			grid-template-columns: repeat(3, 33%);
			/* height: 100%; */
		}

		.informacoes_personagens strong {
			color: #525270;
		}

		.informacoes_personagens--linha {
			display: inline-block;
			text-align: center;
		}

		.conteudo {
			display: grid;
			grid-template-columns: 1fr 1fr;
		}

		.echo {
			text-decoration: none;
			color: #d3d1d1d1;
			font-weight: bold;
			text-transform: uppercase;
			margin: 0px;
			display: inline-block;
		}

		form {
			background-color: #2a2a42ed;
			width: 146vw;
			height: 91vh;
		}

		form>div:not(.conteudo) {
			display: grid;
			place-items: center;
			text-align: center;
			font-weight: bold;
			color: #000000d9;
			margin: 0;
			font-size: clamp(0.6rem, 1vw, 4rem);
		}

		.informacoes_personagens--linha span {

			display: block;
		}

		.informacoes_personagens>div {
			display: flex;
			flex-direction: column;
		}

		a#Back {
			position: relative;
				top: 9vh;
				left: 6vh;
		}
	</style>
</head>

<body>
	<?php
	set_time_limit(0);
	function fetch_data($url)
	{
		$ch = curl_init($url); //iniciei variavel com comando curl

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //habilita o uso do CURL

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //transforma dados em ARRAY

		$resultado = json_decode(curl_exec($ch)); //decodifica para uso no json

		return $resultado;
	}

	if (isset($_GET["url"])) { ?>
		<div class="busca">
			<form name="form1" method="POST" action="">

				<?php
				$url = $_GET["url"];

				$especie = fetch_data($url);

				echo "<div class='conteudo'>";
				echo "<div class='imagem'>";
				echo "<img src='../../imgs/species/" . ($especie->name) . ".png'/>";
				echo "</div>";
				echo "<div class='coluna-informacoes'>";
				echo "<div class='informacoes_personagens'>";
				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Nome da raça</strong> <span>"  . $especie->name . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Classificação da raça</strong> <span>"   . $especie->classification . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Designação da raça</strong> <span>"  . $especie->designation . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Altura Média</strong> <span>"  . $especie->average_height . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Cores de Pele</strong> <span>"  . $especie->skin_colors . "</span>" . "</span>";
				echo "</div>";
				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Cores de Cabelo</strong> <span>"  . $especie->hair_colors  . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Cores dos Olhos</strong> <span>"   . $especie->eye_colors . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Tempo de vida médio</strong> <span>"  . $especie->average_lifespan . "</span>" . "</span>";
				$homeworld = fetch_data($especie->homeworld);
				echo "<span class='informacoes_personagens--linha'>  <a href=/root/SIte%20Star%20Wars/api/planetas/info.php?url=$homeworld->url>" . "<strong>" . "Terra Natal</strong> <span>"  . $homeworld->name . "</span>" . "</a> </span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Linguagem</strong> <span>"  . $especie->language . "</span>" . "</span>";
				echo "</div>";

				echo "<div>";

				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Filmes na qual a espécie aparece </strong>";
				echo "</span>";
				foreach ($especie->films as $filme) {
					$resultado = fetch_data($filme);
					echo "<span> <a href=/root/SIte%20Star%20Wars/api/filmes/info.php?url=$resultado->url>"  . $resultado->title . "</a> </span> ";
				}
				echo "</div>";

				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Personagens habitantes do planeta </strong>";
				echo "</span>";
				foreach ($especie->people as $pessoas) {
					$resultado = fetch_data($pessoas);


					echo "<span>  <a href=/root/SIte%20Star%20Wars/api/personagens/info.php?url=$resultado->url>" . $resultado->name . "</a> </span>";
				}
				echo "</div>";

			echo "</div>";	


				echo "</div>";
				echo "</div>";
				echo "</div>";
				?>

				<a id="Back" class="material-symbols-outlined" href="SIte Star Wars/API/especies/index.php/">
					arrow_back
				</a>
			</form>
		</div>

	<?php } else {
		echo "não foi passada a url da Raça";
	}



	// 	echo "Nome: " . $especie->name . "<br>";
	// 	echo "Classificação: " . $especie->classification . "<br>";
	// 	echo "Designação: " . $especie->designation . "<br>";
	// 	echo "Altura Média: " . $especie->average_height . "<br>";
	// 	echo "Cores de Pele: " . $especie->skin_colors . "<br>";
	// 	echo "Cores de Cabelo: " . $especie->hair_colors . "<br>";
	// 	echo "Cores dos Olhos: " . $especie->eye_colors . "<br>";
	// 	echo "Tempo de vida médio: " . $especie->average_lifespan . "<br>";
	// 	echo "Terra Natal: " . $especie->homeworld . "<br>";
	// 	echo "Linguagem: " . $especie->language . "<br>";
	// } else {
	// 	echo "não foi passada a url da espécie";
	// }













	// //ator
	// $url = "https://swapi.dev/api/species"; //busca todo os atores
	// $resultado = fetch_data($url);

	// foreach ($resultado->results as $especie) {
	// 	//var_dump($ator); //pega apenas atores e seus dados
	// 	echo "Nome: " . $especie->name . "<br>";
	// 	echo "Classificação: " . $especie->classification. "<br>";
	// 	echo "Designação: " . $especie->designation . "<br>";
	// 	echo "Altura Média: " . $especie->average_height . "<br>";
	// 	echo "Cores de Pele: " . $especie->skin_colors . "<br>";
	// 	echo "Cores de Cabelo: " . $especie-> hair_colors. "<br>";
	// 	echo "Cores dos Olhos: " . $especie->eye_colors . "<br>";
	// 	echo "Tempo de vida médio: " . $especie->average_lifespan . "<br>";
	// 	echo "Terra Natal: " . $especie->homeworld . "<br>";
	//     echo "Linguagem: " . $especie->language . "<br>";

	//             //Pessoas
	// 		foreach ($especie->people as $pessoas) {

	// 			$urlp = $pessoas; //busca todo os atores
	// 			$resultado = fetch_data($urlp);


	// 			echo "Pessoas: " . $resultado->name . "<br>";
	// 		}

	// 		//filmes
	// 		foreach ($especie->films as $filme) {

	// 			$urlf = $filme; //busca todo os atores
	// 			$resultado = fetch_data($urlf);


	// 			echo "Filmes: " . $resultado->title . "<br>";
	// 		}




	// }

	?>
</body>

</html>