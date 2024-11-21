<?php
	require_once '../database/DBConnection.php';

	class SessaoDAO {

		private $tabela = 'sessao';

		public function registarSessao($token, $seValido, $administradorId){
			$sql = "insert into $this->tabela (token, se_valido, administrador_id) values (:token, :seValido, :administradorId)";
			$statement = DBConnection::prepare($sql);
			$statement->bindParam(':token', $token);
			$statement->bindParam(':seValido', $seValido);
			$statement->bindParam(':administradorId', $administradorId);
			return $statement->execute();
		}

		public function selecionarSessao($token, $seValido){
		$sql = "select * from  $this->tabela where token=:token and se_valido=:seValido";
			$statement = DBConnection::prepare($sql);
			$statement->bindParam(':token', $token);
			$statement->bindParam(':seValido', $seValido);
			$statement->execute();
			return $statement->fetch();
		}
		public function sessao() {
            $sql="select * from $this->tabela inner join administrador on
                     administrador.id=sessao.administrador_id";
            $statement=DBConnection::prepare($sql);
            $statement->execute();
            return $statement->fetch();
        }

	}

?>