<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Espaçonaves</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="../style.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<h1>info</h1>
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
	if (isset($_GET["url"])) {
		$url = $_GET["url"];

		$espaçonaves = fetch_data($url);

		echo "Nome: " . $espaçonaves->name . "<br>";
		echo "Modelo: " . $espaçonaves->model . "<br>";
		echo "Manufatoradora: " . $espaçonaves->manufacturer . "<br>";
		echo "Custo em créditos: " . $espaçonaves->cost_in_credits . "<br>";
		echo "Altura: " . $espaçonaves->length . "<br>";
		echo "Velocidade Máxima na atmosfera: " . $espaçonaves->max_atmosphering_speed . "<br>";
		echo "Tamanho da Tripulação: " . $espaçonaves->crew . "<br>";
		echo "Passageiros: " . $espaçonaves->passengers . "<br>";
		echo "Capacidade de Carga: " . $espaçonaves->cargo_capacity . "<br>";
		echo "Consumíveis: " . $espaçonaves->consumables . "<br>";
		echo "Taxa de Hyperdrive: " . $espaçonaves->hyperdrive_rating . "<br>";
		echo "MGLT: " . $espaçonaves->MGLT . "<br>";
		echo "Classe da Espaçonave: " . $espaçonaves->starship_class . "<br>";
	} else {
		echo "não foi passada a url da espaçonave";
	}



	// //ator
	// $url = "https://swapi.dev/api/starships"; //busca todo os atores
	// $resultado = fetch_data($url);

	// foreach ($resultado->results as $espaçonaves) {
	// 	//var_dump($ator); //pega apenas atores e seus dados
	// 	echo "Nome: " . $espaçonaves->name . "<br>";
	// 	echo "Modelo: " . $espaçonaves->model . "<br>";
	// 	echo "Manufatoradora: " . $espaçonaves->manufacturer . "<br>";
	// 	echo "Custo em créditos: " . $espaçonaves->cost_in_credits . "<br>";
	// 	echo "Altura: " . $espaçonaves->length . "<br>";
	// 	echo "Velocidade Máxima na atmosfera: " . $espaçonaves-> max_atmosphering_speed. "<br>";
	// 	echo "Tamanho da Tripulação: " . $espaçonaves->crew . "<br>";
	// 	echo "Passageiros: " . $espaçonaves->passengers . "<br>";
	// 	echo "Capacidade de Carga: " . $espaçonaves->cargo_capacity . "<br>";
	//     echo "Consumíveis: " . $espaçonaves->consumables . "<br>";
	//     echo "Taxa de Hyperdrive: " . $espaçonaves->hyperdrive_rating . "<br>";
	//     echo "MGLT: " . $espaçonaves->MGLT . "<br>";
	//     echo "Classe da Espaçonave: " . $espaçonaves->starship_class . "<br>";


	// 		//filmes
	// 		foreach ($espaçonaves->films as $filme) {

	// 			$urlf = $filme; //busca todo os atores
	// 			$resultado = fetch_data($urlf);


	// 			echo "Filmes: " . $resultado->title . "<br>";
	// 		}

	//         //Pilotos
	// 		foreach ($espaçonaves->pilots as $pilotos) {

	// 			$urlp = $pilotos; //busca todo os atores
	// 			$resultado = fetch_data($urlp);


	// 			echo "Pilotos: " . $resultado->name . "<br>";
	// 		}


	// }

	?>
</body>

</html>