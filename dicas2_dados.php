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

	$campos = array("descricao");

    $sql = "select * from dicas";
    $result = $pdo->query($sql);
    $rows = $result->fetchAll();
	$totalregistros = count($rows);

    $sql = "select * from dicas";
	if (!empty($requestData["busca"])){
		$sql .= " where descricao like '%" . $requestData["busca"] . "%'";
	}
    $result = $pdo->query($sql);
    $rows = $result->fetchAll();
	$registrosfiltrados = count($rows);

    $sql = "select * from dicas";
	if (!empty($requestData["busca"])){
		$sql .= " where descricao like '%" . $requestData["busca"] . "%'";
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

		$temp = "<h3>";
		$temp .= "<b>";
		$temp .= $coluna["descricao"];
		$temp .= "</b>";
		$temp .= "</h3>";
		$temp .= "<br>";
		$temp .= "<br>";
		$temp .= "<br>";
		$temp .= "<img src='images2/";
		$temp .= $coluna["imagem"];
		$temp .= "' alt='";
		$temp .= $coluna["descricaoimagem"];
		$temp .= "'>";		
		$temp .= "<br>";
		$temp .= "<br>";
		$temp .= "<br>";

	    $sql2 = "select * from dicastextos";
		$sql2 .= " where dica=" . $coluna["id"];
	    $result2 = $pdo->query($sql2);
	    $rows2 = $result2->fetchAll();

		foreach ($rows2 as $coluna2){
  			$temp .= "<p><span class='preto'>" . $coluna2["texto"] . "</span></p>";
		}

		if (!empty($coluna["fonte"])){
			$temp .= "<p><span class='preto'>";
			$temp .= "Fonte: ";
			if (!empty($coluna["fontelink"])){
				$temp .= "<a href='";
				$temp .= $coluna["fontelink"];
				$temp .= "' target='blank_'>";
				$temp .= $coluna["fonte"];			
				$temp .= "</a>"			;
			} else {
				$temp .= $coluna["fonte"];			
			}
			$temp .= "</p>";
		}

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