<?php
session_start();
require_once '../models/lista.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	// The request is using the GET method
	$listas = new listaDAO();
	$respostas = new stdClass();
	$verlistas = $listas->selecionarLista();
	echo json_encode($verlistas);
	// $respostas->seCriado=$verturmas;
}
	
?>