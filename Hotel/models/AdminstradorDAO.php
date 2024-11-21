<?php
 require_once '../database/DBConnection.php';

class AdministradorDAO{
	private $tabela='administrador';

	public function registarAdministradores($email,$nome, $senha){
		$sql = "SELECT into $this->tabela (email, nome, senha) values ( :email, :nome, :senha)";
		$statement=DBConnection::prepare($sql);
		$statement->bindParam(':email', $email);
        $statement->bindParam(':nome', $nome);
		$statement->bindParam(':senha', $senha);
		return $statement->execute();
	}
        
        public function selecionarUm($email,$senha) {
        $sql="SELECT id, email from $this->tabela where email=:email and senha=:senha";
        $statement= DBConnection::prepare($sql);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':senha',$senha);
        $statement->execute();
        return $statement->fetch();
        }
        
        public function remover($email){
		$sql="DELETE FROM $this->tabela WHERE email = :email";
		$statement=DBConnection::prepare($sql);
		$statement->bindParam(':email',$email);
		return $statement->execute();
        }
		public function selecionarTodos(){
			$sql="SELECT * FROM $this->tabela";
			$statement=DBConnection::prepare($sql);
			$statement->execute();
			return $statement->fetchAll();
		}
}
?>