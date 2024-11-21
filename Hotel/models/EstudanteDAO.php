<?php
require_once '../database/DBConnection.php';

class estudanteDAO{

	private $tabela='estudante';

	public function registarEstudante($nome,$sobrenome, $sexo, $endereco,$turmaId){
		$sql = "insert into $this->tabela (nome, sobrenome, sexo, endereco,turma_id) values
                        ( :nome, :sobrenome,  :sexo, :endereco,:turmaId)";
		$statement=DBConnection::prepare($sql);
		$statement->bindParam(':nome', $nome);
		$statement->bindParam(':sobrenome', $sobrenome);
		$statement->bindParam(':sexo', $sexo);
		$statement->bindParam(':endereco', $endereco);
                $statement->bindParam(':turmaId',$turmaId);
		return $statement->execute();
	}
	
	public function selecionarTodos(){
		$sql = "select * from $this->tabela";
		$statement=DBConnection::prepare($sql);
		$statement->execute();
		return $statement->fetchAll();
	}
        
	public function selecionarUm($nome, $sobrenome){
		$sql = "select from $this->tabela where
		 nome=:nome and sobrenome=:sobrenome";
		 $statement=DBConnection::prepare($sql);
		 $statement->bindParam(':nome', $nome);
		$statement->bindParam(':sobrenome', $sobrenome); 
		 $statement->execute();
		 return $statement->fetch();
	}

	public function apagarEstudante($nome,$sobrenome){
		$sql = "delete from $this->tabela where nome=:nome
		 and sobrenome=:sobrenome";
		$statement=DBConnection::prepare($sql);
		$statement->bindParam(':nome', $nome);
		$statement->bindParam(':sobrenome', $sobrenome); 
		return $statement->execute();
	}

	public function actualizar($endereco, $nome, $sobrenome){
		$sql = "update $this->tabela set endereco=:endereco where 
                        nome=:nome and sobrenome=:sobrenome";
		$statement=DBConnection::prepare($sql);
                $statement->bindParam(':endereco', $endereco);
		$statement->bindParam(':nome', $nome);
		$statement->bindParam(':sobrenome', $sobrenome); 
		return $statement->execute();
	}
        public function listaEstudante(){
		$sql = "select * from ((estudante inner join turma on turma.id = estudante.turma_id) inner join administrador on administrador.id = presenca.administrador_id)";
		 $statement=DBConnection::prepare($sql);
		 $statement->execute();
		 return $statement->fetchAll();
        }
}
?>