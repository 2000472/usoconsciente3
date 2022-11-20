<?php

    include_once("config.php");
    require_once("classes/html.class.php");
    require_once("funcoes/funcoes.php");

    $select_aparelho = "";
    $input_potencia = "";
    $input_horas = "";
    $input_dias = "";
    $select_calcularvalor = "";
    $input_valor = "";
    
    if (isset($_POST["select_aparelho"])){
        $select_aparelho = $_POST["select_aparelho"];
    }
    if (isset($_POST["input_potencia"])){
        $input_potencia = $_POST["input_potencia"];
    }
    if (isset($_POST["input_horas"])){
        $input_horas = $_POST["input_horas"];
    }
    if (isset($_POST["input_dias"])){
        $input_dias = $_POST["input_dias"];
    }
    if (isset($_POST["select_calcularvalor"])){
        $select_calcularvalor = $_POST["select_calcularvalor"];
    }
    if (isset($_POST["input_valor"])){
        $input_valor = $_POST["input_valor"];
    }

    $aparelho_get = "";
    if (isset($_GET["aparelho"])){
        $aparelho_get = $_GET["aparelho"];
    }    

    if (!empty($select_aparelho)){

        //echo "<br>" . $select_aparelho;

        // html
        $html = new HTML();
        $html->link = "calculadora.php";
        $html->texto = "Calculadora de Consumo";
        $html->javacript = "calculadora.js";
        $html->inicializaHTML();

        $aparelho = "";
        $watts = "";
        $consumo = "";

        if ($select_aparelho=="Outro"){
            $aparelho = $select_aparelho;
        } else {
            $aparelho_array = explode("(", $select_aparelho);
            $aparelho = substr($aparelho_array[0], 0, -1);
            //$aparelho = $aparelho_array[0];
        }

        if ($select_aparelho=="Outro"){
            $watts = $input_potencia;
        } else {
            $watts_array = explode("(", $select_aparelho);
            $watts = substr($watts_array[1], 0, -2);
            $watts = str_replace(".","",$watts);
        }

        $consumo = ($watts * $input_horas * $input_dias) / 1000;

        if ($select_calcularvalor=="Sim"){
            $valormes = $consumo*$input_valor;
            $valordia = $valormes/30;
        }

        echo '
            <div class="row" id="conteudo">
                <div class="col-12">
                    <h1 class="d-inline">Calculadora de Consumo</h1>
                    <p class="text-muted"></p>
        ';

        echo '
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
        ';

        echo '
                                    <div class="table-responsive">

                                        <table id="tabela" class="table table-bordered zero-configuration">

                                            <tbody>
        ';


        // aparelho
        echo "<tr>";
        echo "<td><b>";                
        echo "<span class='preto'>Aparelho</span>";
        echo "</b></td>";               

        echo "<td><span class='preto'>";                
        echo $aparelho;
        echo "</span></td>";               
        echo "</tr>";

        // potência
        echo "<tr>";
        echo "<td><b>";                
        echo "<span class='preto'>Potência do Aparelho</span>";
        echo "</b></td>";               

        echo "<td><span class='preto'>";                
        echo adequaQuantidadeAmericanoBrasileiro($watts,true);
        echo "W";
        echo "</span></td>";               
        echo "</tr>";

        // horas de uso por dia
        echo "<tr>";
        echo "<td><b>";                
        echo "<span class='preto'>Horas de Uso Por Dia</span>";
        echo "</b></td>";               

        echo "<td><span class='preto'>";                
        echo $input_horas;
        echo " hora(s)";
        echo "</span></td>";               
        echo "</tr>";

        // dias de uso
        echo "<tr>";
        echo "<td><b>";                
        echo "<span class='preto'>Dias de Uso</span>";
        echo "</b></td>";               

        echo "<td><span class='preto'>";                
        echo $input_dias;
        echo " dia(s)";
        echo "</span></td>";               
        echo "</tr>";

        // consumo
        echo "<tr>";
        echo "<td><b>";                
        echo "<span class='preto'>Consumo</span>";
        echo "</b></td>";               

        echo "<td><span class='preto'>";                
        echo $consumo;
        echo " kWh";
        echo "</span></td>";               
        echo "</tr>";

        if ($select_calcularvalor=="Sim"){

            // tarifa
            echo "<tr>";
            echo "<td><b>";                
            echo "<span class='preto'>Tarifa</span>";
            echo "</b></td>";               

            echo "<td><span class='preto'>";                
            echo adequaPrecoUnitarioAmericanoBrasileiro($input_valor,true);
            echo "</span></td>";               
            echo "</tr>";

            // valor ao mês
            echo "<tr>";
            echo "<td><b>";                
            echo "<span class='preto'>Valor ao Mês</span>";
            echo "</b></td>";               

            echo "<td><span class='preto'>";                
            echo adequaValorAmericanoBrasileiro($valormes,true);
            echo "</span></td>";               
            echo "</tr>";

            // valor ao dia
            echo "<tr>";
            echo "<td><b>";                
            echo "<span class='preto'>Valor ao Dia</span>";
            echo "</b></td>";               

            echo "<td><span class='preto'>";                
            echo adequaValorAmericanoBrasileiro($valordia,true);
            echo "</span></td>";               
            echo "</tr>";
        }

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
                </div>
            </div>
        ';


        /*

        echo "<br>" . $watts;
        */


    } else {

        // html
        $html = new HTML();
        $html->link = "calculadora.php";
        $html->texto = "Calculadora de Consumo";
        $html->javacript = "calculadora.js";
        $html->inicializaHTML();

        echo '
            <div class="row" id="conteudo">
                <div class="col-12">
                    <h1 class="d-inline">Calculadora de Consumo</h1>
                    <p class="text-muted"></p>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
        ';
                                    
        echo "<form";
        echo " id='form_calculadora'";
        echo " name='form_calculadora'";
        echo " action='calculadora.php'";     
        echo " enctype='multipart/form-data'";      
        echo " method='post'";
        echo " target='_self'";    
        echo ">";       

        // select_aparelho
        echo '<div class="form-group">';
        echo '<label for="select_aparelho"><span class="preto">Aparelho</span></label>';
        echo '<select class="form-control" id="select_aparelho" name="select_aparelho">';

        $host = "localhost";
        $dbname = "u846090108_usoconsciente";
        $user = "u846090108_usoconsciente";
        $senha = "Pi202201";

        try{
            $pdo = new PDO( 'mysql:host=' . $host . ';dbname=' . $dbname, $user, $senha);
        } catch ( PDOException $e ){
            echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
        }
        
        $sql = "select * from potencias";
        $sql .= " order by aparelho";
        $result = $pdo->query($sql);
        $rows = $result->fetchAll();

        foreach ($rows as $coluna){
            echo '<option value="' . $coluna["aparelho"] . ' (' . adequaQuantidadeAmericanoBrasileiro($coluna["potencia"],true) . 'W)"';
            $aparelho = $coluna["aparelho"] . ' (' . adequaQuantidadeAmericanoBrasileiro($coluna["potencia"],true) . 'W)';
            if ($aparelho_get==$aparelho){
                echo " selected";
            }
            echo '>' . $coluna["aparelho"] . ' (' . adequaQuantidadeAmericanoBrasileiro($coluna["potencia"],true) . 'W)</option>';
        }
        echo '<option value="Outro">Outro</option>';
        echo '</select>';
        echo '</div>';

        // input_potencia
        echo '<div id="div_potencia" class="form-group">';
        echo '<label for="input_potencia"><span class="preto">Potência do Aparelho (Watts)</span></label>';
        echo '<input class="form-control form-control-sm" type="number" min="0.1" step="any" id="input_potencia" name="input_potencia" value="" required>';
        echo '</div>';

        // input_horas
        echo '<div class="form-group">';
        echo '<label  for="input_horas"><span class="preto">Horas de Uso Por Dia</span></label>';
        echo '<input class="form-control form-control-sm" type="number" min="0.1" step="any" id="input_horas" name="input_horas" value="8" required>';
        echo '</div>';

        // input_dias
        echo '<div class="form-group">';
        echo '<label for="input_dias"><span class="preto">Dias de Uso</span></label>';
        echo '<input class="form-control form-control-sm" type="number" min="1" max="31" id="input_dias" name="input_dias" value="30" required>';
        echo '</div>';

        // select_calcularvalor
        echo '<div class="form-group">';
        echo '<label  for="select_calcularvalor"><span class="preto">Calcular Valor?</span></label>';
        echo '<select class="form-control" id="select_calcularvalor" name="select_calcularvalor">';
        echo '<option value="Não">Não</option>';
        echo '<option value="Sim">Sim</option>';
        echo '</select>';
        echo '</div>';

        // input_valor
        echo '<div id="div_valor" class="form-group">';
        echo '<label  for="input_valor"><span class="preto">Tarifa (R$)</span></label>';
        echo '<input class="form-control form-control-sm" type="number" min="0.1" step="any" id="input_valor" name="input_valor" value="0.85" required>';
        echo '</div>';

        echo '<button type="submit" class="btn mb-1 btn-primary">Calcular</button>';

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