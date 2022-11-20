<?php

    include_once("config.php");
    require_once("classes/html.class.php");
    require_once("funcoes/funcoes.php");

    // html
    $html = new HTML();
    $html->link = "potencias.php";
    $html->texto = "Potências de Aparelhos";
    $html->javacript = "potencias.js";
    $html->inicializaHTML();

    echo '
            <div class="row" id="conteudo">
            <div class="col-12">
                <h1 class="d-inline">Potências de Aparelhos</h1>
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
                                            <option value='5'>5</option>
                                            <option value='10'>10</option>
                                            <option value='25' selected>25</option>
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
                                                <th><span class="preto">Aparelho</span></th>
                                                <th><span class="preto">Potência (Watts)</span></th>
                                                <th><span class="preto">Opções</span></th>
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