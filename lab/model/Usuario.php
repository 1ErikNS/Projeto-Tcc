<?php
/*
Class Teste Modelo
*/
class Usuario extends Conexao{

	/*
	Função Cadastrar ou insert
	*/
	public function inserir($nome, $email, $matricula, $senha){
		try{
			$sql = "INSERT INTO usuarios (nome, email, matricula, senha) VALUES(:nome, :email, :matricula, :senha)";
			$prep = Conexao::getInstance()->prepare($sql);
	 
	        $prep->bindValue(":nome", $nome);
	        $prep->bindValue(":email", $email);
			$prep->bindValue(":matricula", $matricula);
	        $prep->bindValue(":senha", $senha);
	 		return $prep->execute();

        } catch (Exception $erro) {
			return -1;
        }
	}

	/*
	Função Atualizar ou update
	*/
	public function update($id, $nome, $email, $matricula, $senha){
		try{
			$sql = "UPDATE usuarios SET nome = :nome, email = :email, matricula = :matricula, senha = :senha WHERE id = :id";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":nome", $nome);
            $prep->bindValue(":email", $email);
			$prep->bindValue(":matricula", $matricula);
            $prep->bindValue(":senha", $senha);
            
            $prep->bindValue(":id", $id);
            $prep->execute();
            return true;
            
		}catch(Exception $erro){
			return -1;
		}
	}

	/*
	Função Atualizar único valor
	*/
	public function updateStatus($id){
		$dados = $this->getDadoId($id);
		$status = "";
		if ($dados['status']=='On') {
			$status = 'Off';
		}else{
			$status = 'On';
		}
		try{
			$sql = "UPDATE usuarios SET status = :status WHERE id = :id";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":status", $status);
            $prep->bindValue(":id", $id);
            $prep->execute();
            return true;
            
		}catch(Exception $erro){
			return -1;
		}
	}

	//Verificar se o objeto já existe
	public function existe($codigo){
		try {
			$sql = "SELECT * FROM usuarios WHERE email = :cod";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":cod", $codigo);
            $prep->execute();
            if ($prep->rowCount() > 0) {
            	//Email existe
            	return true;
            }else{
            	//Email não existe
            	return false;
            }
        } catch (Exception $erro) {
        	return -1;
        }
	}

	//Busca de ID com base no e-mail
	public function getId($email){
		try {
			$sql = "SELECT * FROM usuarios WHERE email = :email";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":email", $email);
            $prep->execute();
            if ($prep->rowCount() > 0) {
            	$infor = $prep->fetch();
            	return $infor['id'];//retorna inteiro
            }else{
            	return 0;//não existe
            }
        } catch (Exception $erro) {
        	return -1;
        }
	}

	// buscar todos os elementos
	public function listar(){
		try {
			$dados = array();
			$sql = "SELECT * FROM usuarios";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->execute();
            $dados = $prep->fetchAll(PDO::FETCH_ASSOC);
            return $dados;
        } catch (Exception $erro) {
        	return -1;
        }
	}

	//buscar todos os dados com base em um único ID
	public function getDadoId($id){
		try {
			$dados = array();
			$sql = "SELECT * FROM usuarios WHERE id = :id";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":id", $id);
            $prep->execute();
            $dados = $prep->fetch(PDO::FETCH_ASSOC);
            return $dados;
        } catch (Exception $erro) {
        	return -1;
        }
	}

	//Quantidade de linhas sobre a tabela
	public function getQtd(){
		try{
			$dado = 0;
			$sql = "SELECT COUNT(*) AS qtd FROM objeto";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->execute();
            $dado = $prep->fetch(PDO::FETCH_ASSOC);
            if ($prep->rowCount() > 0) {
            	return $dado['qtd'];
            }else{
            	return 0;
            }

		}catch(Exception $erro){
			return -1;
		}
	}

	//Atualizar senha
	public function updatePassword($id, $senha){
		try{
			$sql = "UPDATE usuarios SET senha = :senha WHERE email = :email";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":email", $id);
            $prep->bindValue(":senha", $senha);
            return $prep->execute();
		}catch(Exception $erro){
			return -1;
		}
	}

	//Fazer login
	public function login($email,$senha){
		try {
			$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
            $prep = Conexao::getInstance()->prepare($sql);
            $prep->bindValue(":email", $email);
            $prep->bindValue(":senha", $senha);
            $prep->execute();
            if ($prep->rowCount() > 0) {
            	$infor = $prep->fetch();
            	return $infor;//retorna array
            }else{
            	return 0;//não existe
            }
        } catch (Exception $erro) {
        	return -1;
        }
	}



}//fim class
?>