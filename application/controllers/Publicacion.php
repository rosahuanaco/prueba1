<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicacion extends CI_Controller {

	public function __construct()
    {
        parent::__construct();        
        $this->load->model('Publicacion_Model', 'Publicacion');
        $this->load->library("form_validation");
		$this->load->helper('util');
    }

	public function index()
	{
		$publicaciones = $this->Publicacion->toList();
		$data = array("publicaciones"=>$publicaciones);
		$this->load->view('inc_head');
		$this->load->view($this->session->userdata('menu'));
		$this->load->view('inc_principal',$data);
		$this->load->view('inc_footer');
	}
	public function crear(){
		$lugares = $this->Publicacion->obtener("lugar",false,false);
		$flotas = $this->Publicacion->obtener("flota",array("estado"=>"Activo"),false);
		$data = array("lugares"=>$lugares,"flotas"=>$flotas);
		$this->load->view('inc_head');
		$this->load->view($this->session->userdata('menu'));
		$this->load->view('publicacion/crear',$data);
		$this->load->view('inc_footer');
	}
	public function guardar(){
		$respuesta = array("exito"=>500,"mensaje"=>"Ocurrio un error!");
		$origen = $this->input->post('origen');
		$destino = $this->input->post('destino');
		$bus = $this->input->post('bus');
		$precio = $this->input->post('precio');
		//USANDO HELPER
		$fecha = convertDateTime($this->input->post('fecha'));
		$this->form_validation->set_rules('origen', 'Origen', 'required');
		$this->form_validation->set_rules('destino', 'Destino', 'required|callback_validate_diferente');
		$this->form_validation->set_rules('bus', 'Bus', 'required');
		$this->form_validation->set_rules('precio', 'Precio', 'required|numeric');
		$this->form_validation->set_rules('fecha', 'Fecha', 'required');
		//Verifica que el formulario esté validado.
		if ($this->form_validation->run() == TRUE){
			$id = $this->input->post("id");
			$datos = array(
				"origen"=>$origen,
				"destino"=>$destino,
				"bus"=>$bus,
				"precio"=>$precio,
				"fecha_salida"=>$fecha
			);
			if($id>0){
				if($this->Publicacion->modificar("publicaciones", $datos,array("id"=>$id))){
					$respuesta["exito"]=200;
					$respuesta["mensaje"]="Se registro con exito";
				}
			}else{
				if($this->Publicacion->guardar("publicaciones", $datos)){
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
	function validate_diferente()
	{
		$origen = $this->input->post('origen');
		$destino = $this->input->post('destino');

		if($origen==$destino)
		{
			return false;
			$this->form_validation->set_message('Origen y Destino no deben ser iguales');
		}
		else
		{
			return true;
		}
	}

	public function editar($id){
		$publicacion = $this->Publicacion->obtener("publicaciones",array("id"=>$id));
		$lugares = $this->Publicacion->obtener("lugar",false,false);
		$flotas = $this->Publicacion->obtener("flota",array("estado"=>"Activo"),false);
		$data = array("lugares"=>$lugares,"flotas"=>$flotas,"publicacion"=>$publicacion);
		$this->load->view('inc_head');
		$this->load->view($this->session->userdata('menu'));
		$this->load->view('publicacion/editar',$data);
		$this->load->view('inc_footer');
	}
	
	public function eliminar(){
		$response = array(
			"exito"=>400
		);
		
		if($this->input->post('id') > 0)
		{
			$id=$this->input->post('id');
			$this->Publicacion->eliminar("publicaciones",$id);	
			$response["exito"] = 200;
		} 	
		echo json_encode($response);	
	}
}
