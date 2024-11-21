<?php
require_once '../models/presencaDAO.php';
require_once 'estudanteDAO.php';

class Presenca{
	private $tabela='presenca';

	public function marcarPresenca($administradorId, $estudanteId, $listaId, $data){
		$sql = "insert into $this->tabela(administrador_id, estudante_id, lista_id, data)
                         values ( :administradorId, :estudanteId, :listaId, :data)";
		$statement=DBConnection::prepare($sql);
		$statement->bindParam(':administradorId', $administradorId);
		$statement->bindParam(':estudanteId', $estudanteId);
		$statement->bindParam(':listaId', $listaId);
                $statement->bindParam(':data',$data);
		return $statement->execute();
	}
	public function listaEstudante(){
		$sql = "select * from ((presenca inner join lista on lista.id = presenca.lista_id)
                         inner join administrador on administrador.id = presenca.administrador_id)";
		 $statement=DBConnection::prepare($sql);
		 $statement->execute();
		 return $statement->fetchAll();
	}
        public function todosEstudantes() {
            $sql = "select * from estudante";
		 $statement=DBConnection::prepare($sql);
		 $statement->execute();
		 return $statement->fetchAll();
        }
        public function todasListas() {
            $sql = "select * from lista";
		 $statement=DBConnection::prepare($sql);
		 $statement->execute();
		 return $statement->fetchAll();
        }
        public function todosAdmins() {
            $sql = "select * from administrador";
		 $statement=DBConnection::prepare($sql);
		 $statement->execute();
		 return $statement->fetchAll();
        }
		public function todasPresencas() {
            $sql = "select * from presenca";
		 $statement=DBConnection::prepare($sql);
		 $statement->execute();
		 return $statement->fetchAll();
        }
}
?>