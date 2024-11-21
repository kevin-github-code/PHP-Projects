<?php
session_start();
require_once '../models/EstudanteDAO.php';
require_once '../models/turmaDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// The request is using the POST method
	$aluno = json_decode($_POST['dado']);
	$estudante = new estudanteDAO();
	$resposta = new stdClass();

	$estudantecriado = $estudante->registarEstudante($aluno->est_nome,
	$aluno->est_sobrenome, $aluno->est_sexo, $aluno->est_endereco,$aluno->est_turmaId);
	$resposta->seCriado = $estudantecriado;
	header('Content-type:application/json');
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
function registarEstudante($nome,$sobrenome, $sexo, $endereco,$turmaId){
	$estudante = new estudanteDAO();
	$estudante->registarEstudante($nome,$sobrenome, $sexo, $endereco,$turmaId);
}
?>