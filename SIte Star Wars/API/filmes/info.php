<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Filmes</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../../style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<style>
		img {
			width: 100%;
			height: 100%;
			position: relative;
			z-index: 200;
		}

		.imagem {
			height: 21vh;
			width: 15vw;
			max-height: 60vh;
			min-height: 62vh;
			max-width: 30vw;
			min-width: 19vw;
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
			grid-template-columns: repeat(2, 44%);
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
			bottom: -12vh;
			left: -26vh;
			/* display: flex; */
			/* flex-direction: inherit; */
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

				$filmes = fetch_data($url);
				echo "<div class='conteudo'>";
				echo "<div class='imagem'>";
				echo "<img src='../../imgs/films/" . ($filmes->title) . ".jpg'/>";
				echo "</div>";
				echo "<div class='coluna-informacoes'>";
				echo "<div class='informacoes_personagens'>";
				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Título do filme</strong> <span>"  . $filmes->title . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Numeração episódica</strong> <span>"   . $filmes->episode_id . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Diretor do filme</strong> <span>"  . $filmes->director . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Produtor do filme</strong> <span>"  . $filmes->producer . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Data de lançamento do filme</strong> <span>"  . $filmes->release_date . "</span>" . "</span>";
				echo "</div>";
				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Texto de abertura</strong> <span>"  . $filmes->opening_crawl . "</span>" . "</span>";
				echo "</div>";


				echo "</div>";
				echo "</div>";
				echo "</div>";
				?>

				<a id="Back" class="material-symbols-outlined" href="/index.php">
					arrow_back
				</a>
			</form>
		</div>

	<?php } else {
		echo "não foi passada a url do Planeta";
	}

	// //fil$filmes
	// $url = "https://swapi.dev/api/films"; //busca todo os fil$filmeses
	// $resultado = fetch_data($url);

	// foreach ($resultado->results as $filmes) {
	// 	//var_dump($filmes); //pega apenas fil$filmeses e seus dados
	// 	echo "Título: " . $filmes->title . "<br>";
	// 	echo "Numeração Episódica: " . $filmes->episode_id. "<br>";
	// 	echo "Frase de Abertura: " . $filmes->opening_crawl . "<br>";
	// 	echo "Diretor: " . $filmes->director . "<br>";
	// 	echo "Produtor: " . $filmes->producer . "<br>";
	// 	echo "Data de Lançamento: " . $filmes-> release_date. "<br>";

	//             //Personagens
	// 		foreach ($filmes->characters as $personagens) {

	// 			$urlp = $personagens; //busca todo os fil$filmeses
	// 			$resultado = fetch_data($urlp);


	// 			echo "Personagens: " . $resultado->name . "<br>";
	// 		}

	// 		//Planetas
	// 		foreach ($filmes->planets as $planetas) {

	// 			$urlpl = $planetas; //busca todo os fil$filmeses
	// 			$resultado = fetch_data($urlpl);


	// 			echo "Planetas: " . $resultado->name . "<br>";
	// 		}

	//         		//espaçonaves

	// 		foreach ($filmes->starships as $espaçonaves) {
	// 			$urls = $espaçonaves; //busca todo os espécies
	// 			$resultado = fetch_data($urls);


	// 			echo "Espaçonaves: " . $resultado->name . "<br>";
	// 		}

	//         		//veículos

	// 		foreach ($filmes->vehicles as $veiculos) {
	// 			$urlv = $veiculos; //busca todos os veículos
	// 			$resultado = fetch_data($urlv);


	// 			echo "Veículos: " . $resultado-> name . "<br>";
	// 		}

	//         	//espécies

	// 		foreach ($filmes->species as $especie) {
	// 			$urle = $especie; //busca todo os espécies
	// 			$resultado = fetch_data($urle);


	// 			echo "Raça: " . $resultado->name . "<br>";
	// 		}







	// }

	?>
</body>

</html>