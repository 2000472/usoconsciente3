<?php

    include_once("config.php");
    require_once("classes/html.class.php");
    require_once("funcoes/funcoes.php");

    // html
    $html = new HTML();
    $html->link = "dicas2.php";
    $html->texto = "Dicas de Economia";
    $html->javacript = "dicas2.js";
    $html->inicializaHTML();

    echo '
            <div class="row" id="conteudo">
            <div class="col-12">
                <h1 class="d-inline">Dicas de Economia</h1>
                <p class="text-muted"></p>
    ';

    echo '
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
    ';

    echo "
                                <div class='row'>

                                    <div class='col-md-1'>
                                    </div>

                                    <div class='col-md-3'>
                                        <label class='m-0' for='select_registros'><span class='preto'>Registros Por Página</span></label>
                                        <select class='form-control form-control-sm' id='select_registros' name='select_registros'>
                                            <option value='5' selected>5</option>
                                            <option value='10'>10</option>
                                            <option value='25'>25</option>
                                            <option value='50'>50</option>
                                            <option value='100'>100</option>
                                        </select>
                                    </div>

                                    <div class='col-md-3'>
                                    </div>

                                    <div class='col-md-4'>
                                        <label class='m-0' for='input_busca'><span class='preto'>Busca</span></label>
                                        <input class='form-control form-control-sm' type='text' id='input_busca' name='input_busca' value=''>
                                    </div>

                                    <div class='col-md-1'>
                                    </div>

                                </div>
                                <br>
    ";           

//                                    <table id="tabela" class="table table-striped table-bordered zero-configuration">


    echo '
                                <div class="table-responsive">

                                    <table id="tabela" class="table table-bordered zero-configuration">
                                        <caption></caption>
                                        <thead>
                                            <tr>
                                                <th><span class="preto">Dica</span></th>
                                            </tr>
                                        </thead>
                                        <tbody>
    ';    

    echo '
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    ';

    echo '
                            </div>
                        </div>
                    </div>
                </div>
    ';

?>