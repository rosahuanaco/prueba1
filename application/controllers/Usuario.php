<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
    {
        parent::__construct();        
        $this->load->model('Usuario_Model', 'Usuario');
        $this->load->helper('form');
        $this->load->library("form_validation");
    }

	public function index()
	{	
        $data['msg']=$this->uri->segment(3);

        if($this->session->userdata('login'))
        {
            redirect('usuario/panel','refrsh');
        }
        else
        {
            $this->load->view('inc_head');
            $this->load->view('loginform',$data);
            $this->load->view('inc_footer');
        }
	}
    public function validarusuario()
    {
        $login=$_POST['login'];
        $password=md5($_POST['password']);

        $consulta=$this->Usuario->validar($login,$password);

        if($consulta->num_rows()>0)
        {
            foreach ($consulta->result() as $row)
            {
                 //creando las variables de session
                $this->session->set_userdata('idusuario',$row->id);
                $this->session->set_userdata('username',$row->username);
                $this->session->set_userdata('privilegio',$row->privilegio);
                $this->session->set_userdata('nombreCompleto',$row->nombre_completo);
                redirect('usuario/panel','refresh');
            }           
        }

        else
        {
            redirect('usuario/index/1','refresh');
        }
       
    }	

    public function panel()
    {
        if($this->session->userdata('username'))
        {
            switch ($this->session->userdata('privilegio')) {
                case "admin":
                    $this->session->set_userdata('menu',"inc_menu");
                    break;
                case "pasajero":
                    $this->session->set_userdata('menu',"inc_menu_pasajero");
                    break;
                default:
                    break;
            }
            redirect('publicacion','refresh');     
        }
        else
        {
            redirect('usuario/index/2','refresh');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('usuario/index/3','refresh');
    }
	
}
