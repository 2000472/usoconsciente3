<?php

    require_once("classes/html.class.php");

    // html
    $html = new HTML();
    $html->inicializaHTML();

    echo '
        <div class="row" id="conteudo">
            <div class="col-12">
                <h1 class="d-inline">Uso Consciente de Energia Elétrica</h1>
                <p class="text-muted"></p>
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <a href="bandeiras.php"><img class="img-fluid" src="images2/bandeiras.jpg" alt="Imagem de três lâmpadas nas cores vermelha, amarela e verde"></a>
                            <div class="card-body">
                                <p><strong class="card-title"><span class="preto">Bandeiras Tarifárias</span></strong></p>
                                <p class="card-text"><span class="preto">Dados das bandeiras tarifárias (Verde, Amarela, Vermelha, Vermelha 2 e Escassez Hídrica) e seus custos adicionais.</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <a href="calculadora.php" ><img class="img-fluid" src="images2/calculadora2.png" alt="Imagem de alguém segurando uma lâmpada com um cifrão dentro"></a>
                            <div class="card-body">
                                <p><strong class="card-title"><span class="preto">Calculadora de Consumo</span></strong></p>
                                <p class="card-text"><span class="preto">Calcule a energia gasta com os equipamentos da sua empresa ou residência.</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <a href="dicas2.php"><img class="img-fluid" src="images2/dicas.jpg" alt="Imagem de uma muda de planta e uma lâmpada acessa"></a>
                            <div class="card-body">
                                <p><strong class="card-title"><span class="preto">Dicas de Economia</span></strong></p>
                                <p class="card-text"><span class="preto">Apresentamos algumas dicas de economia de energia que poderão te ajudar</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <a href="potencias.php"><img class="img-fluid" src="images2/potencias.jpg" alt="Imagem de uma lâmpada com pernas e braços puxando uma tomada"></a>
                            <div class="card-body">
                                <p><strong class="card-title"><span class="preto">Potências de Aparelhos</span></strong></p>
                                <p class="card-text"><span class="preto">Potência média de aparelhos residenciais e comerciais.</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <a href="tarifas.php"><img class="img-fluid" src="images2/tarifas.jpg" alt="Imagem de uma lâmpada sobre um gráfico em linhas"></a>
                            <div class="card-body">
                                <p><strong class="card-title"><span class="preto">Tarifas</span></strong></p>
                                <p class="card-text"><span class="preto">Dados das tarifas de energia, demanda e impostos de cada uma das 61 distribuidoras e cooperativas do país.</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';

?>