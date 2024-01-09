<?php
/*
classe responsavel para cadastrar os laboratorios
*/

class Laboratorio extends Conexao{
	// Declaração dos atributos:
	private $nome;
	private $local;

	// Implementação dos GETs e SETs:
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}

	public function setLocal($local){
		$this->local = $local;
	}
	public function getLocal(){
		return $this->local;
	}

	// Implementação das funções CRUD:
	public function cadastrar(){
		try{
			$sql = "INSERT INTO laboratorios (nome, local) VALUES(:nome,:local)";
			$prep = Conexao::getInstance()->prepare($sql);
	        $prep->bindValue(":nome", $this->getNome());
	        $prep->bindValue(":local", $this->getLocal());
	 		$prep->execute();
	 		echo "".Utilidades::mensagemOK("Salvo!");
        } catch (Exception $erro) {
        	echo "".Utilidades::mensagemErro("Verifique se já existe esse laboratório!");
	 		exit();
        }
	}

	public function editar($id) {
        try {
            $sql = "UPDATE laboratorios set nome = :nome, local = :local WHERE id = :id";
 
            $prep = Conexao::getInstance()->prepare($sql);
 
            $prep->bindValue(":nome", $this->getNome());
            $prep->bindValue(":local", $this->getLocal());
            $prep->bindValue(":id", $id);
            $prep->execute();
            
        } catch (Exception $erro) {
        	echo "".Utilidades::mensagemErro("Lab existe pendência em reservas!");
	 		exit();
        }
    }

    public function excluir($id){
		try {
            $sql = "DELETE FROM laboratorios WHERE id= :id";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":id", $id);
            $prep->execute();
        } catch (Exception $erro) {
        	echo "".Utilidades::mensagemErro("Lab existe pendência em reservas!");
	 		exit();
        }
	}

	public function listarId($id){
		try {
			$result = array();
			$sql = "SELECT * FROM laboratorios WHERE id = :id";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":id", $id);
            $prep->execute();
            $result = $prep->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $erro) {
        }
	}

	public function listar(){
		try {
			$result = array();
			$sql = "SELECT * FROM laboratorios";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->execute();
            $result = $prep->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (Exception $erro) {
        }
	}

	// pega o nome do lab pelo codigo id
	public function getLab($id){
		try {
			$result = array();
			$sql = "SELECT nome, local FROM laboratorios WHERE id = $id";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->execute();
            $result = $prep->fetch(PDO::FETCH_ASSOC);
            return $result['nome']." - ".$result['local'];
        } catch (Exception $erro) {
        }
	}
	
}

?>