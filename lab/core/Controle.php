<?php

class Controle {

	public function pagina($nomePagina, $dadosPagina = array()){
		extract($dadosPagina);
		include 'view/'.$nomePagina.'.php';
	}

	public function loadTemplate($nomePagina, $dadosPagina = array()){
		include 'view/template.php';
	}

	public function loadViewInTemplate($nomePagina, $dadosPagina = array()){
		extract($dadosPagina);
		include 'view/'.$nomePagina.'.php';
	}
}

?>