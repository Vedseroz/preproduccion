<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Laboral_model extends General_model{
    public function __construct(){    
        $table = 'juridica_laboral';
        parent::__construct($table); 
    }

     public function datatable($id_curso = null) {
    	$table = 'juridica_laboral';
    	$primaryKey = 'juridica_laboral.id';
		$columns = array(
			array( 'db' => 'juridica_laboral.id', 'dt' => 'id' ),
			array( 'db' => 'juridica_laboral.n_demandante', 'dt' => 'n_demandante' ),
			array( 'db' => 'juridica_laboral.rut', 'dt' => 'rut' ),
			array( 'db' => 'juridica_laboral.rol', 'dt' => 'rol' ),
			array( 'db' => 'juridica_laboral.fecha_not', 'dt' => 'fecha_not' ),
			array( 'db' => 'juridica_laboral.tribunal', 'dt' => 'tribunal' ),
            array( 'db' => 'juridica_laboral.fecha_res', 'dt' => 'fecha_res' ),
            array( 'db' => 'juridica_laboral.fecha_prep', 'dt' => 'fecha_prep' ),
            array( 'db' => 'juridica_laboral.fecha_juicio', 'dt' => 'fecha_juicio' ),
            array( 'db' => 'juridica_laboral.etapa', 'dt' => 'etapa'),
            array( 'db' => 'juridica_laboral.tipo', 'dt' => 'tipo')
		);
    	$data = $this->data_tables->complex($_POST , $table, $primaryKey, $columns);
        return $data;
     }


    public function insertar_monitorio($data){      //funcion de insertar a la base de datos juridica_laboral.
        $this->db->insert('juridica_laboral',$data);
    }


    public function getall(){
        $query  = $this->get('*', array());

        return $query;
    }


    public function getbyid($id = null){
        $query = $this->db->query('SELECT * FROM juridica_laboral WHERE juridica_laboral.id =' . $id);
        foreach($query->result() as $value){
            $data['id'] = $value->id;
            $data['n_demandante'] = $value->n_demandante;
            $data['rut'] = $value->rut;
            $data['rol'] = $value->rol;
            $data['fecha_not'] = $value->fecha_not;
            $data['fecha_res'] = $value->fecha_res;
            $data['fecha_prep'] = $value->fecha_prep;
            $data['fecha_juicio'] = $value->fecha_juicio;
            $data['tipo'] = $value->tipo;
            $data['tribunal'] = $value->tribunal;
            $data['id_asignado'] = $value->id_asignado;
            $data['archivo'] = $value->archivo;
        }
        return $data;
        
    }

    public function getlast(){
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query  = $this->get('*', array());
        foreach($query as $value){
            $data['n_demandante'] = $value->n_demandante;
            $data['rut'] = $value->rut;
            $data['rol'] = $value->rol;
            $data['fecha_not'] = $value->fecha_not;
            $data['fecha_res'] = $value->fecha_res;
            $data['fecha_prep'] = $value->fecha_prep;
            $data['fecha_juicio'] = $value->fecha_juicio;
            $data['tipo'] = $value->tipo;
            $data['tribunal'] = $value->tribunal;
            $data['id_asignado'] = $value->id_asignado;
            $data['archivo'] = $value->archivo;
        }
        return $data;
    }



}