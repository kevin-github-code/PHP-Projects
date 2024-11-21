<?php
require_once '../models/EstudanteDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$estudantes = new estudanteDAO();
	$respostas = new stdClass();
	$verests = $estudantes->selecionarTodos();
	// $respostas->seCriado=$verturmas;
	echo json_encode($verests);
}
?>