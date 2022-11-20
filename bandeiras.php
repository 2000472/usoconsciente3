<?php

    include_once("config.php");
    require_once("classes/html.class.php");
    require_once("funcoes/funcoes.php");
    require_once(dirname(dirname(__FILE__)) . "/usoconsciente/apis/guzzle/vendor/autoload.php");        

    $select_anoinicial = "";
    $select_anofinal = "";
    
    if (isset($_POST["select_anoinicial"])){
        $select_anoinicial = $_POST["select_anoinicial"];
    }     
    if (isset($_POST["select_anofinal"])){
        $select_anofinal = $_POST["select_anofinal"];
    }     

    if (!empty($select_anoinicial) && !empty($select_anofinal)){

        //echo "<br>" . $select_anoinicial;
        //echo "<br>" . $select_anofinal;

        $url = "https://apise.way2.com.br/v1/bandeiras?apikey=" . $apikey . "&datainicial=" . $select_anoinicial . "-01-01&datafinal=" . $select_anofinal . "-12-31";

        $client = new GuzzleHttp\Client();

        try {
            $dados = $client->get($url);                                    
        } catch (GuzzleHttp\Exception\ClientException $e) {
            exit;
        }                                    

        $dados_array = json_decode($dados->getBody()->getContents(),true); 

        //echo "<pre>";
        //print_r($dados_array);

        // html
        $html = new HTML();
        $html->link = "bandeiras.php";
        $html->texto = "Bandeiras Tarifárias";
        $html->javacript = "bandeiras.js";
        $html->inicializaHTML();

        echo '
        <div class="row" id="conteudo">


                <div class="col-12">
                    <h1 class="d-inline">Bandeiras Tarifárias</h1>
                    <p class="text-muted"></p>
        ';

        echo '
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="alert alert-primary alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>Dados obtidos através da <a href="https://www.way2.com.br/especiais/api-setor-eletrico/" class="alert-link" target="_blank">API do Setor Elétrico.</a>
                                <br>Os dados obtidos, a atualização das informações e a velocidade de resposta são dependentes da API                                
                            </div>

                            <div class="card">
                                <div class="card-body">
        ';

        echo "
                                    <div class='row'>

                                        <div class='col-md-1'>
                                        </div>

                                        <div class='col-md-3'>
                                            <label class='m-0' for='select_registros'>Registros Por Página</label>
                                            <select class='form-control form-control-sm' id='select_registros' name='select_registros'>
                                                <option value='10' selected>10</option>
                                                <option value='25'>25</option>
                                                <option value='50'>50</option>
                                                <option value='100'>100</option>
                                            </select>
                                        </div>

                                        <div class='col-md-3'>
                                        </div>

                                        <div class='col-md-4'>
                                            <label class='m-0' for='input_busca'>Busca</label>
                                            <input class='form-control form-control-sm' type='text' id='input_busca' name='input_busca' value=''>
                                        </div>

                                        <div class='col-md-1'>
                                        </div>

                                    </div>
                                    <br>
        ";           

        echo '
                                    <div class="table-responsive">
                                        <table id="tabela" class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Período</th>
                                                    <th>Bandeira</th>
                                                    <th>Patamar</th>
                                                    <th>Custo Adicional</th>
                                                </tr>
                                            </thead>
                                            <tbody>
        ';

        $bandeiras = $dados_array["items"];

        foreach ($bandeiras as $chave => $valor) {

            echo '<tr>';

            echo "<td>";                
            echo substr($valor["month"],0,7);
            echo "</td>";               

            echo "<td>";                
            if ($valor["flagType"]=="0"){
                echo '<span class="badge badge-success">Verde</span>';
            } else if ($valor["flagType"]=="1"){
                echo '<span class="badge badge-warning">Amarela</span>';
            } else if ($valor["flagType"]=="2"){
                echo '<span class="badge badge-danger">Vermelha</span>';
            } else if ($valor["flagType"]=="3"){
                echo '<span class="badge badge-danger">Vermelha</span>';
            } else if ($valor["flagType"]=="4"){
                echo '<span class="badge badge-secondary">Escassez Hídrica</span>';
            }
            echo "</td>";               

            echo "<td>";                
            if ($valor["flagType"]=="2"){
                echo '1';
            } else if ($valor["flagType"]=="3"){
                echo '2';
            }
            echo "</td>";               

            echo "<td>";                
            echo adequaPrecoUnitarioAmericanoBrasileiro($valor["value"]*100,true);
            echo "</td>";               

            echo '</tr>';

        }

        echo '
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Período</th>
                                                    <th>Bandeira</th>
                                                    <th>Patamar</th>
                                                    <th>Custo Adicional</th>
                                                </tr>
                                            </tfoot>
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
                </div>
            </div>
        ';

    } else {

        // html
        $html = new HTML();
        $html->link = "bandeiras.php";
        $html->texto = "Bandeiras Tarifárias";
        $html->inicializaHTML();

        $anoinicial = obtemAno()-5;
        $anofinal = obtemAno();

        $anos = array();
        for ($i = $anoinicial; $i <= $anofinal; $i++) {
            $anos[] = $i;
        }

        echo '
            <div class="row" id="conteudo">
                <div class="col-12">
                    <h1 class="d-inline">Bandeiras Tarifárias</h1>
                    <p class="text-muted"></p>
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="alert alert-primary alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button>Dados obtidos através da <a href="https://www.way2.com.br/especiais/api-setor-eletrico/" class="alert-link" target="_blank">API do Setor Elétrico.</a>
                                <br>Os dados obtidos, a atualização das informações e a velocidade de resposta são dependentes da API                                
                            </div>

                            <div class="card">
                                <div class="card-body">
        ';
                                    
        echo "<form";
        echo " id='form_bandeiras'";
        echo " name='form_bandeiras'";
        echo " action='bandeiras.php'";     
        echo " enctype='multipart/form-data'";      
        echo " method='post'";
        echo " target='_self'";    
        echo ">";       

        // select_anoinicial
        echo '<div class="form-group">';
        echo '<label for ="select_anoinicial"><span class="preto">Ano Inicial</span></label>';
        echo '<select class="form-control" id="select_anoinicial" name="select_anoinicial">';
        foreach ($anos as $chave => $valor) {
            if ($valor>=2021){
                echo '<option value="';
                echo $valor;
                echo '"';
                if ($valor==obtemAno()){
                    echo ' selected';
                }
                echo '>';
                echo $valor;
                echo '</option>';
            }
        }
        echo '</select>';
        echo '</div>';

        // select_anofinal
        echo '<div class="form-group">';
        echo '<label for ="select_anofinal"><span class="preto">Ano Final</span></label>';
        echo '<select class="form-control" id="select_anofinal" name="select_anofinal">';
        foreach ($anos as $chave => $valor) {
            if ($valor>=2021){
                echo '<option value="';
                echo $valor;
                echo '"';
                if ($valor==obtemAno()){
                    echo ' selected';
                }
                echo '>';
                echo $valor;
                echo '</option>';
            }
        }
        echo '</select>';
        echo '</div>';

        echo '<button type="submit" class="btn mb-1 btn-primary">Obter Bandeiras Tarifárias</button>';

        echo "</form>";

        echo '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';

        /*
        // html
        $html = new HTML();
        $html->link = "bandeiras.php";
        $html->texto = "Bandeiras Tarifárias";
        $html->inicializaHTML();

        $url = "https://apise.way2.com.br/v1/bandeiras?apikey=" . $apikey;

        $client = new GuzzleHttp\Client();

        try {
            $dados = $client->get($url);                                    
        } catch (GuzzleHttp\Exception\ClientException $e) {
            exit;
        }                                    

        $dados_array = json_decode($dados->getBody()->getContents(),true); 

        $bandeiraatual = $dados_array["body"]["items"][0]["flagType"];

        echo '
            <div class="row">
                <div class="col-12">
                    <h4 class="d-inline">Bandeiras Tarifárias</h4>
                    <p class="text-muted"></p>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
        ';

        echo '<div class="alert alert-info">';
        echo 'A bandeira tarifária atual é';
        echo '<br>';

        if ($bandeiraatual=="1"){
            echo '<span class="badge badge-success">Verde</span>';
        } else if ($bandeiraatual=="2"){
            echo '<span class="badge badge-warning">Amarela</span>';
        } else if ($bandeiraatual=="3"){
            echo '<span class="badge badge-danger">Vermelha - Patamar 1</span>';
        } else if ($bandeiraatual=="4"){
            echo '<span class="badge badge-danger">Vermelha - Patamar 2</span>';
        }

        echo '</div>';

        echo '
                        </div>
                    </div>
                </div>
            </div>
        ';

        $anoinicial = obtemAno()-5;
        $anofinal = obtemAno();

        $anos = array();
        for ($i = $anoinicial; $i <= $anofinal; $i++) {
            $anos[] = $i;
        }

        echo '
            <div class="row">
                <div class="col-12">
                    <h4 class="d-inline">Consulte Outros Períodos</h4>
                    <p class="text-muted"></p>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
        ';
                                    
        echo "<form";
        echo " id='form_bandeiras'";
        echo " name='form_bandeiras'";
        echo " action='bandeiras.php'";     
        echo " enctype='multipart/form-data'";      
        echo " method='post'";
        echo " target='_self'";    
        echo ">";       

        // select_anoinicial
        echo '<div class="form-group">';
        echo '<label>Ano Inicial</label>';
        echo '<select class="form-control" id="select_anoinicial" name="select_anoinicial">';
        foreach ($anos as $chave => $valor) {
            echo '<option value="';
            echo $valor;
            echo '"';
            if ($valor==obtemAno()){
                echo ' selected';
            }
            echo '>';
            echo $valor;
            echo '</option>';
        }
        echo '</select>';
        echo '</div>';

        // select_anofinal
        echo '<div class="form-group">';
        echo '<label>Ano Final</label>';
        echo '<select class="form-control" id="select_anofinal" name="select_anofinal">';
        foreach ($anos as $chave => $valor) {
            echo '<option value="';
            echo $valor;
            echo '"';
            if ($valor==obtemAno()){
                echo ' selected';
            }
            echo '>';
            echo $valor;
            echo '</option>';
        }
        echo '</select>';
        echo '</div>';

        echo '<button type="submit" class="btn mb-1 btn-primary">Obter Bandeiras Tarifárias</button>';

        echo "</form>";

        echo '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';
        */

    }

?>