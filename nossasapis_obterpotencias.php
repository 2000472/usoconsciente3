<?php

    include_once("config.php");
    require_once("classes/html.class.php");
    require_once("funcoes/funcoes.php");

    // html
    $html = new HTML();
    $html->link = "nossasapis_obterpotencias.php";
    $html->texto = "Nossas APIs - Obter Potências";
    $html->inicializaHTML();

    echo '
        <div class="row" id="conteudo">
            <div class="col-12">
                <h1 class="d-inline">Nossas APIs - Obter Potências</h1>
                <p class="text-muted"></p>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
    ';
                                
    echo '
    É permitido consultar a potência de alguns aparelhos. Para isso, acesse o endpoint:
    <br>
    <br>
    <b>
    https://sistemasadvance.com.br/usoconsciente/obterpotencias.php
    </b>
    <br>
    <br>
    E enviar os seguintes parâmetros na Query String:
    <br>
    <br>
    <b>formato:</b> informe o formato de saída (json ou array)
    <br>
    <b>aparelho:</b> aparelho que se deseja obter a potência
    <br>
    <br>
    Os parâmetros são opcionais. Caso não sejam enviados, serão retornadas todos os aparelhos existentes no formato json.
    <br>
    <br>
    <h3>Exemplos</h3>
    <br>
    <a href="https://sistemasadvance.com.br/usoconsciente/obterpotencias.php" target="_blank">https://sistemasadvance.com.br/usoconsciente/obterpotencias.php</a>
    <br>
    <br>
    <a href="https://sistemasadvance.com.br/usoconsciente/obterpotencias.php?formato=array" target="_blank">https://sistemasadvance.com.br/usoconsciente/obterpotencias.php?formato=array</a>
    <br>
    <br>    
    <a href="https://sistemasadvance.com.br/usoconsciente/obterpotencias.php?aparelho=chuveiro" target="_blank">https://sistemasadvance.com.br/usoconsciente/obterpotencias.php?aparelho=chuveiro</a>
    <br>
    <br>    
    <a href="https://sistemasadvance.com.br/usoconsciente/obterpotencias.php?formato=array&aparelho=aquecedor" target="_blank">https://sistemasadvance.com.br/usoconsciente/obterpotencias.php?formato=array&aparelho=aquecedor</a>
    ';

    echo '
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';

?>