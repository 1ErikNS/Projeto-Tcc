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
  <meta property="og:image" content="<?php echo BASE_URL ?>assets/img/logo-lab.jpg">
  <meta property="og:image:type" content="image/jpeg">
  <meta property="og:image:width" content="256"> 
  <meta property="og:image:height" content="256">
  <meta property="og:url" content="https://pinklab.com.br/">
  <meta property="og:title" content="Tranca eletrônica IoT">
  <meta property="og:description" content="O Projeto de TCC para conclusão do curso de desenvolvimento de sistemas da ete garanhuns.">

  <title>Sisgerlab</title>

  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/sisgerlab.css">
  
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.js"></script>
  
</head>
<body>


<div class="container">
  <?php $this->loadViewInTemplate($nomePagina, $dadosPagina) ?>
</div>

</body>
</html>