<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Personagens</title>
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

				$ator = fetch_data($url);

				echo "<div class='titulo'>" . "<h1>" . $ator->name . "</h1>" . "</div>";
				echo "<div class='conteudo'>";
				echo "<div class='imagem'>";
				echo "<img src='../../imgs/personagens/" . //str_replace
					($ator->name //, "%20", "x"
					) . ".png'/>";
				echo "</div>";
				echo "<div class='coluna-informacoes'>";
				echo "<div class='informacoes_personagens'>";
				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Nome </strong><span>"   . $ator->name  . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Altura </strong> <span>"  . $ator->height . " cm" . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Peso </strong> <span>"  . $ator->mass . " kg" . "</span>" . "</span>";
				echo "</div>";
				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Cor de Cabelo </strong> <span>"  . $ator->hair_color  . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" .  "Cor de Pele </strong> <span>"  . $ator->skin_color  . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Cor dos Olhos </strong> <span>"  . $ator->eye_color  . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" .  "<strong>" . "Ano de Nascimento </strong> <span>"  . $ator->birth_year  . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Gênero </strong> <span>"  . $ator->gender  . "</span>" . "</span>";
				echo "</div>";

				$homeworld = fetch_data($ator->homeworld);
				echo "<span class='informacoes_personagens--linha'> <a href=/root/SIte%20Star%20Wars/api/planetas/info.php?url=$homeworld->url>" .  "<strong>" . "Planeta natal </strong> <span>"   . $homeworld->name . "</span>" . "</a> </span>";

				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Filmes na qual o personagem aparece </strong>";
				echo "</span>";
				foreach ($ator->films as $filme) {
					$resultado = fetch_data($filme);
					echo "<span> <a href=/root/SIte%20Star%20Wars/api/filmes/info.php?url=$resultado->url>" . $resultado->title . "</a> </span>";
				}
				echo "</div>";


				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>"  . "<strong>"  . "Veículos usados pelo personagem </strong>";
				echo "</span>";
				foreach ($ator->vehicles as $veiculo) {
					$resultado = fetch_data($veiculo);


					echo "<span> <a href=/root/SIte%20Star%20Wars/api/veiculos/info.php?url=$resultado->url>" . $resultado->name . "</a> </span>";
				};
				echo "</div>";

				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Espaçonaves usadas pelo personagem </strong>";
				echo "</span>";
				foreach ($ator->starships as $espaçonave) {
					$resultado = fetch_data($espaçonave);


					echo "<span><a href=/root/SIte%20Star%20Wars/api/espaçonaves/info.php?url=$resultado->url>" . $resultado->name . "</a> </span>";
				}
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
		echo "não foi passada a url do personagem";
	}

	//ator
	/*
$url = "https://swapi.dev/api/people"; //busca todo os atores
$resultado = fetch_data($url);

foreach ($resultado->results as $ator) {
	//var_dump($ator); //pega apenas atores e seus dados
	echo "Nome: " . $ator->name . "<br>";
	echo "Altura: " . $ator->height . "<br>";
	echo "Peso: " . $ator->mass . "<br>";
	echo "Cor de Cabelo: " . $ator->hair_color . "<br>";
	echo "Cor de Pele: " . $ator->skin_color . "<br>";
	echo "Cor dos Olhos: " . $ator->eye_color . "<br>";
	echo "Ano de Nascimento: " . $ator->birth_year . "<br>";
	echo "Gênero: " . $ator->gender . "<br>";
	echo "Terra Natal: " . $ator->homeworld . "<br>";


		//filmes



		//espécies

		foreach ($ator->species as $especie) {
			$urle = $especie; //busca todo os espécies
			$resultado = fetch_data($urle);


			echo "Raça: " . $resultado->name . "<br>";
		}

		//veículos

		foreach ($ator->vehicles as $veiculo) {
			$urlv = $veiculo; //busca todos os veículos
			$resultado = fetch_data($urlv);


			echo "Veículos: " . $resultado-> name . "<br>";
		}

		//espaçonave

		foreach ($ator->starships as $espaçonave) {
			$urls = $espaçonave; //busca todo os espécies
			$resultado = fetch_data($urls);


			echo "Espaçonaves: " . $resultado->name . "<br>";
		}
}
*/

	?>

</body>

</html>