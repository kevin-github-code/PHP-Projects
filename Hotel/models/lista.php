<?php
require_once '../database/DBConnection.php';

class listaDAO{
	private $tabela='lista';

	public function criarLista($nome){
		$sql = "insert into $this->tabela (nome) values (:nome)";
		$statement=DBConnection::prepare($sql);
		$statement->bindParam(':nome', $nome);
		return $statement->execute();
	}

        public function selecionarLista(){
		$sql = "select * from $this->tabela";
		$statement=DBConnection::prepare($sql);
		$statement->execute();
		return $statement->fetchAll();
	}
        
        public function removerLista($nome){
		$sql="DELETE FROM $this->tabela WHERE  nome=:nome";
		$statement=DBConnection::prepare($sql);
		$statement->bindParam(':nome',$nome);
		return $statement->execute();
        }
}
?>