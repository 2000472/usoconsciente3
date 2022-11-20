<?php

    // protege arquivo
	/*
    $mystring = $_SERVER["PHP_SELF"];
    $findme   = basename(__FILE__);
    $pos = strpos($mystring, $findme);
    if ($pos === false) {
    } else {
        header("Location: ../index.php");
        exit;
    }
    */

    function adequaDataAmericanoBrasileiro($data){
		$data = implode("/",array_reverse(explode("-",$data)));
		return $data;	
    } // adequaDataAmericanoBrasileiro

	function adequaPrecoUnitarioAmericanoBrasileiro($precounitario,$visualizacao=false){
		include(dirname(dirname(__FILE__)) . "/config.php");
		$novoprecounitario = $precounitario;
        $novoprecounitario = number_format($novoprecounitario, 6, ',', '.');
		$novoprecounitarioarray = explode(",",$novoprecounitario);
        $novoprecounitarioarray0 = $novoprecounitarioarray[0];
        $novoprecounitarioarray1 = rtrim($novoprecounitarioarray[1],"0");
        if (!empty($novoprecounitarioarray1)){
            $novoprecounitario = $novoprecounitarioarray0 . "," . $novoprecounitarioarray1;
            if (strlen($novoprecounitarioarray1)==1){
                $novoprecounitario .= "0";
            }            
        } else {
            $novoprecounitario = $novoprecounitarioarray0 . ",00";
        }
		if ($visualizacao){
            return $moedacorrente . " " . $novoprecounitario;
		} else {
            $novoprecounitario = str_replace('.', '', $novoprecounitario);
            return $novoprecounitario;			
		}
	} // adequaPrecoUnitarioAmericanoBrasileiro

    function adequaQuantidadeAmericanoBrasileiro($quantidade,$visualizacao=false){
        if (empty($quantidade)){
            return null;
        } else {
            $novaquantidade = $quantidade;        
            $novaquantidade = number_format($novaquantidade, 6, ',', '.');
            $novaquantidadearray = explode(",",$novaquantidade);
            $novaquantidadearray0 = $novaquantidadearray[0];
            $novaquantidadearray1 = rtrim($novaquantidadearray[1],"0");
            if (!empty($novaquantidadearray1)){
                $novaquantidade = $novaquantidadearray0 . "," . $novaquantidadearray1;
            } else {
                $novaquantidade = $novaquantidadearray0;        
            }
            if ($visualizacao){
                return $novaquantidade;
            } else {
                $novaquantidade = str_replace('.', '', $novaquantidade);
                return $novaquantidade;         
            }       
        }
    } // adequaQuantidadeAmericanoBrasileiro    
    
	function adequaValorAmericanoBrasileiro($valor,$visualizacao=false){
		include(dirname(dirname(__FILE__)) . "/config.php");
		$novovalor = $valor;
        $novovalor = number_format($novovalor, 2, ',', '.');
		if ($visualizacao){
            return $moedacorrente . " " . $novovalor;			
		} else {
            $novovalor = str_replace('.', '', $novovalor);
            return $novovalor;			
		}		        
	} // adequaValorAmericanoBrasileiro    

    function obtemAno(){
		include(dirname(dirname(__FILE__)) . "/config.php");
		date_default_timezone_set($timezonephp);
		$data = date("Y"); 
		return $data;	
    } // obtemAno
    
?>