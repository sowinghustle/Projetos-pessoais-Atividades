<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Planetas</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../../style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
			grid-template-columns: repeat(5, 22%);
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

				$planetas = fetch_data($url);

				echo "<div class='titulo'>" . "<h1>" . $planetas->name . "</h1>" . "</div>";
				echo "<div class='conteudo'>";
				echo "<div class='imagem'>";
				echo "<img src='../../imgs/planets/" . ($planetas->name) . ".png'/>";
				echo "</div>";
				echo "<div class='coluna-informacoes'>";
				echo "<div class='informacoes_personagens'>";
				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Nome </strong> <span>"   . $planetas->name  . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Período de rotação </strong> <span>"  . $planetas->rotation_period . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Período orbital </strong> <span>"  . $planetas->orbital_period  . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Diâmetro </strong> <span>"  . $planetas->diameter  . "</span>" . "</span>";
				echo "</div>";
				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" .  "Clima </strong> <span>"  . $planetas->climate  . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Gravidade </strong> <span>"  . $planetas->gravity  . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" .  "<strong>" . "Terreno </strong> <span>"  . $planetas->terrain  . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Àgua na superfície </strong> <span>"  . $planetas->surface_water  . "</span>" . "</span>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "População </strong> <span>"  . $planetas->population  . "</span>" . "</span>";
				echo "</div>";

				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>" . "<strong>" . "Personagens habitantes do planeta </strong>";
				echo "</span>";
				foreach ($planetas->residents as $residentes) {
					$resultado = fetch_data($residentes);


					echo "<span>" . $resultado->name . "</span>";
				}
				echo "</div>";

				echo "<div>";
				echo "<span class='informacoes_personagens--linha'>"  . "<strong>"  . "Filmes na qual o planeta aparece </strong>";
				echo "</span>";
				foreach ($planetas->films as $filmes) {
					$resultado = fetch_data($filmes);


					echo "<span>" . $resultado->title . "</span>";
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
		echo "não foi passada a url do Planeta";
	}


	// 	$url = $_GET["url"];

	// 	$planetas = fetch_data($url);

	// 	echo "Nome: " . $planetas->name . "<br>";
	// 	echo "Período de rotação: " . $planetas->rotation_period . "<br>";
	// 	echo "Período de órbita: " . $planetas->orbital_period . "<br>";
	// 	echo "Diâmetro: " . $planetas->diameter . "<br>";
	// 	echo "Clima: " . $planetas->climate . "<br>";
	// 	echo "Gravidade: " . $planetas->gravity . "<br>";
	// 	echo "Terreno: " . $planetas->desert . "<br>";
	// 	echo "Àgua na superfície: " . $planetas->surface_water . "<br>";
	// 	echo "População: " . $planetas->population . "<br>";
	// } else {
	// 	echo "não foi passada a url do personagem";
	// }

	// //planetas$planetas
	// $url = "https://swapi.dev/api/Planets"; //busca todo os planetas$planetases
	// $resultado = fetch_data($url);

	// foreach ($resultado->results as $planetas) {
	// 	//var_dump($planetas); //pega apenas planetas$planetases e seus dados
	// 	echo "Nome: " . $planetas->name . "<br>";
	// 	echo "Período de rotação: " . $planetas->rotation_period. "<br>";
	// 	echo "Período de órbita: " . $planetas->orbital_period . "<br>";
	// 	echo "Diâmetro: " . $planetas->diameter . "<br>";
	// 	echo "Clima: " . $planetas->climate . "<br>";
	// 	echo "Gravidade: " . $planetas-> gravity. "<br>";
	// 	echo "Terreno: " . $planetas->desert . "<br>";
	// 	echo "Àgua na superfície: " . $planetas->surface_water . "<br>";
	// 	echo "População: " . $planetas->population . "<br>";


	//             //Residentes
	// 		foreach ($planetas->residents as $residentes) {

	// 			$urlr = $residentes; //busca todo os planetas$planetases
	// 			$resultado = fetch_data($urlr);


	// 			echo "Residentes: " . $resultado->name . "<br>";
	// 		}

	// 		//filmes
	// 		foreach ($planetas->films as $filme) {

	// 			$urlf = $filme; //busca todo os planetas$planetases
	// 			$resultado = fetch_data($urlf);


	// 			echo "Filmes: " . $resultado->title . "<br>";
	// 		}




	// }

	?>
</body>

</html>