<?php

	require_once("funcoes/funcoes.php");

    $formato = "json";
    $aparelho = "";
    
    if (isset($_GET["formato"])){
        $formato = $_GET["formato"];
    }     
    if (isset($_GET["aparelho"])){
        $aparelho = $_GET["aparelho"];
    }     

    $host = "localhost";
    $dbname = "u846090108_usoconsciente";
    $user = "u846090108_usoconsciente";
    $senha = "Pi202201";

    try{
        $pdo = new PDO( 'mysql:host=' . $host . ';dbname=' . $dbname, $user, $senha);
    } catch ( PDOException $e ){
        echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
    }
     
    $sql = "select * from potencias";
	if (!empty($aparelho)){
		$sql .= " where aparelho like '%" . $aparelho . "%'";
	}
	$sql .= " order by aparelho";
    $result = $pdo->query($sql);
    $rows = $result->fetchAll();

	$dados = array();
	foreach ($rows as $coluna){

		$dado = array();

		$dado["id"] = $coluna["id"];
		$dado["aparelho"] = $coluna["aparelho"];
		$dado["potencia"] = $coluna["potencia"];

		$dados[] = $dado;
	}

	$json_data = array(
		"obterpotencias" => $dados
	);

	if ($formato=="json"){
		header('Content-Type: application/json');
		echo json_encode($json_data,JSON_UNESCAPED_UNICODE);
	} else {
		echo "<pre>";
		print_r($json_data);		
	}

?>