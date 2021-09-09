<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once ('Base_Model.php');

class Flota_Model extends Base_Model
{
    private $table_name = "flota";
    public function __construct()
    {
        parent::__construct();
    }
    
    public function toList(){
        $this->db->select("f.id,f.placa, ch.nombre_completo as chofer,t.nombre as tipo,f.comodidad,f.filas,f.pisos,f.cantidad,f.estado,f.imagen");
        $this->db->from("flota f");
        $this->db->join("chofer ch","ch.id=f.chofer");
        $this->db->join("tipo t", "t.id=f.tipo");
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

}