<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8"/>
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL ?>favicon.ico"/>
  <meta name="description" content="O Projeto de TCC para conclusão do curso de desenvolvimento de sistemas da ete garanhuns."/>
  <meta name="Keywords" content="x,y,z"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
  <meta id="viewport" name="viewport" content="width=device-width, user-scalable=no"/>

  <meta name="robots" content="index,follow"/>
  <meta name="author" content="Pinklab"/>

  <meta property="og:type" content="website">
  <meta property="og:locale" content="pt_BR">
  <meta property="og:site_name" content="pinklab">
  <meta property="og:image" content="<?php echo BASE_URL ?>assets/img/logotipo.jpg">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="256"> 
  <meta property="og:image:height" content="256">
  <meta property="og:url" content="https://pinklab.com.br/">
  <meta property="og:title" content="Tranca eletrônica IoT">
  <meta property="og:description" content="O Projeto de TCC para conclusão do curso de desenvolvimento de sistemas da ete garanhuns.">

  <title>Pinklab</title>

 <link rel="stylesheet" type="text/css" href  ="<?php echo BASE_URL ?>assets/css/stylecadastro.css">
 <link rel="shortcut icon" href="pc.png" type="png">

</head>
<body>
  <?php
  if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
    if($msg==='1'){
      echo "<div class='sub-titulo'><strong>SALVO COM SUCESSO!</strong>
      <a href='cadastro' class='sub-titulo'>Ok</a>
      </div>";
    }else if($msg==='2'){
      echo "<div class='sub-titulo'><strong>Houve um erro!</strong>
      <a href='cadastro' class='sub-titulo'>Ok</a>
      </div>";
    }else if($msg==='3'){
      echo "<div class='sub-titulo'><strong>Preencha todos os campos!</strong>
      <a href='cadastro' class='sub-titulo'>Ok</a>
      </div>";
    }
  }
  ?>

  <div class="titulo-principal"><strong>RESERVA PARA OS LABORATÓRIOS</strong></div>

  <div class="sub-titulo"style="margin-top: -15px;"><strong>ETE Ariano Vilar Suassuna</strong></div>

    <form action="cadastro/salvar" id="form" class= "container" method= "post">
      
        <h1> <img src="<?php echo BASE_URL ?>assets/img/logo-lab.jpg" width="195" alt=""></h1>

        <input autocomplete="off" id="text" name="nome" type="text" placeholder="ㅤNome completo">

        <input autocomplete="off" id="email" name="email" type="email" placeholder="ㅤEmail">

        <input autocomplete="off" id="number" name="matricula" type="number" placeholder="ㅤMatrícula">

        <input autocomplete="off" id="password" name="senha" type="password" placeholder="ㅤSenha" >

        <button type="submit">CONCLUIR</button>
        <div class="button-wrapper">
            <a href="login" id="login">LOGIN</a>
          </div>   
    </form>

</body>


</html>
