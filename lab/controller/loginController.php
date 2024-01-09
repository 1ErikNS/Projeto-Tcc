<?php

class loginController extends Controle {

	function __construct(){
		if(Utilidades::isLogado()){
            header("Location: ".BASE_URL."calendario");
        }
        
	}

    public function index() {
        $dados = array();
        $this->pagina('login', $dados);
    }

    public function acesso(){
    	if ((isset($_POST['email']) && !empty($_POST['email'])) && isset($_POST['senha']) && !empty($_POST['senha'])) {
            $email = addslashes($_POST['email']);
            $senha = md5(addslashes($_POST['senha']));
            $obj = new Usuario();
            $retorno = $obj->login($email,$senha);
           
            if($retorno == 0){
                header('Location:'.BASE_URL.'calendario');
            }else if($retorno == -1){
                header('Location:'.BASE_URL.'calendario');
            }
            else{
                $_SESSION['id']=$retorno['matricula'];
                $_SESSION['nome']=$retorno['nome'];
                header('Location:'.BASE_URL.'calendario');
            }
        }
        else{
            header('Location:'.BASE_URL.'cadastro');
        }
    }

    function sair() {
        session_destroy();
        header('Location:'.BASE_URL);
    }

}
?>