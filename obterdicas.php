<?php

	require_once("funcoes/funcoes.php");

    $formato = "json";
    $descricao = "";
    
    if (isset($_GET["formato"])){
        $formato = $_GET["formato"];
    }     
    if (isset($_GET["descricao"])){
        $descricao = $_GET["descricao"];
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
     
    $sql = "select * from dicas";
	if (!empty($descricao)){
		$sql .= " where descricao like '%" . $descricao . "%'";
	}
	$sql .= " order by descricao";
    $result = $pdo->query($sql);
    $rows = $result->fetchAll();

	$dados = array();
	foreach ($rows as $coluna){

		$dado = array();

		$dado["id"] = $coluna["id"];
		$dado["descricao"] = $coluna["descricao"];

	    $sql2 = "select * from dicastextos";
		$sql2 .= " where dica=" . $coluna["id"];
	    $result2 = $pdo->query($sql2);
	    $rows2 = $result2->fetchAll();

		foreach ($rows2 as $coluna2){
			$dado["dicas"][] = $coluna2["texto"];
		}

		if (!empty($coluna["fonte"])){
			$dado["fonte"] = $coluna["fonte"];
		}
		if (!empty($coluna["fontelink"])){
			$dado["fontelink"] = $coluna["fontelink"];
		}

		$dados[] = $dado;
	}

	$json_data = array(
		"obterdicas" => $dados
	);

	if ($formato=="json"){
		header('Content-Type: application/json');
		echo json_encode($json_data,JSON_UNESCAPED_UNICODE);
	} else {
		echo "<pre>";
		print_r($json_data);		
	}

?>