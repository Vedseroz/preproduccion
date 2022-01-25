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
            array( 'db' => 'juridica_laboral.fecha_juicio', 'dt' => 'fecha_juicio' )
		);
    	$data = $this->data_tables->complex($_POST , $table, $primaryKey, $columns);
        return $data;
     }


    public function insertar_monitorio($data){      //funcion de insertar a la base de datos juridica_laboral.
        $this->db->insert('juridica_laboral',$data);
    }



}