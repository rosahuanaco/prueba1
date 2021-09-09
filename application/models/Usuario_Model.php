<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('Base_Model.php');

class Usuario_Model extends Base_Model
{
    private $table_name = "usuario";
    public function __construct()
    {
        parent::__construct();
    }
    
    public function validar($login, $password)
    {
        $this->db->select('u.id,u.username,p.nombre privilegio,u.nombre_completo,u.telefonos');
        $this->db->from('usuario u');
        $this->db->join('privilegio p','p.id=u.privilegio');
        $this->db->where('username',$login);
        $this->db->where('password',$password);
        return $this->db->get();
    }

}