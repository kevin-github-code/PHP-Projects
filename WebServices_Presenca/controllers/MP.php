<?php
// require_once '../controllers/AdministradorCtrl.php';
require_once '../models/presencaDAO.php';
require_once '../models/sessaoDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$dados = json_decode($_POST["dados"]); 

	$new_list = new Presenca();
	$resposta = new stdClass();
	$token = $_COOKIE["tpwSSID"];
	$seValido = true;
	$sessao = new SessaoDAO();
	
	$compararSession = $sessao->selecionarSessao($token, $seValido);
	$id = $compararSession->administrador_id;
	$data = date('Y-m-d H:i:s');
	$presente=$new_list->marcarPresenca($id,$dados->pres_estudanteId,$dados->pres_listaId,$data);
	$resposta->seCriado = $presente;
	header('Content-type:application/json');
	echo json_encode($resposta);
}

?>