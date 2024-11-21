 <?php

 	require_once '../utils/webservices.php';

	$url = "https://jobs.dilla.co.mz/objects-iuo926np9c/wp/v2/";

 	$utils = new Utilitarios();
	$resposta = $utils->obterDados($url.'posts');
	
	$conteudo = json_decode($resposta);
	// header('Content-type:text/html');
	echo $resposta;

?>