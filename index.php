<?php
require_once("./includes/ProjectInfo.class.php");
require_once("./includes/Database.class.php");
$project = new ProjectInfo;
/**
 *
 * routeFinder: define a rota da aplicação
 *
 * @param    string  $baseUrl path da pasta da aplicacao
 * @return   array   nome da seção e path para include
 *
 */
function routeFinder($baseUrl = ''){
    //conexão com o banco de dados
    try {
        $database = new Database;
    } catch (Exception $exc) {
        die($exc->getTraceAsString());
    }
	
	//rotas do sistema
	$rotas =[
		"index.php"=>"index",
		"index"=>"index",
		"contato"=>"contato",
		"empresa"=>"empresa",
		"produtos"=>"produtos",
		"servicos"=>"servicos",
		"buscar"=>"buscar"
	];
	$rota = parse_url("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	//tratamento de baseurl
    $posBaseUrl = strpos($rota['path'], $baseUrl);
	if($posBaseUrl){
		$pageRequest = (String)substr(trim($rota['path'],"/"), $posBaseUrl + strlen($baseUrl));

	}else{
		$pageRequest = (String)trim($rota['path'],"/");
	}
    //busca do conteudo do arquuivo: esta misto entre arquivos fisicos(404 e contato) e conteudo guardado em banco.
	if ($pageRequest){
		$pageRequest= explode("/", $pageRequest);
        $pagina='';
        if (isset($rotas[$pageRequest[0]])){
            $pagina = $rotas[$pageRequest[0]];
        }else{
            $pagina ='404';
        }
        $conteudo = $database->getPage($pagina);
		if($conteudo){
            return ['name'=> $pagina, 'content' => $conteudo['content']];
		}elseif (realpath(dirname(__FILE__) . '/includes/pages/'.$pagina.'.inc.php')){
            $conteudo = include(dirname(__FILE__) . '/includes/pages/'.$pagina.'.inc.php');
            return ['name'=> $pagina, 'content' => $conteudo];
		}else{
			header("HTTP/1.0 404 Not Found");
			return ['name'=> "404", 'content' => include(dirname(__FILE__) . '/includes/pages/404.inc.php')];
		}
	}else{
        $conteudo = $database->getPage('index');
        if($conteudo){
            return ['name'=> "index", 'content' => $conteudo['content']];;
        }else{
            return ['name'=> "index", 'content' => include(dirname(__FILE__) . '/includes/pages/404.inc.php')];;
        }
		
	}
	
}
$section = routeFinder(basename(__DIR__));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $project->getName() . " [" . $project->getVersion() . "]" ;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<!--
	<link href="css/style.css" rel="stylesheet">
	-->	

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!--
	<script type="text/javascript" src="js/scripts.js"></script>
	-->
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-2 column">
			<img class="img-rounded" alt="ssp_logo" src="img/logo_140x50.png">
		</div>
		<div class="col-md-10 column">
			<nav class="navbar navbar-default" role="navigation">
				
				<ul class="nav navbar-nav">
					<li class="<?php echo ($section['name']=='index')?'active':''?>">
						<a href="./">Home</a>
					</li>
					<li class="<?php echo ($section['name']=='empresa')?'active':''?>">
						<a href="./empresa">Empresa</a>
					</li>
					<li class="<?php echo ($section['name']=='produtos')?'active':''?>">
						<a href="./produtos">Produtos</a>
					</li>
					<li class="<?php echo ($section['name']=='servicos')?'active':''?>">
						<a href="./servicos">Serviços</a>
					</li>
					<li class="<?php echo ($section['name']=='contato')?'active':''?>">
						<a href="./contato">Contato</a>
					</li>
				
				
				</ul>
                <form action="buscar" method="get" class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input name="needle" class="form-control" type="text">
                    </div> <button type="submit" class="btn btn-default">Buscar</button>
                </form>				
			</nav>
		</div>
	</div>
<?php echo ($section['content']);?>
	<div class="row clearfix">
		<div class="col-md-12 column">

			<h5 class="">
				Todos os direitos reservados <?php echo date("Y"); ?>.
			</h5>

		</div>
	</div>	
</div>
</body>
</html>
