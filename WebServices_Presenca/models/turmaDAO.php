<?php
require_once '../database/DBConnection.php';

class turma{
	private $tabela='turma';

	public function criarTurma($nome, $turno){
		$sql = "insert into $this->tabela ( nome, turno)
                         values ( :nome, :turno)";
		$statement=DBConnection::prepare($sql);
		$statement->bindParam(':nome', $nome);
		$statement->bindParam(':turno', $turno);
		return $statement->execute();
	} 
        public function apagarEstudante($nome){
		$sql = "delete from $this->tabela where nome=:nome";
		$statement=DBConnection::prepare($sql);
		$statement->bindParam(':nome', $nome);
		return $statement->execute();
	}
        public function selecionarTurmas() {
            $sql="select * from turma";
            $statement= DBConnection::prepare($sql);
            $statement->execute();
            return $statement->fetchAll();
        }
}
?>