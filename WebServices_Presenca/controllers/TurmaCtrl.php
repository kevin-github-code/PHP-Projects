<?php
session_start();
require_once '../models/turmaDAO.php';
require_once '../models/lista.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// The request is using the POST method
	$credenciais = json_decode($_POST['dados']);
	$turma = new turma();
	$list = new listaDAO();
	$resposta = new stdClass();

	$turmacriada = $turma->criarTurma($credenciais->tur_nome, $credenciais->tur_turno);
	$listC = $list->criarLista($credenciais->tur_nome);

	$resposta->seCriado = $turmacriada;
	$resposta->seCriado = $listC;
	echo json_encode($resposta);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	// The request is using the GET method
	$turmas = new turma();
	$respostas = new stdClass();
	$verturmas = $turmas->selecionarTurmas();
	// $respostas->seCriado=$verturmas;
	echo json_encode($verturmas);
}


function criarTurma($nome, $turno)
{
	$turma = new turma();
	$turma->criarTurma($nome, $turno);
}
?>