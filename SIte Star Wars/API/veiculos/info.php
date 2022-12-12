<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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

		$veiculos = fetch_data($url);

		echo "Nome: " . $veiculos->name . "<br>";
		echo "Modelo: " . $veiculos->model . "<br>";
		echo "Manufatoradora: " . $veiculos->manufacturer . "<br>";
		echo "Custo em créditos: " . $veiculos->cost_in_credits . "<br>";
		echo "Altura: " . $veiculos->length . "<br>";
		echo "Velocidade Máxima na atmosfera: " . $veiculos->max_atmosphering_speed . "<br>";
		echo "Tamanho da Tripulação: " . $veiculos->crew . "<br>";
		echo "Passageiros: " . $veiculos->passengers . "<br>";
		echo "Capacidade de Carga: " . $veiculos->cargo_capacity . "<br>";
		echo "Consumíveis: " . $veiculos->consumables . "<br>";
		echo "Classe da Espaçonave: " . $veiculos->vehicle_class . "<br>";
	} else {
		echo "não foi passada a url do veículo";
	}


	// //ator
	// $url = "https://swapi.dev/api/vehicles"; //busca todo os atores
	// $resultado = fetch_data($url);

	// foreach ($resultado->results as $veiculos) {
	// 	//var_dump($ator); //pega apenas atores e seus dados
	// 	echo "Nome: " . $veiculos->name . "<br>";
	// 	echo "Modelo: " . $veiculos->model . "<br>";
	// 	echo "Manufatoradora: " . $veiculos->manufacturer . "<br>";
	// 	echo "Custo em créditos: " . $veiculos->cost_in_credits . "<br>";
	// 	echo "Altura: " . $veiculos->length . "<br>";
	// 	echo "Velocidade Máxima na atmosfera: " . $veiculos->max_atmosphering_speed . "<br>";
	// 	echo "Tamanho da Tripulação: " . $veiculos->crew . "<br>";
	// 	echo "Passageiros: " . $veiculos->passengers . "<br>";
	// 	echo "Capacidade de Carga: " . $veiculos->cargo_capacity . "<br>";
	// 	echo "Consumíveis: " . $veiculos->consumables . "<br>";
	// 	echo "Classe da Espaçonave: " . $veiculos->vehicle_class . "<br>";


	// 	//Pilotos
	// 	foreach ($veiculos->pilots as $pilotos) {

	// 		$urlp = $pilotos; //busca todo os atores
	// 		$resultado = fetch_data($urlp);


	// 		echo "Pilotos: " . $resultado->name . "<br>";
	// 	}

	// 	//filmes
	// 	foreach ($veiculos->films as $filme) {

	// 		$urlf = $filme; //busca todo os atores
	// 		$resultado = fetch_data($urlf);


	// 		echo "Filmes: " . $resultado->title . "<br>";
	// 	}
	// }



	?>
</body>

</html>