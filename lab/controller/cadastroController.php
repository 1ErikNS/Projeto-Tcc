<?php
class cadastroController extends Controle{

	public function index() {
        $dados = array();
        $this->pagina('cadastro', $dados);
    }

    public function salvar(){
    	if ((isset($_POST['nome']) && !empty($_POST['nome'])) &&
    		(isset($_POST['email']) && !empty($_POST['email'])) &&
			(isset($_POST['matricula']) && !empty($_POST['matricula'])) &&
    	(isset($_POST['senha']) && !empty($_POST['senha']))) {

    		$nome = addslashes($_POST['nome']);
    		$email = addslashes($_POST['email']);
			$matricula = addslashes($_POST['matricula']);
    		$senha = md5(addslashes($_POST['senha']));
    		$obj = new Usuario();
    		$retorno = $obj->inserir($nome,$email,$matricula,$senha);

    		if ($retorno==1) {
    			header('Location:'.BASE_URL.'cadastro?msg=1');
    		}else{
    			header('Location:'.BASE_URL.'cadastro?msg=2');
    		}
    	}else{
    		header('Location:'.BASE_URL.'cadastro?msg=3');
    	}
    }
}

?>