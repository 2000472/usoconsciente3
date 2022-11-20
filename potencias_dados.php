<?php

	require_once("funcoes/funcoes.php");

    $host = "localhost";
    $dbname = "u846090108_usoconsciente";
    $user = "u846090108_usoconsciente";
    $senha = "Pi202201";

    try{
        $pdo = new PDO( 'mysql:host=' . $host . ';dbname=' . $dbname, $user, $senha);
    } catch ( PDOException $e ){
        echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
    }
     
	$requestData = $_REQUEST;

	$campos = array("aparelho");

    $sql = "select * from potencias";
    $result = $pdo->query($sql);
    $rows = $result->fetchAll();
	$totalregistros = count($rows);

    $sql = "select * from potencias";
	if (!empty($requestData["busca"])){
		$sql .= " where aparelho like '%" . $requestData["busca"] . "%'";
	}
    $result = $pdo->query($sql);
    $rows = $result->fetchAll();
	$registrosfiltrados = count($rows);

    $sql = "select * from potencias";
	if (!empty($requestData["busca"])){
		$sql .= " where aparelho like '%" . $requestData["busca"] . "%'";
	}
	$sql .= " order by " . $campos[$requestData['order'][0]['column']] . " " . $requestData['order'][0]['dir'];
	$sql .= " limit ";
	$sql .= $requestData['length'];
	$sql .= " offset ";
	$sql .= $requestData['start'];
    $result = $pdo->query($sql);
    $rows = $result->fetchAll();

	$dados = array();
	foreach ($rows as $coluna){

		$dado = array();

		$temp = "<td>";
		$temp .= "<span class='preto'>";
		$temp .= $coluna["aparelho"];
		$temp .= "</span>";
		$temp .= "</td>";
		$dado[] = $temp;

		$temp = "<td>";
		$temp .= "<span class='preto'>";
		$temp .= adequaQuantidadeAmericanoBrasileiro($coluna["potencia"],true);
		$temp .= "</span>";
		$temp .= "</td>";
		$dado[] = $temp;

        $aparelho = $coluna["aparelho"] . ' (' . adequaQuantidadeAmericanoBrasileiro($coluna["potencia"],true) . 'W)';

		$temp = "<td>";
		$temp .= "<a href='calculadora.php?aparelho=" . $aparelho . "'";
		$temp .= " title='Calcular Consumo'>";
		$temp .= "<img src='images2/calcular.png'>";
		$temp .= " Calcular Consumo";
		$temp .= "</a>";	

		$temp .= "</td>";
		$dado[] = $temp;

		$dados[] = $dado;
	}

	$json_data = array(
		"draw" => intval($requestData["draw"]),
		"recordsTotal" => intval($totalregistros),
		"recordsFiltered" => intval($registrosfiltrados),
		"data" => $dados
	);

	echo json_encode($json_data);

?>