<?php
require_once '../models/EstudanteDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	// The request is using the GET method
	$respostass = new stdClass();
	$est = new estudanteDAO();
	$verest = $est->selecionarTodos();
	echo json_encode($verest);
}