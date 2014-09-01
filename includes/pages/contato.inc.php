<?php
$nome = "";
$email = "";
$assunto =  "";
$mensagem = "";
$mensagemSist = "";
$send = "<button type='submit' class='btn btn-default'>Enviar</button>";	

if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["assunto"]) && isset($_POST["mensagem"])) {
	$nome = filter_var($_POST["nome"], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$assunto = filter_var($_POST["assunto"], FILTER_SANITIZE_STRING);
	$mensagem = filter_var(addslashes($_POST["mensagem"]), FILTER_SANITIZE_STRING);
    $send = "";
	$mensagemSist = "		<div class='alert alert-success alert-dismissable'>".
	"			 <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>".
	"			<h4>".
	"				Dados enviados com sucesso, abaixo seguem os dados que você enviou. Obrigado pela Mensagem! Em breve teremos novidades!".
	"			</h4>". 
	"		</div>";
	
}
	
$content= 	"<div class='row clearfix'>".
	"	<div class='col-md-12 column'>". $mensagemSist.		
	"		<form role='form' action='contato' method='post'>".
	"			<div class='form-group'>".
	"				 <label for='nome'>Nome</label><input autocomplete='off'class='form-control' name='nome' id='nome' type='text' value='".$nome."'>".
	"			</div>".
	"			<div class='form-group'>".
	"				 <label for='email'>Email</label><input autocomplete='off' class='form-control' name='email' id='email' type='email' value='".$email."'>".
	"			</div>".
	"			<div class='form-group'>".
	"				 <label for='assunto'>Assunto</label><input autocomplete='off' class='form-control' name='assunto' id='assunto' type='text' value='".$assunto."'>".
	"			</div>".
	"			<div class='form-group'>".
	"				 <label for='mensagem'>Mensagem</label><textarea autocomplete='off' class='form-control' name='mensagem' id='mensagem' rows='8'>".$mensagem."</textarea>".
	"			</div> ".$send.
	"		</form>".
	"	</div>".
	"</div>";
return $content;    
?>