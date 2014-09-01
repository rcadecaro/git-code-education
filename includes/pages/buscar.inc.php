<?php
require_once("./includes/Database.class.php");

if (isset($_GET["needle"])) {
	$needle = filter_var($_GET["needle"], FILTER_SANITIZE_STRING);

    //conexão com o banco de dados
    try {
        $database = new Database;
    } catch (Exception $exc) {
        die($exc->getTraceAsString());
    }
    $paginas = $database->searchPages($needle);

    if($paginas){
	$busca="<div class='row clearfix'>".
	"	<div class='col-md-12 column'>".
	"			<ol>";
	foreach($paginas as $pagina){
    $busca.="		<li>".
	"					<a href='./".$pagina['route']."'>".$pagina['name']."</a>".
	"				</li>";
	}
    $busca.="	</ol>".
	"	</div>".
	"</div>";
	}else{
        $busca="<div class='row clearfix'>".
        "	<div class='col-md-12 column'>".
        "			<ol>".
        "				<li>".
        "					Nenhum resultado encontrado".
        "				</li>".
        "			</ol>".
        "	</div>".
        "</div>";
    
    }
}else{
	$busca="<div class='row clearfix'>".
	"	<div class='col-md-12 column'>".
	"			<ul>".
	"				<li>".
	"					Por favor informe um parâmetro de busca.".
	"				</li>".
	"			</ul>".
	"	</div>".
	"</div>";
}
	

return $busca;    
?>