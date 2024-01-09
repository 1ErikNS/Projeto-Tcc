<?php
/*
classe para realizar reserva dos laboratorio
*/
class Reserva extends Conexao{
	// Declaração dos atributos:
	private $data;
	private $laboratorio;
	private $professor;
	private $status;

	// Implementação dos GETs e SETs:
	public function setData($data){
		$this->data = $data;
	}
	public function getData(){
		return $this->data;
	}

	public function setLab($laboratorio){
		$this->laboratorio = $laboratorio;
	}
	public function getLab(){
		return $this->laboratorio;
	}

	public function setProf($professor){
		$this->professor = $professor;
	}
	public function getProf(){
		return $this->professor;
	}

	public function setStatus($status){
		$this->status = $status;
	}
	public function getStatus(){
		return $this->status;
	}

	// Implementação das funções CRUD:
	public function cadastrar(){
		try{
			$sql = "INSERT INTO reservas(laboratorio,usuario,data,status) VALUES(:laboratorio,:usuario,:data,:status)";
			$prep = Conexao::getInstance()->prepare($sql);
	 
	        $prep->bindValue(":data", $this->getData());
	        $prep->bindValue(":laboratorio", $this->getLab());
	        $prep->bindValue(":usuario", $this->getProf());
	        $prep->bindValue(":status", $this->getStatus());
	 		$prep->execute();
			return 0;
        } catch (Exception $erro) {
        	return -1;
        }
	}

	public function editar($id) {
        try {
            $sql = "UPDATE reservas set status = :status WHERE id = :id";
 
            $prep = Conexao::getInstance()->prepare($sql);
 
            $prep->bindValue(":status", $this->getStatus());
            $prep->bindValue(":id", $id);
            $prep->execute();
            
        } catch (Exception $erro) {
        	echo "".Utilidades::mensagemErro("Erro técnico.");
	 		exit();
        }
    }

	public function excluir($chave){
		try {
            $sql = "DELETE FROM reservas WHERE data= :data";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":data", $chave);
            $prep->execute();
            
        } catch (Exception $erro) {
        	echo "".Utilidades::mensagemErro("Erro técnico.");
	 		exit();
        }
	}

	// busca funcionario por reserva já existente:
	public function buscarData($data) {
        try {
            $sql = "SELECT * FROM reservas WHERE data = :data";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":data", $data);
            $prep->execute();
            $coluna = $prep->fetch(PDO::FETCH_ASSOC); 
            return $coluna['data'];
        } catch (Exception $erro) {
        }
    }

    public function getStatu($id){
		try {
			$status = "Pendente";
			$result = array();
			$sql = "SELECT * FROM reservas WHERE id = :id";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":id", $id);
            $prep->execute();
            $result = $prep->fetch(PDO::FETCH_ASSOC);
            if ($result['status'] == "#ffc107") {
            	$status = "Pendente";
            } elseif($result['status'] == "#198754") {
            	$status = "Aprovado";
            } else{
            	$status = "Cancelada";
            }
            return $status;
        } catch (Exception $erro) {
        }
	}

	public function listarReservaUsu($usuario){
		try {
			$result = array();
			$sql = "SELECT * FROM reservas WHERE professor = :usu";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":usu", $usuario);
            $prep->execute();
            $result = $prep->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $erro) {
        }
	}

	public function listar(){
		try {
			$result = array();
			$sql = "SELECT * FROM reservas";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->execute();
            $result = $prep->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $erro) {
        }
	}
	
}

?>