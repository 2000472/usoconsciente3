<?php

    ob_start();     

    // protege arquivo
    $mystring = $_SERVER["PHP_SELF"];
    $findme   = basename(__FILE__);
    $pos = strpos($mystring, $findme);
    if ($pos === false) {
    } else {
        header("Location: ../index.php");
        exit;
    }	

    class HTML {
	
		public $link = "";
		public $texto = "";
		public $javacript = "";
		
		function __destruct() {

			echo '

				            </div>
				        </div>

				        <div class="footer">
				            <div class="copyright">
				                <p><span class="dark">Copyright &copy; 2022 - Desenvolvido Pelos Alunos da Turma 001 Grupo 014 do Projeto Integrador 3</span></p>
				            </div>
				        </div>
				    </div>

				    <script src="plugins/common/common.min.js"></script>
				    <script src="js/custom.min.js"></script>
				    <script src="js/settings.js"></script>
				    <script src="js/gleek.js"></script>
				    <script src="js/styleSwitcher.js"></script>

				    <script src="./plugins/tables/js/jquery.dataTables.min.js"></script>
				    <script src="./plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
			';

			if (!empty($this->javacript)){
				echo '<script src="' . $this->javacript . '"></script>';
			}

			echo '
				</body>

				</html>
			';

		} // __destruct

		public function inicializaHTML(){
	
			echo '<!DOCTYPE html>
				<html lang="pt-BR">

				<head>
				    <meta charset="utf-8">
				    <meta http-equiv="X-UA-Compatible" content="IE=edge">
				    <meta name="viewport" content="width=device-width,initial-scale=1">
				    <title>Uso Consciente de Energia Elétrica</title>
				    <link rel="icon" type="image/png" sizes="16x16" href="images2/energy32px.png">
				    <link href="css/style.css" rel="stylesheet">
					<link href="classes/html.class.css" rel="stylesheet" type="text/css">						
				</head>

				<body>

				    <div id="preloader">
				        <div class="loader">
				            <svg class="circular" viewBox="25 25 50 50">
				                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
				            </svg>
				        </div>
				    </div>

				    <div id="main-wrapper">

				        <div class="nav-header">
				            <div class="brand-logo">
				                <a href="#conteudo">
				                    <b class="logo-abbr"><img src="images2/energy48px.png" alt="Imagem de um raio. Logotipo do projeto"> </b>
				                    <span class="logo-compact"><img src="images2/energy48px.png" alt="Imagem de um raio. Logotipo do projeto"></span>
				                    <span class="brand-title">
				                        <img src="images2/energy32px.png" alt="Imagem de um raio. Logotipo do projeto">
				                        <img src="images2/logo-texto.png" alt="Logotipo do projeto">
				                    </span>
				                </a>
				            </div>
				        </div>

				        <div class="header">    
				            <div class="header-content clearfix">
				                
				                <div class="nav-control">
				                    <div class="hamburger">
				                        <span class="toggle-icon"><i class="icon-menu"></i></span>
				                    </div>
				                </div>

				                <div class="header-left">
				                </div>
				                <div class="header-right">
				                    <ul class="clearfix">
				                        <li class="icons dropdown">
				                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
				                                <span class="dark"><b>Projeto Integrador</b></span>
				                                <img src="images2/univesp.png" height="40" width="40" alt="Logotipo da Univesp">
				                            </div>
				                            <div class="drop-down dropdown-profile   dropdown-menu">
				                                <div class="dropdown-content-body">
				                                    <ul>
				                                        <li>
				                                            <a href="https://univesp.br/" target="blank_"><i class="icon-globe"></i> <span>Univesp</span></a>
				                                        </li>
				                                        <li>
				                                            <a href="https://apps.univesp.br/o-que-e-projeto-integrador/" target="blank_"><i class="icon-people"></i> <span>Projeto Integrador</span></a>
				                                        </li>
				                                    </ul>
				                                </div>
				                            </div>
				                        </li>
				                    </ul>

				                </div>
				            </div>
				        </div>

				        <div class="nk-sidebar">           
				            <div class="nk-nav-scroll">
				                <ul class="metismenu" id="menu">
				                    <li>
				                        <a href="index.php" aria-expanded="false">
				                            <i class="icon-home menu-icon"></i><span class="nav-text">Principal</span>
				                        </a>
				                    </li>
				                    <li>
				                        <a href="bandeiras.php" aria-expanded="false">
				                            <i class="icon-flag menu-icon"></i><span class="nav-text">Bandeiras Tarifárias</span>
				                        </a>
				                    </li>
				                    <li>
				                        <a href="calculadora.php" aria-expanded="false">
				                            <i class="icon-calculator menu-icon"></i><span class="nav-text">Calculadora de Consumo</span>
				                        </a>
				                    </li>
				                    <li>
				                        <a href="dicas2.php" aria-expanded="false">
				                            <i class="icon-bulb menu-icon"></i><span class="nav-text">Dicas de Economia</span>
				                        </a>
				                    </li>
				                    <li>
				                        <a href="potencias.php" aria-expanded="false">
				                            <i class="fa fa-bolt menu-icon"></i><span class="nav-text">Potência de Aparelhos</span>
				                        </a>
				                    </li>
				                    <li>
				                        <a href="tarifas.php" aria-expanded="false">
				                            <i class="icon-wallet menu-icon"></i><span class="nav-text">Tarifas</span>
				                        </a>
				                    </li>

				                    <li>
				                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
				                            <i class="fa fa-cloud menu-icon"></i><span class="nav-text">Nossas APIs</span>
				                        </a>
				                        <ul aria-expanded="false">
				                            <li><a href="nossasapis_obterdicas.php" aria-expanded="false">Obter Dicas</a></li>
				                        </ul>
				                        <ul aria-expanded="false">
				                            <li><a href="nossasapis_obterpotencias.php" aria-expanded="false">Obter Potências</a></li>
				                        </ul>
				                    </li>                
				                    <li>
				                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
				                            <i class="icon-globe menu-icon"></i><span class="nav-text">Sites Sugeridos</span>
				                        </a>
				                        <ul aria-expanded="false">
				                            <li><a href="https://www.gov.br/aneel/pt-br" target="blank_" aria-expanded="false">Aneel</a></li>
				                            <li><a href="https://www.way2.com.br/especiais/api-setor-eletrico" target="blank_" aria-expanded="false">API do Setor Elétrico</a></li>
				                            <li><a href="http://www.procelinfo.com.br/" target="blank_" aria-expanded="false">Procel</a></li>
				                        </ul>
				                    </li>                
				                </ul>
				            </div>
				        </div>

				        <div class="content-body">

				            <div class="row page-titles mx-0">
				                <div class="col p-md-0">
				                    <ol class="breadcrumb">
				                        <li class="breadcrumb-item"><a href="index.php">Principal</a></li>';


			if (!empty($this->link) && !empty($this->texto)){
				echo '<li class="breadcrumb-item"><a href="';
				echo $this->link;
				echo '">';
				echo $this->texto;
				echo '</a></li>';
			}

			echo '
				                    </ol>
				                </div>
				            </div>

				            <div class="container-fluid">
				                
			';
			
		} // inicializaHTML		
   
    }  // HTML
    
?>