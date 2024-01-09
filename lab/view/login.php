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
  
<link rel="stylesheet" type="text/css" href  ="<?php echo BASE_URL ?>assets/css/stylelogin.css">
 <link rel="shortcut icon" href="pc.png" type="png">

</head>
<body>

<div class="titulo-principal"><strong>RESERVA PARA OS LABORATÓRIOS</strong></div>
	<div class="sub-titulo"style="margin-top: -15px;"><strong>ETE Ariano Vilar Suassuna</strong></div>
    <form action="login/acesso" id="form" class= "container" method= "post">
        <br> <br>
        <div style="margin-bottom: -50px;"></div>
        <h1> <img src="<?php echo BASE_URL ?>assets/img/logo-lab.jpg" width="195" alt=""></h1>
        <br>
        <div style="margin-bottom: -50px;"></div>
        <input autocomplete="off" id="email" name="email" type="email" type="number" placeholder="ㅤEmail">
        <input autocomplete="off" id="password" name="senha" type="password" placeholder="ㅤSenha">
        <div style="margin-bottom: -50px;"></div>
        <button type="submit">LOGIN</button>
        <div class="texto-extra"><strong>AINDA NÃO É CADASTRADO?</strong></div>
        <div style="margin-bottom: 50px;"></div>

        <form action="cadastro" method="post">
          <div class="button-wrapper">
            <button type="submit" id="cadastre-se">cadastre-se</button>
          </div>
        </form> 

    </form>

</body>


</html>
