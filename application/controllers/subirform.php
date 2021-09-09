<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flota extends CI_Controller {

	public function __construct()
    {
        parent::__construct();        
        $this->load->model('Flota_Model', 'Flota');
        $this->load->library("form_validation");
    }

	public function index()
	{	
		$flotas = $this->Flota->toList();
		$data = array("flotas"=>$flotas);
		$this->load->view('inc_head');
		$this->load->view('inc_menu');
		$this->load->view('inc_flota',$data);
		$this->load->view('inc_footer');
	}
	public function crear(){
		$choferes = $this->Flota->obtener("chofer",false,false);
		$tipos = $this->Flota->obtener("tipo",false,false);
		$data = array("choferes"=>$choferes,"tipos"=>$tipos);
		$this->load->view('inc_head');
		$this->load->view('inc_menu');
		$this->load->view('bus/crear',$data);
		$this->load->view('inc_footer');
	}

	public function guardar(){
		$respuesta = array("exito"=>500,"mensaje"=>"Ocurrio un error!");
		$chofer = $this->input->post('chofer');
		$tipo = $this->input->post('tipo');
		$placa = $this->input->post('placa');
		$comodidad = $this->input->post('comodidad');
		$cantidad = $this->input->post('cantidad');
		$this->form_validation->set_rules('chofer', 'Chofer', 'required');
		$this->form_validation->set_rules('tipo', 'Tipo', 'required');
		$this->form_validation->set_rules('placa', 'Placa', 'required');
		$this->form_validation->set_rules('comodidad', 'Comodidad', 'required');
		$this->form_validation->set_rules('cantidad', 'Cantidad', 'required|numeric');
		//Verifica que el formulario esté validado.
		if ($this->form_validation->run() == TRUE){
			$id = $this->input->post('id');
			$datos = array(
				"chofer"=>$chofer,
				"tipo"=>$tipo,
				"placa"=>$placa,
				"comodidad"=>$comodidad,
				"cantidad"=>$cantidad
			);
			if($id>0){
				if($this->Flota->modificar("flota", $datos,array("id"=>$id))){
					$respuesta["exito"]=200;
					$respuesta["mensaje"]="Se modifico con exito";
				}
			}else{
				if($this->Flota->guardar("flota", $datos)){
					$respuesta["exito"]=200;
					$respuesta["mensaje"]="Se registro con exito";
				}
			}			
		}else{
			$errors = $this->form_validation->error_array();
			$respuesta["mensaje"]=implode("<br>",$errors);
		}
		echo json_encode($respuesta);
	}

	public function editar($id){
		$flota = $this->Flota->obtener("flota",array("id"=>$id));
		$choferes = $this->Flota->obtener("chofer",false,false);
		$tipos = $this->Flota->obtener("tipo",false,false);
		$data = array("choferes"=>$choferes,"tipos"=>$tipos,"flota"=>$flota);
		$this->load->view('inc_head');
		$this->load->view('inc_menu');
		$this->load->view('bus/editar',$data);
		$this->load->view('inc_footer');
	}
	public function eliminar(){
		$response = array(
			"exito"=>400
		);
		try {
			if($this->input->post('id') > 0)
			{
				$id=$this->input->post('id');
				$this->Flota->eliminar("flota",$id);	
				$response["exito"] = 200;
			}
		}catch (Exception $e) {

		}		 	
		echo json_encode($response);
	}
	public function subirimagen()
	{
		$data['idimagen']=$_POST['idimagen'];

		$this->load->view('inc_head.php');
		$this->load->view('subirform',$data);
		$this->load->view('inc_footer.php');
	}
}
