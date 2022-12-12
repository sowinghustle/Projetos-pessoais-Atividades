<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>API Star Wars</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<center>
		<br>
		<h1>Site Star Wars</h1>
	</center>
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


	//ator
	$url = "https://swapi.dev/api/people"; //busca todo os atores
	$resultado = fetch_data($url);

	foreach ($resultado->results as $ator) {
		//var_dump($ator); //pega apenas atores e seus dados
		echo "Nome: " . $ator->name . "<br>";
		echo "Altura: " . $ator->height . "<br>";


		//filmes
		foreach ($ator->films as $filme) {

			$urlf = $filme; //busca todo os atores
			$resultado = fetch_data($urlf);


			echo "Filme: " . $resultado->title . "<br>";
		}


		//espécies

		foreach ($ator->species as $especie) {
			$urle = $especie; //busca todo os espécies
			$resultado = fetch_data($urle);


			echo "Raça: " . $resultado->name . "<br>";
		}

		//veículos

		foreach ($ator->vehicles as $veiculos) {
			$urlv = $veiculos; //busca todos os veículos
			$resultado = fetch_data($urlv);


			echo "Veículos: " . $resultado-> name . "<br>";
		}

		//espaçonaves

		foreach ($ator->starships as $espaçonaves) {
			$urls = $espaçonaves; //busca todo os espécies
			$resultado = fetch_data($urls);


			echo "Espaçonaves: " . $resultado->name . "<br>";
		}


		echo "<hr>";
	}

	?>

</body>

</html>