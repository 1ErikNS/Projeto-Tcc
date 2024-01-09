<?php  

class calendarioController extends Controle {

	public function index(){
		$dados = array();
		$this->loadTemplate("calendario", $dados);
	}

	public function fazerReserva(){
		if(isset($_POST["txtProf"]) && !empty($_POST['txtProf']) && 
			isset($_POST["title"]) && !empty($_POST['title']) && 
			isset($_POST["start"]) && !empty($_POST['start'])){

			$prof = $_SESSION['id'];
			$labor = $_POST['title'];
			$startData = $_POST['start'];
			$status = "#ffc107"; // cor escolhida como padrao para reserva em analise

			//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
			$data = explode(" ", $startData);
			list($date, $hora) = $data;
			$data_sem_barra = array_reverse(explode("/", $date));
			$data_sem_barra = implode("-", $data_sem_barra);
			$dataBarra = $data_sem_barra . " " . $hora;

			$res = new Reserva();
			$res->setData($dataBarra." ".$labor);// permitir horarios iguais em locais diferente
			$res->setLab($labor);
			$res->setProf($prof);
			$res->setStatus($status);
			$saida = $res->cadastrar();
			if($saida==0){
				header("Location:".BASE_URL."calendario?msg=0");
			}else{
				header("Location:".BASE_URL."calendario?msg=-1");
			}
		}
	}
}
?>