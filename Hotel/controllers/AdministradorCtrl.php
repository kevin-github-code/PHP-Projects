<?php
session_start();
require_once '../models/AdminstradorDAO.php';
require_once '../models/sessaoDAO.php';

$sessaoId = "tpwSSID";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// The request is using the POST method
	$credenciais = json_decode($_POST['dados']);
	$AdministradorDao = new AdministradorDAO();
	$resposta = new stdClass();

	if ($credenciais->isAuth) {

		$resposta = verificarCredenciais($credenciais->senha, $credenciais->email);
	} else {
		$administradorcriado = $AdministradorDao->registarAdministradores(
		$credenciais->email,$credenciais->nome, $credenciais->senha);

		$resposta->seCriado = $administradorcriado;
	
		header('Content-type:application/json');	
		echo json_encode($resposta);
	}
	
	echo json_encode($resposta);
	
} else {
	$resposta = new stdClass();
	$resposta->autentica = verificarAutenticacao();
	echo json_encode($resposta);
}
function registarAdministradores( $email,$nome, $senha)
{
	$AdministradorDao = new AdministradorDAO();
	$AdministradorDao->registarAdministradores( $email,$nome, $senha);
}

function verificarCredenciais($senha, $email)
{

	$AdministradorDao = new AdministradorDAO();
	$AdministradorEncontrado = $AdministradorDao->selecionarUm($email, $senha);

	$respostaAutenticacao = new stdClass();
	$respostaAutenticacao->seAutenticado = false;

	if ($AdministradorEncontrado != null) {

		$sessao = new SessaoDAO();

		$token = uniqid("_ssid", true);
		$seValido = true;
		$AdministradorId = $AdministradorEncontrado->id;

		$sessaoCriada = $sessao->registarSessao($token, $seValido, $AdministradorId);

		if ($sessaoCriada == 1) {
			setcookie("tpwSSID", $token, time() + (86400 * 30), "/");
			$respostaAutenticacao->seAutenticado = true;
		}
	}

	return $respostaAutenticacao;
}

function verificarAutenticacao()
{

	print_r($_SESSION["uId"]);
	$seAutentica = false;

	if (isset($_COOKIE["tpwSSID"])) {

		$sessao = new SessaoDAO();
		$token = $_COOKIE["tpwSSID"];
		$seValido = true;

		$sessaoSelecionada = $sessao->selecionarSessao($token, $seValido);

		if ($sessaoSelecionada != null) {
			$_SESSION["uId"] = $sessaoSelecionada->administrador_id;
			$_SESSION["token"] = $sessaoSelecionada->token;
			$seAutentica = true;
		}
	}

	echo $token;
	return $seAutentica;
}

function gerarToken()
{
	return uniqid("_T", true);
}


?>