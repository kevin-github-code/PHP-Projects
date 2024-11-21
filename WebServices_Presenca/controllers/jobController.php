 <?php

 	require_once '../utils/webservices.php';

	$url = "https://jobs.dilla.co.mz/objects-iuo926np9c/wp/v2/";
	$dadosJson = json_decode($_POST['dados']);
 	$utils = new Utilitarios();
	$resposta = $utils->obterDados($url.'posts/'.$dadosJson->jobId);
	echo $resposta;
	
?>