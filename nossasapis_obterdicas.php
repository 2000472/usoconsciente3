<?php

    include_once("config.php");
    require_once("classes/html.class.php");
    require_once("funcoes/funcoes.php");

    // html
    $html = new HTML();
    $html->link = "nossasapis_obterdicas.php";
    $html->texto = "Nossas APIs - Obter Dicas";
    $html->inicializaHTML();

    echo '
        <div class="row" id="conteudo">
            <div class="col-12">
                <h1 class="d-inline">Nossas APIs - Obter Dicas</h1>
                <p class="text-muted"></p>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
    ';
                                
    echo '
    É permitido consultar nossas dicas de economia. Para isso, acesse o endpoint:
    <br>
    <br>
    <b>
    https://sistemasadvance.com.br/usoconsciente/obterdicas.php
    </b>
    <br>
    <br>
    E enviar os seguintes parâmetros na Query String:
    <br>
    <br>
    <b>formato:</b> informe o formato de saída (json ou array)
    <br>
    <b>descricao:</b> descrição da dica que se deseja obter
    <br>
    <br>
    Os parâmetros são opcionais. Caso não sejam enviados, serão retornadas todas as dicas de economia existentes no formato json.
    <br>
    <br>
    <h3>Exemplos</h3>
    <br>
    <a href="https://sistemasadvance.com.br/usoconsciente/obterdicas.php" target="_blank">https://sistemasadvance.com.br/usoconsciente/obterdicas.php</a>
    <br>
    <br>
    <a href="https://sistemasadvance.com.br/usoconsciente/obterdicas.php?formato=array" target="_blank">https://sistemasadvance.com.br/usoconsciente/obterdicas.php?formato=array</a>
    <br>
    <br>
    <a href="https://sistemasadvance.com.br/usoconsciente/obterdicas.php?descricao=chuveiro" target="_blank">https://sistemasadvance.com.br/usoconsciente/obterdicas.php?descricao=chuveiro</a>
    <br>
    <br>
    <a href="https://sistemasadvance.com.br/usoconsciente/obterdicas.php?formato=array&descricao=aquecedor" target="_blank">https://sistemasadvance.com.br/usoconsciente/obterdicas.php?formato=array&descricao=aquecedor</a>
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