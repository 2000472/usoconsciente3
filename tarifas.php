<?php

    include_once("config.php");
    require_once("classes/html.class.php");
    require_once("funcoes/funcoes.php");
    require_once(dirname(dirname(__FILE__)) . "/usoconsciente/apis/guzzle/vendor/autoload.php");        

    $select_concessionaria = "";
    $select_ano = "";
    
    if (isset($_POST["select_concessionaria"])){
        $select_concessionaria = $_POST["select_concessionaria"];
    }
    if (isset($_POST["select_ano"])){
        $select_ano = $_POST["select_ano"];
    }     

    if (!empty($select_concessionaria) && !empty($select_ano)){

        //echo "<br>" . $select_concessionaria;
        //echo "<br>" . $select_ano;

        $url = "https://apise.way2.com.br/v1/tarifas?apikey=" . $apikey . "&agente=" . $select_concessionaria . "&ano=" .$select_ano;

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
        $html->link = "tarifas.php";
        $html->texto = "Tarifas";
        $html->javacript = "tarifas.js";
        $html->inicializaHTML();

        echo '
            <div class="row" id="conteudo">
                <div class="col-12">
                    <h1 class="d-inline">Tarifas</h1>
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

    //                                    <table id="tabela" class="table table-striped table-bordered zero-configuration">

        echo '
                                    <div class="table-responsive">
                                        <table id="tabela" class="table zero-configuration">
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Subgrupo</th>
                                                    <th>Modalidade</th>
                                                    <th>Classe</th>
                                                    <th>Subclasse</th>
                                                    <th>Posto</th>
                                                    <th>Tarifa Demanda TUSD</th>
                                                    <th>Tarifa Consumo TUSD</th>
                                                    <th>Tarifa Consumo TE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
        ';

        foreach ($dados_array as $chave => $valor) {
            echo '<tr>';

            echo "<td>";                
            echo adequaDataAmericanoBrasileiro(substr($valor["validadesde"],0,10));
            echo "</td>";               

            echo "<td>";                
            echo "<a";
            echo " href='javascript:void()'";
            echo "'";
            echo " title='";
            if ($valor["subgrupo"]=="A1"){
                echo "Subgrupo A1 - Para o Nível de Tensão de 230 kV ou Mais";
            } else if ($valor["subgrupo"]=="A2"){
                echo "Subgrupo A2 - Para o Nível de Tensão de 88 a 138 kV";
            } else if ($valor["subgrupo"]=="A3"){
                echo "Subgrupo A3 - Para o Nível de Tensão de 69 kV";
            } else if ($valor["subgrupo"]=="A3a"){
                echo "Subgrupo A3a - Para o Nível de Tensão de 30 a 44 kV";
            } else if ($valor["subgrupo"]=="A4"){
                echo "Subgrupo A4 - Para o Nível de Tensão de 2,3 a 25 kV";
            } else if ($valor["subgrupo"]=="AS"){
                echo "Subgrupo AS - Para Sistema Subterrâneo";
            } else if ($valor["subgrupo"]=="B1"){
                echo "Subgrupo B1 - Residencial e Residencial Baixa Renda";
            } else if ($valor["subgrupo"]=="B2"){
                echo "Subgrupo B2 - Rural e Cooperativa de Eletrificação Rural";
            } else if ($valor["subgrupo"]=="B3"){
                echo "Subgrupo B3 - Demais Classes";
            } else if ($valor["subgrupo"]=="B4"){
                echo "Subgrupo B4 - Iluminação Pública";
            }
            echo "'>";
            echo $valor["subgrupo"];
            echo "</a>";

            echo "</td>";               

            echo "<td>";                
            echo $valor["modalidade"];
            echo "</td>";               

            echo "<td>";                
            echo $valor["classe"];
            echo "</td>";               

            echo "<td>";                
            echo $valor["subclasse"];
            echo "</td>";               

            echo "<td>";                
            echo $valor["posto"];
            echo "</td>";               

            echo "<td>";                
            echo adequaValorAmericanoBrasileiro($valor["tarifademandatusd"],true);
            echo "</td>";               

            echo "<td>";                
            echo adequaValorAmericanoBrasileiro($valor["tarifaconsumotusd"],true);
            echo "</td>";               

            echo "<td>";                
            echo adequaValorAmericanoBrasileiro($valor["tarifaconsumote"],true);
            echo "</td>";               

            echo '</tr>';
        }

        echo '
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Subgrupo</th>
                                                    <th>Modalidade</th>
                                                    <th>Classe</th>
                                                    <th>Subclasse</th>
                                                    <th>Posto</th>
                                                    <th>Tarifa Demanda TUSD</th>
                                                    <th>Tarifa Consumo TUSD</th>
                                                    <th>Tarifa Consumo TE</th>
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
        $html->link = "tarifas.php";
        $html->texto = "Tarifas";
        $html->inicializaHTML();

        $url = "https://apise.way2.com.br/v1/agentes?apikey=" . $apikey;

        $client = new GuzzleHttp\Client();

        try {
            $dados = $client->get($url);                                    
        } catch (GuzzleHttp\Exception\ClientException $e) {
            exit;
        }                                    

        $dados_array = json_decode($dados->getBody()->getContents(),true); 

        //echo "<pre>";
        //print_r($dados_array);

        $anoinicial = obtemAno()-5;
        $anofinal = obtemAno();

        $anos = array();
        for ($i = $anoinicial; $i <= $anofinal; $i++) {
            $anos[] = $i;
        }

        echo '
            <div class="row" id="conteudo">
                <div class="col-12">
                    <h1 class="d-inline">Tarifas</h1>
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
        echo " id='form_tarifas'";
        echo " name='form_tarifas'";
        echo " action='tarifas.php'";     
        echo " enctype='multipart/form-data'";      
        echo " method='post'";
        echo " target='_self'";    
        echo ">";       

        // select_concessionaria
        echo '<div class="form-group">';
        echo '<label for="select_concessionaria"><span class="preto">Concessionária</span></label>';
        echo '<select class="form-control" id="select_concessionaria" name="select_concessionaria">';
        foreach ($dados_array as $chave => $valor) {
            echo '<option value="' . $valor["nome"] . '">' . $valor["nome"] . '</option>';
        }
        echo '</select>';
        echo '</div>';

        // select_ano
        echo '<div class="form-group">';
        echo '<label for="select_ano"><span class="preto">Ano</span></label>';
        echo '<select class="form-control" id="select_ano" name="select_ano">';
        foreach ($anos as $chave => $valor) {
            echo '<option value="';
            echo $valor;
            echo '"';
            if ($valor==obtemAno()-1){
                echo ' selected';
            }
            echo '>';
            echo $valor;
            echo '</option>';
        }
        echo '</select>';
        echo '</div>';

        echo '<button type="submit" class="btn mb-1 btn-primary">Obter Tarifas</button>';

        echo "</form>";

        echo '
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ';

    }

?>