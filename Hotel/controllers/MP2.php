<?php
require_once '../models/presencaDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	// The request is using the GET method
	$presencas = new Presenca();
	// $respostas = new stdClass();
	$verpresencas =$presencas->todasPresencas();
	// $respostas->seCriado=$verturmas;
	echo json_encode($verpresencas);
}

?>