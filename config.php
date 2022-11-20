<?php

    // protege arquivo
    $mystring = $_SERVER["PHP_SELF"];
    $findme   = basename(__FILE__);
    $pos = strpos($mystring, $findme);
    if ($pos === false) {
    } else {
        header("Location: index.php");
        exit;
    }   

    // apikey
    //$apikey = "faeb0547e2754fe5b81bd7f763136117";
    $apikey = "41af8b95b72d49aea41c1029f954440f";

    // moeda corrente
    $moedacorrente = "R$";

    // timezone
    $timezonephp = "America/Sao_Paulo";    

?>