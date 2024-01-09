<?php

class Utilidades {

  public static function isLogado(){
      if (!empty($_SESSION['id']) && !empty($_SESSION['nome'])) {
          return true;
      } else {
          return false;
      }
  }

  public static function mensagemOk($msn) {
    $dados = "";
    $dados = "<div class='alert alert-success'> <h4>".$msn."</h4> <a href='JavaScript: window.history.back();' class='btn btn-success'>Voltar</a> </div>";
    return $dados;
  }

public static function mensagemErro($msn) {
    $dados = "";
    $dados = "<div class='alert alert-danger'> <h4>".$msn."</h4> <a href='JavaScript: window.history.back();' class='btn btn-danger'>Voltar</a> </div>";
    return $dados;
  }

  public static function enviarEmail($assunto, $para, $mensagem){
    try {
      $cabecalho = "From: ".$para."\r\n".
          "Reply-To: da_empresa_x@gmail.com\r\n".
          "X-Mailer: ".phpversion();
      mail($para, $assunto, $mensagem, $cabecalho);
    } catch (Exception $e) {
    }
  }

}//fim class

?>