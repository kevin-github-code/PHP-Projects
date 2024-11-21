<?php
require_once '../models/AdminstradorDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	// The request is using the GET method
	$admins = new AdministradorDAO();
	$respostas = new stdClass();
	$veradminis = $admins->selecionarTodos();
	echo json_encode($veradminis);
}

?>